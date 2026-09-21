<?php
/*
 * お取引の流れ（英語）  /en/flow/
 * 静的コーディング src/pug/en/flow/index.pug。英訳は「英訳確認シート」02 と FAQ の docx。
 */
theme_set_page([
    'lang'       => 'en',
    'class'      => 'page-flow',
    'title'      => 'How It Works',
    'breadcrumb' => 'How It Works',
]);

get_template_part('en/header');
?>
<div class="p-flow">
	<div class="cm-block-header-page cm-block-header-page--lead">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('How It Works'); ?>
				</h1>
				<p class="c-heading-page__label">Transaction Flow</p>
			</div>
		</div>
	</div>
	<section class="p-flow-body">
		<div class="l-container">
			<p class="p-flow-lead">We guide customers through every step of the transaction, from material delivery and analysis to valuation and final settlement. Based on your materials and requirements, we recommend a suitable transaction approach and provide support throughout the process.</p>
			<ol class="p-flow-steps">
				<li class="c-card-step">
					<p class="c-card-step__num">1</p>
					<div class="c-card-step__main">
						<figure class="c-card-step__figure"><img src="<?php echo esc_url(theme_asset('img/p-flow-pic1.webp')); ?>" alt="" width="840" height="560" loading="eager"/></figure>
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">Initial Inquiry &amp; Consultation</h2>
							<p class="c-card-step__desc">Tell us about the type, condition, and quantity of your spent catalysts. Based on your materials and requirements, we will recommend a suitable approach for the transaction.</p>
							<div class="c-card-step__action"><a class="c-btn" href="<?php echo esc_url(home_url('/en/contact/')); ?>"><span class="c-btn__label">Contact us</span><span class="c-btn__arrow">
										<svg aria-hidden="true">
											<use href="#ico_arrow_r"></use>
										</svg></span></a></div>
						</div>
					</div>
				</li>
				<li class="c-card-step">
					<p class="c-card-step__num">2</p>
					<div class="c-card-step__main">
						<figure class="c-card-step__figure"><img src="<?php echo esc_url(theme_asset('img/p-flow-pic2.webp')); ?>" alt="" width="840" height="560" loading="lazy"/></figure>
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">Customer and Material Due Diligence</h2>
							<p class="c-card-step__desc">In accordance with our responsible sourcing policy, we conduct due diligence on prospective customers and the origin of their materials to identify potential risks before entering into a transaction.</p>
							<div class="c-card-step__action"><a class="c-link-arrow" href="<?php echo esc_url(home_url('/en/supply-chain/')); ?>"><span class="c-link-arrow__label">Learn More about Responsible Sourcing</span><span class="c-btn-arrow c-link-arrow__arrow">
										<svg aria-hidden="true">
											<use href="#ico_arrow_r"></use>
										</svg></span></a></div>
						</div>
					</div>
				</li>
				<li class="c-card-step">
					<p class="c-card-step__num">3</p>
					<div class="c-card-step__main">
						<figure class="c-card-step__figure"><img src="<?php echo esc_url(theme_asset('img/p-flow-pic3.webp')); ?>" alt="" width="840" height="560" loading="lazy"/></figure>
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">Material Receipt, Crushing &amp; Sampling</h2>
							<p class="c-card-step__desc">Each lot received is carefully crushed and homogenized, followed by sample reduction to obtain a representative sample. Because this sample forms the basis for determining PGM content, accurate sampling is essential to a fair and reliable valuation.</p>
							<div class="c-card-step__action"><a class="c-link-arrow" href="<?php echo esc_url(home_url('/en/technology/')); ?>"><span class="c-link-arrow__label">Learn More about Sampling</span><span class="c-btn-arrow c-link-arrow__arrow">
										<svg aria-hidden="true">
											<use href="#ico_arrow_r"></use>
										</svg></span></a></div>
						</div>
					</div>
				</li>
				<li class="c-card-step">
					<p class="c-card-step__num">4</p>
					<div class="c-card-step__main">
						<figure class="c-card-step__figure"><img src="<?php echo esc_url(theme_asset('img/p-flow-pic4.webp')); ?>" alt="" width="840" height="560" loading="lazy"/></figure>
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">Weight Determination</h2>
							<p class="c-card-step__desc">Both the wet weight and the moisture-free dry weight are determined.</p>
						</div>
					</div>
				</li>
				<li class="c-card-step">
					<p class="c-card-step__num">5</p>
					<div class="c-card-step__main">
						<figure class="c-card-step__figure"><img src="<?php echo esc_url(theme_asset('img/p-flow-pic5.webp')); ?>" alt="" width="840" height="560" loading="lazy"/></figure>
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">Assay Results, Valuation &amp; Final Settlement</h2>
							<p class="c-card-step__desc">Representative samples are analyzed by DOWA TECHNO RESEARCH CO., LTD., a specialist analytical laboratory. The PGM content of each lot is accurately determined, and payment is then made in accordance with the agreed terms.</p>
							<div class="c-card-step__action"><a class="c-link-arrow" href="<?php echo esc_url(home_url('/en/technology/')); ?>"><span class="c-link-arrow__label">Learn More about Analysis</span><span class="c-btn-arrow c-link-arrow__arrow">
										<svg aria-hidden="true">
											<use href="#ico_arrow_r"></use>
										</svg></span></a></div>
						</div>
					</div>
				</li>
				<li class="c-card-step c-card-step--end">
					<p class="c-card-step__num">6</p>
					<div class="c-card-step__main">
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">Smelting &amp; Refining Process</h2>
						</div>
					</div>
				</li>
			</ol>
		</div>
	</section>
	<section class="p-flow-faq">
		<div class="l-container">
			<div class="p-flow-faq__inner">
				<h2 class="c-heading-sub"><span class="c-marker">
						<svg aria-hidden="true">
							<use href="#ico_marker"></use>
						</svg></span><span>Frequently Asked Questions</span></h2>
				<div class="p-flow-faq__list c-accordion">
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-1"><span class="c-accordion__q">What are the benefits of doing business with DOWA?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-1">
							<p class="c-accordion__answer">DOWA accurately determines the precious metal content of spent catalysts through precise sampling and reliable analysis. By valuing each material based on its characteristics and assay results, DOWA provides transparent transactions supported by a clear basis for valuation.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-2"><span class="c-accordion__q">What are TC and RC?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-2">
							<p class="c-accordion__answer">TC stands for Treatment Charge, which is the cost of processing and smelting the material. RC stands for Refining Charge, which is the cost of refining the recovered metals. The purchase price is calculated by deducting these charges and other applicable adjustments from the value of the contained precious metals.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-3"><span class="c-accordion__q">What is the payable recovery rate?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-3">
							<p class="c-accordion__answer">The payable rate is the contractual percentage of the precious metal content in the material that is eligible for payment. The actual payment amount depends not only on the payable rate, but also on the accurate determination of the precious metal content. Please contact us for details regarding the payable rate and other transaction terms.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-4"><span class="c-accordion__q">Can precious metal content vary among catalysts with the same code?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-4">
							<p class="c-accordion__answer">Yes. Even catalysts with the same code or of the same apparent type can vary in precious metal content. The amounts of platinum, palladium, and rhodium in automotive catalysts differ depending on factors such as vehicle model, model year, operating conditions, and degree of deterioration. To assess the underlying value of each customer’s material, DOWA processes the entire purchased lot through the sampling line and performs the valuation based on the assay results.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-5"><span class="c-accordion__q">What are the payment terms?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-5">
							<p class="c-accordion__answer">Payment is made in accordance with the terms agreed with the customer based on sampling, analysis, and valuation. The payment schedule and detailed conditions are explained individually when the business relationship is established.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-6"><span class="c-accordion__q">Who does DOWA purchase spent catalysts from?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-6">
							<p class="c-accordion__answer">DOWA primarily purchases spent catalysts from business customers, including manufacturers, automotive dismantlers, and nonferrous metal recyclers. In line with LPPM responsible sourcing principles, DOWA conducts due diligence on all prospective business partners, including reviews of company information and material origin, before entering into a transaction.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-7"><span class="c-accordion__q">Does DOWA purchase individual spent catalysts?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-7">
							<p class="c-accordion__answer">As a general rule, DOWA does not purchase catalysts individually. Materials are accepted in lots, sampled and analyzed, and then valued based on the assay results.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-8"><span class="c-accordion__q">How is the payment amount calculated?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-8">
							<p class="c-accordion__answer">The payment amount is calculated based on the quantities of platinum, palladium, and rhodium contained in the material, together with the applicable metal prices, payable recovery rates, TC/RC, and other contractual terms.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-9"><span class="c-accordion__q">What licenses and documents are required to sell materials to DOWA?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-9">
							<p class="c-accordion__answer">Required documentation varies depending on the country or region, material type, and transaction structure. In general, customers are asked to provide official documents confirming company information, business activities, and applicable licenses or permits, together with a declaration that the materials are not stolen. DOWA does not accept materials that fail to meet applicable legal and responsible sourcing requirements.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-10"><span class="c-accordion__q">What lot size is appropriate?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-10">
							<p class="c-accordion__answer">The appropriate lot size depends on the material type, quantity, packaging, and sampling method. DOWA handles a range of lot sizes and proposes a suitable transaction approach based on the details of each material. Please contact us to discuss your requirements.</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-11"><span class="c-accordion__q">Do you offer material collection services?</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-11">
							<p class="c-accordion__answer">Depending on the material’s location, quantity, and packaging, transportation or collection arrangements may be available. DOWA will propose a suitable delivery method based on these factors. Please contact us to discuss the options available.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	
<?php get_template_part('en/footer'); ?>
