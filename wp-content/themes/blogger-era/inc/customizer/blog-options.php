<?php
/**
 * Blog Options Customizer
 *
 * @package Blogger_Era
 */
/*************************Blog Section starts********************/
$wp_customize->add_section('section_blog', 
	array(    
		'title'       => esc_html__('Blog Setting', 'blogger-era'),
		'panel'       => 'theme_option_panel'    
		)
	);

/****************************  ********************************/
$wp_customize->add_setting('theme_options[blog_layout]', 
	array(
		'default' 			=> $default['blog_layout'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[blog_layout]', 
	array(		
		'label' 	=> esc_html__('Choose Options', 'blogger-era'),		
		'section' 	=> 'section_blog',
		'settings'  => 'theme_options[blog_layout]',
		'type' 		=> 'select',
		'choices' 	=>  array(
			'default' 	=> esc_html__('Default', 'blogger-era'),
			'full-width' 	=> esc_html__('Full Width', 'blogger-era'),
			'list-opp' 	=> esc_html__('List Opposite', 'blogger-era'),
			'grid-layout' 	=> esc_html__('Grid', 'blogger-era'),
			)
		)
	);
/******************** Blog Content *******************************/
$wp_customize->add_setting('theme_options[blog_content]', 
	array(
		'default' 			=> $default['blog_content'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[blog_content]', 
	array(		
		'label' 	=> esc_html__('Choose Options', 'blogger-era'),		
		'section' 	=> 'section_blog',
		'settings'  => 'theme_options[blog_content]',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'excerpt' 	=> esc_html__('Excerpt', 'blogger-era'),
			'content' 	=> esc_html__('Full Content', 'blogger-era'),
			)
		)
	);
// Excerpt Length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
		'default'           => $default['excerpt_length'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'blogger-era' ),
		'section'     => 'section_blog',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 10, 'max' => 200, 'step' => 5, 'style' => 'width: 200px;' ),
	)
);
/************************** Enable Drop Cap ******************************/
$wp_customize->add_setting('theme_options[enable_archive_drop_cap]', 
	array(
		'default' 			=> $default['enable_archive_drop_cap'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_archive_drop_cap]', 
	array(		
		'label' 	=> esc_html__('Enable Drop Cap', 'blogger-era'),
		'section' 	=> 'section_blog',
		'settings'  => 'theme_options[enable_archive_drop_cap]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Enable Archive Title ******************************/
$wp_customize->add_setting('theme_options[enable_archive_title]', 
	array(
		'default' 			=> $default['enable_archive_title'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_archive_title]', 
	array(		
		'label' 	=> esc_html__('Enable Archive Title', 'blogger-era'),
		'section' 	=> 'section_blog',
		'settings'  => 'theme_options[enable_archive_title]',
		'type' 		=> 'checkbox',	
		)
	);
/************************** Read More Button ******************************/
$wp_customize->add_setting('theme_options[enable_blog_button]', 
	array(
		'default' 			=> $default['enable_blog_button'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_blog_button]', 
	array(		
		'label' 	=> esc_html__('Enable Read More Button', 'blogger-era'),
		'section' 	=> 'section_blog',
		'settings'  => 'theme_options[enable_blog_button]',
		'type' 		=> 'checkbox',	
		)
	);
/************************* Blog Button *********************************/
$wp_customize->add_setting( 'theme_options[blog_button]',
	array(
		'default'           => $default['blog_button'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',	
		)
	);
$wp_customize->add_control( 'theme_options[blog_button]',
	array(
		'label'    => esc_html__( 'Button Title', 'blogger-era' ),
		'section'  => 'section_blog',
		'type'     => 'text',	
		'active_callback' => 'blogger_era_active_button',
		)
	);

/******************** Pagination *******************************/
$wp_customize->add_setting('theme_options[blog_pagination]', 
	array(
		'default' 			=> $default['blog_pagination'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[blog_pagination]', 
	array(		
		'label' 	=> esc_html__('Pagination Options', 'blogger-era'),		
		'section' 	=> 'section_blog',
		'settings'  => 'theme_options[blog_pagination]',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'default' 	=> esc_html__('Default', 'blogger-era'),
			'numeric' 	=> esc_html__('Numeric', 'blogger-era'),
			)
		)
	);