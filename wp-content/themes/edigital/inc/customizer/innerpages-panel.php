<?php
/**
 * EDigital Theme Customizer
 *
 * FrontPage Settings Panel
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 *
 *   
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

add_action( 'customize_register', 'edigital_innerpages_panel_register' );

if( ! function_exists( 'edigital_innerpages_panel_register' ) ):
    function edigital_innerpages_panel_register( $wp_customize ) {

        // Register the radio image control class as a JS control type.
        $wp_customize->register_control_type( 'EDigital_Customize_Control_Radio_Image' );

        /**
         * InnerPages Settings Panel on customizer
         *
         * @since 1.0.0
         */
        $wp_customize->add_panel(
            'edigital_innerpages_settings_panel', 
                array(
                    'priority'       => 20,
                    'capability'     => 'edit_theme_options',
                    'theme_supports' => '',
                    'title'          => esc_html__( 'InnerPages Settings', 'edigital' ),
                ) 
        );
/*---------------------------------------------------------------------------------------------------------------*/
        /**
         * Archive Settings
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'archive_settings_section',
            array(
                'title'     => esc_html__( 'Archive Settings', 'edigital' ),
                'panel'     => 'edigital_innerpages_settings_panel',
                'priority'  => 5,
            )
        );      

        /**
         * Field for Image Radio
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'edigital_archive_sidebar',
            array(
                'default'           => 'right_sidebar',
                'sanitize_callback' => 'sanitize_key',
            )
        );
        $wp_customize->add_control( new EDigital_Customize_Control_Radio_Image(
            $wp_customize,
            'edigital_archive_sidebar',
                array(
                    'label'    => esc_html__( 'Archive Sidebars', 'edigital' ),
                    'description' => esc_html__( 'Choose sidebar from available layouts', 'edigital' ),
                    'section'  => 'archive_settings_section',
                    'choices'  => array(
                            'left_sidebar' => array(
                                'label' => esc_html__( 'Left Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/left-sidebar.png'
                            ),
                            'right_sidebar' => array(
                                'label' => esc_html__( 'Right Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/right-sidebar.png'
                            ),
                            'no_sidebar' => array(
                                'label' => esc_html__( 'No Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/no-sidebar.png'
                            ),
                            'no_sidebar_center' => array(
                                'label' => esc_html__( 'No Sidebar Center', 'edigital' ),
                                'url'   => '%s/assets/images/no-sidebar-center.png'
                            )
                    ),
                    'priority' => 5
                )
            )
        );

/*---------------------------------------------------------------------------------------------------------------*/
        /**
         * Page Settings
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'page_settings_section',
            array(
                'title'     => esc_html__( 'Page Settings', 'edigital' ),
                'panel'     => 'edigital_innerpages_settings_panel',
                'priority'  => 10,
            )
        );

        /**
         * Field for sidebar Image Radio
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'edigital_default_page_sidebar',
            array(
                'default'           => 'right_sidebar',
                'sanitize_callback' => 'sanitize_key',
            )
        );      
        $wp_customize->add_control( new EDigital_Customize_Control_Radio_Image(
            $wp_customize,
            'edigital_default_page_sidebar',
                array(
                    'label'    => esc_html__( 'Page Sidebars', 'edigital' ),
                    'description' => esc_html__( 'Choose sidebar from available layouts', 'edigital' ),
                    'section'  => 'page_settings_section',
                    'choices'  => array(
                            'left_sidebar' => array(
                                'label' => esc_html__( 'Left Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/left-sidebar.png'
                            ),
                            'right_sidebar' => array(
                                'label' => esc_html__( 'Right Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/right-sidebar.png'
                            ),
                            'no_sidebar' => array(
                                'label' => esc_html__( 'No Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/no-sidebar.png'
                            ),
                            'no_sidebar_center' => array(
                                'label' => esc_html__( 'No Sidebar Center', 'edigital' ),
                                'url'   => '%s/assets/images/no-sidebar-center.png'
                            )
                    ),
                    'priority' => 5
                )
            )
        );
/*---------------------------------------------------------------------------------------------------------------*/
        /**
         * Post Settings
         *
         * @since 1.0.0
         */
        $wp_customize->add_section(
            'post_settings_section',
            array(
                'title'     => esc_html__( 'Post Settings', 'edigital' ),
                'panel'     => 'edigital_innerpages_settings_panel',
                'priority'  => 15,
            )
        );

        /**
         * Field for sidebar Image Radio
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'edigital_default_post_sidebar',
            array(
                'default'           => 'right_sidebar',
                'sanitize_callback' => 'sanitize_key',
            )
        );      
        $wp_customize->add_control( new EDigital_Customize_Control_Radio_Image(
            $wp_customize,
            'edigital_default_post_sidebar',
                array(
                    'label'    => esc_html__( 'Post Sidebars', 'edigital' ),
                    'description' => esc_html__( 'Choose sidebar from available layouts', 'edigital' ),
                    'section'  => 'post_settings_section',
                    'choices'  => array(
                            'left_sidebar' => array(
                                'label' => esc_html__( 'Left Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/left-sidebar.png'
                            ),
                            'right_sidebar' => array(
                                'label' => esc_html__( 'Right Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/right-sidebar.png'
                            ),
                            'no_sidebar' => array(
                                'label' => esc_html__( 'No Sidebar', 'edigital' ),
                                'url'   => '%s/assets/images/no-sidebar.png'
                            ),
                            'no_sidebar_center' => array(
                                'label' => esc_html__( 'No Sidebar Center', 'edigital' ),
                                'url'   => '%s/assets/images/no-sidebar-center.png'
                            )
                    ),
                    'priority' => 5
                )
            )
        );

    }// close function
endif;