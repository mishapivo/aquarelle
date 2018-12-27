<?php

/*
   Template: slider-below.php
   ======================================= */

global $evolve_options, $evolve_frontpage_slider_status;
$evolve_frontpage_slider = array();
$evolve_front_elements_header_area = evolve_theme_mod('evl_front_elements_header_area');
if ( $evolve_front_elements_header_area  ) {
	$evolve_frontpage_slider = $evolve_front_elements_header_area;
}

if ( $evolve_frontpage_slider ):
	foreach ( $evolve_frontpage_slider as $sliderkey => $sliderval ) {
		switch ( $sliderval ) {
			case 'bootstrap_slider':
				if ( $sliderval && ! isset( $evolve_frontpage_slider_status['bootstrap'] ) ) {
					evolve_frontpage_bootstrap_slider();
				}
				break;
			case 'parallax_slider':
				if ( $sliderval && ! isset( $evolve_frontpage_slider_status['parallax'] ) ) {
					evolve_frontpage_parallax_slider();
				}
				break;
			case 'posts_slider':
				if ( $sliderval && ! isset( $evolve_frontpage_slider_status['posts'] ) ) {
					evolve_frontpage_post_slider();
				}
				break;
		}
	}
endif;



