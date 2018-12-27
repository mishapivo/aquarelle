<?php
/**
 * Social module
 *
 * @package Buzzo
 */

/**
 * Class Buzzo_Social
 */
class Buzzo_Social {

	/**
	 * Class Buzzo_Social construct.
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_settings' ) );
	}

	/**
	 * Register social settings.
	 *
	 * @param  object $wp_customize WP_Customize object.
	 */
	public function register_settings( $wp_customize ) {
		$social_settings = buzzo_get_social_settings();

		$wp_customize->add_section( 'buzzo_social', array(
			'title'    => __( 'Social network', 'buzzo' ),
			'priority' => 85,
		) );

		foreach ( $social_settings as $key => $value ) {
			$wp_customize->add_setting( 'buzzo_social[' . $key . ']', array(
				'default'              => '',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'esc_url',
			) );
			$wp_customize->add_control( 'buzzo_social[' . $key . ']', array(
				'label'       => $value,
				'section'     => 'buzzo_social',
				'type'        => 'text',
			) );
		}
	}
}
new Buzzo_Social();

/**
 * Get socials name.
 *
 * @return array
 */
function buzzo_get_social_settings() {
	return apply_filters( 'buzzo_social_settings', array(
		'twitter'     => __( 'Twitter', 'buzzo' ),
		'github'      => __( 'Github', 'buzzo' ),
		'wordpress'   => __( 'WordPress', 'buzzo' ),
		'youtube'     => __( 'Youtube', 'buzzo' ),
		'facebook'    => __( 'Facebook', 'buzzo' ),
		'dribbble'    => __( 'Dribbble', 'buzzo' ),
		'digg'        => __( 'Digg', 'buzzo' ),
		'deviantart'  => __( 'Deviantart', 'buzzo' ),
		'flickr'      => __( 'Flickr', 'buzzo' ),
		'google-plus' => __( 'Google plus', 'buzzo' ),
		'instagram'   => __( 'Instagram', 'buzzo' ),
		'pinterest'   => __( 'Pinterest', 'buzzo' ),
		'vimeo'       => __( 'Vimeo', 'buzzo' ),
	) );
}

/**
 * Get socials icon.
 *
 * @return array
 */
function buzzo_get_social_icons() {
	return apply_filters( 'buzzo_social_icons', array(
		'twitter'     => 'fa fa-twitter',
		'github'      => 'fa fa-github',
		'wordpress'   => 'fa fa-wordpress',
		'youtube'     => 'fa fa-youtube',
		'facebook'    => 'fa fa-facebook',
		'dribbble'    => 'fa fa-dribbble',
		'digg'        => 'fa fa-digg',
		'deviantart'  => 'fa fa-deviantart',
		'flickr'      => 'fa fa-flickr',
		'google-plus' => 'fa fa-google-plus',
		'instagram'   => 'fa fa-instagram',
		'pinterest'   => 'fa fa-pinterest',
		'vimeo'       => 'fa fa-vimeo',
	) );
}


if ( ! function_exists( 'buzzo_social_icons' ) ) :
	/**
	 * Display socials icon.
	 */
	function buzzo_social_icons() {
		$social_settings = get_theme_mod( 'buzzo_social', array() );
		$social_icons = buzzo_get_social_icons();

		$output = '';
		foreach ( $social_settings as $key => $value ) {
			if ( ! $value ) {
				continue;
			}

			$title = ucfirst( str_replace( '-', ' ', $key ) );

			$output .= sprintf(
				'<a href="%1$s" title="%4$s" class="social-icon"><i class="%2$s"></i><span class="screen-reader-text">%3$s</span></a>',
				esc_url( $value ),
				isset( $social_icons[ $key ] ) ? esc_attr( $social_icons[ $key ] ) : '',
				esc_html( $title ),
				esc_html( $title )
			);
		}

		if ( empty( $output ) ) {
			return;
		}

		printf( '<div class="social-icons">%s</div>', wp_kses_post( $output ) );
	}
endif;
