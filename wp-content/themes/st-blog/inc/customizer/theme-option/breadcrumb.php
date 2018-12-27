<?php

global$st_blog_sections;
global$st_blog_settings_controls;
global$st_blog_repeated_settings_controls;
global$st_blog_customizer_defaults;

/*defaults values*/
$st_blog_customizer_defaults['st-blog-enable-breadcrumb'] = 1;

$st_blog_sections['st-blog-breadcrumb-setting'] = array(
    'title'          => esc_html__( 'Breadcrumb Options', 'st-blog' ),
    'panel'          => 'st-blog-homepage-panel',
    'priority'       => 30,
);


$st_blog_settings_controls['st-blog-enable-breadcrumb'] = array(
    'setting' =>     array(
        'default'              => $st_blog_customizer_defaults['st-blog-enable-breadcrumb'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Breadcrumb', 'st-blog' ),
        'section'               => 'st-blog-breadcrumb-setting',
        'type'                  => 'checkbox',
        'priority'              => 10,
    )
);