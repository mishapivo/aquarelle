<?php
/**
 * Header Layout Settings
 *
 * @package Lifestyle Magazine
 */

add_action( 'customize_register', 'lifestyle_magazine_theme_header_layout_section' );

function lifestyle_magazine_theme_header_layout_section( $wp_customize ) {

    $wp_customize->add_section( 'lifestyle_magazine_theme_header_layout_section', array(
        'title'          => esc_html__( 'Theme Header Options', 'lifestyle-magazine' ),
        'description'    => esc_html__( 'Theme Header Options', 'lifestyle-magazine' ),
        'panel'          => 'lifestyle_magazine_header_panel',
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );


    $wp_customize->add_setting( 'lifestyle_magazine_header_sticky_menu_option', array(
      'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'lifestyle_magazine_header_sticky_menu_option', array(
      'label' => esc_html__( 'Enable Sticky Menu?','lifestyle-magazine' ),
      'section' => 'lifestyle_magazine_theme_header_layout_section',
      'settings' => 'lifestyle_magazine_header_sticky_menu_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'header_search_display_option', array(
        'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
        'default'               =>  false
    ) );
            
    $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'header_search_display_option', array(
        'label' => esc_html__( 'Hide / Show Header Search','lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_theme_header_layout_section',
        'settings' => 'header_search_display_option',
        'type'=> 'toggle',
    ) ) );

    
    $wp_customize->add_setting( 'lifestyle_magazine_header_layouts', array(  
        'sanitize_callback' => 'lifestyle_magazine_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Radio_Image_Control( $wp_customize, 'lifestyle_magazine_header_layouts', array(
        'label' => esc_html__( 'Header Layout','lifestyle-magazine' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_theme_header_layout_section',
        'settings' => 'lifestyle_magazine_header_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_template_directory_uri() . '/images/homepage/header-layouts/header-layout-one.jpg',
        ),
    ) ) );

}