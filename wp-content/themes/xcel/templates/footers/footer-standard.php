<footer id="colophon" class="site-footer site-footer-standard" role="contentinfo">
	
	<div class="site-footer-widgets">
        
        <div class="site-container">
            <?php if ( is_active_sidebar( 'xcel-site-footer-standard' ) ) : ?>
	            <ul>
	                <?php dynamic_sidebar( 'xcel-site-footer-standard' ); ?>
	            </ul>
	        <?php else : ?>
	        	<div class="site-footer-no-widgets">
	        		<?php _e( 'Add your own widgets here', 'xcel' ); ?>
	        	</div>
	    	<?php endif; ?>
            <div class="clearboth"></div>
			
			<?php printf( __( '</div></div><div class="site-footer-bottom-bar"><div class="site-container"><div class="site-footer-bottom-bar-left">Theme: %1$s by %2$s', 'xcel' ), 'Xcel', '<a href="https://www.kairaweb.com/">Kaira</a></div><div class="site-footer-bottom-bar-right">' ); ?>
                
	        <?php wp_nav_menu( array( 'theme_location' => 'footer-bar','container' => false, 'fallback_cb' => false, 'depth'  => 1 ) ); ?>
                
	    </div></div><div class="clearboth"></div>
	</div>
	
</footer>