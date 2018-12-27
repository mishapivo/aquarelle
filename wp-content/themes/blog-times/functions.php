<?php
/**
 * Blog times functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blog-times
 */

  add_action( 'wp_enqueue_scripts', 'blog_times_style' );
  function blog_times_style() {
  	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.css' );
  	
	wp_enqueue_style( 'st-blog-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'blog-times-style',get_stylesheet_directory_uri() . '/style.css',array('st-blog-style'));
}

if(!function_exists('blog_times_setup') ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blog_times_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'blog-times', get_stylesheet_directory() . '/languages' );
	}

endif;

add_action( 'after_setup_theme', 'blog_times_setup' );




/**
 *Your code goes below
 */

// for ticker position
if( ! function_exists('st_blog_header_alignment') ) {
	function st_blog_ticker_position() {
		return 'ticker_content';
	}
}

// for header, navigation alignment
if( ! function_exists('st_blog_header_alignment') ) {
	function st_blog_header_alignment() {
		return 'nav_first';
	}
}

// for slider alignment
if( ! function_exists('st_blog_slider_alignment') ) {
	function st_blog_slider_alignment() {
		return 'content_slider';
	}
}

// for additional support
if ( ! function_exists( 'st_blog_additional_class' ) ) {
    function st_blog_additional_class($id) {
        //  Do something.
 		if($id == 'st-blog-featured') {
			return 'featured-layout-2';
		}       
    }
}

// theme name
if ( ! function_exists ( 'st_blog_theme_name' ) ) {
	function st_blog_theme_name() {
		return esc_html__('Blog Times','blog-times');
	}
}

