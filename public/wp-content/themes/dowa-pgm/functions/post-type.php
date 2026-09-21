<?php

// -------------------------------------------------------
//    投稿タイプ
//
//    news    … 新着情報（日本語）  /news/       詳細 /news/{スラッグ}/
//    news_en … 新着情報（英語）    /en/news/    詳細 /en/news/{スラッグ}/
//
//    既定の「投稿」（post）はこのサイトでは使わない。
//    テンプレートは archive-news.php / single-news.php と、
//    英語が en/archive-news.php / en/single-news.php（振り分けは functions/setting.php）。
// -------------------------------------------------------

/**
 * 投稿タイプとカテゴリの登録
 */
function post_type__register() {

    register_post_type('news', [
        'label'         => '新着情報',
        'labels'        => [
            'name'          => '新着情報',
            'singular_name' => '新着情報',
            'add_new_item'  => '新着情報を追加',
            'edit_item'     => '新着情報を編集',
            'all_items'     => '新着情報一覧',
        ],
        'public'        => true,
        'has_archive'   => 'news',
        // with_front … パーマリンク構造の接頭辞を付けない（いまは /%postname%/ なので影響は無いが、
        //              構造を /blog/%postname%/ 等に変えたときに /blog/news/ にならないようにする）
        'rewrite'       => ['slug' => 'news', 'with_front' => false],
        'supports'      => ['title', 'editor', 'thumbnail', 'revisions'],
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-megaphone',
        'show_in_rest'  => true, // ブロックエディタを使う
    ]);

    register_post_type('news_en', [
        'label'         => '新着情報（英）',
        'labels'        => [
            'name'          => '新着情報（英）',
            'singular_name' => '新着情報（英）',
            'add_new_item'  => '新着情報（英）を追加',
            'edit_item'     => '新着情報（英）を編集',
            'all_items'     => '新着情報（英）一覧',
        ],
        'public'        => true,
        'has_archive'   => 'en/news',
        'rewrite'       => ['slug' => 'en/news', 'with_front' => false],
        'supports'      => ['title', 'editor', 'thumbnail', 'revisions'],
        'menu_position' => 6,
        'menu_icon'     => 'dashicons-megaphone',
        'show_in_rest'  => true,
    ]);

    // カテゴリ（カードに出る「お知らせ」のラベル）。
    // デザインにカテゴリ別の一覧ページが無いので public => false にして、
    // アーカイブURLを作らず管理画面の選択肢としてだけ使う。
    $tax = [
        'public'            => false,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'hierarchical'      => true, // カテゴリ型のUI（チェックボックス）
    ];

    register_taxonomy('news_cat', 'news', $tax + [
        'label'  => 'カテゴリ',
        'labels' => ['name' => 'カテゴリ', 'singular_name' => 'カテゴリ', 'add_new_item' => 'カテゴリを追加'],
    ]);

    register_taxonomy('news_en_cat', 'news_en', $tax + [
        'label'  => 'カテゴリ（英）',
        'labels' => ['name' => 'カテゴリ（英）', 'singular_name' => 'カテゴリ（英）', 'add_new_item' => 'カテゴリ（英）を追加'],
    ]);
}
add_action('init', 'post_type__register');

/**
 * 投稿タイプ・タクソノミーを足したあと1回だけリライトを更新する
 *
 * 毎回 flush_rewrite_rules() を呼ぶと重いので、バージョンを上げたときだけ流す。
 * ルールを変えたら POST_TYPE_REWRITE_VERSION を +1 すること。
 */
const POST_TYPE_REWRITE_VERSION = 1;

function post_type__maybe_flush() {
    if ((int) get_option('theme_rewrite_version') === POST_TYPE_REWRITE_VERSION) {
        return;
    }
    flush_rewrite_rules(false);
    update_option('theme_rewrite_version', POST_TYPE_REWRITE_VERSION);
}
add_action('init', 'post_type__maybe_flush', 99);

/**
 * 記事の1件目のカテゴリ名（カードのタグ）
 */
function theme_news_term_name($post = null) {
    $post = get_post($post);
    if (! $post) {
        return '';
    }
    $taxonomy = ($post->post_type === 'news_en') ? 'news_en_cat' : 'news_cat';
    $terms = get_the_terms($post, $taxonomy);
    if (! $terms || is_wp_error($terms)) {
        return '';
    }
    return $terms[0]->name;
}

/**
 * 記事の日付（静的コーディングと同じ 2025.04.01 の形）
 */
function theme_news_date($post = null) {
    return get_the_date('Y.m.d', $post);
}
