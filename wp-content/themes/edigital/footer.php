<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

$footer_logo_option    = get_theme_mod( 'footer_logo_option', 'show' );
$footer_social_option  = get_theme_mod( 'footer_social_media_option', 'show' );
$footer_copyright_text = get_theme_mod( 'site_copyright_text', '2017 Edigital' );

?>
    <?php if ( !is_page_template( 'templates/home-template.php' ) && !is_front_page() ) { ?>
	   </div><!-- .mt-container -->
    <?php } ?>
    <?php if ( !is_page_template( 'templates/home-template.php' ) && is_front_page() ) { ?>
        </div><!-- .mt-container -->
    <?php } ?>
    </div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php if ( function_exists( 'the_custom_logo' ) && $footer_logo_option == 'show' ) { ?>
				<div class="footer-site-logo"> <?php the_custom_logo(); ?> </div>
		<?php } ?>
		<div class="footer-menu">
			<nav id="site-footer-navigation" class="footer-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'edigital_footer', 'menu_id' => 'footer-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!--.footer-menu -->
		<?php if( $footer_social_option == 'show' ) { ?>
	        <div class="footer-social">
	            <?php edigital_social_icons(); ?>
	        </div>
        <?php } ?>
		<div class="site-info">
			<?php echo wp_kses_post( $footer_copyright_text ); ?>
			<?php printf( esc_html__( ' | Theme: %1$s by %2$s.', 'edigital' ), 'edigital', '<a href="'.esc_url( __( 'https://mysterythemes.com', 'edigital' ) ).'" rel="designer">Mystery Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<div id="mt-scrollup" class="animated arrow-hide"><i class="fa fa-chevron-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
