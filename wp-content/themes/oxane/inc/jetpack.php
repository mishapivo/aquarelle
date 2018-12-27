<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package oxane
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function oxane_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'oxane_jetpack_setup' );
