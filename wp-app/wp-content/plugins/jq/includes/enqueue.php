<?php

function jq_scripts() {

	wp_register_script( 'jq-sidebar',
		JQ_PLUGIN_URL . 'includes/js/script.js',
		null,
		null );

	wp_register_script( 'jq-banner',
		JQ_PLUGIN_URL . 'includes/js/banner.js', null, null );

	wp_register_script( 'jq-table-of-contents',
		JQ_PLUGIN_URL . 'includes/js/tableOfContents.js', null, null );

	wp_register_script( 'jq-popup',
		JQ_PLUGIN_URL . 'includes/js/popup.js', null, null );

	wp_register_style( 'jq-style',
		JQ_PLUGIN_URL . 'includes/js/style.css',
		null,
		null );

	wp_enqueue_style( 'jq-style' );
	wp_enqueue_script( 'jq-jquery',
		'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js' );
	wp_enqueue_script( 'jq-sidebar' );
	wp_enqueue_script( 'jq-banner' );
	wp_enqueue_script( 'jq-table-of-contents' );
	wp_enqueue_script( 'jq-popup' );


	wp_localize_script( 'jq-banner',
		'data',
		array(
			'site_title'          => get_bloginfo( 'name' ),
			'stylesheet_name'     => get_stylesheet(),
			'pre_site_title'      => __( 'Название сайта', 'galaretka' ),
			'pre_stylesheet_name' => __( 'Название темы', 'galaretka' ),
		)
	);
	wp_localize_script( 'jq-popup',
		'popup_obj',
		array(
			'ajax_url'    => admin_url( 'admin-ajax.php' ),
			'jq_nonce'    => wp_create_nonce( 'jq_add_support_request' ),
			'common_text' => __( 'Если вам нужна помощь, оставьте свою почту и мы с вами свяжемся', 'galaretka' ),
			'added_msg'   => __( 'Спасибо! Ваша заявка передана на рассмотрение!', 'galaretka' ),
			'existed_msg' => __( 'Ваша заявка уже рассматривается! С вами свяжутся!', 'galaretka' ),
			'warning_msg' => __('Неправильно введена почта. Попробуйте еще раз!', 'galaretka'),
			'btn_text'    => __( 'Отправить', 'galaretka' )

		)
	);
}

function jq_style_script() {
	wp_register_style( 'jq-admin-style',
		JQ_PLUGIN_URL . 'includes/admin/style.css',
		null,
		null );
	wp_enqueue_style( 'jq-admin-style' );
}
