<?php
/**
 * Site Identity Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_change_site_identity_panel' );

function lifestyle_magazine_change_site_identity_panel( $wp_customize)  {
    $wp_customize->get_section( 'title_tagline' )->priority = 3;
    $wp_customize->get_section( 'title_tagline' )->panel = 'lifestyle_magazine_header_panel';

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}



add_action( 'customize_register', 'lifestyle_magazine_site_identity_settings' );

function lifestyle_magazine_site_identity_settings( $wp_customize ) {

	$wp_customize->add_setting( 'lifestyle_magazine_logo_size', array(
        'default'           => 30,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Slider_Control( $wp_customize, 'lifestyle_magazine_logo_size', array(
        'section' => 'title_tagline',
        'settings' => 'lifestyle_magazine_logo_size',
        'label'   => esc_html__( 'Logo Size', 'lifestyle-magazine' ),
        'choices'     => array(
            'min'   => 15,
            'max'   => 60,
            'step'  => 1,
        )
    ) ) );

    $wp_customize->add_setting( 'site_identity_font_family', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'lifestyle_magazine_sanitize_google_fonts',
        'default'     => 'Poppins',
    ) );

    $wp_customize->add_control( 'site_identity_font_family', array(
        'settings'    => 'site_identity_font_family',
        'label'       =>  esc_html__( 'Site Identity Font Family', 'lifestyle-magazine' ),
        'section'     => 'title_tagline',
        'type'        => 'select',
        'choices'     => google_fonts(),
    ) );
    

    $wp_customize->add_setting( 'header_image_height', array(
        'default'           => 30,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Slider_Control( $wp_customize, 'header_image_height', array(
        'section' => 'title_tagline',
        'settings' => 'header_image_height',
        'label'   => esc_html__( 'Header Image Height', 'lifestyle-magazine' ),
        'choices'     => array(
            'min'   => 15,
            'max'   => 200,
            'step'  => 1,
        )
    ) ) );
    
}