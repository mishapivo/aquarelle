<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Feminine_Munk
 */

?>
        </div>  <!-- class row ends -->
        <?php do_action( 'feminine_munk_after_post_ads' ); ?>
    </div> <!-- class container ends -->
</div><!-- class site-content ends -->

<?php
    /**
     * Footer Social Links
     * 
     * @hooked feminine_munk_footer_social_links
    */
    do_action( 'feminine_munk_footer_social_links' );
?>

<!-- Footer Sidebar -->
<footer id="colophon" class="site-footer" role="contentinfo">

    <?php if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) : ?>

        <div class="footer-t">
            <div class="container">
                <div class="widget-area">
                    <div class="row">

                        <?php if( is_active_sidebar( 'footer-one' ) ){ ?>
                            <div class="column">
                                <?php dynamic_sidebar( 'footer-one' ); ?>
                            </div>    
                        <?php } ?>

                        <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                            <div class="column">
                                <?php dynamic_sidebar( 'footer-two' ); ?> 
                            </div>   
                        <?php } ?>

                        <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                            <div class="column">
                                <?php dynamic_sidebar( 'footer-three' ); ?>  
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

    <?php
    endif;

    do_action( 'feminine_munk_footer_ads' );

    /**
     * Footer credit
     * 
     * @hooked feminine_munk_footer
    */
    do_action( 'feminine_munk_footer' );
    ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>