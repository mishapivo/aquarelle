<?php

global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_repeated_settings_controls;
global $st_blog_customizer_defaults;

$st_blog_customizer_defaults['st-blog-feature-slider-enable']       = 1;
$st_blog_customizer_defaults['st-blog-number-of-slider']            = 2;
$st_blog_customizer_defaults['st-blog-button text']                 = '';
$st_blog_customizer_defaults['st-blog-enable-button']               = 1;
$st_blog_customizer_defaults['st-blog-enable-auto-play']            = 1;
$st_blog_customizer_defaults['st-blog-number-of-word']              = 30;

$st_blog_sections['st-blog-feature-section'] = array(
    'title'     => esc_html__('Featured Slider ','st-blog'),
    'priority'  => 20                 

);

// slider enable disble otions
$st_blog_settings_controls['st-blog-feature-slider-enable'] = array(
    'setting' => array(
        'default'  => $st_blog_customizer_defaults['st-blog-feature-slider-enable']
    ), 
    'control' => array(
        'label'             => esc_html__('Enable/Disable Feature Slider','st-blog'),
        'section'           => 'st-blog-feature-section',
        'type'              => 'checkbox',
        'priority'          => 10,
        'active_callback'   => ''

    )          
);

// slider number selection
$st_blog_settings_controls['st-blog-number-of-slider'] =  array(
    'setting'   => array(
        'default'   => $st_blog_customizer_defaults['st-blog-number-of-slider']
    ),
    'control' => array(
        'label'             => esc_html__('Select Number of Slider','st-blog'),
        'section'           => 'st-blog-feature-section',
        'type'              => 'select',
        'choices'  => array(
            1             => esc_html__('1','st-blog'),
            2             => esc_html__('2','st-blog'),
            
        ), 
        'priority'          => 20,
        'active_callback'   => ''

    )  
);

// slider button text
$st_blog_settings_controls['st-blog-button text']  = array(
    'setting' => array(
        'default'   => $st_blog_customizer_defaults['st-blog-button text']
    ),
    'control' => array(
        'label'             => esc_html__('Slider Button Text','st-blog'),
        'section'           => 'st-blog-feature-section',
        'type'              => 'text',
        'priority'          => 70,
        'active_callback'   => ''    
    )  
);

// slider button enable
$st_blog_settings_controls['st-blog-enable-button']  = array(
    'setting' => array(
        'default'   => $st_blog_customizer_defaults['st-blog-enable-button']
    ),
    'control' => array(
        'label'             => esc_html__('Enable/Disable Slider Button','st-blog'),
        'section'           => 'st-blog-feature-section',
        'type'              => 'checkbox',
        'priority'          => 80,
        'active_callback'   => ''    
    )  
);

