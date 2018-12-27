<?php
/**
 * Plugin recommendation.
 *
 * @package Business_Cast
 */

// Load TGM library.
require_once trailingslashit( get_template_directory() ) . 'vendors/tgm/class-tgm-plugin-activation.php';

if ( ! function_exists( 'business_cast_register_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function business_cast_register_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Contact Form 7', 'business-cast' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'business-cast' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);

		$config = array();

		tgmpa( $plugins, $config );

	}

endif;

add_action( 'tgmpa_register', 'business_cast_register_recommended_plugins' );
