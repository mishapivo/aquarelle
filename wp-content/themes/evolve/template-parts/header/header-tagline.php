<?php

if ( evolve_theme_mod( 'evl_header_logo', '' ) && evolve_logo_position() !== 'disable' ) {
	if ( evolve_logo_position() == "right" || evolve_logo_position() == "left" || evolve_logo_position() == "center" ) {
		$evolve_tagline_class_1 = '<div class="col-12 order-2">';
		$evolve_tagline_class_2 = '</div>';
	}
}

if ( evolve_theme_mod( 'evl_header_logo', '' ) && evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" && evolve_logo_position() == 'disable' ) {
	$evolve_tagline_class_1 = '';
	$evolve_tagline_class_2 = '';
}

if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" ) {
	$evolve_tagline_class_1 = '<div class="col order-2 order-md-2">';
	$evolve_tagline_class_2 = '</div>';
} else {
	$evolve_tagline_class_1 = '';
	$evolve_tagline_class_2 = '';
}

echo $evolve_tagline_class_1 . '<div id="tagline">' . get_bloginfo( 'description' ) . '</div>' . $evolve_tagline_class_2;
