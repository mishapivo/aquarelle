<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * mohini_before_footer hook.
 *
 */
do_action( 'mohini_before_footer' );
?>

<div <?php mohini_footer_class(); ?>>
	<?php
	/**
	 * mohini_before_footer_content hook.
	 *
	 */
	do_action( 'mohini_before_footer_content' );

	/**
	 * mohini_footer hook.
	 *
	 *
	 * @hooked mohini_construct_footer_widgets - 5
	 * @hooked mohini_construct_footer - 10
	 */
	do_action( 'mohini_footer' );

	/**
	 * mohini_after_footer_content hook.
	 *
	 */
	do_action( 'mohini_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * mohini_after_footer hook.
 *
 */
do_action( 'mohini_after_footer' );

wp_footer();
?>

</body>
</html>
