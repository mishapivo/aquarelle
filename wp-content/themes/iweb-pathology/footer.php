<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IWeb_Pathology
 */

?>
	</div><!-- #content -->
 
<?php
if ( ! is_active_sidebar( 'footer-1' )
&& ! is_active_sidebar( 'footer-2' )
&& ! is_active_sidebar( 'footer-3' )
&& ! is_active_sidebar( 'footer-4' )

) : ?>
<div id="footer-sidebar-w" style="display:none;"></div>
<?php else : ?>    
	<div id="footer-sidebar-w">
		<div id="footer-sidebar">
			<div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-1' ) ) {
				dynamic_sidebar( 'footer-1' );
			}
			?>
			</div><!--
			--><div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-2' ) ) {
				dynamic_sidebar( 'footer-2' );
			}
			?>
			</div><!--
			--><div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-3' ) ) {
				dynamic_sidebar( 'footer-3' );
			}
			?>
			</div><!--
			--><div class="footer-sidebar1">
			<?php
			if ( is_active_sidebar( 'footer-4' ) ) {
				dynamic_sidebar( 'footer-4' );
			}
			?>
			</div>
		</div>
	</div> 
<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php if ( get_theme_mod( 'iweb_copyright_text' ) != null ) : ?>
			<div id="iweb-cuscr"> 
				<?php echo esc_html( get_theme_mod( 'iweb_copyright_text' ) ); ?>
			</div>
			<?php endif; ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'iweb-pathology' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s','iweb-pathology' ),'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>		
				<a href="<?php echo esc_url( __( 'http://iwebdm.com/wordpress-theme/pathology', 'iweb-pathology' ) ); ?>">
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'iweb-pathology' ), 'IWEB_Pathology', 'IWEBDM.com' );
				?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<button onclick="iweb_patho_topFunction()" id="topBtn" title="<?php echo esc_attr__( 'Go to top','iweb-pathology' ); ?>"><i class="fa fa-circle-up"></i></button>

<?php wp_footer(); ?>
</body>
</html>
