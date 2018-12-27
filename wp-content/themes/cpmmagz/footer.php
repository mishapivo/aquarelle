<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #main-wrapper div and all content after.
 *
 * @package CPMMagz
 */
?>
    <!-- Start Site Footer -->
    <footer id="colophon" class="site-footer page-footer" role="contentinfo">

    <!-- Show pre footer if only checked in  -->
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">

                    <!-- Start Footer Widgets -->
                    <?php
                        if (is_active_sidebar('pre-footer1')) { ?>
                            <div class="col l3 m6 s12">
                                <?php dynamic_sidebar('pre-footer1'); ?>
                            </div>
                    <?php } ?>

                    <?php
                        if (is_active_sidebar('pre-footer2')) { ?>
                            <div class="col l3 m6 s12">
                                <?php dynamic_sidebar('pre-footer2'); ?>
                            </div>
                    <?php } ?>

                    <?php
                        if (is_active_sidebar('pre-footer3')) {?>
                            <div class="col l3 m6 s12">
                                <?php dynamic_sidebar('pre-footer3'); ?>
                            </div>
                    <?php } ?>

                    <?php
                        if (is_active_sidebar('pre-footer4')) { ?>
                            <div class="col l3 m6 s12">
                                <?php dynamic_sidebar('pre-footer4'); ?>
                            </div>
                    <?php } ?>
                    <!-- If no footer has been assigned. Display a message to activate the footer widgets -->
                    <?php
                        if (! is_active_sidebar('pre-footer1') &&  ! is_active_sidebar('pre-footer2') && ! is_active_sidebar('pre-footer3') && !is_active_sidebar('pre-footer4'))  {
                                if (is_user_logged_in() && current_user_can('administrator') ){
                            ?>
                                <h3 class="center-align">
                                    <a href="<?php echo esc_url( admin_url( 'customize.php') );?>" target="blank"><i class="fa fa-plus-circle"></i> <?php esc_attr_e('Assign a widget', 'cpmmagz');?></a>
                                </h3>
                    <?php } } ?>
                    <!-- End footer Widgets -->
                </div>
            </div>
            <!-- End Container -->
        </div>
        <!-- End Footer Widget Area -->

        <!-- Start Footer Copyright -->
        <div class="footer-copyright">
            <div class="row">
                <div class="container clear">
                    <div class="col l6 m9 s9 left">
                        <span class="left">
                            <?php  esc_html_e('Theme developed by ', 'cpmmagz'); ?><a href="<?php echo esc_url('https://codethemes.co');?>" target="_blank"><?php esc_html_e('Code Themes', 'cpmmagz'); ?></a>
                        </span>
                    </div>
                    <div class="col l6 m3 s3 right">
                        <a id="totop" class="right to-top" href="#!"><?php esc_html_e('Back To Top', 'cpmmagz');?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Copyright -->

    </footer>
    <!-- End Footer -->

</div>
<!-- End Main Wrapper. That comes from the Header -->

<!-- Start WordPress Footer -->
<?php wp_footer(); ?>
<!-- End WordPress Footer -->
</body>
</html>