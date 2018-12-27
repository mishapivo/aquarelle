 <?php

    /*
     Template Name: Page with no sidebar
    */
    get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">
                 <div class="col  l12">
                    <div id="primary" class="content-area">
                        <main class="site-main" id="main" role="main">
                            <div class="card post-card">
                                <article class="post">
                                        <div class="featured-media">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="card-image valign-wrapper">
                                                    <?php the_post_thumbnail('post-thumb');?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-desc">
                                            <div class="card-content card-wrapper">
                                                <header class="entry-header">
                                                        <?php
                                                            $cats = cpmmagz_all_taxonomy_name($post->ID, 'category');
                                                            $links = cpmmagz_all_taxonomy_link($post->ID, 'category');
                                                            foreach ($cats as $cat) {
                                                                cpmmagz_cat_names($cat , $links);
                                                            }
                                                        ?>
                                                        <h1 class="entry-title"><?php the_title();?></h1>
                                                        <span class="entry-meta">
                                                            <?php cpmmagz_meta_data($post);?>
                                                        </span>
                                                </header><!-- Entry Header -->
                                                <div class="entry-content clearfix">
                                                    <?php the_content(); ?>
                                                </div>
                                            <footer class="entry-footer">
                                                    <div class="footer-meta-wrap">
                                                        <div class="row valign-wrapper">
                                                            <div class="col l6">
                                                                <div class="footer-meta">
                                                                    <?php
                                                                        $posttags = get_the_tags();
                                                                        $tagid = cpmmagz_all_taxonomy_link($post->ID, 'category');

                                                                        if ($posttags) {

                                                                            foreach ($posttags as $tags) {
                                                                                cpmmagz_tag_link($tags, $tagid);
                                                                            }
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                             </footer>
                                                <!-- Entry Footer -->
                                                <section id="comments" class="comments-area">
                                                    <div class="comments-wrap">
                                                        <!-- End comment wrap -->
                                                        <div id="respond" class="comment-respond">
                                                            <?php
                                                            // If comments are open or we have at least one comment, load up the comment template.
                                                            if (comments_open() || get_comments_number()) :
                                                                comments_template();
                                                            endif;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div><!-- card-content card-wrapper -->
                                        </div><!-- card-desc -->
                                </article>
                            </div><!-- card post -->
                        </main><!-- site-main -->
                    </div><!-- primary -->
                 </div><!-- col l12 -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- content -->
<?php endwhile; endif;// End of the loop. ?>
<?php get_footer();?>