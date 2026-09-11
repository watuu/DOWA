#!/usr/bin/env node
/*----------------------------------------------------------------------------
  figma-compare.mjs — デザインカンプと実装を重ねて、縦方向のズレを出す

  使い方:
    node tools/figma-compare.mjs <url> <カンプ画像> [--out 出力先.png] [--tolerance 4]

  例:
    node tools/figma-compare.mjs http://localhost:8899/news/ doc/PC_NEWS.jpg

  なぜ必要か:
    figma-verify.mjs は「spec に書いた項目」しか見ない。書き忘れた余白や要素は
    永遠に 0 件差分で通ってしまう。こちらは**期待値を一切書かない**。
    カンプ（Figmaのアートボード幅で書き出した画像）と実装のスクリーンショットを
    行ごとに突き合わせ、「どの帯が」「何px」ずれているかを機械的に出す。

  何をしているか:
    1. カンプと同じ幅でページ全体をスクリーンショット
    2. 双方について、行ごとの「地でないピクセル数」（＝内容の濃さ）を数える
    3. 内容のある行が続くまとまりを「帯」として切り出す
    4. 帯を上から順に対応づけ、開始 y・高さのズレを表にする

  ダミーテキストの行数差や画像の有無で下にいくほど累積するので、
  「どの帯から急にズレ始めたか」を見る。そこが原因の箇所。

  終了コード: 0 許容内 / 1 ズレあり
----------------------------------------------------------------------------*/
import { readFileSync } from 'node:fs';
import { extname } from 'node:path';
import { chromium } from '@playwright/test';

const argv = process.argv.slice(2);
const [url, compPath] = argv.filter((a) => !a.startsWith('--'));
const opt = (name, def) => {
	const i = argv.indexOf(`--${name}`);
	return i < 0 ? def : argv[i + 1];
};
const TOL = Number(opt('tolerance', 4));
const OUT = opt('out', null);

if (!url || !compPath) {
	console.error('使い方: node tools/figma-compare.mjs <url> <カンプ画像> [--out diff.png] [--tolerance 4]');
	process.exit(2);
}

const mime = extname(compPath).toLowerCase() === '.png' ? 'image/png' : 'image/jpeg';
const compUri = `data:${mime};base64,` + readFileSync(compPath).toString('base64');

const browser = await chromium.launch();
const page = await browser.newPage();

// カンプの実寸を読み、その幅でページを開く
const compSize = await page.evaluate(async (uri) => {
	const im = new Image();
	im.src = uri;
	await im.decode();
	return { w: im.naturalWidth, h: im.naturalHeight };
}, compUri);

await page.setViewportSize({ width: compSize.w, height: 1000 });
await page.goto(url, { waitUntil: 'networkidle' });
await page.waitForTimeout(1200);
// スクロール連動の演出を一巡させる
await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight));
await page.waitForTimeout(800);
await page.evaluate(() => window.scrollTo(0, 0));
await page.waitForTimeout(400);

const shotUri = 'data:image/png;base64,' + (await page.screenshot({ fullPage: true })).toString('base64');

/*--------------------------------------------------------------------------
  行ごとの「内容の濃さ」を数え、内容が続くまとまりを帯として切り出す
--------------------------------------------------------------------------*/
const profile = async (uri) =>
	page.evaluate(async (uri) => {
		const im = new Image();
		im.src = uri;
		await im.decode();
		const c = document.createElement('canvas');
		c.width = im.naturalWidth;
		c.height = im.naturalHeight;
		const ctx = c.getContext('2d', { willReadFrequently: true });
		ctx.drawImage(im, 0, 0);
		const d = ctx.getImageData(0, 0, c.width, c.height).data;

		// 各行で「その行の最頻色（＝地）と違う」ピクセルの割合を出す
		const rows = new Array(c.height);
		for (let y = 0; y < c.height; y++) {
			const hist = new Map();
			for (let x = 0; x < c.width; x += 2) {
				const i = (y * c.width + x) * 4;
				// 8階調に丸めて数える
				const key = (d[i] >> 5) * 1024 + (d[i + 1] >> 5) * 32 + (d[i + 2] >> 5);
				hist.set(key, (hist.get(key) || 0) + 1);
			}
			let base = 0, max = 0;
			for (const [k, n] of hist) if (n > max) { max = n; base = k; }
			const total = Math.ceil(c.width / 2);
			rows[y] = 1 - max / total;
		}
		return { h: c.height, w: c.width, rows };
	}, uri);

const bands = (p, minInk = 0.004, minGap = 12) => {
	const out = [];
	let start = -1, gap = 0;
	for (let y = 0; y < p.h; y++) {
		if (p.rows[y] > minInk) {
			if (start < 0) start = y;
			gap = 0;
		} else if (start >= 0) {
			gap++;
			if (gap >= minGap) {
				out.push({ y: start, end: y - gap, h: y - gap - start });
				start = -1;
				gap = 0;
			}
		}
	}
	if (start >= 0) out.push({ y: start, end: p.h - 1, h: p.h - 1 - start });
	return out.filter((b) => b.h >= 4);
};

const impl = await profile(shotUri);
const comp = await profile(compUri);
const bi = bands(impl);
const bc = bands(comp);

if (OUT) {
	const png = await page.evaluate(
		async ([a, b]) => {
			const load = async (u) => { const im = new Image(); im.src = u; await im.decode(); return im; };
			const [ia, ib] = [await load(a), await load(b)];
			const c = document.createElement('canvas');
			c.width = ia.naturalWidth + ib.naturalWidth + 20;
			c.height = Math.max(ia.naturalHeight, ib.naturalHeight);
			const ctx = c.getContext('2d');
			ctx.fillStyle = '#888';
			ctx.fillRect(0, 0, c.width, c.height);
			ctx.drawImage(ia, 0, 0);
			ctx.drawImage(ib, ia.naturalWidth + 20, 0);
			return c.toDataURL('image/png');
		},
		[shotUri, compUri]
	);
	const { writeFileSync } = await import('node:fs');
	writeFileSync(OUT, Buffer.from(png.split(',')[1], 'base64'));
}

await browser.close();

/*--------------------------------------------------------------------------
  出力
--------------------------------------------------------------------------*/
const pad = (s, w, right = true) => (right ? String(s).padStart(w) : String(s).padEnd(w));
console.log(`\n■ ${url}`);
console.log(`  カンプ ${compPath}  ${comp.w}×${comp.h}`);
console.log(`  実装             ${impl.w}×${impl.h}   全体の差 ${impl.h - comp.h >= 0 ? '+' : ''}${impl.h - comp.h}px`);
console.log(`  内容の帯: 実装 ${bi.length} / カンプ ${bc.length}\n`);

const n = Math.min(bi.length, bc.length);
console.log('  帯   実装 y/高さ        カンプ y/高さ       開始のズレ  高さのズレ');
let ng = 0;
for (let i = 0; i < n; i++) {
	const dy = bi[i].y - bc[i].y;
	const dh = bi[i].h - bc[i].h;
	const bad = Math.abs(dy) > TOL || Math.abs(dh) > TOL;
	if (bad) ng++;
	console.log(
		`  ${pad(i + 1, 3)}  ${pad(bi[i].y, 6)} /${pad(bi[i].h, 6)}   ${pad(bc[i].y, 6)} /${pad(bc[i].h, 6)}   ` +
			`${pad((dy >= 0 ? '+' : '') + dy, 8)}   ${pad((dh >= 0 ? '+' : '') + dh, 8)}${bad ? ' ★' : ''}`
	);
}
if (bi.length !== bc.length) {
	console.log(`\n  ★帯の数が違う（実装 ${bi.length} / カンプ ${bc.length}）。要素の抜けか、余白で分断されている。`);
	ng++;
}
console.log(`\n  ズレている帯: ${ng} / ${n}`);
console.log('  ※上から順に見て、ズレが急に増えた帯が原因の場所。以降は累積なので追わなくてよい。');
process.exitCode = ng ? 1 : 0;
