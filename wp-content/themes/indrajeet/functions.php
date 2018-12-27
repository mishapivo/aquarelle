<?php
/**
 * Indrajeet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Indrajeet
 */


// Core Constants
define( 'INDRAJEET_THEME_DIR', get_template_directory() );
define( 'INDRAJEET_THEME_URI', get_template_directory_uri() );


class INDRAJEET_Theme_Class{


	/**
	 * Main Theme Class Constructor
	 *
	 * @since   1.0.0
	 */
	public function __construct() {

		// Define constants
		add_action( 'after_setup_theme', array( 'INDRAJEET_Theme_Class', 'constants' ), 0 );

		// Load all core theme function files
		add_action( 'after_setup_theme', array( 'INDRAJEET_Theme_Class', 'include_functions' ), 1 );

		// Setup theme => add_theme_support, register_nav_menus, load_theme_textdomain, etc
		add_action( 'after_setup_theme', array( 'INDRAJEET_Theme_Class', 'indrajeet_setup' ), 10 );

		// register sidebar widget areas
		add_action( 'widgets_init', array( 'INDRAJEET_Theme_Class', 'register_sidebars' ) );

		if( is_admin() ){

			// Load scripts in the WP admin
			add_action( 'admin_enqueue_scripts', array( 'INDRAJEET_Theme_Class', 'admin_scripts' ) );

		} else {

			// Load theme CSS
			add_action( 'wp_enqueue_scripts', array( 'INDRAJEET_Theme_Class', 'theme_css' ) );

			// Add meta viewport tag to header
			add_action( 'wp_head', array( 'INDRAJEET_Theme_Class', 'meta_viewport' ), 1 );

			// Load theme js
			add_action( 'wp_enqueue_scripts', array( 'INDRAJEET_Theme_Class', 'theme_js' ) );

			// Minify the WP custom CSS because WordPress doesn't do it by default
			add_filter( 'wp_get_custom_css', array( 'INDRAJEET_Theme_Class', 'minify_custom_css' ) );

			// Alter tagcloud widget to display all tags with 1em font size
			add_filter( 'widget_tag_cloud_args', array( 'INDRAJEET_Theme_Class', 'widget_tag_cloud_args' ) );

			// Alter WP categories widget to display count inside a span
			add_filter( 'wp_list_categories', array( 'INDRAJEET_Theme_Class', 'wp_list_categories_args' ) );

			//add class to main container acording to the sidebar active
			add_filter( 'wp_content_area_size', array( 'INDRAJEET_Theme_Class', 'getMainColumnSize' ) );

		}

	}	
	/**
	 * Define Constants
	 *
	 * @since   0.0.3
	 */
	public static function constants() {

		$version = self::theme_version();

		// Theme version
		define( 'INDRAJEET_THEME_VERSION', $version );

		// Javascript and CSS Paths
		define( 'INDRAJEET_JS_DIR_URI', INDRAJEET_THEME_URI .'/js/' );

		// Include Paths
		define( 'INDRAJEET_INC_DIR', INDRAJEET_THEME_DIR .'/inc/' );
		define( 'INDRAJEET_INC_DIR_URI', INDRAJEET_THEME_URI .'/inc/' );
	}


	/**
	 * Load core theme function files
	 *
	 * @since 0.0.3
	 */
	public static function include_functions() {
		$dir = INDRAJEET_INC_DIR;
		require_once ( $dir .'load.php' );
	}

	/**
	 * Returns current theme version
	 *
	 * @since   0.0.3
	 */
	public static function theme_version() {

		// Get theme data
		$theme = wp_get_theme();

		// Return theme version
		return $theme->get( 'Version' );

	}

	/**
	 * Theme Setup
	 *
	 * @since   0.0.3
	 */
	public static function indrajeet_setup() {
		
		// Load text domain
		load_theme_textdomain( 'indrajeet', INDRAJEET_THEME_DIR . '/languages' );


		// Get globals
		global $content_width;

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );


		// Set content width based on theme's default design
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}



		// Configurations ----------------------------------------------------------------------------
		// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
		if (!isset($indrajeet_sidebar_left_size)) {
		    $indrajeet_sidebar_left_size = 3;
		}
		// Right sidebar column size.
		if (!isset($indrajeet_sidebar_right_size)) {
		    $indrajeet_sidebar_right_size = 3;
		}
		// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
		// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
		// 
		// Title separator. Please note that this value maybe able overriden by other plugins.
		if (!isset($indrajeet_title_separator)) {
		    $indrajeet_title_separator = '|';
		}





		// Register navigation menus
		register_nav_menus( array(
			'topbar_menu'     => esc_html__( 'Top Bar', 'indrajeet' ),
			'social_menu'     => esc_html__( 'Social Menu', 'indrajeet' ),
			'primary-menu' => esc_html__( 'Primary', 'indrajeet' ),
			'footer_menu'     => esc_html__( 'Footer', 'indrajeet' )

		) );

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

		
		/**
		 * Enable support for header image
		 */
		add_theme_support( 'custom-header', apply_filters( 'indrajeet_custom_header_args', array(
			'width'              => 2000,
			'height'             => 1200,
			'flex-height'        => true,
			'video'              => true,
		) ) );
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'indrajeet_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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

	/**
	 * Adds the meta tag to the site header
	 *
	 * @since 0.0.3
	 */
	public static function meta_viewport() {

		// Meta viewport
		$viewport = '<meta name="viewport" content="width=device-width, initial-scale=1">';

		// Apply filters for child theme tweaking
		echo apply_filters( 'indrajeet_meta_viewport', $viewport );

	}

	/**
	 * Load scripts in the WP admin
	 *
	 * @since 0.0.3
	 */
	public static function admin_scripts() {
		global $pagenow;
		if ( 'nav-menus.php' == $pagenow ) {
			wp_enqueue_script( 'indrajeet-menus', INDRAJEET_JS_DIR_URI .'jquery.smartmenu.js' );
		}
	}

	/**
	 * Load front-end scripts
	 *
	 * @since   0.0.3
	 */
	public static function theme_css() {

		// Define dir
		$theme_version =INDRAJEET_THEME_VERSION;


		wp_enqueue_style( 'indrajeet-style', get_stylesheet_uri() );

		wp_enqueue_style( 'indrajeet-josefin-sans-font-css', 'https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700' );		
	}

	/**
	 * Returns all js needed for the front-end
	 *
	 * @since 0.0.3
	 */
	public static function theme_js() {

		// Get js directory uri
		$dir =INDRAJEET_JS_DIR_URI;

		// Get current theme version
		$theme_version =INDRAJEET_THEME_VERSION;

		wp_enqueue_script( 'indrajeet-navigation', $dir . 'navigation.js', array(), '20151215', true );

		wp_enqueue_script( 'indrajeet-skip-link-focus-fix', $dir . 'skip-link-focus-fix.js', array(), '20151215', true );

		wp_enqueue_script( 'indrajeet-js', $dir . 'bootstrap-material-design.js', array('jquery'), '4.1.1', true );

		wp_enqueue_script( 'jquery-smart-menu-script', $dir . 'jquery.smartmenus.js', array( 'jquery' ), '1.1.0', true );

		wp_enqueue_script( 'indrajeet-theme-script', $dir . 'theme-script.js', array( 'indrajeet-js' ), $theme_version, true );

		// Comment reply
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Registers sidebars
	 *
	 * @since   0.0.3
	 */
	public static function register_sidebars() {

		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar', 'indrajeet' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'indrajeet' ),
			'before_widget' => '<section id="%1$s" class="widget card %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title card-header">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar', 'indrajeet' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'indrajeet' ),
			'before_widget' => '<section id="%1$s" class="widget card %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title card-header">',
			'after_title'   => '</h4>',
		) );
		// Search Results Sidebar
		if ( get_theme_mod( 'indrajeet_search_custom_sidebar', true ) ) {
			register_sidebar( array(
				'name'			=> esc_html__( 'Search Results Sidebar', 'indrajeet' ),
				'id'			=> 'search_sidebar',
				'description'	=> esc_html__( 'Widgets in this area are used in the search result page.', 'indrajeet' ),
				'before_widget'	=> '<section id="%1$s" class="widget card %2$s">',
				'after_widget'	=> '</section>',
				'before_title'	=> '<h4 class="widget-title card-header">',
				'after_title'	=> '</h4>',
			) );
		}

		$args = array(
			'name'          => esc_html__( 'Footer Widget %s', 'indrajeet' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'indrajeet' ),
			'before_widget' => '<section id="%1$s" class="widget card %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title card-header">',
			'after_title'   => '</h2>',
		);
		register_sidebars( 4, $args );

	}

	/**
	 * Minify the WP custom CSS because WordPress doesn't do it by default.
	 *
	 * @since 0.0.3
	 */
	public static function minify_custom_css( $css ) {

		return indrajeet_minify_css( $css );

	}

	/**
	 * Alters the default WordPress tag cloud widget arguments.
	 * Makes sure all font sizes for the cloud widget are set to 1em.
	 *
	 * @since 0.0.3
	 */
	public static function widget_tag_cloud_args( $args ) {
		$args['largest']  = '0.923em';
		$args['smallest'] = '0.923em';
		$args['unit']     = 'em';
		return $args;
	}

	/**
	 * Alter wp list categories arguments.
	 * Adds a span around the counter for easier styling.
	 *
	 * @since 0.0.3
	 */
	public static function wp_list_categories_args( $links ) {
		$links = str_replace( '</a> (', '</a> <span class="cat-count-span">(', $links );
		$links = str_replace( ' )', ' )</span>', $links );
		return $links;
	}
}


$indrajeet_theme_class = new INDRAJEET_Theme_Class;
