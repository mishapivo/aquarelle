<?php
/**
 * Add required and recommended plugins.
 *
 * @package Digimag Lite
 */

add_action( 'tgmpa_register', 'digimag_lite_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function digimag_lite_register_required_plugins() {
	$plugins = digimag_lite_required_plugins();

	$config = array(
		'id'          => 'digimag-lite',
		'has_notices' => false,
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function digimag_lite_required_plugins() {
	return array(
		array(
			'name' => esc_html__( 'Jetpack', 'digimag-lite' ),
			'slug' => 'jetpack',
		),
	);
}
