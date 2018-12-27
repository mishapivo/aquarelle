<?php
if ( ! function_exists( 'travel_way_posts_navigation' ) ) :
	/**
	 * Post navigation
	 *
	 * @since Travel Way 1.0.0
	 *
	 * @return void
	 */
	function travel_way_posts_navigation() {
		global $travel_way_customizer_all_values;
		$travel_way_pagination_option = $travel_way_customizer_all_values['travel-way-pagination-option'];
		if( 'default' == $travel_way_pagination_option ){
			// Previous/next page navigation.
			the_posts_navigation();
		}
		else {
			// Previous/next page navigation.
			the_posts_pagination();
		}
	}
endif;
add_action( 'travel_way_action_posts_navigation', 'travel_way_posts_navigation' );

/**
 * Feature Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('travel_way_featured_image_display') ) :
	function travel_way_featured_image_display( ) {
		global $travel_way_customizer_all_values;
		$travel_way_single_image_layout = $travel_way_customizer_all_values['travel-way-single-img-size'];

		return $travel_way_single_image_layout;
	}
endif;