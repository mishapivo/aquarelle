<?php
if ( !function_exists('st_blog_fetaure_slider_array')  ) :
 /**
  * fetaure slider
  *
  * @since st-blog 1.0.0
  *
  * @param $from_slider
  * @return array
  *
  */
 function st_blog_fetaure_slider_array($from_slider)
 {
    global $st_blog_customizer_all_values;
    $st_blog_feature_slider_number_of_slider                         = absint($st_blog_customizer_all_values['st-blog-number-of-slider']);
    $st_blog_slider_number_of_word                                   = absint($st_blog_customizer_all_values['st-blog-number-of-word']);
    $st_blog_feature_slider_content_array[0]['st-blog-fs-title']     = '';
    $st_blog_feature_slider_content_array[0]['st-blog-fs-content']   = '';
    $st_blog_feature_slider_content_array[0]['st-blog-fs-image']     = '';
    $st_blog_feature_slider_content_array[0]['st-blog-fs-url']       = ''; 

    $reapeted_page = array('feature-slider-page-id'); 
    $st_blog_feature_slider_args = array();

    if('from-category' == $from_slider) 
    {
        $st_blog_fs_category = $st_blog_customizer_all_values['st-blog-select-post-from-category'];
        if ( 0  != $st_blog_fs_category  )
        {
            $st_blog_feature_slider_args = array(
                'post_type'             => 'post',
                'posts_per_page'        => $st_blog_feature_slider_number_of_slider,
                'cat'                   => $st_blog_fs_category,
                'ignore_sticky_posts'   => true
            );
        }
    }
    else
    {
        $st_blog_fs_posts = salient_customizer_get_repeated_all_value(2,$reapeted_page);
        if ( null != $st_blog_fs_posts ) 
        {
            foreach( $st_blog_fs_posts as $st_blog_fs_post )
            {
                if ( 0 != $st_blog_fs_post['feature-slider-page-id'] )
                {
                    $st_blog_fs_section_post_ids[]  = $st_blog_fs_post['feature-slider-page-id'];
                }
            }

            if(!empty ($st_blog_fs_section_post_ids ) ) 
            {
                $st_blog_feature_slider_args = array(
                    'post_type'      => 'page',
                    'post__in'       => $st_blog_fs_section_post_ids,
                    'posts_per_page' => $st_blog_feature_slider_number_of_slider,
                    'order_by'       => 'post__in',
                    'order'          => 'ASC',
                );

            }
        }
    }

    if ( !empty($st_blog_feature_slider_args) )
    {
        // query start
        $st_blog_fs_query = new WP_Query( $st_blog_feature_slider_args );

        if ( $st_blog_fs_query->have_posts() ) :
            $i = 0;
            while( $st_blog_fs_query->have_posts() ) :
                $st_blog_fs_query->the_post();
                $thumb_image = '';
                if( has_post_thumbnail() )
                {
                    //st-blog-feature-slider-image
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id() ), 'large');
                    $thumb_image = $thumb['0'];
                }
                $st_blog_feature_slider_content_array[$i]['st-blog-fs-title']           = get_the_title();
                if( has_excerpt() )
                {
                    $st_blog_feature_slider_content_array[$i]['st-blog-fs-content']     = get_the_excerpt();
                }else
                {
                    $st_blog_feature_slider_content_array[$i]['st-blog-fs-content']     =  st_blog_words_count( $st_blog_slider_number_of_word, get_the_content() ) ;
                }
                $st_blog_feature_slider_content_array[$i]['st-blog-fs-url']             = esc_url(get_permalink());
                $st_blog_feature_slider_content_array[$i]['st-blog-fs-image']           = $thumb_image;
                $i++;
            endwhile;
            wp_reset_postdata();
        endif;
    }
    return $st_blog_feature_slider_content_array;
 }
endif;

if( !function_exists('st_blog_feature_slider') ) :
       /**
     * Featured Slider
     *
     * @since st-blog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function st_blog_feature_slider()
    {
        global $st_blog_customizer_all_values;
       
        if( 1 != $st_blog_customizer_all_values['st-blog-feature-slider-enable'] )
        {
            return null;
        }
        $st_blog_select_post_type_options = $st_blog_customizer_all_values['st-blog-select-post-form'];
        $st_blog_fs_arrays =  st_blog_fetaure_slider_array($st_blog_select_post_type_options);
        if ( is_array($st_blog_fs_arrays) )
        {
            $st_blog_fs_enable_button                   = $st_blog_customizer_all_values['st-blog-enable-button'];
            
            $st_blog_feature_slider_button_text         = $st_blog_customizer_all_values['st-blog-button text'];
            $st_blog_feature_slider_number_of_slider    = $st_blog_customizer_all_values['st-blog-number-of-slider'];  

        ?>
        <section id="st-blog-banner" class="mb-5" style="opacity: 0;">
            <div class="st-blog-banner-slider">
                <?php
                    $i = 0;
                    foreach($st_blog_fs_arrays as $st_blog_fs_array)
                    {
                        if ($st_blog_feature_slider_number_of_slider < $i)
                        {
                            break;
                        } 
                        if ( empty($st_blog_fs_array['st-blog-fs-image']) ) 
                        {
                            $st_blog_feature_slider_image = ''; 
                        }
                        else
                        {
                            $st_blog_feature_slider_image = $st_blog_fs_array['st-blog-fs-image'];
                        }
                    
                        ?>
                        <div>
                            <div class="st-blog-banner-image st-blog-overlay position-relative" <?php if(  !empty($st_blog_feature_slider_image)) {?> style="background-image: url(<?php echo esc_url($st_blog_feature_slider_image); ?>);"<?php } ?> >
                                <?php if(  !empty($st_blog_feature_slider_image)) {?> 
                                    <a href="<?php echo esc_url($st_blog_fs_array['st-blog-fs-url']); ?>" class="st-blog-banner-image-link" style="display: none;">
                                        <img src="<?php echo esc_url($st_blog_feature_slider_image); ?>">
                                    </a>
                                <?php } ?>
                                <div class="st-blog-banner-caption">
                                    <h2 class="st-blog-title text-white mb-4"><a href="<?php echo esc_url($st_blog_fs_array['st-blog-fs-url']); ?>" class=""><?php echo esc_html($st_blog_fs_array['st-blog-fs-title']);?></a></h2>
                                    <p><?php echo esc_html($st_blog_fs_array['st-blog-fs-content']);?></p>
                                    <?php if (!empty($st_blog_feature_slider_button_text) ) { ?>
                                        <?php if( 1 == $st_blog_fs_enable_button ) {?>
                                            <a href="<?php echo esc_url($st_blog_fs_array['st-blog-fs-url']); ?>" class="btn"><?php echo esc_html($st_blog_feature_slider_button_text); ?></a>
                                        <?php } ?>
                                    <?php } ?>    
                                </div>
                            </div>
                        </div>
                    <?php
                    $i++;
                    }
                    ?>

            </div>

        </section>

    <?php } 
    }
endif;
add_action('st_blog_homepage','st_blog_feature_slider',10);

