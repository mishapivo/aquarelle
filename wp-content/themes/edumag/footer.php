<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */


/**
 * edumag_primary_content_footer hook
 *
 * @hooked edumag_add_blogs_section -  10
 *
 */
do_action( 'edumag_primary_content_footer' );

/**
 * edumag_content_end_action hook
 *
 * @hooked edumag_content_end -  10
 *
 */
do_action( 'edumag_content_end_action' );

/**
 * edumag_footer_content hook
 *
 * @hooked edumag_get_footer_content -  10
 *
 */
do_action( 'edumag_footer_content' );

/**
 * edumag_back_to_top hook
 *
 * @hooked edumag_back_to_top -  10
 *
 */
do_action( 'edumag_back_to_top' );

/**
 * edumag_page_end_action hook
 *
 * @hooked edumag_page_end -  10
 *
 */
do_action( 'edumag_page_end_action' ); 
?>

<?php wp_footer(); ?>

</body>
</html>
