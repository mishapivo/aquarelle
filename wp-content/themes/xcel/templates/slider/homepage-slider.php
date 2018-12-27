<?php
if ( get_theme_mod( 'xcel-setting-slider-type', false ) == 'xcel-setting-no-slider' ) : ?>
    
    <div class="div-no-slider"></div>
    
<?php
elseif ( get_theme_mod( 'xcel-setting-slider-type', false ) == 'xcel-setting-meta-slider' ) : ?>
    
    <?php
    $slider_code = '';
    if ( get_theme_mod( 'xcel-setting-meta-slider-shortcode', false ) ) {
        $slider_code = get_theme_mod( 'xcel-setting-meta-slider-shortcode' );
    } ?>
    
    <?php echo ( $slider_code ) ? do_shortcode( esc_html( $slider_code ) ) : '<div class="no-meta-slider"></div>'; ?>
    
<?php else : ?>
    
    <?php
    $slider_cats = '';
    if ( get_theme_mod( 'xcel-setting-slider-cats', false ) ) {
        $slider_cats = get_theme_mod( 'xcel-setting-slider-cats' );
    } ?>
    
    <?php if( $slider_cats ) : ?>
        
        <?php $slider_query = new WP_Query( 'cat=' . esc_html( $slider_cats ) . '&posts_per_page=-1&orderby=date&order=DESC' ); ?>
        
        <?php if ( $slider_query->have_posts() ) : ?>

            <div class="home-slider-wrap home-slider-remove" data-auto="<?php echo ( get_theme_mod( 'xcel-setting-slider-auto-scroll', false ) ) ? 'false' : '4500'; ?>">
                <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
                <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
                <div class="home-slider">
                    
                    <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();
                        $slider_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );?>
                    
                        <div  class="home-slider-block"<?php echo ( has_post_thumbnail() ) ? ' style="background-image: url(' . esc_url( $slider_thumbnail['0'] ) . ');"' : ''; ?>>
                        
                            <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium.gif" />
                            
                            <div class="home-slider-block-inner">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <p><?php the_content(); ?></p>
                            </div>
                            
                        </div>
                    
                    <?php endwhile; ?>
                    
                </div>
                <div class="home-slider-pager"></div>
            </div>
        
        <?php else : ?>
        
            <div class="no-meta-slider"></div>
            
        <?php endif; wp_reset_query(); ?>
        
    <?php else : ?>
        
        <div class="home-slider-wrap home-slider-remove">
            <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
            <div class="home-slider">
                
                <div class="home-slider-block" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/demo/slider_default_01.jpg);">
                    
                    <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium.gif" />
                    
                    <div class="home-slider-block-inner">
                        <h3>
                            <?php _e( 'Build an Empire', 'xcel' ); ?>
                        </h3>
                        <p><?php _e( 'Build your empire with powerful, easy to use WordPress themes', 'xcel' ); ?></p>
                    </div>
                    
                </div>
                
                <div class="home-slider-block" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/demo/slider_default_02.jpg);">
                    
                    <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium.gif" />
                    
                    <div class="home-slider-block-inner">
                        <h3>
                            <?php _e( 'Keep it simple', 'xcel' ); ?>
                        </h3>
                        <p><?php _e( 'Simply adapting to all devices', 'xcel' ); ?></p>
                    </div>
                    
                </div>
                
            </div>
            <div class="home-slider-pager"></div>
        </div>

    <?php endif; ?>
    
<?php endif; ?>