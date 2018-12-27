<?php

function thesimplest_misc_options( $wp_customizer ) {

	/**
	 * TheSimplest Misc Options Section
	 */
	$wp_customizer->add_section( 'thesimplest_misc_section', array(
		'title'                 =>  esc_html__( 'Misc Settings', 'thesimplest' ),
		'panel'                 =>  'thesimplest_panel'
	) );

	/**
	 * Search Icon
	 */
	$wp_customizer->add_setting( 'thesimplest_search_icon_handle', array(
		'default'               =>  1,
		'sanitize_callback'     =>  'thesimplest_search_icon_sanitize',
		'transport'             =>  'refresh'
	) );
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'thesimplest_search_icon_input',
			array(
				'label'         =>  esc_html__( 'Show Search Icon', 'thesimplest' ),
				'section'       =>  'thesimplest_misc_section',
				'settings'      =>  'thesimplest_search_icon_handle',
				'type'          =>  'checkbox'
			)
		)
	);

}

function thesimplest_social_search_check() {
	$thesimplest_facebook_handle       =   get_theme_mod( 'thesimplest_facebook_handle' );
	$thesimplest_twitter_handle        =   get_theme_mod( 'thesimplest_twitter_handle' );
	$thesimplest_google_plus_handle    =   get_theme_mod( 'thesimplest_google_plus_handle' );
	$thesimplest_linkedin_handle       =   get_theme_mod( 'thesimplest_linkedin_handle' );
	$thesimplest_instagram_handle      =   get_theme_mod( 'thesimplest_instagram_handle' );
	$thesimplest_pinterest_handle      =   get_theme_mod( 'thesimplest_pinterest_handle' );
	$thesimplest_email_handle          =   get_theme_mod( 'thesimplest_email_handle' );
	$thesimplest_search_icon_handle    =   get_theme_mod( 'thesimplest_search_icon_handle', 1 );

	if( $thesimplest_facebook_handle || $thesimplest_twitter_handle || $thesimplest_google_plus_handle || $thesimplest_linkedin_handle || $thesimplest_instagram_handle || $thesimplest_pinterest_handle || $thesimplest_email_handle || $thesimplest_search_icon_handle ) :
		return 1;
	else :
		return 0;
	endif;

}