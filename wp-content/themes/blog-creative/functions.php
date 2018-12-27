<?php 
/*This file is part of Blog Creative child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

add_action( 'wp_enqueue_scripts', 'blog_creative_enqueue_child_styles');
function blog_creative_enqueue_child_styles() {
	wp_enqueue_style( 'blog-creative-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','fino-skin-red','owl-carousel','fino-owl-theme-default','fino-responsive'), '', 'all');
   wp_enqueue_style( 'blog-creative-style',get_stylesheet_directory_uri() . '/css/main.css',array('fino-skin-red'), '', 'all');
  
}

