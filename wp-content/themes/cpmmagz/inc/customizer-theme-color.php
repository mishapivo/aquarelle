<?php
    //customizer for Theme color section
if(!function_exists('cpmmagz_color_customizer')):
    function cpmmagz_color_customizer( $wp_customize ) {
        $wp_customize->add_section(
            'color_section',
            array(
                'title' =>esc_html__('Choose Theme Color', 'cpmmagz' ),
                'priority' => 1,
                'panel'    => 'cpm_theme_options_panel',
                )
            );
         $wp_customize->add_setting( 'theme-color'  , array(
            'default'           => 'default',
            'sanitize_callback' => 'esc_html'
        ) );

        $wp_customize->add_control( 'theme-color', array(
            'label'     => esc_html__( 'Choose theme color :', 'cpmmagz' ),
            'section'   => 'color_section',
            'settings' => 'theme-color',
            'type'      => 'radio',
            'choices'    => array(
                'default' => esc_html__( 'Default', 'cpmmagz' ),
                'green' => esc_html__( 'Green', 'cpmmagz'),
                'purple' => esc_html__( 'Purple', 'cpmmagz'),
                'blue' => esc_html__( 'Blue', 'cpmmagz'),
                'red' => esc_html__( 'Red', 'cpmmagz'),
                'turquoise' => esc_html__( 'Turquoise', 'cpmmagz'),
                'aspalt' => esc_html__( 'Aspalt', 'cpmmagz'),
            ),
        ) );
    }
add_action( 'customize_register', 'cpmmagz_color_customizer');
endif;