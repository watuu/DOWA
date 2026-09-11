#!/usr/bin/env node
/*----------------------------------------------------------------------------
  figma-verify.mjs — 実装と Figma の px 差分チェック

  使い方:
    node tools/figma-verify.mjs <spec.json> [--tolerance 4] [--only PC] [--json]

  前提:
    npm i -D @playwright/test && npx playwright install chromium

  仕様書（spec.json）の形は tools/figma-spec.example.json を参照。
  座標は「Figma のアートボード左上を原点とした値」をそのまま書く。
  baseline に基準要素を1つ置くと、そのズレ分を全項目から差し引いて比較するので、
  ページ上部の累積差やダミーテキストの行数差に引きずられずに済む。
----------------------------------------------------------------------------*/
import { readFileSync } from 'node:fs';
import { resolve } from 'node:path';

const argv = process.argv.slice(2);
const USAGE = '使い方: node tools/figma-verify.mjs <spec.json> [--tolerance 4] [--only PC] [--json]';

// 値を取るフラグ。--tolerance 2 の "2" を spec のパスと取り違えないよう、値の位置を先に押さえておく
const VALUE_FLAGS = ['tolerance', 'only'];
const valuePos = new Set();
argv.forEach((a, i) => { if (a.startsWith('--') && VALUE_FLAGS.includes(a.slice(2))) valuePos.add(i + 1); });

const specPath = argv.find((a, i) => !a.startsWith('--') && !valuePos.has(i));
const flag = (name, def = null) => {
	const i = argv.indexOf(`--${name}`);
	return i < 0 ? def : (argv[i + 1] ?? true);
};
const asJson = argv.includes('--json');

if (!specPath) {
	console.error(USAGE);
	process.exit(2);
}

let chromium;
try {
	({ chromium } = await import('@playwright/test'));
} catch {
	console.error('@playwright/test が入っていません。\n  npm i -D @playwright/test && npx playwright install chromium');
	process.exit(2);
}

let spec;
try {
	spec = JSON.parse(readFileSync(resolve(specPath), 'utf8'));
} catch (e) {
	console.error(`仕様書を読めません: ${specPath}\n  ${e.message}\n${USAGE}`);
	process.exit(2);
}
const TOL = Number(flag('tolerance', spec.tolerance ?? 4));
const only = flag('only');

/*--------------------------------------------------------------------------
  ページ内で1要素を測る。
  x/y は offsetLeft/offsetTop の積み上げ（ドキュメント座標）。
  body が独自スクロールコンテナ（OverlayScrollbars, Lenis 等）でも影響を受けない。
--------------------------------------------------------------------------*/
const MEASURE = ([sel, index]) => {
	const list = document.querySelectorAll(sel);
	const el = list[index || 0];
	if (!el) return null;
	let x = 0, y = 0, n = el;
	while (n) { x += n.offsetLeft; y += n.offsetTop; n = n.offsetParent; }
	const r = el.getBoundingClientRect();
	const c = getComputedStyle(el);
	const px = (v) => { const f = parseFloat(v); return Number.isFinite(f) ? f : null; };
	return {
		count: list.length,
		x, y, w: r.width, h: r.height,
		fontSize: px(c.fontSize),
		lineHeight: c.lineHeight === 'normal' ? null : px(c.lineHeight),
		letterSpacing: c.letterSpacing === 'normal' ? 0 : px(c.letterSpacing),
		fontWeight: c.fontWeight,
		fontFamily: c.fontFamily.split(',')[0].replace(/^"|"$/g, ''),
		color: c.color,
		background: c.backgroundColor,
		borderTop: c.borderTopWidth + ' ' + c.borderTopStyle + ' ' + c.borderTopColor,
		borderBottom: c.borderBottomWidth + ' ' + c.borderBottomStyle + ' ' + c.borderBottomColor,
		borderRadius: px(c.borderTopLeftRadius),
		textDecorationLine: c.textDecorationLine,
		textDecorationThickness: c.textDecorationThickness === 'auto' ? null : px(c.textDecorationThickness),
		display: c.display,
	};
};

/*--------------------------------------------------------------------------
  比較ルール
  数値      … 差が tolerance 以内なら OK
  文字列    … 空白を潰した上で完全一致（色・border など）
  "0.04em"  … fontSize を掛けて px に直してから比較
--------------------------------------------------------------------------*/
const NUMERIC = ['x', 'y', 'w', 'h', 'fontSize', 'lineHeight', 'letterSpacing', 'borderRadius', 'textDecorationThickness'];
const STRING = ['fontWeight', 'fontFamily', 'color', 'background', 'borderTop', 'borderBottom', 'textDecorationLine', 'display'];

/*--------------------------------------------------------------------------
  許容差はキーごとに変える。
  x/y/w/h は --tolerance（既定 4px）だが、タイポにその値を使うと
  letterSpacing 0 と 0.64px（0.04em × 16px）の違いが素通りしてしまう。
  spec 側で `"tolerances": { "fontSize": 1 }` と上書きできる。
--------------------------------------------------------------------------*/
const TOL_BY_KEY = { fontSize: 0.5, lineHeight: 1, letterSpacing: 0.05, borderRadius: 0.5, textDecorationThickness: 0.5 };
const tolFor = (k) => {
	const o = spec.tolerances?.[k];
	return o != null ? Number(o) : (TOL_BY_KEY[k] ?? TOL);
};
const DECIMALS = (k) => (k === 'letterSpacing' ? 2 : k === 'fontSize' || k === 'lineHeight' || k === 'borderRadius' || k === 'textDecorationThickness' ? 1 : 0);

// spec に Figma の #rrggbb をそのまま書けるように、computed 形式へ寄せてから比較する
const hexToRgb = (s) =>
	String(s).replace(/#([0-9a-f]{3,8})\b/gi, (m, h) => {
		let hex = h;
		if (hex.length === 3 || hex.length === 4) hex = [...hex].map((c) => c + c).join('');
		if (hex.length !== 6 && hex.length !== 8) return m;
		const [r, g, b] = [0, 2, 4].map((i) => parseInt(hex.slice(i, i + 2), 16));
		if (hex.length === 8) {
			const a = Math.round((parseInt(hex.slice(6, 8), 16) / 255) * 100) / 100;
			return `rgba(${r}, ${g}, ${b}, ${a})`;
		}
		return `rgb(${r}, ${g}, ${b})`;
	});

// 色は hex を rgb() に直し、カンマ前後の空白も揃えてから比較する
const norm = (s) => hexToRgb(s).replace(/\s*,\s*/g, ', ').replace(/\s+/g, ' ').trim().toLowerCase();

const toPx = (want, got) => {
	if (typeof want === 'number') return want;
	const m = String(want).match(/^(-?[\d.]+)em$/);
	if (m && got.fontSize) return parseFloat(m[1]) * got.fontSize;
	const f = parseFloat(want);
	return Number.isFinite(f) ? f : null;
};

// 全角を2、半角を1として数える桁揃え
const dispWidth = (s) => [...String(s)].reduce((n, ch) => n + (/[^\x00-\xff]/.test(ch) ? 2 : 1), 0);
const pad = (s, w, right = false) => {
	const fill = ' '.repeat(Math.max(0, w - dispWidth(s)));
	return right ? fill + s : s + fill;
};

const results = [];
const browser = await chromium.launch();

for (const vp of spec.viewports) {
	if (only && vp.name !== only) continue;
	const conf = (spec.targets && spec.targets[vp.name]) || {};
	const items = conf.items || [];
	if (!items.length) continue;

	const ctx = await browser.newContext({
		viewport: { width: vp.width, height: vp.height || 900 },
		deviceScaleFactor: vp.dpr || 1,
	});
	const page = await ctx.newPage();
	const errors = [];
	page.on('pageerror', (e) => errors.push(e.message));
	await page.goto(spec.url, { waitUntil: 'networkidle' });
	await page.waitForTimeout(spec.settle?.timeout ?? 2000);

	// 遅延読み込みやスクロール連動アニメを一巡させて、最終状態で測る
	if (spec.settle?.scrollThrough !== false) {
		await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight));
		await page.waitForTimeout(spec.settle?.scrollWait ?? 1200);
		await page.evaluate(() => window.scrollTo(0, 0));
		await page.waitForTimeout(600);
	}

	// 基準要素のズレ（ページ上部の累積差）を求めて全項目から差し引く
	let shiftY = 0, shiftX = 0, baselineMissing = false;
	if (conf.baseline) {
		const b = await page.evaluate(MEASURE, [conf.baseline.selector, conf.baseline.index || 0]);
		if (!b) {
			baselineMissing = true;
			console.error(`  [${vp.name}] baseline が見つかりません: ${conf.baseline.selector}`);
		} else {
			if (conf.baseline.y != null) shiftY = b.y - conf.baseline.y;
			if (conf.baseline.x != null) shiftX = b.x - conf.baseline.x;
		}
	}

	const rows = [];
	for (const item of items) {
		const got = await page.evaluate(MEASURE, [item.selector, item.index || 0]);
		if (!got) { rows.push({ name: item.name, missing: true, selector: item.selector }); continue; }

		const diffs = [];
		for (const k of NUMERIC) {
			if (item[k] == null) continue;
			const want = toPx(item[k], got);
			if (want == null || got[k] == null) continue;
			let actual = got[k];
			if (k === 'y') actual -= shiftY;
			if (k === 'x') actual -= shiftX;
			const tol = tolFor(k);
			diffs.push({ key: k, want, actual, delta: actual - want, tol, ok: Math.abs(actual - want) <= tol + 1e-6 });
		}
		for (const k of STRING) {
			if (item[k] == null) continue;
			const ok = norm(got[k]).includes(norm(item[k])) || norm(got[k]) === norm(item[k]);
			diffs.push({ key: k, want: item[k], actual: got[k], ok });
		}
		rows.push({ name: item.name, selector: item.selector, count: got.count, diffs });
	}
	results.push({ viewport: vp.name, width: vp.width, shiftX, shiftY, baselineMissing, rows, errors });
	await ctx.close();
}
await browser.close();

/*--------------------------------------------------------------------------
  差分件数と有効・無効の判定は出力形式より先に済ませる。
  --json でも終了コードが 0/1/2 で返るようにするため。
--------------------------------------------------------------------------*/
let ng = 0;
let invalid = false;
for (const r of results) {
	if (r.baselineMissing) invalid = true;
	for (const row of r.rows) {
		if (row.missing) { ng++; continue; }
		ng += row.diffs.filter((d) => !d.ok).length;
	}
}

const tolLabel = `位置・寸法 ±${TOL}px / ` + ['fontSize', 'lineHeight', 'letterSpacing', 'borderRadius'].map((k) => `${k} ±${tolFor(k)}`).join(' / ');

if (asJson) {
	console.log(JSON.stringify({
		url: spec.url,
		tolerance: TOL,
		tolerances: Object.fromEntries(['fontSize', 'lineHeight', 'letterSpacing', 'borderRadius'].map((k) => [k, tolFor(k)])),
		diffCount: ng,
		invalid,
		results,
	}, null, 2));
} else {
	for (const r of results) {
		console.log(`\n■ ${r.viewport}（${r.width}px）  ${spec.url}`);
		if (r.baselineMissing) {
			invalid = true;
			console.log('  ★この結果は無効：baseline が見つからず補正 0 のまま比較しています。');
			console.log('    全項目が同じ量ずれて見えるだけなので、セレクタを直して測り直すこと。');
		}
		if (r.shiftY || r.shiftX) {
			console.log(`  ※基準要素のズレ x${r.shiftX >= 0 ? '+' : ''}${r.shiftX.toFixed(0)} / y${r.shiftY >= 0 ? '+' : ''}${r.shiftY.toFixed(0)} を差し引いて比較`);
		}
		if (r.errors.length) console.log(`  ※JSエラー: ${r.errors.join(' / ')}`);
		for (const row of r.rows) {
			if (row.missing) { console.log(`  ${pad(row.name, 18)} 見つからず（${row.selector}）`); continue; }
			const bad = row.diffs.filter((d) => !d.ok);
			const cells = row.diffs.map((d) => {
				const mark = d.ok ? '' : ' ★';
				if (typeof d.want === 'number') {
					const n = DECIMALS(d.key);
					const dl = (d.delta >= 0 ? '+' : '') + d.delta.toFixed(n);
					return `${d.key}=${d.actual.toFixed(Math.max(n, 1))}/${d.want}(${dl})${mark}`;
				}
				return `${d.key}=${d.actual}/${d.want}${mark}`;
			});
			const dup = row.count > 1 ? ` ×${row.count}` : '';
			console.log(`  ${pad(row.name, 18)}${bad.length ? '★' : ' '} ${cells.join('  ')}${dup}`);
		}
	}
	console.log(`\n差分: ${ng} 件（許容 ${tolLabel}）`);
	if (invalid) console.log('※baseline 未検出のビューポートがあります。上の差分は当てになりません。');
}

if (invalid) process.exitCode = 2;
else if (ng) process.exitCode = 1;
