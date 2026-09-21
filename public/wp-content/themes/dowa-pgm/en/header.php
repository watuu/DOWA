<?php
/*
 * ヘッダー（英語）  get_template_part('en/header')
 *
 * 静的コーディング src/pug/_default.pug の head 〜 <main> 開きまで（lang = "en"）。
 * 日本語版はテーマ直下の header.php。英訳は「英訳確認シート」の共通タブ。
 * 各テンプレートは theme_set_page(['lang' => 'en', ...]) を呼んでから読み込む。
 *
 * ※ 英語のテンプレートは en/ にまとめているので get_header('en') は使えない
 *    （get_header は直下の header-en.php しか見ない）。代わりに get_template_part で読み、
 *    プラグインが拾えるよう get_header アクションだけ自分で撃っておく。
 *
 * ロゴ画像の英語版は申請中（2026-09-16）。届くまで日本語のロゴを使う。
 * 英語のクッキーポリシーも後日なので、日本語のページへ飛ばす。
 */
do_action('get_header', 'en', []);

$langUrls = theme_lang_urls();
$bodyClass = theme_page('class', '');
// 英語トップは is_front_page() が false なので、テンプレートが宣言したクラスで見る
if (theme_page('class') === 'page-front') {
    $bodyClass .= ' is-header-dark';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<script>document.documentElement.classList.add('is-js')</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<?php if (theme_page('noindex')) : ?>
	<meta name="robots" content="noindex, follow">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(trim($bodyClass)); ?>>
<a id="top"></a>
<div class="l-body-wrap">

	<header class="l-header">
		<p class="l-header-logo">
			<a href="<?php echo esc_url(home_url('/en/')); ?>">
				<img class="l-header-logo__light" src="<?php echo esc_url(theme_asset('img/logo-wh.svg')); ?>" width="355" height="59" alt="DOWA Metals &amp; Mining Co., Ltd. Rare Metal Business Unit, Spent Catalyst Purchasing &amp; PGM Recycling">
				<img class="l-header-logo__dark" src="<?php echo esc_url(theme_asset('img/logo.svg')); ?>" width="355" height="59" alt="DOWA Metals &amp; Mining Co., Ltd. Rare Metal Business Unit, Spent Catalyst Purchasing &amp; PGM Recycling">
			</a>
		</p>
		<div class="l-header-utility">
			<div class="l-header-utility__group">
				<nav class="l-header-nav">
					<ul class="l-header-nav__list">
						<li><a href="<?php echo esc_url(home_url('/en/material/')); ?>">Materials We Purchase</a></li>
						<li><a href="<?php echo esc_url(home_url('/en/flow/')); ?>">How It Works</a></li>
						<li><a href="<?php echo esc_url(home_url('/en/supply-chain/')); ?>">Responsible Sourcing</a></li>
						<li><a href="<?php echo esc_url(home_url('/en/location/')); ?>">Locations</a></li>
						<li><a href="<?php echo esc_url(home_url('/en/technology/')); ?>">NPGM Expertise</a></li>
					</ul>
				</nav>
				<a class="l-header-cta c-btn c-btn--sm" href="<?php echo esc_url(home_url('/en/contact/')); ?>"><span class="c-btn__label">Contact</span></a>
			</div>
			<?php // 上が JP、下が EN の並びは変えず、今いる言語を __current（薄い色）にする ?>
			<div class="l-header-lang">
				<a class="l-header-lang__other" href="<?php echo esc_url($langUrls['ja']); ?>">JP</a>
				<span class="l-header-lang__line"></span>
				<span class="l-header-lang__current">EN</span>
			</div>
			<button class="l-header-menu c-btn-menu" aria-label="Open menu"><span></span><span></span><span></span></button>
		</div>
		<div class="l-header-drawer">
			<div class="l-header-drawer__wrap">
				<nav class="l-header-drawer-nav" aria-label="Menu">
					<ul>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/en/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>Home</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/en/material/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>Materials We Purchase</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/en/flow/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>How It Works</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/en/supply-chain/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>Responsible Sourcing</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/en/location/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>Locations</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/en/technology/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>NPGM Expertise</span></a></li>
					</ul>
				</nav>
				<a class="l-header-drawer-cta l-header-drawer__item" href="<?php echo esc_url(home_url('/en/contact/')); ?>">Contact</a>
				<div class="l-header-drawer-lang l-header-drawer__item">
					<a class="l-header-drawer-lang__other" href="<?php echo esc_url($langUrls['ja']); ?>">JP</a>
					<span class="l-header-drawer-lang__line"></span>
					<span class="l-header-drawer-lang__current">EN</span>
				</div>
				<div class="l-header-drawer-policy l-header-drawer__item">
					<a class="l-header-drawer-policy__item l-header-drawer-policy__item--cookie" href="<?php echo esc_url(home_url('/cookie-policy/')); ?>"><?php echo theme_icon('cookie'); ?><span>Cookie Policy</span></a>
					<a class="l-header-drawer-policy__item l-header-drawer-policy__item--privacy" href="<?php echo esc_url(home_url('/en/privacy-policy/')); ?>"><?php echo theme_icon('privacy'); ?><span>Privacy Policy</span></a>
				</div>
			</div>
		</div>
	</header>

	<main class="l-main" id="main">
