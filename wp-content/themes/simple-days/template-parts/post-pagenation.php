<?php
/**
 *
 * @package Simple Days
 */


echo '<nav class="nav_link post_item m0 f_box jc_sb f_wrap">';

$prevpost = get_adjacent_post('', '', true); 
$nextpost = get_adjacent_post('', '', false); 

if ($prevpost) { 
  $thumurl = simple_days_get_thumbnail( $prevpost->ID , 'thumbnail' , $prevpost);
        //wp_get_attachment_image_src (get_post_thumbnail_id ($prevpost->ID,  true));

  echo '<a href="' . esc_url(get_permalink($prevpost->ID)) . '" title="' . get_the_title($prevpost->ID) . '" class="nav_link_box f_box ai_c mtb30 opa7 box_shadow"><span class="fs36 m10"><i class="fa fa-angle-double-left vam" aria-hidden="true"></i></span><div class="nav_link_thum ry360">';
  if ($thumurl['has_image']){
    echo ( (YA_AMP )?'<amp-img':'<img').' src="'.esc_url( $thumurl[0] ).'" width="100" height="100" />';
  }
  echo '</div><div><span class="p10 fs12">'.esc_html__( 'Previous Post', 'simple-days' ).'</span><p class="nav_link_title p10">' . esc_html(mb_strimwidth(get_the_title($prevpost->ID), 0, 80, "...", 'UTF-8')) . '</p></div></a>';
}
if ( $nextpost ) { 
  $thumurl = simple_days_get_thumbnail( $nextpost->ID , 'thumbnail' , $nextpost);
        //$thumurl = wp_get_attachment_image_src (get_post_thumbnail_id ($nextpost->ID,  true));


  echo '<a href="' . esc_url(get_permalink($nextpost->ID)) . '" title="'. get_the_title($nextpost->ID) . '" class="nav_link_box f_box ai_c f_row_r mtb30 mla opa7 box_shadow"><span class="fs36 m10"><i class="fa fa-angle-double-right vam" aria-hidden="true"></i></span><div class="nav_link_thum ry360">';
  if ($thumurl['has_image']){
    echo ( (YA_AMP )?'<amp-img':'<img').' src="'.esc_url( $thumurl[0] ).'" width="100" height="100" />';
  }
  echo '</div><div class="ta_r"><span class="p10 fs12">'.esc_html__( 'Next Post', 'simple-days' ).'</span><p class="nav_link_title p10">' . esc_html(mb_strimwidth(get_the_title($nextpost->ID), 0, 80, "...", 'UTF-8')) . '</p></div></a>';
}
echo '</nav>';


