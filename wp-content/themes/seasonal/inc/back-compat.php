<?php
/**
 * Seasonal back compat functionality
 *
 * Prevents Seasonal from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 * Special thanks to the Seasonal Twenty Fifteen theme for this function.
 *
 * @package Seasonal
 */

/**
 * Prevent switching to Seasonal on old versions of WordPress.
 *
 * Switches to the default theme.
 */
 
function seasonal_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'seasonal_upgrade_notice' );
}
add_action( 'after_switch_theme', 'seasonal_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Seasonal on WordPress versions prior to 4.1.
 *
 * @since Seasonal 1.0
 */
function seasonal_upgrade_notice() {
	$message = sprintf( __( 'Seasonal requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'seasonal' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since Seasonal 1.0
 */
function seasonal_customize() {
	wp_die( sprintf( __( 'Seasonal requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'seasonal' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'seasonal_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since Seasonal 1.0
 */
function seasonal_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Seasonal requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'seasonal' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'seasonal_preview' );
