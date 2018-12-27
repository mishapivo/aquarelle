<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buzzo
 */

if ( ! Buzzo_Sidebar::is_no_sidebar() ) {
	get_sidebar();
}
?>
		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-copyright">
			<div class="container">
				<?php
				$copyright_default = sprintf( __( '&copy; [year]. Made with love by <a href="%s">Awethemes</a>', 'buzzo' ), esc_url( 'http://awethemes.com' ) );
				$copyright = get_theme_mod( 'buzzo_copyright', $copyright_default );
				$copyright = str_replace( '[year]', date_i18n( __( 'Y', 'buzzo' ) ), $copyright );

				if ( $copyright ) {
					printf(
						'<div class="copyright">%s</div>',
						wp_kses_post( $copyright )
					);
				}
				?>

				<?php if ( get_theme_mod( 'buzzo_social_on', true ) ) : ?>
					<?php buzzo_social_icons(); ?>
				<?php endif; ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
