<?php
namespace Elementor_Test_Addon;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */
final class Plugin {

    /**
     * Instance
     *
     * @since 1.0.0
     * @access private
     * @static
     * @var \Elementor_Test_Addon\Plugin The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @access public
     * @static
     * @return \Elementor_Test_Addon\Plugin An instance of the class.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * Constructor
     *
     * Perform some compatibility checks to make sure basic requirements are met.
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {

        if ( $this->is_compatible() ) {
            add_action( 'elementor/init', [ $this, 'init' ] );
        }

    }

    /**
     * Compatibility Checks
     *
     * Checks whether the site meets the addon requirements.
     *
     * @since 1.0.0
     * @access public
     */
    public function is_compatible() {

        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return false;
        }

        return true;

    }

    /**
     * Initialize
     *
     * Load the addons functionality only after Elementor is initialized.
     *
     * Fired by `elementor/init` action hook.
     *
     * @since 1.0.0
     * @access public
     */
    public function init() {

        add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
        add_action( 'elementor/controls/register', [ $this, 'register_controls' ] );
        add_action( 'elementor/frontend/before_register_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

    }

    public function enqueue_styles() {
        // Ensure CSS is loaded only on pages with Elementor
        if ( did_action( 'elementor/loaded' ) ) {
            // Correct the relative path to the CSS file (assuming 'assets' is in the root of the plugin)
            wp_enqueue_style( 'elementor-addon-styles', plugin_dir_url( __FILE__ ) . '../assets/css/style.css' );
        }
    }

    /**
     * Enqueue Scripts
     *
     * Use the 'elementor/frontend/before_register_scripts' hook to load scripts before Elementor registers its scripts.
     */
    public function enqueue_scripts() {

        // Register the custom JS file with the correct path
        wp_register_script( 'my-elementor-addon-script', plugin_dir_url( __FILE__ ) . '../assets/js/app.js', [], '1.0', true );

        // Enqueue the custom JS file
        wp_enqueue_script( 'my-elementor-addon-script' );
    }
    


    /**
     * Register Widgets
     *
     * Load widgets files and register new Elementor widgets.
     *
     * Fired by `elementor/widgets/register` action hook.
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register_widgets( $widgets_manager ) {

        require_once plugin_dir_path( __FILE__ ) . 'widgets/booking-menu.php';

        $widgets_manager->register( new \Elementor_Test_Addon\Elementor_Hello_World_Widget_1() );

    }

    /**
     * Register Controls
     *
     * Load controls files and register new Elementor controls.
     *
     * Fired by `elementor/controls/register` action hook.
     *
     * @param \Elementor\Controls_Manager $controls_manager Elementor controls manager.
     */
    public function register_controls( $controls_manager ) {
        // Add controls here
    }

}
