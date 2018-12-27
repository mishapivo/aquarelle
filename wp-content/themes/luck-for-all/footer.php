<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			<?php _e('Designed by','luck-for-all')?> <a rel="nofollow" href="<?php echo esc_url('https://luckforall.club/theme/'); ?>"><?php _e('Luckforall.club','luck-for-all') ?></a>
			<?php if (has_nav_menu( 'footer' )) : ?>
			<div id="footer-menu">
				<?php wp_nav_menu( 'footer' ); ?>
			</div>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>