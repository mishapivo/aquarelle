<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Lifestyle Magazine
 */

?>
	<footer class="main">
		<div class="container">
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</div>
	</footer>
		<div class="copyright text-center spacer">
			<?php esc_html_e( "Powered by", 'lifestyle-magazine' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>"><?php esc_html_e( "WordPress", 'lifestyle-magazine' ); ?></a> | <a href="<?php echo esc_url( 'https://thebootstrapthemes.com/downloads/free-lifestyle-magazine-wordpress-theme/' ); ?>" target="_blank"><?php esc_html_e( 'Lifestyle Magazine by TheBootstrapThemes','lifestyle-magazine' ); ?></a>
		</div>
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner"><i class="fa fa-2x fa-angle-up"></i></span></div> 
		
		<?php wp_footer(); ?>
	</body>
</html>