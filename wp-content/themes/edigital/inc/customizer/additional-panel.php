<?php
/**
 * EDigital Theme Customizer panel for Additional Settings.
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

add_action( 'customize_register', 'edigital_additional_panel_register' );

if( ! function_exists( 'edigital_additional_panel_register' ) ):
	function edigital_additional_panel_register( $wp_customize ) {

		/**
		 * Additional Settings Panel on customizer
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_panel(
	        'edigital_additional_settings_panel', 
	        	array(
	        		'priority'       => 30,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => '',
	            	'title'          => esc_html__( 'Additional Settings', 'edigital' ),
	            ) 
	    );
/*================================================================================================================*/
		/**
		 * Social Icons Section
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_section(
	        'social_icons_section',
	        array(
	            'title'		=> esc_html__( 'Social Icons', 'edigital' ),
	            'panel'     => 'edigital_additional_settings_panel',
	            'priority'  => 5,
	        )
	    );

	    /**
	     * Social icons field
	     *
	     * @since 1.0.0
	     */
	    $ap_social_icons_name = array( 
				'fb_link' => esc_html__( 'Facebook', 'edigital' ),
				'tw_link' => esc_html__( 'Twitter', 'edigital' ),
				'lnk_link' => esc_html__( 'Linkedin', 'edigital' ),
				'pin_link' => esc_html__( 'Pinterest', 'edigital' ),
				'gp_link' => esc_html__( 'Google Plus', 'edigital' ),
				'yt_link' => esc_html__( 'Youtube', 'edigital' ),
			);
	    $count = 3;
	    foreach ( $ap_social_icons_name as $icon_key => $icon_name ) {
	    	$wp_customize->add_setting(
		        $icon_key,
		            array(
		                'default' => '',
		                'sanitize_callback' => 'esc_url_raw'
			       )
		    );    
		    $wp_customize->add_control(
		        $icon_key,
		            array(
		            'type' => 'text',
		            'label' => $icon_name,
		            'section' => 'social_icons_section',
		            'priority' => $count
		            )
		    );
		    $count++;
	    }
/*---------------------------------------------------------------------------------------------------------------*/
		/**
		 * Header settings
		 *
		 * @since 1.0.0
		 */
		$wp_customize->add_section(
	        'additional_header_section',
	        array(
	            'title'		=> esc_html__( 'Header Settings', 'edigital' ),
	            'panel'     => 'edigital_additional_settings_panel',
	            'priority'  => 10,
	        )
	    );

	    /**
	     * Switch option for sticky menu
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'header_sticky_option',
	        array(
	            'default' => 'show',
	            'sanitize_callback' => 'edigital_sanitize_show_switch',
	            )
	    );
	    $wp_customize->add_control( new Edigital_Customize_Switch_Control(
	        $wp_customize, 
	            'header_sticky_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Header Sticky', 'edigital' ),
	                'description' 	=> esc_html__( 'Enable/Disable header sticky option.', 'edigital' ),
	                'section' 	=> 'additional_header_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Enable', 'edigital' ),
	                    'hide' 	=> esc_html__( 'Disable', 'edigital' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );

	}// close function
endif;