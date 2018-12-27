<?php
/**
 *
 * @package Simple Days
 */


function simple_days_author_post(){
  if(get_theme_mod( 'simple_days_posts_author_position','right') == 'none') return;
  $avatar = get_theme_mod( 'simple_days_posts_author_icon_avatar',false);
  $author_icon = get_theme_mod( 'simple_days_posts_author_icon','fa-user');
  simple_days_author_output($avatar,$author_icon);
}

function simple_days_author_page(){
  if(get_theme_mod( 'simple_days_page_author_position','none') == 'none') return;
  $avatar = get_theme_mod( 'simple_days_page_author_icon_avatar',false);
  $author_icon = get_theme_mod( 'simple_days_page_author_icon','fa-user');
  simple_days_author_output($avatar,$author_icon);
}

function simple_days_author_output($avatar,$author_icon){
  echo '<div class="post_author post_item">';
  if($avatar){
    echo '<div class="dib"><' . ( YA_AMP ? 'amp-img layout="intrinsic"' : 'img' ) . ' src="' . esc_url( get_avatar_url( get_the_author_meta( 'ID' ) , array("size"=>32 )) ) . '" width="32" height="32" class="vam br50" alt="'.get_the_author_meta( 'nickname' ).'" /></div>';
  }else{
    echo '<i class="fa '.esc_attr($author_icon).'" aria-hidden="true"></i>';
  }
  echo'&nbsp;<a href="'.esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )).'">'. get_the_author() .'</a></div>';
}


