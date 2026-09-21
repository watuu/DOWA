<?php
/*
 * 404
 *
 * 以前はトップへ 301 リダイレクトしていたが、検索エンジンに soft 404 と扱われるため、
 * 404 を返して案内を出す作りに変えた（2026-09-21）。
 * ステータスヘッダーは WP が is_404() のときに送るので、ここでは触らない。
 * 404 は日英どちらの URL からも来るので、ヘッダー・フッターを theme_is_en() で選ぶ。
 */
$en = theme_is_en();

theme_set_page([
    'lang'       => $en ? 'en' : 'ja',
    'class'      => 'page-error',
    'title'      => $en ? 'Page Not Found' : 'ページが見つかりません',
    'breadcrumb' => $en ? 'Page Not Found' : 'ページが見つかりません',
    'noindex'    => true,
]);

if ($en) {
    get_template_part('en/header');
} else {
    get_header();
}
?>
<div class="p-error">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars($en ? 'Page Not Found' : 'ページが見つかりません'); ?></h1>
				<p class="c-heading-page__label">404</p>
			</div>
		</div>
	</div>

	<section class="p-error-body">
		<div class="l-container">
			<div class="cm-block-panel">
				<div class="cm-thanks">
					<?php if ($en) : ?>
						<p>The page you are looking for could not be found.</p>
						<p>It may have been moved or deleted, or the address may be incorrect.<br>Please use the link below or the navigation above to find what you need.</p>
					<?php else : ?>
						<p>お探しのページは見つかりませんでした。</p>
						<p>アクセスしようとしたページは、移動もしくは削除されたか、アドレスが間違っている可能性がございます。<br>お手数ですが、下のボタンかページ上部のメニューよりお探しください。</p>
					<?php endif; ?>
				</div>

				<div class="cm-thanks-action">
					<a class="c-btn c-btn--action" href="<?php echo esc_url(theme_home()); ?>">
						<span class="c-btn__label"><?php echo $en ? 'Back to Home' : 'トップへもどる'; ?></span>
						<span class="c-btn__arrow"><?php echo theme_icon('arrow_r'); ?></span>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
if ($en) {
    get_template_part('en/footer');
} else {
    get_footer();
}
