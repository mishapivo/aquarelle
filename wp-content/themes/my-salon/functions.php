<?php
/**
 * My salon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my_salon
 */


//define theme version
if ( !defined( 'MY_SALON_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'MY_SALON_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Custom functions for this theme.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Extra functions for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Wp hooks for this theme.
 */

require get_template_directory() . '/inc/wp-hooks.php';
/**
 * Metabox for this theme.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';