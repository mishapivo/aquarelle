<?php
/**
 * GW Chariot Theme Customizer
 *
 * @package GW_Chariot
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gw_chariot_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'gw_chariot_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'gw_chariot_customize_partial_blogdescription',
		) );
	}
	
	// Social Icons
	$wp_customize->add_section('gw_chariot_social_section', array(
			'title' => __('Social Icons','gw-chariot'),
			'priority' => 44 ,
	));
	
	
	$wp_customize->add_setting(
		'gw_chariot_facebook_url', array(
			'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control( 'gw_chariot_facebook_url', array(
				'settings' => 'gw_chariot_facebook_url',
				'description' => __('Facebook Url','gw-chariot'),
				'section' => 'gw_chariot_social_section',
				'type' => 'url',
	));	
	
	$wp_customize->add_setting(
		'gw_chariot_twitter_url', array(
			'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control( 'gw_chariot_twitter_url', array(
				'settings' => 'gw_chariot_twitter_url',
				'description' => __('Facebook Url','gw-chariot'),
				'section' => 'gw_chariot_social_section',
				'type' => 'url',
	));	
	
	$wp_customize->add_setting(
		'gw_chariot_instagram_url', array(
			'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control( 'gw_chariot_instagram_url', array(
				'settings' => 'gw_chariot_instagram_url',
				'description' => __('Instagram Url','gw-chariot'),
				'section' => 'gw_chariot_social_section',
				'type' => 'url',
	));	
	
	$wp_customize->add_setting(
		'gw_chariot_rss_url', array(
			'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control( 'gw_chariot_rss_url', array(
				'settings' => 'gw_chariot_rss_url',
				'description' => __('RSS Url','gw-chariot'),
				'section' => 'gw_chariot_social_section',
				'type' => 'url',
	));
	
	$wp_customize->add_setting(
		'gw_chariot_pinterest_url', array(
			'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control( 'gw_chariot_pinterest_url', array(
				'settings' => 'gw_chariot_pinterest_url',
				'description' => __('Pinterest Url','gw-chariot'),
				'section' => 'gw_chariot_social_section',
				'type' => 'url',
	));
	
}
add_action( 'customize_register', 'gw_chariot_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function gw_chariot_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function gw_chariot_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gw_chariot_customize_preview_js() {
	wp_enqueue_script( 'gw-chariot-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gw_chariot_customize_preview_js' );
