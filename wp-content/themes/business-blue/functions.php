<?php

/**
 * [business_blue_styles description]
 * @return [type] [description]
 */
function business_blue_styles() {
	// Parent theme CSS.
    wp_enqueue_style( 'di-business-style-default', get_template_directory_uri() . '/style.css' );

    // This child theme css.
    wp_enqueue_style( 'business-blue-style',  get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap', 'font-awesome', 'di-business-style-default', 'di-business-style-core' ), wp_get_theme()->get('Version'), 'all');
}
add_action( 'wp_enqueue_scripts', 'business_blue_styles' );

/**
 * [business_blue_default_a_color description]
 * @param  [type] $default_a_color [description]
 * @return [type]                  [description]
 */
function business_blue_default_a_color( $default_a_color ) {
	$default_a_color = '#3500c5';
	return $default_a_color;
}
add_filter( 'di_business_default_a_color', 'business_blue_default_a_color' );

/**
 * [business_blue_woo_onsale_lbl_bg_clr description]
 * @param  [type] $woo_onsale_lbl_bg_clr [description]
 * @return [type]                        [description]
 */
function business_blue_woo_onsale_lbl_bg_clr( $woo_onsale_lbl_bg_clr ) {
	$woo_onsale_lbl_bg_clr = '#3500c5';
	return $woo_onsale_lbl_bg_clr;
}
add_filter( 'di_business_woo_onsale_lbl_bg_clr', 'business_blue_woo_onsale_lbl_bg_clr' );

