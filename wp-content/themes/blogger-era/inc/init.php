<?php
/**
 * Blogger Era functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blogger_Era
 */

/**
 * Include default theme options.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/default.php';

/**
 * Include default theme options.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/options.php';

/**
 * Load Helper Function 
 */
require_once trailingslashit( get_template_directory() ) . '/inc/hook/helper-function.php';

/**
 * Dynamic Css Function 
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/dynamic-css-options.php';

/**
 * Basic Structure 
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/structure.php';

/**
 *  Custom Function for header and Footer
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/custom-function.php';

/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require trailingslashit( get_template_directory() ) . '/inc/jetpack.php';
}

/**
 * Latest Post and Social Media Widget
 */
require trailingslashit( get_template_directory() ) . '/inc/widget/widget.php';

/**
 * Author Bio Widget
 */
require trailingslashit( get_template_directory() ) . '/inc/widget/about/about-us.php';

/**
 * Implement the Sidebar Metabox feature.
 */
require trailingslashit( get_template_directory() ) . '/inc/metabox.php';

/**
 * Elementor Plugin 
 */ 
if ( class_exists( 'Header_Footer_Elementor') ) :
	$enable_header_builder = blogger_era_get_option('enable_header_builder');	
	if ( true == $enable_header_builder ){
		require trailingslashit( get_template_directory() ) . '/inc/hook/class-elementor-header.php';
	}
endif;