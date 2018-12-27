<?php
/**
 * VW Health Coaching Theme Customizer
 *
 * @package VW Health Coaching
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_health_coaching_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_health_coaching_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-health-coaching' ),
	    'description' => __( 'Description of what this panel does.', 'vw-health-coaching' ),
	) );

	$wp_customize->add_section( 'vw_health_coaching_left_right', array(
    	'title'      => __( 'General Settings', 'vw-health-coaching' ),
		'priority'   => 30,
		'panel' => 'vw_health_coaching_panel_id'
	) );

	$wp_customize->add_setting('vw_health_coaching_theme_options',array(
        'default' => __('Right Sidebar','vw-health-coaching'),
        'sanitize_callback' => 'vw_health_coaching_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_health_coaching_theme_options',array(
        'type' => 'select',
        'label' => __('Do you want this section','vw-health-coaching'),
        'section' => 'vw_health_coaching_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-health-coaching'),
            'Right Sidebar' => __('Right Sidebar','vw-health-coaching'),
            'One Column' => __('One Column','vw-health-coaching'),
            'Three Columns' => __('Three Columns','vw-health-coaching'),
            'Four Columns' => __('Four Columns','vw-health-coaching'),
            'Grid Layout' => __('Grid Layout','vw-health-coaching')
        ),
	) );

	$wp_customize->add_setting('vw_health_coaching_page_layout',array(
        'default' => __('Right Sidebar','vw-health-coaching'),
        'sanitize_callback' => 'vw_health_coaching_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_health_coaching_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-health-coaching'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-health-coaching'),
        'section' => 'vw_health_coaching_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-health-coaching'),
            'Right Sidebar' => __('Right Sidebar','vw-health-coaching'),
            'One Column' => __('One Column','vw-health-coaching')
        ),
	) );

	$wp_customize->add_section( 'vw_health_coaching_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-health-coaching' ),
		'priority'   => 30,
		'panel' => 'vw_health_coaching_panel_id'
	) );

	$wp_customize->add_setting('vw_health_coaching_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_health_coaching_phone',array(
		'label'	=> __('Add Phone no.','vw-health-coaching'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'vw-health-coaching' ),
        ),
		'section'=> 'vw_health_coaching_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_health_coaching_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_health_coaching_email_address',array(
		'label'	=> __('Add Email Address','vw-health-coaching'),
		'input_attrs' => array(
            'placeholder' => __( 'support@example.com', 'vw-health-coaching' ),
        ),
		'section'=> 'vw_health_coaching_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_health_coaching_timing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_health_coaching_timing',array(
		'label'	=> __('Add Timing','vw-health-coaching'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Fri 8:00AM - 2:00PM', 'vw-health-coaching' ),
        ),
		'section'=> 'vw_health_coaching_topbar',
		'type'=> 'text'
	));	
    
	//Slider
	$wp_customize->add_section( 'vw_health_coaching_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-health-coaching' ),
		'priority'   => null,
		'panel' => 'vw_health_coaching_panel_id'
	) );

	$wp_customize->add_setting('vw_health_coaching_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_health_coaching_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-health-coaching'),
       'section' => 'vw_health_coaching_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_health_coaching_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_health_coaching_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_health_coaching_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-health-coaching' ),
			'description' => __('Slider image size (1500 x 590)','vw-health-coaching'),
			'section'  => 'vw_health_coaching_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Services
	$wp_customize->add_section( 'vw_health_coaching_service_section' , array(
    	'title'      => __( 'Services Section', 'vw-health-coaching' ),
		'priority'   => null,
		'panel' => 'vw_health_coaching_panel_id'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_health_coaching_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_health_coaching_sanitize_choices',
	));
	$wp_customize->add_control('vw_health_coaching_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-health-coaching'),
		'description' => __('Image Size (50 x 45)','vw-health-coaching'),
		'section' => 'vw_health_coaching_service_section',
	));

	//Footer Text
	$wp_customize->add_section('vw_health_coaching_footer',array(
		'title'	=> __('Footer','vw-health-coaching'),
		'description'=> __('This section will appear in the footer','vw-health-coaching'),
		'panel' => 'vw_health_coaching_panel_id',
	));	
	
	$wp_customize->add_setting('vw_health_coaching_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_health_coaching_footer_text',array(
		'label'	=> __('Copyright Text','vw-health-coaching'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'vw-health-coaching' ),
        ),
		'section'=> 'vw_health_coaching_footer',
		'setting'=> 'vw_health_coaching_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_health_coaching_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Health_Coaching_Customize {

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
		$manager->register_section_type( 'VW_Health_Coaching_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Health_Coaching_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW HEALTH COACHING', 'vw-health-coaching' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-health-coaching' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/health-coaching-wordpress-theme/'),
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

		wp_enqueue_script( 'vw-health-coaching-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-health-coaching-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Health_Coaching_Customize::get_instance();