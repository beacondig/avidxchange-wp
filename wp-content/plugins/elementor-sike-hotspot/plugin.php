<?php
namespace ElementorSikeHotspot;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
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
	 * @since 1.2.0
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
	 * register_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_scripts() {
		wp_register_script( 'elementor-sike-hotspot', plugins_url( '/assets/js/init.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'tooltipster', plugins_url( '/assets/hotspot/js/jquery.tooltipster.min.js', __FILE__ ), [ 'jquery' ], false, true );
	}

	public function enqueue_scripts() {
		wp_enqueue_script('elementor-sike-hotspot');
	}

	public function register_styles() {
		wp_register_style( 'tooltipster', plugins_url( 'assets/hotspot/css/tooltipster.css', __FILE__ ) );
		wp_register_style( 'cq-imagehotspot-style', plugins_url( 'assets/hotspot/css/style.css', __FILE__ ), ['tooltipster'] );
	}


	public function enqueue_styles() {
		// wp_enqueue_style('cq-beforeafter-style');
		// wp_enqueue_style('cq-expandgrid-style');
		// wp_enqueue_style('cq-cardslider-style');
		// wp_enqueue_style('cq-flipbox-style');
		// wp_enqueue_style('cq-ihover-style');
	}

	public function preview_enqueue_styles() {
		wp_enqueue_style('cq-imagehotspot-style');
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/cq-image-hotspot.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CQ_Image_Hotspot() );
	}

	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'sike-addons',
			[
				'title' => __( 'Sike', 'elementor-sike-hotspot' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_scripts' ] );
		add_action('elementor/frontend/after_enqueue_scripts', [ $this, 'enqueue_scripts' ]);

		add_action( 'elementor/frontend/after_register_styles', [ $this, 'register_styles' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles' ] );

		add_action( 'elementor/preview/enqueue_styles', [ $this, 'preview_enqueue_styles']);

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		add_action( 'elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories'] );


	}
}

// Instantiate Plugin Class
Plugin::instance();
