<?php
/**
 *
 * @package Simple Days
 */

function simple_days_full_width_thumbnail_post($post_title_effects) {
	if(get_theme_mod('simple_days_posts_full_width_thumbnail',false) && get_theme_mod( 'simple_days_posts_thumbnail',true)){
		$title_over = false;
		if(get_theme_mod( 'simple_days_posts_title_over_thumbnail',false)){
			$title_over = true;
		}

		simple_days_full_width_thumbnail_output($title_over,$post_title_effects);

	}
}


function simple_days_full_width_thumbnail_page($post_title_effects) {
	if(get_theme_mod('simple_days_page_full_width_thumbnail',false) && get_theme_mod( 'simple_days_page_thumbnail',true)){
		$title_over = false;
		if(get_theme_mod( 'simple_days_page_title_over_thumbnail',false)){
			$title_over = true;
		}

		simple_days_full_width_thumbnail_output($title_over,$post_title_effects);

	}
}

function simple_days_full_width_thumbnail_output($title_over,$post_title_effects) {
?>
    <div class="posi_re">
      <?php
      $format = get_post_format();
      if($title_over && ($format != 'aside' && $format != 'link' && $format != 'status')){
        echo '<div class="thum_on_title h30 posi_ab"><div class="container f_box jc_fs ai_c"><h1 class="post_title'.esc_attr($post_title_effects).' fw8">'. esc_html(get_the_title()).'</h1></div></div>';
      }
      $thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), 'full');
      echo '<figure class="full_thum_b on_thum fit_box_img_wrap"><'.( YA_AMP ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" /></figure>';
      ?>
    </div>

<?php
}

