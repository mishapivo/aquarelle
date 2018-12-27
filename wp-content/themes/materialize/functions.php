<?php
/**
 *
 *  Materialize functions and definitions
 *
 *  Set up the theme and provides some helper functions, which are used in the
 *  theme. Others are attached to action and filter hooks in WordPress to change core functionality.
 *
 *  When using a child theme you can override certain functions (those wrapped
 *  in a function_exists() call) by defining them first in your child theme's
 *  functions.php file. The child theme's functions.php file is included before
 *  the parent theme's file, so the child theme functions would be used.
 *
 *  @link https://codex.wordpress.org/Theme_Development
 *  @link https://codex.wordpress.org/Child_Themes
 *
 *  Functions that are not pluggable (not wrapped in function_exists()) are
 *  instead attached to a filter or action hook.
 *
 *  For more information on hooks, actions, and filters,
 *  {@link https://codex.wordpress.org/Plugin_API}
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    require_once( get_template_directory() . '/lib/main.php' );

	add_action( 'admin_init', 			array( 'mythemes_scripts', 	'backend' ) );

	add_action( 'admin_menu', 			array( 'mythemes_admin', 	'pageMenu' ) );

	add_action( 'widgets_init', 		array( 'mythemes_setup', 	'sidebars' ) );
	add_action( 'init', 				array( 'mythemes_setup', 	'menus' ) );

	add_action( 'wp_enqueue_scripts',  array( 'mythemes_scripts',  'frontend' ), 0 );
	add_action( 'wp_head', 				array( 'mythemes_header', 	'head' ) );

    add_filter( 'the_excerpt_rss', 		array( 'mythemes_tools', 	'rss_with_thumbnail' ) );
    add_filter( 'the_content_feed', 	array( 'mythemes_tools', 	'rss_with_thumbnail' ) );

    if( get_theme_mod( 'mythemes-gallery', true ) ){
        add_action( 'admin_init',           array( 'mythemes_gallery',  'admin_init' ) );
        add_filter( 'post_gallery',         array( 'mythemes_gallery',  'shortcode'), null, 2 );
    }

    function materialize_setup() {
        add_theme_support( 'custom-logo', array(
            'height'      => 600,
            'width'       => 800,
            'flex-height' => true,
            'flex-width'  => true
        ));
    }

    add_action( 'after_setup_theme', 'materialize_setup' );

    // max content width
    global $content_width;

    if( !isset( $content_width ) ) {
        $content_width = 1140;
    }

    add_theme_support( 'content-width', 1140 );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-background', array(
        'default-color' => 'f5f5f5',
        'default-image' => ''
    ));


    // custom header support
    add_theme_support( 'custom-header', array(
        'default-image'          => get_template_directory_uri() . '/media/_frontend/img/bkg.jpeg',
        'random-default'         => false,
        'width'                  => 2600,
        'height'                 => 1450,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => 'ffffff',
        'header-text'            => true,
        'uploads'                => true
    ));

    register_default_headers( array(
        'default' => array(
            'url'           => get_template_directory_uri() . '/media/_frontend/img/bkg.jpeg',
            'thumbnail_url' => get_template_directory_uri() . '/media/_frontend/img/bkg.jpeg',
            'description'   => __( 'Default', 'materialize' )
        )
    ));

    // thumbnail custom size
    add_image_size( 'mythemes-classic' , 1140 , 515 , true );

    // translation ready, directory with languages
    load_theme_textdomain( 'materialize' , get_template_directory() . '/languages' );



    {   ////    NOT FOUND FUNCTIONS AND FILTERS


		/**
	     *  Message - not found
	     */

	    function materialize_not_found_message( $message = null )
	    {
            $message = apply_filters( 'materialize_not_found_message', $message );

            // to do in the next version: get from options
	        if( empty( $message ) )
	            $message = __( 'Resource not found', 'materialize' );

	        return $message;
	    }


	    /**
	     *  Description - not found
	     */

	    function materialize_not_found_description( $description = null )
	    {
            $description = apply_filters( 'materialize_not_found_description', $description );

            // to do in the next version: get from options
	        if( empty( $description ) ){
	            $description = __( 'We apologize but this page, post or resource does not exist or can not be found.', 'materialize' );

	            if( is_search() )
	                $description = __( 'We apologize, but we couldn\'t find anything matching your search request. Please try to search for a different term or topic.', 'materialize' );
	        }

	        return $description;
	    }
	}
?>
