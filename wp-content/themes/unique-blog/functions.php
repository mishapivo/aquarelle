<?php
/**
 * Define the constant 
 */


/**
 * Unique Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Unique_Blog
 */

if ( ! function_exists( 'unique_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function unique_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Unique Blog, use a find and replace
		 * to change 'unique-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'unique-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );


		//Set a default header image and allow the site owner to upload other images:
		$args = array(
			'width'         => 1300,
			'height'        => 350,
		);
		add_theme_support( 'custom-header', $args );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'unique-blog' ),
		) );

		/**
		 * Registers an editor stylesheet for the theme.
		 */
		function unique_blog_add_editor_styles() {
			add_editor_style( 'unique-blog-style' );
		}
		add_action( 'admin_init', 'unique_blog_add_editor_styles' );

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
		add_theme_support( 'custom-background', apply_filters( 'unique_blog_custom_background_args', array(
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
			'height'      => 100,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'unique_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function unique_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'unique_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'unique_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function unique_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'unique-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'unique-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'unique_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function unique_blog_scripts() {

	//Theme Version Check
	$unique_blog = wp_get_theme();
	$theme_version = $unique_blog->get( 'Version' );

	//Google Fonts Enqueue
	$unique_blog_google_fonts_list = array('Quicksand','Dancing+Script');
	foreach(  $unique_blog_google_fonts_list as $google_font ){
		wp_enqueue_style( 'unique-blog-google-fonts-'.$google_font, '//fonts.googleapis.com/css?family='.$google_font.':300italic,400italic,700italic,400,700,300', false ); 
	}

	// style
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/fontawesome/css/font-awesome.min.css', array(), $theme_version );
	wp_enqueue_style( 'animation', get_template_directory_uri() . '/assets/library/animation/animate.css', array(), $theme_version );
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/assets/library/owl-carousel/css/owl.carousel.css', array(), $theme_version );
	wp_enqueue_style( 'unique-blog-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), $theme_version );
	wp_enqueue_style( 'unique-blog-style', get_stylesheet_uri() );

	
	//script
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'owl.carousel.js', get_template_directory_uri() . '/assets/library/owl-carousel/js/owl.carousel.js', array('jquery'), $theme_version, true );
	wp_enqueue_script( 'unique-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $theme_version, true );
	wp_enqueue_script( 'unique-blog', get_template_directory_uri() . '/assets/js/custom.js', array(), $theme_version, true );
	

	wp_enqueue_script( 'unique-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), $theme_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'unique_blog_scripts' );


/**
 * Limite the excerpt
 * 
 * @since 1.0.4
 */
function unique_blog_excerpt_length( $length ) {

	if(is_admin()){
		return $length;
	}

	return 20;
}
add_filter( 'excerpt_length', 'unique_blog_excerpt_length', 999 );



/**
 * Implement the Custom Controls  feature.
 */
require trailingslashit( get_template_directory() ) . 'themerelic/customizer/custom-controls/custom-control.php';
require trailingslashit( get_template_directory() ) . 'themerelic/customizer/customizer.php';


/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . 'themerelic/core/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'themerelic/core/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require trailingslashit( get_template_directory() ) . 'themerelic/core/template-functions.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . 'themerelic/core/customizer.php';

/**
 * Blog Functions
 */
require trailingslashit( get_template_directory() ) . 'themerelic/unique_blog_functions.php';

/**
 * Blog Functions
 */
require trailingslashit( get_template_directory() ) . 'themerelic/demo-import/demo-import.php';
require trailingslashit( get_template_directory() ) . 'themerelic/class-tgm-plugin-activation.php';


/**
 * Admin Page
 */
require trailingslashit( get_template_directory() ) . 'themerelic/admin/class-unique-blog-admin.php';
