<?php  
/**
 * The template for Framework options functions.
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chili_lite
 */


/**
 * Main header logo area. 
 */  
function chili_lite_main_headerLogo(){  
   $logo = get_custom_logo(); 
    if( !empty($logo) ){
        the_custom_logo();
       }else{ ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1><?php bloginfo( 'name' ); ?></h1></a>
   <?php }
}  

/**
 * Copyright text. 
 */ 
function chili_lite_copyright(){ 
    $copy_text = get_theme_mod( 'v_copyright_text' );
    if(!empty($copy_text)){
   ?>
    <p><?php echo esc_html($copy_text); ?></p>
   <?php
    }else{
      $url1 =  esc_url('https://prusakam.net/');
      $url2 =  esc_url('http://wp-templates.ru/'); 
      $text =  esc_html__('Prusakam.net','chili-lite');
      $text2 =  esc_html__('Шаблоны WordPress','chili-lite');
      printf( '<p><a href="%s">%s</a> - <a href="%s">%s</a></p>', esc_url($url1), esc_html($text), esc_url($url2), esc_html($text2) );
    }
}

