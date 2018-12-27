<?php
/**
 * @package Kindergarten Education
 * @subpackage kindergarten-education
 * @since kindergarten-education 1.0
 * Setup the WordPress core custom header feature.
 * @uses kindergarten_education_header_style()
*/

function kindergarten_education_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'kindergarten_education_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'kindergarten_education_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'kindergarten_education_custom_header_setup' );

if ( ! function_exists( 'kindergarten_education_header_style' ) ) :

/**
 * Styles the header image and text displayed on the blog
 *
 * @see kindergarten_education_custom_header_setup().
 */

add_action( 'wp_enqueue_scripts', 'kindergarten_education_header_style' );
function kindergarten_education_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'kindergarten-education-basic-style', $custom_css );
	endif;
}
endif; // kindergarten_education_header_style