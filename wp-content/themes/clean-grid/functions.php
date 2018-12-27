<?php
/**
* Clean Grid functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

define( 'CLEAN_GRID_PROURL', 'https://themesdna.com/clean-grid-pro-wordpress-theme/' );
define( 'CLEAN_GRID_CONTACTURL', 'https://themesdna.com/contact/' );
define( 'CLEAN_GRID_THEMEOPTIONSDIR', get_template_directory() . '/inc/admin' );

require_once( CLEAN_GRID_THEMEOPTIONSDIR . '/customizer.php' );

function clean_grid_get_option($option) {
    $clean_grid_options = get_option('clean_grid_options');
    if ((is_array($clean_grid_options)) && (array_key_exists($option, $clean_grid_options))) {
        return $clean_grid_options[$option];
    }
    else {
        return '';
    }
}

if ( ! function_exists( 'clean_grid_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clean_grid_setup() {
    
    global $wp_version;

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Clean Grid, use a find and replace
     * to change 'clean-grid' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'clean-grid', get_template_directory() . '/languages' );

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
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'clean-grid-large-image',  1064, 9999, false );
        add_image_size( 'clean-grid-featured-image',  716, 9999, false );
        add_image_size( 'clean-grid-horizontal-image',  480, 360, true );
        add_image_size( 'clean-grid-square-image',  480, 480, true );
        add_image_size( 'clean-grid-vertical-image',  480, 640, true );
        add_image_size( 'clean-grid-hauto-image',  480, 9999, false );
        add_image_size( 'clean-grid-mini-image',  100, 100, true );
    }

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    'primary' => esc_html__('Primary Menu', 'clean-grid')
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    $markup = array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' );
    add_theme_support( 'html5', $markup );

    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 315,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Support for Custom Header
    add_theme_support( 'custom-header', apply_filters( 'clean_grid_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => '333333',
    'width'                  => 1090,
    'height'                 => 200,
    'flex-height'            => true,
        'wp-head-callback'       => 'clean_grid_header_style',
        'uploads'                => true,
    ) ) );

    // Set up the WordPress core custom background feature.
    $background_args = array(
            'default-color'          => 'dddddd',
            'default-image'          => get_template_directory_uri() .'/assets/images/background.png',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'     => 'auto',
            'default-attachment'     => 'fixed',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => 'admin_head_callback_func',
            'admin-preview-callback' => 'admin_preview_callback_func',
    );
    add_theme_support( 'custom-background', apply_filters( 'clean_grid_custom_background_args', $background_args) );
    
    // Support for Custom Editor Style
    add_editor_style( 'css/editor-style.css' );

}
endif;
add_action( 'after_setup_theme', 'clean_grid_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clean_grid_content_width() {
    $content_width = 716;

    if ( is_page_template( 'template-full-width-page.php' ) ) {
        $content_width = 1064;
    }
    if ( is_page_template( 'template-full-width-post.php' ) ) {
        $content_width = 1064;
    }
    if ( is_404() ) {
        $content_width = 1064;
    }

    $GLOBALS['content_width'] = apply_filters( 'clean_grid_content_width', $content_width );
}
add_action( 'template_redirect', 'clean_grid_content_width', 0 );

require_once get_template_directory() . '/inc/functions/enqueue-scripts.php';
require_once get_template_directory() . '/inc/functions/widgets-init.php';
require_once get_template_directory() . '/inc/functions/author-bio-box.php';
require_once get_template_directory() . '/inc/functions/postmeta.php';
require_once get_template_directory() . '/inc/functions/posts-navigation.php';
require_once get_template_directory() . '/inc/functions/menu.php';
require_once get_template_directory() . '/inc/functions/other.php';
require_once get_template_directory() . '/inc/admin/custom.php';