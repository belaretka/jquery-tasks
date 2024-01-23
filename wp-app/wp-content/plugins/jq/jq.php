<?php
/*
Plugin Name: JQ Plugin
Text Domain: jq
*/

define( 'JQ_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'JQ_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

$allFiles = array_merge(glob(JQ_PLUGIN_DIR . 'includes/*.php'), glob(JQ_PLUGIN_DIR . 'includes/**/*.php'));

foreach ($allFiles as $file) {
	include_once($file);
}
register_activation_hook(__FILE__, 'jq_activate_plugin');

add_action( 'wp_enqueue_scripts', 'jq_scripts' );
add_action( 'admin_enqueue_scripts', 'jq_style_script');

add_action( 'admin_menu', 'add_support_requests_page' );

add_action( 'wp_ajax_jq_add_support_request', 'jq_add_support_request' );
add_action( 'wp_ajax_nopriv_jq_add_support_request', 'jq_add_support_request' );

//add_action( 'widgets_init', 'jq_weather' );
