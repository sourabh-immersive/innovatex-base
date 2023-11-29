<?php

/**
 * Class Innovatex_Main
 *
 * Main Entry class
 * @since 1.0.0
 */
class Innovatex_Main {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_style
	 *
	 * Load main style files.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function widget_styles() {
		wp_register_style( 'innovatex-addons-main', INNOVATEX_URL . '/assets/css/main.css' );
		wp_enqueue_style( 'innovatex-addons-main' );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( INNOVATEX_URI . '/widgets/blog-grid.php' );
		require_once( INNOVATEX_URI . '/widgets/innovatex-about.php' );
		require_once( INNOVATEX_URI . '/widgets/widget-services.php' );
		require_once( INNOVATEX_URI . '/widgets/services.php' );
		require_once( INNOVATEX_URI . '/widgets/builder/widget-logo.php' );
		require_once( INNOVATEX_URI . '/widgets/builder/search.php' );
		// require_once( INNOVATEX_URI . '/widgets/builder/navigation.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register( new Innovatex_Blog_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Innovatex_About() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widget_Services() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Services_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widget_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widget_Search() );
		// \Elementor\Plugin::instance()->widgets_manager->register( new Widget_Navigation() );

	}

	public function register_widget_category( $elements_manager ) {

		$categories = [];
			$categories['innovatex-elements'] =
				[
					'title' => __( 'Innovatex Elements', 'innovatex-elementor-addon' ),
					'icon'  => 'fa fa-plug'
				];
			$categories['innovatex-builder'] =
			[
				'title' => __( 'Innovatex Builder Elements', 'innovatex-elementor-addon' ),
				'icon'  => 'fa fa-plug'
			];		
		
			$old_categories = $elements_manager->get_categories();
			$categories = array_merge($categories, $old_categories);
		
			$set_categories = function ( $categories ) {
				$this->categories = $categories;
			};
		
			$set_categories->call( $elements_manager, $categories );
	}

	/**
	 * Add action links to the plugins page.
	 *
	 * @since 1.0.0
	 *
	 * @param array $links Links.
	 */
	public function add_action_links( $links ) {
	  $output =  array_merge(
	    array(
	      'welcome' => '<a href="' . esc_url( admin_url( 'admin.php?page=pgea-welcome' ) ) . '">' . esc_html__( 'Welcome', 'innovatex-addons' ) . '</a>',
	    ),
	    $links
	  );

	  $output = array_merge(
	  	$output,
	    array(
	      'go-pro' => '<a href="#" target="_blank" style="font-weight:700;">' . esc_html__( 'Go Pro', 'innovatex-addons' ) . '</a>',
	    )
	  );

	  return $output;
	}


	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Register widget style
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		add_action( 'elementor/elements/categories_registered', [ $this, 'register_widget_category' ] );

	}
}

// Instantiate Plugin Class
Innovatex_Main::instance();
