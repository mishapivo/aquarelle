		</div><!--/.container-->
	</div><!--/#page-->
	
	<footer id="footer" <?php if ( get_theme_mod( 'dark','off' ) == 'on' ): ?>class="dark"<?php endif; ?>>
		
		<?php if ( get_theme_mod('footer-ads') == 'on' ): ?>
		<div class="container" id="footer-ads">
			<?php dynamic_sidebar( 'footer-ads' ); ?>
		</div><!--/.container-->
		<?php endif; ?>
			
		<?php // footer widgets
			$total = 4;
			if ( get_theme_mod( 'footer-widgets','0' ) != '' ) {
				
				$total = get_theme_mod( 'footer-widgets' );
				if( $total == 1) $class = 'one-full';
				if( $total == 2) $class = 'one-half';
				if( $total == 3) $class = 'one-third';
				if( $total == 4) $class = 'one-fourth';
				}

				if ( ( is_active_sidebar( 'footer-1' ) ||
					   is_active_sidebar( 'footer-2' ) ||
					   is_active_sidebar( 'footer-3' ) ||
					   is_active_sidebar( 'footer-4' ) ) && $total > 0 ) 
		{ ?>		
		<div class="container" id="footer-widgets">
			<div class="pad group">
				<?php $i = 0; while ( $i < $total ) { $i++; ?>
					<?php if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
				
				<div class="footer-widget-<?php echo esc_attr( $i ); ?> grid <?php echo esc_attr( $class ); ?> <?php if ( $i == $total ) { echo 'last'; } ?>">
					<?php dynamic_sidebar( 'footer-' . $i ); ?>
				</div>
				
					<?php } ?>
				<?php } ?>
			</div><!--/.pad-->
		</div><!--/.container-->	
		<?php } ?>
		
		<?php if ( has_nav_menu( 'footer' ) ): ?>
			<nav class="nav-container group" id="nav-footer">
				<div class="nav-toggle"><i class="fa fa-bars"></i></div>
				<div class="nav-text"><!-- put your mobile menu text here --></div>
				<div class="nav-wrap"><?php wp_nav_menu( array('theme_location'=>'footer','menu_class'=>'nav container group','container'=>'','menu_id'=>'','fallback_cb'=>false) ); ?></div>
			</nav><!--/#nav-footer-->
		<?php endif; ?>
		
		<div id="footer-bottom">
			<div class="container">
				<a id="back-to-top" href="#"><i class="fa fa-angle-up"></i></a>		
				<div class="pad group">
					
					<div class="grid one-half">
						
						<?php if ( get_theme_mod('footer-logo') ): ?>
							<img id="footer-logo" src="<?php echo esc_url( get_theme_mod('footer-logo') ); ?>" alt="<?php echo esc_attr( get_bloginfo('name')); ?>">
						<?php endif; ?>
						
						<div id="copyright">
							<?php if ( get_theme_mod( 'copyright' ) ): ?>
								<p><?php echo esc_html( get_theme_mod( 'copyright' ) ); ?></p>
							<?php else: ?>
								<p><?php bloginfo(); ?> &copy; <?php echo esc_html( date_i18n( esc_html__( 'Y', 'slanted' ) ) ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'slanted' ); ?></p>
							<?php endif; ?>
						</div><!--/#copyright-->
						
						<?php if ( get_theme_mod( 'credit', 'on' ) == 'on' ): ?>
						<div id="credit">
							<p><?php esc_html_e('Powered by','slanted'); ?> <a href="http://wordpress.org" rel="nofollow">WordPress</a>. <?php esc_html_e('Theme by','slanted'); ?> <a href="http://alxmedia.se" rel="nofollow">Alx</a>.</p>
						</div><!--/#credit-->
						<?php endif; ?>
						
					</div>
					
					<div class="grid one-half last">	
						<?php if ( get_theme_mod( 'footer-social', 'on' ) == 'on' ): ?>
							<?php slanted_social_links() ; ?>
						<?php endif; ?>
					</div>
				
				</div><!--/.pad-->
			</div>
		</div><!--/.container-->
		
	</footer><!--/#footer-->
	
	</div>
</div><!--/#wrapper-->

<?php wp_footer(); ?>
</body>
</html>