<?php
/**
 * Theme Options Customizer
 *
 * @package Blogger_Era
 */

$default = blogger_era_get_default_theme_options();

/************************* Add Pannel **********************************/
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'blogger-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		)
	);

/**************************** Site Identity ********************************/
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
		'default' 			=> $default['site_identity'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[site_identity]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blogger-era'),
		'section' 	=> 'title_tagline',
		'settings'  => 'theme_options[site_identity]',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'logo-only' 	=> esc_html__('Logo Only', 'blogger-era'),
			'logo-title' 	=> esc_html__('Logo + Title', 'blogger-era'),
			'logo-text' 	=> esc_html__('Logo + Tagline', 'blogger-era'),
			'title-only' 	=> esc_html__('Title Only', 'blogger-era'),
			'title-text' 	=> esc_html__('Title + Tagline', 'blogger-era')
			)
		)
	);
/************************** Enable Breadcrumb  ******************************/
$wp_customize->add_setting('theme_options[enable_breadcrumb]', 
	array(
		'default' 			=> $default['enable_breadcrumb'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_breadcrumb]', 
	array(		
		'label' 	=> esc_html__('Enable Breadcrumb', 'blogger-era'),
		'section' 	=> 'header_image',
		'settings'  => 'theme_options[enable_breadcrumb]',
		'type' 		=> 'checkbox',	
		)
	);

/**************************** Header Image ********************************/
$wp_customize->add_setting('theme_options[blogger_header_image]', 
	array(
		'default' 			=> $default['blogger_header_image'],
		'sanitize_callback' => 'blogger_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[blogger_header_image]', 
	array(		
		'label' 	=> esc_html__('Choose Header Image Options', 'blogger-era'),
		'description' => esc_html__('Note: Post Thumbail works only in Single Page.', 'blogger-era'),
		'section' 	=> 'header_image',
		'settings'  => 'theme_options[blogger_header_image]',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'none' 	=> esc_html__('None', 'blogger-era'),
			'header-image' 	=> esc_html__('Header Image', 'blogger-era'),
			'post-thumbnail' 	=> esc_html__('Post Thumbnail', 'blogger-era'),
			)
		)
	);
/************************** Header Image Padding ******************************/
$wp_customize->add_setting('theme_options[header_image_padding]', 
	array(
		'default' 			=> $default['header_image_padding'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_number_range'
		)
	);

$wp_customize->add_control( new Blogger_Era_Range_Value_Control( $wp_customize,
	'theme_options[header_image_padding]', 
	array(		
		'label' 	=> esc_html__('Header Image Height', 'blogger-era'),
		'section' 	=> 'header_image',
		'settings'  => 'theme_options[header_image_padding]',
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

/************************** Header Image Opacity ******************************/
$wp_customize->add_setting('theme_options[header_image_opacity]', 
	array(
		'default' 			=> $default['header_image_opacity'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogger_era_sanitize_number_range'
		)
	);

$wp_customize->add_control( new Blogger_Era_Range_Value_Control( $wp_customize,
	'theme_options[header_image_opacity]', 
	array(		
		'label' 	=> esc_html__('Header Image Opacity', 'blogger-era'),
		'description' => esc_html__('Choose Header Image Opacity.', 'blogger-era'),
		'section' 	=> 'header_image',
		'settings'  => 'theme_options[header_image_opacity]',
		'type' 		=> 'range-value',	
		'input_attrs' => array(
            'min' => 0,
            'max' => 9,
            'step' => 1,
            'class' => 'blogger-era-range',            
            'suffix' => '',
            ),
		)
	));

	// Load customize header options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/header-options.php';

	// Load customize header options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/menu-options.php';

	// Load customize archive/blog options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/blog-options.php';

	// Load customize single page options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/single-options.php';

	// Load customize archive/blog options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/general-options.php';		

	// Load customize header options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/footer-options.php';