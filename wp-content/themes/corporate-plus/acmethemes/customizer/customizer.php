<?php
/**
 * Corporate Plus Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage Corporate Plus
 */

/*
* file for upgrade to pro
*/
require_once get_template_directory() . '/acmethemes/customizer/customizer-pro/class-customize.php';

/*
* file for customizer core functions
*/
require_once get_template_directory() . '/acmethemes/customizer/customizer-core.php';

/*
* file for customizer sanitization functions
*/
require_once get_template_directory() . '/acmethemes/customizer/sanitize-functions.php';

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporate_plus_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = corporate_plus_get_theme_options();

    /*defaults options*/
    $defaults = corporate_plus_get_default_theme_options();

    /*
     * file for feature panel of home page
     */
    require_once get_template_directory() . '/acmethemes/customizer/feature-section/feature-panel.php';

    /*
    * file for header panel
    */
    require_once get_template_directory() . '/acmethemes/customizer/header-options/header-panel.php';

    /*
    * file for customizer footer section
    */
    require_once get_template_directory() . '/acmethemes/customizer/footer-options/footer-panel.php';

    /*
    * file for design/layout panel
    */
    require_once get_template_directory() . '/acmethemes/customizer/design-options/design-panel.php';

    /*
     * file for options panel
     */
    require_once get_template_directory() . '/acmethemes/customizer/options/options-panel.php';

	/*sorting core and widget for ease of theme use*/
	$wp_customize->get_section( 'static_front_page' )->priority = 10;

	$corporate_plus_home_section = $wp_customize->get_section( 'sidebar-widgets-corporate-plus-home' );
	if ( ! empty( $corporate_plus_home_section ) ) {
		$corporate_plus_home_section->panel = '';
		$corporate_plus_home_section->title = __( 'Home Main Content Area ', 'corporate-plus' );
		$corporate_plus_home_section->priority = 80;
	}
}
add_action( 'customize_register', 'corporate_plus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corporate_plus_customize_preview_js() {
    wp_enqueue_script( 'corporate-plus-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_preview_init', 'corporate_plus_customize_preview_js' );

/**
 * Theme Update Script
 *
 * For backward compatibility
 */
function corporate_plus_update_check() {

    global $wp_version;
    // Return if wp version less than 4.5
    if ( version_compare( $wp_version, '4.5', '<' ) ) {
        return;
    }
    $corporate_plus_saved_theme_options = corporate_plus_get_theme_options();
    $site_logo = '';
    if( isset( $corporate_plus_saved_theme_options['corporate-plus-header-logo'] )){
        $site_logo = esc_url( $corporate_plus_saved_theme_options['corporate-plus-header-logo'] );
    }
    if ( empty( $site_logo ) ) {
        return;
    }
    /*converting url into attachment ID*/
    $logo = attachment_url_to_postid( $site_logo );
    if ( is_int( $logo ) ) {
        set_theme_mod( 'custom_logo', attachment_url_to_postid( $site_logo ) );
        $corporate_plus_saved_theme_options['corporate-plus-header-logo'] = '';
        set_theme_mod( 'corporate_plus_theme_options', $corporate_plus_saved_theme_options );
    }
}
add_action( 'after_setup_theme', 'corporate_plus_update_check' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corporate_plus_customize_controls_scripts() {
	wp_enqueue_script( 'corporate-plus-customizer-controls', get_template_directory_uri() . '/acmethemes/core/js/customizer-controls.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'corporate_plus_customize_controls_scripts' );