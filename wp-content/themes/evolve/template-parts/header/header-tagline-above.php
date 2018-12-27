<?php

$evolve_title_tagline_class_1  = '';
$evolve_helper_tagline_class_1 = '';
$evolve_row_class_1            = '';

if ( ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) !== "disable" && evolve_theme_mod( 'evl_tagline_pos', 'disable' ) !== "next" && ( '' == ( evolve_theme_mod( 'evl_header_logo', '' ) ) ) ) || evolve_logo_position() == "disable" ||
     ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "disable" && ( '' == ( evolve_theme_mod( 'evl_header_logo', '' ) ) ) ) ) {
	$evolve_title_tagline_class_1 = '<div class="col-12 col-md order-2 order-md-1">';
}

if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" && evolve_logo_position() == "disable" ) {
	$evolve_title_tagline_class_1 = '';
}

if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) !== "disable" && evolve_theme_mod( 'evl_tagline_pos', 'disable' ) !== "next" && ( '' == ( evolve_theme_mod( 'evl_header_logo', '' ) ) ) || evolve_logo_position() == "disable" ) {
	echo $evolve_title_tagline_class_1;
}

if ( evolve_theme_mod( 'evl_header_logo', '' ) && evolve_logo_position() !== 'disable' && evolve_theme_mod( 'evl_tagline_pos', 'disable' ) != "disable" ) {
	if ( evolve_logo_position() == "center" ) {
		$evolve_helper_tagline_class_1 = '<div class="col-12 order-3">';
	}
	if ( evolve_logo_position() == "left" ) {
		$evolve_helper_tagline_class_1 = '<div class="col col-lg-auto order-2">';
	}
	if ( evolve_logo_position() == "right" ) {
		$evolve_helper_tagline_class_1 = '<div class="col-md-6 col-sm-12 order-3 order-md-2">';
	}
}

if ( evolve_theme_mod( 'evl_header_logo', '' ) && evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" && evolve_logo_position() == 'disable' ) {
	$evolve_helper_tagline_class_1 = '';
}

if ( evolve_theme_mod( 'evl_header_logo', '' ) && evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" && evolve_logo_position() !== 'center' && evolve_logo_position() !== 'disable' ) {
	$evolve_row_class_1 = '<div class="row align-items-center">';
} else {
	$evolve_row_class_1 = '';
}

echo $evolve_helper_tagline_class_1 . $evolve_row_class_1;

if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "above" ) {
	get_template_part( 'template-parts/header/header', 'tagline' );
}


