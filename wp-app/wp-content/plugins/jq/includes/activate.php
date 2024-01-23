<?php

function jq_activate_plugin() {
	global $wpdb;
	$tableName = "{$wpdb->prefix}support_requests";
	$charsetCollate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$tableName} (
        ID bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
        email varchar(100) NOT NULL
    ) ENGINE='InnoDB' {$charsetCollate}";

	require_once(ABSPATH . "/wp-admin/includes/upgrade.php");
	dbDelta($sql);
}