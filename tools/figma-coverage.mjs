#!/usr/bin/env node
/*----------------------------------------------------------------------------
  figma-coverage.mjs — 仕様書（spec）の書き漏れを機械的に洗う

  使い方:
    node tools/figma-coverage.mjs [--dest dest] [--spec tools/spec]

  なぜ必要か:
    figma-verify.mjs は「spec に書いた項目」しか見ない。
    部品を実装したのに spec に足し忘れると、そのぶんは永遠に 0 件差分のまま通る。
    実際に「部品は全部一致・ページは最大566pxずれ」という状態が起きた。

  何を出すか:
    1. 実装（dest の HTML）に出てくるのに、どの spec からも参照されていないクラス
    2. spec 項目のうち w も h も書いていないもの（箱の大きさが素通りする）
    3. PC にはあるが SP に無い（またはその逆の）セレクタ

  終了コード: 0 抜けなし / 1 抜けあり
----------------------------------------------------------------------------*/
import { readFileSync, readdirSync, statSync } from 'node:fs';
import { join, extname } from 'node:path';

const argv = process.argv.slice(2);
const opt = (name, def) => {
	const i = argv.indexOf(`--${name}`);
	return i < 0 ? def : argv[i + 1];
};
const DEST = opt('dest', 'dest');
const SPEC = opt('spec', 'tools/spec');

// このプロジェクトの接頭辞。状態クラス（is-）とユーティリティ（u-）は対象外
const PREFIX = /^(c|cm|l|p)-[a-z0-9-]+(__[a-z0-9-]+)?(--[a-z0-9-]+)?$/;

const walk = (dir, out = []) => {
	for (const name of readdirSync(dir)) {
		const p = join(dir, name);
		if (statSync(p).isDirectory()) walk(p, out);
		else if (extname(p) === '.html') out.push(p);
	}
	return out;
};

/*--------------------------------------------------------------------------
  実装側：HTML に出てくるクラスを集める
--------------------------------------------------------------------------*/
const used = new Map(); // class -> Set(file)
for (const file of walk(DEST)) {
	const html = readFileSync(file, 'utf8');
	for (const m of html.matchAll(/class="([^"]+)"/g)) {
		for (const cls of m[1].split(/\s+/)) {
			if (!PREFIX.test(cls)) continue;
			if (!used.has(cls)) used.set(cls, new Set());
			used.get(cls).add(file.replace(DEST + '/', ''));
		}
	}
}

/*--------------------------------------------------------------------------
  spec 側：セレクタと、書かれている属性を集める
--------------------------------------------------------------------------*/
const specs = readdirSync(SPEC).filter((f) => f.endsWith('.json'));
const covered = new Set();
const boxed = new Set(); // w か h を1つでも書いているクラス
const perViewport = new Map(); // selector -> Set(viewport)

for (const f of specs) {
	const spec = JSON.parse(readFileSync(join(SPEC, f), 'utf8'));
	for (const [vp, conf] of Object.entries(spec.targets || {})) {
		for (const item of conf.items || []) {
			const hasBox = item.w != null || item.h != null;
			for (const cls of String(item.selector).matchAll(/\.([a-zA-Z0-9_-]+)/g)) {
				if (!PREFIX.test(cls[1])) continue;
				covered.add(cls[1]);
				if (hasBox) boxed.add(cls[1]);
			}
			const key = `${f}  ${item.selector}`;
			if (!perViewport.has(key)) perViewport.set(key, new Set());
			perViewport.get(key).add(vp);
		}
	}
}

/*--------------------------------------------------------------------------
  出力
--------------------------------------------------------------------------*/
// 意図的に測らないものは tools/spec/.coverage-ignore に書く
let ignore = new Set();
try {
	ignore = new Set(
		readFileSync(join(SPEC, '.coverage-ignore'), 'utf8')
			.split('\n')
			.map((l) => l.trim())
			.filter((l) => l && !l.startsWith('#'))
	);
} catch {}

const uncovered = [...used.keys()].filter((c) => !covered.has(c) && !ignore.has(c)).sort();

console.log(`■ 実装に出てくるクラス: ${used.size} 件 / spec が触れているもの: ${covered.size} 件 / 対象外: ${ignore.size} 件`);

if (uncovered.length) {
	console.log(`\n★ spec のどこからも参照されていないクラス（${uncovered.length} 件）`);
	for (const c of uncovered) console.log(`  .${c}  … ${[...used.get(c)].slice(0, 3).join(', ')}`);
} else {
	console.log('\n  spec 未参照のクラスはありません。');
}

// spec には出てくるが、どの項目にも w / h が無いクラス＝箱の大きさが素通りしている
const unboxed = [...used.keys()].filter((c) => covered.has(c) && !boxed.has(c) && !ignore.has(c)).sort();
if (unboxed.length) {
	console.log(`\n★ spec にあるが w も h も無いクラス（${unboxed.length} 件）`);
	console.log('  色やフォントだけ見ていて、箱の大きさが素通りしています。');
	for (const c of unboxed) console.log(`  .${c}`);
}

const oneSided = [...perViewport.entries()].filter(([, v]) => v.size === 1);
if (oneSided.length) {
	console.log(`\n・片方のビューポートにしか無いセレクタ（${oneSided.length} 件）`);
	console.log('  SP と PC で値が変わる部品なら両方に書く。変わらないなら片方でよい。');
	for (const [k, v] of oneSided.slice(0, 40)) console.log(`  [${[...v]}] ${k}`);
	if (oneSided.length > 40) console.log(`  …ほか ${oneSided.length - 40} 件`);
}

process.exitCode = uncovered.length || unboxed.length ? 1 : 0;
