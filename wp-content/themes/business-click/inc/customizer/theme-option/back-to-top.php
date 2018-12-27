<?php
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults; 

//Call all Defaults values
$defaults = business_click_defauts_value();

// section for back to top
$business_click_sections['business-click-back-to-top-options'] = array(
        'priority'       => 800,
        'title'          => esc_html__( 'Back To Top Options', 'business-click' ),
        'panel'          => 'business-click-theme-options'
    );

// enable back to top 
$business_click_settings_controls['business-click-enable-back-to-top'] = array(
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