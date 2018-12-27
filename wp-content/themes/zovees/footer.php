<?php
/**
* Template part - Footer Section
* @package Zovees
*/

$zovees_header_section = get_theme_mod( 'zovees_header_section_hideshow','hide');

$zovees_header_email = get_theme_mod( "zovees_header_email", 1 );
$zovees_header_phone = get_theme_mod( "zovees_header_phone", 1 );
$zovees_header_address = get_theme_mod( "zovees_header_address", 1 );

$header_args  = array(
    'posts_per_page' => 1
); 

$header_query = new wp_Query( $header_args ); ?>
        <footer class="footer-area">
            <div class="footer-top-section ptb-100 black-bg">
                <div class="container">
                    <div class="row">
                        <div class="widget-wrapper">
                            <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('zovees-footer-widget-area-1'); ?>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('zovees-footer-widget-area-2'); ?>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('zovees-footer-widget-area-3'); ?>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <?php dynamic_sidebar('zovees-footer-widget-area-4'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $zovees_copyright_section = get_theme_mod('zovees_copyright_section_hideshow','show');
                if ($zovees_copyright_section =='show') : ?>
                <div class="footer-bottom text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <?php if( get_theme_mod('zovees_copyright_text') ) : ?>
                                    <p><?php echo wp_kses_post( html_entity_decode(get_theme_mod('zovees_copyright_text'))); ?></p>
                                    <?php else : 
                                    /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                                   printf( esc_html__('%1$sPowered by %2$s%3$s','zovees'),'<span>','<a href="'. esc_url( __( 'https://wordpress.org/','zovees')).'"target="_blank">WordPress.</a>','</span>');
                                   /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                                   printf( esc_html__( ' Theme: Kosmo by: %1$sDesign By %2$s%3$s', 'zovees' ), '<span>', '<a href="'. esc_url( __( 'https://CompanyName.com/', 'zovees' ) ) .'" target="_blank">"' .esc_html__('Company Name','zovees') .'"</a>', '</span>' );
                                  endif;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
        <!-- End footer Section -->
    </div> <!-- .main-wrapper -->
    <!-- All jQuery -->
    <?php wp_footer(); ?>
</body>
</html>