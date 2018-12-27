<?php
/**
 * Theme functions and definitions
 *
 * @package transport_gravity
 */

if ( ! function_exists( 'transport_gravity_enqueue_styles' ) ) :
	/**
	 * @since Transport Gravity 1.0.0
	 */
	function transport_gravity_enqueue_styles() {
		wp_enqueue_style( 'transport-gravity-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'transport-gravity-style', get_stylesheet_directory_uri() . '/style.css', array( 'transport-gravity-style-parent' ), '1.0.0' );
		wp_enqueue_style( 'transport-gravity-google-fonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700', false );
		wp_enqueue_script( 'transport-gravity-script', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true );
	}
endif;
add_action( 'wp_enqueue_scripts', 'transport_gravity_enqueue_styles', 99 );


function transport_gravity_customizer_fields( $fileds ) {
	unset( $fileds['header_layout'] );
	unset( $fileds['footer_layout'] );
	return $fileds;
}

add_filter( 'Businessgravity_Customizer_fields', 'transport_gravity_customizer_fields', 11 );