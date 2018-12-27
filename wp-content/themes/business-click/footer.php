<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package eVision themes
 * @subpackage business-click
 * @since business-click 1.0.0
 */


/**
 * business_click_action_after_content hook
 * @since business-click 1.0.0
 *
 * @hooked null
 */
do_action( 'business_click_action_after_content' );

/**
 * business_click_action_before_footer hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_before_footer - 10
 */
do_action( 'business_click_action_before_footer' );

/**
 * business_click_action_widget_before_footer hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_widget_before_footer - 10
 */
do_action( 'business_click_action_widget_before_footer' );

	

/**
 * business_click_action_footer hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_footer - 10
 */
do_action( 'business_click_action_footer' );

/**
 * business_click_action_after_footer hook
 * @since business-click 1.0.0
 *
 * @hooked null
 */
do_action( 'business_click_action_after_footer' );

/**
 * business_click_action_after hook
 * @since business-click 1.0.0
 *
 * @hooked business_click_page_end - 10
 */
do_action( 'business_click_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>