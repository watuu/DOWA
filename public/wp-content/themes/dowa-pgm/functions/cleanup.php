<?php

// -------------------------------------------------------
//    使わない機能を止める
//
//    このサイトのデザインには検索・コメント・著者ページが無い。
//    出しっぱなしにすると、素の見た目のページが 200 で返って
//    検索エンジンにも拾われるので、まとめて 404 にする。
// -------------------------------------------------------

/**
 * 検索を無効にする（2026-09-21 ユーザー判断）
 *
 * /?s=... は 404 にし、検索フォーム・検索用のリライトも出さない。
 */
function cleanup__disable_search($query) {
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }
    if ($query->is_search()) {
        $query->is_search = false;
        $query->set('s', '');
        $query->set_404();
        status_header(404);
        nocache_headers();
    }
}
add_action('parse_query', 'cleanup__disable_search');

// 検索フォームを出さない（ウィジェット・ブロック経由の呼び出しも含む）
add_filter('get_search_form', '__return_empty_string');

/**
 * 著者アーカイブ・日付アーカイブを 404 にする
 *
 * どちらもデザインが無く、中身が空のページが出てしまう。
 */
function cleanup__disable_archives($query) {
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }
    if ($query->is_author() || $query->is_date()) {
        $query->set_404();
        status_header(404);
        nocache_headers();
    }
}
add_action('parse_query', 'cleanup__disable_archives');

// 著者ページへのリンク（?author=1 の推測も含む）を作らせない
add_filter('author_link', function () {
    return home_url('/');
});

/**
 * コメントを無効にする（2026-09-21 ユーザー判断）
 *
 * デザインにコメント欄が無い。投稿タイプからサポートを外し、
 * 既存の投稿でも受け付けず、管理画面のメニューからも消す。
 */
add_action('init', function () {
    foreach (get_post_types([], 'names') as $post_type) {
        remove_post_type_support($post_type, 'comments');
        remove_post_type_support($post_type, 'trackbacks');
    }
}, 99);

add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);
add_filter('comments_array', '__return_empty_array', 20);

// 管理画面からコメントを隠す
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
add_action('wp_before_admin_bar_render', function () {
    if (isset($GLOBALS['wp_admin_bar'])) {
        $GLOBALS['wp_admin_bar']->remove_node('comments');
    }
});
// ダッシュボードの「最近のコメント」も出さない
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});
