<?php
/*
 * お取引の流れ（日本語）  /flow/
 * 静的コーディング src/pug/flow/index.pug。英語版は en/page-flow.php。
 * よくあるご質問の文言は doc/Rare_Metal_Business_Unit_FAQ_JP_EN 1.docx。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-flow',
    'title'      => 'お取引の流れ',
    'breadcrumb' => 'お取引の流れ',
]);

get_header();
?>
<div class="p-flow">
	<div class="cm-block-header-page cm-block-header-page--lead">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('お取引の流れ'); ?>
				</h1>
				<p class="c-heading-page__label">Flow</p>
			</div>
		</div>
	</div>
	<section class="p-flow-body">
		<div class="l-container">
			<p class="p-flow-lead">初めてのお取引でも安心してご利用いただけるよう、原料納入から分析、評価、最終決済までの流れをご紹介します。<br/>お客様の原料やご要望に応じて、最適な取引方法をご提案いたしますので、まずはお気軽にご相談ください。</p>
			<ol class="p-flow-steps">
				<li class="c-card-step">
					<p class="c-card-step__num">1</p>
					<div class="c-card-step__main">
						<figure class="c-card-step__figure"><img src="<?php echo esc_url(theme_asset('img/p-flow-pic1.webp')); ?>" alt="" width="840" height="560" loading="eager"/></figure>
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">お問い合わせ・ご相談</h2>
							<p class="c-card-step__desc">使用済み触媒の種類や数量などをお知らせください。<br class="u-only-pc">お客様の条件に応じて、最適な取引方法をご提案いたします。</p>
							<div class="c-card-step__action"><a class="c-btn" href="<?php echo esc_url(home_url('/contact/')); ?>"><span class="c-btn__label">お問い合わせ</span><span class="c-btn__arrow">
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
							<h2 class="c-card-step__title">原料の出所調査 /<br>デューディリジェンス</h2>
							<p class="c-card-step__desc">責任ある調達ポリシーに則って、お客様や原料の出所に関するリスクを事前に確認します。</p>
							<div class="c-card-step__action"><a class="c-link-arrow" href="<?php echo esc_url(home_url('/supply-chain/')); ?>"><span class="c-link-arrow__label">責任ある調達について</span><span class="c-btn-arrow c-link-arrow__arrow">
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
							<h2 class="c-card-step__title">受入・破砕・サンプリング</h2>
							<p class="c-card-step__desc">お預かりした原料は、均一に粉砕・縮分を行った後、代表性の高いサンプルを採取します。正確な評価を行うために、このサンプリング工程が重要な役割を担います。</p>
							<div class="c-card-step__action"><a class="c-link-arrow" href="<?php echo esc_url(home_url('/technology/')); ?>"><span class="c-link-arrow__label">サンプリングについて</span><span class="c-btn-arrow c-link-arrow__arrow">
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
							<h2 class="c-card-step__title">受入数量確定</h2>
							<p class="c-card-step__desc">水分込みの重量および、水分を除いた乾燥重量が確定します。</p>
						</div>
					</div>
				</li>
				<li class="c-card-step">
					<p class="c-card-step__num">5</p>
					<div class="c-card-step__main">
						<figure class="c-card-step__figure"><img src="<?php echo esc_url(theme_asset('img/p-flow-pic5.webp')); ?>" alt="" width="840" height="560" loading="lazy"/></figure>
						<div class="c-card-step__body">
							<h2 class="c-card-step__title">分析値判明/原料代金の精算</h2>
							<p class="c-card-step__desc">採取したサンプルを、政府認定の総合分析機関「DOWAテクノリサーチ」が分析。PGM含有量を正確に評価し、その分析値をもとに原料代を精算し、お客様から受け取った原料中の貴金属を買い取ります。</p>
							<div class="c-card-step__action"><a class="c-link-arrow" href="<?php echo esc_url(home_url('/technology/')); ?>"><span class="c-link-arrow__label">分析について</span><span class="c-btn-arrow c-link-arrow__arrow">
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
							<h2 class="c-card-step__title">製錬/精製プロセスへ</h2>
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
						</svg></span><span>よくあるご質問</span></h2>
				<div class="p-flow-faq__list c-accordion">
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-1"><span class="c-accordion__q">DOWAとの取引を行うことのメリットは？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-1">
							<p class="c-accordion__answer">DOWAでは、高いサンプリング技術と信頼性の高い分析により、使用済み触媒に含まれる貴金属を正確に評価します。原料本来の価値を適切に評価することで、お客様に納得感のある取引を提供します。また、長年培ってきたPGMリサイクル製錬技術を活かした効率的な操業により、競争力のある取引条件をご提案致します。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-2"><span class="c-accordion__q">TC/RCとは何ですか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-2">
							<p class="c-accordion__answer">TCはTreatment Chargeの略で、原料を処理するための製錬費を指します。<br>RCはRefining Chargeの略で、回収した金属を精製するための精製費を指します。<br>買取価格を算定する際には、含有する貴金属の価値から、これらの費用やその他の条件を差し引いて計算します。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-3"><span class="c-accordion__q">回収率とは何ですか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-3">
							<p class="c-accordion__answer">回収率とは、原料に含まれる貴金属量のうち、何％がお支払い対象となるかを示す契約条件の割合です。回収率が高いほど売却時にお支払い対象となる割合は大きくなりますが、実際の支払額は、原料に含まれる貴金属量が正確に評価されているかによっても大きく変わります。原料の種類や品位、取引条件によって回収率は異なりますので、まずはお問合せ下さい。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-4"><span class="c-accordion__q">買取時の指標価格は何ですか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-4">
							<p class="c-accordion__answer">適用する価格指標や値決め方法は、お取引条件や契約内容によって異なりますので、詳細は個別にご案内いたします。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-5"><span class="c-accordion__q">同じコードの触媒でも、貴金属含有量は変わりますか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-5">
							<p class="c-accordion__answer">はい、同じコードや同じ種類に見える触媒でも、1つ1つの貴金属含有量にはばらつきがあります。自動車触媒は、車種、年式、使用状況、劣化状態などにより、含まれるプラチナ、パラジウム、ロジウムの量が異なるためです。DOWAでは、お客様の原料本来の価値を適切に評価するため、買い取る原料の全量をサンプリングラインに通し、分析結果に基づいて評価を行っています。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-6"><span class="c-accordion__q">値決めのタイミングはいつですか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-6">
							<p class="c-accordion__answer">一般的には、分析によって確定した貴金属量に対して、合意した価格指標や値決め方法に基づき価格を決定します。詳細は個別にご案内いたしますので、お気軽にお問い合わせください。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-7"><span class="c-accordion__q">支払いタームはどのようになりますか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-7">
							<p class="c-accordion__answer">原料の受入、サンプリング、分析、評価をもとに、お客様と合意した条件に基づきお支払いを実施します。詳細な支払い時期や条件は、お取引開始時に個別にご案内いたします。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-8"><span class="c-accordion__q">使用済み触媒はどなたから買い取っていますか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-8">
							<p class="c-accordion__answer">DOWAでは、主に事業者のお客様から使用済み触媒を受け入れています。<br>取引先には、製造メーカー、自動車解体業者、非鉄金属リサイクル業者などが含まれます。安心してお取引いただくため、LPPMの責任ある調達に関する考え方に基づき、全てのお取引先に対して会社情報や原料の出所等についてデューデリジェンスを実施しています。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-9"><span class="c-accordion__q">使用済み触媒は1個単位で買い取っていますか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-9">
							<p class="c-accordion__answer">原則として、1個単位の個別買取ではなく、ロット単位で受け入れた原料をサンプリング・分析し、その結果に基づいて評価します。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-10"><span class="c-accordion__q">支払額はいくらになりますか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-10">
							<p class="c-accordion__answer">支払額は、原料に含まれるプラチナ、パラジウム、ロジウムなどの貴金属量、適用されるメタル価格、回収率、TC/RC、その他の契約条件に基づいて算定します。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-11"><span class="c-accordion__q">DOWAに販売するには、どのようなライセンスや書類が必要ですか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-11">
							<p class="c-accordion__answer">必要な書類は、国・地域、原料の種類、取引形態によって異なります。<br>一般的には、会社情報、事業内容、許認可を確認できる公的な書類、盗難品ではないことの宣誓書などをご提出いただきます。法令や責任ある調達の基準に適合しない原料については、受入をお断りしています。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-12"><span class="c-accordion__q">ロットサイズはどれくらいにするべきですか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-12">
							<p class="c-accordion__answer">適切なロットサイズは、原料の種類、数量、荷姿、サンプリング方法によって異なります。<br>小ロットから大口ロットまで、内容に応じて最適な取引方法をご提案しますので、まずはお問い合わせください。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-13"><span class="c-accordion__q">引き取りサービスはありますか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-13">
							<p class="c-accordion__answer">原料の所在地、数量、荷姿、取引条件によっては、輸送や引き取り方法についてご相談いただけます。お客様の状況に応じて、最適な納入方法をご提案しますので、まずはお問い合わせください。</p>
						</div>
					</div>
					<div class="c-accordion__item">
						<button class="c-accordion__head js-accordion" type="button" aria-expanded="false" aria-controls="faq-14"><span class="c-accordion__q">電子スクラップの買取は行っていますか？</span><span class="c-accordion__icon">
								<svg aria-hidden="true">
									<use href="#ico_tri_d"></use>
								</svg></span></button>
						<div class="c-accordion__body" id="faq-14">
							<p class="c-accordion__answer">電子スクラップについては、DOWAグループ内で取り扱い可能な場合があります。<br>NPGMは主に使用済み自動車触媒などのPGM含有原料を対象としていますが、電子基板などの原料については、内容に応じてグループ会社での対応をご案内できる場合があります。まずは原料の種類や数量をご相談ください。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	
<?php get_footer(); ?>
