<?php

// -------------------------------------------------------
//    フォーム（Contact Form 7）
//
//    フォーム本体は CF7 側（管理画面 > お問い合わせ）に持たせ、
//    テンプレートからはスラッグで呼ぶ。
//      contact-ja / contact-en / document-ja / document-en
//
//    マークアップは静的コーディング（src/pug/contact/index.pug ほか）と同じものを
//    CF7 のフォーム欄にそのまま入れ、入力欄だけ CF7 のタグに置き換えてある。
//
//    **確認画面は無し**（2026-09-21 ユーザー判断）。入力 → 送信 → 完了画面（別URL）。
//    そのためボタンの文言は静的コーディングの「内容を確認する」ではなく「送信する」にしている。
//    確認画面を入れることになったら、文言とフローを戻すこと。
// -------------------------------------------------------

/**
 * CF7 のフォームを出す
 *
 * @param string $slug      CF7 のスラッグ（contact-ja など）
 * @param string $class     form 要素に付けるクラス（静的コーディングの form のクラス）
 * @param string $thanksUrl 送信後に飛ばす完了画面
 */
function theme_cf7($slug, $class, $thanksUrl) {
    $form = get_page_by_path($slug, OBJECT, 'wpcf7_contact_form');

    if (! $form) {
        // 編集者にだけ気づかせる（訪問者には何も出さない）
        if (current_user_can('manage_options')) {
            printf(
                '<p>フォーム「%s」が見つかりません。管理画面 &gt; お問い合わせ で作成してください。</p>',
                esc_html($slug)
            );
        }
        return;
    }

    echo do_shortcode(sprintf(
        '[contact-form-7 id="%d" html_class="%s"]',
        $form->ID,
        esc_attr($class)
    ));

    theme_cf7_redirect($form->ID, $thanksUrl);
}

/**
 * 送信が終わったら完了画面へ飛ばす
 *
 * CF7 は Ajax で送るのでページが変わらない。かつて使えた on_sent_ok は
 * CF7 5.x で廃止されたので、DOM イベント（wpcf7mailsent）で飛ばす。
 * ページに複数のフォームが載ったときのために、フォームIDで絞っている。
 */
function theme_cf7_redirect($formId, $url) {
    printf(
        '<script>document.addEventListener("wpcf7mailsent",function(e){if(Number(e.detail.contactFormId)===%d){location.assign(%s);}},false);</script>',
        (int) $formId,
        wp_json_encode($url)
    );
}

/**
 * CF7 に <p> / <br> を入れさせない
 *
 * 静的コーディングのマークアップをそのまま使うので、自動整形されると崩れる。
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * フォーム内のプレースホルダを差し替える
 *
 * 個人情報保護方針へのリンクは言語と環境で変わるので、CF7 のフォーム欄には
 * %PRIVACY_URL% と書いておき、出力時に実際のURLへ置き換える。
 * （フォーム欄に絶対URLを直書きすると、ドメインを変えたときに追従できない）
 */
add_filter('wpcf7_form_elements', function ($html) {
    $privacy = theme_is_en()
        ? home_url('/en/privacy-policy/')
        : home_url('/privacy-policy/');

    return strtr($html, ['%PRIVACY_URL%' => esc_url($privacy)]);
});
