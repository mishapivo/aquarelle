<?php

/*
    Displays Sliders
    ======================================= */

/*
    Bootstrap Slider
    ======================================= */

if ( ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'bootstrap' && evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == '1' ) || ( evolve_theme_mod( 'evl_bootstrap_slider', '0' ) == '1' && evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == '1' ) ) {
	evolve_bootstrap();
}

/*
    Parallax Slider
    ======================================= */

if ( ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'parallax' && evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == '1' ) || ( evolve_theme_mod( 'evl_parallax_slider', '0' ) == '1' && evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == '1' ) ) {
	evolve_parallax();
}

/*
    Posts Slider
    ======================================= */

if ( ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'posts' && evolve_theme_mod( 'evl_carousel_slider', '0' ) == '1' ) || ( evolve_theme_mod( 'evl_posts_slider', '0' ) == '1' && evolve_theme_mod( 'evl_carousel_slider', '0' ) == '1' ) ) {
	evolve_posts_slider();
}


