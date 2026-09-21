<?php
/*
 * 資料ダウンロード（日本語）  /document/
 * 静的コーディング src/pug/document/index.pug。英語版は en/page-document.php。
 * フォームは Contact Form 7（スラッグ document-ja）。呼び出しは functions/form.php の theme_cf7()。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-document',
    'title'      => '資料ダウンロード',
    'breadcrumb' => '資料ダウンロード',
]);

get_header();
?>
<div class="p-document">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('資料ダウンロード'); ?></h1>
				<p class="c-heading-page__label">Download</p>
			</div>
		</div>
	</div>

	<section class="p-document-form">
		<div class="l-container">
			<div class="cm-block-panel">
				<p class="cm-block-lead">サービスについて詳しく知っていただける資料をご用意しています。<br>課題解決のヒントや情報収集に、ぜひご活用ください。</p>

				<?php theme_cf7('document-ja', 'p-document-form__body', home_url('/document/thanks/')); ?>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
