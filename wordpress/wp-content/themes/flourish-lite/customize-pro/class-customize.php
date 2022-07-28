<?php 
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class flourish_lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function flourish_lite_get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->flourish_lite_setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function flourish_lite_setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'flourish_lite_sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'flourish_lite_enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function flourish_lite_sections( $manager ) {

		// Load custom sections.
		get_template_part( 'customize-pro/section', 'pro' );

		// Register custom section types.
		$manager->register_section_type( 'flourish_lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new flourish_lite_Customize_Section_Pro(
				$manager,
				'flourish-lite',
				array(
					'title'    => esc_html__( 'Upgrade to Pro', 'flourish-lite' ),
					'pro_text' => esc_html__( 'Upgrade Now', 'flourish-lite' ),
					'pro_url'  => 'https://gracethemes.com/themes/furniture-shop-wordpress-theme/',
					'priority'   => 1,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function flourish_lite_enqueue_control_scripts() {

		wp_enqueue_script( 'flourish-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'flourish-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
flourish_lite_Customize::flourish_lite_get_instance();