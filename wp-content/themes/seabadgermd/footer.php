<!--Footer-->
<footer class="container page-footer themecolor">
	<div class="row">
		<div class="footer-widget col-md-6 col-lg-3">
			<?php
			if ( is_active_sidebar( 'footer' ) ) {
				dynamic_sidebar( 'footer' );
			}
			?>
		</div>
	
		<!--Footer menu -->
		<div class="footer-menu col-md-6 col-lg-5">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<?php
			wp_nav_menu( array(
				'menu' => 'footer',
				'theme_location' => 'footer',
				'depth' => 1,
			));
			?>
		<?php endif; ?>
		</div>
		<!--/Footer menu-->
	
		<!--Copyright-->
		<div class="footer-copyright col-md-12 col-lg-4">
			<?php
			printf( '%1$s &copy; %2$s <a href="%3$s" rel="nofollow">%4$s</a>',
				esc_html__( 'Copyright', 'seabadgermd' ), esc_html( date( 'Y' ) ),
				esc_html( get_site_url() ), esc_html( get_bloginfo( 'name' ) ) );
			?>
		</div>
		<!--/Copyright-->
	</div>
	<!-- Theme author info -->
	<div class="row footer-themeinfo">
		<div class="col-12">
		<?php $sbmd_theme = wp_get_theme(); ?>
			<?php esc_html_e( 'Theme by', 'seabadgermd' ); ?>
			<a href="<?php echo esc_html( $sbmd_theme->get( 'AuthorURI' ) ); ?>" rel="nofollow">
			<?php echo esc_html( $sbmd_theme->get( 'Author' ) ); ?></a>
		</div>
	</div>
	<!-- /Theme author info -->
</footer>
<!--/Footer-->
<button class="btn themecolor" id="to-the-top"
title="<?php esc_attr_e( 'Back to the top', 'seabadgermd' ); ?>">
	<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
	<span class="sr-only"><?php esc_html_e( 'Back to the top', 'seabadgermd' ); ?></span>
</button>
<?php wp_footer(); ?>
</body>
</html>
