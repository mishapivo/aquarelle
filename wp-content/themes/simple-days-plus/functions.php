<?php

function simple_days_plus_enqueue_styles() {
   wp_enqueue_style( 'simple_days_plus_style', get_stylesheet_directory_uri() . '/style.css',array('simple_days_style'),wp_get_theme()->Version);
   //wp_enqueue_style( 'simple_days_plus_style', get_stylesheet_directory_uri() . '/style.min.css',array('simple_days_style'),wp_get_theme()->Version);
}

add_action( 'wp_enqueue_scripts', 'simple_days_plus_enqueue_styles', 999 );

function simple_days_plus_setup(){
   load_theme_textdomain( 'simple-days-plus', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'simple_days_plus_setup' );

function simple_days_plus_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'simple_days_plus_add_editor_styles' );

/*Please write your code under. */


