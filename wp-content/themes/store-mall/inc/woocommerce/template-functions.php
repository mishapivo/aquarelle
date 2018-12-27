<?php
/**
 * Functions which enhance the woocommerce part of the theme by hooking into WordPress
 *
 * @package Moral
 */

if ( ! function_exists( 'store_mall_get_woo_page_link' ) ) {
	/**
	 * Get account page link.
	 */
	function store_mall_get_woo_page_link( $page_ ) {
		return get_permalink( wc_get_page_id( $page_ ) );
	}
}

if ( ! function_exists( 'store_mall_get_cart_link' ) ) {
	/**
	 * Get account page link.
	 */
	function store_mall_get_cart_link() { ?>
		<a class="cart-contents" href="<?php echo esc_url( store_mall_get_woo_page_link('cart') ); ?>"><?php echo store_mall_get_svg( array( 'icon' => 'cart' ) ); ?>
        	<span><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'store-mall' ), WC()->cart->get_cart_contents_count() ) );?> <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span></a>
        </a>
	<?php 
	}
}

if ( ! function_exists( 'store_mall_get_woo_product_cat' ) ) {
	/**
	 * Get product category listing
	 */
	function store_mall_get_woo_product_cat() {
		$args = array(
			'taxonomy'	 => 'product_cat',
		    'orderby'    => 'name',
		    'order'      => 'asc',
		    'hide_empty' => false,
		);
		 
		$choices = array( '' => esc_html__( '--Select--', 'store-mall' ) );
		$product_cats = get_terms( $args );
		foreach ( $product_cats as $product_cat ) {
			$id = $product_cat->term_id;
			$title = $product_cat->name;
			$choices[ $id ] = $title;
		}
		return $choices;
	}
}

if ( ! function_exists( 'store_mall_get_woo_product' ) ) {
	/**
	 * Get products listing
	 */
	function store_mall_get_woo_product() {
		$args = array(
			'posts_per_page' => -1,
		);
		 
		$choices = array( '' => esc_html__( '--Select--', 'store-mall' ) );
		$products = wc_get_products( $args );
		foreach ( $products as $product ) {
			$id = $product->get_id();
			$title = $product->get_name();
			$choices[ $id ] = $title;
		}
		return $choices;
	}
}

if ( ! function_exists( 'store_mall_get_cat_featured_img_url' ) ) {
	/**
	 * Get category featured image image.
	 */
	function store_mall_get_cat_featured_img_url( $cat_id ) {
		$thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true );
		$img_url = wp_get_attachment_url( $thumbnail_id );
		// If empty get placeholder image.
		if ( empty( $img_url ) ) {
			$img_url = wc_placeholder_img_src();
		}
		return $img_url;
	}
}

if ( ! function_exists( 'store_mall_if_is_woo_page' ) ) {
	/**
	 * Check if the page being displayed is woocommerce template.
	 */
	function store_mall_if_is_woo_page( $cat_id ) {
		if ( is_woocommerce() || is_shop() ||is_product_category() || is_product_tag() ||is_product() || is_cart() || is_checkout() || is_account_page() ) {
			return true;
		}

		return false;
	}
}