<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jalil
 */
$fb_url = get_theme_mod('fb_url');
$tw_url = get_theme_mod('tw_url');
$link_url = get_theme_mod('link_url');
$google_url = get_theme_mod('google_url');
$instagram_url = get_theme_mod('instagram_url');
?>

	</div><!-- #content -->
	<?php if(is_active_sidebar( 'footer' )): ?>
	<section id="footer-top">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<footer id="footer" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="copyright">
						<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'jalil' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'jalil' ), 'WordPress' );
							?>
						</a></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<ul class="social">
						<li><?php esc_html_e('Follow Us','jalil'); ?></li>
						<li><a href="<?php echo esc_url($fb_url); ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo esc_url($tw_url); ?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo esc_url($link_url); ?>"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="<?php echo esc_url($google_url); ?>"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="<?php echo esc_url($instagram_url); ?>"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>