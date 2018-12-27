<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vmagazine-lite
 */


?>
<?php if( is_page_template() ){ ?>	
</div><!-- .vmagazine-lite-home-wrapp -->
<?php } ?>
</div><!-- #content -->

	<?php do_action( 'vmagazine_lite_before_footer' ); ?>
	
		<footer id="colophon" class="site-footer footer-one">
			<?php
				/**
				 * @hookedvmagazine_lite_footer_widgets - 0
				 * @hookedvmagazine_lite_button_footer - 10
				 */
				get_template_part( 'layouts/footer/footer', 'layout1' );
			?>		
			
		</footer><!-- #colophon -->
		
	<?php do_action( 'vmagazine_lite_before_footer' ); ?>

<a href="#" class="scrollup">
	<i class="fa fa-angle-up" aria-hidden="true"></i>
</a>
</div><!-- .vmagazine-lite-main-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
