<?php
/**
 * Blogger Era Theme Customizer
 *
 * @package Blogger_Era
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogger_era_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blogger_era_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blogger_era_customize_partial_blogdescription',
		) );
	}
	// Load customize control.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/control.php';	

	// Load customize sanitize.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/callback.php';

	// Load customize theme options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/theme-options.php';	

	// Load customize home page options.
	require trailingslashit( get_template_directory() ) . '/inc/customizer/home-options.php';	

}
add_action( 'customize_register', 'blogger_era_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogger_era_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogger_era_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogger_era_customize_preview_js() {
	wp_enqueue_script( 'blogger-era-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogger_era_customize_preview_js' );

/**
 * Script for customizer 
 */
function blogger_era_customize_backend_scripts() {

	wp_enqueue_style( 'blogger-era-customizer-css', get_template_directory_uri() . '/inc/customizer/css/customizer.css' );

	wp_enqueue_script( 'blogger-era-customizer-js', get_template_directory_uri() . '/inc/customizer/js/customizer-js.js', array( ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'blogger_era_customize_backend_scripts', 10 );
