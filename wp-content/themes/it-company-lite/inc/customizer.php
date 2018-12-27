<?php
/**
 * IT Company Lite Theme Customizer
 *
 * @package IT Company Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function it_company_lite_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'it_company_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'it-company-lite' ),
	    'description' => __( 'Description of what this panel does.', 'it-company-lite' ),
	) );

	$wp_customize->add_section( 'it_company_lite_left_right', array(
    	'title'      => __( 'General Settings', 'it-company-lite' ),
		'priority'   => 30,
		'panel' => 'it_company_lite_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('it_company_lite_theme_options',array(
        'default' => __('Right Sidebar','it-company-lite'),
        'sanitize_callback' => 'it_company_lite_sanitize_choices'	        
	));
	$wp_customize->add_control('it_company_lite_theme_options',array(
        'type' => 'select',
        'label' => __('Do you want this section','it-company-lite'),
        'section' => 'it_company_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','it-company-lite'),
            'Right Sidebar' => __('Right Sidebar','it-company-lite'),
            'One Column' => __('One Column','it-company-lite'),
            'Three Columns' => __('Three Columns','it-company-lite'),
            'Four Columns' => __('Four Columns','it-company-lite'),
            'Grid Layout' => __('Grid Layout','it-company-lite')
        ),
	) );

	$wp_customize->add_setting('it_company_lite_page_layout',array(
        'default' => __('Right Sidebar','it-company-lite'),
        'sanitize_callback' => 'it_company_lite_sanitize_choices'	        
	));
	$wp_customize->add_control('it_company_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','it-company-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','it-company-lite'),
        'section' => 'it_company_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','it-company-lite'),
            'Right Sidebar' => __('Right Sidebar','it-company-lite'),
            'One Column' => __('One Column','it-company-lite')
        ),
	) );

	$wp_customize->add_section( 'it_company_lite_topbar', array(
    	'title'      => __( 'Topbar Settings', 'it-company-lite' ),
		'priority'   => 30,
		'panel' => 'it_company_lite_panel_id'
	) );

	$wp_customize->add_setting('it_company_lite_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_location',array(
		'label'	=> __('Add Location','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '123 Dummy Stret, USA', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_email_address',array(
		'label'	=> __('Add Email Address','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'support@example.com', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_inquiry_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_inquiry_btn_text',array(
		'label'	=> __('Add Button Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'INQUIRY', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_inquiry_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_inquiry_btn_link',array(
		'label'	=> __('Add Button Link','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'https://example.com', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('it_company_lite_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_phone',array(
		'label'	=> __('Add Phone no.','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'it_company_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'it-company-lite' ),
		'priority'   => null,
		'panel' => 'it_company_lite_panel_id'
	) );

	$wp_customize->add_setting('it_company_lite_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('it_company_lite_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','it-company-lite'),
       'section' => 'it_company_lite_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'it_company_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'it_company_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'it_company_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'it-company-lite' ),
			'description' => __('Slider image size (1500 x 590)','it-company-lite'),
			'section'  => 'it_company_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//About Section
	$wp_customize->add_section( 'it_company_lite_about_section' , array(
    	'title'      => __( 'About us', 'it-company-lite' ),
		'priority'   => null,
		'panel' => 'it_company_lite_panel_id'
	) );

	$wp_customize->add_setting('it_company_lite_section_main_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_section_main_title',array(
		'label'	=> __('Section Title','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT US', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_about_section',
		'setting'=> 'it_company_lite_section_main_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('it_company_lite_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_section_text',array(
		'label'	=> __('Section Text Line','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_about_section',
		'setting'=> 'it_company_lite_section_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'it_company_lite_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'it_company_lite_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'it_company_lite_about_page', array(
		'label'    => __( 'About Page', 'it-company-lite' ),
		'section'  => 'it_company_lite_about_section',
		'type'     => 'dropdown-pages'
	) );

	//Footer Text
	$wp_customize->add_section('it_company_lite_footer',array(
		'title'	=> __('Footer','it-company-lite'),
		'description'=> __('This section will appear in the footer','it-company-lite'),
		'panel' => 'it_company_lite_panel_id',
	));	
	
	$wp_customize->add_setting('it_company_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('it_company_lite_footer_text',array(
		'label'	=> __('Copyright Text','it-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'it-company-lite' ),
        ),
		'section'=> 'it_company_lite_footer',
		'setting'=> 'it_company_lite_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'it_company_lite_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class IT_Company_Lite_Customize {

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
		$manager->register_section_type( 'IT_Company_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new IT_Company_Lite_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'IT COMPANY PRO', 'it-company-lite' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'it-company-lite' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/it-company-wordpress-theme/'),
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

		wp_enqueue_script( 'it-company-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'it-company-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
IT_Company_Lite_Customize::get_instance();