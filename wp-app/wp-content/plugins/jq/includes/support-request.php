<?php

function jq_add_support_request() {

//	if ( ! wp_verify_nonce( $_POST['jq_nonce'], 'jq_add_support_request' ) ) {
//		wp_send_json_error( null, 403 );
//	}

	check_ajax_referer('jq_add_support_request', 'jq_nonce');

	global $wpdb;
	$table = "{$wpdb->prefix}support_requests";

	if ( empty( $_POST['email'] ) ) {
		wp_send_json_error( null, 400 );
	}

	$email = sanitize_email( $_POST['email'] );

	if ( is_email( $email ) ) {
		$emails = $wpdb->get_col( "SELECT email from {$table}" );

		if ( ! in_array( $email, $emails ) ) {
			$wpdb->insert( $table, array( 'email' => $email ), array( '%s' ) );
			wp_send_json( array( 'status' => 'added', 'id' => 1 ) );
		} else {
			wp_send_json( array( 'status' => 'existed', 'id' => 1 ) );
		}
	} else {
		wp_send_json( array( 'status' => 'not email', 'id' => 1 ) );
	}
}
