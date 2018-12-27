<?php
/**
 * Header Options Customizer
 *
 * @package Blogger_Era
 */

/*************************Header Setting Section starts********************/
$wp_customize->add_section('section_header', 
	array(    
		'title'       => esc_html__('Header Setting', 'blogger-era'),
		'panel'       => 'theme_option_panel'    
		)
	);
/************************** Site Branding Height ******************************/
$wp_customize->add_setting('theme_options[site_branding_height]', 
	array(
		'default' 			=> $default['site_branding_height'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_number_range'
		)
	);

$wp_customize->add_control( new Blogger_Era_Range_Value_Control( $wp_customize,
	'theme_options[site_branding_height]', 
	array(		
		'label' 	=> esc_html__('Site Branding Height', 'blogger-era'),
		'description' => esc_html__( 'Define height of site branding', 'blogger-era' ),
		'section' 	=> 'section_header',
		'settings'  => 'theme_options[site_branding_height]',
		'type' 		=> 'range-value',	
		'input_attrs' => array(
            'min' => 1,
            'max' => 200,
            'step' => 1,
            'class' => 'blogger-era-range',            
            'suffix' => 'px',
            ),
		)
	));

/************************** Top Header Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_top_header]', 
	array(
		'default' 			=> $default['enable_top_header'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_top_header]', 
	array(		
		'label' 	=> esc_html__('Enable Top Header Section', 'blogger-era'),
		'section' 	=> 'section_header',
		'settings'  => 'theme_options[enable_top_header]',
		'type' 		=> 'checkbox',	
		)
	);

/************************* Right Info  **********************************/
$wp_customize->add_setting('theme_options[left_header_info]', 
	array(
		'sanitize_callback' => 'esc_attr',            
	)
);

$wp_customize->add_control( 
	new Blogger_Era_Info( $wp_customize, 'theme_options[left_header_info]',
		array(
			'label' 			=> esc_html__( 'Left Part Header', 'blogger-era'),
			'section' 			=> 'section_header',
			'active_callback' 	=> 'blogger_era_active_top_header',
		) 
	)
);
/************************** Top Left Part  ******************************/
$wp_customize->add_setting('theme_options[top_left_header]', 
	array(
		'default' 			=> $default['top_left_header'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[top_left_header]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blogger-era'),
		'section' 	=> 'section_header',
		'settings'  => 'theme_options[top_left_header]',
		'type' 		=> 'select',		
		'choices' 	=>  array(
			'none' 			=> esc_html__('Select', 'blogger-era'),
			'top-menu' 		=> esc_html__('Top Menu', 'blogger-era'),
			'social-icon' 	=> esc_html__('Social Icon', 'blogger-era'),
			'address' 		=> esc_html__('Address', 'blogger-era'),
			'current-date' 	=> esc_html__('Current Date', 'blogger-era'),			
			),
		'active_callback' => 'blogger_era_active_top_header',
		)
		
	);
/************************* Right Info  **********************************/
$wp_customize->add_setting('theme_options[right_header_info]', 
	array(
		'sanitize_callback' => 'esc_attr',            
	)
);

$wp_customize->add_control( 
	new Blogger_Era_Info( $wp_customize, 'theme_options[right_header_info]',
		array(
			'label' 			=> esc_html__( 'Right Part Header', 'blogger-era'),
			'section' 			=> 'section_header',
			'active_callback' 	=> 'blogger_era_active_top_header',
		) 
	)
);

/************************** Top Right Part  ******************************/
$wp_customize->add_setting('theme_options[top_right_header]', 
	array(
		'default' 			=> $default['top_right_header'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[top_right_header]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blogger-era'),
		'section' 	=> 'section_header',
		'settings'  => 'theme_options[top_right_header]',
		'type' 		=> 'select',
		'choices' 	=>  array(
			'none' 			=> esc_html__('Select', 'blogger-era'),
			'top-menu' 		=> esc_html__('Top Menu', 'blogger-era'),
			'social-icon' 	=> esc_html__('Social Icon', 'blogger-era'),
			'address' 		=> esc_html__('Address', 'blogger-era'),
			'current-date' 	=> esc_html__('Current Date', 'blogger-era'),			
			),
		'active_callback' => 'blogger_era_active_top_header',
		)
		
	);
/************************* Header Adress  **********************************/
$wp_customize->add_setting('theme_options[header_address_section]', 
	array(
		'sanitize_callback' => 'esc_attr',            
	)
);

$wp_customize->add_control( 
	new Blogger_Era_Info( $wp_customize, 'theme_options[header_address_section]',
		array(
			'label' 			=> esc_html__( 'Header Address', 'blogger-era'),
			'section' 			=> 'section_header',
			'active_callback' 	=> 'blogger_era_active_top_header',
		) 
	)
);

/************************* Address *********************************/
$wp_customize->add_setting( 'theme_options[header_address]',
	array(
		'default'           => $default['header_address'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_textarea_field',	
		)
	);
$wp_customize->add_control( 'theme_options[header_address]',
	array(
		'label'    => esc_html__( 'Address', 'blogger-era' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'active_callback' => 'blogger_era_active_top_header',
		)
	);

/************************* Phone *********************************/
$wp_customize->add_setting( 'theme_options[header_number]',
	array(
		'default'           => $default['header_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',	
		)
	);
$wp_customize->add_control( 'theme_options[header_number]',
	array(
		'label'    => esc_html__( 'Phone Number', 'blogger-era' ),
		'section'  => 'section_header',
		'type'     => 'text',	
		'active_callback' => 'blogger_era_active_top_header',
		)
	);

/************************* Email *********************************/
$wp_customize->add_setting('theme_options[header_email]',  
	array(
		'default'           => $default['header_email'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_email',
		'priority' => 100,
		)
	);

$wp_customize->add_control('theme_options[header_email]', 
	array(
		'label'       => esc_html__('Contact Email', 'blogger-era'),
		'section'     => 'section_header',   
		'settings'    => 'theme_options[header_email]',		
		'type'        => 'text',
		'active_callback' => 'blogger_era_active_top_header',
		)
	);