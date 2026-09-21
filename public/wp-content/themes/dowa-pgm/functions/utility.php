<?php

// -------------------------------------------------------
//    ユーティリティー
// -------------------------------------------------------

/**
 *  ページネーション（一覧の数字送り）
 *
 *  静的コーディング src/pug/news/index.pug の .cm-navi-paginate と同じ出力にする。
 *    前送り  … span.is-disabled（先頭）/ a
 *    数字    … span.is-current（現在地）/ a
 *    後送り  … a / span.is-disabled（末尾）
 *  「…」は .cm-navi-paginate__ellipsis。三角アイコンは #ico_tri_r（前送りは CSS で反転）。
 *
 *  @param string $prevLabel 前送りの aria-label（英語ページは 'Previous page' を渡す）
 *  @param string $nextLabel 後送りの aria-label
 *  @param string $navLabel  nav の aria-label
 */
function theme_paginate($prevLabel = '前のページへ', $nextLabel = '次のページへ', $navLabel = 'ページ送り') {
    global $wp_query;

    $total = (int) $wp_query->max_num_pages;
    if ($total < 2) {
        return;
    }
    $current = max(1, (int) get_query_var('paged'));
    $icon = theme_icon('tri_r');

    // 現在地の前後2つ＋先頭・末尾。離れていたら「…」でつなぐ
    $nums = [];
    for ($i = 1; $i <= $total; $i++) {
        if ($i === 1 || $i === $total || abs($i - $current) <= 2) {
            $nums[] = $i;
        }
    }

    $ctrl = function ($page, $mod, $label) use ($icon, $total) {
        $disabled = ($page < 1 || $page > $total);
        if ($disabled) {
            printf(
                '<span class="cm-navi-paginate__ctrl cm-navi-paginate__ctrl--%s is-disabled" aria-hidden="true">%s</span>',
                esc_attr($mod),
                $icon
            );
            return;
        }
        printf(
            '<a class="cm-navi-paginate__ctrl cm-navi-paginate__ctrl--%s" href="%s" aria-label="%s">%s</a>',
            esc_attr($mod),
            esc_url(get_pagenum_link($page)),
            esc_attr($label),
            $icon
        );
    };

    printf('<nav class="cm-navi-paginate" aria-label="%s">', esc_attr($navLabel));
    $ctrl($current - 1, 'prev', $prevLabel);

    $last = 0;
    foreach ($nums as $i) {
        if ($last && $i - $last > 1) {
            echo '<span class="cm-navi-paginate__ellipsis" aria-hidden="true">…</span>';
        }
        if ($i === $current) {
            printf('<span class="cm-navi-paginate__num is-current" aria-current="page">%d</span>', $i);
        } else {
            printf('<a class="cm-navi-paginate__num" href="%s">%d</a>', esc_url(get_pagenum_link($i)), $i);
        }
        $last = $i;
    }

    $ctrl($current + 1, 'next', $nextLabel);
    echo '</nav>';
}

/**
 *  詳細の前後送り（.cm-navi-pager）
 *
 *  静的コーディング src/pug/single-news/index.pug と同じ出力。
 *  前後の記事が無いときはリンクにせず、押せない見た目にする。
 *
 *  @param string $archiveUrl 「一覧へもどる」の行き先
 *  @param array  $labels     ['prev' => '前へ', 'back' => '一覧へもどる', 'next' => '次へ', 'nav' => '記事送り']
 */
function theme_news_pager($archiveUrl, array $labels) {
    $prev = get_previous_post();
    $next = get_next_post();
    $icon = theme_icon('tri_r');

    printf('<nav class="cm-navi-pager p-single-news-pager" aria-label="%s">', esc_attr($labels['nav']));

    // 前へ＝1つ古い記事（get_previous_post）、次へ＝1つ新しい記事（get_next_post）。
    // 端の記事では、その向きだけリンクにせず .is-disabled（Utility/_u-utility.scss）にする
    $prevInner = sprintf(
        '<span class="cm-navi-pager__btn cm-navi-pager__btn--prev">%s</span><span class="cm-navi-pager__label">%s</span>',
        $icon,
        esc_html($labels['prev'])
    );
    echo $prev
        ? sprintf('<a class="cm-navi-pager__item" href="%s">%s</a>', esc_url(get_permalink($prev)), $prevInner)
        : sprintf('<span class="cm-navi-pager__item is-disabled" aria-hidden="true">%s</span>', $prevInner);

    printf(
        '<a class="cm-navi-pager__item" href="%s"><span class="cm-navi-pager__grid" aria-hidden="true"><span></span><span></span><span></span><span></span></span><span class="cm-navi-pager__label">%s</span></a>',
        esc_url($archiveUrl),
        esc_html($labels['back'])
    );

    $nextInner = sprintf(
        '<span class="cm-navi-pager__label">%s</span><span class="cm-navi-pager__btn">%s</span>',
        esc_html($labels['next']),
        $icon
    );
    echo $next
        ? sprintf('<a class="cm-navi-pager__item" href="%s">%s</a>', esc_url(get_permalink($next)), $nextInner)
        : sprintf('<span class="cm-navi-pager__item is-disabled" aria-hidden="true">%s</span>', $nextInner);

    echo '</nav>';
}

/**
 * メインカテゴリー取得
 *
 * @params $return
 */
function get_main_category($return = 'full') {
    $categories = get_the_category();
    if ($categories) {
        $category = array_shift($categories);
        if ($return == 'full') {
            return $category;
        }
        return $category->{$return};
    }
    return false;
}

/**
 *  メインターム取得
 *
 *  @params $return
 */
function get_main_term($return = 'full') {
    $taxonomies = get_object_taxonomies(get_post_type());
    if (is_array($taxonomies)) {
        $taxonomy =  array_shift($taxonomies);
        $terms = get_the_terms(get_the_ID(), $taxonomy);
        if (is_array($terms)) {
            foreach ($terms as $term) {
                if ($return == 'full') {
                    return $term;
                }
                return $term->{$return};
            }
        }
    }
    return false;
}

/**
 * アーカイブページで情報取得
 *
 */
function get_current_term() {
    $id = '';
    $tax_slug = '';
    if (is_category()) {
        $tax_slug = "category";
        $id = get_query_var('cat');
    } else if (is_tag()) {
        $tax_slug = "post_tag";
        $id = get_query_var('tag_id');
    } else if (is_tax()) {
        $tax_slug = get_query_var('taxonomy');
        $term_slug = get_query_var('term');
        $term = get_term_by("slug",$term_slug,$tax_slug);
        $id = $term->term_id;
    }
    return get_term($id, $tax_slug);
}

/**
 * 記事テキストの抜粋
 *
 */
function get_excerpt_from_article($text = null, $count = 200) {
    return mb_strimwidth(htmlspecialchars(str_replace(array("\r\n", "\n", "\r", "&nbsp;", ''), '', strip_tags($text)), ENT_QUOTES), 0, $count, '...');
}
