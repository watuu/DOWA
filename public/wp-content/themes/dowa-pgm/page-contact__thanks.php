<?php
/*
 * お問い合わせ送信完了（日本語）  /contact/thanks/
 * 静的コーディング src/pug/contact/thanks/index.pug。英語版は en/page-contact__thanks.php。
 *
 * 組みは NIPPON PGM 側の SP_CONTACT_DONE 3451-6103 / PC_CONTACT_DONE 3451-6153 を参考にしたが、
 * あちらは別サイトのアートボードなので寸法は拾わず、本サイトの .cm-block-panel に合わせている。
 * 文言は原稿が無いため実装側で用意した（doc/memo.md「確認画面・完了画面・エラー文」）。
 * 電話番号は DOWAメタルマイン(株) レアメタル事業部。自動返信の送信元ドメインは dowa-pgm.com 想定。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-contact',
    'title'      => 'お問い合わせ送信完了',
    'breadcrumb' => [
        ['label' => 'お問い合わせ', 'url' => 'contact/'],
        ['label' => '送信完了'],
    ],
    'noindex'    => true,
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

	<section class="p-contact-thanks">
		<div class="l-container">
			<div class="cm-block-panel">
				<div class="cm-thanks">
					<p>お問い合わせありがとうございます。</p>
					<p>このたびは、お問い合わせいただき誠にありがとうございます。<br>お送りいただきました内容を確認のうえ、1週間以内に折り返しご連絡いたします。また、ご記入いただいたメールアドレスへ、自動返信の確認メールをお送りしております。</p>
					<p class="cm-thanks__gap">しばらく経ってもメールが届かない場合は、ご入力いただいたメールアドレスが間違っているか、迷惑メールフォルダに振り分けられている可能性がございます。<br>また、ドメイン指定受信を設定されている場合は、「<span class="u-font-en">@dowa-pgm.com</span>」からのメールを受信できるよう、あらかじめ設定をお願いいたします。<br>以上をご確認のうえ、お手数ですがもう一度フォームよりお問い合わせいただきますようお願い申し上げます。</p>
					<p class="cm-thanks__gap">なお、お急ぎの場合はお電話でもご相談を承っております。<br><span class="u-font-en">03-6847-1205</span> までお気軽にご連絡ください。</p>
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
