<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package architectwp
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<div class="grid-wide">
		<div class="col-6-12 left">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="col-6-12 right">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
	</div>

		<div class="site-info col-1-1">

			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'draft-portfolio' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'architectwp' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'architectwp' ), 'ArchitectWP', '<a href="https://aperturewp.com/downloads/architectwp/" rel="designer">Aperture WP</a>' ); ?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
