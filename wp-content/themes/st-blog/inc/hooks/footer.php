<?php
if ( ! function_exists( 'st_blog_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since st-blog 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function st_blog_before_footer()
    { ?>
    </div><!-- .st-blog-site-content -->
    </div><!-- #content -->
        <?php do_action('st_blog_action_front_page');?>
        <?php do_action('footer_social_media');?>
    
    <!-- *****************************************
             Footer section starts
    ****************************************** -->
    <footer id="colophon" class="site-footer st-blog-list">
        <?php
        }
    endif;
    add_action( 'st_blog_action_before_footer', 'st_blog_before_footer', 10 );

    if ( ! function_exists( 'st_blog_widget_before_footer' ) ) :
        /**
         * Footer content
         *
         * @since st-blog 1.0.0
         *
         * @param null
         * @return false | void
         *
         */
        function st_blog_widget_before_footer() {
                global$st_blog_customizer_all_values;
                if (!is_active_sidebar('full-width-footer') && !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' ) ){
                    return false;
                }
                
                $col = 'col st-blog-footer-widget-col';
                ?>

                    <!-- full width footer -->
                    <section>
                        <div class="container full-width-footer">
                            <div class="row">
                                <div id="full-width-footer">
                                <?php
                                if(is_active_sidebar('full-width-footer')){
                                dynamic_sidebar('full-width-footer');
                                }
                                ?>
                            </div>
                        </div>
                    </section><!-- full width widget ended -->

                    <div class="st-blog-footer-widget">
                        <div class="container">
                            <div class="st-blog-main-footer">
                                <div class="row">
                                    <?php if( is_active_sidebar( 'footer-col-one' )  ) : ?>
                                        <div class="<?php echo esc_attr( $col );?>">
                                            <?php dynamic_sidebar( 'footer-col-one' ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( is_active_sidebar( 'footer-col-two' )  ) : ?>
                                        <div class="<?php echo esc_attr( $col );?>">
                                            <?php dynamic_sidebar( 'footer-col-two' ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( is_active_sidebar( 'footer-col-three' )  ) : ?>
                                        <div class="<?php echo esc_attr( $col );?>">
                                            <?php dynamic_sidebar( 'footer-col-three' ); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>   
                    </div>  
        <!-- footer widget -->
        
            
        <?php
        }
    endif;
    add_action( 'st_blog_action_widget_before_footer', 'st_blog_widget_before_footer', 10 );

    if ( ! function_exists( 'st_blog_footer' ) ) :
        /**
         * Footer content
         *
         * @since st-blog 1.0.0
         *
         * @param null
         * @return null
         *
         */
        function st_blog_footer() {
            global$st_blog_customizer_all_values;
            ?> 
            <!-- footer site info -->
            <?php if ( !empty($st_blog_customizer_all_values['st-blog-copyright-text'])   ) { ?>
                <div class="site-content py-0">
                    <div class="site-info">
                        <div class="container">
                            <?php
                                    if(isset($st_blog_customizer_all_values['st-blog-copyright-text'])){
                                        echo '<span class="st-blog-footer-copyright">';
                                        echo wp_kses_post( $st_blog_customizer_all_values['st-blog-copyright-text'] );
                                        echo '</span>';
                                    }
                                    ?>
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'st-blog' ) ); ?>">
                            </a>
                            
                            <span class="sep"> | </span>
                                <?php
                                /* translators: 1: Theme name, 2: Theme author. */
                                printf( esc_html__( 'Theme: %1$s by %2$s', 'st-blog' ), st_blog_theme_name(), sprintf('<a href="%s" target = "_blank" rel="designer">%s</a>', esc_url( 'http://salientthemes.com/' ), esc_html__( 'Salient Themes', 'st-blog' ) )  );
                                ?>
                             
                        </div>
                    </div><!-- .site-info -->
                </div>
            <?php } ?>

        </footer><!-- #colophon -->
        </div><!-- #page -->
        <!-- *****************************************
                 Footer section ends
        ****************************************** -->
        <?php
        }
    endif;
    add_action( 'st_blog_action_footer', 'st_blog_footer', 10 );

    if ( ! function_exists( 'st_blog_page_end' ) ) :
        /**
         * Page end
         *
         * @since st-blog 1.0.0
         *
         * @param null
         * @return null
         *
         */
        function st_blog_page_end() {
        global$st_blog_customizer_all_values;
            ?>
        <?php
         if( 1 ==$st_blog_customizer_all_values['st-blog-enable-back-to-top']) {
            ?>
                
            <!-- scroll-top -->
            <a href="#!" id="st-blog-scroll-top" class="btn"><i class="fas fa-long-arrow-alt-up"></i></a><!-- return to top button -->
            <?php
            } ?>
        </div><!-- #page -->
        <?php }
    endif;
    add_action( 'st_blog_action_after', 'st_blog_page_end', 10 );