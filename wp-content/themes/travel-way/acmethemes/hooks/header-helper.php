<?php
/**
 * Display Social Links
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('travel_way_social_links') ) :

    function travel_way_social_links( ) {

        global $travel_way_customizer_all_values;
        $travel_way_social_data = json_decode( $travel_way_customizer_all_values['travel-way-social-data'] );
        if( is_array( $travel_way_social_data )){
            echo '<ul class="socials at-display-inline-block">';
	        foreach ( $travel_way_social_data as $social_data ){
		        $icon = $social_data->icon;
		        $link = $social_data->link;
		        $checkbox = $social_data->checkbox;
		        echo '<li>';
		        echo '<a href="'.esc_url( $link ).'" target="'.($checkbox == 1? '_blank':'').'">';
		        echo '<i class="fa '.esc_attr( $icon ).'"></i>';
		        echo '</a>';
		        echo '</li>';
	        }
	        echo '</ul>';
        }
    }
endif;
add_action( 'travel_way_action_social_links', 'travel_way_social_links', 10 );

if ( !function_exists('travel_way_action_top_menu') ) :

	function travel_way_action_top_menu( ) {
		echo "<div class='at-first-level-nav at-display-inline-block text-right'>";
		wp_nav_menu(
			array(
				'theme_location' => 'top-menu',
				'container' => false,
				'depth' => 1
			)
		);
		echo "</div>";
	}
endif;
add_action( 'travel_way_action_top_menu', 'travel_way_action_top_menu', 10 );