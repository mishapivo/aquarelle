<?php
if( ! class_exists( 'WooCommerce' ) ) {
	return;
}


// Setup woo.
function di_blog_woo_setup() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'di_blog_woo_setup' );

// Woo gallery zoom, lightbox, slider Support
function di_blog_woo_features_support() {
	if( get_theme_mod( 'support_gallery_zoom', '1' ) == 1 ) {
		add_theme_support( 'wc-product-gallery-zoom' );
	}

	if( get_theme_mod( 'support_gallery_lightbox', '1' ) == 1 ) {
		add_theme_support( 'wc-product-gallery-lightbox' );
	}

	if( get_theme_mod( 'support_gallery_slider', '1' ) == 1 ) {
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'wp_loaded', 'di_blog_woo_features_support' );

// Enable / Disable related product base on setting.
function di_blog_related_product_handle() {
	if( get_theme_mod( 'display_related_prdkt', '1' ) == 0 ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}
}
add_action( 'wp_loaded', 'di_blog_related_product_handle' );

/**
 * Display order again button by default, and hide if set 0 in customize
 */
function di_blog_hide_woocommerce_order_again_button() {
	if( get_theme_mod( 'order_again_btn', '1' ) == '0' ) {
		remove_action( 'woocommerce_order_details_after_order_table', 'woocommerce_order_again_button' );
	}
}
add_action( 'wp_loaded', 'di_blog_hide_woocommerce_order_again_button' );

//product_per_page
function di_blog_product_per_page_func( $cols ) {
	$cols = absint( get_theme_mod( 'product_per_page', '12' ) );
	return $cols;
}
add_filter( 'loop_shop_per_page', 'di_blog_product_per_page_func', 20 );

// product_per_column + related_product_per_column.
function di_blog_loop_columns() {
	return absint( get_theme_mod( 'product_per_column', '4' ) );
}
add_filter('loop_shop_columns', 'di_blog_loop_columns');

function di_blog_related_products_args( $args ) {
	$args['posts_per_page'] = absint( get_theme_mod( 'product_per_column', '4' ) );
	//$args['columns'] = 1;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'di_blog_related_products_args' );
// product_per_column + related_product_per_column END.




