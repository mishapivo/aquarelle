<?php
/**
 * Footer Options Customizer
 *
 * @package Blogger_Era
 */


/************************* Footer Setting ********************/
$wp_customize->add_section('section_footer', 
	array(    
		'title'       => esc_html__('Footer Setting', 'blogger-era'),
		'panel'       => 'theme_option_panel'    
		)
	);

/************************** Footer Menu  Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_footer_menu]', 
	array(
		'default' 			=> $default['enable_footer_menu'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_footer_menu]', 
	array(		
		'label' 	=> esc_html__('Enable Footer Menu', 'blogger-era'),
		'description'       => sprintf( '%1$s <a class="footer-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show footer menu.', 'blogger-era' ), esc_html__( 'Click Here', 'blogger-era' ), esc_html__( 'to create menu', 'blogger-era' ) ),
		'section' 	=> 'section_footer',
		'settings'  => 'theme_options[enable_footer_menu]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Footer Menu  Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_footer_social]', 
	array(
		'default' 			=> $default['enable_footer_social'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_footer_social]', 
	array(		
		'label' 	=> esc_html__('Enable Footer Social Menu', 'blogger-era'),
		'description'       => sprintf( '%1$s <a class="footer-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show footer social menu.', 'blogger-era' ), esc_html__( 'Click Here', 'blogger-era' ), esc_html__( 'to create menu', 'blogger-era' ) ),
		'section' 	=> 'section_footer',
		'settings'  => 'theme_options[enable_footer_social]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Footer Social  Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_instagram]', 
	array(
		'default' 			=> $default['enable_instagram'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_instagram]', 
	array(		
		'label' 	=> esc_html__('Enable Instagram', 'blogger-era'),
		'section' 	=> 'section_footer',
		'settings'  => 'theme_options[enable_instagram]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Footer Logo  ******************************/
$wp_customize->add_setting( 'theme_options[footer_logo]', 
	array(
		'default' 			=> $default['footer_logo'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		)
	);

$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize , 'theme_options[footer_logo]', 
	array(		
		'label' 	=> esc_html__('Upload Footer Logo', 'blogger-era'),
		'section' 	=> 'section_footer',
		'settings'  => 'theme_options[footer_logo]',
		)
	));