<?php
/*
 * 資料ダウンロード送信完了（日本語）  /document/thanks/
 * 静的コーディング src/pug/document/thanks/index.pug。英語版は en/page-document__thanks.php。
 *
 * 資料は「入力されたメールアドレスへダウンロードURLを送る」前提で書いている。
 * その場で PDF を直接ダウンロードさせる方式に変わる場合は、本文とボタンを差し替えること。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-document',
    'title'      => '資料ダウンロード送信完了',
    'breadcrumb' => [
        ['label' => '資料ダウンロード', 'url' => 'document/'],
        ['label' => '送信完了'],
    ],
    'noindex'    => true,
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

	<section class="p-document-thanks">
		<div class="l-container">
			<div class="cm-block-panel">
				<div class="cm-thanks">
					<p>資料のご請求ありがとうございます。</p>
					<p>このたびは、資料をご請求いただき誠にありがとうございます。<br>ご記入いただいたメールアドレスへ、資料のダウンロードURLをお送りしております。メールに記載のURLより資料をご覧ください。</p>
					<p class="cm-thanks__gap">しばらく経ってもメールが届かない場合は、ご入力いただいたメールアドレスが間違っているか、迷惑メールフォルダに振り分けられている可能性がございます。<br>また、ドメイン指定受信を設定されている場合は、「<span class="u-font-en">@dowa-pgm.com</span>」からのメールを受信できるよう、あらかじめ設定をお願いいたします。<br>以上をご確認のうえ、お手数ですがもう一度フォームよりご請求いただきますようお願い申し上げます。</p>
					<p class="cm-thanks__gap">資料の内容や買取についてのご相談は、お問い合わせフォームよりお気軽にお寄せください。<br>お急ぎの場合は <span class="u-font-en">03-6847-1205</span> までお電話ください。</p>
				</div>

				<div class="cm-thanks-action">
					<a class="c-btn c-btn--action" href="<?php echo esc_url(home_url('/')); ?>">
						<span class="c-btn__label">トップへもどる</span>
						<span class="c-btn__arrow"><?php echo theme_icon('arrow_r'); ?></span>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
