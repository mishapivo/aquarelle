<?php
/**
 * lz-charity-welfare: Customizer
 *
 * @package WordPress
 * @subpackage lz-charity-welfare
 * @since 1.0
 */

function lz_charity_welfare_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'lz_charity_welfare_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'lz-charity-welfare' ),
	    'description' => __( 'Description of what this panel does.', 'lz-charity-welfare' ),
	) );

	$wp_customize->add_section( 'lz_charity_welfare_theme_options_section', array(
    	'title'      => __( 'General Settings', 'lz-charity-welfare' ),
		'priority'   => 30,
		'panel' => 'lz_charity_welfare_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('lz_charity_welfare_theme_options',array(
        'default' => __('Right Sidebar','lz-charity-welfare'),
        'sanitize_callback' => 'lz_charity_welfare_sanitize_choices'	        
	));

	$wp_customize->add_control('lz_charity_welfare_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','lz-charity-welfare'),
        'section' => 'lz_charity_welfare_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','lz-charity-welfare'),
            'Right Sidebar' => __('Right Sidebar','lz-charity-welfare'),
            'One Column' => __('One Column','lz-charity-welfare'),
            'Three Columns' => __('Three Columns','lz-charity-welfare'),
            'Four Columns' => __('Four Columns','lz-charity-welfare'),
            'Grid Layout' => __('Grid Layout','lz-charity-welfare')
        ),
	));

	// topbar
	$wp_customize->add_section('lz_charity_welfare_topbar_header',array(
		'title'	=> __('Social Icons','lz-charity-welfare'),
		'description'	=> __('Add Header Content here','lz-charity-welfare'),
		'priority'	=> null,
		'panel' => 'lz_charity_welfare_panel_id',
	));

	$wp_customize->add_setting('lz_charity_welfare_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('lz_charity_welfare_facebook_url',array(
		'label'	=> __('Add Facebook link','lz-charity-welfare'),
		'section'	=> 'lz_charity_welfare_topbar_header',
		'setting'	=> 'lz_charity_welfare_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('lz_charity_welfare_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('lz_charity_welfare_twitter_url',array(
		'label'	=> __('Add Twitter link','lz-charity-welfare'),
		'section'	=> 'lz_charity_welfare_topbar_header',
		'setting'	=> 'lz_charity_welfare_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('lz_charity_welfare_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('lz_charity_welfare_linkedin_url',array(
		'label'	=> __('Add Linkedin link','lz-charity-welfare'),
		'section'	=> 'lz_charity_welfare_topbar_header',
		'setting'	=> 'lz_charity_welfare_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('lz_charity_welfare_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('lz_charity_welfare_google_plus_url',array(
		'label'	=> __('Add Google Plus link','lz-charity-welfare'),
		'section'	=> 'lz_charity_welfare_topbar_header',
		'setting'	=> 'lz_charity_welfare_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('lz_charity_welfare_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('lz_charity_welfare_insta_url',array(
		'label'	=> __('Add Instagram link','lz-charity-welfare'),
		'section'	=> 'lz_charity_welfare_topbar_header',
		'setting'	=> 'lz_charity_welfare_insta_url',
		'type'	=> 'url'
	));


	// Contact Details
	$wp_customize->add_section( 'lz_charity_welfare_contact_details', array(
    	'title'      => __( 'Contact Details', 'lz-charity-welfare' ),
		'priority'   => null,
		'panel' => 'lz_charity_welfare_panel_id'
	) );

	$wp_customize->add_setting('lz_charity_welfare_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_charity_welfare_call',array(
		'label'	=> __('Contact Number','lz-charity-welfare'),
		'section'=> 'lz_charity_welfare_contact_details',
		'setting'=> 'lz_charity_welfare_call',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lz_charity_welfare_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_charity_welfare_mail',array(
		'label'	=> __('Email Address','lz-charity-welfare'),
		'section'=> 'lz_charity_welfare_contact_details',
		'setting'=> 'lz_charity_welfare_mail',
		'type'=> 'text'
	));	

	//home page slider
	$wp_customize->add_section( 'lz_charity_welfare_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'lz-charity-welfare' ),
		'priority'   => null,
		'panel' => 'lz_charity_welfare_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'lz_charity_welfare_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'lz_charity_welfare_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'lz_charity_welfare_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'lz-charity-welfare' ),
			'section'  => 'lz_charity_welfare_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//	Our Service
	$wp_customize->add_section('lz_charity_welfare_service',array(
		'title'	=> __('Our Services','lz-charity-welfare'),
		'description'=> __('This section will appear below the slider.','lz-charity-welfare'),
		'panel' => 'lz_charity_welfare_panel_id',
	));

	$wp_customize->add_setting('lz_charity_welfare_our_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_charity_welfare_our_services_title',array(
		'label'	=> __('Section Title','lz-charity-welfare'),
		'section'	=> 'lz_charity_welfare_service',
		'setting'	=> 'lz_charity_welfare_our_services_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('lz_charity_welfare_category_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('lz_charity_welfare_category_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Post','lz-charity-welfare'),
		'section' => 'lz_charity_welfare_service',
	));

	//Footer
    $wp_customize->add_section( 'lz_charity_welfare_footer', array(
    	'title'      => __( 'Footer Text', 'lz-charity-welfare' ),
		'priority'   => null,
		'panel' => 'lz_charity_welfare_panel_id'
	) );

    $wp_customize->add_setting('lz_charity_welfare_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_charity_welfare_footer_copy',array(
		'label'	=> __('Footer Text','lz-charity-welfare'),
		'section'	=> 'lz_charity_welfare_footer',
		'setting'	=> 'lz_charity_welfare_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'lz_charity_welfare_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'lz_charity_welfare_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'lz_charity_welfare_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'lz_charity_welfare_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'lz-charity-welfare' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'lz-charity-welfare' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'lz_charity_welfare_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'lz_charity_welfare_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'lz_charity_welfare_customize_register' );

function lz_charity_welfare_customize_partial_blogname() {
	bloginfo( 'name' );
}

function lz_charity_welfare_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function lz_charity_welfare_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function lz_charity_welfare_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class LZ_Charity_Welfare_Customize {

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
		$manager->register_section_type( 'LZ_Charity_Welfare_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new LZ_Charity_Welfare_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'LZ Charity Pro', 'lz-charity-welfare' ),
					'pro_text' => esc_html__( 'Go Pro','lz-charity-welfare' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/themes/charity-wordpress-theme/' ),
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

		wp_enqueue_script( 'lz-charity-welfare-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'lz-charity-welfare-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
LZ_Charity_Welfare_Customize::get_instance();