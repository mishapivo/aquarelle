<?php
/**
 * EDigital Theme Customizer
 *
 * General Settings Panel
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

add_action( 'customize_register', 'edigital_general_settings_register' );

function edigital_general_settings_register( $wp_customize ) {

	$wp_customize->get_section( 'title_tagline' )->panel = 'edigital_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';
    $wp_customize->get_section( 'colors' )->panel    = 'edigital_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';
    $wp_customize->get_section( 'background_image' )->panel = 'edigital_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';
    $wp_customize->get_section( 'static_front_page' )->panel = 'edigital_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '20';
    $wp_customize->remove_section('header_image');
    

    /**
     * Add General Settings Panel
     */

    $wp_customize->add_panel(
    'edigital_general_settings_panel', 
    array(
        'priority'       => 5,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'General Settings', 'edigital' ),
        ) 
    );

/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Theme Color
     *
     * @since 1.0.0
     */
    /**
     * Field for Image Radio
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'edigital_skin_color',
        array(
            'default'           => '#90c847',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control( new EDigital_Customize_Control_Radio_Image(
        $wp_customize,
        'edigital_skin_color',
            array(
                'label'    => esc_html__( 'Theme Skin Color', 'edigital' ),
                'description' => esc_html__( 'Choose website skin color from available options.', 'edigital' ),
                'section'  => 'colors',
                'choices'  => array(
                        '#90c847' => array(
                            'label' => esc_html__( 'Skin 1', 'edigital' ),
                            'url'   => '%s/assets/images/skin_color_1.png'
                        ),
                        '#fa5c5d' => array(
                            'label' => esc_html__( 'Skin 2', 'edigital' ),
                            'url'   => '%s/assets/images/skin_color_2.png'
                        ),
                        '#bd9983' => array(
                            'label' => esc_html__( 'Skin 3', 'edigital' ),
                            'url'   => '%s/assets/images/skin_color_3.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

/*---------------------------------------------------------------------------------------------------------------*/
    /**
     * Website layout
     */    
    $wp_customize->add_section(
        'edigital_site_layout_section',
        array(
            'title'         => __( 'Website Layout', 'edigital' ),
            'description'   => __( 'Choose site layout which shows your website more effective.', 'edigital' ),
            'priority'      => 5,
            'panel'         => 'flexible_general_settings_panel',
        )
    );
    
    $wp_customize->add_setting(
        'edigital_site_layout',
        array(
            'default'           => 'fullwidth_layout',
            'sanitize_callback' => 'edigital_sanitize_site_layout',
        )       
    );
    $wp_customize->add_control(
        'edigital_site_layout',
        array(
            'type' => 'radio',
            'priority'    => 5,
            'label' => __( 'Site Layout', 'edigital' ),
            'section' => 'edigital_site_layout_section',
            'choices' => array(
                'fullwidth_layout' => __( 'FullWidth Layout', 'edigital' ),
                'boxed_layout'     => __( 'Boxed Layout', 'edigital' )
            ),
        )
    );

}