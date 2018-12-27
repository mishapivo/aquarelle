<?php
/**
 * vmagazine Theme Customizer
 *
 * @package vmagazine-lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vmagazine_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('header_image');

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'vmagazine_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'vmagazine_lite_customize_partial_blogdescription',
		) );
	}

	/*------------------------------------------------------------------------------------*/
	/**
	 * Upgrade to Doko Pro
	*/
	// Register custom section types.
	$wp_customize->register_section_type( 'Vmagazine_Lite_Customize_Section_Pro' );

	// Register sections.
	$wp_customize->add_section(
	    new Vmagazine_Lite_Customize_Section_Pro(
	        $wp_customize,
	        'vmagazine-lite',
	        array(
	            'title'    => esc_html__( 'Free vs Pro Version', 'vmagazine-lite' ),
	            'pro_text' => esc_html__( 'Compare and Buy','vmagazine-lite' ),
	            'pro_url'  => admin_url( 'themes.php?page=vmagazine-lite-welcome&section=free_vs_pro' ),
	            'priority' => 0,
	        )
	    )
	);
}
add_action( 'customize_register', 'vmagazine_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function vmagazine_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function vmagazine_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vmagazine_lite_customize_preview_js() {
	wp_enqueue_script( 'vmagazine-lite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'vmagazine_lite_customize_preview_js' );

/**
 * Added customizer scripts
 */
function vmagazine_lite_customizer_script() {
	
	wp_enqueue_script( 'jquery-ui-button' );

	wp_enqueue_style( 'juqery-ui', esc_url( get_template_directory_uri() . '/assets/css/jquery-ui.css' ) );


}
add_action( 'customize_controls_enqueue_scripts', 'vmagazine_lite_customizer_script' );



/** 
**Include Customizer option
**/

require get_template_directory().'/inc/customizer/vmagazine-lite-customizer.php';


/**
*
* Customizer repeaters
*
*/
require get_template_directory().'/inc/customizer/repeater-controller/customizer.php';


/** 
**Include sanatize functions
**/

require get_template_directory().'/inc/customizer/vmagazine-lite-sanatize.php';

/** 
**Include custom functions
**/

require get_template_directory().'/inc/customizer/vmagazine-lite-custom-class.php';


require trailingslashit( get_template_directory() ) . '/inc/customizer/additional-settings.php'; // Additional Settings panel
