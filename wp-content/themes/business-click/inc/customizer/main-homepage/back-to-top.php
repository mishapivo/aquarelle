<?php
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $business_click_customizer_defaults;

//call all defaults values
$defaults = business_click_defauts_value();

$business_click_sections['business-click-back-to-top-options'] = array(
        'priority'       => 800,
        'title'          => esc_html__( 'Back To Top Options', 'business-click' ),
        'panel'          => 'business-click-main-page-options'
    );

$business_click_settings_controls['business-click-enable-back-to-top'] =
    array(
        'setting' =>     array(
            'default'              => $defaults['business-click-enable-back-to-top'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Enable Back To Top', 'business-click' ),
            'section'               => 'business-click-back-to-top-options',
            'type'                  => 'checkbox',
            'priority'              => 50,
        )
    );