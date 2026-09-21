<?php
/*
 * 拠点一覧（日本語）  /location/
 * 静的コーディング src/pug/location/index.pug（＋ _include/_location-parts.pug）。
 * 英語版は en/page-location.php。地図は maps.google.com の iframe 埋め込み（APIキー不要）。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-location',
    'title'      => '拠点一覧',
    'breadcrumb' => '拠点一覧',
]);

get_header();
?>
<div class="p-location">
	<div class="cm-block-header-page cm-block-header-page--map">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('拠点一覧'); ?>
				</h1>
				<p class="c-heading-page__label">Location</p>
			</div>
		</div>
	</div>
	<div class="l-container">
		<div class="p-location-map p-location-map--japan c-scroll-x">
			<div class="c-scroll-x__inner js-scroll-x">
				<picture class="p-location-japan">
					<source media="(min-width: 1024px)" srcset="<?php echo esc_url(theme_asset('img/p-location-japan.webp')); ?>" width="1360" height="800"/><img class="p-location-japan__img" src="<?php echo esc_url(theme_asset('img/p-location-japan-sp.webp')); ?>" alt="日本国内の拠点を示した地図" width="382" height="450"/>
				</picture>
			</div>
			<div class="c-scroll-x__bar" aria-hidden="true"><span class="c-scroll-x__thumb"></span></div>
		</div>
	</div>
	<div class="l-container">
		<div class="p-location-cols js-sticky-section">
			<div class="p-location-nav js-sticky-section__aside" aria-label="国内一覧の拠点">
				<ul class="p-location-nav__list">
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#npgm" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">株式会社日本ピージーエム</span></a></li>
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#dowa-rare-metal" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">DOWAメタルマイン(株) レアメタル事業部</span></a></li>
				</ul>
			</div>
			<div class="p-location-body js-sticky-section__content">
				<h2 class="p-location-heading">国内一覧</h2>
				<div class="p-location-list">
					<section class="p-location-item" id="npgm">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">株式会社日本ピージーエム</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">製錬</span></li>
										<li><span class="c-tag">サンプリング</span></li>
									</ul>
									<div class="p-location-card__spec">
										<p>設立：1991年3月15日</p>
										<p>出資比率：</p>
										<ul class="p-location-card__share">
											<li>DOWAメタルマイン(株) / 40％</li>
											<li>田中貴金属工業(株) / 40％</li>
											<li>小坂製錬(株) / 20％</li>
										</ul>
									</div>
									<div class="p-location-card__address">
										<p><span class="p-location-card__zip">工場：〒017-0202</span><br/>秋田県鹿角郡小坂町小坂鉱山字尾樽部76-1
										</p>
										<p class="p-location-card__tel"><span>TEL: (0186)29-2744</span><span>FAX: (0186)29-2722</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://maps.app.goo.gl/LDrJ9uQEBj228Lus7" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=40.3319874%2C140.7585799&amp;z=15&amp;hl=ja&amp;output=embed" title="株式会社日本ピージーエムの所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
						<div class="c-line-dot" aria-hidden="true"></div>
					</section>
					<section class="p-location-item" id="dowa-rare-metal">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">DOWAメタルマイン(株)<br>レアメタル事業部</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">営業</span></li>
										<li><span class="c-tag">触媒買取</span></li>
									</ul>
									<div class="p-location-card__address">
										<p><span class="p-location-card__zip">〒101-0021</span><br/>東京都千代田区外神田4丁目14番1号 秋葉原UDXビル22階
										</p>
										<p class="p-location-card__tel"><span>TEL: 03-6847-1205</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://maps.app.goo.gl/msxVvzGMTRW6nL3U7" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=35.7005674%2C139.7727147&amp;z=15&amp;hl=ja&amp;output=embed" title="DOWAメタルマイン(株) レアメタル事業部の所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="c-line-dot p-location-catch__line u-only-sp" aria-hidden="true"></div>
		<p class="p-location-catch"><span class="p-location-catch__icon">
				<svg aria-hidden="true">
					<use href="#ico_pin"></use>
				</svg></span><span>世界に触媒集荷拠点を設けています</span></p>
		<div class="p-location-map p-location-map--world c-scroll-x">
			<div class="c-scroll-x__inner js-scroll-x">
				<div class="p-location-world"><img class="p-location-world__img" src="<?php echo esc_url(theme_asset('img/p-location-world.webp')); ?>" alt="世界各地の拠点を示した地図" width="1300" height="613" loading="lazy"/><a class="p-location-world__label" href="#dowa-hd-europe" data-scroll-anchor="data-scroll-anchor" style="left:10.385%;top:23.503%">DOWA HD Europe GmbH</a><a class="p-location-world__label" href="#nippon-pgm-europe" data-scroll-anchor="data-scroll-anchor" style="left:11.154%;top:36.723%">NIPPON PGM EUROPE S.R.O.</a><a class="p-location-world__label" href="#dowa-mm-spain" data-scroll-anchor="data-scroll-anchor" style="left:1.538%;top:45.863%">DOWA METALS &amp; MINING CO., LTD. Spain office</a><a class="p-location-world__label" href="#npgm-korea" data-scroll-anchor="data-scroll-anchor" style="left:36.154%;top:47.821%">NPGM KOREA Co., Ltd.</a><a class="p-location-world__label" href="#npgm" data-scroll-anchor="data-scroll-anchor" style="left:45.077%;top:39.823%">日本ピージーエム</a><a class="p-location-world__label" href="#npgm-usa" data-scroll-anchor="data-scroll-anchor" style="left:66.969%;top:26.914%">NPGM USA</a><a class="p-location-world__label" href="#dowa-mm-america" data-scroll-anchor="data-scroll-anchor" style="right:5.154%;top:45.863%">DOWA METALS &amp; MINING AMERICA INC.</a>
				</div>
			</div>
			<div class="c-scroll-x__bar" aria-hidden="true"><span class="c-scroll-x__thumb"></span></div>
		</div>
		<div class="p-location-cols js-sticky-section">
			<div class="p-location-nav js-sticky-section__aside" aria-label="海外一覧の拠点">
				<ul class="p-location-nav__list">
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#npgm-usa" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">NPGM USA INC.</span></a></li>
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#dowa-mm-america" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">DOWA METALS &amp; MINING AMERICA INC.</span></a></li>
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#npgm-korea" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">NPGM KOREA Co., Ltd.</span></a></li>
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#nippon-pgm-europe" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">NIPPON PGM EUROPE S.R.O.</span></a></li>
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#dowa-hd-europe" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">DOWA HD Europe GmbH</span></a></li>
					<li class="p-location-nav__item"><a class="p-location-nav__link" href="#dowa-mm-spain" data-scroll-anchor="data-scroll-anchor"><span class="p-location-nav__icon">
								<svg aria-hidden="true">
									<use href="#ico_marker"></use>
								</svg></span><span class="p-location-nav__label">DOWA METALS &amp; MINING CO., LTD. Spain office</span></a></li>
				</ul>
			</div>
			<div class="p-location-body js-sticky-section__content">
				<h2 class="p-location-heading">海外一覧</h2>
				<div class="p-location-list">
					<section class="p-location-item" id="npgm-usa">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">NPGM USA INC.</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">サンプリング</span></li>
									</ul>
									<div class="p-location-card__spec">
										<p>設立：2024年3月13日</p>
										<p>出資比率：NPGM100%</p>
									</div>
									<div class="p-location-card__address">
										<p>191 S Keim Street, Unit 2E-1 Pottstown, PA 19464, U.S.A.
										</p>
										<p class="p-location-card__tel"><span>TEL: +1-215-701-7050</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://maps.app.goo.gl/cC8jE8x77L81zbRy8" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=40.2389662%2C-75.6306429&amp;z=15&amp;hl=ja&amp;output=embed" title="NPGM USA INC.の所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
						<div class="c-line-dot" aria-hidden="true"></div>
					</section>
					<section class="p-location-item" id="dowa-mm-america">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">DOWA METALS &amp; MINING<br>AMERICA INC.</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">営業</span></li>
										<li><span class="c-tag">触媒買取</span></li>
									</ul>
									<div class="p-location-card__address">
										<p>1 Tower Center Boulevard, Suite 1607, East Brunswick, New Jersey, 08816, U.S.A.
										</p>
										<p class="p-location-card__tel"><span>TEL: +1-609-900-3692</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://maps.app.goo.gl/wJ2Kxu1nVCYDFoEw6" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=40.4789602%2C-74.4083435&amp;z=15&amp;hl=ja&amp;output=embed" title="DOWA METALS &amp; MINING AMERICA INC.の所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
						<div class="c-line-dot" aria-hidden="true"></div>
					</section>
					<section class="p-location-item" id="npgm-korea">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">NPGM KOREA Co., Ltd.</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">営業</span></li>
										<li><span class="c-tag">触媒買取</span></li>
										<li><span class="c-tag">サンプリング</span></li>
									</ul>
									<div class="p-location-card__spec">
										<p>設立：2020年12月16日</p>
										<p>出資比率：NPGM100%</p>
									</div>
									<div class="p-location-card__address">
										<p>84-1, Nonhyeongojan-ro 54beon-gil, Namdong-gu, Incheon, Republic of Korea 21682
										</p>
										<p class="p-location-card__tel"><span>TEL: +82-32-572-6866</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://www.npgm-korea.com/" target="_blank" rel="noopener"><span class="c-link-arrow__label">WebSite</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a><a class="c-link-arrow" href="https://maps.app.goo.gl/coFNk4Z7bzeaSLaL6" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=37.3865024%2C126.7161534&amp;z=15&amp;hl=ja&amp;output=embed" title="NPGM KOREA Co., Ltd.の所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
						<div class="c-line-dot" aria-hidden="true"></div>
					</section>
					<section class="p-location-item" id="nippon-pgm-europe">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">NIPPON PGM EUROPE S.R.O.</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">サンプリング</span></li>
									</ul>
									<div class="p-location-card__spec">
										<p>設立：2010年9月16日</p>
										<p>出資比率：DMM60%、TKK40%</p>
									</div>
									<div class="p-location-card__address">
										<p>Heyrovskeho 488, Liberec 23, 46312, Czech Republic
										</p>
										<p class="p-location-card__tel"><span>TEL: +420-488-100-271</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://maps.app.goo.gl/FprK3SCHzSZk3ck36" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=50.7313644%2C15.0356349&amp;z=15&amp;hl=ja&amp;output=embed" title="NIPPON PGM EUROPE S.R.O.の所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
						<div class="c-line-dot" aria-hidden="true"></div>
					</section>
					<section class="p-location-item" id="dowa-hd-europe">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">DOWA HD Europe GmbH</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">営業</span></li>
										<li><span class="c-tag">触媒買取</span></li>
									</ul>
									<div class="p-location-card__address">
										<p>Aeussere-Cramer-Klett-Str.19 90489 Nuremberg, Germany
										</p>
										<p class="p-location-card__tel"><span>TEL: +49-911-56989-320</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://maps.app.goo.gl/46DZCPKdoV5cLRSa9" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=49.4550934%2C11.0927816&amp;z=15&amp;hl=ja&amp;output=embed" title="DOWA HD Europe GmbHの所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
						<div class="c-line-dot" aria-hidden="true"></div>
					</section>
					<section class="p-location-item" id="dowa-mm-spain">
						<div class="p-location-card">
							<div class="p-location-card__body">
								<div class="p-location-card__info">
									<h3 class="p-location-card__name">DOWA METALS &amp; MINING CO.,<br>LTD. Spain office</h3>
									<ul class="p-location-card__tags">
										<li><span class="c-tag">営業</span></li>
										<li><span class="c-tag">触媒買取</span></li>
									</ul>
									<div class="p-location-card__address">
										<p>Calle Albasanz 35, 2A, 28037 Madrid, Spain
										</p>
										<p class="p-location-card__tel"><span>TEL: +34-91-353-6525</span>
										</p>
									</div>
								</div>
								<div class="p-location-card__actions"><a class="c-link-arrow" href="https://maps.app.goo.gl/pSzfnRST4U2dHR9t9" target="_blank" rel="noopener"><span class="c-link-arrow__label">Map</span><span class="c-btn-arrow c-link-arrow__arrow">
											<svg aria-hidden="true">
												<use href="#ico_arrow_r"></use>
											</svg></span></a>
								</div>
							</div>
							<figure class="p-location-card__map">
								<iframe src="https://maps.google.com/maps?q=40.437954%2C-3.6263752&amp;z=15&amp;hl=ja&amp;output=embed" title="DOWA METALS &amp; MINING CO., LTD. Spain officeの所在地の地図" width="384" height="263" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="allowfullscreen"></iframe>
							</figure>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php get_footer(); ?>
