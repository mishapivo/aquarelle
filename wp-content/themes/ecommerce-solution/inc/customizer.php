<?php
/**
 * Ecommerce Solution Theme Customizer
 * @package Ecommerce Solution
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ecommerce_solution_customize_register( $wp_customize ) {

	//layout setting
	$wp_customize->add_section( 'ecommerce_solution_option', array(
    	'title'      => __( 'Layout Settings', 'ecommerce-solution' ),
		'priority'   => 30,
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('ecommerce_solution_layout_options',array(
        'default' => __('Right Sidebar','ecommerce-solution'),
        'sanitize_callback' => 'ecommerce_solution_sanitize_choices'	        
	) );

	$wp_customize->add_control('ecommerce_solution_layout_options',
	    array(
	        'type' => 'select',
	        'label' => __('Select different post sidebar layout','ecommerce-solution'),
	        'section' => 'ecommerce_solution_option',
	        'choices' => array(
	            'One Column' => __('One Column','ecommerce-solution'),
	            'Three Columns' => __('Three Columns','ecommerce-solution'),
	            'Four Columns' => __('Four Columns','ecommerce-solution'),
	            'Grid Layout' => __('Grid Layout','ecommerce-solution'),
	            'Left Sidebar' => __('Left Sidebar','ecommerce-solution'),
	            'Right Sidebar' => __('Right Sidebar','ecommerce-solution')
	        ),
	    )
    );

	//add home page setting pannel
	$wp_customize->add_panel( 'ecommerce_solution_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home Page Settings', 'ecommerce-solution' ),
	    'description' => __( 'Description of what this panel does.', 'ecommerce-solution' ),
	) );	

	//Top Bar Section
	$wp_customize->add_section('ecommerce_solution_topbar',array(
		'title'	=> __('Topbar','ecommerce-solution'),
		'description'	=> __('Add contact us here','ecommerce-solution'),
		'priority'	=> null,
		'panel' => 'ecommerce_solution_panel_id',
	));

	$wp_customize->add_setting('ecommerce_solution_phone_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_solution_phone_number',array(
		'label'	=> __('Add phone number','ecommerce-solution'),
		'section'	=> 'ecommerce_solution_topbar',
		'type'		=> 'text'
	));

	//Slider Section
	$wp_customize->add_section( 'ecommerce_solution_slider_section' , array(
    	'title'      => __( 'Slider Section', 'ecommerce-solution' ),
		'priority'   => null,
		'panel' => 'ecommerce_solution_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'ecommerce_solution_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'ecommerce_solution_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'ecommerce_solution_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'ecommerce-solution' ),
			'description' => __('Slider image size (1500 x 600)','ecommerce-solution'),
			'section'  => 'ecommerce_solution_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}


	//New Collection Section
	$wp_customize->add_section( 'ecommerce_solution_new_collection_section' , array(
    	'title'      => __( 'New Collection', 'ecommerce-solution' ),
		'priority'   => null,
		'panel' => 'ecommerce_solution_panel_id'
	) );

	$wp_customize->add_setting( 'ecommerce_solution_product_settings', array(
		'default'           => '',
		'sanitize_callback' => 'ecommerce_solution_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'ecommerce_solution_product_settings', array(
		'label'    => __( 'Select product Page', 'ecommerce-solution' ),
		'section'  => 'ecommerce_solution_new_collection_section',
		'type'     => 'dropdown-pages'
	) );

	//footer text
	$wp_customize->add_section('ecommerce_solution_footer_section',array(
		'title'	=> __('Footer Text','ecommerce-solution'),
		'description'	=> __('Add some text for footer like copyright etc.','ecommerce-solution'),
		'panel' => 'ecommerce_solution_panel_id'
	));
	
	$wp_customize->add_setting('ecommerce_solution_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_solution_footer_copy',array(
		'label'	=> __('Copyright Text','ecommerce-solution'),
		'section'	=> 'ecommerce_solution_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'ecommerce_solution_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ecommerce_Solution_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
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
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Ecommerce_Solution_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ecommerce_Solution_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'   =>  esc_html__( 'Ecommerce Pro', 'ecommerce-solution' ),
					'pro_text' => esc_html__( 'Go Pro', 'ecommerce-solution' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/ecommerce-wordpress-template/' ),
					'priority'   => 9
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

		wp_enqueue_script( 'ecommerce-solution-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ecommerce-solution-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Ecommerce_Solution_Customize::get_instance();