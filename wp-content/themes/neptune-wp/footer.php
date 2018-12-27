<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Neptune WP
 */

?>

	</div><!-- #content -->
</div> <!--#page-->
<?php $bg = get_header_image(); ?>
	<footer id="colophon" class="site-footer" style="background-image: url('<?php echo $bg; ?>');background-size:cover;">
		<div class="footer-overlay"></div>
		<div class="grid-wide">
		<div class="col-3-12">
			<?php dynamic_sidebar('footer-1');?>
		</div>

		<div class="col-3-12">
			<?php dynamic_sidebar('footer-2');?>
		</div>

		<div class="col-3-12">
			<?php dynamic_sidebar('footer-3');?>
		</div>

		<div class="col-3-12">
			<?php dynamic_sidebar('footer-4');?>
		</div>
		<div class="site-info col-1-1">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'neptune-wp' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'neptune-wp' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'neptune-wp' ), 'Neptune WP', '<a href="https://https://neptunewp.com/downloads/neptune-wp">Neptune WP</a>' );
			?>
		</div><!-- .site-info -->
	</div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
