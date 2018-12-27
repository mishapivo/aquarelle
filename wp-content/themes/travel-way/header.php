<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Travel Way
 */

/**
 * travel_way_action_before_head hook
 * @since Travel Way 1.0.0
 *
 * @hooked travel_way_set_global -  0
 * @hooked travel_way_doctype -  10
 */
do_action( 'travel_way_action_before_head' );?>
	<head>

		<?php
		/**
		 * travel_way_action_before_wp_head hook
		 * @since Travel Way 1.0.0
		 *
		 * @hooked travel_way_before_wp_head -  10
		 */
		do_action( 'travel_way_action_before_wp_head' );

		wp_head();
		?>

	</head>
<body <?php body_class();?>>

<?php
/**
 * travel_way_action_before hook
 * @since Travel Way 1.0.0
 *
 * @hooked travel_way_site_start - 20
 */
do_action( 'travel_way_action_before' );

/**
 * travel_way_action_before_header hook
 * @since Travel Way 1.0.0
 *
 * @hooked travel_way_skip_to_content - 10
 */
do_action( 'travel_way_action_before_header' );

/**
 * travel_way_action_header hook
 * @since Travel Way 1.0.0
 *
 * @hooked travel_way_header - 10
 */
do_action( 'travel_way_action_header' );

/**
 * travel_way_action_after_header hook
 * @since Travel Way 1.0.0
 *
 * @hooked null
 */
do_action( 'travel_way_action_after_header' );

/**
 * travel_way_action_before_content hook
 * @since Travel Way 1.0.0
 *
 * @hooked null
 */
do_action( 'travel_way_action_before_content' );