<?php
$name = get_theme_mod('showcase-single-category');
if ($name != 'None') { ?>
    <section id="highlights" class="highlights-section section">
        <?php
            $title = get_theme_mod('highlight_title');
            if ($title) {
        ?>
                <h2 class="section-title"><?php echo esc_attr($title); ?></h2>
        <?php } ?>
                <div class="cpmag-carousel multiple-items"
                    data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplaySpeed": 5000, "dots": true, "infinite": true, "arrows":false}'>
                    <?php
                      $args_high = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'posts_per_page' => 6,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'id',
                                'terms'    => $name,
                                ),
                            ),
                        );
                        $query_high = new WP_Query($args_high);
                        if ($query_high->have_posts()) :
                            while ($query_high->have_posts()) :
                                $query_high->the_post();
                    ?>
                                <div class="cpmag-carousel-item">
                                    <article <?php post_class(); ?>>
                                        <div class="card small news-card">
                                            <?php get_template_part('template-parts/content', get_post_format($post->ID));?>
                                        <div class="card-desc">
                                            <div class="card-content">
                                                <span class="label waves-effect waves-light">
                                                    <?php  $category = cpmmagz_display_random_catname($post->ID, 'category'); ?>
                                                        <a href="<?php echo esc_url($category['link']);?>" ><?php echo esc_attr($category['name']); ?></a>
                                                </span>
                                                <h2><a href="<?php the_permalink();?>" title="<?php echo esc_attr(get_the_title());?>"><?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 68)); ?></a></h2>
                                            </div>
                                            <div class="card-action">
                                                <span class="entry-meta">
                                                    <?php cpmmagz_meta_data_highlights_homecategory_hot($post); ?>
                                              </span>
                                            </div>
                                        </div><!-- card-desc -->
                                        </div>  <!-- card hoverable small -->
                                    </article>
                                </div><!-- cpmag-carousel-item -->
                    <?php
                            endwhile;
                        endif;
                    wp_reset_postdata();
                    ?>
                </div><!-- Cpmag Carousel -->
        </section>
<?php } ?>