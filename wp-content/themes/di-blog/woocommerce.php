<?php
get_header();

// is_product - Returns true when viewing a single product.
if( is_product() ) {

	// Layout for single product page.
	$woo_layout = esc_attr( get_theme_mod( 'woo_singleprod_layout', 'fullw' ) );
	if( $woo_layout == 'rights' ) {
		$woo_pre_cls = 'col-md-8';
	} elseif( $woo_layout == 'lefts' ) { 
		$woo_pre_cls = 'col-md-8 layoutleftsidebar'; 
	} else { 
		$woo_pre_cls = 'col-md-12'; 
	}
	?>
	<div class="<?php echo $woo_pre_cls; ?>" >
		<?php woocommerce_content(); ?>
	</div>

	<?php
	if( $woo_layout == 'rights' || $woo_layout == 'lefts' ) {
		get_sidebar( 'shop' );
	}

} else {

	// Layout for shop / loop product page.
	$woo_layout = esc_attr( get_theme_mod( 'woo_layout', 'fullw' ) );
	if( $woo_layout == 'rights' ) {
		$woo_pre_cls = 'col-md-8';
	} elseif( $woo_layout == 'lefts' ) { 
		$woo_pre_cls = 'col-md-8 layoutleftsidebar'; 
	} else { 
		$woo_pre_cls = 'col-md-12'; 
	}
	?>
	<div class="<?php echo $woo_pre_cls; ?>" >
		<?php woocommerce_content(); ?>
	</div>

	<?php
	if( $woo_layout == 'rights' || $woo_layout == 'lefts' ) {
		get_sidebar( 'shop' );
	}

}


get_footer();
?>
