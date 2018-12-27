<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'travel_way_featured_slider' ) ) :

    function travel_way_featured_slider() {
        global $travel_way_customizer_all_values;

        $travel_way_enable_feature = $travel_way_customizer_all_values['travel-way-enable-feature'];
        if( is_front_page() && 1 == $travel_way_enable_feature && !is_home() ) :
	        do_action( 'travel_way_action_feature_slider' );
        endif;
    }
endif;
add_action( 'travel_way_action_front_page', 'travel_way_featured_slider', 10 );

if ( ! function_exists( 'travel_way_front_page' ) ) :

    function travel_way_front_page() {
        global $travel_way_customizer_all_values;

        $travel_way_hide_front_page_content = $travel_way_customizer_all_values['travel-way-hide-front-page-content'];

        /*show widget in front page, now user are not force to use front page*/
        if( is_active_sidebar( 'travel-way-home' ) && !is_home() ){
            dynamic_sidebar( 'travel-way-home' );
        }
        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        else {
            if( 1 != $travel_way_hide_front_page_content ){
                include( get_page_template() );
            }
        }
    }
endif;
add_action( 'travel_way_action_front_page', 'travel_way_front_page', 20 );