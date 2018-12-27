<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0
 * @access public
 */
final class euphoric_Customize {

	/**
	 * Returns the instance.
	 *
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require get_template_directory() . '/inc/upgrade/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Euphoric_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Euphoric_Customize_Section_Pro(
				$manager,
				'euphoric',
				array(
					'title'    => esc_html__( 'Euphoric', 'euphoric' ),
					'pro_text' => esc_html__( 'Upgrade To Pro','euphoric' ),
					'pro_url'  => 'https://themespiral.com/themes/euphoric-pro/',
					'priority' => 1
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
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'euphoric-customizer-custom-scripts', trailingslashit( get_template_directory_uri() ) . 'inc/upgrade/customizer-custom-scripts.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'euphoric-upgrade-style', trailingslashit( get_template_directory_uri() ) . '/css/upgrade-style.css' );
	}
}

// Doing this customizer thang!
euphoric_Customize::get_instance();
