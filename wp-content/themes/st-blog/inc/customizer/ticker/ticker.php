<?php

global$st_blog_sections;
global$st_blog_settings_controls;
global$st_blog_repeated_settings_controls;
global$st_blog_customizer_defaults;

/*defaults values*/
$st_blog_customizer_defaults['st-blog-enable-ticker']      		= 0;
$st_blog_customizer_defaults['st-blog-ticker-category-post'] 	= 1;


$st_blog_sections['st-blog-ticker-setting'] = array(
    'priority'       => 5,
    'title'          => esc_html__( 'Ticker Options', 'st-blog' ),
    'panel'          => 'st-blog-homepage-panel',
);

/*show ticker*/
$st_blog_settings_controls['st-blog-enable-ticker'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-enable-ticker'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Show Ticker', 'st-blog' ),
        'section'               => 'st-blog-ticker-setting',
        'type'                  => 'checkbox',
        'priority'              => 10,
    )
);


/*Select category*/
$st_blog_settings_controls['st-blog-ticker-category-post'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-ticker-category-post'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Select Category ', 'st-blog' ),
        'section'               => 'st-blog-ticker-setting',
        'type'                  => 'category_dropdown',
        'priority'              => 30,
    )
);