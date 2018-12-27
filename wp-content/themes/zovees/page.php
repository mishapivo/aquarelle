<?php
/**
* The template for displaying pages.
* @package Zovees
*/

get_header(); 
zovees_breadcrumbs();
?>
<!-- Start Main content Wrapper -->
<div class="main-content-wrapper">
    <!-- Start blog section -->
    <div class="page-content-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                the_post_thumbnail(); 
                                the_content();
                            endwhile;
                        endif;
                    ?>
                      <?php
                   wp_link_pages( array(
                     'before' => '<div class="page-links">' . esc_html__('Pages: ', 'zovees' ),
                    'after'  => '</div>',
                    ) );
                  ?>
                    <div class="col-md-12">
                   <?php if ( comments_open() || get_comments_number() ) :
                      comments_template();
                      endif; ?>
                </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>