<?php
/**
 * General Options Customizer
 *
 * @package Blogger_Era
 */
/*************************Blog Section starts********************/
$wp_customize->add_section('section_general', 
	array(    
		'title'       => esc_html__('General Setting', 'blogger-era'),
		'panel'       => 'theme_option_panel'    
		)
	);

/************************** Content Area Width ******************************/
$wp_customize->add_setting('theme_options[content_area_width]', 
	array(
		'default' 			=> $default['content_area_width'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_number_range'
		)
	);

$wp_customize->add_control( new Blogger_Era_Range_Value_Control( $wp_customize,
	'theme_options[content_area_width]', 
	array(		
		'label' 	=> esc_html__('Content Area Width', 'blogger-era'),
		'description' => esc_html__( 'Select primary and secondary width.Secondary width is calculated from primary width', 'blogger-era' ),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[content_area_width]',
		'type' 		=> 'range-value',	
		'input_attrs' => array(
            'min' => 1,
            'max' => 100,
            'step' => 1,
            'class' => 'blogger-era-range',            
            'suffix' => '%',
            ),
		)
	));

/**************************** Sidebar Layout ********************************/
$wp_customize->add_setting('theme_options[sidebar_layout]', 
	array(
		'default' 			=> $default['sidebar_layout'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[sidebar_layout]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blogger-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[sidebar_layout]',
		'type' 		=> 'select',
		'choices' 	=>  array(
			'sidebar-right'	=> esc_html__('Sidebar Right', 'blogger-era'),
			'sidebar-left' 	=> esc_html__('Sidebar Left', 'blogger-era'),
			'no-sidebar' 	=> esc_html__('No Sidebar', 'blogger-era'),
			)
		)
	);

/************************** Enable Sticky Sidebar ******************************/
$wp_customize->add_setting('theme_options[enable_sticky_sidebar]', 
	array(
		'default' 			=> $default['enable_sticky_sidebar'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_sticky_sidebar]', 
	array(		
		'label' 	=> esc_html__('Enable Sticky Sidebar', 'blogger-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_sticky_sidebar]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Enable Categoires ******************************/
$wp_customize->add_setting('theme_options[enable_category]', 
	array(
		'default' 			=> $default['enable_category'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_category]', 
	array(		
		'label' 	=> esc_html__('Enable Category', 'blogger-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_category]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Enable Posted By ******************************/
$wp_customize->add_setting('theme_options[enable_author]', 
	array(
		'default' 			=> $default['enable_author'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_author]', 
	array(		
		'label' 	=> esc_html__('Enable Author', 'blogger-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_author]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Enable Date ******************************/
$wp_customize->add_setting('theme_options[enable_date]', 
	array(
		'default' 			=> $default['enable_date'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_date]', 
	array(		
		'label' 	=> esc_html__('Enable Date', 'blogger-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_date]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Enable Post Format ******************************/
$wp_customize->add_setting('theme_options[enable_posticon]', 
	array(
		'default' 			=> $default['enable_posticon'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_posticon]', 
	array(		
		'label' 	=> esc_html__('Enable Post Format Icon', 'blogger-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_posticon]',
		'type' 		=> 'checkbox',	
		)
	);



/************************** Enable Header and Footer Builder ******************************/
$wp_customize->add_setting('theme_options[enable_header_builder]', 
	array(
		'default' 			=> $default['enable_header_builder'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_header_builder]', 
	array(		
		'label' 	=> esc_html__('Enable Header and Footer Builder', 'blogger-era'),
		'description'=> esc_html__('Header Footer Elementor Plugin should be active. To setup go to Apperance > Header Footer Builder.Resfresh your pages to see effect.', 'blogger-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_header_builder]',
		'type' 		=> 'checkbox',	
		)
	);

