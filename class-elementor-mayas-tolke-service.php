<?php
/**
 * Maya's Tolkeservice class.
 *
 * @category   Class
 * @package    ElementorMayasTolkeservice
 * @subpackage WordPress
 * @author     Drescher Rijna & Veli Aday
 * @copyright  2021 Drescher Rijna & Veli Aday
 * @since      1.1.0
 * php version 7.3.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

/**
 * Main Elementor MayasTolkeservice Class
 *
 * init class er den der køre Elementor MayasTolkeservice pluginet.
 */
final class Elementor_MayasTolkeservice {

	/**
	 * Plugin Version
	 *
	 * @since 1.1.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.1.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.1.0
	 * @var string Minimum Elementor version påkrævet til at køre pluginet.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.1.0
	 * @var string Minimum PHP version påkrævet til at køre pluginet.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public function __construct() {
		// Load translation.
		add_action( 'init', array( $this, 'i18n' ) );

		// Initialize plugin.
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin filplacering.
	 * Kørt af `init` action hook.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'elementor-mayastolkeservice' );
	}

	/**
	 * Initialize pluginet
	 *
	 * Bekræfter at Elementor er allerede loaded
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public function init() {

		// Check hvis Elementor er installeret og aktiveret.
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for påkrævet Elementor version.
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for påkrævet PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		// Hvis alt er bekræftet får vi filen class-widgets.php
		require_once 'class-widgets.php';
	}

	/**
	 * Admin notice
	 *
	 * Advarelse når Elementor ikke er installeret eller aktiveret.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		deactivate_plugins( plugin_basename( ELEMENTOR_MAYASTOLKESERVICE ) );

		return sprintf(
			wp_kses(
				'<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> to be installed and activated.</p></div>',
				array(
					'div' => array(
						'class'  => array(),
						'p'      => array(),
						'strong' => array(),
					),
				)
			),
			'Elementor MayasTolkeservice',
			'Elementor'
		);
	}

	/**
	 * Admin notice
	 *
	 * Advarelse når man ikke har den rigitge version af Elementor.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		deactivate_plugins( plugin_basename( ELEMENTOR_MAYASTOLKESERVICE ) );

		return sprintf(
			wp_kses(
				'<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> version %3$s or greater.</p></div>',
				array(
					'div' => array(
						'class'  => array(),
						'p'      => array(),
						'strong' => array(),
					),
				)
			),
			'Elementor MayasTolkeservice',
			'Elementor',
			self::MINIMUM_ELEMENTOR_VERSION
		);
	}

	/**
	 * Admin notice
	 *
	 * Advarsel når man ikke har den minimum påkrævet version af PHP.
	 *
	 * @since 1.1.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		deactivate_plugins( plugin_basename( ELEMENTOR_MAYASTOLKESERVICE ) );

		return sprintf(
			wp_kses(
				'<div class="notice notice-warning is-dismissible"><p><strong>"%1$s"</strong> requires <strong>"%2$s"</strong> version %3$s or greater.</p></div>',
				array(
					'div' => array(
						'class'  => array(),
						'p'      => array(),
						'strong' => array(),
					),
				)
			),
			'Elementor Mayas Tolkeservice',
			'Elementor',
			self::MINIMUM_ELEMENTOR_VERSION
		);
	}
}

// Instantiate Elementor_MayasTolkeservice.
new Elementor_MayasTolkeservice();