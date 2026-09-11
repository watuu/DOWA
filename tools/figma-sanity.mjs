#!/usr/bin/env node
/*----------------------------------------------------------------------------
  figma-sanity.mjs — CSSの指定が「効いていない」箇所を機械的に拾う

  使い方:
    node tools/figma-sanity.mjs <url...> [--viewport 1440] [--json]

  なぜ必要か:
    spec 照合もカンプ照合も「書いた／写っている」ものしか見ない。
    そもそも指定が効いていない事故は、値を知らなくても検出できる。
    実際に出た2件はどちらもこれで拾える:
      ・ドロワーの gap 30 が <nav> に付いていて子が <ul> 1つ → 項目間に効いていなかった
      ・言語切替の 1px 罫線が flex-shrink で 0 に潰れて消えていた

  何を見るか:
    1. gap が指定されているのに、並ぶ子要素が1つ以下（gapが効かない）
    2. CSSで指定した width / height より実測が小さい（flex-shrink で潰れた）
    3. 中身があるのに実測の高さか幅が 0
    4. 親の内容幅をはみ出している（overflow-x が出る）

  終了コード: 0 問題なし / 1 あり
----------------------------------------------------------------------------*/
import { readFileSync } from 'node:fs';
import { chromium } from '@playwright/test';

// わざとそうしている箇所は tools/spec/.sanity-ignore に「種別 セレクタ」で書く
let ignore = new Set();
try {
	ignore = new Set(
		readFileSync('tools/spec/.sanity-ignore', 'utf8')
			.split('\n')
			.map((l) => l.trim())
			.filter((l) => l && !l.startsWith('#'))
			.map((l) => l.replace(/\s+/g, ' '))
	);
} catch {}

const argv = process.argv.slice(2);
const urls = argv.filter((a) => !a.startsWith('--') && /^https?:/.test(a));
const opt = (name, def) => {
	const i = argv.indexOf(`--${name}`);
	return i < 0 ? def : argv[i + 1];
};
const VIEWPORT = Number(opt('viewport', 1440));
const asJson = argv.includes('--json');

if (!urls.length) {
	console.error('使い方: node tools/figma-sanity.mjs <url...> [--viewport 1440]');
	process.exit(2);
}

const CHECK = () => {
	const out = [];
	const px = (v) => parseFloat(v) || 0;
	const name = (el) => {
		const cls = [...el.classList].find((c) => /^(c|cm|l|p)-/.test(c));
		return cls ? '.' + cls : el.tagName.toLowerCase();
	};

	for (const el of document.querySelectorAll('body *')) {
		const cs = getComputedStyle(el);
		if (cs.display === 'none' || cs.visibility === 'hidden') continue;
		// 祖先が display:none のものも除く（レスポンシブで隠している要素）
		if (el.checkVisibility && !el.checkVisibility({ checkVisibilityCSS: true })) continue;
		const r = el.getBoundingClientRect();
		const label = name(el);

		// 1) gap を置く階層を間違えている
		//    「gap があるのに子が1つ」かつ「その子が2つ以上の子を持つ」＝
		//    本来その子の側に置くべき gap。ドロワーの nav > ul がこれだった。
		if (/^(flex|inline-flex|grid|inline-grid)$/.test(cs.display)) {
			const gap = Math.max(px(cs.rowGap), px(cs.columnGap));
			const kids = [...el.children].filter((c) => {
				const k = getComputedStyle(c);
				return k.display !== 'none' && k.position !== 'absolute' && k.position !== 'fixed';
			});
			// ::before / ::after も flex・grid のアイテムになる（箇条書きの点など）。
			// 要素の子が1つでも疑似要素と並んでいれば gap は効いている
			const pseudo = ['::before', '::after'].filter((p) => {
				const k = getComputedStyle(el, p);
				return k.content !== 'none' && k.content !== 'normal' && k.display !== 'none' && k.position !== 'absolute' && k.position !== 'fixed';
			}).length;
			// レスポンシブで片方を隠しているだけの場合を除くため、
			// 「そもそも子が1つしかない」ものだけを対象にする
			if (gap > 0 && kids.length === 1 && el.children.length === 1 && pseudo === 0) {
				const grand = [...kids[0].children].filter((c) => getComputedStyle(c).display !== 'none');
				if (grand.length >= 2) {
					out.push({
						type: 'gapの階層',
						el: label,
						detail: `gap ${gap}px だが子は ${kids[0].tagName.toLowerCase()} 1つ。並ぶのはその中の ${grand.length} 個`,
					});
				}
			}
		}

		// 2) 見えるはずのものが 0px に潰れている
		//    中身があるもののほか、背景や枠線だけの装飾（1pxの罫線など）も対象。
		//    言語切替の罫線が flex-shrink で 0 になっていたのがこれ。
		const decorated =
			(cs.backgroundColor && cs.backgroundColor !== 'rgba(0, 0, 0, 0)') ||
			px(cs.borderTopWidth) + px(cs.borderRightWidth) + px(cs.borderBottomWidth) + px(cs.borderLeftWidth) > 0;
		const hasInk = el.textContent.trim() || el.querySelector('img,svg');
		const skip = /^(option|br|source|meta|script|style|use|defs|symbol)$/i.test(el.tagName);
		if (!skip && (hasInk || decorated) && cs.position !== 'absolute' && (r.height < 0.5 || r.width < 0.5)) {
			out.push({
				type: '潰れている',
				el: label,
				detail: `実測 ${r.width.toFixed(1)}×${r.height.toFixed(1)}（${hasInk ? '中身あり' : '装飾あり'}）`,
			});
		}

		// 3) 親の内容幅をはみ出している（transform で回している要素は除く）
		const p = el.parentElement;
		if (p && p !== document.body && cs.position === 'static' && cs.transform === 'none' && cs.rotate === 'none') {
			const pr = p.getBoundingClientRect();
			const pcs = getComputedStyle(p);
			const left = pr.left + px(pcs.paddingLeft);
			const right = pr.right - px(pcs.paddingRight);
			const over = Math.max(left - r.left, r.right - right);
			if (over > 4 && pcs.overflow === 'visible' && pcs.overflowX === 'visible') {
				out.push({ type: 'はみ出し', el: label, detail: `親より ${over.toFixed(1)}px 外へ（${name(p)}）` });
			}
		}
	}
	// 同じ指摘はまとめる
	const seen = new Map();
	for (const o of out) {
		const k = o.type + o.el + o.detail;
		seen.set(k, (seen.get(k) || { ...o, n: 0 }));
		seen.get(k).n++;
	}
	return [...seen.values()];
};

const browser = await chromium.launch();
const page = await browser.newPage({ viewport: { width: VIEWPORT, height: 1000 } });
const all = [];
for (const url of urls) {
	await page.goto(url, { waitUntil: 'networkidle' });
	await page.waitForTimeout(700);
	const found = (await page.evaluate(CHECK)).filter((f) => !ignore.has(`${f.type} ${f.el}`));
	all.push({ url, found });
}
await browser.close();

if (asJson) {
	console.log(JSON.stringify(all, null, 2));
} else {
	let total = 0;
	for (const { url, found } of all) {
		console.log(`\n■ ${url}（${VIEWPORT}px）`);
		if (!found.length) {
			console.log('  指摘なし');
			continue;
		}
		for (const f of found) {
			total++;
			console.log(`  ★ ${f.type.padEnd(6)} ${f.el.padEnd(28)} ${f.detail}${f.n > 1 ? `  ×${f.n}` : ''}`);
		}
	}
	console.log(`\n指摘: ${total} 件`);
	process.exitCode = total ? 1 : 0;
}
