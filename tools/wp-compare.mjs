#!/usr/bin/env node
/*----------------------------------------------------------------------------
  wp-compare.mjs — WP版のページを静的コーディングと突き合わせる

  使い方:
    node tools/wp-compare.mjs [ページ...] [--viewport 1440,402] [--tolerance 1] [--json]
    ページを省略すると PAGES の全件

  なぜ必要か:
    figma-verify は「手書きの spec」との照合で、spec を書いていないページは見られない。
    WP 移植では**静的コーディングそのものが期待値**なので、同じ DOM を両方で測って
    ずれた要素だけを出す。spec を1行も書かずに、移植漏れ・崩れを拾える。

  見るもの:
    ページに出てくる c- / cm- / l- / p- のクラスすべてについて、
    「出現数」と「先頭要素の x / y / w / h」を比べる。
    クラスが片方にしか無い＝移植漏れ、数が違う＝繰り返しの数違い。

  終了コード: 0 差分なし / 1 差分あり / 2 取得できず
----------------------------------------------------------------------------*/
import { chromium } from '@playwright/test';

const STATIC = process.env.STATIC_BASE || 'http://localhost:8899';
const WP = process.env.WP_BASE || 'http://localhost/DOWA/public';

// [静的側のパス, WP側のパス]
const PAGES = [
	['/', '/'],
	['/material/', '/material/'],
	['/flow/', '/flow/'],
	['/supply-chain/', '/supply-chain/'],
	['/location/', '/location/'],
	['/technology/', '/technology/'],
	['/contact/', '/contact/'],
	['/contact/thanks/', '/contact/thanks/'],
	['/document/', '/document/'],
	['/document/thanks/', '/document/thanks/'],
	['/privacy-policy/', '/privacy-policy/'],
	['/cookie-policy/', '/cookie-policy/'],
	['/en/', '/en/'],
	['/en/material/', '/en/material/'],
	['/en/flow/', '/en/flow/'],
	['/en/supply-chain/', '/en/supply-chain/'],
	['/en/location/', '/en/location/'],
	['/en/technology/', '/en/technology/'],
	['/en/contact/', '/en/contact/'],
	['/en/contact/thanks/', '/en/contact/thanks/'],
	['/en/document/', '/en/document/'],
	['/en/document/thanks/', '/en/document/thanks/'],
	['/en/privacy-policy/', '/en/privacy-policy/'],
];

/* 新着情報（/news/ と /single-news/）は既定では見ない。
   WP 側は実データなので、静的側のダミーと文言が違うと行の高さの差がそのまま出るため。
   照合するときは記事を静的のダミーと同じ内容にしてから、ページを指定して回す:
     npm run verify:wp -- /news/ /news/news-5/
   （PAGES に無いパスは下の EXTRA で対応づける） */
const EXTRA = {
	'/news/': '/news/',
	'/news/news-5/': '/single-news/',
};

const argv = process.argv.slice(2);
const opt = (name, def) => {
	const i = argv.indexOf('--' + name);
	return i >= 0 && argv[i + 1] ? argv[i + 1] : def;
};
const asJson = argv.includes('--json');
const TOL = Number(opt('tolerance', 1));
const VIEWPORTS = opt('viewport', '1440,402').split(',').map(Number);
const only = argv.filter((a) => a.startsWith('/'));
const pages = only.length
	? only.map((w) => {
			const hit = PAGES.find((p) => p[1] === w);
			if (hit) return hit;
			if (EXTRA[w]) return [EXTRA[w], w];
			console.error(`対応づけが分かりません: ${w}（PAGES か EXTRA に足す）`);
			process.exit(2);
	  })
	: PAGES;

// ページ全体の DOM を「クラスごとの出現数 ＋ 先頭要素の箱」に畳む
const COLLECT = () => {
	const out = {};
	for (const el of document.querySelectorAll('[class]')) {
		for (const cls of el.classList) {
			if (!/^(c|cm|l|p)-/.test(cls)) continue;
			if (!out[cls]) {
				let x = 0, y = 0, n = el;
				while (n) { x += n.offsetLeft; y += n.offsetTop; n = n.offsetParent; }
				const r = el.getBoundingClientRect();
				out[cls] = { n: 0, x, y, w: Math.round(r.width * 10) / 10, h: Math.round(r.height * 10) / 10 };
			}
			out[cls].n++;
		}
	}
	return out;
};

const browser = await chromium.launch();

const grab = async (url, width) => {
	const page = await browser.newPage({ viewport: { width, height: 1000 } });
	const errors = [];
	page.on('pageerror', (e) => errors.push(String(e)));
	let res;
	try {
		// networkidle は使わない。Cloudflare Turnstile のスクリプトが通信を続けるので
		// フォームのあるページでいつまでも終わらない（2026-09-21）
		res = await page.goto(url, { waitUntil: 'domcontentloaded' });
		await page.waitForLoadState('load').catch(() => {});
	} catch (e) {
		await page.close();
		return { fail: String(e) };
	}
	await page.waitForTimeout(2500);
	const data = await page.evaluate(COLLECT);
	const status = res ? res.status() : 0;
	await page.close();
	return { data, status, errors };
};

const report = [];
let diffTotal = 0, invalid = false;

for (const [sPath, wPath] of pages) {
	for (const width of VIEWPORTS) {
		const a = await grab(STATIC + sPath, width);
		const b = await grab(WP + wPath, width);

		if (a.fail || b.fail || a.status !== 200 || b.status !== 200) {
			invalid = true;
			report.push({ page: wPath, width, invalid: true, note: a.fail || b.fail || `静的 ${a.status} / WP ${b.status}` });
			continue;
		}

		const rows = [];
		const keys = new Set([...Object.keys(a.data), ...Object.keys(b.data)]);
		for (const cls of [...keys].sort()) {
			const A = a.data[cls], B = b.data[cls];
			if (!A) { rows.push({ cls, kind: 'WPのみ', detail: `WP に ${B.n} 個` }); continue; }
			if (!B) { rows.push({ cls, kind: '移植漏れ', detail: `静的に ${A.n} 個 / WP に 0 個` }); continue; }
			if (A.n !== B.n) rows.push({ cls, kind: '個数', detail: `静的 ${A.n} → WP ${B.n}` });
			for (const k of ['x', 'y', 'w', 'h']) {
				const d = Math.round((B[k] - A[k]) * 10) / 10;
				if (Math.abs(d) > TOL) rows.push({ cls, kind: k, detail: `静的 ${A[k]} → WP ${B[k]} (${d > 0 ? '+' : ''}${d})` });
			}
		}
		diffTotal += rows.length;
		report.push({ page: wPath, width, rows, jsErrors: b.errors });
	}
}

await browser.close();

if (asJson) {
	console.log(JSON.stringify({ diffTotal, invalid, report }, null, 2));
} else {
	for (const r of report) {
		if (r.invalid) {
			console.log(`\n■ ${r.page}（${r.width}px）  ★取得できず: ${r.note}`);
			continue;
		}
		console.log(`\n■ ${r.page}（${r.width}px）  ${r.rows.length ? r.rows.length + ' 件' : '差分なし'}`);
		for (const row of r.rows) console.log(`  .${row.cls}  ${row.kind}: ${row.detail}`);
		if (r.jsErrors.length) console.log(`  ※JSエラー: ${r.jsErrors.join(' / ')}`);
	}
	console.log(`\n差分: ${diffTotal} 件（許容 ${TOL}px）${invalid ? ' ※取得できなかったページあり' : ''}`);
}

process.exit(invalid ? 2 : diffTotal ? 1 : 0);
