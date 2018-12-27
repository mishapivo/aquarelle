<?php

global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_repeted_settings_controls;
global $st_blog_customizer_defaults;

$st_blog_customizer_defaults['latest-numbe-of-post-for-blog-section']    		= 6;
$st_blog_customizer_defaults['latest-post-show-title']							= 1;
$st_blog_customizer_defaults['latest-post-show-excerpt']						= 1;
$st_blog_customizer_defaults['st-blog-excerpt-length'] 							= 25 ;
$st_blog_customizer_defaults['st-blog-latest-post-button-text'] 				= esc_html__('Read More','st-blog');
$st_blog_customizer_defaults['lates-blog-pagination']							= esc_html__('numeric','st-blog');


// panel for post display
$st_blog_panels['latest-post-bolg-panel']	= array(
	'title'		=> esc_html__('Latest Post Blog','st-blog'),
	'priority'	=> 20
);

// section for post display
$st_blog_sections['latest-post-bolg-section']	= array(
	'title'		=> esc_html__('Blog Options','st-blog'),
	'panel'		=> 'st-blog-homepage-panel',
	'priority'	=> 20
);

// control setting for number of post
$st_blog_settings_controls['latest-numbe-of-post-for-blog-section']  = array(
	'setting' => array(
		'default'		=> $st_blog_customizer_defaults['latest-numbe-of-post-for-blog-section']
	),
	'control' => array(
		'label'				=> esc_html__('Select number for latest blog','st-blog'),
		'section'			=> 'latest-post-bolg-section',
		'type'				=> 'number',
		'priority'			=> 10,
		'active_callback'	=> ''
	)
);

// exceprt length for blog post
$st_blog_settings_controls['st-blog-excerpt-length'] =
    array(
        'setting' =>     array(
            'default'  =>  $st_blog_customizer_defaults['st-blog-excerpt-length'],
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Excerpt Length (in words)', 'st-blog' ),
            'section'               => 'latest-post-bolg-section',
            'type'                  => 'number',
            'priority'              => 13,
        )
    );


// control setting for post title
$st_blog_settings_controls['latest-post-show-title']  = array(
	'setting' => array(
		'default'		=> $st_blog_customizer_defaults['latest-post-show-title']
	),
	'control' => array(
		'label'				=> esc_html__('Show Post Title','st-blog'),
		'section'			=> 'latest-post-bolg-section',
		'type'				=> 'checkbox',
		'priority'			=> 20,
		'active_callback'	=> ''
	)
);

// control setting for post excerpt
$st_blog_settings_controls['latest-post-show-excerpt']  = array(
	'setting' => array(
		'default'		=> $st_blog_customizer_defaults['latest-post-show-excerpt']
	),
	'control' => array(
		'label'				=> esc_html__('Show Post Excerpt','st-blog'),
		'section'			=> 'latest-post-bolg-section',
		'type'				=> 'checkbox',
		'priority'			=> 25,
		'active_callback'	=> ''
	)
);


/*latest-bolg-post-button*/
$st_blog_settings_controls['st-blog-latest-post-button-text'] = array(
	'setting' => array(
	    'default' => $st_blog_customizer_defaults['st-blog-latest-post-button-text'],
	),
	'control' => array(
	    'label'                 =>  esc_html__( 'Button Text', 'st-blog' ),
	    'description'           =>  esc_html__( 'It will only change the latest blog button text', 'st-blog' ),
	    'section'               => 'latest-post-bolg-section',
	    'type'                  => 'text',
	    'priority'              => 50,
	)
);

$st_blog_settings_controls['lates-blog-pagination'] = array(
	'setting' => array(
	    'default' => $st_blog_customizer_defaults['lates-blog-pagination'],
	),
	'control' => array(
	    'label'                 =>  esc_html__( 'Pagination', 'st-blog' ),
	    'description'           =>  esc_html__( 'It will only change the latest blog pagination', 'st-blog' ),
	    'section'               => 'latest-post-bolg-section',
	    'type'                  => 'select',
	    'choices' => array(
	    	'numeric'			=> esc_html__('Numeric','st-blog'),
	    	'default'			=> esc_html__('Default (Older posts/Newer posts) ','st-blog'),
	    ),	
	    'priority'              => 50,
	)
);

