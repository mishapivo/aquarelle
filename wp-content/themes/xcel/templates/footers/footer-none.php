<footer id="colophon" class="site-footer site-footer-none" role="contentinfo">
	    
    <?php printf( __( '<div class="site-footer-bottom-bar"><div class="site-container"><div class="site-footer-bottom-bar-left">Theme: %1$s by %2$s', 'xcel' ), 'Xcel', '<a href="https://www.kairaweb.com/">Kaira</a></div><div class="site-footer-bottom-bar-right">' ); ?>
                
	<?php wp_nav_menu( array( 'theme_location' => 'footer-bar','container' => false, 'fallback_cb' => false, 'depth'  => 1 ) ); ?>
                
	</div></div><div class="clearboth"></div></div>
	
</footer>