<?php
/**
 *
 * @package Simple Days
 */


function simple_days_thumbnail_post($format,$post_title_effects){
  if(!get_theme_mod( 'simple_days_posts_thumbnail',true)) return;
  if(get_theme_mod('simple_days_posts_full_width_thumbnail',false)) return;
  $title_over = get_theme_mod( 'simple_days_posts_title_over_thumbnail',false);

  simple_days_thumbnail_output($format,$post_title_effects,$title_over);
}

function simple_days_thumbnail_page($format,$post_title_effects){
  if(!get_theme_mod( 'simple_days_page_thumbnail',true)) return;
  if(get_theme_mod('simple_days_page_full_width_thumbnail',false)) return;
  $title_over = get_theme_mod( 'simple_days_page_title_over_thumbnail',false);

  simple_days_thumbnail_output($format,$post_title_effects,$title_over);
}

function simple_days_thumbnail_output($format,$post_title_effects,$title_over){
  $thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), 'full');
  if($format == 'aside' || $format == 'link' || $format == 'status')$title_over = false;

  if($title_over){
    echo '<div class="post_item posi_re mlr0 item_thum">';
    echo '<div class="thum_on_title posi_ab p10 f_box jc_c ai_c"><h1 class="post_title'.esc_attr($post_title_effects).' fw8">'. esc_html(get_the_title()).'</h1></div>';
    echo '<figure class="on_thum fit_box_img_wrap">';
    echo '<'.( YA_AMP ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" />';
    echo '</figure>';


    echo '</div>';
  }else{
    echo '<figure class="post_thum mlr0 item_thum post_item">';
    echo '<'.( YA_AMP ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" /></figure>';
  }
}


