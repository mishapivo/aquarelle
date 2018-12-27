<?php if( get_theme_mod( 'featured_lifestyle_display_option', false ) ) : ?>
  
  <?php $post_details = get_theme_mod( 'featured_lifestyle_show_hide_details', array( 'date', 'categories', 'tags' ) ); ?>

  <?php
    
      $category_id = get_theme_mod( 'featured_lifestyle_category' );
      $title = get_theme_mod( 'featured_lifestyle_section_title' );
      $posts_per_page = get_theme_mod( 'number_of_featured_lifestyle', 5 );

      $args = array(
        'cat' => absint( $category_id ),
        'posts_per_page' => $posts_per_page,
        'ignore_sticky_posts' => 1
      );
      $query = new WP_Query( $args );

  ?>

  <?php
    if ( $query->have_posts() && $posts_per_page ) :
  ?>

      <div class="featured-blog"> 
        <div class="container">
          <?php if( $title ) : ?>
            <h5 class="section-heading"><?php echo esc_html( $title ); ?></h5>
          <?php endif; ?>
          <div class="featured-layout featured-blog-view-4">
            <?php while ( $query ->have_posts() ) : $query ->the_post(); ?>            
              <div class="featured-blog-items"> 
                <div class="news-snippet">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="featured-image"><?php the_post_thumbnail( 'large' ); ?></a>                      
                  <?php endif; ?>

                  <!-- summary -->
                  <div class="summary">
                    <?php
                      if( in_array( 'categories', $post_details ) ) {
                        $categories = get_the_category();
                        if( ! empty( $categories ) ) :
                          foreach ( $categories as $cat ) { ?>
                            <h6 class="category"><a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></h6>
                          <?php }
                        endif;
                      }
                    ?>

                    <h3 class="news-title">
                      <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h3>

                    <?php if( is_array( $post_details ) && ! empty( $post_details ) ) : ?>
                      <div class="info">

                        <ul class="list-inline">

                          <?php if( in_array( 'author', $post_details ) ) { ?>
                            <li>
                              <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 60 );
                                if( $avatar ) : ?>
                                  <div class="author-image"> 
                                    <?php echo $avatar; ?>
                                  </div>
                                <?php endif; ?>
                                <?php echo esc_html( get_the_author() ); ?>
                              </a>
                            </li>
                          <?php } ?>

                          <?php if( in_array( 'date', $post_details ) ) { ?>
                            <?php $archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?>
                            <li>
                              <i class="fa fa-clock-o"></i>
                              <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date(); ?></a>
                            </li>
                          <?php } ?>

                          <?php if( in_array( 'tags', $post_details ) ) { ?>
                            <?php $tags = get_the_tags();
                            if( ! empty( $tags ) ) :
                              foreach ( $tags as $tag ) { ?>
                                <li>
                                  <a href="<?php echo esc_url( get_category_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
                                </li>
                              <?php }
                            endif; ?>
                          <?php } ?>


                          <?php if( in_array( 'number_of_comments', $post_details ) ) { ?>
                            <li>
                              <i class="fa fa-comments-o"></i>
                              <?php comments_popup_link( __( 'zero comment', 'lifestyle-magazine' ), __( 'one comment', 'lifestyle-magazine' ), __( '% comments', 'lifestyle-magazine' ) ); ?>
                            </li>
                          <?php } ?>

                        </ul>
                      </div>
                    <?php endif; ?>
                    
                    <?php if( in_array( 'description', $post_details ) ) { ?>
                      <div class="summary-excerpt">
                        <?php the_excerpt(); ?>                
                      </div>
                    <?php } ?>

                    <?php if( in_array( 'read-more', $post_details ) ) { ?>

                      <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="" class="readmore">
                        <?php esc_html_e( 'Read More','lifestyle-magazine' ); ?>                
                      </a>
                    <?php } ?>

                  </div>
                  <!-- summary -->
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div> 
      </div> 
      
  <?php endif; ?>
    
<?php endif;