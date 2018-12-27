<main class="site-main" id="main" role="main">
        <div class="card post-card news-big post-header">
                <?php while (have_posts()) :
                         the_post();
                            $id = $post->ID;
                ?>
                <article <?php post_class(); ?>>
                    <div class="featured-media">
                        <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>
                    </div>
                    <div class="card-desc">
                        <div class="card-content card-wrapper">
                            <header class="entry-header">
                                <?php
                                    $cats = cpmmagz_all_taxonomy_name($post->ID, 'category');
                                    $links = cpmmagz_all_taxonomy_link($post->ID, 'category');
                                    foreach ($cats as $cat)
                                      {
                                        cpmmagz_cat_names($cat , $links);
                                     }
                                 ?>
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                    <span class="entry-meta">
                                        <?php cpmmagz_meta_data($post);?>
                                    </span>
                            </header>

                                <!-- Entry Header -->
                            <div class="entry-content clearfix">
                                <?php the_content(); ?>
                            </div>
                            <!-- Entry Content -->
                            <footer class="entry-footer">
                                <?php
                                    $posttags = get_the_tags();
                                    $tagid = cpmmagz_all_taxonomy_link($post->ID, 'category');
                                    if ($posttags) {
                                    ?>
                                    <div class="footer-meta-wrap">
                                        <div class="row valign-wrapper">
                                            <div class="col l12">
                                                <div class="footer-meta">
                                                    <?php
                                                        foreach ($posttags as $tags) {
                                                            cpmmagz_tag_link($tags, $tagid);
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (get_theme_mod('author_toggle') == 1 ) { ?>
                                    <div class="post-author center-align">
                                        <div class="author-img">
                                            <?php echo get_avatar(get_the_author_meta( 'ID' ), 80); ?>
                                        </div>
                                        <div class="author-desc">
                                            <h2>
                                                <?php esc_attr_e('Article By ', 'cpmmagz') ?>
                                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"> <?php echo get_the_author(); ?></a>
                                            </h2>
                                            <p><?php echo esc_attr(get_the_author_meta('description')); ?></p>
                                            <?php
                                                    $author_id = get_the_author_meta('ID');
                                                    $user_info = get_userdata($author_id);
                                                    $author_url = $user_info->user_url;
                                                ?>
                                            <div class="author-links">
                                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php esc_attr_e('Author Archive', 'cpmmagz') ?>">
                                                <?php esc_attr_e('Author Archives', 'cpmmagz') ?></a>
                                                <?php if (!empty($author_url)) :?>
                                                        <a href="<?php the_author_meta('url')  ?>" title="<?php esc_attr_e('Author URL', 'cpmmagz') ?>"><?php esc_attr_e('Author Website', 'cpmmagz') ?></a>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </footer>
                            <!-- Entry Footer -->
                            <?php endwhile;?>

                            <div class="post-navigation post-nav" role="navigation">
                                <h2 class="screen-reader-text"><?php esc_attr_e('Post navigation', 'cpmmagz') ?></h2>
                                <div class="nav-links clearfix">

                                    <div class="nav-next">
                                        <?php $prev_post = get_adjacent_post(false, '', true);
                                            if (! empty($prev_post)) : ?>
                                            <span>
                                                <a href="<?php echo esc_url( get_permalink($prev_post->ID) );?>" class="next-span"><?php echo esc_attr_e('Next Post', 'cpmmagz');?></a>
                                                <?php
                                                    echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '" title="' . esc_attr($prev_post->post_title) . '" rel="next">' . esc_attr(cpmmagz_limit_title($prev_post->post_title, 32)). '<i class="fa fa-long-arrow-right post-arrow"></i></a>';
                                                ?>
                                            </span>
                                            <?php else : ?>
                                            <span class="disabled-nav">
                                                <span class="next-span"><?php echo esc_attr_e('Next Post', 'cpmmagz');?></span>
                                                <?php echo esc_attr_e('No Next Posts', 'cpmmagz'); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="nav-previous">
                                        <?php $next_post = get_adjacent_post(false, '', false); if (! empty($next_post)) : ?>
                                            <span>
                                                <a href="<?php echo esc_url( get_permalink($prev_post->ID) ); ?>" class="next-span"><?php echo esc_attr_e('Previous Post', 'cpmmagz');?></a>
                                                <?php
                                                    echo '<a href="' . esc_url(get_permalink($next_post->ID)). '" title="' . esc_attr($next_post->post_title) . '" rel="prev"><i class="fa fa-long-arrow-left post-arrow"></i>' . esc_attr(cpmmagz_limit_title($next_post->post_title, 29)) . '</a>';
                                                ?>
                                            </span>
                                            <?php else : ?>
                                            <span class="disabled-nav">
                                                <span class="next-span"><?php echo esc_attr_e('Previous Post', 'cpmmagz');?></span>
                                                <?php echo esc_attr_e('No Previous Posts', 'cpmmagz'); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Card Content -->
                    </div>
                    <!-- Card Desc -->
                </article>
     </div><!-- Post Card -->
    <!-- Start The Related Post and Comment Section -->
    <div class="card post-card post-footer">
        <div class="card-desc">
            <div class="card-content card-wrapper">
                <?php
                    $cat = get_the_category($id);
                    if ($cat) {
                        $first_cat = $cat[0]->term_id;
                        $related_args=array(
                            'post_type' => 'post',
                            'category__in' => array($first_cat),
                            'post__not_in' => array($id),
                            'showposts' => 5,
                            );
                        $related_query = new WP_Query($related_args);
                    if ($related_query->found_posts < 0){
                         esc_attr_e('No Related Posts', 'cpmmagz');
                    }
                    if( $related_query->have_posts() ):
                ?>
                <section class="related-posts">
                    <h2 class="section-title"><?php esc_attr_e('Related Posts', 'cpmmagz') ?></h2>
                    <div class="cpmag-carousel multiple-items" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplaySpeed": 5000, "dots": true, "infinite": true, "arrows":false}'>
                        <?php
                        while ( $related_query->have_posts()):
                            $related_query->the_post();
                        ?>
                        <div class="cpmag-carousel-item">
                            <article class="card small news-card">
                                <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>
                                <div class="card-desc">
                                    <div class="card-content">
                                        <span class="label waves-effect waves-light">
                                            <?php  $category = cpmmagz_display_random_catname($post->ID, 'category'); ?>
                                            <a href="<?php echo esc_url($category['link']);?>" >
                                                <?php echo esc_attr($category['name']) ; ?>
                                            </a>
                                        </span>
                                        <h2>
                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </h2>
                                    </div>
                                    <div class="card-action">
                                        <span class="entry-meta">
                                            <?php cpmmagz_meta_data_highlights_homecategory_hot($post); ?>
                                        </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Carousel Item -->
                        <?php endwhile; ?>
                    </div>
                <!-- Cpmag Carousel -->
                </section>
                <?php endif; wp_reset_postdata(); } ?>

                <section id="comments" class="comments-area">
                    <div class="comments-wrap">
                        <div id="respond" class="comment-respond">
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>
                        </div>
                    </div>
                </section> <!-- Comment Section -->
            </div>
        </div>
    </div>
</main>