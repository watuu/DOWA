<?php
/*
 * トップ（日本語）  /
 * 静的コーディング src/pug/index.pug。英語版は en/front-page.php。
 * パンくずは出さない。body の is-header-dark は header.php が is_front_page() で付ける。
 * MV の動画は assets/movie/mv.mp4。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-front',
]);

get_header();
?>
<div class="p-top">
	<section class="p-top-mv is-section-dark js-mv">
		<div class="p-top-mv__main">
			<div class="p-top-mv__movie u-anim-fade u-anim-zoom">
				<video src="<?php echo esc_url(theme_asset('movie/mv.mp4')); ?>" width="1920" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" preload="auto" aria-hidden="true"></video>
			</div>
			<div class="p-top-mv__copy">
				<h1 class="p-top-mv__title u-anim-lines"><span><span class="u-anim-line" style="--l: 0"><span>確かな分析で、</span></span><span class="u-anim-line" style="--l: 1"><span>触媒の価値を適正に評価</span></span></span></h1>
				<p class="p-top-mv__lead u-anim" style="--i: 2"><span>白金族類に特化した日本ピージーエムを基盤に、信頼に応えるサービスを提供します。</span></p>
			</div>
		</div>
		<div class="p-top-mv__gallery u-anim-fade u-anim-zoom">
			<ul class="p-top-mv__track">
				<li class="p-top-mv__item"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery1.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery2.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery3.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery4.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery5.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item" aria-hidden="true"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery1.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item" aria-hidden="true"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery2.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item" aria-hidden="true"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery3.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item" aria-hidden="true"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery4.webp')); ?>" alt="" width="406" height="406"/></li>
				<li class="p-top-mv__item" aria-hidden="true"><img src="<?php echo esc_url(theme_asset('img/p-top-mv-gallery5.webp')); ?>" alt="" width="406" height="406"/></li>
			</ul>
		</div>
	</section>
	<section class="p-top-point">
		<div class="l-container">
			<div class="c-heading-section c-heading-section--center p-top-point__head">
				<p class="c-heading-section__label u-anim js-visible">売却先を選ぶポイント</p>
				<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Key Points</h2>
			</div>
			<ol class="p-top-point__list">
				<li class="p-top-point__item u-anim js-visible" style="--i: 0"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num1.svg')); ?>" alt="1." width="30" height="44"/><span>正確な分析・評価</span></li>
				<li class="p-top-point__item u-anim js-visible" style="--i: 1"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num2.svg')); ?>" alt="2." width="32" height="44"/><span>価格の透明性</span></li>
				<li class="p-top-point__item u-anim js-visible" style="--i: 2"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num3.svg')); ?>" alt="3." width="33" height="44"/><span>安定した取引体制</span></li>
				<li class="p-top-point__item u-anim js-visible" style="--i: 3"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num4.svg')); ?>" alt="4." width="31" height="45"/><span>幅広い触媒への対応</span></li>
			</ol>
			<p class="p-top-point__closing u-anim js-visible"><span class="p-top-point__badge">DOWA</span>には、<br class="u-only-sp"/>そのすべてに応える体制があります</p>
		</div>
	</section>
	<section class="p-top-strength">
		<div class="l-container">
			<div class="c-heading-section c-heading-section--center p-top-strength__head">
				<p class="c-heading-section__label u-anim js-visible">私たちの強み</p>
				<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Our Strength</h2>
			</div>
			<div class="p-top-strength__intro">
				<p class="p-top-strength__title u-anim-lines js-visible"><span class="u-anim-line" style="--l: 0"><span>適正な買取を支える、</span></span><span class="u-anim-line" style="--l: 1"><span>一貫したリサイクルプロセス。</span></span></p>
				<p class="p-top-strength__lead u-anim js-visible" style="--i: 2">サンプリングから分析・製錬まで一貫して対応し、<br class="u-only-pc"/>透明性の高い評価を通じて、お客さまの安心と納得に応えます。</p>
			</div>
			<ol class="p-top-strength__list">
				<li class="p-top-strength__item u-anim js-visible" style="--i: 0">
					<div class="p-top-strength__figure u-anim-zoom">
						<video src="<?php echo esc_url(theme_asset('movie/strength_01.mp4')); ?>" width="1620" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" aria-hidden="true"></video>
						<div class="p-top-strength__detail" aria-hidden="true">
							<p class="p-top-strength__detail-title">サンプリング</p>
							<p class="p-top-strength__detail-text">お客様の原料をロットごとに丁寧に前処理し、原料全体を代表するサンプルを採取しています。高い精度が求められるPGM含有量の評価において、サンプリング工程は公正で信頼性の高い取引を支える重要な役割を担っています。</p>
						</div>
					</div>
					<h3 class="p-top-strength__name">サンプリング</h3><img class="p-top-strength__num" src="<?php echo esc_url(theme_asset('img/p-top-strength-num1.svg')); ?>" alt="" width="67" height="120" loading="lazy"/>
				</li>
				<li class="p-top-strength__item u-anim js-visible" style="--i: 1">
					<div class="p-top-strength__figure u-anim-zoom">
						<video src="<?php echo esc_url(theme_asset('movie/strength_02.mp4')); ?>" width="1620" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" aria-hidden="true"></video>
						<div class="p-top-strength__detail" aria-hidden="true">
							<p class="p-top-strength__detail-title">分析</p>
							<p class="p-top-strength__detail-text">ICP（誘導結合プラズマ）分析をはじめとする高度な分析技術とトレーサブルな品質管理体制により、PGM元素の含有量を高い精度で測定・定量しています。</p>
						</div>
					</div>
					<h3 class="p-top-strength__name">分析</h3><img class="p-top-strength__num" src="<?php echo esc_url(theme_asset('img/p-top-strength-num2.svg')); ?>" alt="" width="73" height="119" loading="lazy"/>
				</li>
				<li class="p-top-strength__item u-anim js-visible" style="--i: 2">
					<div class="p-top-strength__figure u-anim-zoom">
						<video src="<?php echo esc_url(theme_asset('movie/strength_03.mp4')); ?>" width="1620" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" aria-hidden="true"></video>
						<div class="p-top-strength__detail" aria-hidden="true">
							<p class="p-top-strength__detail-title">製錬/精製</p>
							<p class="p-top-strength__detail-text">多種多様な原料を月間1,000トン規模で処理し、貴重な資源を効率的に回収するとともに、環境負荷の低減に取り組んでいます。</p>
						</div>
					</div>
					<h3 class="p-top-strength__name">製錬/精製</h3><img class="p-top-strength__num" src="<?php echo esc_url(theme_asset('img/p-top-strength-num3.svg')); ?>" alt="" width="82" height="121" loading="lazy"/>
				</li>
			</ol>
		</div>
	</section>
	<section class="p-top-what is-section-dark">
		<div class="l-container">
			<div class="c-heading-section p-top-what__head">
				<p class="c-heading-section__label u-anim js-visible">買取原料</p>
				<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">What We Buy</h2>
			</div>
			<div class="p-top-what__body">
				<div class="p-top-what__col">
					<p class="p-top-what__lead u-anim js-visible">さまざまな使用済み触媒や、PGMを含む原料を買取しています。</p><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/material/')); ?>" style="--i: 0">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what1.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Automotive catalysts</p>
										<h3 class="p-top-what__name">自動車触媒</h3>
									</div></a><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/material/')); ?>" style="--i: 0">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what3.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Metal honeycombs</p>
										<h3 class="p-top-what__name">メタルハニカム</h3>
									</div></a>
				</div>
				<div class="p-top-what__col"><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/material/')); ?>" style="--i: 1">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what2.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Chemical catalysts</p>
										<h3 class="p-top-what__name">化学触媒</h3>
									</div></a><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/material/')); ?>" style="--i: 1">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what4.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Other PGM materials</p>
										<h3 class="p-top-what__name">その他PGM含有原料、工場残渣</h3>
									</div></a>
					<div class="p-top-what__action u-anim js-visible"><a class="c-btn c-btn--md" href="<?php echo esc_url(home_url('/material/')); ?>"><span class="c-btn__label">詳しくみる</span><span class="c-btn-arrow">
								<svg aria-hidden="true">
									<use href="#ico_arrow_ne"></use>
								</svg></span></a></div>
				</div>
			</div>
		</div>
	</section>
	<section class="p-top-feature">
		<div class="l-container">
			<div class="p-top-feature__body">
				<div class="p-top-feature__side">
					<div class="p-top-feature__intro">
						<div class="c-heading-section p-top-feature__head">
							<p class="c-heading-section__label u-anim js-visible">DOWAの特長と実績</p>
							<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Feature</h2>
						</div>
						<p class="p-top-feature__lead u-anim js-visible">1991年に日本ピージーエムを設立し、使用済み触媒からプラチナ、パラジウム、ロジウムなどの白金族金属を回収するリサイクル事業を展開しています。</p>
					</div>
				</div>
				<div class="p-top-feature__list">
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature1.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">01</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">触媒の価値を適正に評価</h3>
								<p class="c-card-feature__desc">触媒を分析により貴金属の含有量を正確に評価。素材本来の価値に基づいた、納得感のある買取価格をご提示します。</p>
							</div>
						</div>
					</div>
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature2.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">02</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">早期決済</h3>
								<p class="c-card-feature__desc">営業担当と製錬技術者が連携し、スピードと正確性を両立。分析から精算までを円滑に進め、迅速な決済を実現します。</p>
							</div>
						</div>
					</div>
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature3.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">03</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">グローバル<br>サンプリング拠点</h3>
								<p class="c-card-feature__desc">世界各地にサンプリング拠点を展開。お客様に近い場所で迅速かつ正確に対応し、スムーズな取引を支えます。</p>
							</div>
						</div>
					</div>
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature4.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">04</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">初めてのお取引でも<br>安心のサポート体制</h3>
								<p class="c-card-feature__desc">国内外を問わず、缶付き触媒やさまざまなロットに柔軟に対応。状況に合った方法をご提案し、初めての方も丁寧にサポートします。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="p-top-voice">
		<div class="l-container">
			<div class="c-heading-section p-top-voice__head">
				<p class="c-heading-section__label u-anim js-visible">自動車解体事業者様の声</p>
				<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Voice</h2>
			</div>
			<div class="js-card-slider u-anim-fade js-visible">
				<div class="p-top-voice__slider swiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<article class="c-card-voice">
								<figure class="c-card-voice__figure"><img src="<?php echo esc_url(theme_asset('img/p-top-voice1.webp')); ?>" alt="" width="940" height="680" loading="lazy"/></figure>
								<div class="c-card-voice__body">
									<p class="c-line-num">01</p>
									<div class="c-card-voice__content">
										<h3 class="c-card-voice__title">迅速な対応と安心して取引できる体制</h3>
										<p class="c-card-voice__text">担当者の対応が丁寧で、取引開始から現在まで安心してお付き合いを続けることができています。問い合わせや相談にも迅速に対応していただき、コミュニケーションもスムーズです。特に支払い対応の早さには満足しており、信頼して取引できるパートナーだと感じています。</p>
										<p class="c-card-voice__client"><span class="c-card-voice__client-label">CLIENT：</span>日本、自動車解体業者様
										</p>
									</div>
								</div>
							</article>
						</div>
						<div class="swiper-slide">
							<article class="c-card-voice">
								<figure class="c-card-voice__figure"><img src="<?php echo esc_url(theme_asset('img/p-top-voice2.webp')); ?>" alt="" width="940" height="680" loading="lazy"/></figure>
								<div class="c-card-voice__body">
									<p class="c-line-num">02</p>
									<div class="c-card-voice__content">
										<h3 class="c-card-voice__title">信頼できるサービスと円滑なコミュニケーション</h3>
										<p class="c-card-voice__client"><span class="c-card-voice__client-label">CLIENT：</span>海外リサイクル原料集荷業者
										</p>
									</div>
								</div>
							</article>
						</div>
						<div class="swiper-slide">
							<article class="c-card-voice">
								<figure class="c-card-voice__figure"><img src="<?php echo esc_url(theme_asset('img/p-top-voice3.webp')); ?>" alt="" width="940" height="680" loading="lazy"/></figure>
								<div class="c-card-voice__body">
									<p class="c-line-num">03</p>
									<div class="c-card-voice__content">
										<h3 class="c-card-voice__title">確かな技術と手厚いサポートに支えられて</h3>
										<p class="c-card-voice__client"><span class="c-card-voice__client-label">CLIENT：</span>アジア圏大手B社
										</p>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
				<div class="c-btn-ctrl-group p-top-voice__ctrl">
					<button class="c-btn-ctrl c-btn-ctrl--prev js-card-slider-prev" type="button" aria-label="前のお客様の声へ">
						<svg aria-hidden="true">
							<use href="#ico_arrow_ne"></use>
						</svg>
					</button>
					<button class="c-btn-ctrl c-btn-ctrl--next js-card-slider-next" type="button" aria-label="次のお客様の声へ">
						<svg aria-hidden="true">
							<use href="#ico_arrow_ne"></use>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</section>
	<section class="p-top-news">
		<div class="l-container">
			<div class="p-top-news__inner">
				<h2 class="p-top-news__title u-anim js-visible">新着情報</h2>
				<?php
				// 新着3件。--i はスクロールインの遅延（Utility/_u-anim.scss）
				$news = new WP_Query([
					'post_type'      => 'news',
					'posts_per_page' => 3,
					'no_found_rows'  => true,
				]);
				?>
				<div class="p-top-news__list">
					<?php if ($news->have_posts()) : $i = 0; ?>
						<?php while ($news->have_posts()) : $news->the_post(); ?>
							<a class="c-card-news c-card-news--outline u-anim js-visible" href="<?php the_permalink(); ?>" style="--i: <?php echo $i++; ?>">
								<div class="c-card-news__body">
									<div class="c-card-news__meta">
										<time class="c-card-news__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(theme_news_date()); ?></time>
										<?php if ($tag = theme_news_term_name()) : ?>
											<span class="c-card-news__tag"><?php echo esc_html($tag); ?></span>
										<?php endif; ?>
									</div>
									<p class="c-card-news__title"><?php the_title(); ?></p>
								</div>
							</a>
						<?php endwhile; ?>
					<?php endif; wp_reset_postdata(); ?>
				</div>
				<div class="p-top-news__more u-anim js-visible"><a class="c-link-arrow c-link-arrow--lg" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>"><span class="c-link-arrow__label">一覧をみる</span><span class="c-btn-arrow c-link-arrow__arrow">
							<svg aria-hidden="true">
								<use href="#ico_arrow_ne"></use>
							</svg></span></a></div>
			</div>
		</div>
	</section>
	<section class="p-top-technology is-section-dark">
		<picture class="p-top-technology__bg u-anim-zoom js-visible">
			<source media="(min-width: 641px)" srcset="<?php echo esc_url(theme_asset('img/p-top-technology-bg.webp')); ?>" width="2880" height="1800"/><img src="<?php echo esc_url(theme_asset('img/p-top-technology-bg-sp.webp')); ?>" alt="" width="804" height="1400" loading="lazy"/>
		</picture>
		<div class="l-container p-top-technology__inner">
			<p class="p-top-technology__route u-anim js-visible"><span>FROM</span><span>AKITA</span><span>TO THE WORLD</span></p>
			<div class="p-top-technology__body">
				<div class="p-top-technology__head">
					<p class="p-top-technology__label u-anim js-visible"><span class="u-only-sp">TECHNOLOGY</span><span class="u-only-pc">NPGM EXPERTISE</span></p>
					<h2 class="p-top-technology__title u-anim js-visible" style="--i: 1">日本ピージーエムの<br class="u-only-pc"/>技術力</h2>
				</div>
				<p class="p-top-technology__desc u-anim js-visible" style="--i: 2">日本ピージーエム独自の「ROSEプロセス」は、DOWAメタルマインと田中貴金属工業が共同開発した、高効率なPGM回収プロセスです。多様な原料に対応し、月間1,000トン規模の処理能力と短いリードタイムを実現。大規模処理のスケールメリットを活かし、競争力のあるサービスを提供しています。</p>
				<div class="p-top-technology__action u-anim js-visible" style="--i: 3"><a class="c-btn c-btn--lg" href="<?php echo esc_url(home_url('/technology/')); ?>"><span class="c-btn__label">詳しくみる</span><span class="c-btn-arrow c-btn-arrow--lg">
							<svg aria-hidden="true">
								<use href="#ico_arrow_ne"></use>
							</svg></span></a></div>
			</div>
		</div>
	</section>
</div>
	
<?php get_footer(); ?>
