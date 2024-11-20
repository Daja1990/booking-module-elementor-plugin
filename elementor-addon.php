<?php
/**
 * Plugin Name: Booking Module
 * Description: Custom Elementor booking moule.
 * Version:     1.0.2
 * Author:      Dannie Anderson
 * Author URI:  https://byanderson.dk/
 * Text Domain: byanderson-booking-plugin
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.24.0
 * Elementor Pro tested up to: 3.24.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly. !
}

function elementor_test_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );
	require_once( __DIR__ . '/GHPluginUpdater.php');

    if ( is_admin() ) {
        // Define constants for GitHub Plugin Updater
        define( 'GH_REQUEST_URI', 'https://api.github.com/repos/%s/%s/releases' );
        define( 'GHPU_USERNAME', 'Daja1990' );
        define( 'GHPU_REPOSITORY', 'booking-module-elementor-plugin' );

		// Define the URL for the zipball of your release
		define( 'GHPU_ZIPBALL_URL', 'https://github.com/Daja1990/booking-module-elementor-plugin/archive/refs/tags/v1.0.1.zip' );

		// Initialize GitHub Plugin Updater
        $updater = new GhPluginUpdater( __FILE__ );
        $updater->init();
    }

	// Run the plugin
	\Elementor_Test_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'elementor_test_addon' );
