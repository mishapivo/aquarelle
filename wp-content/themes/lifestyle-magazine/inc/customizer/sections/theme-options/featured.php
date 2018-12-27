<?php
/**
 * Featured Settings
 *
 * @package Lifestyle Magazine
 */

add_action( 'customize_register', 'lifestyle_magazine_customize_register_featured_lifestyle' );

function lifestyle_magazine_customize_register_featured_lifestyle( $wp_customize ) {
	$wp_customize->add_section( 'lifestyle_magazine_featured_lifestyle_sections', array(
	    'title'          => esc_html__( 'Featured Section', 'lifestyle-magazine' ),
	    'description'    => esc_html__( 'Featured Section :', 'lifestyle-magazine' ),
	    'panel'          => 'lifestyle_magazine_theme_options_panel',
	) );

    $wp_customize->add_setting( 'featured_lifestyle_display_option', array(
      'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'featured_lifestyle_display_option', array(
      'label' => esc_html__( 'Hide / Show','lifestyle-magazine' ),
      'section' => 'lifestyle_magazine_featured_lifestyle_sections',
      'settings' => 'featured_lifestyle_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'featured_lifestyle_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_category',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'featured_lifestyle_category', array(
        'label' => esc_html__( 'Choose Category', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_category',
        'type'=> 'dropdown-taxonomies',
        'taxonomy'  =>  'category'
    ) ) );

    $wp_customize->add_setting( 'featured_lifestyle_section_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'featured_lifestyle_section_title', array(
        'label' => esc_html__( 'Title', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_section_title',
        'type'=> 'text',
    ) );


    $wp_customize->add_setting( 'lifestyle_magazine_featured_layouts', array(  
        'sanitize_callback' => 'lifestyle_magazine_sanitize_choices',
        'default'     => 'one',
        'transport'   => 'postMessage'
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Radio_Image_Control( $wp_customize, 'lifestyle_magazine_featured_layouts', array(
        'label' => esc_html__( 'Featured Layout','lifestyle-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_featured_lifestyle_sections',
        'settings' => 'lifestyle_magazine_featured_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/homepage/featured-layouts/featured-layout-one.jpg',
        ),
    ) ) );


    $wp_customize->add_setting( 'featured_lifestyle_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags', 'description', 'read-more' ),
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Multi_Check_Control( $wp_customize, 'featured_lifestyle_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'lifestyle-magazine' ),
            'date' => esc_html__( 'Show post date', 'lifestyle-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'lifestyle-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'lifestyle-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'lifestyle-magazine' ),
            'description'   =>  esc_html__( 'Show description', 'lifestyle-magazine' ),
            'read-more'   =>  esc_html__( 'Show Read More', 'lifestyle-magazine' ),
        ),
    ) ) );

}