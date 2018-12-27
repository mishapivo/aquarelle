<?php
/**
 * IWeb Pathology functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IWeb_Pathology
 */

if ( ! function_exists( 'iweb_pathology_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function iweb_pathology_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on IWeb pathology, use a find and replace
		 * to change 'iweb-pathology' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'iweb-pathology', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'iweb-pathology' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'iweb_pathology_custom_background_args', array(
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
endif;
add_action( 'after_setup_theme', 'iweb_pathology_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function iweb_pathology_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'iweb_pathology_content_width', 640 );
}
add_action( 'after_setup_theme', 'iweb_pathology_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function iweb_pathology_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'iweb-pathology' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'iweb-pathology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'iweb-pathology' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'iweb-pathology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget-1', 'iweb-pathology' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'iweb-pathology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget-2', 'iweb-pathology' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'iweb-pathology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget-3', 'iweb-pathology' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'iweb-pathology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget-4', 'iweb-pathology' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'iweb-pathology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'iweb_pathology_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function iweb_pathology_scripts() {
	wp_enqueue_style( 'iweb_pathology-style', get_stylesheet_uri() );

	wp_enqueue_style( 'iweb_pathology-main', get_theme_file_uri( '/inc/css/main.css' ), array( 'iweb_pathology-style' ), '0.0.1' );
	wp_enqueue_style( 'iweb_pathology-animation', get_theme_file_uri( '/inc/css/animation.css' ), array( 'iweb_pathology-style' ), '0.0.1' );
	wp_enqueue_style( 'iweb_pathology-slick', get_theme_file_uri( '/inc/css/islick.css' ), array( 'iweb_pathology-style' ), '0.0.1' );

	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/inc/css/font-awesome.min.css' );

	wp_enqueue_script( 'iweb_pathology', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20160909', true );
	wp_enqueue_script( 'iweb_pathology-smoothscrool', get_template_directory_uri() . '/js/smoothscrool.js', array( 'jquery' ), '1.0.14', true );
	wp_enqueue_script( 'iweb_pathology-fixedh', get_template_directory_uri() . '/js/fixed.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'iweb_pathology-islick-js', get_template_directory_uri() . '/js/islick.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'iweb_pathology-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'iweb_pathology_scripts' );

add_action( 'wp_enqueue_scripts', 'iweb_pathology_my_google_font' );

function iweb_pathology_my_google_font() {
	wp_enqueue_style( 'iweb_pathology_my-google-font', 'https://fonts.googleapis.com/css?family=Domine:700|PT+Sans', false );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
require get_template_directory() . '/inc/class-iwebpatho-wp-customize-category-control.php';

/**
 * Load Custom css classes file.
 */
require get_template_directory() . '/inc/iwebpathology-custom-classes.php';

/**
 * Load Custom Sanitizer file.
 */
require get_template_directory() . '/inc/iwebpathology-sanitizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function iweb_pathology_breadcrumb() {

	echo '<a href=" ' . esc_url( home_url() ) . ' " rel="nofollow">' . esc_html__( 'Home', 'iweb-pathology' ) . '</a>';

	if ( is_category() || is_single() ) {
		echo '&nbsp;&nbsp;&#187;&nbsp;&nbsp;';
		the_category( ' &bull; ' );
		if ( is_single() ) {
			echo ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ';
				the_title();
		}
	} elseif ( is_page() ) {
		echo '&nbsp;&nbsp;&#187;&nbsp;&nbsp;';
		echo the_title();
	} elseif ( is_search() ) {
		echo esc_html__( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ', 'iweb-pathology' );
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}

function iweb_pathology_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 250;
}

function iweb_pathology_custom_excerpt_length_short( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 30;
}

function iweb_pathology_custom_excerpt_length_others( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 55;
}

function iweb_pathology_change_link_excerpt( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return ' .....';

}




