<?php
global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_customizer_defaults;

/*defaults values*/
$st_blog_customizer_defaults['st-blog-primary-color']           = '#EF3F3D';
$st_blog_customizer_defaults['st-blog-menu-text-color']         = '';//#000
$st_blog_customizer_defaults['st-blog-h1-h6-color']             = '#000';
$st_blog_customizer_defaults['st-blog-button-text-color']       = '#808080';
$st_blog_customizer_defaults['st-blog-footer-background-color'] = '#fff';
$st_blog_customizer_defaults['st-blog-footer-text-color']       = '#000';
$st_blog_customizer_defaults['st-blog-color-reset']             = '';


/*Default color*/
$st_blog_sections['colors'] = array(
        'priority'       => 60,
        'title'          => esc_html__( 'Colors', 'st-blog' ),
        'panel'         => 'st-blog-homepage-panel'   
    );

$st_blog_settings_controls['st-blog-primary-color'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-primary-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Primary Color', 'st-blog' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 30,
        'active_callback'       => ''
    )
);


$st_blog_settings_controls['st-blog-menu-text-color'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-menu-text-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Menu Text Color', 'st-blog' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 40,
        'active_callback'       => ''
    )
);


$st_blog_settings_controls['st-blog-h1-h6-color'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-h1-h6-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'H1-H6 Color', 'st-blog' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 70,
        'active_callback'       => ''
    )
);


$st_blog_settings_controls['st-blog-button-text-color'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-button-text-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Button Text Color', 'st-blog' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 95,
        'active_callback'       => ''
    )
);

$st_blog_settings_controls['st-blog-footer-background-color'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-footer-background-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Footer Background Color', 'st-blog' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 100,
        'active_callback'       => ''
    )
);



$st_blog_settings_controls['st-blog-footer-text-color'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-footer-text-color'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Footer Text Color', 'st-blog' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 110,
        'active_callback'       => ''
    )
);