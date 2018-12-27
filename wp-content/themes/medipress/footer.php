<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Medipress
 */
?>

   <footer class="footer footer-type3 medical-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                <?php dynamic_sidebar('medipress-footer-widget-area-1'); ?> 
                   
                </div>
                <div class="col-sm-3">
                <?php dynamic_sidebar('medipress-footer-widget-area-2'); ?>
                </div>
                <div class="col-sm-3">
                <?php dynamic_sidebar('medipress-footer-widget-area-3'); ?>
                </div>
                <div class="col-sm-3">
                <?php dynamic_sidebar('medipress-footer-widget-area-4'); ?>
                </div>
            </div>
        </div>
        <div class="copy-row medical-copy-row copy-row-2">
            <div class="container text-center">
                <div class="copy"><p>
                       <?php if( get_theme_mod('medipress_footer_text') ) : ?>
                           <span><?php echo wp_kses_post( html_entity_decode(get_theme_mod('medipress_footer_text'))); ?></span>
                    <?php else : 
                           /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                           printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'medipress' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'medipress' ) ) .'" target="_blank">WordPress.</a>', '</span>' );
                           /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                           printf( esc_html__( ' Theme: medipress by: %1$sDesign By %2$s%3$s', 'medipress' ), '<span>', '<a href="'. esc_url( __( 'http://wordpress.org/', 'medipress' ) ) .'" target="_blank">Themeslook</a>', '</span>' );
                        endif;  ?>
                    </p></div>
            </div>
        </div>
    </footer>
    

    <a class="scroll-top" href="<?php esc_attr__('#','medipress') ?>">
        <i class="fa fa-angle-up"></i>
    </a>
    
    <?php wp_footer();?>
</body>
</html>