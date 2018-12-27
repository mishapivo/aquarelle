<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('travel_way_sidebar_selection') ) :
	function travel_way_sidebar_selection( ) {
		wp_reset_postdata();
		$travel_way_customizer_all_values = travel_way_get_theme_options();
		global $post;
		if(
			isset( $travel_way_customizer_all_values['travel-way-single-sidebar-layout'] ) &&
			(
				'left-sidebar' == $travel_way_customizer_all_values['travel-way-single-sidebar-layout'] ||
				'both-sidebar' == $travel_way_customizer_all_values['travel-way-single-sidebar-layout'] ||
				'middle-col' == $travel_way_customizer_all_values['travel-way-single-sidebar-layout'] ||
				'no-sidebar' == $travel_way_customizer_all_values['travel-way-single-sidebar-layout']
			)
		){
			$travel_way_body_global_class = $travel_way_customizer_all_values['travel-way-single-sidebar-layout'];
		}
		else{
			$travel_way_body_global_class= 'right-sidebar';
		}

		if ( travel_way_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'travel_way_sidebar_layout', true );
				$travel_way_wc_single_product_sidebar_layout = $travel_way_customizer_all_values['travel-way-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$travel_way_body_classes = $post_class;
					} else {
						$travel_way_body_classes = $travel_way_wc_single_product_sidebar_layout;
					}
				}
				else{
					$travel_way_body_classes = $travel_way_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $travel_way_customizer_all_values['travel-way-wc-shop-archive-sidebar-layout'] ) ){
					$travel_way_archive_sidebar_layout = $travel_way_customizer_all_values['travel-way-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $travel_way_archive_sidebar_layout ||
						'left-sidebar' == $travel_way_archive_sidebar_layout ||
						'both-sidebar' == $travel_way_archive_sidebar_layout ||
						'middle-col' == $travel_way_archive_sidebar_layout ||
						'no-sidebar' == $travel_way_archive_sidebar_layout
					){
						$travel_way_body_classes = $travel_way_archive_sidebar_layout;
					}
					else{
						$travel_way_body_classes = $travel_way_body_global_class;
					}
				}
				else{
					$travel_way_body_classes= $travel_way_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $travel_way_customizer_all_values['travel-way-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $travel_way_customizer_all_values['travel-way-front-page-sidebar-layout'] ||
					'left-sidebar' == $travel_way_customizer_all_values['travel-way-front-page-sidebar-layout'] ||
					'both-sidebar' == $travel_way_customizer_all_values['travel-way-front-page-sidebar-layout'] ||
					'middle-col' == $travel_way_customizer_all_values['travel-way-front-page-sidebar-layout'] ||
					'no-sidebar' == $travel_way_customizer_all_values['travel-way-front-page-sidebar-layout']
				){
					$travel_way_body_classes = $travel_way_customizer_all_values['travel-way-front-page-sidebar-layout'];
				}
				else{
					$travel_way_body_classes = $travel_way_body_global_class;
				}
			}
			else{
				$travel_way_body_classes= $travel_way_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'travel_way_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$travel_way_body_classes = $post_class;
				} else {
					$travel_way_body_classes = $travel_way_body_global_class;
				}
			}
			else{
				$travel_way_body_classes = $travel_way_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $travel_way_customizer_all_values['travel-way-archive-sidebar-layout'] ) ){
				$travel_way_archive_sidebar_layout = $travel_way_customizer_all_values['travel-way-archive-sidebar-layout'];
				if(
					'right-sidebar' == $travel_way_archive_sidebar_layout ||
					'left-sidebar' == $travel_way_archive_sidebar_layout ||
					'both-sidebar' == $travel_way_archive_sidebar_layout ||
					'middle-col' == $travel_way_archive_sidebar_layout ||
					'no-sidebar' == $travel_way_archive_sidebar_layout
				){
					$travel_way_body_classes = $travel_way_archive_sidebar_layout;
				}
				else{
					$travel_way_body_classes = $travel_way_body_global_class;
				}
			}
			else{
				$travel_way_body_classes= $travel_way_body_global_class;
			}
		}
		else {
			$travel_way_body_classes = $travel_way_body_global_class;
		}
		return $travel_way_body_classes;
	}
endif;