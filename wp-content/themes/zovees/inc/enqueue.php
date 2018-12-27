<?php
/**
 * @package Zovees
*/
function zovees_load_scripts() {
	
	// in header part
	wp_enqueue_style('zovees-font', 'https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800|Roboto:300,400,500');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'eleganticons', get_template_directory_uri() . '/css/elegant-icons.css');
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.css');
	wp_enqueue_style( 'themifyicons', get_template_directory_uri() . '/css/themify-icons.css');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/css/mean-menu.css');
	wp_enqueue_style( 'venbox', get_template_directory_uri() . '/css/venbox.css');
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl-carousel.css');
	// main style
	wp_enqueue_style( 'zovees-style', get_stylesheet_uri() );
	wp_enqueue_style( 'zovees-custom', get_template_directory_uri() . '/css/custom.css');
	wp_enqueue_style( 'zovees-responsive', get_template_directory_uri() . '/css/responsive.css');
	

	// in footer part
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' , get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.7', true );
	wp_enqueue_script( 'imagesLoaded' , get_template_directory_uri() . '/js/imagesLoaded.js', array(), '4.1.1', true );
	wp_enqueue_script( 'isotope' , get_template_directory_uri() . '/js/isotope.js', array(), '3.0.3', true );
	
	wp_enqueue_script( 'meanmenu' , get_template_directory_uri() . '/js/mean-menu.js', array(), '2.0.8', true );
	wp_enqueue_script( 'carousel' , get_template_directory_uri() . '/js/owl-carousel.js', array(), '2.2.1', true );
	wp_enqueue_script( 'scolling' , get_template_directory_uri() . '/js/smoth-scolling.js', array(), '1.0.2', true );
	wp_enqueue_script( 'venoBox' , get_template_directory_uri() . '/js/venoBox.js', array(), '1.7.0', true );
	wp_enqueue_script( 'waypoints' , get_template_directory_uri() . '/js/waypoints.js', array(), '2.0.3', true );
	wp_enqueue_script( 'wow' , get_template_directory_uri() . '/js/wow.js', array(), '1.1.3', true );

	wp_enqueue_script( 'main' , get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'zovees_load_scripts' );