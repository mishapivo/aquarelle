<?php
/**
 * Kindergarten Education Theme Customizer
 * @package Kindergarten Education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kindergarten_education_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'kindergarten_education_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'kindergarten-education' ),
	    'description' => __( 'Description of what this panel does.', 'kindergarten-education' ),
	) );

	//layout setting
	$wp_customize->add_section( 'kindergarten_education_option', array(
    	'title'      => __( 'Layout Settings', 'kindergarten-education' ),
		'priority'   => 30,
		'panel' => 'kindergarten_education_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('kindergarten_education_layout_options',array(
	        'default' => __('Right Sidebar','kindergarten-education'),
	        'sanitize_callback' => 'kindergarten_education_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('kindergarten_education_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','kindergarten-education'),
	        'section' => 'kindergarten_education_option',
	        'choices' => array(
	            'One Column' => __('One Column','kindergarten-education'),
	            'Three Columns' => __('Three Columns','kindergarten-education'),
	            'Four Columns' => __('Four Columns','kindergarten-education'),
	            'Grid Layout' => __('Grid Layout','kindergarten-education'),
	            'Left Sidebar' => __('Left Sidebar','kindergarten-education'),
	            'Right Sidebar' => __('Right Sidebar','kindergarten-education')
	        ),
	    )
    );

	//home page slider
	$wp_customize->add_section( 'kindergarten_education_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'kindergarten-education' ),
		'priority'   => 30,
		'panel' => 'kindergarten_education_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'kindergarten_education_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'kindergarten_education_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'kindergarten_education_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'kindergarten-education' ),
			'section'  => 'kindergarten_education_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Service
	$wp_customize->add_section('kindergarten_education_services',array(
		'title'	=> __('Service','kindergarten-education'),
		'description'	=> __('Add Service Section below.','kindergarten-education'),
		'panel' => 'kindergarten_education_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('kindergarten_education_single_post',array(
		'sanitize_callback' => 'kindergarten_education_sanitize_choices',
	));
	$wp_customize->add_control('kindergarten_education_single_post',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','kindergarten-education'),
		'section' => 'kindergarten_education_services',
	));

	//Category1
	$wp_customize->add_section('kindergarten_education_categoryservices',array(
		'title'	=> __('Service Category','kindergarten-education'),
		'description'	=> __('Add Service Section below.','kindergarten-education'),
		'panel' => 'kindergarten_education_panel_id',
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

	$wp_customize->add_setting('kindergarten_education_blogcategory_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('kindergarten_education_blogcategory_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','kindergarten-education'),
		'section' => 'kindergarten_education_categoryservices',
	));
	
	//footer text
	$wp_customize->add_section('kindergarten_education_footer_section',array(
		'title'	=> __('Footer Text','kindergarten-education'),
		'description'	=> __('Add some text for footer like copyright etc.','kindergarten-education'),
		'panel' => 'kindergarten_education_panel_id'
	));
	
	$wp_customize->add_setting('kindergarten_education_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kindergarten_education_footer_copy',array(
		'label'	=> __('Copyright Text','kindergarten-education'),
		'section'	=> 'kindergarten_education_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'kindergarten_education_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Kindergarten_Education_Customize {

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
		$manager->register_section_type( 'Kindergarten_Education_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Kindergarten_Education_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'   =>  esc_html__( 'kindergarten Edu Pro', 'kindergarten-education' ),
					'pro_text' => esc_html__( 'Go Pro', 'kindergarten-education' ),
					'pro_url'  => esc_url('https://www.buywptemplates.com/themes/kindergarten-education-wordpress-theme/'),
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

		wp_enqueue_script( 'kindergarten-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'kindergarten-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Kindergarten_Education_Customize::get_instance();