<?php
defined( 'ABSPATH' ) || exit;


if(!get_theme_mod( 'simple_days_fontawesome',false)){
  wp_enqueue_style('font-awesome4', SIMPLE_DAYS_THEME_URI . 'assets/fonts/fontawesome/style.min.css', array(), null);
}else{
  $maxcdn = 'https://maxcdn.bootstrapcdn.com';
  wp_enqueue_style('font-awesome4_cdn', $maxcdn.'/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
}

