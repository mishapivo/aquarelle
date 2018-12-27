<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Unique_Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function unique_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	//Add a homepage class
	if ( is_home()){
		$unique_blog_post_layout_settings_select = get_theme_mod('unique_blog_post_layout_settings_select','uni_list-layout');
		$classes[] = $unique_blog_post_layout_settings_select;
	}
	
	//add the sidebar control on body class
	$unique_blog_sidebar_layout_settings = get_theme_mod('unique_blog_sidebar_layout_settings','right-sidebar');
	$classes[] = $unique_blog_sidebar_layout_settings;



	return $classes;
	
}
add_filter( 'body_class', 'unique_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function unique_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'unique_blog_pingback_header' );
