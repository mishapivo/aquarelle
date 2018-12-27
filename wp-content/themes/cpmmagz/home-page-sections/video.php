<!-- Hello -->
<?php
    global $post;
    global $WP_Query;
       $video = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,

        'tax_query' => array(
            array(
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => 'post-format-video',
                ),
            )

        );
   $query_video = new WP_Query($video);

   if ($query_video->have_posts()) :
    if ($query_video->found_posts > 0) :
?>
<section id="featured-video" class="section-videos section">
   <h2 class="section-title"><?php esc_attr_e('Videos', 'cpmmagz');?></h2>

   <div class="featured-video-carousel">

   <div id="featured-video-wrap" class="slider slider-for">

      <?php
          while ($query_video->have_posts()) :
              $query_video->the_post();
              if (has_post_format('video')) {
      ?>
                  <div class="slide-item">
                      <article class="card news-video-big">
                          <div class="card-image card-video">
                              <div class="video-container">
                                 <?php
                                    $content = trim(get_post_field('post_content', $post->ID));
                                    $ori_url = explode("\n", esc_html($content));
                                    $url =  $ori_url[0] ;
                                    $url_type = explode(" ", $url);
                                    $url_type = explode("[", $url_type[0]);
                                    if (isset($url_type[1])){
                                        $url_type_shortcode = $url_type[1];
                                    }
                                    $new_content =  get_shortcode_regex();
                                    if (isset($url_type[1])){
                                       if ( preg_match_all( '/'. $new_content .'/s', $post->post_content, $matches )
                                            && array_key_exists( 2, $matches )
                                            && in_array( $url_type_shortcode, $matches[2] )  )
                                        {
                                             echo do_shortcode($matches[0][0]);
                                        }
                                    }
                                     else {
                                        echo esc_html(cpmmagz_the_featured_video($content));
                                     }
                                  ?>
                              </div>
                          </div>
                          <div class="card-content">
                              <h2><a href="<?php the_permalink();?>" title="<?php echo esc_attr(get_the_title());?>"><?php the_title();?></a></h2>
                              <span class="entry-meta">
                                  <?php cpmmagz_meta_data($post); ?>
                              </span>
                          </div>
                      </article>
                  </div>
                  <!-- slide-item -->
      <?php
              } //end if(has_post_format('video')).
          endwhile;
          endif; wp_reset_postdata();?>
  </div>
  <!-- /Featured Video Wrap -->

  <?php
      $video_small = array(
         'post_type' => 'post',
         'orderby' => 'date',
         'order' => 'DESC',
         'posts_per_page' => -1,

         'tax_query' => array(
           array(
               'taxonomy' => 'post_format',
               'field'    => 'slug',
               'terms'    => 'post-format-video',
               ),
           )
      );
      $query_video_small = new WP_Query($video_small);
      if ($query_video_small->have_posts()) : ?>

      <div id="featured-video-list-wrap" class="slider slider-nav">
         <?php while ($query_video_small->have_posts()) : $query_video_small->the_post();
            if (has_post_format('video')) {
              $video_thumb = cpmmagz_video_url($post->ID);
         ?>
         <div>

            <article class="card news-video-small">
              <div class="card-image card-video">
                  <div class="video-thumb" style="background-image: url(<?php echo esc_url($video_thumb); ?>)"></div>
              </div>

               <div class="card-desc">
                  <div class="card-content">
                     <h2><?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 21)); ?>
                        <a href="<?php the_permalink();?>" title="<?php echo esc_attr( get_the_title() );?>" ></a>
                     </h2>
                  </div>
               </div>
            </article>

         </div>
         <?php } endwhile; ?>
      </div><!-- featured-video-list-wrap -->

   </div><!-- featured-video-carousel -->
</section>
<?php endif; endif; wp_reset_postdata();?>
