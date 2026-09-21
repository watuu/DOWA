<?php

// -------------------------------------------------------
//    テンプレート用ヘルパー
//
//    静的コーディング（src/pug/_default.pug）の変数・ミックスインを
//    そのまま WP へ持ってきたもの。
//
//    文言は各テンプレートに直接書く（日英でファイルを分けているため、
//    header.php / header-en.php のように中身をそのまま読めるようにしてある）。
//    ここに置くのは、文言を持たない仕組みだけ。
// -------------------------------------------------------

/**
 * ページテンプレートが header / footer へ渡す値
 *
 * 各テンプレートの先頭で theme_set_page() を呼んでから get_header() する。
 *   lang       … 'ja' / 'en'。テンプレートが自分の言語を宣言する
 *   class      … body のクラス（'page-material' 等）
 *   breadcrumb … パンくず。文字列、または [['label'=>..,'url'=>..], ...]。空なら出さない
 *   title      … <title> の先頭。省略時は WP の生成に任せる
 *   noindex    … true で <meta name="robots" content="noindex, follow">
 */
function theme_set_page(array $page) {
    $GLOBALS['theme_page'] = $page;
}

function theme_page($key, $default = null) {
    return $GLOBALS['theme_page'][$key] ?? $default;
}

/**
 * いまのページの言語
 *
 * テンプレートの宣言（theme_set_page の lang）が最優先。
 * 宣言が無いもの（404・アーカイブ）は、投稿タイプと URL から判定する。
 */
function theme_lang() {
    $lang = theme_page('lang');
    if ($lang) {
        return $lang;
    }
    if (is_singular('news_en') || is_post_type_archive('news_en')) {
        return 'en';
    }
    if (is_page()) {
        $uri = get_page_uri(get_queried_object_id());
        if ($uri === 'en' || strpos($uri, 'en/') === 0) {
            return 'en';
        }
    }
    // 404 などクエリから分からないときは URL で見る
    $path = (string) wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    $base = (string) wp_parse_url(home_url('/'), PHP_URL_PATH);
    $rel  = ltrim(substr($path, strlen($base)), '/');
    if ($rel === 'en' || strpos($rel, 'en/') === 0) {
        return 'en';
    }
    return 'ja';
}

function theme_is_en() {
    return theme_lang() === 'en';
}

/**
 * ページ間リンクの根。日本語は / 、英語は /en/
 */
function theme_home($path = '') {
    $base = theme_is_en() ? 'en/' : '';
    return home_url('/' . $base . ltrim((string) $path, '/'));
}

/**
 * テーマの素材（画像・CSS・JS）。言語で分けない
 */
function theme_asset($rel) {
    return get_template_directory_uri() . '/assets/' . ltrim($rel, '/');
}

/**
 * 言語切替の行き先
 *
 * 新着情報は英語側に同じ記事が無いので、各言語のトップへ飛ばす
 * （静的側で slug を持たせていないページと同じ扱い）。
 */
function theme_lang_urls() {
    $uri = '';
    if (is_page()) {
        $uri = get_page_uri(get_queried_object_id());
        if (theme_is_en()) {
            $uri = preg_replace('#^en/?#', '', $uri);
        }
    }
    $tail = $uri ? trailingslashit($uri) : '';
    return [
        'ja' => home_url('/' . $tail),
        'en' => home_url('/en/' . $tail),
    ];
}

/**
 * サイト名（<title> の後ろ）
 *
 * 英訳は「DOWA 自動車触媒買取サイト 英訳確認シート」の共通タブ。
 */
function theme_sitename() {
    return theme_is_en()
        ? 'DOWA Spent Catalyst Purchasing & PGM Recycling | DOWA Metals & Mining Co., Ltd. Rare Metal Business Unit'
        : 'DOWAメタルマイン株式会社 レアメタル事業部 触媒買取';
}

/**
 * ページ見出しを1文字ずつ出す（src/pug/_default.pug の +split-chars と同じ出力）
 *
 * 読み上げは .u-visually-hidden の全文に任せ、1文字ずつの span は aria-hidden にする。
 * 英語は単語ごとに窓（.u-anim-chars__word）で包み、折り返しを単語の切れ目だけにする。
 */
function theme_split_chars($text) {
    $out  = sprintf('<span class="u-visually-hidden">%s</span>', esc_html($text));
    $out .= '<span class="u-anim-chars js-visible" aria-hidden="true" translate="no">';

    $i = 0;
    foreach (explode(' ', $text) as $word) {
        $out .= '<span class="u-anim-chars__word">';
        foreach (preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY) as $char) {
            $out .= sprintf(
                '<span class="u-anim-chars__char" style="--c: %d">%s</span>',
                $i++,
                esc_html($char)
            );
        }
        $out .= '</span>';
    }

    return $out . '</span>';
}

/**
 * スプライトのアイコン（template/symbol.php の #ico_*）
 */
function theme_icon($id, $hidden = true) {
    return sprintf(
        '<svg%s><use href="#ico_%s"></use></svg>',
        $hidden ? ' aria-hidden="true"' : '',
        esc_attr($id)
    );
}

/**
 * パンくず
 *
 * 文言は呼ぶ側（footer.php / footer-en.php）が渡す。
 *   $items     … 文字列 か [['label' => '買取原料', 'url' => 'material/'], ...]
 *                url は言語の根からの相対（theme_home() に渡す）。無い項目はリンクにしない
 *   $homeLabel … 先頭の「トップ」/「Home」
 *   $ariaLabel … nav の aria-label
 */
function theme_breadcrumb($items, $homeLabel, $ariaLabel) {
    if (! $items) {
        return;
    }
    $items = (is_array($items) && isset($items[0])) ? $items : [$items];

    // 「/」の区切りは ::before で出していて、項目は white-space: nowrap。
    // <li> の中に改行を入れると余分な空白が1つ分の幅になって並びがずれるので、
    // 1項目を改行なしの1行で組み立てる（静的コーディングの出力に合わせる）。
    $lis = sprintf(
        '<li class="cm-navi-breadcrumb__item"><a href="%s">%s</a></li>',
        esc_url(theme_home()),
        esc_html($homeLabel)
    );
    foreach ($items as $item) {
        $label = is_array($item) ? ($item['label'] ?? '') : $item;
        $url   = is_array($item) ? ($item['url'] ?? '') : '';
        $inner = $url
            ? sprintf('<a href="%s">%s</a>', esc_url(theme_home($url)), esc_html($label))
            : esc_html($label);
        $lis .= sprintf('<li class="cm-navi-breadcrumb__item">%s</li>', $inner);
    }

    printf(
        '<nav class="cm-navi-breadcrumb" aria-label="%s"><div class="l-container"><ol class="cm-navi-breadcrumb__list">%s</ol></div></nav>',
        esc_attr($ariaLabel),
        $lis
    );
}

/**
 * 英語ページの <html lang="en">
 *
 * サイトのロケールは日本語のままにしておきたいので、出力だけ差し替える。
 */
add_filter('language_attributes', function ($output) {
    return theme_is_en() ? 'lang="en"' : $output;
});

/**
 * <title> を静的コーディングと同じ「ページ名 | サイト名」にする
 */
add_filter('document_title_separator', function () {
    return '|';
});
add_filter('document_title_parts', function ($parts) {
    $parts['site'] = theme_sitename();
    unset($parts['tagline']);
    if (theme_page('title')) {
        $parts['title'] = theme_page('title');
    }
    return $parts;
});
