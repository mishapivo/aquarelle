<?php
/**
 * EDigital Theme Customizer
 *
 * FrontPage Settings Panel
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

add_action( 'customize_register', 'edigital_frontpage_settings_register' );

function edigital_frontpage_settings_register( $wp_customize ) {

	/**
     * FrontPage Settings Panel on customizer
     *
     * @since 1.0.0
     */

    $wp_customize->add_panel(
    'edigital_frontpage_settings_panel', 
        array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'FrontPage Settings', 'edigital' ),
        ) 
    );

/*---------------------------------------------------------------------------------------------------------------*/
	/**
     * Slider Settings
     *
     * @since 1.0.0
     */
	$wp_customize->add_section(
        'edigital_home_slider_section',
        array(
            'title'		=> __( 'Slider Settings', 'edigital' ),
            'panel'     => 'edigital_frontpage_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Field for Slider Option
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'homepage_slider_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'edigital_sanitize_show_switch',
        )
    );
    $wp_customize->add_control( new EDigital_Customize_Switch_Control(
        $wp_customize, 
            'homepage_slider_option', 
            array(
                'type' 		=> 'switch',	                
                'label' 	=> __( 'Slider Section', 'edigital' ),
                'description' 	=> __( 'Enable/Disable slider section at homepage.', 'edigital' ),
                'section' 	=> 'edigital_home_slider_section',
                'choices'   => array(
                    'show' 	=> __( 'Show', 'edigital' ),
                    'hide' 	=> __( 'Hide', 'edigital' )
                    ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Field for Slider Category Option
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'slider_cat_id',
        array(
            'default' => '0',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( 
        new EDigital_Customize_Category_Control( 
        $wp_customize,
        'slider_cat_id', 
        array(
            'label' => __( 'Slider Category', 'edigital' ),
            'description' => __( 'Select category for Homepage slider', 'edigital' ),
            'section' => 'edigital_home_slider_section',
            'priority' => 10
            )
        )
    );

}