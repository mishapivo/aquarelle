<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'corporate-plus-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Blog/Archive Layout', 'corporate-plus' ),
    'panel'          => 'corporate-plus-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-blog-archive-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-blog-archive-layout'],
    'sanitize_callback' => 'corporate_plus_sanitize_select'
) );
$choices = corporate_plus_blog_layout();
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-blog-archive-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Blog/Archive Layout', 'corporate-plus' ),
    'description'=> __( 'Image display options', 'corporate-plus' ),
    'section'   => 'corporate-plus-design-blog-layout-option',
    'settings'  => 'corporate_plus_theme_options[corporate-plus-blog-archive-layout]',
    'type'	  	=> 'select'
) );

/*image size*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-blog-archive-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-blog-archive-img-size'],
	'sanitize_callback' => 'corporate_plus_sanitize_select'
) );
$choices = corporate_plus_get_image_sizes_options(false );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-blog-archive-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Default Blog/Archive Layout', 'corporate-plus' ),
	'description'=> __( 'Image display options', 'corporate-plus' ),
	'section'   => 'corporate-plus-design-blog-layout-option',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-blog-archive-img-size]',
	'type'	  	=> 'select'
) );

/*Read More Text*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-blog-archive-more-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-blog-archive-more-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-blog-archive-more-text]', array(
	'label'		=> __( 'Read More Text', 'corporate-plus' ),
	'section'   => 'corporate-plus-design-blog-layout-option',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-blog-archive-more-text]',
	'type'	  	=> 'text'
) );
