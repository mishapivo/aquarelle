<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Advik Blog Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Blog_Design_Lite_Script {
	
	function __construct() {

		// Action to add style in front end
		add_action( 'wp_enqueue_scripts', array($this, 'advik_blog_lite_front_styles'), 1 );

		// Action to add script in front end
		add_action( 'wp_enqueue_scripts', array($this, 'advik_blog_lite_front_scripts'), 1 );
    
	}
 

	/**
	 * Enqueue styles for front-end
	 * 
	 * @package Advik Blog Lite
	 * @since 1.0
	 */
	function advik_blog_lite_front_styles() {
		global $wp_styles;
		

		// Font Awesome CSS
		wp_register_style( 'font-awesome', ADVIK_BLOG_LITE_URL . '/assets/css/font-awesome.min.css', array(), ADVIK_BLOG_LITE_VERSION);
		wp_enqueue_style( 'font-awesome' );

		// Registring and enqueing owlcarousel css			
		wp_register_style( 'jquery-owl-slider', ADVIK_BLOG_LITE_URL.'/assets/css/owl.carousel.css', array(), ADVIK_BLOG_LITE_VERSION );
		wp_enqueue_style( 'jquery-owl-slider' );
		
		// Registring and enqueing Custombox css			
		wp_register_style( 'jquery-custombox', ADVIK_BLOG_LITE_URL.'/assets/css/custombox.min.css', array(), ADVIK_BLOG_LITE_VERSION );
		wp_enqueue_style( 'jquery-custombox' );
				

		wp_enqueue_style( 'advik-blog-lite-fonts', advik_blog_lite_fonts_url(), array(), null );

		// Loads theme main stylesheet
		wp_enqueue_style( 'advik-blog-lite-style', get_stylesheet_uri(), array(), ADVIK_BLOG_LITE_VERSION);

	}

	/**
	 * Enqueue scripts for front-end
	 * 
	 * @package Advik Blog Lite
	 * @since 1.0
	 */
	function advik_blog_lite_front_scripts() {		
                
		/*
		 * Adds JavaScript to pages with the comment form to support
		 * sites with threaded comments (when in use).
		 */
		wp_enqueue_script('masonry');
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );
		}

		// Registring and enqueing owl-slider js	
		wp_register_script( 'jquery-owl-slider', ADVIK_BLOG_LITE_URL.'/assets/js/owl.carousel.min.js', array('jquery'), ADVIK_BLOG_LITE_VERSION, true );       
		wp_enqueue_script( 'jquery-owl-slider' );		
		
		// Registring and enqueing Custombox js
        wp_register_script( 'jquery-custombox', ADVIK_BLOG_LITE_URL . '/assets/js/custombox.min.js', array('jquery'), ADVIK_BLOG_LITE_VERSION, true);
		wp_enqueue_script('jquery-custombox');
		
		// Public Js
		wp_register_script( 'advik-blog-lite-public-js', ADVIK_BLOG_LITE_URL . '/assets/js/public.js', array('jquery'), ADVIK_BLOG_LITE_VERSION, true);       
		wp_enqueue_script( 'advik-blog-lite-public-js' );               
        	
	}
}

$advik_blog_lite_script = new Blog_Design_Lite_Script();