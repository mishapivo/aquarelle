<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

/**
 * tourable_footer_primary_content hook
 *
 * @hooked tourable_add_contact_section -  10
 *
 */
do_action( 'tourable_footer_primary_content' );

/**
 * tourable_content_end_action hook
 *
 * @hooked tourable_content_end -  10
 *
 */
do_action( 'tourable_content_end_action' );

/**
 * tourable_content_end_action hook
 *
 * @hooked tourable_footer_start -  10
 * @hooked Tourable_Footer_Widgets->add_footer_widgets -  20
 * @hooked tourable_footer_site_info -  40
 * @hooked tourable_footer_end -  100
 *
 */
do_action( 'tourable_footer' );

/**
 * tourable_page_end_action hook
 *
 * @hooked tourable_page_end -  10
 *
 */
do_action( 'tourable_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
