<?php
/**
 * The template for displaying the footer.
 * @package Kindergarten Education
 */
?>
    <div class="footer-wp">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-1');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-2');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-3');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-4');?>
                </div>
            </div>
        </div>
    </div>      
	<div class="inner">
        <div class="copyright-wrapper">
            <div class="copyright">
                <span><?php echo esc_html(get_theme_mod('kindergarten_education_footer_copy',__('Kindergarten Education Theme Design & Developed By','kindergarten-education'))); ?> <?php kindergarten_education_credit(); ?>
                </span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
        
    <?php wp_footer(); ?>

</body>
</html>