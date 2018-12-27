</div>

<!-- Footer Start -->

<div class="space-footer box-100 relative">
	<div class="space-footer-bottom relative">
		<div class="space-wrapper space-footer-bottom-ins relative">
			<div class="space-footer-bottom-menu box-100 relative">
				<?php wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'space-footer-menu', 'theme_location' => 'footer-menu', 'depth' => 1, 'fallback_cb' => '__return_empty_string' ) ); ?>
			</div>
			<div class="space-footer-bottom-copyright text-center relative">
					<?php esc_html_e( '&copy; Copyright 2018', 'tethys' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php echo esc_html( get_bloginfo( 'name' ) ) ?></a>. <?php esc_html_e( 'Designed by ', 'tethys' ); ?> <a href="<?php echo esc_url( __( 'https://space-themes.com/', 'tethys' ) ); ?>" target="_blank" title="<?php esc_attr( 'Space-Themes.com', 'tethys' ); ?>"><?php esc_html_e( 'Space-Themes.com', 'tethys' ); ?></a>.
			</div>
		</div>
	</div>
</div>

<!-- Footer End -->

<!-- Back to Top Start -->

<div class="space-totop">
	<a href="#" id="scrolltop" title="<?php esc_attr_e( 'Back to Top', 'tethys' ); ?>"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>

<!-- Back to Top End -->

<!-- Mobile Menu Start -->

<?php get_template_part( '/theme-parts/mobile-menu' ); ?>

<!-- Mobile Menu End -->

<?php wp_footer(); ?>

</body>
</html>