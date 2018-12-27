<?php
/**
* Enqueue scripts and styles
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_scripts() {
    wp_enqueue_style('clean-grid-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );

    wp_enqueue_style('clean-grid-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700', array(), NULL);

    wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.js', array( 'jquery' ), NULL, true);

    $clean_grid_sticky_menu = TRUE;
    $clean_grid_sticky_sidebar = TRUE;

    wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.js', array( 'jquery' ), NULL, true);
    wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), NULL, true);

    wp_enqueue_script('clean-grid-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery' ), NULL, true);
    wp_localize_script( 'clean-grid-customjs', 'clean_grid_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'sticky_menu' => $clean_grid_sticky_menu,
            'sticky_sidebar' => $clean_grid_sticky_sidebar,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'clean_grid_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function clean_grid_ie_scripts() {
    wp_enqueue_script( 'html5shiv', get_template_directory_uri(). '/assets/js/html5shiv.js', array(), NULL, false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.js', array(), NULL, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'clean_grid_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function clean_grid_enqueue_customizer_styles() {
    wp_enqueue_style( 'clean-grid-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'clean_grid_enqueue_customizer_styles' );