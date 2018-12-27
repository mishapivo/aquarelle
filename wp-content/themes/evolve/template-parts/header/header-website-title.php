<?php

if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" ) {
	$evolve_title_class_1 = '<div class="col-12 col-md-auto order-1">';
	$evolve_title_class_2 = '</div>';
} else if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "disable" && '' == ( evolve_theme_mod( 'evl_header_logo', '' ) ) ) {
	$evolve_title_class_1 = "<div class='col-md-auto mr-md-auto order-2 order-md-1'>";
	$evolve_title_class_2 = "</div>";
} else if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" && evolve_theme_mod( 'evl_header_logo', '' ) ) {
	$evolve_title_class_1 = "<div class='col-md-auto mr-md-auto order-3 order-md-1'>";
	$evolve_title_class_2 = "</div>";
} else if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "disable" && evolve_theme_mod( 'evl_header_logo', '' ) && evolve_logo_position() == "center" ) {
	$evolve_title_class_1 = "<div class='col-12 order-3'>";
	$evolve_title_class_2 = "</div>";
} else if ( ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "disable" && evolve_theme_mod( 'evl_header_logo', '' ) ) || evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == "next" && '' == ( evolve_theme_mod( 'evl_header_logo', '' ) ) ) {
	$evolve_title_class_1 = "<div class='col-md-auto mr-md-auto order-2 order-md-1'>";
	$evolve_title_class_2 = "</div>";
} else {
	$evolve_title_class_1 = "";
	$evolve_title_class_2 = "";
}

if ( is_front_page() ) :

	echo $evolve_title_class_1;
	?><h1 id="website-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a>
    </h1><?php
	echo $evolve_title_class_2;

else :

	echo $evolve_title_class_1;
	?><h4 id="website-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a>
    </h4><?php
	echo $evolve_title_class_2;

endif;
