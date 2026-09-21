<?php

// -------------------------------------------------------
//    フロント側 初期設定
// -------------------------------------------------------

/* 不要タグ削除 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

/* タイトルタグの自動出力 */
add_theme_support( 'title-tag' );

/**
 * 投稿件数設定
 *
 */
function front_load__pre_get_posts($query) {
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
    if (is_post_type_archive(['news', 'news_en'])) {
        $query->set('posts_per_page', THEME_COMMON_ARCHIVE_NUM ?: get_option('posts_per_page'));
        // $query->set('nopaging', 1);
    }
}
add_action('pre_get_posts', 'front_load__pre_get_posts');


/**
 *  CSS / JS の読み込み
 *
 *  assets/ の中身は dest/assets/ を同期したもの（`npm run sync:theme`）。
 *  更新のたびにファイル名を変えずに済むよう、バージョンに filemtime を使う。
 */
function front_load__assets() {
    $dir = get_template_directory();
    $uri = get_template_directory_uri();

    $css = $dir . '/assets/css/style.css';
    if ( file_exists( $css ) ) {
        wp_enqueue_style( 'theme-style', $uri . '/assets/css/style.css', [], filemtime( $css ) );
    }

    $js = $dir . '/assets/js/app.js';
    if ( file_exists( $js ) ) {
        wp_enqueue_script( 'theme-app', $uri . '/assets/js/app.js', [], filemtime( $js ), true );
    }

    // 静的側と同じ Google Fonts（Noto Sans JP / Poppins）
    wp_enqueue_style(
        'theme-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
        [],
        null
    );
}
add_action( 'wp_enqueue_scripts', 'front_load__assets' );

/**
 * WP が入れてくる既定のCSSを外す
 *
 * 静的コーディングには block-library / global-styles / classic-theme-styles が無く、
 * 入ったままだと素の見た目が混ざる。本文（.cm-post）の見た目は style.css が持っている。
 * ※ ブロックエディタ側（管理画面）の読み込みは外さない
 */
function front_load__dequeue_default_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'front_load__dequeue_default_styles', 100 );

/**
 * Google Fonts の preconnect（静的側の <link rel="preconnect"> と同じ）
 */
function front_load__resource_hints( $hints, $relation ) {
    if ( 'preconnect' === $relation ) {
        $hints[] = 'https://fonts.googleapis.com';
        $hints[] = [ 'href' => 'https://fonts.gstatic.com', 'crossorigin' => '' ];
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'front_load__resource_hints', 10, 2 );

function is_parent_slug()
{
    global $post;
    if (is_page()){
        if ($post->post_parent) {
            $post_data = get_post($post->post_parent);
            return $post_data->post_name;
        }
    }
    return false;
}

function theme_get_picture( $attachment, $size = 'thumbnail' ) {
    if (isset($attachment['sizes'])) {
        return $attachment['sizes'][$size];
    }
    $src = wp_get_attachment_image_src($attachment, $size);
    return ($src) ? array_shift($src): null;
}

/**
 * フォーム wpautop
 */
//function mvwpform_autop_filter() {
//    if (class_exists('MW_WP_Form_Admin')) {
//        $mw_wp_form_admin = new MW_WP_Form_Admin();
//        $forms = $mw_wp_form_admin->get_forms();
//        foreach ($forms as $form) {
//            add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
//        }
//    }
//}
//mvwpform_autop_filter();

