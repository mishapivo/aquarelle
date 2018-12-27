<?php
function di_blog_inline_css() {
	$custom_css = "";

	// for load icon
	if( get_theme_mod( 'loading_icon', '0' ) == '1' ) {

		if( get_theme_mod( 'loading_icon_img' ) ) {
			$icon_link =  esc_url( get_theme_mod( 'loading_icon_img' ) );
		} else {
			$icon_link =  esc_url( get_template_directory_uri() . '/assets/images/dib-loader.gif' );
		}

		$custom_css .= "
		.load-icon {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999999;
			background: url( '" . $icon_link . "' ) center no-repeat #fff;
		}
		";
	}
	// for load icon END
	
	//for woo
	if( class_exists( 'WooCommerce' ) ) {
		$product_per_column = absint( get_theme_mod( 'product_per_column', '4' ) );
		if( $product_per_column == 2 ) {
			$custom_css .= "
			@media (min-width: 768px) {
				.woocommerce ul.products li.product, .woocommerce-page ul.products li.product {
					width: 46%;
				}
			}
			";
		}
		
		if( $product_per_column == 3 ) {
			$custom_css .= "
			@media (min-width: 768px) {
				.woocommerce ul.products li.product, .woocommerce-page ul.products li.product {
					width: 29%;
				}
			}
			";
		}
		
		if( $product_per_column == 4 ) {
			$custom_css .= "
			@media (min-width: 768px) {
				.woocommerce ul.products li.product, .woocommerce-page ul.products li.product {
					width: 22%;
				}
			}
			";
		}
		
		if( $product_per_column == 5 ) {
			$custom_css .= "
			@media (min-width: 768px) {
				.woocommerce ul.products li.product, .woocommerce-page ul.products li.product {
					width: 16.9%;
				}
			}
			";
		}
	}

	// masonry
	if( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid2c' ) {
		$custom_css .= "
		@media (min-width: 768px) {
		  .dimasonrybox {
		    width: 48%;
		    margin-right: 2% !important;
		  }
		}
		";
	} elseif( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid3c' ) {
		$custom_css .= "
		@media (min-width: 768px) {
		  .dimasonrybox {
		    width: 31%;
		    margin-right: 2% !important;
		  }
		}
		";
	} else {
		
	}

	wp_add_inline_style( 'di-blog-style-core', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'di_blog_inline_css' );
