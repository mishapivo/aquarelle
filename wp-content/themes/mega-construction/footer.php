<?php
/**
 * The template for displaying the footer.
 * @package Mega Construction
 */
?>
    <div  id="footer" class="copyright-wrapper">
      <div class="container">
        <div class="footerinner row">
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
      <div class="inner">
          <div class="copyright text-center">
            <p class="testparabt"><?php echo esc_html(get_theme_mod('mega_construction_text',__('Copyright 2017','mega-construction'))); ?> <?php mega_construction_credit_link(); ?></p>
          </div>
          <div class="clear"></div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>