<?php
/*
 * トップ（英語）  /en/
 * 静的コーディング src/pug/en/index.pug。日本語版はテーマ直下の front-page.php。
 * 英訳は「英訳確認シート」01 トップ。組みは日本語のトップと同じ。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-front',
]);

get_template_part('en/header');
?>
<div class="p-top">
	<section class="p-top-mv is-section-dark js-mv">
		<div class="p-top-mv__main">
			<div class="p-top-mv__movie u-anim-fade u-anim-zoom">
				<video src="<?php echo esc_url(theme_asset('movie/mv.mp4')); ?>" width="1920" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" preload="auto" aria-hidden="true"></video>
			</div>
			<div class="p-top-mv__copy">
				<h1 class="p-top-mv__title u-anim-lines"><span class="u-anim-line" style="--l: 0"><span>Precision Analysis.</span></span><span class="u-anim-line" style="--l: 1"><span>Fair Valuation.</span></span></h1>
				<p class="p-top-mv__lead u-anim" style="--i: 2">Backed by NIPPON PGM’s expertise in platinum group metals (PGMs), we provide reliable catalyst purchasing and recycling services tailored to each customer’s needs.</p>
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
				<p class="c-heading-section__label u-anim js-visible">What to Look for in a Catalyst Purchasing Partner</p>
				<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Key Points</h2>
			</div>
			<ol class="p-top-point__list">
				<li class="p-top-point__item u-anim js-visible" style="--i: 0"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num1.svg')); ?>" alt="1." width="30" height="44"/><span>Accurate Analysis and Valuation</span></li>
				<li class="p-top-point__item u-anim js-visible" style="--i: 1"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num2.svg')); ?>" alt="2." width="32" height="44"/><span>Transparent Pricing</span></li>
				<li class="p-top-point__item u-anim js-visible" style="--i: 2"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num3.svg')); ?>" alt="3." width="33" height="44"/><span>Reliable and Consistent Transactions</span></li>
				<li class="p-top-point__item u-anim js-visible" style="--i: 3"><img class="p-top-point__num" src="<?php echo esc_url(theme_asset('img/p-top-point-num4.svg')); ?>" alt="4." width="31" height="45"/><span>Flexible Handling of a Wide Range of Catalysts</span></li>
			</ol>
			<p class="p-top-point__closing u-anim js-visible"><span class="p-top-point__badge">DOWA</span> brings together all the capabilities you need in a catalyst purchasing partner.</p>
		</div>
	</section>
	<section class="p-top-strength">
		<div class="l-container">
			<div class="c-heading-section c-heading-section--center p-top-strength__head">
				<p class="c-heading-section__label u-anim js-visible">Our strengths</p>
				<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Our strengths</h2>
			</div>
			<div class="p-top-strength__intro">
				<p class="p-top-strength__title u-anim-lines js-visible"><span class="u-anim-line" style="--l: 0"><span>An Integrated Recycling Process</span></span><span class="u-anim-line" style="--l: 1"><span>for Fair and Transparent Transactions</span></span></p>
				<p class="p-top-strength__lead u-anim js-visible" style="--i: 2">Through an integrated process covering sampling, assaying, and smelting, we provide accurate and transparent valuations that give customers confidence in every transaction.</p>
			</div>
			<ol class="p-top-strength__list">
				<li class="p-top-strength__item u-anim js-visible" style="--i: 0">
					<div class="p-top-strength__figure u-anim-zoom">
						<video src="<?php echo esc_url(theme_asset('movie/strength_01.mp4')); ?>" width="1620" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" aria-hidden="true"></video>
						<div class="p-top-strength__detail" aria-hidden="true">
							<p class="p-top-strength__detail-title">Sampling</p>
							<p class="p-top-strength__detail-text">We carefully pre-treat each lot of customer material and collect a sample that represents the entire lot. Because PGM content must be evaluated with a high degree of accuracy, sampling plays a vital role in ensuring fair and reliable transactions.</p>
						</div>
					</div>
					<h3 class="p-top-strength__name">Sampling</h3><img class="p-top-strength__num" src="<?php echo esc_url(theme_asset('img/p-top-strength-num1.svg')); ?>" alt="" width="67" height="120" loading="lazy"/>
				</li>
				<li class="p-top-strength__item u-anim js-visible" style="--i: 1">
					<div class="p-top-strength__figure u-anim-zoom">
						<video src="<?php echo esc_url(theme_asset('movie/strength_02.mp4')); ?>" width="1620" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" aria-hidden="true"></video>
						<div class="p-top-strength__detail" aria-hidden="true">
							<p class="p-top-strength__detail-title">Analysis</p>
							<p class="p-top-strength__detail-text">Using advanced analytical techniques, including ICP (inductively coupled plasma) analysis, and a traceable quality control system, we accurately measure and quantify PGM content.</p>
						</div>
					</div>
					<h3 class="p-top-strength__name">Analysis</h3><img class="p-top-strength__num" src="<?php echo esc_url(theme_asset('img/p-top-strength-num2.svg')); ?>" alt="" width="73" height="119" loading="lazy"/>
				</li>
				<li class="p-top-strength__item u-anim js-visible" style="--i: 2">
					<div class="p-top-strength__figure u-anim-zoom">
						<video src="<?php echo esc_url(theme_asset('movie/strength_03.mp4')); ?>" width="1620" height="1080" autoplay="autoplay" muted="muted" loop="loop" playsinline="playsinline" aria-hidden="true"></video>
						<div class="p-top-strength__detail" aria-hidden="true">
							<p class="p-top-strength__detail-title">Smelting &amp; Refining</p>
							<p class="p-top-strength__detail-text">We process around 1,000 metric tonnes of diverse materials each month, efficiently recovering valuable resources while working to reduce our environmental impact.</p>
						</div>
					</div>
					<h3 class="p-top-strength__name">Smelting &amp; Refining</h3><img class="p-top-strength__num" src="<?php echo esc_url(theme_asset('img/p-top-strength-num3.svg')); ?>" alt="" width="82" height="121" loading="lazy"/>
				</li>
			</ol>
		</div>
	</section>
	<section class="p-top-what is-section-dark">
		<div class="l-container">
			<div class="c-heading-section p-top-what__head">
				<p class="c-heading-section__label u-anim js-visible">Materials We Purchase</p>
				<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">What We Buy</h2>
			</div>
			<div class="p-top-what__body">
				<div class="p-top-what__col">
					<p class="p-top-what__lead u-anim js-visible">We purchase a wide range of spent catalysts and other PGM-containing materials.</p><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/en/material/')); ?>" style="--i: 0">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what1.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Spent automotive catalysts</p>
										<h3 class="p-top-what__name">Spent automotive catalysts</h3>
									</div></a><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/en/material/')); ?>" style="--i: 0">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what3.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Metal honeycomb catalysts</p>
										<h3 class="p-top-what__name">Metal Honeycomb Catalysts</h3>
									</div></a>
				</div>
				<div class="p-top-what__col"><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/en/material/')); ?>" style="--i: 1">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what2.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Chemical catalysts</p>
										<h3 class="p-top-what__name">Chemical catalysts</h3>
									</div></a><a class="p-top-what__card u-anim js-visible" href="<?php echo esc_url(home_url('/en/material/')); ?>" style="--i: 1">
									<figure class="p-top-what__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-what4.webp')); ?>" alt="" width="1328" height="1328" loading="lazy"/></figure>
									<div class="p-top-what__text">
										<p class="p-top-what__en">Other PGM-bearing materials &amp; production residues</p>
										<h3 class="p-top-what__name">Other PGM-Bearing Materials and Production Residues</h3>
									</div></a>
					<div class="p-top-what__action u-anim js-visible"><a class="c-btn c-btn--md" href="<?php echo esc_url(home_url('/en/material/')); ?>"><span class="c-btn__label">Learn more</span><span class="c-btn-arrow">
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
							<p class="c-heading-section__label u-anim js-visible">DOWA’s Strengths and Track Record</p>
							<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Our capabilities</h2>
						</div>
						<p class="p-top-feature__lead u-anim js-visible">Since jointly establishing NIPPON PGM in 1991, DOWA has expanded its catalyst recycling business, recovering platinum group metals such as platinum, palladium, and rhodium from spent catalysts.</p>
					</div>
				</div>
				<div class="p-top-feature__list">
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature1.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">01</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">Fair Valuation of Your Catalysts</h3>
								<p class="c-card-feature__desc">Representative samples are analyzed to accurately determine the precious metal content of each lot. Based on the assay results and applicable market prices, we provide a clear and transparent purchase price.</p>
							</div>
						</div>
					</div>
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature2.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">02</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">Prompt Settlement</h3>
								<p class="c-card-feature__desc">Our sales representatives and smelting engineers work closely together to ensure both speed and accuracy. This coordination streamlines the process from analysis through final settlement, enabling prompt payment.</p>
							</div>
						</div>
					</div>
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature3.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">03</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">Global sampling network</h3>
								<p class="c-card-feature__desc">Through our global sampling network, we provide responsive support and accurate sampling closer to our customers, helping facilitate smooth and reliable transactions.</p>
							</div>
						</div>
					</div>
					<div class="c-card-feature u-anim js-visible">
						<figure class="c-card-feature__figure u-anim-zoom"><img src="<?php echo esc_url(theme_asset('img/p-top-feature4.webp')); ?>" alt="" width="720" height="500" loading="lazy"/></figure>
						<div class="c-card-feature__body">
							<p class="c-line-num">04</p>
							<div class="c-card-feature__text">
								<h3 class="c-card-feature__title">Dedicated Support for First-Time Customers</h3>
								<p class="c-card-feature__desc">In Japan and overseas, we accommodate catalysts both with and without their canisters, as well as a wide range of lot sizes. We recommend an approach suited to each customer’s materials and requirements and provide clear support throughout the process.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="p-top-voice">
		<div class="l-container">
			<div class="p-top-voice__head">
				<div class="c-heading-section">
					<p class="c-heading-section__label u-anim js-visible">Customer testimonials</p>
					<h2 class="c-heading-section__title u-anim js-visible" style="--i: 1">Voice</h2>
				</div>
				<div class="c-btn-ctrl-group p-top-voice__ctrl p-top-voice__ctrl--head u-anim js-visible" style="--i: 2">
					<button class="c-btn-ctrl c-btn-ctrl--prev js-card-slider-prev" type="button" aria-label="Previous testimonial">
						<svg aria-hidden="true">
							<use href="#ico_arrow_ne"></use>
						</svg>
					</button>
					<button class="c-btn-ctrl c-btn-ctrl--next js-card-slider-next" type="button" aria-label="Next testimonial">
						<svg aria-hidden="true">
							<use href="#ico_arrow_ne"></use>
						</svg>
					</button>
				</div>
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
										<h3 class="c-card-voice__title">Reliable Service and Smooth Communication</h3>
										<p class="c-card-voice__text">We are highly satisfied with the quality and reliability of NIPPON PGM’s services. The team explains everything clearly and communicates smoothly, so we can conduct business with confidence. We also have high expectations for its analysis and sampling services and look forward to seeing them continue to improve.</p>
										<p class="c-card-voice__client"><span class="c-card-voice__client-label">CLIENT: </span>Overseas Recyclable Materials Supplier
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
										<h3 class="c-card-voice__title">Proven Expertise and Attentive Support</h3>
										<p class="c-card-voice__text">We have great confidence in NIPPON PGM’s world-class PGM processing capacity and technical expertise, as well as its prompt and flexible support. The team responds thoughtfully to our inquiries and requests, making NIPPON PGM an indispensable partner to our business. We know we can count on them for a long-term relationship.</p>
										<p class="c-card-voice__client"><span class="c-card-voice__client-label">CLIENT: </span>Lorene Japan Co., Ltd.
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
										<h3 class="c-card-voice__title">Transparent Transactions and Accurate Analysis</h3>
										<p class="c-card-voice__text">From the outset, NIPPON PGM listened carefully to our proposals, giving us the confidence to begin working together. Its analysis results are accurate and transparent, giving us confidence in every transaction. Communication remains smooth, with information shared thoroughly even when our point of contact changes.</p>
										<p class="c-card-voice__client"><span class="c-card-voice__client-label">CLIENT: </span>Asian Recycling Materials Collector
										</p>
									</div>
								</div>
							</article>
						</div>
						<div class="swiper-slide">
							<article class="c-card-voice">
								<figure class="c-card-voice__figure"><img src="<?php echo esc_url(theme_asset('img/p-top-voice4.webp')); ?>" alt="" width="940" height="680" loading="lazy"/></figure>
								<div class="c-card-voice__body">
									<p class="c-line-num">04</p>
									<div class="c-card-voice__content">
										<h3 class="c-card-voice__title">Prompt Service and a Partnership We Can Trust</h3>
										<p class="c-card-voice__text">The team is attentive, and we have felt at ease working with NIPPON PGM from the beginning. Inquiries and consultations are handled promptly, and communication is always smooth. We are especially pleased with how quickly payments are processed and see NIPPON PGM as a trusted partner.</p>
										<p class="c-card-voice__client"><span class="c-card-voice__client-label">CLIENT: </span>Japanese Auto Dismantler
										</p>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
				<div class="c-btn-ctrl-group p-top-voice__ctrl p-top-voice__ctrl--foot">
					<button class="c-btn-ctrl c-btn-ctrl--prev js-card-slider-prev" type="button" aria-label="Previous testimonial">
						<svg aria-hidden="true">
							<use href="#ico_arrow_ne"></use>
						</svg>
					</button>
					<button class="c-btn-ctrl c-btn-ctrl--next js-card-slider-next" type="button" aria-label="Next testimonial">
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
				<h2 class="p-top-news__title u-anim js-visible">News</h2>
				<?php
				// 新着3件。--i はスクロールインの遅延（Utility/_u-anim.scss）
				$news = new WP_Query([
					'post_type'      => 'news_en',
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
				<div class="p-top-news__more u-anim js-visible"><a class="c-link-arrow c-link-arrow--lg" href="<?php echo esc_url(get_post_type_archive_link('news_en')); ?>"><span class="c-link-arrow__label">View all</span><span class="c-btn-arrow c-link-arrow__arrow">
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
					<p class="p-top-technology__label u-anim js-visible">PGM Expertise</p>
					<h2 class="p-top-technology__title u-anim js-visible" style="--i: 1">NIPPON PGM’s Expertise in Sampling, Assaying, and Smelting</h2>
				</div>
				<p class="p-top-technology__desc u-anim js-visible" style="--i: 2">NIPPON PGM’s proprietary ROSE Process is a highly efficient PGM recovery technology jointly developed by DOWA Metals &amp; Mining Co., Ltd. and Tanaka Precious Metal Technologies Co., Ltd. With a processing capacity of approximately 1,000 metric tons per month, it efficiently handles a wide range of PGM-bearing materials. This large-scale processing capability enables DOWA to offer competitive catalyst recycling services.</p>
				<div class="p-top-technology__action u-anim js-visible" style="--i: 3"><a class="c-btn c-btn--lg" href="<?php echo esc_url(home_url('/en/technology/')); ?>"><span class="c-btn__label">Learn more</span><span class="c-btn-arrow c-btn-arrow--lg">
							<svg aria-hidden="true">
								<use href="#ico_arrow_ne"></use>
							</svg></span></a></div>
			</div>
		</div>
	</section>
</div>
	
<?php get_template_part('en/footer'); ?>
