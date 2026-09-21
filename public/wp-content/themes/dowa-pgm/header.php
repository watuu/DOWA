<?php
/*
 * ヘッダー（日本語）
 *
 * 静的コーディング src/pug/_default.pug の head 〜 <main> 開きまで。
 * 英語版は header-en.php。文言はどちらも直接書いてある（共通の文言テーブルは持たない）。
 * 各テンプレートは theme_set_page(['lang' => 'ja', ...]) を呼んでから get_header()。
 */
$langUrls = theme_lang_urls();

$bodyClass = theme_page('class', '');
// トップは MV（写真）の上から始まるので、JS が動く前から白抜きのロゴにしておく
// （is-header-dark は common.js の isSectionDark() が付け外しする）。
// 英語トップは is_front_page() が false なので、テンプレートが宣言したクラスで見る
if (theme_page('class') === 'page-front') {
    $bodyClass .= ' is-header-dark';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php // JS が動くかどうかを、最初の描画より前に html へ記録する（_l-body.scss / _u-anim.scss が見ている） ?>
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
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<img class="l-header-logo__light" src="<?php echo esc_url(theme_asset('img/logo-wh.svg')); ?>" width="355" height="59" alt="DOWAメタルマイン株式会社 レアメタル事業部 自動車触媒リサイクル">
				<img class="l-header-logo__dark" src="<?php echo esc_url(theme_asset('img/logo.svg')); ?>" width="355" height="59" alt="DOWAメタルマイン株式会社 レアメタル事業部 自動車触媒リサイクル">
			</a>
		</p>
		<div class="l-header-utility">
			<div class="l-header-utility__group">
				<nav class="l-header-nav">
					<ul class="l-header-nav__list">
						<li><a href="<?php echo esc_url(home_url('/material/')); ?>">買取原料</a></li>
						<li><a href="<?php echo esc_url(home_url('/flow/')); ?>">お取引の流れ</a></li>
						<li><a href="<?php echo esc_url(home_url('/supply-chain/')); ?>">責任ある調達</a></li>
						<li><a href="<?php echo esc_url(home_url('/location/')); ?>">拠点一覧</a></li>
						<li><a href="<?php echo esc_url(home_url('/technology/')); ?>"><span class="l-header-nav__en">NPGM</span>の技術</a></li>
					</ul>
				</nav>
				<a class="l-header-cta c-btn c-btn--sm" href="<?php echo esc_url(home_url('/contact/')); ?>"><span class="c-btn__label">お問い合わせ</span></a>
			</div>
			<?php // 上が JP、下が EN の並びは変えず、今いる言語を __current（薄い色）にする ?>
			<div class="l-header-lang">
				<span class="l-header-lang__current">JP</span>
				<span class="l-header-lang__line"></span>
				<a class="l-header-lang__other" href="<?php echo esc_url($langUrls['en']); ?>">EN</a>
			</div>
			<button class="l-header-menu c-btn-menu" aria-label="メニューを開く"><span></span><span></span><span></span></button>
		</div>
		<div class="l-header-drawer">
			<div class="l-header-drawer__wrap">
				<nav class="l-header-drawer-nav" aria-label="メニュー">
					<ul>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>トップ</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/material/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>買取原料</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/flow/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>お取引の流れ</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/supply-chain/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>責任ある調達</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/location/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>拠点一覧</span></a></li>
						<li class="l-header-drawer-nav__item l-header-drawer__item"><a href="<?php echo esc_url(home_url('/technology/')); ?>"><span class="c-marker"><?php echo theme_icon('marker'); ?></span><span>NPGMの技術</span></a></li>
					</ul>
				</nav>
				<a class="l-header-drawer-cta l-header-drawer__item" href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
				<div class="l-header-drawer-lang l-header-drawer__item">
					<span class="l-header-drawer-lang__current">JP</span>
					<span class="l-header-drawer-lang__line"></span>
					<a class="l-header-drawer-lang__other" href="<?php echo esc_url($langUrls['en']); ?>">EN</a>
				</div>
				<div class="l-header-drawer-policy l-header-drawer__item">
					<a class="l-header-drawer-policy__item l-header-drawer-policy__item--cookie" href="<?php echo esc_url(home_url('/cookie-policy/')); ?>"><?php echo theme_icon('cookie'); ?><span>クッキーポリシー</span></a>
					<a class="l-header-drawer-policy__item l-header-drawer-policy__item--privacy" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php echo theme_icon('privacy'); ?><span>プライバシーポリシー</span></a>
				</div>
			</div>
		</div>
	</header>

	<main class="l-main" id="main">
