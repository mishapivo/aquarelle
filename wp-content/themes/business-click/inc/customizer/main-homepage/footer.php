<?php
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults;

// Call all defaults values
$defaults = business_click_defauts_value();

// create footer section
$business_click_sections['business-click-footer-options'] = array(
    'priority'       => 1500,
    'title'          => esc_html__( 'Footer Options', 'business-click' ),
    'panel'          => 'business-click-main-page-options'
);

// create section for footer text
$business_click_settings_controls['business-click-copyright-text'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-copyright-text'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Copyright Text', 'business-click' ),
        'section'               => 'business-click-footer-options',
        'type'                  => 'text_html',
        'priority'              => 20,
    )
);

/*scroll to top*/
$business_click_settings_controls['business-click-enable-scroll-to-top'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-enable-scroll-to-top'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Show Scroll To Top', 'business-click' ),
        'section'               => 'business-click-footer-options',
        'type'                  => 'checkbox',
        'priority'              => 60,
    )
);