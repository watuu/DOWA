<?php

// -------------------------------------------------------
//    計測タグ（Google タグマネージャー）
//
//    GA4（G-XNL73V2GQK）は GTM の中で設定する。テーマにはコンテナだけ置く。
//    header.php / en/header.php の両方がこのフックで出すので、日英で書き分けは不要。
//
//    同意管理は STRIGHT ONE（CMP）。バナーは HTML に直接置き（マニュアル 3.1）、
//    GA4 の発火は GTM のトリガーで止める（マニュアル 4.2。GTM-STRIGHT_v2.json をインポート済みの前提）。
//    バナースクリプトは GTM より前に出す必要があるので priority 0。
//    Tag Auto Control / Google 同意モードは使わない。
// -------------------------------------------------------

const THEME_GTM_ID = 'GTM-W479KS5G';

// STRIGHT ONE のサイトID。管理コンソールのサイト登録ごとに別の値になる
// （現在は検証サイト https://820e.net/DOWA/ のもの。本番を登録したら差し替える）
const THEME_STRIGHT_SITE_ID = 'SIT-a3fd6f8f-e8ce-4bde-94fb-9cbd88c651e5';

/**
 * STRIGHT ONE バナー（<head> の、GTM より前）
 */
function theme_tag_stright_head() {
    if (!THEME_STRIGHT_SITE_ID) {
        return;
    }
    $id = esc_attr(THEME_STRIGHT_SITE_ID);
    echo <<< __EOT__
<!-- STRIGHT ONE Banner Script Start -->
<script type="module" src="https://cdn01.stright.bizris.com/js/cookie_consent_setting.js?banner_type=banner" charset="UTF-8" data-site-id="{$id}"></script>
<!-- STRIGHT ONE Banner Script End -->

__EOT__;
}
add_action('wp_head', 'theme_tag_stright_head', 0);

/**
 * GTM 本体（<head> のなるべく上）
 */
function theme_tag_gtm_head() {
    if (!THEME_GTM_ID) {
        return;
    }
    $id = esc_js(THEME_GTM_ID);
    echo <<< __EOT__
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{$id}');</script>
<!-- End Google Tag Manager -->

__EOT__;
}
add_action('wp_head', 'theme_tag_gtm_head', 1);

/**
 * GTM noscript（<body> 直後）
 */
function theme_tag_gtm_body() {
    if (!THEME_GTM_ID) {
        return;
    }
    $id = esc_attr(THEME_GTM_ID);
    echo <<< __EOT__
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={$id}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

__EOT__;
}
add_action('wp_body_open', 'theme_tag_gtm_body');
