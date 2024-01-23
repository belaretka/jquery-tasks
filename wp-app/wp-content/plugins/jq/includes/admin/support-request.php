<?php

function add_support_requests_page() {
	add_menu_page( __('Support requests', 'galaretka'),
		'Support Requests',
		'manage_options',
		'support-requests',
	'galaretka_support_requests_page');
}

function galaretka_support_requests_page() {
    global $wpdb;
    $table = "{$wpdb->prefix}support_requests";
    $requests = $wpdb->get_results("SELECT * FROM {$table}");
	?>
    <h1><?php esc_html_e( 'Support Requests', 'galaretka' ) ?></h1>
	<table class="w75 widefat fixed">
		<thead>
			<tr>
				<td><?php esc_html_e('ID', 'galaretka');?></td>
				<td><?php esc_html_e('Email', 'galaretka');?></td>
			</tr>
		</thead>
        <?php foreach ( $requests as $request ) {
            ?>
            <tr>
                <td><?php echo $request->ID?></td>
                <td><?php echo $request->email?></td>
            </tr>
            <?php
        }?>
	</table>
	<?php
}