<?php
/*
 * 新着情報 詳細（英語）  /en/news/{スラッグ}/
 * 組みは日本語版（テーマ直下の single-news.php）と同じ。文言は機械翻訳（2026-09-21）。
 */
the_post();

theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-single-news',
    'title'      => get_the_title(),
    'breadcrumb' => [
        ['label' => 'News', 'url' => 'news/'],
        ['label' => get_the_title()],
    ],
]);

get_template_part('en/header');
?>
<div class="p-single-news">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<p class="c-heading-page__title"><?php echo theme_split_chars('News'); ?></p>
				<p class="c-heading-page__label">News</p>
			</div>
		</div>
	</div>

	<section class="p-single-news-body">
		<div class="l-container">
			<div class="p-single-news-head">
				<div class="p-single-news-head__meta">
					<time class="p-single-news-head__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(theme_news_date()); ?></time>
					<?php if ($tag = theme_news_term_name()) : ?>
						<span class="p-single-news-head__tag"><?php echo esc_html($tag); ?></span>
					<?php endif; ?>
				</div>
				<h1 class="p-single-news-head__title"><?php the_title(); ?></h1>
			</div>

			<div class="cm-block-panel cm-block-panel--article">
				<?php if (has_post_thumbnail()) : ?>
					<figure class="cm-post-eyecatch"><?php the_post_thumbnail('eyecatch', ['alt' => '']); ?></figure>
				<?php endif; ?>

				<div class="cm-post"><?php the_content(); ?></div>
			</div>

			<?php
			theme_news_pager(
				get_post_type_archive_link('news_en'),
				['prev' => 'Previous', 'back' => 'Back to list', 'next' => 'Next', 'nav' => 'Article navigation']
			);
			?>
		</div>
	</section>
</div>
<?php get_template_part('en/footer'); ?>
