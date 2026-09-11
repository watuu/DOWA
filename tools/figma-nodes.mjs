#!/usr/bin/env node
/*----------------------------------------------------------------------------
  figma-nodes.mjs — SCSS に書いた Figma の node-id から、期待値を手書きせずに照合する

  使い方:
    node tools/figma-nodes.mjs <url> [--viewport 1440] [--vp PC|SP] [--tolerance 4]

  なぜ必要か:
    spec は手書きなので、書き忘れた項目は永遠に検出できない。
    こちらは **SCSS のコメントに残した node-id** を唯一の入力にする。
      /*  番号付きカード
          Figma: SP 3139-5472 / PC 2548-5368
      ----*​/
      .c-card-num {
    この「Figma:」行とその直後のセレクタを機械的に対応づけ、
    tools/figma/nodes.json（Figmaの全ノードの x/y/w/h）から寸法を引いて、
    実際のレンダリングと突き合わせる。**期待値は1つも書かない。**

    node-id は規約でもう書いているので、追加の手間はゼロ。
    書き忘れた node-id は「Figma参照なし」として一覧に出る。

  下準備:
    tools/figma/nodes.json … get_metadata の結果を { "2669:16258": {x,y,w,h} } にしたもの

  終了コード: 0 差分なし / 1 差分あり
----------------------------------------------------------------------------*/
import { readFileSync, readdirSync, statSync } from 'node:fs';
import { join } from 'node:path';
import { chromium } from '@playwright/test';

const argv = process.argv.slice(2);
const url = argv.find((a) => /^https?:/.test(a));
const opt = (name, def) => {
	const i = argv.indexOf(`--${name}`);
	return i < 0 ? def : argv[i + 1];
};
const VIEWPORT = Number(opt('viewport', 1440));
const VP = opt('vp', VIEWPORT <= 640 ? 'SP' : 'PC');
const TOL = Number(opt('tolerance', 4));
// 幅は親の幅で決まる要素が多く、Figmaのフレーム幅と単純比較できない。
// 既定は高さだけ見る（ズレが積み上がるのは縦方向）。--with-width で幅も見る。
const WITH_W = argv.includes('--with-width');

if (!url) {
	console.error('使い方: node tools/figma-nodes.mjs <url> [--viewport 1440] [--vp PC|SP]');
	process.exit(2);
}

const nodes = JSON.parse(readFileSync('tools/figma/nodes.json', 'utf8'));

/*--------------------------------------------------------------------------
  SCSS から「Figma: …」コメントと、その直後のセレクタを拾う
--------------------------------------------------------------------------*/
const walk = (dir, out = []) => {
	for (const n of readdirSync(dir)) {
		const p = join(dir, n);
		if (statSync(p).isDirectory()) walk(p, out);
		else if (p.endsWith('.scss')) out.push(p);
	}
	return out;
};

const map = [];      // { selector, sp, pc, file }
const noRef = [];    // Figma参照が無いブロック
for (const file of walk('src/sass')) {
	const lines = readFileSync(file, 'utf8').split('\n');
	for (let i = 0; i < lines.length; i++) {
		const m = lines[i].match(/Figma:\s*(.+)$/);
		if (!m) continue;
		const ids = {};
		// 「SP header_sp 3138-4670 / PC header_pc 3003-9152」のように間に語が入る書き方も拾う
		for (const t of m[1].matchAll(/(SP|PC)[^\d/]*?(\d+)[-:](\d+)/g)) ids[t[1]] = `${t[2]}:${t[3]}`;
		// 単独の id（SP/PC の別が無い書き方）
		if (!ids.SP && !ids.PC) {
			const one = m[1].match(/(\d+)[-:](\d+)/);
			if (one) ids.PC = ids.SP = `${one[1]}:${one[2]}`;
		}
		// 直後のセレクタ。& で始まるネストしたブロック向けのコメントは、
		// 無関係な後続のクラスに結びつけないようそこで打ち切る。
		for (let j = i + 1; j < Math.min(i + 12, lines.length); j++) {
			const line = lines[j].trim();
			if (!line || line.startsWith('//') || line.startsWith('*') || line.startsWith('/*') || line.startsWith('---')) continue;
			const sel = line.match(/^(\.[a-zA-Z][\w-]*)[\s,{]/);
			if (sel) map.push({ selector: sel[1], ...ids, file: file.replace('src/sass/', '') });
			break; // クラス以外（& など）なら対応づけない
		}
	}
	// node-id を書いていないブロック（見出しコメントはあるのに Figma: が無い）
	const txt = lines.join('\n');
	for (const b of txt.matchAll(/\/\*[^*]*?\n([^*]*?)----\*\/\s*\n(\.[a-zA-Z][\w-]*)/g)) {
		if (!/Figma:/.test(b[1])) noRef.push(`${file.replace('src/sass/', '')}  ${b[2]}`);
	}
}

/*--------------------------------------------------------------------------
  実測して突き合わせる
--------------------------------------------------------------------------*/
const browser = await chromium.launch();
const page = await browser.newPage({ viewport: { width: VIEWPORT, height: 1000 } });
await page.goto(url, { waitUntil: 'networkidle' });
await page.waitForTimeout(900);

const rows = [];
for (const e of map) {
	const id = e[VP];
	if (!id) continue;
	const fig = nodes[id];
	// 存在しないセレクタで待たされないよう即時判定
	const box = await page.evaluate((sel) => {
		const el = document.querySelector(sel);
		if (!el) return null;
		const r = el.getBoundingClientRect();
		if (r.width === 0 && r.height === 0) return null;
		return { width: r.width, height: r.height };
	}, e.selector);
	if (!fig) { rows.push({ ...e, id, state: 'ノード不明' }); continue; }
	if (!box) { rows.push({ ...e, id, state: 'このページに無い' }); continue; }
	rows.push({
		...e, id, state: 'ok',
		w: box.width, h: box.height,
		fw: fig.w, fh: fig.h,
		dw: box.width - fig.w, dh: box.height - fig.h,
	});
}
await browser.close();

/*--------------------------------------------------------------------------
  出力
--------------------------------------------------------------------------*/
const pad = (s, w, right = true) => (right ? String(s).padStart(w) : String(s).padEnd(w));
console.log(`\n■ ${url}（${VP} / ${VIEWPORT}px）  SCSSの node-id から自動照合`);
console.log(`  対応づけ: ${rows.length} 件\n`);
console.log('  セレクタ                        node        実測 w×h        Figma w×h       差');
let ng = 0, skipped = 0;
for (const r of rows.sort((a, b) => a.selector.localeCompare(b.selector))) {
	if (r.state === 'このページに無い') { skipped++; continue; }
	if (r.state !== 'ok') {
		ng++;
		console.log(`  ${pad(r.selector, 30, false)} ${pad(r.id, 11, false)} ${r.state} ★`);
		continue;
	}
	const bad = Math.abs(r.dh) > TOL || (WITH_W && Math.abs(r.dw) > TOL);
	if (bad) ng++;
	console.log(
		`  ${pad(r.selector, 30, false)} ${pad(r.id, 11, false)} ` +
			`${pad(r.w.toFixed(0), 5)}×${pad(r.h.toFixed(0), 5, false)}   ` +
			`${pad(r.fw.toFixed(0), 5)}×${pad(r.fh.toFixed(0), 5, false)}   ` +
			`${pad((r.dw >= 0 ? '+' : '') + r.dw.toFixed(0), 5)} / ${pad((r.dh >= 0 ? '+' : '') + r.dh.toFixed(0), 5)}${bad ? ' ★' : ''}`
	);
}
if (noRef.length) {
	console.log(`\n・Figma の node-id を書いていないブロック（${noRef.length} 件）`);
	for (const s of noRef.slice(0, 20)) console.log(`  ${s}`);
	if (noRef.length > 20) console.log(`  …ほか ${noRef.length - 20} 件`);
}
console.log(`\n  差分: ${ng} / ${rows.length - skipped} 件（このページに無い ${skipped} 件は除外${WITH_W ? '' : '／高さのみ比較'}）`);
process.exitCode = ng ? 1 : 0;
