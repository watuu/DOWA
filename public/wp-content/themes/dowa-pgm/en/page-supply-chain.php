<?php
/*
 * 責任ある調達（英語）  /en/supply-chain/
 * 静的コーディング src/pug/en/supply-chain/index.pug。英訳は「英訳確認シート」04。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-supply',
    'title'      => 'Responsible Sourcing',
    'breadcrumb' => 'Responsible Sourcing',
]);

get_template_part('en/header');
?>
<div class="p-supply">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('Responsible Sourcing'); ?>
				</h1>
				<p class="c-heading-page__label">Responsible Sourcing</p>
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
							<h2 class="c-card-num__title">Sourcing Controls Aligned with International Standards</h2>
							<p class="c-card-num__desc">Smelters play an important role in reviewing the origin of the materials they receive and assessing potential risks related to conflict, human rights, and the environment. DOWA Metals &amp; Mining Co., Ltd. and NIPPON PGM Co., Ltd. have established sourcing controls to promote supply chain transparency and accept only catalysts and other materials that meet their responsible sourcing requirements.</p>
						</div>
					</div>
					<figure class="c-card-num__figure"><img src="<?php echo esc_url(theme_asset('img/p-supply-pic1.webp')); ?>" alt="" width="1458" height="998" loading="eager"/></figure>
				</div>
				<div class="c-line-dot" aria-hidden="true"></div>
				<div class="c-card-num">
					<div class="c-card-num__body">
						<p class="c-card-num__num">#02</p>
						<div class="c-card-num__text">
							<h2 class="c-card-num__title">Responsible Sourcing Policy Aligned with OECD and LPPM Guidance</h2>
							<p class="c-card-num__desc">We follow a responsible sourcing policy based on OECD guidance and accept only minerals and other materials that meet our responsible sourcing requirements. Through annual independent third-party audits and public disclosure of relevant information, we work to maintain a transparent and reliable sourcing system.</p>
						</div>
						<div class="c-card-num__action"><a class="c-banner-link" href="#" target="_blank" rel="noopener" aria-label="DOWA METALS &amp; MINING CO., LTD.: Learn More about Responsible Sourcing (opens in a new window)"><span class="c-banner-link__body"><img class="c-banner-link__logo" src="<?php echo esc_url(theme_asset('img/logo-dowa-mm.svg')); ?>" width="280" height="14" alt=""/><span class="c-banner-link__label">Learn More about Responsible Sourcing</span></span><span class="c-btn-arrow c-btn-arrow--xs c-btn-arrow--action c-btn-arrow--tri">
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
							</svg></span><span>Due Diligence Before the First Transaction</span></h2>
					<p class="p-supply-dd__lead">To support responsible and transparent transactions, we assess potential risks related to prospective customers and the origin of their materials before entering into a business relationship.</p>
				</div>
				<ol class="p-supply-dd__list">
					<li class="c-card-procedure">
						<div class="c-card-procedure__head">
							<p class="c-card-procedure__num">1</p>
							<h3 class="c-card-procedure__title">Required Documentation</h3>
						</div>
						<div class="p-supply-docs">
							<div class="p-supply-docs__col">
								<h4 class="p-supply-docs__head">Documents to Be Provided by the Customer</h4>
								<ul class="p-supply-docs__list">
									<li><span>Identification documents</span></li>
									<li><span>Official company registration certificate</span></li>
									<li><span>Business License or Permit</span></li>
									<li><span>Tax identification number or VAT certificate</span></li>
								</ul>
							</div>
							<div class="p-supply-docs__col">
								<h4 class="p-supply-docs__head">Documents We Will Provide for Completion</h4>
								<ul class="p-supply-docs__list">
									<li><span>LPPM Responsible Sourcing Questionnaire</span></li>
									<li><span>Client Acknowledgement</span></li>
								</ul>
							</div>
						</div>
					</li>
					<li class="c-card-procedure">
						<div class="c-card-procedure__head">
							<p class="c-card-procedure__num">2</p>
							<h3 class="c-card-procedure__title">Risk Identification &amp; Assessment</h3>
						</div>
						<p class="c-card-procedure__desc">Our compliance team reviews the origin of the materials and the background of each prospective customer to identify potential risks related to human rights, the environment, illicit trade, and other forms of misconduct.</p>
					</li>
					<li class="c-card-procedure">
						<div class="c-card-procedure__head">
							<p class="c-card-procedure__num">3</p>
							<h3 class="c-card-procedure__title">On-Site Visits</h3>
						</div>
						<p class="c-card-procedure__desc">Before the first transaction, we conduct an on-site visit to review the prospective customer’s operations and the storage and management of PGM-bearing catalysts. Following the initial transaction, additional on-site visits are generally conducted every 12 to 18 months as part of our ongoing due diligence.</p>
					</li>
				</ol>
			</div>
		</div>
	</section>
</div>
	
<?php get_template_part('en/footer'); ?>
