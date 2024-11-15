<?php
/**
 * Plugin Name: Booking Module
 * Description: Custom Elementor booking moule.
 * Version:     1.0.0
 * Author:      Dannie Anderson
 * Author URI:  https://byanderson.dk/
 * Text Domain: byanderson-booking-plugin
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.24.0
 * Elementor Pro tested up to: 3.24.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function elementor_test_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Elementor_Test_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'elementor_test_addon' );