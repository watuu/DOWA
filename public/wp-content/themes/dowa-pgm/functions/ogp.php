<?php

// -------------------------------------------------------
//    OGP / Twitter カード
//
//    静的コーディング src/pug/_default.pug はトップにだけ空の OGP を置いていたので、
//    中身はここで組む。**日英でサイト名・og:locale が変わる**ので、テーマ側で出している。
//
//    SEO SIMPLE PACK など OGP を出すプラグインを入れたら二重になるので、
//    そのときは下の theme_ogp_enabled で切る（プラグインが有効なら自動で止まる）。
// -------------------------------------------------------

/**
 * OGP を出すかどうか
 *
 * OGP を出すプラグインが有効なら、テーマ側は黙る。
 */
function theme_ogp_enabled() {
    $plugins = [
        'seo-simple-pack/seo-simple-pack.php',
        'wordpress-seo/wp-seo.php',       // Yoast SEO
        'all-in-one-seo-pack/all_in_one_seo_pack.php',
    ];
    foreach ($plugins as $plugin) {
        if (in_array($plugin, (array) get_option('active_plugins', []), true)) {
            return false;
        }
    }
    return (bool) apply_filters('theme_ogp_enabled', true);
}

/**
 * 既定の OGP 画像
 *
 * 管理画面から差し替えられるよう、オプション（theme_ogp_image）に入れた添付IDを使う。
 * 記事にアイキャッチがあれば、そちらを優先する。
 */
function theme_ogp_image_url() {
    if (is_singular() && has_post_thumbnail()) {
        $url = get_the_post_thumbnail_url(null, 'full');
        if ($url) {
            return $url;
        }
    }
    $id = (int) get_option('theme_ogp_image');
    if ($id) {
        $url = wp_get_attachment_url($id);
        if ($url) {
            return $url;
        }
    }
    return '';
}

/**
 * このページの説明文
 *
 * 記事は本文の抜粋、それ以外はサイトの説明。
 * 固定ページごとの文言は原稿が無いので、いまは言語ごとの共通文にしている。
 */
function theme_ogp_description() {
    if (is_singular(['news', 'news_en'])) {
        $text = get_the_excerpt();
        if ($text) {
            return wp_trim_words(wp_strip_all_tags($text), 60, '…');
        }
    }
    return theme_is_en()
        ? 'DOWA Metals & Mining purchases spent automotive catalysts and other PGM-bearing materials, and recycles them through the NIPPON PGM network.'
        : 'DOWAメタルマイン レアメタル事業部は、使用済み自動車触媒をはじめとするPGM含有原料の買取と、日本ピージーエムでのリサイクルを行っています。';
}

/**
 * head に OGP を出す
 */
function theme_ogp_meta() {
    if (! theme_ogp_enabled()) {
        return;
    }

    $en = theme_is_en();

    // トップは website、それ以外は article
    $type = is_front_page() || (is_page() && get_page_uri(get_queried_object_id()) === 'en')
        ? 'website'
        : 'article';

    $title = wp_get_document_title();
    $url   = theme_current_url();
    $image = theme_ogp_image_url();
    $desc  = theme_ogp_description();

    $tags = [
        'og:locale'      => $en ? 'en_US' : 'ja_JP',
        'og:type'        => $type,
        'og:title'       => $title,
        'og:description' => $desc,
        'og:url'         => $url,
        'og:site_name'   => theme_sitename(),
    ];
    if ($image) {
        $tags['og:image'] = $image;
    }

    echo "\n";
    foreach ($tags as $property => $content) {
        printf(
            '<meta property="%s" content="%s">' . "\n",
            esc_attr($property),
            esc_attr($content)
        );
    }

    printf('<meta name="twitter:card" content="%s">' . "\n", $image ? 'summary_large_image' : 'summary');
    printf('<meta name="description" content="%s">' . "\n", esc_attr($desc));
    printf('<link rel="canonical" href="%s">' . "\n", esc_url($url));

    echo "\n";
}
add_action('wp_head', 'theme_ogp_meta', 2);

/**
 * hreflang（日英の対応づけ）
 *
 * SEO SIMPLE PACK は hreflang を出さないので、プラグインの有無に関わらずテーマから出す。
 */
function theme_hreflang_meta() {
    foreach (theme_alternate_urls() as $lang => $href) {
        printf('<link rel="alternate" hreflang="%s" href="%s">' . "\n", esc_attr($lang), esc_url($href));
    }
}
add_action('wp_head', 'theme_hreflang_meta', 3);

/**
 * いまのページの URL
 */
function theme_current_url() {
    if (is_singular()) {
        return get_permalink();
    }
    if (is_post_type_archive()) {
        return get_post_type_archive_link(get_query_var('post_type') ?: 'news');
    }
    return home_url(add_query_arg([], $GLOBALS['wp']->request ? trailingslashit($GLOBALS['wp']->request) : '/'));
}

/**
 * hreflang（日英の対応づけ）
 *
 * 固定ページだけ。新着情報は日英で別の記事なので出さない。
 */
function theme_alternate_urls() {
    if (! is_page()) {
        return [];
    }
    // トップ同士（/ ↔ /en/）。日本語トップは固定ページ「home」なので、位置で対応づけられない
    if (is_front_page() || theme_is_en_front()) {
        return [
            'ja' => home_url('/'),
            'en' => home_url('/en/'),
        ];
    }

    $uri = get_page_uri(get_queried_object_id());
    $base = theme_is_en() ? preg_replace('#^en/?#', '', $uri) : $uri;
    $tail = $base ? trailingslashit($base) : '';

    $ja = get_page_by_path(rtrim($base, '/'));
    $en = get_page_by_path('en/' . rtrim($base, '/'));

    $out = [];
    if ($ja) { $out['ja'] = home_url('/' . $tail); }
    if ($en) { $out['en'] = home_url('/en/' . $tail); }
    return count($out) > 1 ? $out : [];
}


// -------------------------------------------------------
//    SEO SIMPLE PACK の出し分け
//
//    プラグインは「サイト名 = blogname」「og:locale = サイトのロケール」で固定なので、
//    英語ページだけ差し替える。フィルター名はプラグインの CLAUDE.md（ssp_output_*）に従う。
//    プラグインが無い環境では何も起きない。
// -------------------------------------------------------

/**
 * 英語トップ（/en/）かどうか
 */
function theme_is_en_front() {
    return is_page() && get_page_uri(get_queried_object_id()) === 'en';
}

/**
 * <title> の末尾のサイト名を、言語に合った長い表記にする
 *
 * 静的コーディングは「ページ名 | DOWAメタルマイン株式会社 レアメタル事業部 触媒買取」。
 * プラグインは %_site_title_% に blogname（短い社名）を入れるので、末尾だけ差し替える。
 */
add_filter('ssp_output_title', function ($title) {
    // 英語トップはサイト名だけ（静的コーディングの title は空）
    if (theme_is_en_front()) {
        return theme_sitename();
    }

    // 英語の新着情報一覧。プラグインは投稿タイプのラベル（新着情報（英））を入れてしまう
    if (is_post_type_archive('news_en')) {
        return 'News | ' . theme_sitename(); // 区切りは SEO SIMPLE PACK の設定（line）と同じ
    }

    $blogname = get_option('blogname');
    $sitename = theme_sitename();

    if ($blogname === $sitename || '' === $blogname) {
        return $title;
    }
    // 末尾に一致したときだけ置き換える（ページ名に社名が入っていても壊さない）
    if (substr($title, -strlen($blogname)) === $blogname) {
        return substr($title, 0, -strlen($blogname)) . $sitename;
    }
    return $title;
});

add_filter('ssp_output_og_site_name', function () {
    return theme_sitename();
});

add_filter('ssp_output_og_locale', function ($locale) {
    return theme_is_en() ? 'en_US' : $locale;
});

// トップ（日英とも）は website、それ以外はプラグインの判定のまま
add_filter('ssp_output_og_type', function ($type) {
    return (is_front_page() || theme_is_en_front()) ? 'website' : $type;
});

/**
 * 説明文が空のときの受け皿
 *
 * 固定ページは本文エディタを外していて %_page_contents_% が空になるため、
 * 何も設定していないページでは description が出ない。言語ごとの共通文を入れておく。
 * ページ個別の文言は、投稿編集画面の SEO SIMPLE PACK の欄で上書きできる。
 */
add_filter('ssp_output_description', function ($description) {
    // 英語の新着情報一覧。プラグインは「新着情報（英）の記事一覧ページです。」を入れてしまう
    if (is_post_type_archive('news_en')) {
        return 'News and updates from DOWA Metals & Mining Rare Metal Business Unit.';
    }
    return $description !== '' ? $description : theme_ogp_description();
});
