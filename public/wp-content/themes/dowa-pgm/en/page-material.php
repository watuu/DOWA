<?php
/*
 * 買取原料（英語）  /en/material/
 * 静的コーディング src/pug/en/material/index.pug。日本語版はテーマ直下の page-material.php。
 * 英訳は「英訳確認シート」03 買取原料。写真は日本語版と同じものを使う。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-material',
    'title'      => 'What We Buy',
    'breadcrumb' => 'Materials We Purchase',
]);

$materials = [
    [
        'title' => 'Spent Automotive Catalysts',
        'desc'  => 'We purchase spent automotive catalysts both with and without their canisters. Decanning services are also available to meet individual customer requirements.',
    ],
    [
        'title' => 'Metal Honeycomb Catalysts',
        'desc'  => 'In metal honeycomb catalysts, PGMs are contained in the washcoat applied to the metal substrate. The washcoat is separated through a dedicated pre-treatment process to enable accurate sampling and analysis.',
    ],
    [
        'title' => 'Chemical Catalysts',
        'desc'  => 'We purchase spent catalysts used in petroleum refining and chemical manufacturing. Our large-scale sampling and smelting facilities enable us to accommodate lots exceeding 10 metric tons.',
    ],
    [
        'title' => 'Other PGM-Bearing Materials and Production Residues',
        'desc'  => 'We handle a wide range of other PGM-bearing materials, including production residues and process by-products. After reviewing a sample, we propose a suitable recycling solution based on the characteristics of the material.',
    ],
];

get_template_part('en/header');
?>
<div class="p-material">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('What We Buy'); ?></h1>
				<p class="c-heading-page__label">What We Buy</p>
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
<?php get_template_part('en/footer'); ?>
