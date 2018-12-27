<?php
/**
 * Enrollment Theme Customizer panel for header.
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

add_action( 'customize_register', 'enrollment_header_panel_register' );

if( ! function_exists( 'enrollment_header_panel_register' ) ):
function enrollment_header_panel_register( $wp_customize ) {

	/**
	 * Header Settings Panel on customizer
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
        'enrollment_header_settings_panel', 
        	array(
        		'priority'       => 10,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => __( 'Header Settings', 'enrollment' ),
            ) 
    );
    
/*------------------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Additional Header settings
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'additional_header_settings_section',
        array(
            'priority'       => 10,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'panel'          => 'enrollment_header_settings_panel',
            'title'          => __( 'Additional Header Settings', 'enrollment' )
        )
    );

    /**
     * Checkbox option for sticky menu
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_header_sticky_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => true,
            'sanitize_callback' => 'enrollment_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( new Enrollment_Toggle_Checkbox_Custom_Control(
        $wp_customize, 
        'enrollment_header_sticky_option',
            array(
                'label'         => __( 'Sticky Menu', 'enrollment' ),
                'description'   => __( 'Option to control primary menu sticky.', 'enrollment' ),
                'section'       => 'additional_header_settings_section',
                'settings'      => 'enrollment_header_sticky_option',
                'priority'      => 5
            )
        )
    );

    /**
     * Checkbox option for search icon at primary menu
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_menu_search_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => true,
            'sanitize_callback' => 'enrollment_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( new Enrollment_Toggle_Checkbox_Custom_Control(
        $wp_customize, 
        'enrollment_menu_search_option',
            array(
                'label'         => __( 'Search Icon', 'enrollment' ),
                'description'   => __( 'Option to control search icon at primary menu section.', 'enrollment' ),
                'section'       => 'additional_header_settings_section',
                'settings'      => 'enrollment_menu_search_option',
                'priority'      => 10
            )
        )
    );

}// close function
endif;