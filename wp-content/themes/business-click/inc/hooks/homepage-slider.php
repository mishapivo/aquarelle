<?php

if ( !function_exists('business_click_feature_slider_array') ) :
  /**
     * Featured Slider array creation
     *
     * @since Business Click 1.0.0
     *
     * @param  $from_slider
     * @return array
     */
    function business_click_feature_slider_array($from_slider)
    {
      global $business_click_customizer_all_values;
      $slider_excerpt_length      = absint($business_click_customizer_all_values['business-click-excerpt-length']);

      $reapeated_pages      = array('business-click-page-id');
      $feature_slider_args  = array(); 

      if('form-category' == $from_slider){
        $business_click_slider_cat = $business_click_customizer_all_values['business-click-select-from-cat'];
        if(0 != $business_click_slider_cat){
          $feature_slider_args = array(
                'post_type'             => 'post',
                'posts_per_page'        => 3,
                'cat'                   => absint($business_click_slider_cat),
                'ignore_sticky_posts'   => true
            );
        }
      }
      else{
        $feature_slider_post_page = evision_customizer_get_repeated_all_value(3,$reapeated_pages);
        if (null !=$feature_slider_post_page ){
          foreach ($feature_slider_post_page as $feature_slider_post_pages){
            if ( 0 !=  $feature_slider_post_pages['business-click-page-id']){
              $feature_slider_page_ids[] = $feature_slider_post_pages['business-click-page-id'];
            }
          }
          if (!empty($feature_slider_page_ids ) ){
            $feature_slider_args = array(
              'post_type'             => 'page',
              'post__in'              => $feature_slider_page_ids,
              'order_by'              => 'post__in',
              'order'                 => 'ASC' 
            );
          }
        }
      }
      
      if( !empty( $feature_slider_args )){
          // the query
          $business_click_feature_slider_args = new WP_Query( $feature_slider_args );

          if ( $business_click_feature_slider_args->have_posts() ) :
              $i = 0;
              while ( $business_click_feature_slider_args->have_posts() ) : 
                $business_click_feature_slider_args->the_post();
                  $url ='';
                  if(has_post_thumbnail()){
                      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'business-click-slider-banner-image' );
                      $url = $thumb['0'];
                  }
                    $feature_slideer_array[]  =  array(
                      'business-click-feature-title'    => get_the_title(),
                      'business-click-feature-content'  => has_excerpt() ? get_the_excerpt() : business_click_words_count($slider_excerpt_length, get_the_content() ),
                      'business-click-feature-image'    => $url,
                      'business-click-feature-url'      => esc_url( get_permalink() )

                    );
                  $i++;
              endwhile;
              wp_reset_postdata();
          else:
            // if uncategorized is not present
            $feature_slideer_array =  business_click_default_slider_value();
          endif;
      }
      else {
        // if uncategorized is not present
        $feature_slideer_array =  business_click_default_slider_value();
      }

      // var_dump($feature_slideer_array);die();

      return $feature_slideer_array;
    }
endif;

if (!function_exists('business_click_feature_slider')) :
   /**
     * Featured Slider
     *
     * @since business Click 1.0.0
     *
     * @param null
     * @return null
     *
     */
 function business_click_feature_slider()
 {

  global $business_click_customizer_all_values;
  if(  !$business_click_customizer_all_values['business-click-enbale-slider'] )
  {
    return null;
  }
  $fetaure_slider_select_post   = $business_click_customizer_all_values['business-click-select-post-form'];
  $feature_slide_arrays         = business_click_feature_slider_array($fetaure_slider_select_post);
  if ( is_array($feature_slide_arrays) )
  {
    $feature_button_text        = esc_html($business_click_customizer_all_values['business-click-slider-button-text']); ?>

    <section id="evt-banner" class="section" style="opacity: 0;">
      <div class="evt-banner-slider">
        <?php
          $i = 0;
          foreach ($feature_slide_arrays as $feature_slide_array)
          {
            
            if ( empty($feature_slide_array['business-click-feature-image'] ))
            {
              $feature_slider_image = '';
            }
            else
            {
              $feature_slider_image = $feature_slide_array['business-click-feature-image'];
            }

          ?>
          <div>
          <div class="evt-banner-image evt-overlay position-relative <?php if($feature_slider_image == '') echo esc_html('css-gradient');?>" <?php if(  !empty($feature_slider_image)) {?> style="background-image: url('<?php echo esc_url($feature_slider_image); ?>');"<?php } ?> >
            <img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/1600x660.png');?>" class="holder">

            <div class="container">
              <div class="evt-banner-caption">
                <?php if(  !empty($feature_slide_array['business-click-feature-title']) ) { ?>
                  <h2 class="evt-title text-white mb-4 evision-animate fadeIn"><?php echo esc_html($feature_slide_array['business-click-feature-title']);?></h2>
                <?php } ?>
                <?php if(  !empty($feature_slide_array['business-click-feature-content']) ) {?>
                  <p class="evision-animate fadeIn"><?php echo wp_kses_post($feature_slide_array['business-click-feature-content']);?></p>
                <?php } ?>  
                <?php if(!empty($feature_button_text) ) { ?>
                  <a href="<?php echo esc_url($feature_slide_array['business-click-feature-url']);?>" class="btn evision-animate fadeIn"><?php echo esc_html($feature_button_text);?><i class="fas fa-angle-right"></i></a>
                <?php } ?>  
              </div>
            </div>
          </div>
          </div>
          <?php
          $i++;
        }
        ?>
      </div>

       <!-- move section down -->
       <a id="moveSectionDown" class="animate-move-up-down" style="display: none;" href="#"><i class="fa fa-angle-down"></i></a>
    </section>

  <?php
  }
 }
endif;
add_action('business_click_homepage_slider','business_click_feature_slider',10);
