<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elementare
 */

?>

	</div><!-- #content -->
	<?php $showSearchButton = elementare_options('_search_button', '1');
	if ($showSearchButton) : ?>
	<!-- Start: Search Form -->
	<div class="opacityBoxSearch"></div>
	<div class="search-container">
		<?php get_search_form(); ?>
	</div>
	<!-- End: Search Form -->
	<?php endif; ?>
	<div class="opacityBox"></div>
	<footer id="colophon" class="site-footer">
	<div class="mainFooter">
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="footerArea">
				<div class="elementareFooterWidget">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<aside id="footer-1" class="widget-area footer" role="complementary">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</aside><!-- #footer-1 -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<aside id="footer-2" class="widget-area footer" role="complementary">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</aside><!-- #footer-2 -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<aside id="footer-3" class="widget-area footer" role="complementary">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</aside><!-- #footer-3 -->
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="site-copy-down">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'elementare' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'elementare' ), 'WordPress' );
				?></a>
				<span class="sep"> | </span>
				<?php 
					/* translators: 1: theme name, 2: theme developer */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'elementare' ), '<a target="_blank" href="https://crestaproject.com/downloads/elementare/" rel="nofollow" title="Elementare Theme">Elementare</a>', 'CrestaProject' );
				?>
			</div><!-- .site-info -->
			<div class="site-social">
				<?php 
				$showInFooter =  elementare_options('_social_footer', '1');
				if ($showInFooter == 1) {
					elementare_show_social_network('footer');
				} ?>
			</div><!-- .site-social -->
		</div><!-- .site-copy-down -->
		<nav id="footer-navigation" class="second-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'depth' => 1, 'fallback_cb' => false ) ); ?>
		</nav>
	</div><!-- .mainFooter -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_sidebar('push'); ?>
<?php 
$showInFloat = elementare_options('_social_float', '');
if ($showInFloat == 1) {
	elementare_show_social_network('float');
} ?>
<?php $scrollToTopMobile = elementare_options('_scroll_top', ''); ?>
<a href="#top" id="toTop" class="<?php echo $scrollToTopMobile ? 'scrolltop_on' : 'scrolltop_off' ?>"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>
</body>
</html>
