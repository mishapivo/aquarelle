<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Gem
 */

?>
				</div><!-- .inner-wrapper -->

			</div><!-- .container -->

		</div><!-- #content -->

		<?php
		/**
		 * Hook - travel_gem_action_footer.
		 *
		 * @hooked travel_gem_add_footer_widgets - 10
		 * @hooked travel_gem_add_footer_copyright - 20
		 */
		do_action( 'travel_gem_action_footer' );
		?>

	</div><!-- #page -->

	<?php wp_footer(); ?>
	</body>
</html>
