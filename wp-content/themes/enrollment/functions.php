<?php
/**
 * Enrollment functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

if ( ! function_exists( 'enrollment_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function enrollment_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Enrollment, use a find and replace
	 * to change 'enrollment' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'enrollment', get_template_directory() . '/languages' );

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
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 240,
		'flex-height' => true,
		'flex-width' => true,		
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Define custom image size
	 *
	 * @since 1.1.1
	 */
	add_image_size( 'enrollment-blog-medium', 600, 318, true );
	add_image_size( 'enrollment-blog-large', 1210, 642, true );
	add_image_size( 'enrollment-portfolio-medium', 500, 500, true );
	add_image_size( 'enrollment-team-medium', 300, 343, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'enrollment_primary_menu' => esc_html__( 'Primary Menu', 'enrollment' ),
		'enrollment_footer_menu' => esc_html__( 'Footer Menu', 'enrollment' ),
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
	add_theme_support( 'custom-background', apply_filters( 'enrollment_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'enrollment_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function enrollment_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'enrollment_content_width', 640 );
}
add_action( 'after_setup_theme', 'enrollment_content_width', 0 );

/**
 * Set the theme version, based on theme stylesheet.
 *
 * @global string $enrollment_version_info
 */
function enrollment_version_info() {
	$enrollment_version_info = wp_get_theme();
	$GLOBALS['enrollment_version'] = $enrollment_version_info->get( 'Version' );
}
add_action( 'after_setup_theme', 'enrollment_version_info', 0 );

/**
 * Added widget function for enrollment
 */
require get_template_directory() . '/inc/widgets/enrollment-widget-functions.php';

/**
 * Added new function for enrollment
 */
require get_template_directory() . '/inc/enrollment-functions.php';

/**
 * Added new file for enrollment custom hooks
 */
require get_template_directory() . '/inc/enrollment-hooks.php';

/**
 * Load files for metaboxes
 */
require get_template_directory() . '/inc/metaboxes/page-metabox.php';
require get_template_directory() . '/inc/metaboxes/post-metabox.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/cv-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';