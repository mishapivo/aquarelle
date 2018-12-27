<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Indrajeet
 */

?>
	
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="widget-area">
				<div class="row">

					<?php
					/**
					*Hook indrajeet_footer_widget_wrapper.
					*
					*@hooked indrajeet_footer_widgets - 10
					*@hooked indrajeet_footer_menu - 15
					*/
					do_action( 'indrajeet_footer_widget_wrapper' );
					?>
					
				</div>
			</div>	
		</div>		
	</footer><!-- #colophon -->

	<div class="below-footer">
		<div class="container">
			<div class="row">
				<div class="site-info">

						<?php esc_html_e( 'Proudly powered by', 'indrajeet' ); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'indrajeet' ) ); ?>"><?php esc_html_e( 'WordPress', 'indrajeet' ); ?></a>
				
				<span class="sep"> | </span>
					
					<?php apply_filters( 'ws_footer_credits_text', printf( esc_html__( '%1$s by %2$s.', 'indrajeet' ), 'Indrajeet', '<a href="http://sushill.com.np/" rel="designer">Sus Hill</a>' ) ); ?>


				</div><!-- .site-info -->
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
