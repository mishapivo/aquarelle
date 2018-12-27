<?php
if ( ! function_exists( 'business_click_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since business-click 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function business_click_before_footer() {
    ?>
    
    
    <!-- *****************************************
             Footer section starts
    ****************************************** -->
    <section class="section fp-auto-height">
            
    <footer class="site-footer">
    <?php
    }
endif;
add_action( 'business_click_action_before_footer', 'business_click_before_footer', 10 );

if ( ! function_exists( 'business_click_widget_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since business-click 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function business_click_widget_before_footer() {
        global $business_click_customizer_all_values;
        if( !is_active_sidebar('full-width-footer') && !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' ) && !is_active_sidebar( 'footer-col-four' )){
            return false;
        }
        $col = 'col';
        ?>
        <!-- footer widget -->
        <div class="evt-img-overlay">

        <section class="evt-footer-widget">
            <div class="container">
                <div class="row">
                     <?php if( is_active_sidebar( 'footer-col-one' )  ) : ?>
                        <div class="<?php echo esc_attr( $col );?> evt-footer-widget-col evision-animate fadeIn">
                            <?php dynamic_sidebar( 'footer-col-one' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( is_active_sidebar( 'footer-col-two' )  ) : ?>
                        <div class="<?php echo esc_attr( $col );?> evt-footer-widget-col evision-animate fadeIn">
                            <?php dynamic_sidebar( 'footer-col-two' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( is_active_sidebar( 'footer-col-three' )  ) : ?>
                        <div class="<?php echo esc_attr( $col );?> evt-footer-widget-col evision-animate fadeIn">
                            <?php dynamic_sidebar( 'footer-col-three' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( is_active_sidebar( 'footer-col-four' ) ) : ?>
                        <div class="<?php echo esc_attr( $col );?> evt-footer-widget-col evision-animate fadeIn">
                            <?php dynamic_sidebar( 'footer-col-four' ); ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </section>

        </div><!-- evt-img-overlay -->
    <?php
    }
endif;
add_action( 'business_click_action_widget_before_footer', 'business_click_widget_before_footer', 10 );

if ( ! function_exists( 'business_click_footer' ) ) :
    /**
     * Footer content
     *
     * @since business-click 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_click_footer() {
        global $business_click_customizer_all_values;
        ?> 
        <!-- footer site info -->
        <section>
            <div class="site-info">
                <div class="container">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    if(isset($business_click_customizer_all_values['business-click-copyright-text'])){
                        echo '<span class= "evt-copyright">';
                        echo wp_kses_post( $business_click_customizer_all_values['business-click-copyright-text'] );
                        echo '</span>';

                    }
                    ?>
                    </a>
                    
                    <span class="sep"> | </span>
                    
                    <?PHP    /* translators: 1: Theme name, 2: Theme author. */
                         printf( esc_html__( 'Theme: %1$s by %2$s', 'business-click' ), esc_html(business_click_theme_name()), sprintf('<a href="%s" target = "_blank" rel="designer">%s</a>', esc_url( 'http://evisionthemes.com/' ), esc_html__( 'eVisionThemes', 'business-click' ) )  ); 

                    ?>
                 </div>
            </div><!-- .site-info -->
        </section><!-- #colophon -->     

    </footer><!-- #colophon -->
    
    </section>
    <!-- *****************************************
             Footer section ends
    ****************************************** -->

        </div><!-- #content -->
    </div>
    <?php
    }
endif;
add_action( 'business_click_action_footer', 'business_click_footer', 10 ); 

if ( ! function_exists( 'business_click_page_end' ) ) :
    /**
     * Page end
     *
     * @since business-click 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function business_click_page_end() {
    global $business_click_customizer_all_values;
        ?>
    <?php
    $scroll_to_top = $business_click_customizer_all_values['business-click-enable-scroll-to-top'];
     if( 1 == $scroll_to_top) {
        ?>
            <a id="evt-scroll-top" class="btn" href="#page"><i class="fa fa-angle-up"></i></a>
        <?php
        } ?>
    </div><!-- #page -->
    <?php }
endif;
add_action( 'business_click_action_after', 'business_click_page_end', 10 );

        
    