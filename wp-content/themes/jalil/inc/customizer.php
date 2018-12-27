<?php
/**
 * Jalil Theme Customizer
 *
 * @package Jalil
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jalil_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'jalil_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'jalil_customize_partial_blogdescription',
		) );
	}

	// Add jalil options section
	$wp_customize->add_section('jalil_options', array(
		'title'          => __('Social Options', 'jalil'),
		'capability'     => 'edit_theme_options',
		'description'    => __('Add social section options', 'jalil'),

	));

	// Facebook Url
    $wp_customize->add_setting('fb_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('fa_url_control', array(
        'label'      => __('Facebook Url', 'jalil'),
        'description'=> __('Type your facebook profile link.', 'jalil'),
        'section'    => 'jalil_options',
        'settings'   => 'fb_url',
        'type'       => 'url',
    ));

	// Twitter Url
    $wp_customize->add_setting('tw_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('tw_url_control', array(
        'label'      => __('Twitter Url', 'jalil'),
        'description'=> __('Type your twitter profile link.', 'jalil'),
        'section'    => 'jalil_options',
        'settings'   => 'tw_url',
        'type'       => 'url',
    ));

	// Linkedin Url
    $wp_customize->add_setting('link_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('link_url_control', array(
        'label'      => __('Linkedin Url', 'jalil'),
        'description'=> __('Type your linkedin profile link.', 'jalil'),
        'section'    => 'jalil_options',
        'settings'   => 'link_url',
        'type'       => 'url',
    ));

    // Google Plus Url
    $wp_customize->add_setting('google_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('google_url_control', array(
        'label'      => __('Google Url', 'jalil'),
        'description'=> __('Type your google profile link.', 'jalil'),
        'section'    => 'jalil_options',
        'settings'   => 'google_url',
        'type'       => 'url',
    ));

	// instagram Url
    $wp_customize->add_setting('instagram_url', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('instagram_url_control', array(
        'label'      => __('Instagram Url', 'jalil'),
        'description'=> __('Type your instagram profile link.', 'jalil'),
        'section'    => 'jalil_options',
        'settings'   => 'instagram_url',
        'type'       => 'url',
    ));
}
add_action( 'customize_register', 'jalil_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function jalil_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function jalil_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jalil_customize_preview_js() {
	wp_enqueue_script( 'jalil-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'jalil_customize_preview_js' );
