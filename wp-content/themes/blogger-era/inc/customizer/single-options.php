<?php
/**
 * Single Page Options Customizer
 *
 * @package Blogger_Era
 */
/*************************Single Page Section starts********************/
$wp_customize->add_section('section_single', 
	array(    
		'title'       => esc_html__('Single Setting', 'blogger-era'),
		'panel'       => 'theme_option_panel'    
		)
	);
/************************** Enable Drop Cap ******************************/
$wp_customize->add_setting('theme_options[enable_drop_cap]', 
	array(
		'default' 			=> $default['enable_drop_cap'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_drop_cap]', 
	array(		
		'label' 	=> esc_html__('Enable Drop Cap', 'blogger-era'),
		'section' 	=> 'section_single',
		'settings'  => 'theme_options[enable_drop_cap]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Enable Categoires ******************************/
$wp_customize->add_setting('theme_options[enable_single_category]', 
	array(
		'default' 			=> $default['enable_single_category'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_single_category]', 
	array(		
		'label' 	=> esc_html__('Enable Category', 'blogger-era'),
		'section' 	=> 'section_single',
		'settings'  => 'theme_options[enable_single_category]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Enable Posted By ******************************/
$wp_customize->add_setting('theme_options[enable_single_author]', 
	array(
		'default' 			=> $default['enable_single_author'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_single_author]', 
	array(		
		'label' 	=> esc_html__('Enable Author', 'blogger-era'),
		'section' 	=> 'section_single',
		'settings'  => 'theme_options[enable_single_author]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Enable Date ******************************/
$wp_customize->add_setting('theme_options[enable_single_date]', 
	array(
		'default' 			=> $default['enable_single_date'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_single_date]', 
	array(		
		'label' 	=> esc_html__('Enable Date', 'blogger-era'),
		'section' 	=> 'section_single',
		'settings'  => 'theme_options[enable_single_date]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Enable Post Format ******************************/
$wp_customize->add_setting('theme_options[enable_single_posticon]', 
	array(
		'default' 			=> $default['enable_single_posticon'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_single_posticon]', 
	array(		
		'label' 	=> esc_html__('Enable Post Format Icon', 'blogger-era'),
		'section' 	=> 'section_single',
		'settings'  => 'theme_options[enable_single_posticon]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Enable Author Information ******************************/
$wp_customize->add_setting('theme_options[enable_author_info]', 
	array(
		'default' 			=> $default['enable_author_info'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_author_info]', 
	array(		
		'label' 	=> esc_html__('Enable Author Bio', 'blogger-era'),
		'section' 	=> 'section_single',
		'settings'  => 'theme_options[enable_author_info]',
		'type' 		=> 'checkbox',	
		)
	);