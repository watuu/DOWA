<?php
/*
 * クッキーポリシー（日本語）  /cookie-policy/
 * 静的コーディング src/pug/cookie-policy/index.pug。
 * 英語版は後日（doc/english-pages.md）。英語ページからもこのページへ飛ばしている。
 */
theme_set_page([
    'lang'       => 'ja',
    'class'      => 'page-cookie',
    'title'      => 'クッキーポリシー',
    'breadcrumb' => 'クッキーポリシー',
]);

get_header();
?>
<div class="p-cookie">
	<div class="cm-block-header-page">
		<div class="l-container">
			<div class="c-heading-page">
				<h1 class="c-heading-page__title"><?php echo theme_split_chars('クッキーポリシー'); ?>
				</h1>
				<p class="c-heading-page__label">Cookie Policy</p>
			</div>
		</div>
	</div>
	<section class="p-cookie-body">
		<div class="l-container">
			<div class="cm-block-panel cm-block-panel--policy">
				<p class="cm-block-lead">本クッキーポリシーは、株式会社日本ピージーエム（以下当社といいます）が運営するウェブサイト（以下「本ウェブサイト」）に適用されます。<br/>本ウェブサイトでは、サービスの利便性向上や利用状況の分析などを目的として、クッキー（Cookie）を使用しています。本ウェブサイトをご利用いただくことで、本クッキーポリシーに基づくクッキーの利用に同意いただいたものとみなします。<br/>なお、ブラウザの設定によりクッキーを無効にすることも可能ですが、その場合、本ウェブサイトの一部機能をご利用いただけない場合があります。</p>
				<div class="p-cookie-body__main cm-policy">
					<div class="cm-policy__section">
						<div class="cm-policy__head">
							<h3 class="cm-policy__title">クッキーとは</h3>
							<p>Cookie（クッキー）とは、お客様がウェブサイトを閲覧した際に、お使いのデバイスへ保存される小さなデータです。当社では、ウェブサイトの利便性向上、利用状況の分析、コンテンツの改善、および広告配信の最適化を目的としてCookieを利用しています。</p>
						</div>
					</div>
					<div class="cm-policy__section">
						<div class="cm-policy__head">
							<h3 class="cm-policy__title">クッキーの使用目的について</h3>
							<p>本ウェブサイトでは、お客様により快適にご利用いただくため、Cookieを利用してサイトの利便性向上や利用状況の分析、パフォーマンスの改善を行っています。なお、Cookieにより取得される情報には、お客様個人を特定できる情報は含まれておりません。</p>
						</div>
					</div>
					<div class="cm-policy__section">
						<div class="cm-policy__head">
							<h3 class="cm-policy__title">使用されるクッキーの種類について</h3>
							<p>本ウェブサイトでは、セッションクッキー及びパーシステントクッキーと呼ばれるクッキーを利用しています。セッションクッキーは、一時的に記録されるクッキーであり、お客様が本ウェブサイトの閲覧をしている間に限り、お客様のデバイスに記録されています。一方パーシステントクッキーは、本ウェブサイトの閲覧終了後もお客様のデバイスに記録され、有効期限が切れるか、又はお客様自身でこれを削除いただくまでお客様のデバイスに残り続けます。有効期限につきましては、個々のクッキーごとに異なります。<br/>また、本ウェブサイトでは、サードパーティークッキー情報が取得されることがございます。サードパーティークッキーとは、本ウェブサイトにおいて、当社以外の第三者が当社に代わって付与するクッキーのことをいいます。サードパーティークッキーについての詳細情報、及びこのようなクッキー情報を使用するためのオプトアウト手続きにつきましては、当該サードパーティークッキー情報を使用している第三者のプライバシーポリシー等をご覧ください。</p>
							<p class="cm-policy__spaced">なお、当社は、当社ウェブサイトの利用状況を計測・分析するため、以下のツールを使用しております。</p>
						</div>
						<div class="cm-policy__block">
										<h4 class="cm-policy__subtitle"><span class="c-marker">
												<svg aria-hidden="true">
													<use href="#ico_marker"></use>
												</svg></span><span class="u-font-en">Google Analytics</span>
										</h4>
										<ul class="c-list-bullet">
											<li><span><span class="u-font-en">Google Analytics</span>利用規約(<a class="c-link-url c-link-url--inline" href="https://www.google.com/analytics/terms/jp.html" target="_blank" rel="noopener">https://www.google.com/analytics/terms/jp.html</a>)</span></li>
											<li><span><span class="u-font-en">Google</span>プライバシーポリシー(<a class="c-link-url c-link-url--inline" href="https://www.google.com/intl/ja/policies/privacy/partners/" target="_blank" rel="noopener">https://www.google.com/intl/ja/policies/privacy/partners/</a>)</span></li>
										</ul>
						</div>
					</div>
					<div class="cm-policy__section">
						<h3 class="cm-policy__title">クッキーの無効化について</h3>
						<div class="cm-policy__blocks">
							<div class="cm-policy__block">
											<h4 class="cm-policy__subtitle"><span class="c-marker">
													<svg aria-hidden="true">
														<use href="#ico_marker"></use>
													</svg></span><span>すべてのクッキーの無効化</span>
											</h4>
								<p>お客様は、ブラウザの設定を変更することにより、一切のクッキーを無効にすることができます。ただし、クッキーを無効とした場合、本ウェブサイトの一部の機能がご利用いただけない可能性があることにつきご了承ください。<br/>主要なブラウザごとの、クッキーの設定変更の方法につきましては、以下の各URLをご参照ください。</p>
											<ul class="c-list-bullet">
												<li><span><span class="u-font-en">Apple Safari</span> (<a class="c-link-url c-link-url--inline" href="https://support.apple.com/ja-jp/guide/safari/sfri11471/mac" target="_blank" rel="noopener">https://support.apple.com/ja-jp/guide/safari/sfri11471/mac</a>)</span></li>
												<li><span><span class="u-font-en">Google Chrome</span> (<a class="c-link-url c-link-url--inline" href="https://support.google.com/chrome/answer/95647?hl=ja" target="_blank" rel="noopener">https://support.google.com/chrome/answer/95647?hl=ja</a>)</span></li>
												<li><span><span class="u-font-en">Microsoft Internet Explorer</span> (<a class="c-link-url c-link-url--inline" href="https://support.microsoft.com/ja-jp/help/17442/windows-internet-explorer-delete-manage-cookies" target="_blank" rel="noopener">https://support.microsoft.com/ja-jp/help/17442/windows-internet-explorer-delete-manage-cookies</a>)</span></li>
												<li><span><span class="u-font-en">Mozilla Firefox</span> (<a class="c-link-url c-link-url--inline" href="https://support.mozilla.org/ja/kb/delete-cookies-remove-info-websites-stored" target="_blank" rel="noopener">https://support.mozilla.org/ja/kb/delete-cookies-remove-info-websites-stored</a>)</span></li>
											</ul>
							</div>
							<div class="cm-policy__block">
											<h4 class="cm-policy__subtitle"><span class="c-marker">
													<svg aria-hidden="true">
														<use href="#ico_marker"></use>
													</svg></span><span>一部のクッキーの無効化</span>
											</h4>
								<p>お客様は、特定のツールごとにクッキーを無効化することもできます。特定のツールへの情報提供を停止するための方法につきましては、以下に記載するURLに記載されておりますのでご参照ください。ただし、これらのクッキー情報を削除した場合にも、本ウェブサイトの一部の機能がご利用いただけない可能性があることにつきご了承ください。</p>
											<ul class="c-list-bullet">
												<li><span><span class="u-font-en">Google LLC</span> (<a class="c-link-url c-link-url--inline" href="https://support.google.com/analytics/answer/181881?hl=ja" target="_blank" rel="noopener">https://support.google.com/analytics/answer/181881?hl=ja</a>)</span></li>
											</ul>
							</div>
						</div>
					</div>
					<div class="cm-policy__section">
						<div class="cm-policy__head">
							<h3 class="cm-policy__title">連絡先</h3>
							<p>本クッキーポリシーに関してのお問い合わせは、下記の送信フォームよりお願いいたします。</p>
						</div><a class="c-link-arrow" href="<?php echo esc_url(home_url('/contact/')); ?>"><span class="c-link-arrow__label">お問い合わせはこちら</span><span class="c-btn-arrow c-link-arrow__arrow">
								<svg aria-hidden="true">
									<use href="#ico_arrow_r"></use>
								</svg></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	
<?php get_footer(); ?>
