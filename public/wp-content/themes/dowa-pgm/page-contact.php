<?php
/*
 * お問い合わせ（日本語）  /contact/
 * 静的コーディング src/pug/contact/index.pug。英語版は en/page-contact.php。
 *
 * フォームは Contact Form 7（スラッグ contact-ja）。マークアップは静的コーディングと同じものを
 * CF7 のフォーム欄に入れてある。呼び出しは functions/form.php の theme_cf7()。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-contact',
    'title'      => 'お問い合わせ',
    'breadcrumb' => 'お問い合わせ',
]);

get_header();
?>
<div class="p-contact">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('お問い合わせ'); ?></h1>
				<p class="c-heading-page__label">Contact</p>
			</div>
		</div>
	</div>

	<section class="p-contact-form">
		<div class="l-container">
			<div class="cm-block-panel">
				<p class="cm-block-lead">ご相談やご質問など、お気軽にお問い合わせください。お問い合わせ内容は、土日祝を除く平日に担当者よりご回答します。内容によっては回答にお時間をいただく場合もあります。あらかじめご了承ください。</p>

				<?php theme_cf7('contact-ja', 'p-contact-form__body', home_url('/contact/thanks/')); ?>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
