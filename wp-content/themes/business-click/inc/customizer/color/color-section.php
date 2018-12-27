<?php
global$business_click_sections;
global$business_click_settings_controls;
global$defaults;

//Call all defaults values
$defaults = business_click_defauts_value();

/*create color section */
$business_click_sections['colors'] = array(
        'priority'       => 110,
        'title'          => esc_html__( 'Colors', 'business-click' ),
        'panel'          => 'business-click-theme-options'
    );

//color for site-identity
$business_click_settings_controls['business-click-site-identity-color'] = array(
    'setting' =>  array(
        'default'  => $defaults['business-click-site-identity-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Site Identity Color', 'business-click' ),
        'description'           =>  esc_html__( 'Site title and tagline color', 'business-click' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 20,
        'active_callback'       => ''
    )
);

//color for top header background
$business_click_settings_controls['business-click-top-header-background-bar-color'] = array(
    'setting' => array(
        'default' => $defaults['business-click-top-header-background-bar-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Top Header Bar Background Color', 'business-click' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 40,
        'active_callback'       => ''
    )
);

//color for menu header background color
$business_click_settings_controls['business-click-menu-header-background-color'] = array(
    'setting' => array(
        'default' => $defaults['business-click-menu-header-background-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Header Menu Background Color', 'business-click' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 60,
        'active_callback'       => ''
    )
);

//color for h1 to h6
$business_click_settings_controls['business-click-business-clcik-h1-h6'] = array(
    'setting' => array(
        'default' => $defaults['business-click-business-clcik-h1-h6'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'H1-H6 Color', 'business-click' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 150,
        'active_callback'       => ''
    )
);

//color for footer background color
$business_click_settings_controls['business-click-footer-background-color'] = array(
    'setting' => array(
        'default' => $defaults['business-click-footer-background-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Footer Background Color', 'business-click' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 160,
        'active_callback'       => ''
    )
);


