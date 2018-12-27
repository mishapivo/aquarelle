
<?php
/**
* Template Name: Full width Page
* @package Zovees
*/
get_header();
// zovees_breadcrumbs();
    ?>
    <!-- Start Main content Wrapper -->
    <div class="main-content-wrapper">
        <?php //get_template_part( 'section-parts/section', 'testslider' ); ?>
        <div class="page-content-section ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-9">
                        <?php if ( have_posts() ) :
                            while ( have_posts() ) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                            <?php the_content(); ?>
                            <?php
                               wp_link_pages( array(
                                 'before' => '<div class="page-links">' . esc_html__('Pages: ', 'zovees' ),
                                'after'  => '</div>',
                                ) );
                              ?>
                          <?php endwhile; endif; ?>

                    </div>
                    <div class="col-md-12">
                   <?php if ( comments_open() || get_comments_number() ) :
                      comments_template();
                      endif; ?> 
                </div>
                </div>
            </div>
        </div>
    </div>

<?php
    get_footer();
?>