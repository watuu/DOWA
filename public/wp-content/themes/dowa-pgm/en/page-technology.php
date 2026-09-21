<?php
/*
 * NPGMの技術（英語）  /en/technology/
 * 静的コーディング src/pug/en/technology/index.pug。英訳は「英訳確認シート」05。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-technology',
    'title'      => 'NPGM Expertise',
    'breadcrumb' => 'NIPPON PGM Expertise',
]);

get_template_part('en/header');
?>
<div class="p-technology">
	<div class="cm-block-header-page cm-block-header-page--section">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('NIPPON PGM’s Expertise in Sampling, Assaying, and Smelting'); ?>
				</h1>
				<p class="c-heading-page__label">NPGM Expertise</p>
			</div>
		</div>
	</div>
	<div class="l-container">
		<div class="p-technology-sections">
			<section class="p-technology-section" id="sampling">
							<h2 class="c-heading-marker"><span class="c-marker">
									<svg aria-hidden="true">
										<use href="#ico_marker"></use>
									</svg></span><span>Sampling</span></h2>
				<div class="p-technology-sampling">
					<div class="c-heading-lead">
						<h3 class="c-heading-lead__title">Trust Begins with Accurate Sampling</h3>
						<p class="c-heading-lead__desc">In PGM recycling, where even the slightest variation can affect material valuation, sampling accuracy is essential. NIPPON PGM uses multiple sampling lines tailored to the characteristics of each material to obtain representative, unbiased samples. Backed by decades of expertise, NIPPON PGM supports transparent, accurate, and reliable material valuation.</p>
					</div>
					<div class="p-technology-diagram c-scroll-x">
						<div class="c-scroll-x__inner js-scroll-x"><img class="p-technology-diagram__img" src="<?php echo esc_url(theme_asset('img/p-technology-sample.svg')); ?>" width="1188" height="435" alt="Sampling flow. Crushing Process: 01 Material, 02 Primary Crushing, 03 Secondary Crushing. Sampling Process: 04 Sample Reduction. Sample for Analysis: 05 Representative Sample."/></div>
						<div class="c-scroll-x__bar" aria-hidden="true"><span class="c-scroll-x__thumb"></span></div>
					</div>
					<div class="p-technology-photos">
						<figure class="p-technology-photos__item"><img src="<?php echo esc_url(theme_asset('img/p-technology-sample1.webp')); ?>" alt="" width="772" height="572" loading="lazy"/></figure>
						<figure class="p-technology-photos__item"><img src="<?php echo esc_url(theme_asset('img/p-technology-sample2.webp')); ?>" alt="" width="772" height="572" loading="lazy"/></figure>
						<figure class="p-technology-photos__item"><img src="<?php echo esc_url(theme_asset('img/p-technology-sample3.webp')); ?>" alt="" width="772" height="572" loading="lazy"/></figure>
					</div>
				</div>
			</section>
			<section class="p-technology-section" id="research">
							<h2 class="c-heading-marker"><span class="c-marker">
									<svg aria-hidden="true">
										<use href="#ico_marker"></use>
									</svg></span><span>Analysis</span></h2>
				<div class="p-technology-research">
					<div class="c-card-num c-card-num--text-first">
						<div class="c-card-num__body">
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">Analysis Backed by Extensive Expertise</h3>
								<p class="c-card-num__desc">The analysis supporting NIPPON PGM’s material valuation is performed by DOWA TECHNO RESEARCH CO., LTD., a specialist analytical laboratory with extensive experience in materials analysis. Drawing on its expertise in PGM, environmental, and metallurgical analysis, DOWA TECHNO RESEARCH evaluates a wide range of materials and provides accurate, reliable, and objective analytical data.</p>
							</div>
						</div>
						<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-technology-research1.webp')); ?>" alt="" width="1456" height="997" loading="lazy"/></figure>
					</div>
					<div class="c-line-dot" aria-hidden="true"></div>
					<div class="c-card-num c-card-num--text-first">
						<div class="c-card-num__body">
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">High-Precision ICP Analysis</h3>
								<p class="c-card-num__desc">Complex materials require precise analysis. By combining ICP (inductively coupled plasma) analysis with other advanced analytical techniques, DOWA TECHNO RESEARCH accurately determines the composition and precious metal content of a wide range of materials. Its advanced analytical capabilities and extensive expertise deliver reliable and reproducible data that supports fair and transparent material evaluation.</p>
							</div>
						</div>
						<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-technology-research2.webp')); ?>" alt="" width="1456" height="997" loading="lazy"/></figure>
					</div>
				</div>
			</section>
			<section class="p-technology-section" id="smelting">
							<h2 class="c-heading-marker"><span class="c-marker">
									<svg aria-hidden="true">
										<use href="#ico_marker"></use>
									</svg></span><span>Smelting</span></h2>
				<div class="p-technology-smelting">
					<div class="c-card-num c-card-num--text-first c-card-num--media-left">
						<div class="c-card-num__body">
							<p class="c-card-num__num">#01</p>
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">One of the World’s Largest PGM Recycling Smelters</h3>
								<p class="c-card-num__desc">NIPPON PGM’s proprietary ROSE Process is a low-energy, high-efficiency PGM recovery technology jointly developed by DOWA Metals &amp; Mining Co., Ltd. and Tanaka Precious Metal Technologies Co., Ltd. With a processing capacity of approximately 1,000 metric tons per month, the ROSE Process efficiently handles a wide range of PGM-bearing materials while maintaining high energy efficiency.</p>
							</div>
							<div class="c-keypoint">
								<p class="c-keypoint__label"><span class="c-marker">
										<svg aria-hidden="true">
											<use href="#ico_marker"></use>
										</svg></span><span>KEYPOINT</span></p>
								<ul class="c-keypoint__list">
									<li><a class="c-keypoint__link" href="<?php echo esc_url(home_url('/en/material/')); ?>"><span class="c-keypoint__link-label">Processes a Wide Range of PGM-Bearing Materials</span><span class="c-btn-arrow c-btn-arrow--xs c-btn-arrow--action c-btn-arrow--tri">
												<svg aria-hidden="true">
													<use href="#ico_tri_d"></use>
												</svg></span></a>
									</li>
									<li><span>Processing Capacity of Approximately 1,000 Metric Tons per Month</span>
									</li>
								</ul>
							</div>
						</div>
						<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-technology-smelting1.webp')); ?>" alt="" width="1200" height="840" loading="lazy"/></figure>
					</div>
					<div class="c-line-dot" aria-hidden="true"></div>
					<div class="c-card-num c-card-num--text-first c-card-num--media-left">
						<div class="c-card-num__body">
							<p class="c-card-num__num">#02</p>
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">High-Efficiency Recovery of Platinum Group Metals</h3>
								<p class="c-card-num__desc">Conventional smelting routes often require multiple processing steps before PGMs can be recovered, resulting in longer processing times. NIPPON PGM’s dedicated PGM smelting facilities enable fast and efficient recovery. Combined with low-energy operation and large-scale processing, these capabilities support competitive PGM recycling services.</p>
							</div>
							<div class="c-keypoint">
								<p class="c-keypoint__label"><span class="c-marker">
										<svg aria-hidden="true">
											<use href="#ico_marker"></use>
										</svg></span><span>KEYPOINT</span></p>
								<ul class="c-keypoint__list">
									<li><span>High-efficiency recovery through dedicated PGM smelting facilities</span>
									</li>
									<li><span>Environmentally conscious operation supported by large-scale processing</span>
									</li>
								</ul>
							</div>
						</div>
						<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-technology-smelting2.webp')); ?>" alt="" width="1200" height="840" loading="lazy"/></figure>
					</div>
					<div class="c-line-dot" aria-hidden="true"></div>
					<div class="c-card-num c-card-num--text-first c-card-num--media-left">
						<div class="c-card-num__body">
							<p class="c-card-num__num">#03</p>
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">Returning Platinum Group Metals to the Market</h3>
								<p class="c-card-num__desc">Through the ROSE Process, the precious metal content of the material is increased to approximately 60%, producing a copper alloy suitable for final refining. The material is then refined by Tanaka Precious Metal Technologies Co., Ltd. into high-purity PGMs. This closed-loop process returns valuable platinum group metals to the market and supports the sustainable use of finite resources.</p>
							</div>
						</div>
						<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-technology-smelting3.webp')); ?>" alt="" width="1200" height="840" loading="lazy"/></figure>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
	
<?php get_template_part('en/footer'); ?>
