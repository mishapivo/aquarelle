<?php
/*
 * Enqueue css and js files
 */
 function foodies_enqueue() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap'.$suffix.'.css', array());
	wp_enqueue_style('foodies-font-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic', array());
	wp_enqueue_style('foodies-main-style', get_template_directory_uri() .'/assets/css/default.css', array());
	wp_enqueue_style('foodies-style', get_stylesheet_uri(), array());

	if (is_singular())
	    wp_enqueue_script("comment-reply");
	    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap'.$suffix.'.js', array( 'jquery' ),false);
}
add_action( 'wp_enqueue_scripts', 'foodies_enqueue' );