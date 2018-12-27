<?php
/**
 * General Settings Hear
 *
 * @package unique blog
 */

function unique_blog_customize_social_settings( $wp_customize ) {

    //Social share
    $wp_customize->add_section( 'unique_blog_social_section', array(
        'title'    => esc_html__( 'Social Links', 'unique-blog' ),
        'priority' => 3,
        'panel'    =>'footer_panel'
    ) );
    
	
    /**
    * social section enable options
    */
    $wp_customize->add_setting(
        'unique_blog_social_links_enable',
        array(
            'default'           => false,
			'sanitize_callback' => 'unique_blog_sanitize_checkbox',
			
        )
    );
    $wp_customize->add_control(
		new Unique_Blog_Toggle_Control( 
			$wp_customize,
			'unique_blog_social_links_enable',
			array(
				'section'	  => 'unique_blog_social_section',
				'label'		  => esc_html__( 'Enable Social Links', 'unique-blog' ),
                'description' => esc_html__( 'Enable/Disable Social Links.', 'unique-blog' ),
                'priority'      => 1,
			)
		)
	);


    /**
     * Facebook url
     */
    $wp_customize->add_setting( 
        'unique_blog_facebook_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => 'www.facebook.com',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_facebook_url', 
        array(
            'label'         => esc_html__( 'Facebook URL', 'unique-blog' ),
            'section'       => 'unique_blog_social_section',
            'type'          => 'url',
            'priority'      => 3,
            'transport'     =>'postMessage',
        )
    ); 

    /**
    * twitter
    */
    $wp_customize->add_setting( 
        'unique_blog_twitter_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => 'www.twitter.com',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_twitter_url', 
        array(
            'label'         => esc_html__( 'Twitter URL', 'unique-blog' ),
            'section'       => 'unique_blog_social_section',
            'type'          => 'url',
            'priority'      => 3,
            'transport'     =>'postMessage',
        )
    ); 
    

    /**
    * youtube
    */
    $wp_customize->add_setting( 
        'unique_blog_youtube_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => 'www.youtube.com',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_youtube_url', 
        array(
            'label'         => esc_html__( 'Youtube URL', 'unique-blog' ),
            'section'       => 'unique_blog_social_section',
            'type'          => 'url',
            'priority'      => 3,
            'transport'     =>'postMessage',
        )
    );

    /**
    * pinterest
    */
    $wp_customize->add_setting( 
        'unique_blog_pinterest_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => 'www.pinterest.com',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_pinterest_url', 
        array(
            'label'         => esc_html__( 'Pinterest URL', 'unique-blog' ),
            'section'       => 'unique_blog_social_section',
            'type'          => 'url',
            'priority'      => 3,
            'transport'     =>'postMessage',
        )
    );
    

    /**
    * instagram
    */
    $wp_customize->add_setting( 
        'unique_blog_instagram_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => 'www.instagram.com',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_instagram_url', 
        array(
            'label'         => esc_html__( 'Instagram URL', 'unique-blog' ),
            'section'       => 'unique_blog_social_section',
            'type'          => 'url',
            'priority'      => 3,
            'transport'     =>'postMessage',
        )
    );

    

    /**
    * google-plus
    */
    $wp_customize->add_setting( 
        'unique_blog_google_plus_url', 
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => 'www.google-plus.com',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_google_plus_url', 
        array(
            'label'         => esc_html__( 'Google Plus URL', 'unique-blog' ),
            'section'       => 'unique_blog_social_section',
            'type'          => 'url',
            'priority'      => 3,
            'transport'     =>'postMessage',
        )
    );

}
add_action( 'customize_register', 'unique_blog_customize_social_settings' );