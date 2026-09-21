<?php
/*
 * 固定ページの既定（英語）
 *
 * ページごとに en/page-{スラッグ}.php を作って組むので、ここへ来るのは
 * まだテンプレートを起こしていない英語ページだけ。
 * 白紙にならないよう、見出しとパンくずだけ出しておく。
 * 日本語版はテーマ直下の page.php。
 */
$title = get_the_title();

theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-default',
    'breadcrumb' => $title,
]);

get_template_part('en/header');
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
<?php get_template_part('en/footer'); ?>
