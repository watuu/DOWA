<?php
/*
 * 新着情報 詳細（日本語）  /news/{スラッグ}/
 * 静的コーディング src/pug/single-news/index.pug。英語版は en/single-news.php。
 *
 * ページ見出しは「新着情報」（h1 は記事タイトルなので p で出す）。
 * アイキャッチは eyecatch サイズ（1686×900。functions.php の THEME_MEDIA_SIZES）。
 * 本文はブロックエディタの出力をそのまま .cm-post に流す。
 */
the_post();

theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-single-news',
    'title'      => get_the_title(),
    'breadcrumb' => [
        ['label' => '新着情報', 'url' => 'news/'],
        ['label' => get_the_title()],
    ],
]);

get_header();
?>
<div class="p-single-news">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<p class="c-heading-page__title"><?php echo theme_split_chars('新着情報'); ?></p>
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
				get_post_type_archive_link('news'),
				['prev' => '前へ', 'back' => '一覧へもどる', 'next' => '次へ', 'nav' => '記事送り']
			);
			?>
		</div>
	</section>
</div>
<?php get_footer(); ?>
