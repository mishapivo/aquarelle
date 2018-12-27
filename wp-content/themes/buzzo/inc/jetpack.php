<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Buzzo
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function buzzo_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'buzzo_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'buzzo_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function buzzo_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/loop', 'search' );
		else :
			get_template_part( 'template-parts/loop', get_post_format() );
		endif;
	}
}


function buzzo_infinite_scroll_js_settings( $settings ) {
	$settings['text'] = esc_html__( 'View more', 'buzzo' );

	return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'buzzo_infinite_scroll_js_settings' );
