<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Travel Way
 */

/**
 * travel_way_action_after_content hook
 * @since Travel Way 1.0.0
 *
 * @hooked null
 */
do_action( 'travel_way_action_after_content' );

/**
 * travel_way_action_before_footer hook
 * @since Travel Way 1.0.0
 *
 * @hooked null
 */
do_action( 'travel_way_action_before_footer' );

/**
 * travel_way_action_footer hook
 * @since Travel Way 1.0.0
 *
 * @hooked travel_way_footer - 10
 */
do_action( 'travel_way_action_footer' );

/**
 * travel_way_action_after_footer hook
 * @since Travel Way 1.0.0
 *
 * @hooked null
 */
do_action( 'travel_way_action_after_footer' );

/**
 * travel_way_action_after hook
 * @since Travel Way 1.0.0
 *
 * @hooked travel_way_page_end - 10
 */
do_action( 'travel_way_action_after' );

wp_footer();
?>
</body>
</html>