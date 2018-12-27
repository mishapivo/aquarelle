<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if( ! function_exists( 'edumag_jetpack_setup' ) ) :
	/**
	 * Jetpack setup function.
	 *
	 */
	function edumag_jetpack_setup() {
		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );
	}
endif; 
add_action( 'after_setup_theme', 'edumag_jetpack_setup' );