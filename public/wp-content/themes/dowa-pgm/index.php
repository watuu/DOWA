<?php
/*
 * 最後の受け皿
 *
 * このサイトのページはすべて固定ページか新着情報で、それぞれ専用のテンプレートがある。
 * ここへ来るのは想定外のクエリだけなので、404 を返す。
 * （検索・著者・日付アーカイブは functions/cleanup.php で 404 にしている）
 */
global $wp_query;
$wp_query->set_404();
status_header(404);
nocache_headers();
require get_template_directory() . '/404.php';
