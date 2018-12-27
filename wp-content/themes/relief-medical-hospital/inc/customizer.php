<?php
/**
 * Relief Medical Hospital Theme Customizer
 *
 * @package Relief Medical Hospital
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Relief_Medical_Hospital_Customize {

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
		$manager->register_section_type( 'Relief_Medical_Hospital_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Relief_Medical_Hospital_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Medical Hospital Pro', 'relief-medical-hospital' ),
					'pro_text' => esc_html__( 'Go Pro',         'relief-medical-hospital' ),
					'pro_url'  => esc_url( 'https://www.logicalthemes.com/themes/medical-wordpress-theme/' ),
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

		wp_enqueue_script( 'relief-medical-hospital-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'relief-medical-hospital-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Relief_Medical_Hospital_Customize::get_instance();

function relief_medical_hospital_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'relief_medical_hospital_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'Custom Settings', 'relief-medical-hospital' ),
	) );

	//Topbar section
	$wp_customize->add_section('relief_medical_hospital_topbar',array(
		'title'	=> esc_html__('Topbar','relief-medical-hospital'),
		'priority'	=> null,
		'panel' => 'relief_medical_hospital_panel_id',
	));

	$wp_customize->add_setting('relief_medical_hospital_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('relief_medical_hospital_call',array(
		'label'	=> esc_html__('Add Phone Number','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_topbar',
		'setting'	=> 'relief_medical_hospital_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('relief_medical_hospital_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('relief_medical_hospital_mail',array(
		'label'	=> esc_html__('Add Email','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_topbar',
		'setting'	=> 'relief_medical_hospital_mail',
		'type'		=> 'text'
	));	

	//Social Icons(topbar)
	$wp_customize->add_section('relief_medical_hospital_social_media',array(
		'title'	=> esc_html__('Social Media','relief-medical-hospital'),
		'priority'	=> null,
		'panel' => 'relief_medical_hospital_panel_id',
	));

	$wp_customize->add_setting('relief_medical_hospital_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('relief_medical_hospital_facebook_url',array(
		'label'	=> esc_html__('Add Facebook link','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_social_media',
		'setting'	=> 'relief_medical_hospital_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('relief_medical_hospital_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('relief_medical_hospital_twitter_url',array(
		'label'	=> esc_html__('Add Twitter link','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_social_media',
		'setting'	=> 'relief_medical_hospital_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('relief_medical_hospital_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('relief_medical_hospital_linkedin_url',array(
		'label'	=> esc_html__('Add Linkedin link','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_social_media',
		'setting'	=> 'relief_medical_hospital_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('relief_medical_hospital_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('relief_medical_hospital_insta_url',array(
		'label'	=> esc_html__('Add Instagram link','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_social_media',
		'setting'	=> 'relief_medical_hospital_insta_url',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'relief_medical_hospital_slidersettings' , array(
    	'title'      => esc_html__( 'Slider Settings', 'relief-medical-hospital' ),
		'priority'   => null,
		'panel' => 'relief_medical_hospital_panel_id'
	) );

	$wp_customize->add_setting('relief_medical_hospital_slider_hide_show',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('relief_medical_hospital_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => esc_html__('Show / Hide slider','relief-medical-hospital'),
	   'section' => 'relief_medical_hospital_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'relief_medical_hospital_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'relief_medical_hospital_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'relief_medical_hospital_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'relief-medical-hospital' ),
			'section'  => 'relief_medical_hospital_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	// OUR services

	$wp_customize->add_section('relief_medical_hospital_service',array(
		'title'	=> esc_html__('Our Services','relief-medical-hospital'),
		'panel' => 'relief_medical_hospital_panel_id',
	));

	$wp_customize->add_setting('relief_medical_hospital_our_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('relief_medical_hospital_our_services_title',array(
		'label'	=> esc_html__('Section Title','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_service',
		'setting'	=> 'relief_medical_hospital_our_services_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('relief_medical_hospital_category_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('relief_medical_hospital_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','relief-medical-hospital'),
		'section' => 'relief_medical_hospital_service',
	));

	//footer
	$wp_customize->add_section('relief_medical_hospital_footer_section',array(
		'title'	=> esc_html__('Footer Text','relief-medical-hospital'),
		'panel' => 'relief_medical_hospital_panel_id'
	));
	
	$wp_customize->add_setting('relief_medical_hospital_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('relief_medical_hospital_footer_copy',array(
		'label'	=> esc_html__('Copyright Text','relief-medical-hospital'),
		'section'	=> 'relief_medical_hospital_footer_section',
		'type'		=> 'text'
	));

	//Layout Setting
	$wp_customize->add_section( 'relief_medical_hospital_left_right' , array(
    	'title'      => esc_html__( 'General Settings', 'relief-medical-hospital' ),
		'priority'   => null,
		'panel' => 'relief_medical_hospital_panel_id'
	) );

	$wp_customize->add_setting('relief_medical_hospital_theme_options',array(
        'default' => esc_html__( 'Right Sidebar', 'relief-medical-hospital' ),
        'sanitize_callback' => 'relief_medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control('relief_medical_hospital_theme_options',array(
        'type' => 'radio',
        'label' => esc_html__( 'Post Sidebar Layout.', 'relief-medical-hospital' ),
        'section' => 'relief_medical_hospital_left_right',
        'choices' => array(
            'One Column' => esc_html__('One Column ','relief-medical-hospital'),
            'Three Columns' => esc_html__('Three Columns','relief-medical-hospital'),
            'Four Columns' => esc_html__('Four Columns','relief-medical-hospital'),
            'Right Sidebar' => esc_html__('Right Sidebar','relief-medical-hospital'),
            'Left Sidebar' => esc_html__('Left Sidebar','relief-medical-hospital'),
            'Grid Layout' => esc_html__('Grid Layout','relief-medical-hospital')
        ),
	));	
}
add_action( 'customize_register', 'relief_medical_hospital_customize_register' );