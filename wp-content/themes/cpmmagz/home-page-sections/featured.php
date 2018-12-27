<?php $hero = get_option('showcase-single-hero');?>
<?php if ($hero != 'None') { ?>
<section id="featured-section" class="featured-section section">
  <div class="container">
    <div class="row mb0">
      <!-- End Promo Content -->
        <?php
          $args_feat  =
            array(
              'post_type' => 'post',
              'orderby' => 'date',
              'order'   => 'DESC',
              'posts_per_page' => 1,
              'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'id',
                    'terms'    => $hero,
                    ),
                ),
            );
          $query_feat1 = new WP_Query($args_feat);
        ?>

        <?php
          if ($query_feat1->have_posts()) :
            while ($query_feat1->have_posts()) :
              $query_feat1->the_post();
         ?>

        <div class="col l7 m12 s12">
          <div class="big-news-wrap">
            <div class="card medium hoverable news-big">
              <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>

              <!-- featured image -->
              <div class="card-desc valign-wrapper">
                <div class="card-content">
                  <?php
                    $cat_name = cpmmagz_display_category_name(esc_attr($hero));
                    cpmmagz_cat_link_featured($post->ID, $cat_name);
                  ?>
                  <h2>
                    <a href="<?php the_permalink();?>" title="<?php echo esc_attr( get_the_title() );?>">
                      <?php echo esc_attr(cpmmagz_limit_title( get_the_title(), 95 )); ?>
                    </a>
                  </h2>
                  <span class="entry-meta">
                      <?php cpmmagz_meta_data($post); ?>
                  </span>
                  <p><?php echo esc_html(cpmmagz_strip_url_content($post, 21));?></p>
                </div>
                <!-- End card-content -->
              </div>
              <!-- End Card Desc valign-wrapper -->

            </div>
            <!-- End Card Medium -->
          </div>
          <!-- End Big News Wrap -->
        </div><!-- End Column -->

        <?php endwhile;  endif;
          wp_reset_postdata();
        ?>

        <div class="col l5 m12 s12">
            <div class="med-news-wrap">

                <?php
                     $args_feat2  =
                array(
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order'   => 'DESC',
                    'posts_per_page' => 2,
                    'offset' => 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'id',
                            'terms'    => $hero,
                            ),
                        ),
                );

                    $query_feat2 = new WP_Query( $args_feat2 );
                    if ($query_feat2->have_posts()) :
                        while ($query_feat2->have_posts()) :
                            $query_feat2->the_post();
                ?>

                            <article class="card hoverable news-medium">

                                <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>

                                <div class="card-desc valign-wrapper">
                                    <div class="card-content">
                                        <h2>
                                            <a href="<?php the_permalink();?>" title="<?php echo esc_attr( get_the_title() );?>">
                                                <?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 53)); ?>
                                            </a>
                                        </h2>
                                        <span class="entry-meta" >
                                            <?php cpmmagz_meta_data($post); ?>
                                        </span>
                                        <?php
                                            $cat_name = cpmmagz_display_category_name(esc_attr($hero));
                                            cpmmagz_cat_link_featured($post->ID, $cat_name);
                                        ?>
                                    </div>
                                </div>
                            </article>

                <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>


            </div><!-- card-wrapper -->

        </div><!-- col l4 s12 -->
    </div><!-- row mb0 -->

  </div><!-- container -->
</section><!-- featured-section -->
<?php } ?>
