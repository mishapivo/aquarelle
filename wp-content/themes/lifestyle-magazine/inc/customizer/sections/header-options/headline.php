<?php
/**
 * Headline Settings
 *
 * @package Lifestyle Magazine
 */

add_action( 'customize_register', 'lifestyle_magazine_theme_headline_section' );

function lifestyle_magazine_theme_headline_section( $wp_customize ) {

    $wp_customize->add_section( 'lifestyle_magazine_theme_headline_section', array(
        'title'          => esc_html__( 'Headline Options', 'lifestyle-magazine' ),
        'description'    => esc_html__( 'Headline Options', 'lifestyle-magazine' ),
        'panel'          => 'lifestyle_magazine_header_panel',
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );


    $wp_customize->add_setting( 'theme_headline_display_option', array(
        'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
        'default'               =>  false
    ) );
            
    $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'theme_headline_display_option', array(
        'label' => esc_html__( 'Hide / Show Headline','lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_theme_headline_section',
        'settings' => 'theme_headline_display_option',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'headline_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'headline_title', array(
        'label' => esc_html__( 'Title', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_theme_headline_section',
        'settings' => 'headline_title',
        'type'=> 'text',
    ) );


    $wp_customize->add_setting( 'theme_headline_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_category',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'theme_headline_category', array(
        'label' => esc_html__( 'Choose Category', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_theme_headline_section',
        'settings' => 'theme_headline_category',
        'type'=> 'dropdown-taxonomies',
        'taxonomy'  =>  'category'
    ) ) );

    $wp_customize->add_setting( 'number_of_headline_posts', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  3
    ) );

    $wp_customize->add_control( 'number_of_headline_posts', array(
        'label' => esc_html__( 'Number of posts', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_theme_headline_section',
        'settings' => 'number_of_headline_posts',
        'type'=> 'text',
        'description'   =>  'put -1 for unlimited'
    ) );

    
    $wp_customize->add_setting( 'lifestyle_magazine_headline_layouts', array(  
        'sanitize_callback' => 'lifestyle_magazine_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Radio_Image_Control( $wp_customize, 'lifestyle_magazine_headline_layouts', array(
        'label' => esc_html__( 'Headline Layout','lifestyle-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_theme_headline_section',
        'settings' => 'lifestyle_magazine_headline_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_template_directory_uri() . '/images/homepage/headline-layouts/headline-layout-one.jpg',
        ),
    ) ) );

}