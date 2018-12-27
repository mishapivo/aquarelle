<?php
/**
 * Plugin widgets.
 *
 * @package Blogger_Era
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load widget.
require get_template_directory() . '/inc/widget/about/inc/widget.php';

/**
 * Register widget.
 *
 * @since 1.0.0
 */
function blogger_era_promo_init() {

	register_widget( 'Blogger_Era_Promo' );

}
add_action( 'widgets_init', 'blogger_era_promo_init' );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @param string $hook Hook.
 */
function blogger_era_promo_scripts( $hook ) {

	if ( 'widgets.php' !== $hook ) {
		return;
	}

	wp_enqueue_style( 'blogger-era-admin-css', get_template_directory_uri() . '/inc/widget/about/css/admin.css', array(), '1.0.0' );

	wp_enqueue_media();

	wp_enqueue_script( 'blogger-era-admin-js', get_template_directory_uri() . '/inc/widget/about/js/admin.js', array( 'jquery' ), '1.0.0' );

}
add_action( 'admin_enqueue_scripts', 'blogger_era_promo_scripts' );
