<?php
/**
 * Blogger Era functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blogger_Era
 */

if ( ! function_exists( 'blogger_era_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blogger_era_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blogger Era, use a find and replace
		 * to change 'blogger-era' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'blogger-era', get_template_directory() . '/languages' );

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
		add_image_size('blogger-era-slider', 1300, 498, array( 'center', 'center' ) );
		add_image_size('blogger-era-popular', 340, 227, array( 'center', 'center' ) );
		add_image_size('blogger-era-blog', 352, 366, array( 'center', 'center' ) );
		add_image_size('blogger-era-sidebar', 352, 366, array( 'center', 'center' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'blogger-era' ),
			'top-menu' => esc_html__( 'Top Menu', 'blogger-era' ),
			'social-menu' => esc_html__( 'Social Menu', 'blogger-era' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'blogger-era' ),
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
		 * Switch default core markup for image, video
		 * 
		 */
		add_theme_support( 'post-formats', array(		
			'image',
			'video',
			'gallery',
			'audio',					
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blogger_era_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );	

		add_theme_support( 'header-footer-elementor' );	

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'blogger_era_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blogger_era_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'blogger_era_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogger_era_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogger_era_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blogger-era' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blogger-era' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offcanvas', 'blogger-era' ),
		'id'            => 'offcanvas',
		'description'   => esc_html__( 'Add widgets here.', 'blogger-era' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Instagram', 'blogger-era' ),
		'id'            => 'instagram-widget',
		'description'   => esc_html__( 'Add widgets here.', 'blogger-era' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );					
}
add_action( 'widgets_init', 'blogger_era_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blogger_era_scripts() {

	wp_enqueue_style( 'blogger-era-fonts', blogger_era_fonts_url(), array(), null );

	// Load fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.7.0' );	

	// Owl Carousel Css
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), 'v2.2.1' );

	// meanmenu Css
	wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/assets/css/meanmenu.css', array(), '2.0.7' );

	// Owl theme default Css
	wp_enqueue_style( 'owl-default-min', get_template_directory_uri() .'/assets/css/owl.theme.default.min.css', array(), 'v2.2.1' );		
	
	wp_enqueue_style( 'blogger-era-style', get_stylesheet_uri() );

	wp_enqueue_style( 'blogger-era-responsive', get_template_directory_uri() .'/assets/css/responsive.css', array(), '1.0.1' );	

	wp_enqueue_script( 'jquery-owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery'), 'v2.2.1', true );

	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array( 'jquery'), 'v2.0.8', true );

	$enable_sticky_sidebar = blogger_era_get_option( 'enable_sticky_sidebar' );
	if ( true == $enable_sticky_sidebar ):

		wp_enqueue_script( 'jquery-theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.min.js', array( 'jquery'), 'v1.7.0', true );
	endif;

	wp_enqueue_script( 'blogger-era-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'blogger-era-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'blogger-era-custom', get_template_directory_uri() . '/assets/js/custom.js', array() , '1.0.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogger_era_scripts' );

/**
 * Include Function
 */
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';
