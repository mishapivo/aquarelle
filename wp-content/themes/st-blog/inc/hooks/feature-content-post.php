<?php

if ( !function_exists('st_blog_feature_content_post_array') ) :
 /**
  * feature-content-post
  *
  * @since st-blog 1.0.0
  *
  * @param $from_slider
  * @return array
  *
  */
  function st_blog_feature_content_post_array($from_slider)
  {
    global $st_blog_customizer_all_values;
    $st_blog_feature_content_post_number         = esc_html($st_blog_customizer_all_values['st-blog-feature-content-number-post']);
    $st_blog_feature_content_single_number_word  = absint($st_blog_customizer_all_values['st-blog-feature-content-single-number-of-words']);

    $st_blog_feature_content_post_content_array[0]['st-blog-feature-content-post-title']      = '';
    $st_blog_feature_content_post_content_array[0]['st-blog-feature-content-post-content']    = '';
    $st_blog_feature_content_post_content_array[0]['st-blog-feature-content-post-image']      = '';
    $st_blog_feature_content_post_content_array[0]['st-blog-feature-content-post-url']        = '';

    $repeated_page =  array('feature-content-page-id');
    $st_blog_feature_content_post_args = array();

    if( 'from-category'  == $from_slider )
    {
      $st_blog_post_category  = $st_blog_customizer_all_values['st-blog-feature-content-select-from-category'];
      if( 0 != $st_blog_post_category )
      {
        $st_blog_feature_content_post_args = array(
          'post_type'           => 'post',
          'posts_per_page'      => $st_blog_feature_content_post_number,
          'cat'                 => absint($st_blog_post_category),
          'ignore_sticky_posts' => true

        );
      }
    }
    else
    {
      $st_blog_feature_content_posts = salient_customizer_get_repeated_all_value(3,$repeated_page);
      if( null != $st_blog_feature_content_posts  )
      {
        foreach ($st_blog_feature_content_posts as $st_blog_feature_content_post)
        {
          if ( 0  != $st_blog_feature_content_post['feature-content-page-id'] )
          {
            $st_blog_feature_content_post_id[] = $st_blog_feature_content_post['feature-content-page-id'];
          }
        }
        if ( !empty($st_blog_feature_content_post_id) )
        {
          $st_blog_feature_content_post_args = array(
            'post_type'       => 'page',
            'post__in'        => $st_blog_feature_content_post_id,
            'posts_per_page'  => $st_blog_feature_content_post_number,
            'order_by'        => 'post'
          );

        }
      }
    }

    if ( !empty($st_blog_feature_content_post_args) )
    {
        // query start
        $st_blog_feature_content_post_query = new WP_Query($st_blog_feature_content_post_args);

        if ( $st_blog_feature_content_post_query->have_posts() ) : 
            $i = 0;
            while( $st_blog_feature_content_post_query->have_posts() ) : 
                $st_blog_feature_content_post_query->the_post();
                $thumb_image = '';
                if ( has_post_thumbnail())
                {
                    $image        = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id() ), 'st-blog-feature-content-post-image');
                    $thumb_image  = $image['0'];
                }
                $st_blog_feature_content_post_content_array[$i]['st-blog-feature-content-post-title'] = get_the_title();
                if( has_excerpt() )
                {
                    $st_blog_feature_content_post_content_array[$i]['st-blog-feature-content-post-content']  = get_the_excerpt();
                }
                else 
                {
                    $st_blog_feature_content_post_content_array[$i]['st-blog-feature-content-post-content'] = st_blog_words_count( $st_blog_feature_content_single_number_word, get_the_content() );
                }
                $st_blog_feature_content_post_content_array[$i]['st-blog-feature-content-post-url']  = get_permalink();
                $st_blog_feature_content_post_content_array[$i]['st-blog-feature-content-post-image'] = $thumb_image;
                $i++;   
            endwhile;
            wp_reset_postdata();
        endif;
    }
    return $st_blog_feature_content_post_content_array;
  }

endif;

if ( !function_exists('st_blog_feature_content_post') ) :

     /**
     * feature-content post 
     *
     * @since st-blog 1.0.0
     *
     * @param null
     * @return null
     *
     */

    function  st_blog_feature_content_post()
    {
        global $st_blog_customizer_all_values;
        $st_blog_feature_content_post_title            = $st_blog_customizer_all_values['st-blog-feature-content-main-title-text'];   
        if( 1 != $st_blog_customizer_all_values['st-blog-feature-content-enbale'] )
        {
            return null;
        }

        $st_blog_feature_content_slect_post_type       = $st_blog_customizer_all_values['st-blog-feature-content-select-post-from'];
        $st_blog_feature_content_array                 =  st_blog_feature_content_post_array($st_blog_feature_content_slect_post_type); 
        if ( is_array($st_blog_feature_content_array) )  
        {
            $st_blog_feature_content_post_number       = $st_blog_customizer_all_values['st-blog-feature-content-number-post'];
            $st_feature_content_post_button_text       = $st_blog_customizer_all_values['st-blog-feature-content-button-text'];
            $st_feature_content_post_button_enable     = $st_blog_customizer_all_values['st-blog-feature-content-button-enable']; 
            ?>

            
            <section id="st-blog-featured" class="mb-5 <?php echo st_blog_additional_class('st-blog-featured');?>">    
                <div class="container site-content">
                  <?php if (!empty($st_blog_feature_content_post_title)) { ?>
                    <h1 class="widget-title text-center"><?php echo esc_html($st_blog_feature_content_post_title);?></h1>
                  <?php } ?>  
                    <div class="st-blog-featured-slider text-center">
                        <?php
                            $i = 0;
                            foreach ($st_blog_feature_content_array as $st_blog_feature_content_array)
                            {
                                if ( $st_blog_feature_content_post_number < $i )
                                {
                                    break;
                                }
                                if ( empty($st_blog_feature_content_array['st-blog-feature-content-post-image']) ) 
                                {
                                    $st_blog_feature_content_post_image = '';
                                }
                                else
                                {
                                    $st_blog_feature_content_post_image = $st_blog_feature_content_array['st-blog-feature-content-post-image'];
                                }
                        
                            
                                ?>
                                      <?php if (!empty($st_blog_feature_content_post_image) || !empty($st_blog_feature_content_array['st-blog-feature-content-post-title']) || !empty($st_blog_feature_content_array['st-blog-feature-content-post-content'])  ) {?>
                                        <div class="st-blog-featured-item">
                                            <?php if (!empty($st_blog_feature_content_post_image)){ ?>
                                                <div class="st-blog-featured-image">
                                                    <a href="<?php echo esc_url($st_blog_feature_content_array['st-blog-feature-content-post-url']);?>"><img src="<?php echo esc_url($st_blog_feature_content_post_image);?>"></a>
                                                </div>
                                            <?php } ?>    
                                            <div class="st-blog-featured-caption text-center">
                                                <h2 class="st-blog-title mb-3 mt-2"><a href="<?php echo esc_url($st_blog_feature_content_array['st-blog-feature-content-post-url']);?>"><?php echo esc_html($st_blog_feature_content_array['st-blog-feature-content-post-title']);?></a></h2>
                                                <p><?php echo esc_html($st_blog_feature_content_array['st-blog-feature-content-post-content']);?></p>
                                                <?php if ( !empty($st_blog_feature_content_array['st-blog-feature-content-post-url']) &&  !empty($st_feature_content_post_button_text)) { ?>
                                                <?php if ( 1 == $st_blog_customizer_all_values['st-blog-feature-content-button-enable'] ) { ?>
                                                    <a href="<?php echo esc_url($st_blog_feature_content_array['st-blog-feature-content-post-url']);?>" class="readmore"><?php echo esc_html($st_feature_content_post_button_text);?></a>
                                                <?php } ?> 
                                                <?php } ?>    
                                            </div>
                                        </div> 
                                      <?php } ?>                 
                                
                            <?php 
                            $i++;
                            }
                            ?>
                    </div>    
                </div>
            </section>
            
        <?php }    
    }
endif;
add_action('st_blog_homepage_featured','st_blog_feature_content_post',20);
