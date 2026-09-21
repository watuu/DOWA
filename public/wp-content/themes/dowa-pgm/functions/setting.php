<?php

// -------------------------------------------------------
//    サイト設定
// -------------------------------------------------------
/**
 * メディアの設定
 *
 */
add_theme_support( 'post-thumbnails', THEME_SUPPORT_EYTCHATCH );
if (THEME_MEDIA_SIZES) {
    foreach (THEME_MEDIA_SIZES as $media) {
        add_image_size( $media[0], $media[1], $media[2], $media[3] );
    }
}

/**
 * ログイン画面変更
 *
 */
function setting__login_logo() {
    $path = get_stylesheet_directory_uri();
    echo <<< __EOT__
<style type="text/css"> 
	body.login div#login h1 a {
	width: auto;
	background: url('{$path}/assets/img/logo.svg') center center/90% auto no-repeat;
	padding-bottom: 30px; 
} 
</style>
__EOT__;
}
add_action( 'login_enqueue_scripts', 'setting__login_logo' );

// ロゴのリンク先を指定
function setting__login_logo_url()
{
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'setting__login_logo_url');

/**
 * 管理者以外にアップデートのお知らせ非表示
 *
 */
function setting__update_nag_admin_only() {
    if ( ! current_user_can( 'administrator' ) ) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_init', 'setting__update_nag_admin_only' );

/**
 * 管理画面CSS
 *
 */
function setting__admin_css() {
    echo <<< __EOT__
<style type="text/css">
.acf_postbox .field textarea {min-height:0 !important;}
</style>
__EOT__;
}
add_filter('admin_head','setting__admin_css');

/**
 * 固定ページのテンプレート解決
 *
 * ・英語ページ（URI が en/ で始まる）は **en/ ディレクトリ**のテンプレートを使う
 *       /en/material/        → en/page-material.php
 *       /en/contact/thanks/  → en/page-contact__thanks.php
 *       /en/                 → en/front-page.php
 *   見つからないときは en/page.php（英語の既定）へ落とす
 *
 * ・日本語の階層ページは __ でつなぐ
 *       /contact/thanks/     → page-contact__thanks.php
 *
 * ・あわせて WP 既定の page-{末尾スラッグ}.php を**階層ページから外す**。
 *   既定の階層は末尾のスラッグしか見ないので、外さないと
 *       /en/material/    → page-material.php（日本語版）
 *       /contact/thanks/ と /document/thanks/ → 同じ page-thanks.php
 *   のように、別ページのテンプレートへ黙って落ちてしまう。
 */
function setting__page_templates($templates) {
    global $wp_query;

    $pagename = $wp_query->query['pagename'] ?? null;
    if (! $pagename || get_page_template_slug()) {
        return $templates;
    }
    // マルチバイトのスラッグはファイル名にできないので触らない
    if (urldecode($pagename) !== $pagename) {
        return $templates;
    }

    $segments = explode('/', trim($pagename, '/'));
    $slug     = end($segments);
    $isEn     = ($segments[0] === 'en');
    $nested   = count($segments) > 1;

    // 末尾のスラッグだけを見た既定の候補を抜く（英語ページも別ページ扱いにする）
    if ($nested || $isEn) {
        $templates = array_values(array_diff($templates, ["page-{$slug}.php"]));
    }

    if ($isEn) {
        $rest = array_slice($segments, 1);
        $head = $rest
            ? 'en/page-' . implode('__', $rest) . '.php'
            : 'en/front-page.php'; // /en/ 自体（英語トップ）
        array_splice($templates, 0, 0, [$head, 'en/page.php']);
        return $templates;
    }

    array_unshift($templates, 'page-' . implode('__', $segments) . '.php');
    return $templates;
}
add_filter('page_template_hierarchy', 'setting__page_templates');


/**
 * Webp許可
 *
 */
function setting__upload_mimes( $mimes ) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'setting__upload_mimes' );
/**
 * 新着情報（英）のテンプレートも en/ ディレクトリから探す
 *
 * WP の既定は archive-news_en.php / single-news_en.php をテーマ直下でしか見ないので、
 * 英語のテンプレートをまとめている en/ を候補の先頭に足す。
 *   /en/news/            → en/archive-news.php
 *   /en/news/{スラッグ}/ → en/single-news.php
 */
function setting__news_en_templates($templates) {
    if (is_post_type_archive('news_en')) {
        array_unshift($templates, 'en/archive-news.php');
    } elseif (is_singular('news_en')) {
        array_unshift($templates, 'en/single-news.php');
    }
    return $templates;
}
add_filter('archive_template_hierarchy', 'setting__news_en_templates');
add_filter('single_template_hierarchy', 'setting__news_en_templates');
