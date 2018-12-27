<?php
/**
 * EDigital Theme Customizer
 *
 * Footer Settings Panel
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.6
 *
 *   
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

add_action( 'customize_register', 'edigital_footer_panel_register' );

if( ! function_exists( 'edigital_footer_panel_register' ) ):
    function edigital_footer_panel_register( $wp_customize ) {

        /**
         * Footer Settings Panel on customizer
         *
         * @since 1.0.6
         */
        $wp_customize->add_panel(
            'edigital_footer_settings_panel', 
                array(
                    'priority'       => 30,
                    'capability'     => 'edit_theme_options',
                    'theme_supports' => '',
                    'title'          => esc_html__( 'Footer Settings', 'edigital' ),
                ) 
        );
/*---------------------------------------------------------------------------------------------------------------*/
        /**
         * Footer Settings
         *
         * @since 1.0.6
         */
        $wp_customize->add_section(
            'footer_settings_section',
            array(
                'title'     => esc_html__( 'Footer Settings', 'edigital' ),
                'panel'     => 'edigital_footer_settings_panel',
                'priority'  => 5,
            )
        );

        /**
         * Field for footer logo Option
         *
         * @since 1.0.6
         */
        $wp_customize->add_setting(
            'footer_logo_option',
            array(
                'default' => 'show',
                'sanitize_callback' => 'edigital_sanitize_show_switch',
            )
        );
        $wp_customize->add_control( new EDigital_Customize_Switch_Control(
            $wp_customize, 
                'footer_logo_option', 
                array(
                    'type'      => 'switch',                    
                    'label'     => __( 'Footer Logo', 'edigital' ),
                    'description'   => __( 'Show/hide site logo in footer section.', 'edigital' ),
                    'section'   => 'footer_settings_section',
                    'choices'   => array(
                        'show'  => __( 'Show', 'edigital' ),
                        'hide'  => __( 'Hide', 'edigital' )
                        ),
                    'priority'  => 5,
                )
            )
        );

        /**
         * Field for footer social icons Option
         *
         * @since 1.0.6
         */
        $wp_customize->add_setting(
            'footer_social_media_option',
            array(
                'default' => 'show',
                'sanitize_callback' => 'edigital_sanitize_show_switch',
            )
        );
        $wp_customize->add_control( new EDigital_Customize_Switch_Control(
            $wp_customize, 
                'footer_social_media_option', 
                array(
                    'type'      => 'switch',                    
                    'label'     => __( 'Social Media', 'edigital' ),
                    'description'   => __( 'Show/hide social media icons in footer section.', 'edigital' ),
                    'section'   => 'footer_settings_section',
                    'choices'   => array(
                        'show'  => __( 'Show', 'edigital' ),
                        'hide'  => __( 'Hide', 'edigital' )
                        ),
                    'priority'  => 10,
                )
            )
        );

        /**
         * Field for copyright text
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'site_copyright_text', 
                array(
                    'default' => esc_html__( '2017 Edigital', 'edigital' ),
                    'sanitize_callback' => 'wp_kses_post',
                    'transport' => 'postMessage'
                )
        );
        $wp_customize->add_control(
            'site_copyright_text',
                array(
                    'type' => 'textarea',
                    'label' => esc_html__( 'Copyright Text', 'edigital' ),
                    'section' => 'footer_settings_section',
                    'priority' => 15
                )
        );

    } //function close
endif;