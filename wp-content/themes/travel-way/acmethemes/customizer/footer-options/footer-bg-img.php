<?php
/*adding sections for footer background image*/
$wp_customize->add_section( 'travel-way-footer-bg-img', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Background Image', 'travel-way' ),
    'panel'          => 'travel-way-footer-panel',
) );

/*footer background image*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-footer-bg-img]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-footer-bg-img'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'travel_way_theme_options[travel-way-footer-bg-img]',
        array(
            'label'		=> esc_html__( 'Footer Background Image', 'travel-way' ),
            'section'   => 'travel-way-footer-bg-img',
            'settings'  => 'travel_way_theme_options[travel-way-footer-bg-img]',
            'type'	  	=> 'image'
        )
    )
);