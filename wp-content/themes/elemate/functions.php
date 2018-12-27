<?php

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */
function elemate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elemate_content_width', 1280 );
}
add_action( 'after_setup_theme', 'elemate_content_width', 0 );

if ( ! function_exists( 'elemate_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own elemate_setup() function to override in a child theme.
 *
 * @since EleMate 1.0.0
 */
function elemate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/elemate
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'elemate' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'elemate' );

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
	 * Enable support for custom logo.
	 *
	 *  @since EleMate 1.0.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'elemate-featured-image', 1280, 640, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'elemate' ),
		'social'  => __( 'Social Links Menu', 'elemate' ),
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

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
} // elemate_setup
add_action( 'after_setup_theme', 'elemate_setup' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function elemate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Site Sidebar', 'elemate' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar sitewide other than pages.', 'elemate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'elemate' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'elemate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Menu Sidebar', 'elemate' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your menu sidebar area.', 'elemate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'elemate' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer left widget.', 'elemate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Middle', 'elemate' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer middle widget.', 'elemate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Right - Wider', 'elemate' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer right widget - this widget is wider than the other 2 and is ideal for a bio or long text.', 'elemate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'elemate_widgets_init' );

if ( ! function_exists( 'elemate_fonts_url' ) ) {
/**
 * Register Google fonts for EleMate.
 *
 * Create your own elemate_fonts_url() function to override in a child theme.
 *
 * @since EleMate 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
	function elemate_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'elemate' ) ) {
			$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
		}

		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'elemate' ) ) {
			$fonts[] = 'Montserrat:400,700';
		}

		/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'elemate' ) ) {
			$fonts[] = 'Inconsolata:400';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
}

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since EleMate 1.0.0
 */
function elemate_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'elemate_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function elemate_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'elemate_pingback_header' );

/**
 * Enqueues scripts and styles.
 *
 * @since EleMate 1.0.0
 */
function elemate_scripts() {
	$material_icon_url = 'https://fonts.googleapis.com/icon?family=Material+Icons';
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'elemate-fonts', elemate_fonts_url(), array(), null );	
	wp_register_style( 'material-icons', $material_icon_url, array(), null );
	
	wp_enqueue_style( 'material-icons' );

	// Theme stylesheet.
	wp_enqueue_style( 'elemate-main', get_template_directory_uri() . '/assets/css/styles.css', array(), '3.4.1' );
	wp_enqueue_style( 'elemate-material', get_template_directory_uri() . '/assets/css/materialize.min.css', array( 'elemate-fonts' ), '3.4.1' );
	wp_enqueue_style( 'elemate-custom', get_template_directory_uri() . '/assets/css/style.css', array(), '3.4.1' );
	wp_enqueue_style( 'elememated-style', get_stylesheet_uri() ); // Placed here for better child theme support.
	
	wp_enqueue_script( 'elemate-script', get_template_directory_uri() . '/assets/js/materialize.min.js', array( 'jquery' ), '20160816', true );
	wp_enqueue_script( 'elemate-init', get_template_directory_uri() . '/assets/js/init.js', array( 'jquery', 'elemate-script' ), '20160816', true );

	wp_enqueue_script( 'elemate-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'elemate-keyboard-image-navigation', get_template_directory_uri() . '/assets/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}
}
add_action( 'wp_enqueue_scripts', 'elemate_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since EleMate 1.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function elemate_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-sidebar';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'elemate_body_classes' );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since EleMate 1.0.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function elemate_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'elemate_widget_tag_cloud_args' );

/**
 * path to the template directory
 */
$temp_dir = get_template_directory();
/**
 * Implement the Custom Header feature.
 */
require( $temp_dir . '/inc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require( $temp_dir . '/inc/template-tags.php');

/**
 * Custom template functions for this theme.
 */
require( $temp_dir . '/inc/template-functions.php');

/**
 * Theme Customizer implementation.
 */
require( $temp_dir . '/inc/customizer.php');