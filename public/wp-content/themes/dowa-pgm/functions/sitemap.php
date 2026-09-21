<?php

// -------------------------------------------------------
//    sitemap（WP コアの wp-sitemap.xml）
// -------------------------------------------------------

/**
 * サイトマップのリクエストを 404 にしない
 *
 * このサイトは既定の「投稿」を使っていない（0件）。
 * WP はサイトマップのリクエストを「投稿が1件も無いホーム」と見なして 404 ヘッダーを送るため、
 * 中身は出ているのにステータスが 404 になり、検索エンジンに読まれない。
 * サイトマップのクエリのときだけ 404 判定を飛ばす。
 */
add_filter('pre_handle_404', function ($preempt, $query) {
    if ($preempt) {
        return $preempt;
    }
    return '' !== (string) $query->get('sitemap');
}, 10, 2);

/**
 * 検索結果に出さないページをサイトマップから外す
 *
 * いまは完了画面（/contact/thanks/ ・ /document/thanks/ と英語版）。
 * テンプレート側で noindex にしているので、サイトマップにも載せない。
 */
function theme_sitemap_excluded_page_ids() {
    $pages = get_posts([
        'post_type'      => 'page',
        'name'           => 'thanks', // 4枚とも post_name は thanks
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ]);
    return $pages ?: [];
}

add_filter('wp_sitemaps_posts_query_args', function ($args, $post_type) {
    if ('page' !== $post_type) {
        return $args;
    }
    $exclude = theme_sitemap_excluded_page_ids();
    if ($exclude) {
        $args['post__not_in'] = array_merge($args['post__not_in'] ?? [], $exclude);
    }
    return $args;
}, 10, 2);

/**
 * 使っていないものをサイトマップから外す
 *
 * users … 著者アーカイブは出さない（テーマ側でも 404 にしている）
 * post / category / post_tag … 既定の投稿を使っていない
 */
add_filter('wp_sitemaps_add_provider', function ($provider, $name) {
    return 'users' === $name ? null : $provider;
}, 1, 2);

add_filter('wp_sitemaps_post_types', function ($post_types) {
    unset($post_types['post']);
    return $post_types;
});

add_filter('wp_sitemaps_taxonomies', function ($taxonomies) {
    unset($taxonomies['category'], $taxonomies['post_tag']);
    return $taxonomies;
});
