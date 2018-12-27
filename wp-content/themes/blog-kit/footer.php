<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Kit
 */

?>

	</div><!-- #content -->

	<?php

	if ( is_active_sidebar( 'footer-1' ) ||
		 is_active_sidebar( 'footer-2' ) ||
		 is_active_sidebar( 'footer-3' ) ||
		 is_active_sidebar( 'footer-4' ) ) :
	?>

		<aside id="footer-widgets" class="widget-area site-footer" role="complementary">
			<div class="container">
				<?php
				$column_count = 0;

				for ( $i = 1; $i <= 4; $i++ ) {

					if ( is_active_sidebar( 'footer-' . $i ) ) {
						$column_count++;
					}

				} ?>

				<div class="inner-wrapper">
					<?php

					$column_class = 'footer-widgets-column  footer-column-' . absint( $column_count );

					for ( $i = 1; $i <= 4 ; $i++ ) {

						if ( is_active_sidebar( 'footer-' . $i ) ) { ?>

							<div class="<?php echo esc_attr( $column_class ); ?>">

								<?php dynamic_sidebar( 'footer-' . $i ); ?>

							</div>

							<?php
						}

					} ?>
				</div><!-- .inner-wrapper -->
			</div><!-- .container -->
		</aside><!-- #footer-widgets -->

	<?php endif; ?>

	<footer id="colophon" class="bottom-info" role="contentinfo">
		<div class="container">
			<div class="copyrights-info">
				<?php 

				$copyright_text = blog_kit_get_option('copyright_text');

				if ( ! empty( $copyright_text ) ) : ?>

					<div class="copyright">

						<?php echo wp_kses_data( $copyright_text ); ?>

					</div><!-- .copyright -->

					<?php 

				endif; 

				?>

				<div class="site-info">
				    <?php printf( esc_html__( '%1$s by %2$s', 'blog-kit' ), 'Blog Kit', '<a href="https://wpcapsules.com/" rel="designer">WP Capsules</a>' ); ?>
				</div><!-- .site-info -->
			</div>
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>