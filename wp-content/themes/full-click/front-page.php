<?php
/**
 * The template for displaying home page.
 * @package full-click
 */
global $business_click_customizer_all_values;

get_header();
if ( 'posts' == get_option( 'show_on_front' ) )
{
    include( get_home_template() );
}
    else
    {
        /* fp menu for full page */
        echo '<ul id="fp-menu">';
            // if enabled
            $i = 1;
            if(  $business_click_customizer_all_values['business-click-enbale-slider'] ) {
                business_click_fp_menu_item('Slider', $i);
                $i++;
            }

            if ( $business_click_customizer_all_values['business-click-feature-enable'] ) {
                business_click_fp_menu_item('Featured', $i);
                $i++;
            }


            $call_to_action_select_page  = absint($business_click_customizer_all_values['business-click-call-to-action-select-from-page']);

            if( $business_click_customizer_all_values['business-click-enable-call-to-action']  ) {
                if( $call_to_action_select_page > 0  ){
                    business_click_fp_menu_item('Call To Action', $i);
                    $i++;
                }
            }


            $about_us_page = absint($business_click_customizer_all_values['business-click-about-us-select-page'] );
            if( $business_click_customizer_all_values['business-click-enable-about-us'] ) {
                if ( $about_us_page > 0 ){
                    business_click_fp_menu_item('About', $i);
                    $i++;
                }
            }

            if($business_click_customizer_all_values['business-click-testimonila-enable'] ) {
                business_click_fp_menu_item('Testimonials', $i);
                $i++;
            }
            
            if( $business_click_customizer_all_values['business-click-blog-section-enable']  ) {
                business_click_fp_menu_item('Blog', $i);
                $i++;
            }

            
            $business_contact_section_title     = esc_html($business_click_customizer_all_values['business-click-contact-section-title']);

            $business_click_contact_form        = esc_attr($business_click_customizer_all_values['business-click-contact-section-short-code']  );

            if( $business_click_customizer_all_values['business-click-contact-section-enable'] ) {
                if(!empty($business_contact_section_title) || !empty($business_click_contact_form)) {
                    business_click_fp_menu_item('Contact', $i);
                    $i++;
                }
            }
        echo '</ul>';



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