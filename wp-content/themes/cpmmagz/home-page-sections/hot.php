<?php $hot = get_theme_mod('showcase-whot-category');
    if ($hot != 'None') { ?>
        <section id="whatshot" class="hot-section section">
            <?php $title = get_theme_mod('hot_title');
                if ($title) {
            ?>
            <h2 class="section-title"><?php echo esc_attr($title);?></h2>
            <?php } ?>
            <div class="row">
                <?php
                    global $count_posts;
                    global $found_post;

                      $args_hot = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'posts_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'id',
                                'terms'    => esc_attr( $hot ),
                            ),
                        ),
                      );

                    $query_hot = new WP_Query( $args_hot );

                if ($query_hot->have_posts()) :

                    while ($query_hot->have_posts()) :

                        $query_hot->the_post();

                ?>
                        <div class="col l6 m12 s12">
                            <article <?php post_class(); ?>>
                                <div class="card small news-card hoverable">
                                        <?php  get_template_part( 'template-parts/content', get_post_format( $post->ID ) );?>
                                    <div class="card-desc">
                                        <div class="card-content">
                                            <span class="label waves-effect waves-light">
                                                    <?php  $category = cpmmagz_display_random_catname( $post->ID, 'category' ); ?>
                                                        <a href="<?php echo esc_url( $category['link'] );?>" ><?php echo esc_attr( $category['name'] ); ?></a>
                                                </span>
                                            <h2><a href="<?php the_permalink();?>" title="<?php echo esc_attr( get_the_title() );?>"><?php echo esc_attr( cpmmagz_limit_title( get_the_title(), 68 ) ); ?></a></h2>
                                        </div>
                                        <div class="card-action">
                                            <span class="entry-meta">
                                                <?php cpmmagz_meta_data_highlights_homecategory_hot( $post ); ?>
                                            </span>
                                        </div>
                                    </div><!-- Card-desc -->
                                </div><!-- Card -->
                          </article>
                        </div>
                <?php
                            endwhile;
                        endif;
                    wp_reset_postdata();
                ?>

                    <div class="col l6 m12 s12">
                        <?php

                            $args_hot2 = array(
                                'post_type' => 'post',
                                'orderby' => 'date',
                                'order'   => 'DESC',
                                'posts_per_page' => 4,
                                'offset' => 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field'    => 'id',
                                        'terms'    => esc_attr( $hot ),
                                    ),
                                ),
                            );

                            $query_hot2 = new WP_Query($args_hot2);
                            if ($query_hot2->have_posts()) :
                                while ($query_hot2->have_posts()) :
                                    $query_hot2->the_post();
                        ?>
                            <article <?php post_class(); ?>>
                                <div class="card small news-small hoverable">
                                    <?php cpmmagz_small_news_card_image($post->ID);?>
                                    <div class="card-desc">
                                        <div class="card-content">
                                          <h2>
                                            <a href="<?php the_permalink();?>" title="<?php echo esc_attr( get_the_title() );?>">
                                              <?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 48)); ?>
                                            </a>
                                        </h2>
                                            <?php cpmmagz_meta_data_home_category_hot($post); ?>
                                        </div><!-- card-content -->
                                    </div><!-- card-desc -->
                                </div>
                            </article>
                        <?php
                            endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div><!-- col l6 m12 s12 -->
            </div><!-- row -->
        </section><!-- hots -->
<?php } ?>
<!-- What's Hot-->
