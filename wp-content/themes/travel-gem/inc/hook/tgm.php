<?php
/**
 * Recommended plugins
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_recommended_plugins' ) ) :

	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Page Builder by SiteOrigin', 'travel-gem' ),
				'slug'     => 'siteorigin-panels',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'SiteOrigin Widgets Bundle', 'travel-gem' ),
				'slug'     => 'so-widgets-bundle',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'WP Travel', 'travel-gem' ),
				'slug'     => 'wp-travel',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'travel-gem' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'travel-gem' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);

		tgmpa( $plugins );

	}

endif;

add_action( 'tgmpa_register', 'travel_gem_recommended_plugins' );
