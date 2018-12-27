<?php

if ( ( ( ( is_front_page() && is_page() ) || is_home() ) && evolve_theme_mod( 'evl_header_widgets_placement', 'home' ) == "home" ) || ( is_single() && evolve_theme_mod( 'evl_header_widgets_placement', 'home' ) == "single" ) || ( is_page() && evolve_theme_mod( 'evl_header_widgets_placement', 'home' ) == "page" ) || ( evolve_theme_mod( 'evl_header_widgets_placement', 'home' ) == "all" ) || ( get_post_meta( get_queried_object_id(), 'evolve_widget_page', true ) == "yes" && evolve_theme_mod( 'evl_header_widgets_placement', 'home' ) == "custom" ) ) {

	if ( evolve_theme_mod( 'evl_widgets_header', 'disable' ) == "" || evolve_theme_mod( 'evl_widgets_header', 'disable' ) == "disable" ) {

	} else {

		$evolve_header_widgets_css    = '';
		$evolve_widgets_header_number = 1;

		if ( evolve_theme_mod( 'evl_widgets_header', 'disable' ) == "one" ) {
			$evolve_header_widgets_css    = '<div class="col">';
			$evolve_widgets_header_number = 1;
		}

		if ( evolve_theme_mod( 'evl_widgets_header', 'disable' ) == "two" ) {
			$evolve_header_widgets_css    = '<div class="col-sm-12 col-md-6">';
			$evolve_widgets_header_number = 2;
		}

		if ( evolve_theme_mod( 'evl_widgets_header', 'disable' ) == "three" ) {
			$evolve_header_widgets_css    = '<div class="col-sm-12 col-md-6 col-lg-4">';
			$evolve_widgets_header_number = 3;
		}

		if ( evolve_theme_mod( 'evl_widgets_header', 'disable' ) == "four" ) {
			$evolve_header_widgets_css    = '<div class="col-sm-12 col-md-6 col-xl-3">';
			$evolve_widgets_header_number = 4;
		}

		echo '<div class="container header-widgets"><div class="row">';
		if ( $evolve_widgets_header_number >= 1 && is_active_sidebar( 'header' ) ) {
			echo $evolve_header_widgets_css;
			dynamic_sidebar( 'header' );
			echo '</div>';
		}

		if ( $evolve_widgets_header_number >= 2 && is_active_sidebar( 'header-2' ) ) {
			echo $evolve_header_widgets_css;
			dynamic_sidebar( 'header-2' );
			echo '</div>';
		}

		if ( $evolve_widgets_header_number >= 3 && is_active_sidebar( 'header-3' ) ) {
			echo $evolve_header_widgets_css;
			dynamic_sidebar( 'header-3' );
			echo '</div>';
		}

		if ( $evolve_widgets_header_number >= 4 && is_active_sidebar( 'header-4' ) ) {
			echo $evolve_header_widgets_css;
			dynamic_sidebar( 'header-4' );
			echo '</div>';
		}

		echo '</div></div>';

	}
}