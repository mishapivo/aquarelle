<?php
/**
 * Home Page Options.
 *
 * @package Blogger_Era
 */

$default = blogger_era_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => esc_html__( 'Home Page Options', 'blogger-era' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);
/************************* Slider Section *******************************/
$wp_customize->add_section('section_featured_slider', 
	array(    
	'title'       => esc_html__('Slider Section', 'blogger-era'),
	'panel'       => 'home_page_panel'    
	)
);
/************************** Slider Section Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_slider]', 
	array(
	'default' 			=> $default['enable_slider'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogger_era_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_slider]', 
	array(		
	'label' 	=> esc_html__('Enable Slider Section', 'blogger-era'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[enable_slider]',
	'type' 		=> 'checkbox',	
	)
);

/************************** Sider type  ******************************/
$wp_customize->add_setting('theme_options[slider_type]', 
	array(
		'default' 			=> $default['slider_type'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[slider_type]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blogger-era'),
		'section' 	=> 'section_featured_slider',
		'settings'  => 'theme_options[slider_type]',
		'type' 		=> 'radio',		
		'choices' 	=>  array(
			'post-slider' 		=> esc_html__('Post Slider', 'blogger-era'),
			'image' 	=> esc_html__('Banner Image', 'blogger-era'),					
			),
		'active_callback' => 'blogger_era_active_slider',
		)
		
	);

/************************* Slider categor **********************************/
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(
	'default'           => $default['slider_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Blogger_Era_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'blogger-era' ),
		'section'  => 'section_featured_slider',
		'settings' => 'theme_options[slider_category]',
		'active_callback'   => 'blogger_era_active_slider_post',
		)
	)
);
// Slider Number.
$wp_customize->add_setting( 'theme_options[slider_number]',
	array(
		'default'           => $default['slider_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[slider_number]',
	array(
		'label'       => esc_html__( 'No of Slider', 'blogger-era' ),
		'section'     => 'section_featured_slider',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 200px;' ),
		'active_callback'   => 'blogger_era_active_slider_post',
	)
);

/**************************** Slider Text Align ********************************/
$wp_customize->add_setting( 'theme_options[slider_text_align]',
	array(
		'default'           => $default['slider_text_align'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_number_range',
		)
);

$wp_customize->add_control( new Blogger_Era_Range_Value_Control( $wp_customize,
	'theme_options[slider_text_align]', 
	array(		
		'label' 	=> esc_html__('Slider Text Position', 'blogger-era'),
		'section' 	=> 'section_featured_slider',
		'settings'  => 'theme_options[slider_text_align]',
		'type' 		=> 'range-value',	
		'input_attrs' => array(
            'min' => 50,
            'max' => 700,
            'step' => 1,
            'class' => 'blogger-era-range',            
            'suffix' => 'px',
            ),
		
		)
	));

/************************** Page Banner Image ******************************/
$wp_customize->add_setting( 'theme_options[banner_image]', 
	array(
		'default' 			=> $default['banner_image'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		)
	);

$wp_customize->add_control('theme_options[banner_image]', 
	array(		
		'label' 	=> esc_html__('Upload Banner Image', 'blogger-era'),
		'section' 	=> 'section_featured_slider',
		'settings'  => 'theme_options[banner_image]',
		'type'		=> 'dropdown-pages',
		'active_callback' => 'blogger_era_active_slider_banner',
		)
	);

/************************* Popular Section Section **********************************/
$wp_customize->add_section('section_featured_popular', 
	array(    
	'title'       => esc_html__('Popular Section', 'blogger-era'),
	'panel'       => 'home_page_panel'    
	)
);
/************************** Popular Section Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_popular]', 
	array(
	'default' 			=> $default['enable_popular'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogger_era_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_popular]', 
	array(		
	'label' 	=> esc_html__('Enable Popular Section', 'blogger-era'),
	'section' 	=> 'section_featured_popular',
	'settings'  => 'theme_options[enable_popular]',
	'type' 		=> 'checkbox',	
	)
);

/************************* Popular Category **********************************/
$wp_customize->add_setting( 'theme_options[popular_category]',
	array(
	'default'           => $default['popular_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Blogger_Era_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[popular_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'blogger-era' ),
		'section'  => 'section_featured_popular',
		'settings' => 'theme_options[popular_category]',
		'active_callback' => 'blogger_era_active_popular',
		)
	)
);