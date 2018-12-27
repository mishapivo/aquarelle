<?php

function thesimplest_social_icons( $wp_customize ) {

	/**
	 * Social Settings Section
	 */
	$wp_customize->add_section( 'thesimplest_social_section', array(
		'title'                 =>  esc_html__( 'Social Settings', 'thesimplest' ),
		'panel'                 =>  'thesimplest_panel'
	) );

	/**
	 * Facebook Social Handle Setting
	 */
	$wp_customize->add_setting( 'thesimplest_facebook_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
        array(
	        'sanitize_callback'     =>  'esc_url_raw',
        )
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'thesimplest_facebook_social_input',
			array(
				'label'         =>  esc_html__( 'Facebook', 'thesimplest' ),
				'section'       =>  'thesimplest_social_section',
				'settings'      =>  'thesimplest_facebook_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Twitter Social Handle Setting
	 */
	$wp_customize->add_setting( 'thesimplest_twitter_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'thesimplest_twitter_social_input',
			array(
				'label'         =>  esc_html__( 'Twitter', 'thesimplest' ),
				'section'       =>  'thesimplest_social_section',
				'settings'      =>  'thesimplest_twitter_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Google Plus Social Handle Setting
	 */
	$wp_customize->add_setting( 'thesimplest_google_plus_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
        array(
	        'sanitize_callback'     =>  'esc_url_raw',
        )
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'thesimplest_google_plus_social_input',
			array(
				'label'         =>  esc_html__( 'Google Plus', 'thesimplest' ),
				'section'       =>  'thesimplest_social_section',
				'settings'      =>  'thesimplest_google_plus_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Linkedin Social Handle Setting
	 */
	$wp_customize->add_setting( 'thesimplest_linkedin_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'thesimplest_linkedin_social_input',
			array(
				'label'         =>  esc_html__( 'Linkedin', 'thesimplest' ),
				'section'       =>  'thesimplest_social_section',
				'settings'      =>  'thesimplest_linkedin_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Instagram Social Handle Setting
	 */
	$wp_customize->add_setting( 'thesimplest_instagram_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'thesimplest_instagram_social_input',
			array(
				'label'         =>  esc_html__( 'Instagram', 'thesimplest' ),
				'section'       =>  'thesimplest_social_section',
				'settings'      =>  'thesimplest_instagram_handle',
				'type'          =>  'url'
			)
		)
	);


	/**
	 * Pinterest Social Handle Setting
	 */
	$wp_customize->add_setting( 'thesimplest_pinterest_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback'     =>  'esc_url_raw',
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'thesimplest_pinterest_social_input',
			array(
				'label'         =>  esc_html__( 'Pinterest', 'thesimplest' ),
				'section'       =>  'thesimplest_social_section',
				'settings'      =>  'thesimplest_pinterest_handle',
				'type'          =>  'url'
			)
		)
	);

	/**
	 * Email Social Handle Setting
	 */
	$wp_customize->add_setting( 'thesimplest_email_handle', array(
		'default'               =>  '',
		'transport'             =>  'refresh',
		array(
			'sanitize_callback' => 'sanitize_email'
		)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'thesimplest_email_social_input',
			array(
				'label'         =>  esc_html__( 'Email', 'thesimplest' ),
				'section'       =>  'thesimplest_social_section',
				'settings'      =>  'thesimplest_email_handle',
				'type'          =>  'email'
			)
		)
	);

}

function thesimplest_social_icons_output() {
	$thesimplest_facebook_handle       =   get_theme_mod( 'thesimplest_facebook_handle' );
	$thesimplest_twitter_handle        =   get_theme_mod( 'thesimplest_twitter_handle' );
	$thesimplest_google_plus_handle    =   get_theme_mod( 'thesimplest_google_plus_handle' );
	$thesimplest_linkedin_handle       =   get_theme_mod( 'thesimplest_linkedin_handle' );
	$thesimplest_instagram_handle      =   get_theme_mod( 'thesimplest_instagram_handle' );
	$thesimplest_pinterest_handle      =   get_theme_mod( 'thesimplest_pinterest_handle' );
	$thesimplest_email_handle          =   get_theme_mod( 'thesimplest_email_handle' );
	$thesimplest_search_icon_handle    =   (get_theme_mod( 'thesimplest_search_icon_handle' ) != 0 ? ' vertical-bar' : '');

	if( $thesimplest_facebook_handle || $thesimplest_twitter_handle || $thesimplest_google_plus_handle || $thesimplest_linkedin_handle || $thesimplest_instagram_handle || $thesimplest_pinterest_handle || $thesimplest_email_handle ) : ?>
		<div class="social-links<?php echo esc_attr($thesimplest_search_icon_handle); ?>">
			<?php if( $thesimplest_facebook_handle ) : ?>
				<a href="<?php echo esc_url( $thesimplest_facebook_handle ); ?>" target="_blank"><span class="fa fa-facebook"></span></a>
			<?php endif; ?>

			<?php if( $thesimplest_twitter_handle ) : ?>
				<a href="<?php echo esc_url( $thesimplest_twitter_handle ); ?>" target="_blank"><span class="fa fa-twitter"></span></a>
			<?php endif; ?>

			<?php if( $thesimplest_google_plus_handle ) : ?>
				<a href="<?php echo esc_url( $thesimplest_google_plus_handle ); ?>" target="_blank"><span class="fa fa-google-plus"></span></a>
			<?php endif; ?>

			<?php if( $thesimplest_linkedin_handle ) : ?>
				<a href="<?php echo esc_url( $thesimplest_linkedin_handle ); ?>" target="_blank"><span class="fa fa-linkedin"></span></a>
			<?php endif; ?>

			<?php if( $thesimplest_instagram_handle ) : ?>
				<a href="<?php echo esc_url( $thesimplest_instagram_handle ); ?>" target="_blank"><span class="fa fa-instagram"></span></a>
			<?php endif; ?>

			<?php if( $thesimplest_pinterest_handle ) : ?>
				<a href="<?php echo esc_url( $thesimplest_pinterest_handle ); ?>" target="_blank"><span class="fa fa-pinterest"></span></a>
			<?php endif; ?>

			<?php if( $thesimplest_email_handle ) : ?>
				<a href="mailto:<?php echo sanitize_email($thesimplest_email_handle); ?>" title="<?php echo esc_attr($thesimplest_email_handle); ?>"><span class="fa fa-envelope"></span></a>
			<?php endif; ?>
		</div>
	<?php
    else :
	    return null;
	endif;
}