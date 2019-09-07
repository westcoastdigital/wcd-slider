<?php
/*
Plugin Name: WCD Hero Slider
Plugin URI: https://github.com/WestCoastDigital/wcd-slider
Description: Add a simple slider to your site using the following shortcode [slider fade="true" infinite="true" speed="300" nav="dots" autoplay="false"] (this example shows the defaults, and if using defaults you do not need to use the attribute). Options for nav are dots, arrows or numbers. Speed is in m/s and the others are either true or false.
Version: 0.7.0
Author: West Coast Digital
Author URI: https://westcoastdigital.com.au
Text Domain: wcd
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !function_exists( 'gp_premium_active') ) {
function gp_premium_active()
	{
		if (defined('GP_PREMIUM_VERSION') && post_type_exists( 'gp_elements' )) {
			return true;
		}
	}
}



if ( !gp_premium_active() ) {

	define( 'PLUGIN_ROOT_DIR', plugin_dir_path( __FILE__ ) );

	$wcd_includes = array(
		'cpt.php',
		'shortcode.php',
		'enqueue.php',
		'plugin-update-checker/plugin-update-checker.php',
	);

	foreach ( $wcd_includes as $file ) {
		$filepath = PLUGIN_ROOT_DIR . 'inc/' . $file;
		if ( ! $filepath ) {
			trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
		}
		include( $filepath );
	}

	$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		PLUGIN_ROOT_DIR . 'plugin.json',
		__FILE__,
		'wcd-slider'
	);
	$myUpdateChecker->setAuthentication('67e20c176d8404a9701b6eee5995ce098192c1e4');

}