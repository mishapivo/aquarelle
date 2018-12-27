<?php

global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_repeated_settings_controls;
global $st_blog_customizer_defaults;

$st_blog_customizer_defaults['st-blog-enable-social-media']         = 1;
$st_blog_customizer_defaults['st-blog-social-link1']				= '';
$st_blog_customizer_defaults['st-blog-social-link2']				= '';
$st_blog_customizer_defaults['st-blog-social-link3']				= '';
$st_blog_customizer_defaults['st-blog-social-link4']				= '';

$st_blog_sections['st-blog-social-section'] = array(
	'title'			=> esc_html__('Social Media Links','st-blog'),
	'panel'			=> 'st-blog-homepage-panel',
	'priority'		=> 50
);


// enable options
$st_blog_settings_controls['st-blog-enable-social-media']   =  array(
	'setting' => array(
		'default'   => 	$st_blog_customizer_defaults['st-blog-enable-social-media']
	),
	'control' => array(
		'label'				=> esc_html__('Enable/Disable Social Media','st-blog'),
		'section'			=> 'st-blog-social-section',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=> ''
	)
);


// social name link-1
$st_blog_settings_controls['st-blog-social-link1'] = array(
	'setting' => array(
		'default'	=> $st_blog_customizer_defaults['st-blog-social-link1']
	),
	'control' => array(
		'label'				=> esc_html__('Social Media Link 1','st-blog'),
		'description'		=> esc_html__('Eg: https://www.facebook.com/','st-blog'),
		'section'			=> 'st-blog-social-section',
		'type'				=> 'url',
		'priority'			=> 20,
		'active_callback'	=> ''	
	),
);

// social name link-2
$st_blog_settings_controls['st-blog-social-link2'] = array(
	'setting' => array(
		'default'	=> $st_blog_customizer_defaults['st-blog-social-link2']
	),
	'control' => array(
		'label'				=> esc_html__('Social Media Link 2','st-blog'),
		'description'		=> esc_html__('Eg: https://www.twitter.com/','st-blog'),
		'section'			=> 'st-blog-social-section',
		'type'				=> 'url',
		'priority'			=> 30,
		'active_callback'	=> ''	
	),
);

// social name link-3
$st_blog_settings_controls['st-blog-social-link3'] = array(
	'setting' => array(
		'default'	=> $st_blog_customizer_defaults['st-blog-social-link3']
	),
	'control' => array(
		'label'				=> esc_html__('Social Media Link 3','st-blog'),
		'description'		=> esc_html__('Eg: https://www.instagram.com/','st-blog'),

		'section'			=> 'st-blog-social-section',
		'type'				=> 'url',
		'priority'			=> 40,
		'active_callback'	=> ''	
	),
);

// social name link-4
$st_blog_settings_controls['st-blog-social-link4'] = array(
	'setting' => array(
		'default'	=> $st_blog_customizer_defaults['st-blog-social-link4']
	),
	'control' => array(
		'label'				=> esc_html__('Social Media Link 4','st-blog'),
		'description'		=> esc_html__('Eg: https://www.linkedin.com/','st-blog'),
		'section'			=> 'st-blog-social-section',
		'type'				=> 'url',
		'priority'			=> 50,
		'active_callback'	=> ''	
	),
);


