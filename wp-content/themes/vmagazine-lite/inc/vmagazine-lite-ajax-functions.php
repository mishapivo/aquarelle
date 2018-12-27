<?php
/**
* The file contains Ajax functions required for the theme
* @package vmagazine-lite 
* @since 1.0.0
* @author AccessPress Themes
*/



/**
* Ajax Search function
*
*/
function search_function(){
   $key = isset( $_POST['key'] ) ? sanitize_text_field(wp_unslash( $_POST['key'] )) : ''; 

    ob_start();
    $args = array(
            'posts_per_page'    => 3,
            's'                 => $key,
            'post_type'         => 'post',
            'post_status' => 'publish',
            'orderby'     => 'title', 
            'order'       => 'ASC' 
    );
            
    $the_query = new WP_Query( $args);
    ?>
      <div class="search-res-wrap">   
        <?php
        if( $the_query->have_posts() ){
            
            while( $the_query->have_posts() ): $the_query->the_post(); 

                ?>
                
                    <div class="search-content-wrap">
                        <?php if( has_post_thumbnail() ){
                             $has_img = '';
                         ?>
                            <div class="img-wrap">
                                <a href="<?php the_permalink()?>">
                                <?php the_post_thumbnail(); ?>    
                                </a>
                            </div>
                        <?php }else{
                                $has_img = 'no-image';
                        } ?>
                        <div class="cont-search-wrap <?php echo esc_attr($has_img);?>">
                            <div class="title">
                                <a href="<?php the_permalink()?>">
                                    <?php
                                     echo vmagazine_lite_title_excerpt(25); // WPCS: XSS OK.  
                                     ?>
                                </a>
                            </div>
                            <div class="post-meta clearfix">
                                <?php  do_action( 'vmagazine_lite_icon_meta' ); ?>
                            </div><!-- .post-meta --> 
                        </div>
                    </div>
                    <div class="ajax-search-view-all">
                        <a href="<?php echo esc_url( home_url( '/' ).'?s='.$key ); ?>"><?php esc_html_e('View All','vmagazine-lite') ?></a>
                    </div>
                
                <?php
                endwhile;
                }else{ ?>
                    <div class="no-match">
                        <?php esc_html_e('No Match Found','vmagazine-lite'); ?>
                    </div>
                <?php 
                }
                wp_reset_postdata(); ?>
        </div>
    <?php             
    $sv_html = ob_get_contents();
    ob_get_clean();
    echo wp_kses_post($sv_html);
        die();
}
add_action('wp_ajax_search_function','search_function');
add_action( 'wp_ajax_nopriv_search_function', 'search_function' );