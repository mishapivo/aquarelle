<?php

if(!function_exists('cpmmagz_general_settings_customizer')):
	function cpmmagz_general_settings_customizer( $wp_customize ) {
		// Social media Settings

		$wp_customize->add_section(
			'social_section',
			array(
				'title' =>esc_html__('Social Media Settings', 'cpmmagz' ),
				'description' => esc_html__('This is a section for the social media settings','cpmmagz'),
				'priority' => 8,
				'panel'    => 'cpm_theme_options_panel',
			)
		);

		//Social Media
		$wp_customize->add_setting(
			'facebook_link',
			array(
				'default' => 'http://www.facebook.com',
			 	'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			'facebook_link',
			array(
				'label' => esc_html__( 'Facebook Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 1
			)
		);
		$wp_customize->add_setting(
			'twitter_link',
			array(
				'default' => 'http://www.twitter.com',
			 	'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			'twitter_link',
			array(
				'label' => esc_html__( 'Twitter Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 2
			)
		);
		$wp_customize->add_setting(
			'youtube_link',
			array(
				'default' => 'http://www.youtube.com',
			 	'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			'youtube_link',
			array(
				'label' => esc_html__( 'Youtube Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 3
			)
		);
		$wp_customize->add_setting(
			'instagram_link',
			array(
				'default' => 'http://www.instagram.com',
			 	'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			'instagram_link',
			array(
				'label' => esc_html__( 'Instagram Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 4
			)
		);
		$wp_customize->add_setting(
			'linkedin_link',
			array(
				'default' => 'http://www.linkedin.com',
			 	'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			'linkedin_link',
			array(
				'label' => esc_html__( 'linkedin Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 5
			)
		);

		$wp_customize->add_setting(
			'pinterest_link',
			array(
				'default' => 'http://www.pinterest.com',
			 	'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			'pinterest_link',
			array(
				'label' => esc_html__( 'pinterest Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 6
			)
		);

		$wp_customize->add_setting(
			'google+_link',
			array(
				'default' => 'http://www.plus.google.com',
			 	'sanitize_callback' => 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			'google+_link',
			array(
				'label' => esc_html__( 'google+ Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 6
			)
		);

		$wp_customize->add_setting(
			'tumblr_link',
			array(
				'default' => 'http://www.tumblr.com',
			 	'sanitize_callback' => 'esc_url_raw'

			)
		);
		$wp_customize->add_control(
			'tumblr_link',
			array(
				'label' => esc_html__( 'tumblr Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 7
			)
		);

		$wp_customize->add_setting(
			'wordpress_link',
			array(
				'default' => 'http://www.wordpress.org',
			 	'sanitize_callback' => 'esc_url_raw'

			)
		);
		$wp_customize->add_control(
			'wordpress_link',
			array(
				'label' => esc_html__( 'wordpress Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 8
			)
		);

		$wp_customize->add_setting(
			'dribble_link',
			array(
				'default' => 'http://www.dribble.com',
			 	'sanitize_callback' => 'esc_url_raw'


			)
		);
		$wp_customize->add_control(
			'dribble_link',
			array(
				'label' => esc_html__( 'dribble Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 9
			));

		$wp_customize->add_setting(
			'skype_link',
			array(
				'default' => 'username',
			 	'sanitize_callback' => 'esc_url_raw'


			)
		);
		$wp_customize->add_control(
			'skype_link',
			array(
				'label' => esc_html__( 'skype Link', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 10
			));

		$wp_customize->add_setting(
			'mail_link',
			array(
				'default' => 'example@domain.com',
			 	'sanitize_callback' => 'esc_html'


			)
		);
		$wp_customize->add_control(
			'mail_link',
			array(
				'label' => esc_html__( 'mail', 'cpmmagz' ),
				'section' => 'social_section',
				'type' => 'text',
				'priority' => 11
			));
	}
	add_action( 'customize_register', 'cpmmagz_general_settings_customizer');
endif;