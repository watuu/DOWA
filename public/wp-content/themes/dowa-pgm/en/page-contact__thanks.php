<?php
/*
 * お問い合わせ送信完了（英語）  /en/contact/thanks/
 * 静的コーディング src/pug/en/contact/thanks/index.pug。
 * 英訳確認シートに完了画面の原稿が無いため機械翻訳（2026-09-21）。原稿が届いたら差し替える。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-contact',
    'title'      => 'Thank You for Your Inquiry',
    'breadcrumb' => [
        ['label' => 'Contact', 'url' => 'contact/'],
        ['label' => 'Thank You'],
    ],
    'noindex'    => true,
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

	<section class="p-contact-thanks">
		<div class="l-container">
			<div class="cm-block-panel">
				<div class="cm-thanks">
					<p>Thank you for contacting us.</p>
					<p>We have received your inquiry and appreciate you taking the time to write to us.<br>Our team will review your message and respond within one week. A confirmation email has also been sent automatically to the address you provided.</p>
					<p class="cm-thanks__gap">If you do not receive that email after some time, the address you entered may be incorrect, or our message may have been filtered into your junk mail folder.<br>If you use domain-based filtering, please make sure that emails from &ldquo;<span class="u-font-en">@dowa-pgm.com</span>&rdquo; can be received.<br>After checking the above, please submit the form again.</p>
					<p class="cm-thanks__gap">If your inquiry is urgent, you are also welcome to call us at <span class="u-font-en">+81-3-6847-1205</span>.</p>
				</div>

				<div class="cm-thanks-action">
					<a class="c-btn c-btn--action" href="<?php echo esc_url(home_url('/en/')); ?>">
						<span class="c-btn__label">Back to Home</span>
						<span class="c-btn__arrow"><?php echo theme_icon('arrow_r'); ?></span>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_template_part('en/footer'); ?>
