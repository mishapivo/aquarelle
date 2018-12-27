<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package euphoric
 */

?>
<?php
$go_top = get_theme_mod('disable-go-top','euphoric');
?>
	</div><!-- #content -->
	<?php
	/**
	 * Instagram Feed
	 */
	do_action('euphoric_frontend_instagram_feed'); ?>

	<footer id="colophon" class="site-footer">

			<?php 
				/**
				 * Footer settings and Options
				 */
				do_action ('euphoric_frontend_footer_settings'); 
			?>

		<div class="copyright-area">
			<div class="wrap">
				<div class="site-info">
					<?php if ( !class_exists( 'Euphoric_Pro' ) ) { ?>
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'euphoric' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'euphoric' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s By %2$s.', 'euphoric' ), 'Euphoric <span class="sep"> | </span> ', '<a href="'.esc_url('https://themespiral.com/').'">ThemeSpiral.com</a>' );
					} else {
						/**
						 * Footer Copyright
						 */
						do_action ('euphoric_footer_copyright_frontend');
					} ?>
				</div><!-- .site-info -->
					<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) { ?>
							<div class="footer-right-info">
								<?php the_privacy_policy_link(); ?>
							</div>
						<?php }
					?>
			</div><!-- .wrap -->
		</div><!-- .copyright-area -->
	</footer><!-- #colophon -->
	<?php if( $go_top ==0 ) { ?>
		<span href="#" class="back-to-top"><i class="fa fa-long-arrow-up"></i><?php esc_html_e('Go Top','euphoric'); ?></span>
	<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
