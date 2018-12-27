<?php

global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_repeated_settings_controls;
global $st_blog_customizer_defaults;


$st_blog_customizer_defaults['st-blog-default-logo-layout']     = 'logo-center';
$st_blog_customizer_defaults['st-blog-copyright-text'] 			= esc_html__('Copyright &copy; All right reserved','st-blog'); 

$st_blog_sections['header-footer-section'] 	= array(
	'title'		=> esc_html__('Footer Options','st-blog'),
	'panel'		=> 'st-blog-homepage-panel',
	'priority'	=> 90
);


$st_blog_settings_controls['st-blog-copyright-text'] =
array(
    'setting' =>  array(
        'default'              => $st_blog_customizer_defaults['st-blog-copyright-text'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Copyright Text', 'st-blog' ),
        'section'               => 'header-footer-section',
        'type'                  => 'text_html',
        'priority'              => 30,
    )
);