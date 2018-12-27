<?php
defined( 'ABSPATH' ) || exit;
/**
 * Extra content
 *
 * @package Simple Days
 */

add_filter('the_content','simple_days_replace_content',99999999999999);

function simple_days_replace_content($the_content) {


  $format = get_post_format();
  if($format == 'chat'){
    get_template_part( 'inc/extra','chat' );
    $the_content = simple_days_extra_content_chat($the_content);
  }

  
  if ( is_single() && (is_active_sidebar( 'before_h2_no1' ) || is_active_sidebar( 'before_h2_no2' ) ||is_active_sidebar( 'before_h2_no3' ))) { //is_single()
    $pattern = '{<h2.*?>.+?<\/h2>}ismu';

    if ( preg_match_all( $pattern, $the_content, $result )) {
      if ( $result[0] ) {
        if ( isset($result[0][0]) && is_active_sidebar( 'before_h2_no1' )) {
          ob_start();
          dynamic_sidebar( 'before_h2_no1' );
          $before_h2 = ob_get_clean();
          $the_content  = str_replace($result[0][0], $before_h2.$result[0][0], $the_content);

        }
        if ( isset($result[0][1]) && is_active_sidebar( 'before_h2_no2' )) {
          ob_start();
          dynamic_sidebar( 'before_h2_no2' );
          $before_h2 = ob_get_clean();
          $the_content  = str_replace($result[0][1], $before_h2.$result[0][1], $the_content);
        }
        if ( isset($result[0][2]) && is_active_sidebar( 'before_h2_no3' ) ) {
          ob_start();
          dynamic_sidebar( 'before_h2_no3' );
          $before_h2 = ob_get_clean();
          $the_content  = str_replace($result[0][2], $before_h2.$result[0][2], $the_content);
        }
      }
    }
  }
  
  if ( is_page() && (is_active_sidebar( 'page_before_h2_no1' ) || is_active_sidebar( 'page_before_h2_no2' ) ||is_active_sidebar( 'page_before_h2_no3' ))) { //is_single()
    $pattern = '/^<h2.*?>.+?<\/h2>$/im';
    if ( preg_match_all( $pattern, $the_content, $result )) {
      if ( $result[0] ) {
        if ( isset($result[0][0]) && is_active_sidebar( 'page_before_h2_no1' )) {
          ob_start();
          dynamic_sidebar( 'page_before_h2_no1' );
          $before_h2 = ob_get_clean();
          $the_content  = str_replace($result[0][0], $before_h2.$result[0][0], $the_content);

        }
        if ( isset($result[0][1]) && is_active_sidebar( 'page_before_h2_no2' )) {
          ob_start();
          dynamic_sidebar( 'page_before_h2_no2' );
          $before_h2 = ob_get_clean();
          $the_content  = str_replace($result[0][1], $before_h2.$result[0][1], $the_content);
        }
        if ( isset($result[0][2]) && is_active_sidebar( 'page_before_h2_no3' ) ) {
          ob_start();
          dynamic_sidebar( 'page_before_h2_no3' );
          $before_h2 = ob_get_clean();
          $the_content  = str_replace($result[0][2], $before_h2.$result[0][2], $the_content);
        }
      }
    }
  }





  return $the_content;
}
