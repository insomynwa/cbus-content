<?php
/*
Plugin Name: CBUS Plugin
*/
// source: https://code.tutsplus.com/articles/object-oriented-programming-in-wordpress-building-the-plugin-i--cms-21083

if (! defined( 'WPINC' )) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-cbus-content-manager.php';

function run_cbus_content_manager() {
	$ccm = new CBUS_Content_Manager();
	$ccm->run();
}

run_cbus_content_manager();