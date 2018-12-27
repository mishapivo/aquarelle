<?php
/**
* The template for displaying archive page.
* @package Zovees
*/

get_header();
zovees_breadcrumbs();
?>

<!-- Start Main content Wrapper -->
<div class="main-content-wrapper">
    <!-- Start blog section -->
    <div class="content-section ptb-100 gray-bg clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <?php 
                        if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            get_template_part('inc/templates/content', get_post_format() );
                        endwhile; ?>
                    <!-- pagination -->
                    <div class="pagination-area text-center">
                        <?php the_posts_pagination(
                            array(
                              'prev_text' =>esc_html__('&laquo;','zovees'),
                              'next_text' =>esc_html__('&raquo;','zovees')
                            )
                        ); ?>
                    </div>

                    <?php endif; ?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Slider Section -->
<?php get_footer(); ?>