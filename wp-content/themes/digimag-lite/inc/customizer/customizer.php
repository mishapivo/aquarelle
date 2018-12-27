<?php
/**
 * Digimag Theme Customizer
 *
 * @package Digimag Lite
 */

require_once get_template_directory() . '/inc/customizer/class-digimag-lite-custom-heading.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function digimag_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'digimag_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'digimag_lite_customize_partial_blogdescription',
		) );
	}

	// Add theme options section.
	$wp_customize->add_panel( 'digimag-lite', array(
		'title' => esc_html__( 'Theme Options', 'digimag-lite' ),
	) );


	/**
	 * General Setting
	 */

	$wp_customize->add_section( 'general', array(
		'title' => esc_html__( 'General Settings', 'digimag-lite' ),
		'panel' => 'digimag-lite',
	) );

	$wp_customize->add_setting( 'sticky_header', array(
		'default'           => true,
		'sanitize_callback' => 'digimag_lite_sanitize_checkbox',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'sticky_header', array(
		'label'   => esc_html__( 'Enable sticky header', 'digimag-lite' ),
		'section' => 'general',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'hightlight_js', array(
		'default'           => true,
		'sanitize_callback' => 'digimag_lite_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'hightlight_js', array(
		'label'   => esc_html__( 'Enable syntax highlighting', 'digimag-lite' ),
		'section' => 'general',
		'type'    => 'checkbox',
	) );

	/**
	 * Homepage Settings
	 */

	$wp_customize->add_section( 'home', array(
		'title' => esc_html__( 'Homepage Settings', 'digimag-lite' ),
		'panel' => 'digimag-lite',
	) );

	$wp_customize->add_setting( 'home_layout', array(
		'default'           => 'layout-1',
		'sanitize_callback' => 'digimag_lite_sanitize_select',
	) );

	$wp_customize->add_control( 'home_layout', array(
		'label'   => esc_html__( 'Homepage Layout', 'digimag-lite' ),
		'section' => 'home',
		'type'    => 'radio',
		'choices' => array(
			'layout-1' => esc_html__( 'List', 'digimag-lite' ),
			'layout-2' => esc_html__( 'Grid', 'digimag-lite' ),
		),
	) );

	/**
	 * Single Post
	 */
	$wp_customize->add_section( 'single_post', array(
		'title' => esc_html__( 'Single Post', 'digimag-lite' ),
		'panel' => 'digimag-lite',
	) );

	$wp_customize->add_setting( 'single_post_layout', array(
		'default'           => true,
		'sanitize_callback' => 'digimag_lite_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'single_post_layout', array(
		'label'   => esc_html__( 'Do not show page header', 'digimag-lite' ),
		'section' => 'single_post',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'info_box_navigation_title_length', array(
		'default'           => 8,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'info_box_navigation_title_length', array(
		'label'   => esc_html__( 'Info Box Title Length', 'digimag-lite' ),
		'section' => 'single_post',
		'type'    => 'number',
		'min'     => 1,
		'description' => esc_html__( 'Enter the number of maximum words for the titles of next/previous posts in the info box', 'digimag-lite' ),
	) );

	$wp_customize->add_setting( 'bottom_navigation_title_length', array(
		'default'           => 4,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'bottom_navigation_title_length', array(
		'label'   => esc_html__( 'Post Navigation Title Length', 'digimag-lite' ),
		'section' => 'single_post',
		'type'    => 'number',
		'min'     => 1,
		'description' => esc_html__( 'Enter the number of maximum words for the titles of next/previous posts in the bottom of the page', 'digimag-lite' ),
	) );

	/**
	 * Pagination
	 */
	$wp_customize->add_section( 'pagination', array(
		'title' => esc_html__( 'Pagination Settings', 'digimag-lite' ),
		'panel' => 'digimag-lite',
	) );

	$wp_customize->add_setting( 'pagination_style', array(
		'default'           => 'default',
		'sanitize_callback' => 'digimag_lite_sanitize_select',
	) );
	$wp_customize->add_control( 'pagination_style', array(
		'label'   => esc_html__( 'Pagination Style', 'digimag-lite' ),
		'section' => 'pagination',
		'type'    => 'select',
		'choices' => array(
			'default'          => esc_html__( 'Default', 'digimag-lite' ),
			'load_more_button' => esc_html__( 'Load More Button', 'digimag-lite' ),
		),
	) );

	$wp_customize->add_setting( 'load_more_articles_text', array(
		'default'           => esc_html__( 'Load More Articles', 'digimag-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'load_more_articles_text', array(
		'label'   => esc_html__( 'Load More Button Text', 'digimag-lite' ),
		'section' => 'pagination',
		'type'    => 'text',
	) );

}
add_action( 'customize_register', 'digimag_lite_customize_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function digimag_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function digimag_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Sanitize Select Option.
 *
 * @param string               $input input value.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return boolean.
 */
function digimag_lite_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize Checkbox.
 *
 * @param string $input Input value.
 * @return boolean.
 */
function digimag_lite_sanitize_checkbox( $input ) {
	return isset( $input ) && true == $input;
}

/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 *
 * @param string               $image Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 *
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function digimag_lite_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
	);
	// Return an array with file extension and mime_type.
	$file = wp_check_filetype( $image, $mimes );

	// If $image has a valid mime_type, return it; otherwise, return the default.
	return ( $file['ext'] ? $image : $setting->default );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function digimag_lite_customize_preview_js() {
	wp_enqueue_script( 'digimag-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'digimag_lite_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function digimag_lite_customize_control_js() {
	wp_enqueue_script( 'digimag-customizer', get_template_directory_uri() . '/js/customizer-control.js', array( 'customize-controls', 'jquery' ), null, true );
}
add_action( 'customize_controls_enqueue_scripts', 'digimag_lite_customize_control_js' );
