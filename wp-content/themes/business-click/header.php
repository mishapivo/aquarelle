<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-click
 */

/**
 * business_click_action_before_head hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_set_global -  0
 * @hooked business_click_doctype -  10
 */
do_action( 'business_click_action_before_head' );?>

<head>

	<?php
	/**
	 * business_click_action_before_wp_head hook
	 * @since business-click 1.0.0
	 *
	 * @hooked business_click_before_wp_head -  10
	 */
	do_action( 'business_click_action_before_wp_head' );

	wp_head();

	/**
	 * business_click_action_after_wp_head hook
	 * @since business-click 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'business_click_action_after_wp_head' );
	?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * business_click_action_before hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_page_start - 15
 */
do_action( 'business_click_action_before' );

/**
 * business_click_action_before_header hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_skip_to_content - 10
 */
do_action( 'business_click_action_before_header' );

/**
 * business_click_action_header hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_after_header - 10
 */
do_action( 'business_click_action_header' );

/**
 * business_click_action_nav_page_start hook
 * @since business-click 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'business_click_action_nav_page_start' );

/**
 * business_click_action_on_header hook
 * @since business-click 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'business_click_action_on_header' );

/**
 * business_click_action_before_content hook
 * @since business-click 1.0.0
 *
 * @hooked null
 */
do_action( 'business_click_action_before_content' );

?>

