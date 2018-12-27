<?php 

global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_repeated_settings_controls;
global $st_blog_customizer_defaults;

$st_blog_customizer_defaults['st-blog-enable-image-gallery']         = 1;
$st_blog_customizer_defaults['st-blog-image-galery-from-page'] 		 = '';


$st_blog_sections['st-blog-image-gallery-section'] = array(
	'title'			=> esc_html__('Image gallery','st-blog'),
	'panel'			=> 'st-blog-homepage-panel',
	'priority'		=> 55
);


// enable Options for Featured Content news
$st_blog_settings_controls['st-blog-enable-image-gallery'] = array(
	'setting'	=> array(
		'default'			=> $st_blog_customizer_defaults['st-blog-enable-image-gallery']
	),
	'control'=> array(
		'label'				=> esc_html__('Enable/Disable Image gallery','st-blog'),
		'section'			=> 'st-blog-image-gallery-section',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=> ''
	)
);

// select post from page
$st_blog_settings_controls['st-blog-image-galery-from-page'] = array(
		'setting' => array(
			'default'			=> $st_blog_customizer_defaults['st-blog-image-galery-from-page']
		),
		'control' => array(
			 /* translators: %s: search page */ 
			'label'				=> esc_html__('Select page for image gallery ','st-blog'),
			'description'		=> esc_html__('It will work when a selected page or post has a image gallery','st-blog'),
			'section'			=> 'st-blog-image-gallery-section',
			'type'				=> 'dropdown-pages',
			'priority'			=> 60,
			'active_callback'	=> ''
		),					
);