<?php
/**
 * Menu Options Customizer
 *
 * @package Blogger_Era
 */

/*************************Menu Setting Section starts********************/
$wp_customize->add_section('section_menu', 
	array(    
		'title'       => esc_html__('Menu Setting', 'blogger-era'),
		'panel'       => 'theme_option_panel'    
		)
	);
/************************** Offcanvs Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_offcanvas_header]', 
	array(
		'default' 			=> $default['enable_offcanvas_header'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_offcanvas_header]', 
	array(		
		'label' 	=> esc_html__('Enable Offcanvas Section', 'blogger-era'),
		'description'       => sprintf( '%1$s <a class="offcanvas-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show Offcanvas.', 'blogger-era' ), esc_html__( 'Click Here', 'blogger-era' ), esc_html__( 'to add item.', 'blogger-era' ) ),
		'section' 	=> 'section_menu',
		'settings'  => 'theme_options[enable_offcanvas_header]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Search Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_search_header]', 
	array(
		'default' 			=> $default['enable_search_header'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_search_header]', 
	array(		
		'label' 	=> esc_html__('Enable Search', 'blogger-era'),
		'section' 	=> 'section_menu',
		'settings'  => 'theme_options[enable_search_header]',
		'type' 		=> 'checkbox',	
		)
	);