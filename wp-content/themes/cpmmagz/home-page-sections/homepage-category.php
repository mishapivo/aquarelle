<section id="diff-category" class="category-section section">
    <div class="row">
    <?php for ($number_count = 1; $number_count <= 4; $number_count++) { ?>
        <?php
            $number = $number_count;
            $cat = get_theme_mod('showcase-single-category'.$number);
            if ($cat != 'None' && !empty($cat) ) {
                $args_cat = array(
                      'post_type' => 'post',
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'posts_per_page' => 1,
                      'tax_query' => array(
                            array(
                              'taxonomy' => 'category',
                              'field'    => 'id',
                              'terms'    => $cat,
                          ),
                        )
                  );
                  $query_cat = new WP_Query($args_cat);
                    if ($query_cat->have_posts()) :
                        $arr = array();
                        while ($query_cat->have_posts()) :
                            $query_cat->the_post();
        ?>
                    <?php if ($number == 3) { ?>
                        <div class="clearfix">
                        </div>
                      <?php } ?>
            <div class="col l6 s12">
                    <h2 class="section-title"><a href = "<?php echo esc_url( get_category_link( $cat ) );?>"><?php echo esc_attr(cpmmagz_display_category_name($cat)); ?></a></h2>
                    <article class="card small news-card hoverable">
                        <?php get_template_part('template-parts/content', get_post_format($post->ID));?>
                        <div class="card-desc">
                            <div class="card-content">
                                <span class="label waves-effect waves-light">
                                  <a href="<?php echo esc_url(get_category_link($cat));?>" ><?php echo esc_attr(cpmmagz_display_category_name($cat)); ?></a></span>
                                  <h2><a href="<?php the_permalink();?>" title="<?php echo esc_attr( get_the_title() );?>"><?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 68)); ?></a></h2>
                            </div>
                            <div class="card-action">
                                <span class="entry-meta">
                                  <?php cpmmagz_meta_data_highlights_homecategory_hot($post); ?>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; endif; wp_reset_postdata(); ?>


                <?php
                     $args_cat2 = array(
                        'post_type' => 'post',
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'posts_per_page' => 2,
                      'offset'  => 1,
                      'tax_query' => array(
                              array(
                                'taxonomy' => 'category',
                                'field'    => 'id',
                                'terms'    => $cat,
                            ),
                          )
                        );
                    $query_cat2 = new WP_Query( $args_cat2 );
                    if ($query_cat2->have_posts()) :
                        while ($query_cat2->have_posts()) :
                             $query_cat2->the_post();
                ?>
                            <article class="card small news-small hoverable">
                                <?php cpmmagz_small_news_card_image($post->ID);?>
                                <div class="card-desc">
                                  <div class="card-content">
                                    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() );?>"><?php echo esc_attr( cpmmagz_limit_title( get_the_title(), 21
                                    ) ); ?></a></h2>
                                    <?php cpmmagz_meta_data_home_category_hot( $post ); ?>
                                  </div>
                                </div>
                            </article>
                <?php
                        endwhile;
                    endif;
                     wp_reset_postdata();

                ?>
            </div> <!-- col l6 -->
        <!-- second block -->
    <?php }//if($cat ends)
     } //end for loop?>
    </div>
</section>
