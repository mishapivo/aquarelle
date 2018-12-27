<?php

/**
 * The template for displaying home page.
 * @package trade-hub
 */
global $st_blog_customizer_all_values;

get_header();
?>

    </div><!-- .st-blog-site-content -->
</div><!-- #content.container -->

<?php
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );    
} else {
        /**
         * trade_hub_homepage hook
         * @since trade-hub 1.0.0
         *
         * @hooked trade_hub_homepage -  10
         * @sub_hooked trade_hub_homepage -  30
         * @hooked busine_Craft_aboutus _page -16
         * @hooked trade_hub_our_service -21
         */
        if( st_blog_slider_alignment() == 'full_width_slider') {
            do_action('st_blog_homepage');
        }

        do_action('st_blog_homepage_featured');//seperated
        ?>

<div id="home-content" class="container site-content home-static-page">
    <div class="st-blog-site-content">

        <?php     
        $st_blog_static_page = absint($st_blog_customizer_all_values['st-blog-enable-static-page']);
        if ($st_blog_static_page  == 1) { ?>
            <div id="content" class=" container site-content ">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        
                        <?php
                        if( st_blog_slider_alignment() == 'content_slider') {
                            do_action('st_blog_homepage');
                        }
                        ?>

                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
                <?php get_sidebar(); ?>                
            </div>
        <?php }

}
get_footer();