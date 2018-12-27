<?php
/*
 * Minimal Travelogue functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Minimal Travelogue
*/

// Loads parent theme stylesheet
// Do not delete this
function minimal_travelogue_scripts()
{
    wp_enqueue_style('minimal-travelogue-parent', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'minimal_travelogue_scripts', 20);

// Loads custom stylesheet and js for child. 
// This could override all stylesheets of parent theme and custom js functions
function minimal_travelogue_custom_scripts()
{
    wp_enqueue_style('minimal-travelogue', get_stylesheet_directory_uri() . '/assets/custom.css');
    wp_enqueue_script('minimal-travelogue-script', get_stylesheet_directory_uri().'/assets/custom-script.js', array('jquery'), '', true);

}

add_action('wp_enqueue_scripts', 'minimal_travelogue_custom_scripts', 60);

require_once( get_stylesheet_directory(). '/inc/hooks/slider.php' );
require_once( get_stylesheet_directory(). '/inc/customizer/core/default.php' );