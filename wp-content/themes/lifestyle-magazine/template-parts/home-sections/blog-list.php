<?php if( get_theme_mod( 'homepage_blog_display_option', $default = true ) ) : ?>
    <?php
        global $paged;
        $default_posts_per_page = get_option( 'posts_per_page' );
        $archive_cat = get_theme_mod( 'homepage_blog_section_category' );
        $args = array(
            'post_type' => 'post',
            'cat'       => absint( $archive_cat ),
            'posts_per_page'    => absint( $default_posts_per_page ),
            'paged' => get_query_var( 'page' ) ? get_query_var('page') : 1
        );
        $wp_query = new WP_Query( $args );
    ?>

    <?php
        $view = get_theme_mod( 'blog_post_view', 'grid-view' );
        $content_column_class = 'col-sm-12';    

        if( $view == 'full-width' ) {
            $content_column_class = 'col-sm-12';
        }
        
        if ( $wp_query->have_posts() ) { ?>
            <div class="home-archive inside-page post-list">
                       
                    
                <?php $archive_title = get_theme_mod( 'archive_title' ); ?>
                  <?php if( ! empty( $archive_title ) ) { ?><h2 class="news-heading"><?php echo esc_html( $archive_title ); ?></h2><?php } ?>
            	<div class="<?php echo esc_attr( $view ); ?> blog-list-block">                                         
                  
                    <?php /* Start the Loop */ ?>
                    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                        <?php
                            get_template_part( 'template-parts/content' );
                        ?>
                    <?php endwhile; ?>
                  
                <?php wp_reset_postdata(); ?>
              </div>
            
            <?php                                    
              if (  $wp_query->max_num_pages > 1 ) {
                if( get_theme_mod( 'pagination_type', 'ajax-loadmore' ) == 'ajax-loadmore' ) { ?>
                  <button class="loadmore"><?php esc_html_e( 'More posts', 'lifestyle-magazine' ); ?></button>
                <?php }
                if( get_theme_mod( 'pagination_type', 'ajax-loadmore' ) == 'number-pagination' ) {
                  lifestyle_magazine_numeric_posts_nav();
                }
              }
            ?>
                    
                
            </div>
            
            
        <?php } ?>
    
<?php endif; ?>