<?php
/**
 * The left sidebar containing the main widget area.
 *
 * @package ProfitMag
 */
?>
<?php
$profitmag_settings = get_option( 'profitmag_options' );
if( isset( $profitmag_settings['sidebar_layout']) && ($profitmag_settings['sidebar_layout'] == 'left_sidebar') || ($profitmag_settings['sidebar_layout'] == 'both_sidebar') ): 
?>


<div id="secondary-left" class="widget-area secondary-sidebar f-left clearfix" role="complementary">
<?php if( is_active_sidebar( 'left-sidebar-top' ) ) : ?>
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
         <?php   dynamic_sidebar( 'left-sidebar-top' ); ?>
        </div>
<?php endif; ?>
    
<?php   if( !empty( $profitmag_settings['left_cat_post_one'] ) && $profitmag_settings['left_cat_post_one']>0 ): ?>
            <div id="sidebar-section-cat-one" class="widget-area sidebar clearfix">
                <?php
                    $cat = $profitmag_settings['left_cat_post_one'];
                    $no_of_posts = $profitmag_settings['left_no_of_cat_post_one'];                    
                    $side_query1 = new WP_Query( 'cat='.$cat.'&posts_per_page='.$no_of_posts );
                    if($side_query1->have_posts()):
                        $cat_name = get_cat_name( $cat );
                        $cat_link = get_category_link( $cat );
                        $skip_flag = 1;
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                <?php
                        while( $side_query1->have_posts() ): $side_query1->the_post();
                ?>
                            <div class="featured-post-sidebar clearfix">
                                
                                <?php if( $skip_flag == 1 ): ?>
                                    <figure class="post-thumb clearfix">
                                        <?php
                                            if( has_post_thumbnail() ):
                                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sidebar-medium' );
                                        ?>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                        <?php
                                            endif;
                                        ?>
                                    </figure>
                                <?php endif; ?>
                                
                                <div class="post-desc">
                                    <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    <?php if( $skip_flag == 1 ): ?>
                                        <p class="side-excerpt"><?php profitmag_sidebar_excerpt(get_the_content()); ?></p>
                                        <?php $skip_flag = 0; ?>
                                    <?php endif; ?>                                    
                                </div>
                            </div>
                <?php                        
                        endwhile;
                ?>
                    <div class="view-all-link"><a href="<?php echo esc_url( $cat_link ); ?>" title="View All"><?php _e( 'View All', 'profitmag' ); ?></a></div>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
<?php   endif; ?>


<?php if( !empty( $profitmag_settings['left_sidebar_middle_ads'] ) && $profitmag_settings['left_sidebar_middle_ads'] != '' ): ?>
                        <div id="sidebar-section-mid-ads" class="widget-area sidebar clearfix">
                            <?php echo $profitmag_settings['left_sidebar_middle_ads']; ?>
                        </div>
<?php endif; ?>
    
<?php if( !empty( $profitmag_settings['left_side_gallery'] ) ): ?>
    <div id="sidebar-section-side-gallery" class="widget-area sidebar clearfix">
        <h2 class="block-title"><span class="bordertitle-red"></span><?php _e( 'Photo Gallery', 'profitmag' ); ?></h2>
        <div class="photogallery-wrap clearfix">
        <?php   foreach( $profitmag_settings['left_side_gallery'] as $image ): 
                    $attachment_id = profitmag_get_image_id( $image );
                    $img_url = wp_get_attachment_image_src($attachment_id,'sidebar-gallery');
                    $img_url_full = wp_get_attachment_image_src( $attachment_id, 'full' );
        ?>
                    <a class="nivolight" data-lightbox-gallery="grp-left" href="<?php echo $img_url_full[0];?>"><img src="<?php echo $img_url[0]; ?>" alt="Gallery" /></a>
        <?php
         endforeach;?>
     </div>
    </div>    
<?php endif; ?>    
    
    
<?php   if( !empty( $profitmag_settings['left_cat_post_two'] ) && $profitmag_settings['left_cat_post_two']>0 ): ?>
            <div id="sidebar-section-cat-two" class="widget-area sidebar clearfix">
                <?php
                    $cat = $profitmag_settings['left_cat_post_two'];
                    $no_of_posts = $profitmag_settings['left_no_of_cat_post_two'];                    
                    $side_query1 = new WP_Query( 'cat='.$cat.'&posts_per_page='.$no_of_posts );
                    if($side_query1->have_posts()):
                        $cat_name = get_cat_name( $cat );
                        $cat_link = get_category_link( $cat );
                        $skip_flag = 1;
                ?>
                        <h2 class="block-title"><span class="bordertitle-red"></span><?php echo $cat_name; ?></h2>
                <?php
                        while( $side_query1->have_posts() ): $side_query1->the_post();
                ?>
                            <div class="featured-post-sidebar">
                                
                                <?php if( $skip_flag == 1 ): ?>
                                    <figure class="post-thumb">
                                        <?php
                                            if( has_post_thumbnail() ):
                                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sidebar-medium' );
                                        ?>
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
                                        <?php
                                            endif;
                                        ?>
                                    </figure>
                                <?php endif; ?>
                                
                                <div class="post-desc">
                                    <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?></div>
                                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title(); ?></a></h3>
                                    <?php if( $skip_flag == 1 ): ?>
                                        <p class="side-excerpt"><?php profitmag_sidebar_excerpt(get_the_content()); ?></p>
                                        <?php $skip_flag = 0; ?>
                                    <?php endif; ?>                                    
                                </div>
                            </div>
                <?php                        
                        endwhile;
                ?>
                    <div class="view-all-link"><a href="<?php echo esc_url( $cat_link ); ?>" title="View All"><?php _e( 'View All', 'profitmag' ); ?></a></div>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
<?php   endif; ?>
    
<?php if( is_active_sidebar( 'left-sidebar-middle' ) ) : ?>
        <div id="sidebar-section-side-mid" class="widget-area sidebar clearfix">
         <?php   dynamic_sidebar( 'left-sidebar-middle' ); ?>
        </div>
<?php endif; ?>

<?php if( !empty( $profitmag_settings['left_sidebar_bottom_ads_one'] ) && $profitmag_settings['left_sidebar_bottom_ads_one'] != '' ): ?>
                        <div id="sidebar-section-ads-one" class="widget-area sidebar clearfix">
                            <?php echo $profitmag_settings['left_sidebar_bottom_ads_one']; ?>
                        </div>
<?php endif; ?>

<?php if( !empty( $profitmag_settings['left_sidebar_bottom_ads_two'] ) && $profitmag_settings['left_sidebar_bottom_ads_two'] != '' ): ?>
                        <div id="sidebar-section-ads-two" class="widget-area sidebar clearfix">
                            <?php echo $profitmag_settings['left_sidebar_bottom_ads_two']; ?>
                        </div>
<?php endif; ?>
</div>
<?php endif; ?>
