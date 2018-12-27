<?php
/**
 * The template for displaying home page.
 * @package business-click
 */
global $business_click_customizer_all_values;

get_header();
if ( 'posts' == get_option( 'show_on_front' ) )
{
    include( get_home_template() );
}
    else
    {
		/**
		 * business_click_homepage hook
		 * @since business-click 1.0.0
		 *
		 * @hooked business_click_homepage -  10
		 * @sub_hooked business_click_homepage -  30
         * @hooked busine_Craft_aboutus _page -16
         * @hooked business_click_our_service -21
		 */
          
        do_action( 'business_click_homepage_slider' );
        do_action( 'business_click_homepage' );

        $business_click_static_page = absint($business_click_customizer_all_values['business-click-enable-static-page']);
        do_action('business_click_link');
        if (0 != $business_click_static_page ) { ?>
            <section class="section fp-auto-height">
                <div class="evt-img-overlay">
                    <div class="container pt-4">
                        <div class="row">
                            <div id="primary" class="content-area">
                                <main id="main" class="site-main" role="main">

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
                            <?php
                                get_sidebar();
                            ?>
                        </div>
                        
                    </div>
                </div>
            </section>
        <?php }

        
    }
get_footer();