<?php
/**
 * Plugin Name: Innovatex Base
 * Description: Elementor page builder addon to display posts in a grid. Useful for generating post grid from your blog posts with multiple options.
 * Plugin URI: https://abc.com/plugins/
 * Version: 1.0.0
 * Author: Sourabh Mourya
 * Author URI: https://wphait.com/
 * Text Domain: innovatex-base
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'INNOVATEX_VERSION', '1.0.0' );
define( 'INNOVATEX_SLUG', 'innovatex-elementor-addons' );
define( 'INNOVATEX_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define( 'INNOVATEX_URI', rtrim( plugin_dir_path( __FILE__ ), '/' ) );

/**
 * Main Plugin Class
 * @since 1.0.0
 */
final class Innovatex_Base {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = INNOVATEX_VERSION;

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6.20';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Initialize the plugin
	 * @since 1.0.0
	 */
	public function init() {

		add_action( 'init', array( $this, 'innovatex_custom_post_types') );

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		// All versions are ok
		
		require_once( 'inc/innovatex-main.php' );

		add_action( 'init', array( $this, 'innovatex_enable_elementor_in_cpt') );

	}

	/**
	 * Custom post type generation
	 * @since 1.0.0
	 */
	function innovatex_custom_post_types()
	{
		register_post_type('innovatex_headers', array(
			'labels' => array(
				'name' => esc_html__('Headers', 'innovatex-base'),
				'singular_name' => esc_html__('Header', 'innovatex-base'),
			),
			'show_in_rest' => true,
			'supports' => array('title', 'thumbnail', 'page-attributes', 'editor', 'excerpt'),
			'show_in_menu' => true,
			'menu_position' => 24,
			'menu_icon' => esc_attr__('dashicons-portfolio', 'innovatex-base'),
			'public' => true,
			'show_ui' => true,
			'rewrite' => array(
				'slug' => 'innovatex_header',
				'with_front' => true
			)
		));

		register_post_type('innovatex_footers', array(
			'labels' => array(
				'name' => esc_html__('Footers', 'innovatex-base'),
				'singular_name' => esc_html__('Footer', 'innovatex-base'),
			),
			'show_in_rest' => true,
			'supports' => array('title', 'thumbnail', 'page-attributes', 'editor', 'excerpt'),
			'show_in_menu' => true,
			'menu_position' => 22,
			'menu_icon' => esc_attr__('dashicons-index-card', 'innovatex-base'),
			'public' => true,
			'show_ui' => true,
			'rewrite' => array(
				'slug' => 'innovatex_footer',
				'with_front' => true
			)
		));

	}

	/**
	 * Enable elementor in CPT
	 * @since 1.0.0
	 */
	function innovatex_enable_elementor_in_cpt() {
		$elementor_supported_cpts = array('innovatex_headers', 'innovatex_footers');
	
		$elementor_supported_post_types = get_option('elementor_cpt_support', array());
	
		foreach ($elementor_supported_cpts as $post_type) {
			if (!in_array($post_type, $elementor_supported_post_types)) {
				$elementor_supported_post_types[] = $post_type;
			}
		}
	
		update_option('elementor_cpt_support', $elementor_supported_post_types);
	}

	/**
	 * Admin notice when elementor not installed or activated
	 * @since 1.0.0
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'innovatex-addons' ),
			'<strong>' . esc_html__( 'Innovatex Addons', 'innovatex-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'innovatex-addons' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice when doesn't have a minimum required Elementor version
	 * @since 1.0.0
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'innovatex-addons' ),
			'<strong>' . esc_html__( 'Innovatex Addons', 'innovatex-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'innovatex-addons' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'innovatex-addons' ),
			'<strong>' . esc_html__( 'Innovatex-addons', 'innovatex-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'innovatex-addons' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

}

new Innovatex_Base();
