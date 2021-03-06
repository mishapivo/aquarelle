<?php
/**
 * The template for displaying the footer
 * @package WordPress
 * @subpackage chalak-driving-school
 * @since 1.0
 * @version 0.1
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		</div>
		<div class="clearfix"></div><hr class="hr-hr">
		<div class="copyright">
			<div class="container">
				<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
			</div>
		</div>
	</footer>
		
<?php wp_footer(); ?>

</body>
</html>