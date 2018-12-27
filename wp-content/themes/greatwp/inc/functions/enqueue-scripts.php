<?php
/**
* Enqueue scripts and styles
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function greatwp_scripts() {
    wp_enqueue_style('greatwp-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('greatwp-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700', array(), NULL);
    wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', array( 'jquery' ), NULL, true);

    $greatwp_sticky_menu = TRUE;
    $greatwp_sticky_mobile_menu = TRUE;
    if ( !greatwp_get_option('enable_sticky_mobile_menu') ) {
        $greatwp_sticky_mobile_menu = FALSE;
    }

    $greatwp_sticky_sidebar = TRUE;
    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $greatwp_sticky_sidebar = FALSE;
    }
    if ( is_404() ) {
        $greatwp_sticky_sidebar = FALSE;
    }
    if ( $greatwp_sticky_sidebar ) {
        wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), NULL, true);
    }

    wp_enqueue_script('greatwp-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery' ), NULL, true);
    wp_localize_script( 'greatwp-customjs', 'greatwp_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'sticky_menu' => $greatwp_sticky_menu,
            'sticky_menu_mobile' => $greatwp_sticky_mobile_menu,
            'sticky_sidebar' => $greatwp_sticky_sidebar,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'greatwp_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function greatwp_ie_scripts() {
    wp_enqueue_script( 'html5shiv', get_template_directory_uri(). '/assets/js/html5shiv.min.js', array(), NULL, false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.min.js', array(), NULL, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'greatwp_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function greatwp_enqueue_customizer_styles() {
    wp_enqueue_style( 'greatwp-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'greatwp_enqueue_customizer_styles' );