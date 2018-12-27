<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'corporate-plus-feature-page', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Feature Slider Selection', 'corporate-plus' ),
    'panel'          => 'corporate-plus-feature-panel'
) );

/*Slider Type*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-slider-type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-slider-type'],
	'sanitize_callback' => 'corporate_plus_sanitize_select',
) );
$choices = corporate_plus_slider_type();
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-slider-type]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Slider Type', 'corporate-plus' ),
	'description'	=> sprintf( __( 'Please note that for the Text slider, background image can be set from %1$s Header-Options -> Header Image, %2$s and for the Full slider, feature image of page-post will be use for slider image', 'corporate-plus' ), '<a class="at-customizer" data-section="header_image">','</a>' ),
	'section'   => 'corporate-plus-feature-page',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-slider-type]',
	'type'	  	=> 'select',
	'priority'  => 5
) );

/* feature parent page selection */
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-feature-page]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-feature-page'],
    'sanitize_callback' => 'corporate_plus_sanitize_number'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-feature-page]', array(
    'label'		    => __( 'Select Parent Page for Feature Slider', 'corporate-plus' ),
    'description'	=> sprintf( __( 'Recommended to write short title, short content/excerpt and use featured image 1280*610 for the selected page below. If you want to show slider, the page you selected should have %1$s child pages %2$s', 'corporate-plus' ), '<a href="https://www.acmethemes.com/blog/2016/04/how-to-create-child-pages-sub-pages/" target="_blank">','</a>' ),
    'section'       => 'corporate-plus-feature-page',
    'settings'      => 'corporate_plus_theme_options[corporate-plus-feature-page]',
    'type'	  	    => 'dropdown-pages',
    'priority'      => 10
) );

/* number of slider*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-featured-slider-number]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-featured-slider-number'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-featured-slider-number]', array(
    'label'		=> __( 'Number Of Slider', 'corporate-plus' ),
    'section'   => 'corporate-plus-feature-page',
    'settings'  => 'corporate_plus_theme_options[corporate-plus-featured-slider-number]',
    'type'	  	=> 'number',
    'priority'  => 20
) );

/*know more text*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-slider-know-more-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-slider-know-more-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-slider-know-more-text]', array(
	'label'		    => __( 'Slider Button Text', 'corporate-plus' ),
	'description'   => __( 'Left empty to disable slider button ', 'corporate-plus' ),
	'section'       => 'corporate-plus-feature-page',
	'settings'      => 'corporate_plus_theme_options[corporate-plus-slider-know-more-text]',
	'type'	  	    => 'text',
	'priority'      => 25
) );

/*image only*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-feature-slider-image-only]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-feature-slider-image-only'],
	'sanitize_callback' => 'corporate_plus_sanitize_checkbox'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-feature-slider-image-only]', array(
	'label'		    => __( 'Display Image Only', 'corporate-plus' ),
	'section'       => 'corporate-plus-feature-page',
	'settings'      => 'corporate_plus_theme_options[corporate-plus-feature-slider-image-only]',
	'type'	  	    => 'checkbox',
	'priority'      => 40
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-fs-image-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['corporate-plus-fs-image-display-options'],
	'sanitize_callback' => 'corporate_plus_sanitize_select'
) );
$choices = corporate_plus_fs_image_display_options();
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-fs-image-display-options]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Feature Slider Image Display Options', 'corporate-plus' ),
	'section'   => 'corporate-plus-feature-page',
	'settings'  => 'corporate_plus_theme_options[corporate-plus-fs-image-display-options]',
	'type'	  	=> 'radio',
	'priority'  => 50
) );

/*go down id*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-go-down]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-go-down'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-go-down]', array(
    'label'		    => __( 'Enter Link Url', 'corporate-plus' ),
    'description'   => __( 'For scroll down, please enter id with hash. For eg: #id-of-section ', 'corporate-plus' ),
    'section'       => 'corporate-plus-feature-page',
    'settings'      => 'corporate_plus_theme_options[corporate-plus-go-down]',
    'type'	  	    => 'text',
    'priority'      => 100
) );