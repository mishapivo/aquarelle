<?php
/**
 * Backdrop Core (functions-site.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General PUblic License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Site;

/**
 * Table of Content
 *
 *  1.0 - General (Display Site Title)
 *  2.0 - General (Output Site Title)
 *  3.0 - General (Display Site Description)
 *  4.0 - General (Output Site Description)
 *  5.0 - General (Display Site Link)
 *  6.0 - General (Output Site Link)
 *  7.0 - General (Display WP Link)
 *  8.0 - General (Output WP Link)
 *  9.0 - General (Display Theme Link)
 * 10.0 - General (Output Theme Link)
 */

/**
 *  1.0 - General (Display Site Title)
 */
function display_site_title() {
	echo wp_kses_post( output_site_title() );
}

/**
 *  2.0 - General (Output Site Title)
 */
function output_site_title() {
	$site_title = get_bloginfo( 'name' );
	if ( $site_title ) {
		$site_title = sprintf( '<h1 class="site-title"><a href="%s">%s</a></h1>', esc_url( home_url( '/' ) ), $site_title );
	}
	return apply_filters( 'display_site_title', $site_title );
}

/**
 *  3.0 - General (Display Site Description)
 */
function display_site_description() {
	echo wp_kses_post( output_site_description() );
}

/**
 *  4.0 - General (Output Site Description)
 */
function output_site_description() {
	$site_description = get_bloginfo( 'description' );
	if ( $site_description ) {
		$site_description = sprintf( '<h3 class="site-description">%s</h3>', $site_description );
	}
	return apply_filters( 'display_site_description', $site_description );
}

/**
 *  5.0 - General (Display Site Link)
 */
function display_site_link() {
	echo wp_kses_post( output_site_link() );
}

/**
 *  6.0 - General (Output Site Link)
 */
function output_site_link() {
	return sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ) );
}

/**
 *  7.0 - General (Display WP Link)
 */
function display_wp_link() {
	echo wp_kses_post( output_wp_link() );
}

/**
 *  8.0 - General (Output WP Link)
 */
function output_wp_link() {
	return sprintf( '<a href="%s">%s</a>', esc_url( __( 'https://wordpress.org', 'meritorious' ) ), esc_html__( 'WordPress', 'meritorious' ) );
}

/**
 *  9.0 - General (Display Theme Link)
 */
function display_theme_link() {
	echo wp_kses_post( output_theme_link() );
}

/**
 * 10.0 - General (Output Theme Link)
 */
function output_theme_link() {
	$theme_name = wp_get_theme( get_template() );
	$allowed    = array(
		'abbr'    => array( 'title' => true ),
		'acronym' => array( 'title' => true ),
		'code'    => true,
		'em'      => true,
		'strong'  => true,
	);
	return sprintf( '<a href="%s">%s</a>', $theme_name->display( 'ThemeURI' ), wp_kses( $theme_name->display( 'Name' ), $allowed ) );
}
