<?php
/*
 * Ace Blog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ace Blog
*/

// Loads parent theme stylesheet
// Do not delete this
function ace_blog_scripts()
{
    wp_enqueue_style('adventure-blog-parent', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'ace_blog_scripts', 20);

// Loads custom stylesheet and js for child. 
// This could override all stylesheets of parent theme and custom js functions
function ace_blog_custom_scripts()
{
    wp_enqueue_style('ace-blog-style', get_stylesheet_directory_uri() . '/custom.css');

}

add_action('wp_enqueue_scripts', 'ace_blog_custom_scripts', 60);

require get_stylesheet_directory() . '/inc/custom-hooks.php';

/**
 * Add Google Font
 */
if (!function_exists('adventure_blog_fonts_url')):

/**
 * Return fonts URL.
 *
 * @since 1.0.0
 * @return string Fonts URL.
 */
function adventure_blog_fonts_url() {

	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
	if ('off' !== _x('on', 'Source Sans Pro font: on or off', 'adventure-blog')) {
		$fonts[] = 'Source+Sans+Pro:300,300i,400,400i,700,700i';
	}

	/* translators: If there are characters in your language that are not supported by Shadows Into Light, translate this to 'off'. Do not translate into your own language. */
	if ('off' !== _x('on', 'Shadows Into Light font: on or off', 'adventure-blog')) {
		$fonts[] = 'Playfair+Display:900';
	}

	if ($fonts) {
		$fonts_url = add_query_arg(array(
				'family' => urldecode(implode('|', $fonts)),
				'subset' => urldecode($subsets),
			), '//fonts.googleapis.com/css');
	}
	return $fonts_url;
}
endif;

