<?php
/**
 * The template for displaying the footer info
 *
 * @package Seasonal
 */
?>


<footer id="colophon" class="site-footer" role="contentinfo">		        
 
			<nav id="footer-nav" role="navigation">
            	<?php wp_nav_menu( array( 
						'theme_location' => 'footer', 
						'fallback_cb' => false, 
						'depth' => 1,
						'container' => false, 
						'menu_id' => 'footer-menu', 
					) ); 
				?>
          	</nav> 
  
		<div class="site-info copyright">
          <?php _e('Copyright &copy;', 'seasonal'); ?> 
          <?php _e(date('Y')); ?> <?php echo esc_html(get_theme_mod( 'copyright', '' )); ?>.&nbsp;<?php _e('All rights reserved.', 'seasonal'); ?> <br /><a href="http://wp-templates.ru/" title="скачать темы для сайта" target="_blank">Темы wordpress</a>

</footer>