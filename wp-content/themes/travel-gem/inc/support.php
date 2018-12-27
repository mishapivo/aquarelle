<?php
/**
 * Theme supports
 *
 * @package Travel_Gem
 */

// Load WooCommerce Support.
if ( class_exists( 'WooCommerce' ) ) :
	require_once get_template_directory() . '/inc/supports/woocommerce.php';
endif;
