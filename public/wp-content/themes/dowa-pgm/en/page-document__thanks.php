<?php
/*
 * 資料ダウンロード送信完了（英語）  /en/document/thanks/
 * 静的コーディング src/pug/en/document/thanks/index.pug。
 * 英訳確認シートに完了画面の原稿が無いため機械翻訳（2026-09-21）。
 * 資料は「入力されたメールアドレスへダウンロードURLを送る」前提（日本語版と同じ）。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-document',
    'title'      => 'Thank You for Your Request',
    'breadcrumb' => [
        ['label' => 'Download Materials', 'url' => 'document/'],
        ['label' => 'Thank You'],
    ],
    'noindex'    => true,
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

	<section class="p-document-thanks">
		<div class="l-container">
			<div class="cm-block-panel">
				<div class="cm-thanks">
					<p>Thank you for requesting our brochure.</p>
					<p>We have received your request and appreciate your interest in our services.<br>A download link has been sent to the email address you provided. Please use the link in that email to view the brochure.</p>
					<p class="cm-thanks__gap">If you do not receive that email after some time, the address you entered may be incorrect, or our message may have been filtered into your junk mail folder.<br>If you use domain-based filtering, please make sure that emails from &ldquo;<span class="u-font-en">@dowa-pgm.com</span>&rdquo; can be received.<br>After checking the above, please submit the form again.</p>
					<p class="cm-thanks__gap">For questions about the brochure or about selling your materials, please feel free to use our contact form.<br>If your request is urgent, you are also welcome to call us at <span class="u-font-en">+81-3-6847-1205</span>.</p>
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
