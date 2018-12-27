<?php

// Global variables define
define('STACY_PARENT_TEMPLATE_DIR_URI',get_template_directory_uri());	
define('STACY_ST_TEMPLATE_DIR_URI',get_stylesheet_directory_uri());
define('STACY_ST_TEMPLATE_DIR',get_stylesheet_directory());

add_action('wp_enqueue_scripts', 'stacy_theme_css', 999);
function stacy_theme_css() {
    wp_enqueue_style( 'stacy-parent-style', STACY_PARENT_TEMPLATE_DIR_URI . '/style.css' );
	wp_enqueue_style('stacy-child-style',STACY_ST_TEMPLATE_DIR_URI . '/style.css',array('parent-style'));
	wp_enqueue_style('bootstrap', ST_TEMPLATE_DIR . '/css/bootstrap.css');
	wp_enqueue_style('stacy-default-style-css', STACY_ST_TEMPLATE_DIR_URI."/css/default.css" );
	wp_enqueue_style('stacy-theme-menu-style', STACY_ST_TEMPLATE_DIR_URI.'/css/theme-menu.css');
	wp_enqueue_style('stacy-media-responsive-css', STACY_ST_TEMPLATE_DIR_URI."/css/media-responsive.css" );
	wp_dequeue_style('stacy-default-css', STACY_PARENT_TEMPLATE_DIR_URI .'/css/default.css');   
}


if ( ! function_exists( 'stacy_theme_setup' ) ) :

function stacy_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('stacy', STACY_ST_TEMPLATE_DIR . '/languages');
require( STACY_ST_TEMPLATE_DIR . '/functions/customizer/customizer_general_settings.php' );
if ( is_admin() ) {
	require STACY_ST_TEMPLATE_DIR . '/admin/admin-init.php';
}
}
endif; 
add_action( 'after_setup_theme', 'stacy_theme_setup' );

/**
 * Import options from SpicePress
 *
 */
function stacy_get_lite_options() {
	$spicepress_mods = get_option( 'theme_mods_spicepress' );
	if ( ! empty( $spicepress_mods ) ) {
		foreach ( $spicepress_mods as $spicepress_mod_k => $spicepress_mod_v ) {
			set_theme_mod( $spicepress_mod_k, $spicepress_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'stacy_get_lite_options' );

add_action( 'admin_init', 'stacy_detect_button' );
	function stacy_detect_button() {
	wp_enqueue_style('stacy-info-button', STACY_ST_TEMPLATE_DIR_URI .'/css/import-button.css');
}
?>