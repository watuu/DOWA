<?php
/*
 * 資料ダウンロード（英語）  /en/document/
 * 静的コーディング src/pug/en/document/index.pug。日本語版はテーマ直下の page-document.php。
 * 英訳は「英訳確認シート」08 資料ダウンロード。利用目的の選択肢は機械翻訳（2026-09-16）。
 * 電話番号は「海外のお問合せフォームでは国番号が入力できるようにしたい」（シートの備考）→ フォーム実装で対応。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-document',
    'title'      => 'Download Our Brochure',
    'breadcrumb' => 'Download Materials',
]);

get_template_part('en/header');
?>
<div class="p-document">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('Download Our Brochure'); ?></h1>
				<p class="c-heading-page__label">Download</p>
			</div>
		</div>
	</div>

	<section class="p-document-form">
		<div class="l-container">
			<div class="cm-block-panel">
				<p class="cm-block-lead">Download our brochure to learn more about our catalyst purchasing services, accepted materials, transaction process, and PGM recycling capabilities.</p>

				<?php theme_cf7('document-en', 'p-document-form__body', home_url('/en/document/thanks/')); ?>
			</div>
		</div>
	</section>
</div>
<?php get_template_part('en/footer'); ?>
