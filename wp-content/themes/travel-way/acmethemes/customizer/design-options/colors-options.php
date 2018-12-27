<?php
/*customizing default colors section and adding new controls-setting too*/
$wp_customize->get_section( 'colors' )->panel = 'travel-way-design-panel';
$wp_customize->get_section( 'colors' )->title = esc_html__( 'Basic Color', 'travel-way' );
$wp_customize->get_section( 'background_image' )->priority = 100;

/*Primary color*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'travel_way_theme_options[travel-way-primary-color]',
        array(
            'label'		=> esc_html__( 'Primary Color', 'travel-way' ),
            'section'   => 'colors',
            'settings'  => 'travel_way_theme_options[travel-way-primary-color]',
            'type'	  	=> 'color'
        ) )
);

/*Header TOP color*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-header-top-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-header-top-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'travel_way_theme_options[travel-way-header-top-bg-color]',
        array(
            'label'		=> esc_html__( 'Header Top Background Color', 'travel-way' ),
            'description'=> esc_html__( 'Also used as secondary color', 'travel-way' ),
            'section'   => 'colors',
            'settings'  => 'travel_way_theme_options[travel-way-header-top-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/* Footer Background Color*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-footer-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-footer-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'travel_way_theme_options[travel-way-footer-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Background Color', 'travel-way' ),
            'section'   => 'colors',
            'settings'  => 'travel_way_theme_options[travel-way-footer-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Footer Bottom Background Color*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-footer-bottom-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-footer-bottom-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'travel_way_theme_options[travel-way-footer-bottom-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Bottom Background Color', 'travel-way' ),
            'section'   => 'colors',
            'settings'  => 'travel_way_theme_options[travel-way-footer-bottom-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Link color*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-link-color]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-link-color'],
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-link-color]', array(
	'label'		=> esc_html__( 'Link Color', 'travel-way' ),
	'section'   => 'colors',
	'settings'  => 'travel_way_theme_options[travel-way-link-color]',
	'type'	  	=> 'color'
) );

/*Link Hover color*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-link-hover-color]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-link-hover-color'],
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-link-hover-color]', array(
	'label'		=> esc_html__( 'Link Hover Color', 'travel-way' ),
	'section'   => 'colors',
	'settings'  => 'travel_way_theme_options[travel-way-link-hover-color]',
	'type'	  	=> 'color'
) );