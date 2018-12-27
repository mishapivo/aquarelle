<?php

global$st_blog_sections;
global$st_blog_settings_controls;
global$st_blog_repeated_settings_controls;
global$st_blog_customizer_defaults;

/*defaults values*/
$st_blog_customizer_defaults['st-blog-enable-back-to-top'] = 1;

// st-blog setting section
$st_blog_sections['st-blog-enable-back-to-top-section']	  = array(
	'title'			=> esc_html__('Scroll To Top Options','st-blog'),
	'panel'			=> 'st-blog-homepage-panel',
	'priority'		=> 60
);


$st_blog_settings_controls['st-blog-enable-back-to-top'] = array(
    'setting' => array(
        'default' => $st_blog_customizer_defaults['st-blog-enable-back-to-top'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Scroll To Top', 'st-blog' ),
        'section'               => 'st-blog-enable-back-to-top-section',
        'type'                  => 'checkbox',
        'priority'              => 10,
    )
);