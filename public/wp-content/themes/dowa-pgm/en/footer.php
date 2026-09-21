	</main>

<?php
/*
 * フッター（英語）  get_template_part('en/footer')
 *
 * 静的コーディング src/pug/_default.pug の </main> 〜 </html>（lang = "en"）。
 * 日本語版はテーマ直下の footer.php。英訳は「英訳確認シート」の共通タブ。
 * ロゴ画像の英語版は申請中（2026-09-16）。クッキーポリシーも英語版が無いので日本語へ飛ばす。
 */
do_action('get_footer', 'en', []);

theme_breadcrumb(theme_page('breadcrumb'), 'Home', 'Breadcrumb');
?>

	<footer class="l-footer is-section-dark">
		<div class="l-footer__inner">
			<div class="cm-block-cta">
				<a class="cm-block-cta-card" href="<?php echo esc_url(home_url('/en/document/')); ?>">
					<p class="cm-block-cta-card__label">DOWNLOAD</p>
					<div class="cm-block-cta-card__body">
						<div class="cm-block-cta-card__text">
							<p class="cm-block-cta-card__title">Download Our Brochure</p>
							<p class="cm-block-cta-card__desc">Download our brochure to learn more about our catalyst purchasing services.</p>
						</div>
						<span class="c-btn-arrow c-btn-arrow--lg"><?php echo theme_icon('arrow_ne'); ?></span>
					</div>
				</a>
				<a class="cm-block-cta-card" href="<?php echo esc_url(home_url('/en/contact/')); ?>">
					<p class="cm-block-cta-card__label">CONTACT</p>
					<div class="cm-block-cta-card__body">
						<div class="cm-block-cta-card__text">
							<p class="cm-block-cta-card__title">Contact Us</p>
							<p class="cm-block-cta-card__desc">Please contact us to discuss your materials or any questions you may have.</p>
						</div>
						<span class="c-btn-arrow c-btn-arrow--lg"><?php echo theme_icon('arrow_ne'); ?></span>
					</div>
				</a>
			</div>

			<div class="l-footer-body">
				<div class="l-footer-body__top">
					<nav class="l-footer-nav">
						<a href="<?php echo esc_url(home_url('/en/material/')); ?>">Materials We Purchase</a>
						<a href="<?php echo esc_url(home_url('/en/flow/')); ?>">How It Works</a>
						<a href="<?php echo esc_url(home_url('/en/location/')); ?>">Locations</a>
						<a href="<?php echo esc_url(home_url('/en/technology/')); ?>">NPGM Expertise</a>
					</nav>
					<div class="l-footer-sites">
						<div class="l-footer-sites__row">
							<p class="l-footer-sites__name">Operated by: DOWA Metals &amp; Mining Co., Ltd.</p>
							<a class="l-footer-sites__link" href="https://www.dowa.co.jp/MandM/" target="_blank" rel="noopener" aria-label="Visit the DOWA Metals &amp; Mining Co., Ltd. website (opens in a new window)">
								<span class="l-footer-sites__label">Visit Website</span>
								<span class="l-footer-sites__btn"><?php echo theme_icon('arrow_r'); ?></span>
							</a>
						</div>
						<div class="l-footer-sites__row">
							<p class="l-footer-sites__name">PGM Recycling Partner: NIPPON PGM Co., Ltd.</p>
							<a class="l-footer-sites__link" href="https://nipponpgm.dowa.co.jp/" target="_blank" rel="noopener" aria-label="Visit the NIPPON PGM Co., Ltd. website (opens in a new window)">
								<span class="l-footer-sites__label">Visit Website</span>
								<span class="l-footer-sites__btn"><?php echo theme_icon('arrow_r'); ?></span>
							</a>
						</div>
					</div>
				</div>

				<div class="l-footer-body__bottom">
					<div class="l-footer-body__brand">
						<p class="l-footer-logo">
							<img src="<?php echo esc_url(theme_asset('img/logo-footer.svg')); ?>" width="338" height="49" alt="DOWA Spent Catalyst Purchasing &amp; PGM Recycling, Powered by DOWA METALS &amp; MINING">
						</p>
						<p class="l-footer-copy">&copy; DOWA METALS &amp; MINING CO., LTD.</p>
					</div>
					<div class="l-footer-policy">
						<a class="l-footer-policy__item l-footer-policy__item--cookie" href="<?php echo esc_url(home_url('/cookie-policy/')); ?>"><?php echo theme_icon('cookie'); ?><span>Cookie Policy</span></a>
						<a class="l-footer-policy__item l-footer-policy__item--privacy" href="<?php echo esc_url(home_url('/en/privacy-policy/')); ?>"><?php echo theme_icon('privacy'); ?><span>Privacy Policy</span></a>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- /.l-body-wrap -->

<?php wp_footer(); ?>
<?php get_template_part('template/symbol'); ?>
</body>
</html>
