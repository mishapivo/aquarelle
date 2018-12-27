<?php
/**
 * Meritorious (custom-header.php)
 *
 * @package     Meritorious
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 *  Table of Content
 *
 *  1.0 - Includes (Custom Header)
 *  2.0 - Includes (Custom Header Styles)
 */

/**
 *  1.0 - Includes (Custom Header)
 */
function meritorious_load_custom_header() {
	/**
	 * Enable add_theme_support( 'custom-header', $args );. This feature allows you to use custom header to display images.
	 */
	$args = array(
		'default-text-color' => 'ffffff',
		'default-image'      => get_theme_file_uri( '/assets/images/header-image.jpg' ),
		'height'             => 1200,
		'max-width'          => 2000,
		'width'              => 2000,
		'flex-height'        => false,
		'flex-width'         => false,
	);
	add_theme_support( 'custom-header', $args );
	register_default_headers(
		array(
			'header-image' => array(
				'url'           => '%s/assets/images/header-image.jpg',
				'thumbnail_url' => '%s/assets/images/header-image.jpg',
				'description'   => esc_html__( 'Header Image', 'meritorious' ),
			),
		)
	);
}
add_action( 'after_setup_theme', 'meritorious_load_custom_header' );

/**
 *  2.0 - Includes (Custom Header Styles)
 */
function meritorious_custom_header_styles_setup() {
	$text_color = get_header_textcolor();
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $text_color ) {
		return;
	}
	$value      = display_header_text() ? sprintf( 'color: #%s', esc_html( $text_color ) ) : 'display: none;';
	$custom_css = "
		.site-title a,
		.site-description {
			{$value}
		}
	";
	wp_add_inline_style( 'backdrop-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'meritorious_custom_header_styles_setup' );

/**
 *  2.0 - Includes (Custom Header Styles)
 */
function meritorious_header_image_inline_style_setup() {
	$header_image = esc_url( get_theme_mod( 'header_image', get_theme_file_uri( '/assets/images/header-image.jpg' ) ) );
	$custom_css   = "
		.site-header.header-image{
			background: url({$header_image});
			background-repeat: no-repeat;
			background-position: center;
		}
	";
	wp_add_inline_style( 'backdrop-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'meritorious_header_image_inline_style_setup' );
