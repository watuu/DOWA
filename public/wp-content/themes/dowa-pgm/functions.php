<?php

/*-------------------------------------------------------
    テーマ全体の設定値

    投稿タイプ … news（新着情報）/ news_en（新着情報・英）
    固定ページ … テンプレート直書き（page-material.php 等）。本文エディタは使わない
-------------------------------------------------------*/

// アイキャッチを使う投稿タイプ（add_theme_support の第2引数）
const THEME_SUPPORT_EYTCHATCH = ['news', 'news_en'];

// 本文エディタごと外す投稿タイプ。固定ページはテンプレートで組むので中身を持たせない
const THEME_DISABLED_EDITOR = ['page'];

// ブロックエディタだけ止める投稿タイプ（新着情報はブロックエディタで書く）
const THEME_DISABLED_BLOCK_EDITOR = [];

// クラシックエディタを使う投稿タイプ
const THEME_ENABLED_CLASSIC_EDITOR = [];

/*
 * 追加する画像サイズ … [名前, 幅, 高さ, 切り抜き]
 *
 * 編集者が入れる画像は「記事のアイキャッチ」と「本文中の画像」の2つだけ。
 * 一覧カード（.c-card-news）もトップの新着情報もサムネイルを持たないので、一覧用のサイズは要らない。
 *
 * eyecatch … .cm-post-eyecatch。表示は PC 843×450 / SP 322×172 で object-fit: cover。
 *            高解像度用に2倍の 1686×900 を切り抜きで作る
 *            （Figma: SP 3139-7341 / PC 2669-14226。src/sass/Module/_cm-post.scss）
 *
 * 本文中の画像は WP 既定の large を使う。本文幅が PC 844 なので、
 * 設定 > メディア の「大サイズ」を 1688（844 の2倍）にしてある。既定の 1024 のままだと2倍に足りない。
 */
const THEME_MEDIA_SIZES = [
    ['eyecatch', 1686, 900, true],
];

// 一覧の表示件数（新着情報。静的カンプは1ページ10件 + ページ送り）
const THEME_COMMON_ARCHIVE_NUM = 10;

// ACF の Google Map フィールド用。**現状このサイトでは未使用**
// （拠点一覧の地図は maps.google.com の iframe 埋め込みで、APIキーを使わない。
//   src/pug/_include/_location-parts.pug）。ACF を入れて地図フィールドを使うときだけ差し替える
const GOOGLE_MAP_KEY = "xxx";

// -------------------------------------------------------
//    サイト設定
// -------------------------------------------------------
require_once(__DIR__ . '/functions/setting.php');

// -------------------------------------------------------
//    管理画面設定
// -------------------------------------------------------
require_once(__DIR__ . '/functions/admin.php');

// -------------------------------------------------------
//    エディター設定 Gutenberg
// -------------------------------------------------------
require_once(__DIR__ . '/functions/editor.php');

// -------------------------------------------------------
//    ACFの設定
// -------------------------------------------------------
require_once(__DIR__ . '/functions/acf.php');

// -------------------------------------------------------
//    テンプレート用ヘルパー（header/footer/page-* が使う）
// -------------------------------------------------------
require_once(__DIR__ . '/functions/post-type.php');
require_once(__DIR__ . '/functions/template.php');
require_once(__DIR__ . '/functions/form.php');
require_once(__DIR__ . '/functions/ogp.php');

// -------------------------------------------------------
//    フロント側 初期設定
// -------------------------------------------------------
require_once(__DIR__ . '/functions/front.php');
require_once(__DIR__ . '/functions/sitemap.php');
require_once(__DIR__ . '/functions/cleanup.php');

// -------------------------------------------------------
//    ショートコード
// -------------------------------------------------------
require_once(__DIR__ . '/functions/shortcode.php');

// -------------------------------------------------------
//    ユーティリティー
// -------------------------------------------------------
require_once(__DIR__ . '/functions/utility.php');
