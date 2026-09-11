# boilerplate_ws2021

## 概要
Pug + Sass + Rollup.js ベースのフロントエンドボイラープレート。

## 開発コマンド
- `npm run sass` — SCSSをビルド（`src/sass/style.scss` → `dest/assets/css/style.css`）
- `npm run pug` — Pugをコンパイル（`src/pug/` → `dest/`）
- `npm run js:watch` — JS開発ビルド（ウォッチモード）
- `npm run js:build` — JS本番ビルド（terser圧縮）

## ディレクトリ構成
```
src/
  js/
    app.js          # エントリーポイント
    common.js       # 共通処理（scroll, menu, animation等）
    page.js         # ページ固有処理
    utility.js      # 静的ユーティリティメソッド
    budoux.js       # BudouXによる日本語折り返し
    barba.js        # ページトランジション（現在無効化中）
    slider-swiper.js # Swiper実装の参照例（app.jsからはimportされておらず、rollupのビルド対象外）
  sass/
    style.scss      # エントリーポイント
    Base/           # リセット・変数・フォント等
    Component/      # UIコンポーネント（c-btn, c-card等）
    Layout/         # レイアウト（l-header, l-footer等）
    Module/         # モジュール
    PageBlock/      # ページ固有ブロック
    Utility/        # ユーティリティクラス
  pug/
    index.pug       # エントリー
    _include/       # 共通パーツ（head, header, footer等）
dest/               # ビルド成果物（コミット不要）
```

## 規約
- **JS**: Vanilla JS 優先。jQuery依存は撤去済み（必要になった場合のみ個別に追加する）
- **CSS命名**: BEM記法（Block__Element--Modifier）
- **レイアウト接頭辞**: `l-`、コンポーネント: `c-`、JS用フック: `js-`、状態: `is-`
- **基準幅**: SPは **402px**（FigmaのSPアートボード幅。`Base/_font.scss` の rem 基準）/ PCは 1440px
- **ブレークポイント**: SP（〜640px）/ TAB（641〜1023px）/ PC（1024px〜）/ WIDE（1921px〜）
  定義元は `src/sass/Base/_config.scss` の `$breakpoints`（sm: 640 / md: 1023 / lg: 1920）。
  mixin は `sp` `sp-tab` `sp-lap` / `tab` `tab-lap` `tab-pc` / `lap` / `pc` `pc-tab` / `wide`

## Figma実装
Figmaデザインの実装・修正は **`.claude/skills/figma-impl`** の手順に従う（Figma URL / node-id を渡されたとき、
「px確認して」「余白がちがう」と言われたときは必ずこのスキルを読んでから着手する）。要点だけ再掲:

- **本件の Figma はデザインの揺れが大きいので、`doc/design-tokens.md` を正とする。**
  フォント / 色 / font-size / line-height / letter-spacing / 角丸 はドキュメントの値を使い、
  Figma と食い違ってもドキュメントに合わせる。食い違いはドキュメントの「6. 未決事項」に追記する。
  ドキュメントに記載のない座標・寸法・余白（x/y/w/h、要素間の間隔）だけ Figma の実測を正とする
- **コンポーネントの箱の寸法（w / h）を先に合わせてから、余白を入れる。**
  隣接要素の座標の引き算だけで `margin-top` を決めると、コンポーネント側のバグを
  マジックナンバーで打ち消すことになり、同じクラスを使う他ページが全部ずれる
- `svg(width=32 height=32)` のように属性を持つインラインSVGは、CSSで `width` だけ指定しても
  **height属性が素通りする**。箱に width / height を両方指定するか、`svg { width:100%; height:auto }` を書く
- 参照した **Figma の node-id を SCSS のコメントに必ず残す**（`// Figma: SP 1725-3735 / PC 1549-4594`）
- 位置は比率で（`left: 73.125%; // 1053 / 1440`）、サイズ・余白・字送りは px 起点で書く
- 罫線・塗りの色は `get_design_context` の要約を鵜呑みにせず、アセットSVGの実体
  （`opacity` / `stroke-width` / `stroke-linecap`）を確認する

## 環境変数
- `.env.development` / `.env.production` で切り替え（`dotenv` 使用）
- `VUE_APP_API_URL` など rollup-config.js の `replace` で埋め込む

## 動作確認（Playwright）
- CSSやインタラクションの確認が必要な場合、Playwrightを使用する
- インストールはプロジェクトローカル（`devDependencies`）に限定し、globalインストールはしない（バージョン固定・再現性のため）
- 導入済み（`@playwright/test` を `devDependencies` に追加済み）。新しい環境では `npx playwright install chromium` だけ実行する

### px照合
実装後は目視で終わらせず、`tools/figma-verify.mjs` で数値照合する。

```bash
npm run sass && npm run pug                              # ★先にビルド。古い dest/ を測ると結果が無意味になる
cd dest && python3 -m http.server 8899                   # dest/ を配信し、その URL を spec の url に書く
cp tools/figma-spec.example.json tools/spec/<page>.json   # 仕様書を作る
npm run verify -- tools/spec/<page>.json                 # --only SP / --tolerance 2 / --json を後ろに付けられる
npm run verify:all                                       # ★4方式まとめて（spec / node-id / カンプ / DOM健全性）
npm run verify:coverage                                  # spec の書き漏れだけ洗う
```

照合は**性質の違う4つを重ねる**。手書きの spec（①）だけだと書き忘れた項目が永遠に素通りする。
②はSCSSの `Figma:` コメントの node-id から自動照合（期待値の手書きゼロ）、③は `doc/` のカンプ画像と
行ごとに突き合わせ、④は「効かないgap・潰れ・はみ出し」を値を知らずに検出する。

照合は**外側から3段**で閉じる。①パンくず・フッターの絶対y ②パネル・セクションの高さ ③部品の w/h・タイポ。
部品単体の寸法だけを並べた spec は、ブロック間の余白の抜けを1件も検出しない。

仕様書には座標（x/y/w/h）だけでなく **font-size / line-height / letter-spacing / border の太さと色 /
border-radius** まで書く。spec に書いていない属性は検出されない。
**タイポ・色・角丸の期待値は Figma ではなく `doc/design-tokens.md` の値を書く**（Figma 由来にすると
デザインの揺れをそのまま差分として拾ってしまう）。
許容差はキーごとに違う（`--tolerance` が効くのは x/y/w/h だけ。fontSize/borderRadius ±0.5、
lineHeight ±1、letterSpacing ±0.05 は別枠で、spec の `tolerances` で上書きできる）。
終了コードは `0` 差分なし / `1` 差分あり / `2` 結果が無効で、`--json` でも同じ。
ダミーテキストの行数差でページ下部の絶対yは必ずずれるので、`baseline` にセクション先頭の要素を
指定して相対で判定する。`baseline が見つかりません` が出た回は補正 0 のまま比較が走っているので、
差分は読まずにセレクタを直して測り直す（終了コード 2）。

## 依存関係管理
- `package-lock.json` をコミットし、`npm install` の再現性を確保する
- バージョン更新は基本的に `npm update`（`package.json` の semver 範囲内）で対応し、メジャーアップグレードは動作確認のうえ個別に判断する
