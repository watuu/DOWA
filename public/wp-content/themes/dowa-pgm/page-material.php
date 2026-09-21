<?php
/*
 * 買取原料（日本語）  /material/
 * 静的コーディング src/pug/material/index.pug。英語版は page-en__material.php。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-material',
    'title'      => '買取原料',
    'breadcrumb' => '買取原料',
]);

$materials = [
    [
        'title' => '使用済み自動車触媒',
        'desc'  => '缶出し済み、缶付きのどちらでも受入が可能です。缶出しのサービスも提供しています。',
    ],
    [
        'title' => 'メタルハニカム',
        'desc'  => 'PGMを含むウォッシュコートが付着した金属製ハニカムにも対応。前処理でウォッシュコートを分離したうえで、サンプリング・分析を行います。',
    ],
    [
        'title' => '化学触媒',
        'desc'  => '石油精製や化学製品の製造工程で使用された触媒にも対応。大規模なサンプリング・製錬設備により、10tを超える大ロットも柔軟に処理できます。',
    ],
    [
        'title' => 'その他PGM含有原料、工場残渣',
        'desc'  => 'その他PGMを含む原料についても処理が可能です。サンプルをお送りいただいたうえで最適なサービスをご提案しますので、まずはお気軽にご相談ください。',
    ],
];

get_header();
?>
<div class="p-material">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('買取原料'); ?></h1>
				<p class="c-heading-page__label">What we buy</p>
			</div>
		</div>
	</div>

	<section class="p-material-body">
		<div class="l-container">
			<div class="p-material-list">
				<?php foreach ($materials as $i => $m) : ?>
					<?php if ($i > 0) : ?>
						<div class="c-line-dot" aria-hidden="true"></div>
					<?php endif; ?>
					<div class="c-card-num">
						<div class="c-card-num__body">
							<p class="c-card-num__num">#0<?php echo $i + 1; ?></p>
							<div class="c-card-num__text">
								<h2 class="c-card-num__title"><?php echo esc_html($m['title']); ?></h2>
								<p class="c-card-num__desc"><?php echo esc_html($m['desc']); ?></p>
							</div>
						</div>
						<figure class="c-card-num__figure">
							<img src="<?php echo esc_url(theme_asset('img/p-material-pic' . ($i + 1) . '.webp')); ?>" alt="" width="1458" height="998" loading="<?php echo $i > 0 ? 'lazy' : 'eager'; ?>">
						</figure>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
