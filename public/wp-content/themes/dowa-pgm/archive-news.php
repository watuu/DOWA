<?php
/*
 * 新着情報 一覧（日本語）  /news/
 * 静的コーディング src/pug/news/index.pug。英語版は en/archive-news.php。
 * 表示件数は functions.php の THEME_COMMON_ARCHIVE_NUM（10件）。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-news',
    'title'      => '新着情報',
    'breadcrumb' => '新着情報',
]);

get_header();
?>
<div class="p-news">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('新着情報'); ?></h1>
				<p class="c-heading-page__label">News</p>
			</div>
		</div>
	</div>

	<section class="p-news-list">
		<div class="l-container">
			<div class="cm-block-panel cm-block-panel--list">
				<?php if (have_posts()) : ?>
					<ul>
						<?php while (have_posts()) : the_post(); ?>
							<li><a class="c-card-news" href="<?php the_permalink(); ?>">
									<div class="c-card-news__body">
										<div class="c-card-news__meta">
											<time class="c-card-news__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(theme_news_date()); ?></time>
											<?php if ($tag = theme_news_term_name()) : ?>
												<span class="c-card-news__tag"><?php echo esc_html($tag); ?></span>
											<?php endif; ?>
										</div>
										<p class="c-card-news__title"><?php the_title(); ?></p>
									</div><span class="c-btn-arrow c-btn-arrow--outline c-btn-arrow--sm"><?php echo theme_icon('arrow_r'); ?></span></a></li>
						<?php endwhile; ?>
					</ul>

					<?php theme_paginate('前のページへ', '次のページへ', 'ページ送り'); ?>
				<?php else : ?>
					<p class="cm-block-lead">まだ記事がありません。</p>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
