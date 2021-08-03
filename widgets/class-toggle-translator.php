<?php
/**
 * MayasTolkservice class.
 *
 * @category   Class
 * @package    ElementorMayasTolkeservice
 * @subpackage WordPress
 * @author     Drescher Rijna & Veli Aday
 * @copyright  2021 Drescher Rijna & Veli Aday
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorMayasTolkeservice\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Awesomesauce widget class.
 *
 * @since 1.0.0
 */
class MayasTolkeservice_Toggle_Translator extends Widget_Base {

	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'mayastogglecss', plugins_url( '/assets/css/toggle.css', ELEMENTOR_MAYASTOLKESERVICE ), array(), '1.0.0' );
		
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Toggle Translator';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Toggle Translator', 'elementor-mayas-tolkeservice' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-toggle-on';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}


	/**
	 * Enqueue styles & scripts.
	 */
	 public function get_style_depends() {
		return array('mayastogglecss');
	}

	

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Options', 'Toggle Translator' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'Toggle_text_default',
			[
				'label' => __( 'Toggle text default', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hej', 'Toggle Translator' ),
				'placeholder' => __( 'What should the button say by default', 'Toggle Translator' ),
			]
		);

		$this->add_control(
			'Intro_title_default',
			[
				'label' => __( 'Intro title default', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Titel', 'Toggle Translator' ),
				'placeholder' => __( 'Write default intro title', 'Toggle Translator' ),
			]
		);

		$this->add_control(
			'Intro_text_default',
			[
				'label' => __( 'Intro text default', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Tekst der skal oversættes', 'Toggle Translator' ),
				'placeholder' => __( 'Write default intro text', 'Toggle Translator' ),
			]
		);

		$this->add_control(
			'Toggle_text_translated',
			[
				'label' => __( 'Toggle text translated', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Hello', 'Toggle Translator' ),
				'placeholder' => __( 'What should the button say when translated', 'Toggle Translator' ),
			]
		);

		$this->add_control(
			'Intro_title_translated',
			[
				'label' => __( 'Intro title translated', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title', 'Toggle Translator' ),
				'placeholder' => __( 'Write translated intro title', 'Toggle Translator' ),
			]
		);

		$this->add_control(
			'Intro_text_translated',
			[
				'label' => __( 'Intro text translated', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Text to be translated', 'Toggle Translator' ),
				'placeholder' => __( 'Write translated intro text', 'Toggle Translator' ),
			]
		);

		$this->add_control(
			'Oversættelsesydelser_link',
			[
				'label' => __( 'Link', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'Toggle Translator' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'Tolkeservice_link',
			[
				'label' => __( 'Link', 'Toggle Translator' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'Toggle Translator' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);


		$this->end_controls_section();
		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render() {
			$settings = $this->get_settings_for_display();
			$target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
		?>
			<div id="hero-section-container">
				<div id="hero-info-container">
					
						<?php 
							echo '<h1 id="toggle-titel">' . $settings["Intro_title_default"] . '</h1>';
						?>
					

					
						<?php 
							echo '<p id="toggle-paragraph">' . $settings["Intro_text_default"] . '</p>';
						?>
					

					<div id="hero-buttons">
						<?php 
							echo '<a href="' . $settings['Oversættelsesydelser_link']['url'] . '"' . $target . $nofollow . '>
								<button>
									Oversættelsesydelser
								</button>
							</a>';
						?>

						<?php 
							echo '<a href="' . $settings['Tolkeservice_link']['url'] . '"' . $target . $nofollow . '>
								<button>
									Tolkeservice
								</button>
							</a>';
						?>
						
					</div>
				</div>
				<div id="lang-toggle-container">
					<span id="lang-toggle-handler">
						
							<?php 
								echo '<span id="lang-toggle-value" class="pink-text">' . $settings["Toggle_text_default"] . '</span>';
							?>
						
					</span>
				</div>
				
				<script>
					var toggleValue = document.getElementById("lang-toggle-value");
					var toggleHandler = document.getElementById("lang-toggle-handler");
					var toggleContainer = document.getElementById("lang-toggle-container");
					var translateTitle = document.getElementById("toggle-titel");
					var translateParagraph = document.getElementById("toggle-paragraph");

					/* Texts */
					var titleDefault = '<?=$settings["Intro_title_default"]?>';
					var titleTranslated = '<?=$settings["Intro_title_translated"]?>';
					var textDefault = '<?=$settings["Intro_text_default"]?>';
					var textTranslated = '<?=$settings["Intro_text_translated"]?>';
					var toggleDefault = '<?=$settings["Toggle_text_default"]?>';
					var toggleTranslated = '<?=$settings["Toggle_text_translated"]?>';

					var toggled = false;
					var loopAnimation = true;

					window.addEventListener("load", () => {
						setInterval(function() {
							if (loopAnimation == true) {
								if(toggled == false) {
									toggleHandler.style.left = 53.75 + "%";
									toggleValue.classList.add("orange-text");
									toggleValue.classList.remove("pink-text");
									toggleValue.innerHTML = toggleTranslated;
									translateTitle.innerHTML = titleTranslated;
									translateParagraph.innerHTML = textTranslated;
							
									toggled = true;
								} else {
									toggleHandler.style.left = 0 + "px";
									toggleValue.classList.remove("orange-text");
									toggleValue.classList.add("pink-text");
									toggleValue.innerHTML = toggleDefault;
									translateTitle.innerHTML = titleDefault;
									translateParagraph.innerHTML = textDefault;
							
									toggled = false;
								}
							}
						}, 2000);
						
					});

					toggleContainer.addEventListener("click", () => {
						console.log("click");
						if(toggled == false) {
							loopAnimation = false;
							toggleHandler.style.left = 53.75 + "%";
							toggleValue.classList.add("orange-text");
							toggleValue.classList.remove("pink-text");
							toggleValue.innerHTML = toggleTranslated;
							translateTitle.innerHTML = titleTranslated;
							translateParagraph.innerHTML = textTranslated;

							toggled = true;
						} else {
							loopAnimation = false;
							toggleHandler.style.left = 0 + "px";
							toggleValue.classList.remove("orange-text");
							toggleValue.classList.add("pink-text");
							toggleValue.innerHTML = toggleDefault;
							translateTitle.innerHTML = titleDefault;
							translateParagraph.innerHTML = textDefault;

							toggled = false;
						}
						
					});

				</script>

        	</div>

		<?php

	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>


		<?php
	} 
}


