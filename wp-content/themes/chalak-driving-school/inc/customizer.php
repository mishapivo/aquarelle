<?php
/**
 * chalak-driving-school: Customizer
 *
 * @package WordPress
 * @subpackage chalak-driving-school
 * @since 1.0
 */

function chalak_driving_school_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'chalak_driving_school_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'chalak-driving-school' ),
	    'description' => __( 'Description of what this panel does.', 'chalak-driving-school' ),
	) );

	$wp_customize->add_section( 'chalak_driving_school_theme_options_section', array(
    	'title'      => __( 'General Settings', 'chalak-driving-school' ),
		'priority'   => 30,
		'panel' => 'chalak_driving_school_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('chalak_driving_school_theme_options',array(
        'default' => __('Right Sidebar','chalak-driving-school'),
        'sanitize_callback' => 'chalak_driving_school_sanitize_choices'	        
	));

	$wp_customize->add_control('chalak_driving_school_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','chalak-driving-school'),
        'section' => 'chalak_driving_school_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','chalak-driving-school'),
            'Right Sidebar' => __('Right Sidebar','chalak-driving-school'),
            'One Column' => __('One Column','chalak-driving-school'),
            'Three Columns' => __('Three Columns','chalak-driving-school'),
            'Four Columns' => __('Four Columns','chalak-driving-school'),
            'Grid Layout' => __('Grid Layout','chalak-driving-school')
        ),
	));

	// Contact Details
	$wp_customize->add_section( 'chalak_driving_school_contact_details', array(
    	'title'      => __( 'Contact Details', 'chalak-driving-school' ),
		'priority'   => null,
		'panel' => 'chalak_driving_school_panel_id'
	) );

	$wp_customize->add_setting('chalak_driving_school_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('chalak_driving_school_call',array(
		'label'	=> __('Contact Number','chalak-driving-school'),
		'section'=> 'chalak_driving_school_contact_details',
		'setting'=> 'chalak_driving_school_call',
		'type'=> 'text'
	));

	$wp_customize->add_setting('chalak_driving_school_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('chalak_driving_school_mail',array(
		'label'	=> __('Email Address','chalak-driving-school'),
		'section'=> 'chalak_driving_school_contact_details',
		'setting'=> 'chalak_driving_school_mail',
		'type'=> 'text'
	));	

	//social icons

	$wp_customize->add_section('chalak_driving_school_topbar_header',array(
		'title'	=> __('Social Icons','chalak-driving-school'),
		'description'	=> __('Add Header Content here','chalak-driving-school'),
		'priority'	=> null,
		'panel' => 'chalak_driving_school_panel_id',
	));

	$wp_customize->add_setting('chalak_driving_school_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('chalak_driving_school_facebook_url',array(
		'label'	=> __('Add Facebook link','chalak-driving-school'),
		'section'	=> 'chalak_driving_school_topbar_header',
		'setting'	=> 'chalak_driving_school_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('chalak_driving_school_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('chalak_driving_school_twitter_url',array(
		'label'	=> __('Add Twitter link','chalak-driving-school'),
		'section'	=> 'chalak_driving_school_topbar_header',
		'setting'	=> 'chalak_driving_school_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('chalak_driving_school_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('chalak_driving_school_youtube_url',array(
		'label'	=> __('Add Youtube link','chalak-driving-school'),
		'section'	=> 'chalak_driving_school_topbar_header',
		'setting'	=> 'chalak_driving_school_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('chalak_driving_school_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('chalak_driving_school_linkedin_url',array(
		'label'	=> __('Add Linkedin link','chalak-driving-school'),
		'section'	=> 'chalak_driving_school_topbar_header',
		'setting'	=> 'chalak_driving_school_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('chalak_driving_school_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('chalak_driving_school_insta_url',array(
		'label'	=> __('Add Instagram link','chalak-driving-school'),
		'section'	=> 'chalak_driving_school_topbar_header',
		'setting'	=> 'chalak_driving_school_insta_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'chalak_driving_school_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'chalak-driving-school' ),
		'priority'   => null,
		'panel' => 'chalak_driving_school_panel_id'
	) );

	$wp_customize->add_setting('chalak_driving_school_slider_hide_show',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('chalak_driving_school_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider','chalak-driving-school'),
	   'section' => 'chalak_driving_school_slider_section',
	));


	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'chalak_driving_school_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'chalak_driving_school_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'chalak_driving_school_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'chalak-driving-school' ),
			'section'  => 'chalak_driving_school_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//	Our Services
	$wp_customize->add_section('chalak_driving_school_service',array(
		'title'	=> __('Our Services','chalak-driving-school'),
		'description'=> __('This section will appear below the slider.','chalak-driving-school'),
		'panel' => 'chalak_driving_school_panel_id',
	));

	$wp_customize->add_setting('chalak_driving_school_our_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('chalak_driving_school_our_services_title',array(
		'label'	=> __('Section Title','chalak-driving-school'),
		'section'	=> 'chalak_driving_school_service',
		'setting'	=> 'chalak_driving_school_our_services_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('chalak_driving_school_category_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('chalak_driving_school_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','chalak-driving-school'),
		'section' => 'chalak_driving_school_service',
	));

	//Footer
    $wp_customize->add_section( 'chalak_driving_school_footer', array(
    	'title'      => __( 'Footer Text', 'chalak-driving-school' ),
		'priority'   => null,
		'panel' => 'chalak_driving_school_panel_id'
	) );

    $wp_customize->add_setting('chalak_driving_school_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('chalak_driving_school_footer_copy',array(
		'label'	=> __('Footer Text','chalak-driving-school'),
		'section'	=> 'chalak_driving_school_footer',
		'setting'	=> 'chalak_driving_school_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'chalak_driving_school_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'chalak_driving_school_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'chalak_driving_school_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'chalak_driving_school_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'chalak-driving-school' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'chalak-driving-school' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'chalak_driving_school_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'chalak_driving_school_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'chalak_driving_school_customize_register' );

function chalak_driving_school_customize_partial_blogname() {
	bloginfo( 'name' );
}

function chalak_driving_school_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function chalak_driving_school_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function chalak_driving_school_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Chalak_Driving_School_Customize {

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
		$manager->register_section_type( 'Chalak_Driving_School_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Chalak_Driving_School_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Driving School Pro', 'chalak-driving-school' ),
					'pro_text' => esc_html__( 'Go Pro','chalak-driving-school' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/themes/driving-school-wordpress-theme/' ),
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

		wp_enqueue_script( 'chalak-driving-school-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'chalak-driving-school-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Chalak_Driving_School_Customize::get_instance();