<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'simple_days_admin_menu' ) ) :
	function simple_days_admin_menu() {
		add_theme_page( esc_html_x( 'Color' , 'dashboard' , 'simple-days'), esc_html_x( 'Color' , 'dashboard' , 'simple-days'), 'manage_options', 'customize.php?autofocus[panel]=simple_days_custom_colors' );
	}
endif;
add_action('admin_menu', 'simple_days_admin_menu');


if ( ! function_exists( 'simple_days_gutenberg_editor_styles' ) ) :
	
	function simple_days_gutenberg_editor_styles() {
		wp_enqueue_style( 'simple_days_gutenberg_editor_styles', SIMPLE_DAYS_THEME_URI . 'assets/css/gutenberg-editor-style.min.css',array( 'wp-edit-blocks' ) );
		wp_enqueue_style( 'simple_days_gutenberg_front_styles', SIMPLE_DAYS_THEME_URI . 'assets/css/gutenberg-front-one-column-style.min.css',array( 'wp-edit-blocks' ) );
		wp_enqueue_style('font-awesome4', SIMPLE_DAYS_THEME_URI . 'assets/fonts/fontawesome/style.min.css', array(), null);
	}
endif;
add_action( 'enqueue_block_editor_assets', 'simple_days_gutenberg_editor_styles' );

if ( ! function_exists( 'simple_days_add_quicktags' ) ) :
	function simple_days_add_quicktags() {

		get_template_part( 'inc/lib/add_quicktags' );

	}
endif;
add_action( 'admin_print_footer_scripts', 'simple_days_add_quicktags' );

if (function_exists('register_block_type')) {
	
}

if ( ! function_exists( 'simple_days_customizer_css' ) ) :
	
	function simple_days_customizer_css() {

		get_template_part( 'inc/customizer/customizer_css' );

	}
endif;
add_action( 'customize_controls_print_styles', 'simple_days_customizer_css' );

if ( ! function_exists( 'simple_days_customizer_script' ) ) :
	
	function simple_days_customizer_script() {

	}
endif;
add_action( 'customize_register', 'simple_days_customizer_script' );

if ( ! function_exists( 'simple_days_customize_preview' ) ) :
	function simple_days_customize_preview() {

	}
endif;
add_action( 'customize_preview_init', 'simple_days_customize_preview' );

if ( ! function_exists( 'simple_days_admin_enqueue_scripts' ) ) :
	function simple_days_admin_enqueue_scripts() {
		get_template_part( 'inc/lib/admin_enqueue_scripts' );
	}
endif;
add_action( 'admin_footer-post-new.php', 'simple_days_admin_enqueue_scripts' );
add_action( 'admin_footer-post.php', 'simple_days_admin_enqueue_scripts' );

// Displays plugin notices on admin backend
require_once SIMPLE_DAYS_THEME_DIR . 'inc/notice.php';

require_once SIMPLE_DAYS_THEME_DIR . 'inc/tgm/tgm.php';
