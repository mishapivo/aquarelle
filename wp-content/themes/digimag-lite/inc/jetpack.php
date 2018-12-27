<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Digimag Lite
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function digimag_lite_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'digimag_lite_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Social menu.
	add_theme_support( 'jetpack-social-menu' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'blog-display' => 'content',
		'post-details' => array(
			'stylesheet' => 'digimag-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive' => true,
			'post'    => true,
			'page'    => true,
		),
	) );
}
add_action( 'after_setup_theme', 'digimag_lite_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function digimag_lite_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}

/**
 * Remove Jetpack_RelatedPosts to under comment
 */
function digimag_lite_jetpackme_remove_rp() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp     = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
}
add_filter( 'wp', 'digimag_lite_jetpackme_remove_rp', 20 );

/**
 * Deregister jetpack style.
 */
function digimag_lite_deregister_jetpack_style() {
	wp_deregister_style( 'jetpack-social-menu' );
}
add_action( 'wp_enqueue_scripts', 'digimag_lite_deregister_jetpack_style', 99 );

/**
 * Remove sharing jetpack.
 */
function digimag_lite_remove_sharing_jetpack() {
	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'loop_start', 'digimag_lite_remove_sharing_jetpack' );
