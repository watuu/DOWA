	</main>

<?php
/*
 * フッター（日本語）
 *
 * 静的コーディング src/pug/_default.pug の </main> 〜 </html>。
 * 英語版は footer-en.php。パンくずは theme_set_page(['breadcrumb' => ...]) で渡す。
 */
theme_breadcrumb(theme_page('breadcrumb'), 'トップ', 'パンくず');
?>

	<footer class="l-footer is-section-dark">
		<div class="l-footer__inner">
			<div class="cm-block-cta">
				<a class="cm-block-cta-card" href="<?php echo esc_url(home_url('/document/')); ?>">
					<p class="cm-block-cta-card__label">DOWNLOAD</p>
					<div class="cm-block-cta-card__body">
						<div class="cm-block-cta-card__text">
							<p class="cm-block-cta-card__title">資料ダウンロード</p>
							<p class="cm-block-cta-card__desc">不明点を解消したい方はまずは資料ダウンロードから</p>
						</div>
						<span class="c-btn-arrow c-btn-arrow--lg"><?php echo theme_icon('arrow_ne'); ?></span>
					</div>
				</a>
				<a class="cm-block-cta-card" href="<?php echo esc_url(home_url('/contact/')); ?>">
					<p class="cm-block-cta-card__label">CONTACT</p>
					<div class="cm-block-cta-card__body">
						<div class="cm-block-cta-card__text">
							<p class="cm-block-cta-card__title">お問い合わせ</p>
							<p class="cm-block-cta-card__desc">どんなことでもお気軽にご相談いただけます</p>
						</div>
						<span class="c-btn-arrow c-btn-arrow--lg"><?php echo theme_icon('arrow_ne'); ?></span>
					</div>
				</a>
			</div>

			<div class="l-footer-body">
				<div class="l-footer-body__top">
					<nav class="l-footer-nav">
						<a href="<?php echo esc_url(home_url('/material/')); ?>">買取原料</a>
						<a href="<?php echo esc_url(home_url('/flow/')); ?>">お取引の流れ</a>
						<a href="<?php echo esc_url(home_url('/location/')); ?>">海外拠点</a>
						<a href="<?php echo esc_url(home_url('/technology/')); ?>">NPGMの技術</a>
					</nav>
					<div class="l-footer-sites">
						<div class="l-footer-sites__row">
							<p class="l-footer-sites__name">運営会社：DOWAメタルマイン株式会社</p>
							<a class="l-footer-sites__link" href="https://www.dowa.co.jp/MandM/" target="_blank" rel="noopener" aria-label="DOWAメタルマイン株式会社のサイトへ（新しいウィンドウで開きます）">
								<span class="l-footer-sites__label">サイトへ</span>
								<span class="l-footer-sites__btn"><?php echo theme_icon('arrow_r'); ?></span>
							</a>
						</div>
						<div class="l-footer-sites__row">
							<p class="l-footer-sites__name">関連会社：株式会社日本ピージーエム</p>
							<a class="l-footer-sites__link" href="https://nipponpgm.dowa.co.jp/" target="_blank" rel="noopener" aria-label="株式会社日本ピージーエムのサイトへ（新しいウィンドウで開きます）">
								<span class="l-footer-sites__label">サイトへ</span>
								<span class="l-footer-sites__btn"><?php echo theme_icon('arrow_r'); ?></span>
							</a>
						</div>
					</div>
				</div>

				<div class="l-footer-body__bottom">
					<div class="l-footer-body__brand">
						<p class="l-footer-logo">
							<img src="<?php echo esc_url(theme_asset('img/logo-footer.svg')); ?>" width="338" height="49" alt="DOWA 触媒買取 Powered by DOWA METALS &amp; MINING">
						</p>
						<p class="l-footer-copy">&copy; DOWA METALS &amp; MINING CO., LTD.</p>
					</div>
					<div class="l-footer-policy">
						<a class="l-footer-policy__item l-footer-policy__item--cookie" href="<?php echo esc_url(home_url('/cookie-policy/')); ?>"><?php echo theme_icon('cookie'); ?><span>クッキーポリシー</span></a>
						<a class="l-footer-policy__item l-footer-policy__item--privacy" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php echo theme_icon('privacy'); ?><span>プライバシーポリシー</span></a>
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
