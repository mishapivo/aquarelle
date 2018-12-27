<?php
/**
 * elementare functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elementare
 */

if ( ! function_exists( 'elementare_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elementare_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on elementare, use a find and replace
		 * to change 'elementare' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elementare', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		/* Support for wide images on Gutenberg */
		add_theme_support( 'align-wide' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'elementare-the-post-small' , 400, 300, true);
		add_image_size( 'elementare-the-post-big' , 1920, 99999);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'elementare' ),
			'footer' => esc_html__( 'Footer', 'elementare' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		
		// Adds support for editor font sizes.
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name'      => __( 'Small', 'elementare' ),
				'shortName' => __( 'S', 'elementare' ),
				'size'      => 14,
				'slug'      => 'small'
			),
			array(
				'name'      => __( 'Regular', 'elementare' ),
				'shortName' => __( 'M', 'elementare' ),
				'size'      => 16,
				'slug'      => 'regular'
			),
			array(
				'name'      => __( 'Large', 'elementare' ),
				'shortName' => __( 'L', 'elementare' ),
				'size'      => 20,
				'slug'      => 'large'
			),
			array(
				'name'      => __( 'Larger', 'elementare' ),
				'shortName' => __( 'XL', 'elementare' ),
				'size'      => 24,
				'slug'      => 'larger'
			)
		) );
		
		/*
		 * Starter Content Support
		 */
		add_theme_support( 'starter-content', array(
			'posts' => array(
				'home' => array(
					'template' => 'template-onepage.php',
				),
				'blog',
			),
			'options' => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{home}}',
				'page_for_posts' => '{{blog}}',
				'elementare_theme_options[_onepage_section_slider]' => '1',
				'elementare_theme_options[_onepage_image_1_slider]' => get_template_directory_uri().'/images/example/elementare_slider_example_1.jpg',
				'elementare_theme_options[_onepage_image_2_slider]' => get_template_directory_uri().'/images/example/elementare_slider_example_2.jpg',
				'elementare_theme_options[_onepage_text_1_slider]' => 'Welcome to Elementare Theme',
				'elementare_theme_options[_onepage_subtext_1_slider]' => 'Use the customizer to customize the onepage sections',
				'elementare_theme_options[_onepage_text_2_slider]' => 'Read the documentation',
				'elementare_theme_options[_onepage_subtext_2_slider]' => 'You can find the documentation in "Appearance-> About Elementare-> Documentation"',
				'elementare_theme_options[_onepage_section_skills]' => '1',
				'elementare_theme_options[_onepage_skillname_1_skills]' => 'Design',
				'elementare_theme_options[_onepage_skillvalue_1_skills]' => '84',
				'elementare_theme_options[_onepage_skillname_2_skills]' => 'WordPress',
				'elementare_theme_options[_onepage_skillvalue_2_skills]' => '93',
				'elementare_theme_options[_onepage_skillname_3_skills]' => 'SEO',
				'elementare_theme_options[_onepage_skillvalue_3_skills]' => '76',
				'elementare_theme_options[_onepage_skillname_4_skills]' => 'Support',
				'elementare_theme_options[_onepage_skillvalue_4_skills]' => '90',
				'elementare_theme_options[_onepage_skillname_5_skills]' => 'Customization',
				'elementare_theme_options[_onepage_skillvalue_5_skills]' => '89',
				'elementare_theme_options[_onepage_skillname_6_skills]' => 'Updates',
				'elementare_theme_options[_onepage_skillvalue_6_skills]' => '87',
				'elementare_theme_options[_onepage_section_cta]' => '1',
				'elementare_theme_options[_onepage_phrase_cta]' => 'Do you want more?',
				'elementare_theme_options[_onepage_desc_cta]' => 'Take a look at Elementare PRO version...',
				'elementare_theme_options[_onepage_textbutton_cta]' => 'PRO Version',
				'elementare_theme_options[_onepage_urlbutton_cta]' => 'https://crestaproject.com/demo/elementare-pro/',
			),
			'nav_menus' => array(
				'primary' => array(
					'name' => __( 'Primary', 'elementare' ),
					'items' => array(
						'link_home',
						'page_blog',
					),
				),
			),
		) );
	}
endif;
add_action( 'after_setup_theme', 'elementare_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elementare_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elementare_content_width', 830 );
}
add_action( 'after_setup_theme', 'elementare_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elementare_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Classic Sidebar', 'elementare' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'elementare' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Push Sidebar', 'elementare' ),
		'id'            => 'sidebar-push',
		'description'   => esc_html__( 'Add widgets here.', 'elementare' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'elementare' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'elementare' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Center', 'elementare' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'elementare' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'elementare' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'elementare' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'elementare_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elementare_scripts() {
	wp_enqueue_style( 'elementare-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css', array(), '4.7.0');
	wp_enqueue_style( 'elementare-ie', get_template_directory_uri() . '/css/ie.css', array(), wp_get_theme()->get('Version'), null );
	wp_style_add_data( 'elementare-ie', 'conditional', 'IE' );
	$query_args = array(
		'family' => 'Niramit:400,700%7CKoHo:400,700'
	);
	wp_enqueue_style( 'elementare-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_script( 'elementare-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'elementare-custom', get_template_directory_uri() . '/js/jquery.elementare.js', array('jquery', 'jquery-effects-core'), wp_get_theme()->get('Version'), true );
	if ( is_active_sidebar( 'sidebar-push' ) ) {
		wp_enqueue_script( 'elementare-nanoScroll', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array('jquery'), '0.8.7', true );
	}
	if ( elementare_options('_smooth_scroll', '1') == 1) {
		wp_enqueue_script( 'elementare-smooth-scroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array('jquery'), '1.4.8', true );
	}
	if (is_page_template('template-onepage.php') && elementare_options('_onepage_section_slider', '') == 1) {
		wp_enqueue_script( 'elementare-flex-slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '2.7.1', true );
	}
	if (is_page_template('template-onepage.php')) {
		wp_enqueue_script( 'elementare-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), '4.0.1', true );
	}
	wp_enqueue_script( 'elementare-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/* Dequeue default WooCommerce Layout */
	wp_dequeue_style ( 'woocommerce-layout' );
	wp_dequeue_style ( 'woocommerce-smallscreen' );
	wp_dequeue_style ( 'woocommerce-general' );
}
add_action( 'wp_enqueue_scripts', 'elementare_scripts' );

function elementare_gutenberg_scripts() {
	wp_enqueue_style( 'elementare-gutenberg-css', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), array(), wp_get_theme()->get('Version') );
}
add_action( 'enqueue_block_editor_assets', 'elementare_gutenberg_scripts' );

/**
 * Define constants
 */
if ( ! function_exists( 'elementare_define_constants' ) ) :
	function elementare_define_constants() {
		/*
		 * Define the number of items in some onepage sections (real value plus 1)
		 */
		define( 'ELEMENTARE_VALUE_FOR_SLIDER', '4' );
		define( 'ELEMENTARE_VALUE_FOR_FEATURES', '5' );
		define( 'ELEMENTARE_VALUE_FOR_SKILLS', '7' );
		define( 'ELEMENTARE_VALUE_FOR_SERVICES', '7' );
		define( 'ELEMENTARE_VALUE_FOR_TEAM', '7' );
	}
	add_action( 'after_setup_theme', 'elementare_define_constants' );
endif;

/**
 * WooCommerce Support
 */
if ( ! function_exists( 'elementare_woocommerce_support' ) ) :
	function elementare_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
	}
	add_action( 'after_setup_theme', 'elementare_woocommerce_support' );
endif; // elementare_woocommerce_support

/**
 * WooCommerce: Chenge default max number of related products
 */
if ( function_exists( 'is_woocommerce' ) ) :
	if ( ! function_exists( 'elementare_related_products_args' ) ) :
		add_filter( 'woocommerce_output_related_products_args', 'elementare_related_products_args' );
		function elementare_related_products_args( $args ) {
			$args['posts_per_page'] = 3;
			return $args;
		}
	endif;
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load PRO Button in the customizer
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/pro-button/class-customize.php' );

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/elementare-admin-page.php';
}

/**
 * Settings for demo content import
 */
require get_template_directory() . '/inc/demo-import/demo-import-settings.php';