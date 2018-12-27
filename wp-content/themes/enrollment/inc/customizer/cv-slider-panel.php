<?php
/**
 * Theme Customizer for Slider Settings Panel.
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

add_action( 'customize_register', 'enrollment_frontpage_panel_register' );

if( ! function_exists( 'enrollment_frontpage_panel_register' ) ):
function enrollment_frontpage_panel_register( $wp_customize ) {

/*------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Slider section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'enrollment_slider_section',
        array(
            'priority'       => 15,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Slider Settings', 'enrollment' )
        )
    );

    /** 
     * Slider Category
     * 
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_slider_category',
        array(
            'capability'    => 'edit_theme_options',
            'default'       => '0',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Enrollment_Customize_Category_Control(
        $wp_customize,
        'enrollment_slider_category',
        array(
            'label' 		=> __( 'Slider Category', 'enrollment' ),
            'description' 	=> __( 'Select category slider for only in homepage.', 'enrollment' ),
            'section' 		=> 'enrollment_slider_section',
            'settings'      => 'enrollment_slider_category',
            'priority' 		=> 5
            )
        )
    );

    /**
     * Text field for slider read more button
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_slider_read_more', 
            array(
                'capability'        => 'edit_theme_options',
                'default'           => __( 'Learn More', 'enrollment' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'enrollment_slider_read_more',
            array(
                'label'     => __( 'Slider Read More', 'enrollment' ),
                'section'   => 'enrollment_slider_section',
                'settings'  => 'enrollment_slider_read_more',
                'type'      => 'text',
                'priority'  => 5
            )
    );
    
}// close function
endif;