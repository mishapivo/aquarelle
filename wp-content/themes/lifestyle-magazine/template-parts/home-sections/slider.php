<?php if( get_theme_mod( 'slider_display_option', $default = false ) ) : ?>

  <?php
    $category_id = get_theme_mod( 'slider_category' );
    $number_of_posts = get_theme_mod( 'number_of_slider', 3 );

    $post_details = get_theme_mod( 'slider_details_show_hide', array( 'date', 'categories', 'summary', 'readmore' ) );

    $category_args = array(
      'cat' => $category_id,
      'posts_per_page' => $number_of_posts
    );

    $query = new WP_Query( $category_args );
  ?>

  <?php if ( $query->have_posts() && $number_of_posts ) : ?>

    <div class="slider-banner slider-banner-2">
      <div id="owl-slider" class="owl-carousel"> 
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="item">
              <div class="banner-news-list">
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                  <div class="banner-news-image">
                  <?php if( ! empty( $image ) ) : ?>                 
                    <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-responsive">
                  <?php endif; ?>
                  </div>
                  <div class="banner-news-caption">
                    <?php
                      if( in_array( 'categories', $post_details ) ) :
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $categories ) ) :
                          foreach ( $categories as $cat ) {
                            $output .= '<h6 class="category"><a class="news-category" href="'. esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></h6>' . $separator;
                          }
                          echo trim( $output, $separator );
                        endif;
                      endif
                    ?>
                    <h3 class="news-title"><a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php the_title(); ?></a></h3>
                    <?php if( in_array( 'date', $post_details ) ) : ?>
                      <div class="info">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo get_the_date(); ?>
                      </div>
                    <?php endif; ?>

                    <?php if( in_array( 'summary', $post_details ) ) : ?>
                        <div class="summary"> 
                          <?php echo lifestyle_magazine_excerpt( 25 ); ?>
                        </div>
                      <?php endif; ?>
                    <?php if( in_array( 'readmore', $post_details ) ) : ?>
                      <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" class="readmore"><?php esc_attr_e( 'Read More', 'lifestyle-magazine' ); ?></a>
                    <?php endif; ?>
                  </div> 
              </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div> 
    </div>


  <?php endif; ?>

<?php endif;