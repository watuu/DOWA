#!/usr/bin/env node
/*----------------------------------------------------------------------------
  verify-all.mjs — 性質の違う4つの照合をまとめて回す

    npm run verify:all            （dest/ を http://localhost:8899 で配信しておくこと）

  1つの方法では必ず穴が残るので、見る対象がずれている4つを重ねる。

  ┌─────────────────┬──────────────────────┬────────────────────────────┐
  │ 方法             │ 入力（期待値の出どころ） │ 拾えるもの / 拾えないもの        │
  ├─────────────────┼──────────────────────┼────────────────────────────┤
  │ ① spec 照合      │ 手書きの spec          │ 色・字送り・罫線まで精密        │
  │ figma-verify     │                      │ 書き忘れた項目は素通り          │
  ├─────────────────┼──────────────────────┼────────────────────────────┤
  │ ② node-id 照合   │ SCSS の Figma: コメント  │ 手書き不要。箱の高さのズレ       │
  │ figma-nodes      │ ＋ Figmaのノード寸法     │ 色や字送りは見ない             │
  ├─────────────────┼──────────────────────┼────────────────────────────┤
  │ ③ カンプ照合      │ デザインの書き出し画像    │ 手書き不要。要素や余白の抜け      │
  │ figma-compare    │                      │ ダミーテキスト差で誤検出あり      │
  ├─────────────────┼──────────────────────┼────────────────────────────┤
  │ ④ DOM健全性      │ 何も要らない            │ 効かないgap・潰れ・はみ出し      │
  │ figma-sanity     │                      │ 値の正しさは見ない             │
  └─────────────────┴──────────────────────┴────────────────────────────┘

  ①の書き漏れ自体は figma-coverage（npm run verify:coverage）で洗う。
----------------------------------------------------------------------------*/
import { spawnSync } from 'node:child_process';
import { existsSync, readdirSync } from 'node:fs';

const BASE = process.env.VERIFY_BASE || 'http://localhost:8899';
const PAGES = [
	{ path: '/news/', comp: 'doc/PC_NEWS.jpg', compSp: 'doc/SP_NEWS.jpg' },
	{ path: '/contact/', comp: 'doc/PC_CONTACT.jpg', compSp: 'doc/SP_CONTACT.jpg' },
	{ path: '/document/', comp: 'doc/PC_DOCUMENT.jpg', compSp: 'doc/SP_DOCUMENT.jpg' },
	{ path: '/privacy-policy/', comp: 'doc/PC_PRIVACY_POLICY.jpg', compSp: 'doc/SP_PRIVACY_POLICY.jpg' },
	{ path: '/single-news/', comp: 'doc/PC_NEWS_DETAILS.jpg', compSp: 'doc/SP_NEWS_DETAILS.jpg' },
	{ path: '/cookie-policy/', comp: 'doc/PC_COOKIE_POLICY.jpg' }, // SPのアートボードは無い
	{ path: '/material/', comp: 'doc/PC_MATERIAL.jpg', compSp: 'doc/SP_MATERIAL.jpg' }, // PCのカンプは旧版（番号・フッターが違う）
	{ path: '/flow/', comp: 'doc/PC_FLOW.jpg', compSp: 'doc/SP_FLOW.jpg' },
	{ path: '/supply-chain/', comp: 'doc/PC_SUPPLY CHAIN.jpg', compSp: 'doc/SP_SUPPLY CHAIN.jpg' },
	{ path: '/location/', comp: 'doc/PC_LOCATION.jpg', compSp: 'doc/SP_LOCATION.jpg' }, // SPのカンプは Figma のフレーム名が SP-TECHNOLOGY のまま
	{ path: '/technology/', comp: 'doc/PC-TECHNOLOGY.jpg', compSp: 'doc/SP-TECHNOLOGY.jpg' }, // PCのカンプはフッターが920pxの旧版
	{ path: '/', comp: 'doc/PC_TOP.jpg', compSp: 'doc/SP_TOP.jpg' }, // 動画は静止画・Voice の SP は文言差で短い
	{ path: '/template.html' },
];

const run = (args, label) => {
	const r = spawnSync('node', args, { encoding: 'utf8' });
	const out = (r.stdout || '') + (r.stderr || '');
	return { label, code: r.status, out };
};

const results = [];

console.log('\n════ ① spec 照合（figma-verify）════');
for (const f of readdirSync('tools/spec').filter((f) => f.endsWith('.json'))) {
	const r = run(['tools/figma-verify.mjs', `tools/spec/${f}`], `spec ${f}`);
	const line = (r.out.match(/差分: .*$/m) || ['—'])[0];
	console.log(`  ${f.replace('.json', '').padEnd(22)} ${line}`);
	results.push(r);
}

console.log('\n════ ② node-id 照合（figma-nodes）════');
// template.html はコンポーネントの見本帳。ページ専用のブロックはそのページで測る。
for (const path of ['/template.html', '/single-news/', '/flow/', '/supply-chain/', '/technology/', '/']) {
	for (const vp of [['PC', 1440], ['SP', 402]]) {
		const r = run(['tools/figma-nodes.mjs', BASE + path, '--viewport', String(vp[1]), '--vp', vp[0]], `nodes ${path} ${vp[0]}`);
		const line = (r.out.match(/差分: .*$/m) || ['—'])[0];
		console.log(`  ${(path + ' ' + vp[0]).padEnd(22)} ${line}`);
		results.push(r);
	}
}

console.log('\n════ ③ カンプ照合（figma-compare）════');
for (const p of PAGES) {
	for (const [comp, w] of [[p.comp, 'PC'], [p.compSp, 'SP']]) {
		if (!comp || !existsSync(comp)) continue;
		const r = run(['tools/figma-compare.mjs', BASE + p.path, comp], `compare ${p.path} ${w}`);
		const line = (r.out.match(/ズレている帯: .*$/m) || ['—'])[0];
		const diff = (r.out.match(/全体の差 .*$/m) || [''])[0].trim();
		console.log(`  ${(p.path + ' ' + w).padEnd(22)} ${line}   ${diff}`);
		results.push(r);
	}
}

console.log('\n════ ④ DOM健全性（figma-sanity）════');
for (const vp of [1440, 402]) {
	const urls = PAGES.map((p) => BASE + p.path);
	const r = run(['tools/figma-sanity.mjs', ...urls, '--viewport', String(vp)], `sanity ${vp}`);
	const line = (r.out.match(/指摘: .*$/m) || ['—'])[0];
	console.log(`  ${String(vp + 'px').padEnd(22)} ${line}`);
	if (r.code) console.log(r.out.split('\n').filter((l) => l.includes('★')).map((l) => '    ' + l.trim()).join('\n'));
	results.push(r);
}

console.log('\n════ spec の書き漏れ（figma-coverage）════');
const cov = run(['tools/figma-coverage.mjs'], 'coverage');
console.log('  ' + (cov.out.match(/^■.*$/m) || ['—'])[0]);
for (const l of cov.out.split('\n').filter((l) => l.startsWith('★'))) console.log('  ' + l);
results.push(cov);

const ng = results.filter((r) => r.code).map((r) => r.label);
console.log(`\n──── まとめ ────`);
console.log(ng.length ? `  要確認: ${ng.join(' / ')}` : '  すべて許容内');
console.log('  ※③のカンプ照合はダミーテキスト差でも出る。①②④が通っていれば実装のズレではないことが多い。');
process.exitCode = 0; // 一覧を出すのが目的なので、個別の終了コードでは落とさない
