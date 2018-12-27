<?php
defined( 'ABSPATH' ) || exit;
/**
 * Author profile
 *
 * @package Simple Days
 */

function simple_days_author_profile(){
  ?>
  <!--Author profile-->

  <div id="about_author" class="fs16 post_item mtb30">
    <input id="aa_profile" class="tabs dn" type="radio" name="tab_item" checked>
    <label class="tab_item opa7 fw8 ta_c box_shadow" for="aa_profile"><?php echo esc_html__('About the author','simple-days'); ?></label>
    <input id="aa_latest" class="tabs dn" type="radio" name="tab_item">
    <label class="tab_item opa7 fw8 ta_c box_shadow" for="aa_latest"><?php echo esc_html__('Latest posts','simple-days'); ?></label>

    <div class="aa_wrap f_box ai_c f_col100 p10 box_shadow">
      <div class="aa_avatar">
        <<?php echo ( YA_AMP ? 'amp-img layout="intrinsic"' : 'img' ); ?> src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" width="96" height="96" class="br50" />
        <?php //echo get_avatar( get_the_author_meta('ID') , 64); ?>
      </div>






      <div id="aa_con1" class="tab_content dn fi15" >
        <ul class="aa_pl m0 lsn">
          <li><div class="aa_name fw4"><?php the_author_meta('nickname'); ?></div></li>
          <li><?php echo wpautop(get_the_author_meta('user_description')); ?></li>


          <?php

          if(YA_USER_PROFILE){
            yahman_addons_user_profile_output();
          }



          ?>

        </ul>
      </div>

      <div id="aa_con2" class="tab_content dn fi15" >

        <?php if(get_option( 'fresh_site' ) != 1):
          $post_args = array(
            'author'  => get_the_author_meta('ID'),
              //'orderby'   => 'date',
              //'numberposts'     => '5',
              //'post_type' => 'post',
          );
          $posts = get_posts($post_args);
          if (!empty($posts) ) { ?>
            <ul class="aa_pl m0 lsn">
              <?php foreach( $posts as $post ) : setup_postdata($post);?>
                <li><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html($post->post_title); ?></a> <span class="aa_date fs12 mo_br"><?php echo esc_html(get_the_date('',$post->ID));?></span></li>
              <?php endforeach;
              wp_reset_postdata(); ?>
            </ul>
          <?php } endif;?>

        </div>
      </div>
    </div>
    <!--/Author profile-->
    <?php 
  }
