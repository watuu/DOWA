<?php

// -------------------------------------------------------
//    エディター設定 Gutenberg
// -------------------------------------------------------

/**
 * クラシックエディター
 */
function editor_classic( $use_block_editor, $post_type ) {
  if ( in_array($post_type, THEME_ENABLED_CLASSIC_EDITOR) ) return false;
  return $use_block_editor;
}
add_filter( 'use_block_editor_for_post_type', 'editor_classic', 10, 2 );

/**
 * グーテンベルグ無効化
 */
function editor_disable_block(){
    global $typenow;
    if( in_array( $typenow, THEME_DISABLED_BLOCK_EDITOR ) ){
        add_filter('user_can_richedit', function(){
            return false;
        });
    }
}
add_action( 'load-post.php', 'editor_disable_block' );
add_action( 'load-post-new.php', 'editor_disable_block' );

/**
 * エディター無効化
 */
add_action( 'init', function() {
    foreach (THEME_DISABLED_EDITOR as $post_type) {
        remove_post_type_support( $post_type, 'editor' );
    }
}, 99);


/**
 * エディターのスタイルシート
 *
 * 本文の見え方を公開側（.cm-post）に合わせるため、assets/css/editor.css を読む。
 * これは src/sass/editor.scss から作って dest/assets/ 経由で同期したもの（npm run build:theme）。
 *
 * 無い場合は読まない（同期前に 404 を出さないため）。
 * クラシックエディターは使っていない（THEME_ENABLED_CLASSIC_EDITOR が空）ので、
 * add_editor_style はファイルがあるときだけ呼ぶ。
 */
function editor__editor_styles() {
    add_theme_support('editor-styles');

    if (file_exists(get_template_directory() . '/assets/css/editor.css')) {
        add_editor_style('assets/css/editor.css');
    }
}
add_action('after_setup_theme', 'editor__editor_styles');

/**
 * ブロックエディターのスタイルシート追加
 *
 * 投稿タイプごとに assets/css/editor-{投稿タイプ}.css があれば足す。
 */
function editor__block_styles() {
    $dir = get_template_directory();
    $uri = get_template_directory_uri();

    $base = $dir . '/assets/css/editor.css';
    if (file_exists($base)) {
        wp_enqueue_style('theme-editor', $uri . '/assets/css/editor.css', [], filemtime($base));
    }

    $posttype = get_post_type();
    if (! $posttype) {
        return;
    }
    $extra = $dir . '/assets/css/editor-' . $posttype . '.css';
    if (file_exists($extra)) {
        wp_enqueue_style('theme-editor-' . $posttype, $uri . '/assets/css/editor-' . $posttype . '.css', ['theme-editor'], filemtime($extra));
    }
}
add_action('enqueue_block_editor_assets', 'editor__block_styles');

/*
 * 不要なパターンの削除
 */
function editor__remove_patterns() {
    $patterns = [
        'buttons',
        'columns',
        'gallery',
        'header',
        'text',
        'query',
    ];
    foreach ( $patterns as $pattern ) {
        unregister_block_pattern_category( $pattern );
    }
}
add_action( 'init', 'editor__remove_patterns' );
add_filter('should_load_remote_block_patterns', '__return_false');

/**
 * タグ有効化
 */
function editor_kses_allowed_html( $tags, $context ) {
    if ( $context == 'post' ) {
        $tags['svg'] = [
            'width' => true,
            'height' => true,
        ];
        $tags['use'] = [
            'href' => true,
        ];
        $tags['input'] = [
            'id' => true,
            'type' => true,
            'name' => true,
        ];
        $tags['source'] = [
            'srcset' => true,
        ];
        $tags['input'] = array(
            'type' => true,
            'name' => true,
            'value' => true,
            'id' => true,
            'class' => true,
            'placeholder' => true,
            'checked' => true,
            'readonly' => true,
            'disabled' => true,
            'maxlength' => true,
            'size' => true,
            'autocomplete' => true,
        );
    }
    return $tags;
}
add_filter( 'wp_kses_allowed_html', 'editor_kses_allowed_html', 10, 2 );
