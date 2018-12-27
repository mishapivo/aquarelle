<?php
/**
 * Theme Customizer for General Settings Panel.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

add_action( 'customize_register', 'enrollment_general_panel_register' );

if( ! function_exists( 'enrollment_general_panel_register' ) ):
function enrollment_general_panel_register( $wp_customize ) {

	$wp_customize->get_section( 'title_tagline' )->panel = 'enrollment_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';
    $wp_customize->get_section( 'title_tagline' )->title = __( 'Site Logo/Title/Favicon', 'enrollment' );
    $wp_customize->get_section( 'colors' )->panel = 'enrollment_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';
    $wp_customize->get_section( 'background_image' )->panel = 'enrollment_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';
    $wp_customize->get_section( 'static_front_page' )->panel = 'enrollment_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '20';


	/**
	 * General Settings Panel on customizer
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
        'enrollment_general_settings_panel', 
        	array(
        		'priority'       => 5,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => __( 'General Settings', 'enrollment' ),
            ) 
    );

/*------------------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Website Layout
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'website_layout_section',
        array(
            'priority'       => 35,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'panel'          => 'enrollment_general_settings_panel',
            'title'		     => __( 'Website Layout', 'enrollment' )
        )
    );

	/**
	 * Select options for website layout option
	 *
	 * @since 1.0.0
	 */
    $wp_customize->add_setting(
        'enrollment_site_layout',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'wide_layout',
            'sanitize_callback' => 'enrollment_sanitize_select',
        )       
    );
    $wp_customize->add_control(
        'enrollment_site_layout',
        array(
            'label'         => __( 'Site Layout', 'enrollment' ),
            'description'   => __( 'Select the website layout.', 'enrollment' ),
            'section'       => 'website_layout_section',
            'settings'      => 'enrollment_site_layout',
            'type'          => 'select',
            'priority'      => 5,
            'choices' => array(
                'wide_layout'  => __( 'Wide Layout', 'enrollment' ),
                'boxed_layout' => __( 'Boxed Layout', 'enrollment' )
            )
        )
    );
/*------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Primary Theme Color
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_primary_theme_color',
        array(
            'default'           => '#ecb101',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'enrollment_primary_theme_color',
            array(
                'label'      => __( 'Primary Theme Color', 'enrollment' ),
                'section'    => 'colors',
                'settings'   => 'enrollment_primary_theme_color',
                'priority'   => 10
            )
        )
    );

    /**
     * Title Color
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_title_color',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '#212121',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'enrollment_title_color',
            array(
                'label'      => __( 'Header Text Color', 'enrollment' ),
                'section'    => 'colors',
                'settings'   => 'enrollment_title_color',
                'priority' 	 => 20
            )
        )
    );

/*------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Title and tagline checkbox
     *
     * @since 1.0.5
     */
    $wp_customize->add_setting( 
        'enrollment_title_option', 
        array(
            'capability'        => 'edit_theme_options',
            'default'           => true,
            'sanitize_callback' => 'enrollment_sanitize_checkbox'
        )
    );
    $wp_customize->add_control( 
        'enrollment_title_option', 
        array(
            'label'     => __( 'Display Site Title and Tagline', 'enrollment' ),
            'section'   => 'title_tagline',
            'settings'  => 'enrollment_title_option',
            'type'      => 'checkbox'
        )
    );

}// close function
endif;