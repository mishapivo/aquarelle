<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogger_Era
 */

?>
	<?php
	/**
	 * Hook - blogger_era_action_after_content.
	 *
	 * @hooked blogger_era_content_end -  10
	 */
	do_action( 'blogger_era_action_after_content' );
	?>

	<?php
	/**
	 * Hook - blogger_era_action_before_footer.
	 *
	 * @hooked blogger_era_footer_start -  10
	 */
	do_action( 'blogger_era_action_before_footer' );
	?>
	<?php
	/**
	 * Hook - blogger_era_action_footer.
	 *
	 * @hooked blogger_era_footer -  10
	 */
	do_action( 'blogger_era_action_footer' );
	?>
	<?php
	/**
	 * Hook - blogger_era_action_after_content.
	 *
	 * @hooked blogger_era_footer_end -  10
	 */
	do_action( 'blogger_era_action_after_content' );
	?>
	<?php
	/**
	 * Hook - blogger_era_action_after.
	 *
	 * @hooked blogger_era_page_end -  10
	 */
	do_action( 'blogger_era_action_after' );
	?>

<?php wp_footer(); ?>

</body>
</html>
