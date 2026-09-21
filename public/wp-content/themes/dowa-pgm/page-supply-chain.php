<?php
/*
 * 責任ある調達（日本語）  /supply-chain/
 * 静的コーディング src/pug/supply-chain/index.pug。英語版は en/page-supply-chain.php。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-supply',
    'title'      => '責任ある調達',
    'breadcrumb' => '責任ある調達',
]);

get_header();
?>
<div class="p-supply">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('責任ある調達'); ?>
				</h1>
				<p class="c-heading-page__label">Supply Chain</p>
			</div>
		</div>
	</div>
	<section class="p-supply-policy">
		<div class="l-container">
			<div class="p-supply-list">
				<div class="c-card-num">
					<div class="c-card-num__body">
						<p class="c-card-num__num">#01</p>
						<div class="c-card-num__text">
							<h2 class="c-card-num__title">国際基準に基づく調達管理</h2>
							<p class="c-card-num__desc">製錬所には、原料の由来や紛争・人権・環境リスクを確認する責任があります。DOWAメタルマイン、および日本ピージーエムは、サプライチェーンの透明性を確保し、リスクの高い触媒や原料を取り扱わない体制を構築しています。</p>
						</div>
					</div>
					<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-supply-pic1.webp')); ?>" alt="" width="1458" height="998" loading="eager"/></figure>
				</div>
				<div class="c-line-dot" aria-hidden="true"></div>
				<div class="c-card-num">
					<div class="c-card-num__body">
						<p class="c-card-num__num">#02</p>
						<div class="c-card-num__text">
							<h2 class="c-card-num__title">OECD/LPPMに準拠した責任ある調達方針</h2>
							<p class="c-card-num__desc">DOWAメタルマインは、OECDのガイダンスに基づき、リスクのある鉱物を使用しない方針を採用しています。さらに、年1回の第三者監査と情報公開を通じて、透明性と信頼性の高い調達体制を維持しています。</p>
						</div>
						<div class="c-card-num__action"><a class="c-banner-link" href="#" target="_blank" rel="noopener" aria-label="DOWAメタルマイン株式会社 責任ある調達について（新しいウィンドウで開きます）"><span class="c-banner-link__body"><img class="c-banner-link__logo" src="<?php echo esc_url(theme_asset('img/logo-dowa-mm.svg')); ?>" width="280" height="14" alt=""/><span class="c-banner-link__label">責任ある調達について</span></span><span class="c-btn-arrow c-btn-arrow--xs c-btn-arrow--action c-btn-arrow--tri">
									<svg aria-hidden="true">
										<use href="#ico_tri_d"></use>
									</svg></span></a></div>
					</div>
					<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-supply-pic2.webp')); ?>" alt="" width="1458" height="998" loading="lazy"/></figure>
				</div>
			</div>
		</div>
	</section>
	<section class="p-supply-dd">
		<div class="l-container">
			<div class="p-supply-dd__inner">
				<div class="p-supply-dd__head">
					<h2 class="c-heading-marker"><span class="c-marker">
							<svg aria-hidden="true">
								<use href="#ico_marker"></use>
							</svg></span><span>取引開始前の<br class="sp">デューデリジェンス</span></h2>
					<p class="p-supply-dd__lead">安心してお取引頂くために、お客様や原料の出所に関するリスクを事前に確認します。</p>
				</div>
				<ol class="p-supply-dd__list">
					<li class="c-card-procedure">
						<div class="c-card-procedure__head">
							<p class="c-card-procedure__num">1</p>
							<h3 class="c-card-procedure__title">必要書類のご記入とご準備</h3>
						</div>
						<div class="p-supply-docs">
							<div class="p-supply-docs__col">
								<h4 class="p-supply-docs__head">お客様にご用意頂く書類</h4>
								<ul class="p-supply-docs__list">
									<li><span>本人確認書類</span></li>
									<li><span>履歴事項全部証明書</span></li>
									<li><span>事業許可証</span></li>
									<li><span>納税者番号(<span class="u-font-en">VAT</span>証明書)</span></li>
								</ul>
							</div>
							<div class="p-supply-docs__col">
								<h4 class="p-supply-docs__head">お渡ししてご記入頂く書類</h4>
								<ul class="p-supply-docs__list">
									<li><span><span class="u-font-en">LPPM</span> 責任ある調達に関する確認書<span class="u-font-en">(OBQ)</span></span></li>
									<li><span><span class="u-font-en">PGM</span>リサイクル取引に関する宣誓書</span></li>
								</ul>
							</div>
						</div>
					</li>
					<li class="c-card-procedure">
						<div class="c-card-procedure__head">
							<p class="c-card-procedure__num">2</p>
							<h3 class="c-card-procedure__title">リスクの特定と評価</h3>
						</div>
						<p class="c-card-procedure__desc">コンプライアンス責任者が原料の出所や取引先を調査し、人権・環境・不正などのリスクを確認します。</p>
					</li>
					<li class="c-card-procedure">
						<div class="c-card-procedure__head">
							<p class="c-card-procedure__num">3</p>
							<h3 class="c-card-procedure__title">現地訪問</h3>
						</div>
						<p class="c-card-procedure__desc">初回取引前に現地視察を実施し、お客様の操業状況やPGM含有触媒の保管状況を確認します。<br/>初回取引後は、12か月〜18か月毎に継続的な現地視察を行います。</p>
					</li>
				</ol>
			</div>
		</div>
	</section>
</div>
	
<?php get_footer(); ?>
