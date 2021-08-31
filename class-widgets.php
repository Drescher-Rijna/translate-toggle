<?php
/**
 * MayasTolkeservice class.
 *
 * @category   Class
 * @package    ElementorMayasTolkeservice
 * @subpackage WordPress
 * @author     Drescher Rijna & Veli Aday
 * @copyright  2021 Drescher Rijna & Veli Aday
 * @since      1.4.7
 * php version 7.3.9
 */

namespace ElementorMayasTolkeservice;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.4.7
 */
class Widgets {

	/**
	 * Instance
	 *
	 * @since 1.4.7
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Sikre at kun en instance af classen er loaded eller kan blive loaded.
	 *
	 * @since 1.4.7
	 * @access public
	 *
	 * @return Plugin En instance af classen.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	

	/**
	 * Inkluderer Widgets filer
	 *
	 * Load widgets filer
	 *
	 * @since 1.4.7
	 * @access private
	 */
	private function include_widgets_files() {
		require_once 'widgets/class-toggle-translator.php';
	}
	

	/**
	 * Registere Widgets
	 *
	 * Registere ny Elementor widgets.
	 *
	 * @since 1.4.7
	 * @access public
	 */
	public function register_widgets() {
		$this->include_widgets_files();

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\MayasTolkeservice_Toggle_Translator() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.4.7
	 * @access public
	 */
	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}

// Instantiate the Widgets class.
Widgets::instance();