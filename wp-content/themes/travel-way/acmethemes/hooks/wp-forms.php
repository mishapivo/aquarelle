<?php
/**
 * WPForms Theme Parter - Setting up your affiliate tracking.
 *
 * There are 2 ways that your ShareASale affiliate ID can be setup.
 *
 * Getting your ID setup is important because it will be used when a user
 * clicks on any of the various "Upgrade" related links within WPForms Lite.
 *
 * The 2 methods are:
 * - PHP constant
 * - WordPress filter + option (persistent)
 *
 * Below are examples of each method with additional information about it.
 *
 * If you have any questions or need assistance, please just reach out!
 *
 * - Jared, Co-Founder WPForms
 */

/**
 * Method 1 - PHP constant.
 *
 * This is the shortest and easist method. The define is wrapped in a check.
 *
 */

if ( ! defined( 'WPFORMS_SHAREASALE_ID' ) ) {
	define( 'WPFORMS_SHAREASALE_ID', '1798284' );
}

/**
 * Method 2 - WordPress filter.
 *
 * This method is longer but it is persistent.
 *
 * The ShareASale ID also gets stored in an option, so if your user changes
 * themes, then purchases a WPForms upgrade, your ShareASale ID will be used.
 */

/**
 * Set the WPForms ShareASale ID.
 *
 * @param string $shareasale_id The the default Shareasale ID.
 *
 * @return string $shareasale_id
 */
function mythemename_wpforms_shareasale_id( $shareasale_id ) {

	// If this WordPress installation already has an WPForms Shareasale ID
	// specified, use that.
	if ( ! empty( $shareasale_id ) ) {
		return $shareasale_id;
	}

	// Define the Shareasale ID to use.
	$shareasale_id = '1798284';

	// This WordPress installation doesn't have an Shareasale ID specified, so
	// set the default ID in the WordPress options and use that.
	update_option( 'wpforms_shareasale_id', $shareasale_id );

	// Return the Shareasale ID.
	return $shareasale_id;
}
add_filter( 'wpforms_shareasale_id', 'mythemename_wpforms_shareasale_id' );