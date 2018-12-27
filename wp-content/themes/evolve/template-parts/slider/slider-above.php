<?php

/*
   Template: slider-above.php
   ======================================= */

global $evolve_frontpage_slider_status;
$evolve_frontpage_slider   = array();
$evolve_slideblock_class_1 = '<div class="header-block sliderblock">';
$evolve_slideblock_class_2 = '</div>';
$evolve_front_elements_header_area = evolve_theme_mod('evl_front_elements_header_area');
if ( $evolve_front_elements_header_area ) {
	$evolve_frontpage_slider = $evolve_front_elements_header_area;
}
if ( $evolve_frontpage_slider ):
	foreach ( $evolve_frontpage_slider as $sliderkey => $sliderval ) {		
		if ( $sliderval == 'bootstrap_slider' ) {
			echo $evolve_slideblock_class_1;
			evolve_frontpage_bootstrap_slider();
			echo $evolve_slideblock_class_2;
			$evolve_frontpage_slider_status['bootstrap'] = false;
		} elseif ( $sliderval == 'parallax_slider' ) {
			echo $evolve_slideblock_class_1;
			evolve_frontpage_parallax_slider();
			echo $evolve_slideblock_class_2;
			$evolve_frontpage_slider_status['parallax'] = false;
		} elseif ( $sliderval == 'posts_slider' ) {
			echo $evolve_slideblock_class_1;
			evolve_frontpage_post_slider();
			echo $evolve_slideblock_class_2;
			$evolve_frontpage_slider_status['posts'] = false;
		} elseif ( $sliderval == 'header' ) {
			break;
		}
	}
endif;

