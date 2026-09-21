<?php
/*
 * お問い合わせ（英語）  /en/contact/
 * 静的コーディング src/pug/en/contact/index.pug。日本語版はテーマ直下の page-contact.php。
 * 英訳は「英訳確認シート」07 お問い合わせ。英語版はフリガナ欄なし（シートの指示）。
 * 問い合わせ種別の選択肢は機械翻訳（2026-09-16）。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-contact',
    'title'      => 'Contact',
    'breadcrumb' => 'Contact',
]);

get_template_part('en/header');
?>
<div class="p-contact">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('Contact'); ?></h1>
				<p class="c-heading-page__label">Contact</p>
			</div>
		</div>
	</div>

	<section class="p-contact-form">
		<div class="l-container">
			<div class="cm-block-panel">
				<p class="cm-block-lead">Please use the form below to contact us with any questions or to discuss your materials and requirements. Our team will respond on business days, excluding public holidays. Depending on the nature of your inquiry, additional time may be required to provide a response. Thank you for your understanding.</p>

				<?php theme_cf7('contact-en', 'p-contact-form__body', home_url('/en/contact/thanks/')); ?>
			</div>
		</div>
	</section>
</div>
<?php get_template_part('en/footer'); ?>
