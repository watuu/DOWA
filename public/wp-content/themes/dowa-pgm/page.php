<?php
/*
 * 固定ページの既定（日本語）
 *
 * ページごとに page-{スラッグ}.php を作って組むので、ここへ来るのは
 * まだテンプレートを起こしていない日本語ページだけ。
 * 白紙にならないよう、見出しとパンくずだけ出しておく。
 * 英語版は en/page.php（functions/setting.php の setting__page_templates が振り分ける）。
 */
$title = get_the_title();

theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-default',
    'breadcrumb' => $title,
]);

get_header();
?>
<div class="p-default">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars($title); ?></h1>
			</div>
		</div>
	</div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if (trim(get_the_content())) : ?>
			<section class="p-default-body">
				<div class="l-container">
					<div class="cm-block-panel">
						<div class="cm-post"><?php the_content(); ?></div>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
