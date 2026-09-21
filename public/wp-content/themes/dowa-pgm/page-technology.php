<?php
/*
 * NPGMの技術（日本語）  /technology/
 * 静的コーディング src/pug/technology/index.pug。英語版は en/page-technology.php。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-technology',
    'title'      => 'NPGMの技術',
    'breadcrumb' => '日本PGMの技術',
]);

get_header();
?>
<div class="p-technology">
	<div class="cm-block-header-page cm-block-header-page--section">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('日本PGMの技術'); ?>
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
									</svg></span><span>サンプリング</span></h2>
				<div class="p-technology-sampling">
					<div class="c-heading-lead">
						<h3 class="c-heading-lead__title">信頼は、正確なサンプリングから始まる</h3>
						<p class="c-heading-lead__desc">わずかな誤差が評価を左右するPGMリサイクルでは、サンプリング精度が極めて重要です。日本ピージーエムでは、原料特性に応じて複数のラインを使い分け、偏りのない代表性の高いサンプルを採取。長年培った技術により、透明性と信頼性の高い評価を実現しています。</p>
					</div>
					<div class="p-technology-diagram c-scroll-x">
						<div class="c-scroll-x__inner js-scroll-x"><img class="p-technology-diagram__img" src="<?php echo esc_url(theme_asset('img/p-technology-sample.svg')); ?>" width="1188" height="435" alt="サンプリングの流れ。破砕工程：01 原料、02 粗粉砕、03 微粉砕。サンプリング工程：04 縮分。分析用サンプル：05 サンプル。"/></div>
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
									</svg></span><span>分析</span></h2>
				<div class="p-technology-research">
					<div class="c-card-num c-card-num--text-first">
						<div class="c-card-num__body">
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">豊富な知見を持つ分析機関</h3>
								<p class="c-card-num__desc">日本ピージーエムの信頼性を支える分析は、政府認定の総合分析機関であるDOWAテクノリサーチが担当しています。<br>PGM分析をはじめ、環境分析や製錬分析で培った豊富なノウハウを活かし、多様な原料を総合的に評価。第三者機関として中立的な立場から、信頼性の高い分析データを提供しています。</p>
							</div>
						</div>
						<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-technology-research1.webp')); ?>" alt="" width="1456" height="997" loading="lazy"/></figure>
					</div>
					<div class="c-line-dot" aria-hidden="true"></div>
					<div class="c-card-num c-card-num--text-first">
						<div class="c-card-num__body">
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">正確なICP分析技術</h3>
								<p class="c-card-num__desc">組成が複雑でばらつきの大きい貴金属スクラップにも、高精度な分析を実現しています。ICP（誘導結合プラズマ）分析をはじめ、複数の分析手法を組み合わせることで、微量成分まで正確に定量。分析はDOWAテクノリサーチが高度な分析機器と豊富な知見を活かして実施し、精度と再現性の高いデータで原料評価の信頼性を支えています。</p>
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
									</svg></span><span>製錬</span></h2>
				<div class="p-technology-smelting">
					<div class="c-card-num c-card-num--text-first c-card-num--media-left">
						<div class="c-card-num__body">
							<p class="c-card-num__num">#01</p>
							<div class="c-card-num__text">
								<h3 class="c-card-num__title">世界最大級のPGM製錬</h3>
								<p class="c-card-num__desc">日本ピージーエムの原料処理技術「ROSEプロセス」は、親会社であるDOWAメタルマイン株式会社と田中貴金属工業の共同開発によって生まれた、低エネルギーかつ高効率なPGM回収プロセスです。多種多様な原料を月間1,000トン規模で処理し、優れたエネルギー効率を実現しています。</p>
							</div>
							<div class="c-keypoint">
								<p class="c-keypoint__label"><span class="c-marker">
										<svg aria-hidden="true">
											<use href="#ico_marker"></use>
										</svg></span><span>KEYPOINT</span></p>
								<ul class="c-keypoint__list">
									<li><a class="c-keypoint__link" href="<?php echo esc_url(home_url('/material/')); ?>"><span class="c-keypoint__link-label">多種多様な取扱原料</span><span class="c-btn-arrow c-btn-arrow--xs c-btn-arrow--action c-btn-arrow--tri">
												<svg aria-hidden="true">
													<use href="#ico_tri_d"></use>
												</svg></span></a>
									</li>
									<li><span>月間約<span class="u-font-en">1,000t</span>の大規模な処理能力</span>
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
								<h3 class="c-card-num__title">高効率のPGM回収</h3>
								<p class="c-card-num__desc">一般的な製錬所では、他工程を経由するため処理に時間がかかり、PGMの回収効率も低下します。日本ピージーエムは、PGM専用設備により短期間で高効率な回収を実現。低エネルギー操業と大規模処理によるコストメリットを活かし、競争力のあるサービスを提供しています。</p>
							</div>
							<div class="c-keypoint">
								<p class="c-keypoint__label"><span class="c-marker">
										<svg aria-hidden="true">
											<use href="#ico_marker"></use>
										</svg></span><span>KEYPOINT</span></p>
								<ul class="c-keypoint__list">
									<li><span>大規模処理だから高効率</span>
									</li>
									<li><span><span class="u-font-en">PGM</span>原料特化だから高効率</span>
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
								<h3 class="c-card-num__title">リサイクル100%白金族金属を再び市場へ</h3>
								<p class="c-card-num__desc">ROSEプロセスでは、原料中の貴金属濃度を最終的に約60%まで高め、最終精製に適した銅合金の状態へと仕上げます。<br>その後、田中貴金属工業にて精製を行い、精製された地金は再び市場へ供給されます。この一連の流れにより、資源を有効活用する循環型ビジネスが成立しています。</p>
							</div>
						</div>
						<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-technology-smelting3.webp')); ?>" alt="" width="1200" height="840" loading="lazy"/></figure>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
	
<?php get_footer(); ?>
