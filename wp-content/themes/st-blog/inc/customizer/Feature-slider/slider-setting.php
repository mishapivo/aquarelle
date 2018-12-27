<?php 

global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_repeated_settings_controls;
global $st_blog_customizer_defaults;

$st_blog_customizer_defaults['st-blog-select-post-form']            = 'from-category';
$st_blog_customizer_defaults['st-blog-select-post-from-category']   = -1;
$st_blog_customizer_defaults['st-blog-select-post-from-page']       = 0;

// slider post selection
$st_blog_settings_controls['st-blog-select-post-form'] = array(
    'setting' => array(
        'default'   => $st_blog_customizer_defaults['st-blog-select-post-form']
    ),
    'control' => array(
        'label'                 => esc_html__('Select Slider Post Type','st-blog'),
        'description'           =>  esc_html__( 'After selecting one of the option, please go back and go to particular section to add', 'st-blog' ),
        'section'               => 'st-blog-feature-section',
        'type'                  => 'select',
        'choices' => array(
            'from-category'     => esc_html__('Choose From Category','st-blog'),
            'from-page'         => esc_html__('Choose From Page','st-blog')
        ),
        'priority'              => 30,
        'active_callback'       => ''
    ),  
);

// slider post from category
$st_blog_settings_controls['st-blog-select-post-from-category']  = array(
    'setting' => array(
        'default'       => $st_blog_customizer_defaults['st-blog-select-post-from-category']
    ),
    'control' => array(
        'label'             => esc_html__('Select a Category For Featured Slider','st-blog'),
        'description'       => esc_html__( 'This option only work when you have selected "Category" in "Slider Post Type". Recommended featured image size 1360 * 530 for posts under selected category', 'st-blog' ),
        'section'           => 'st-blog-feature-section' ,
        'type'              => 'category_dropdown',
        'priority'          => 40,
        'active_callback'   => ''          
    ), 
                 
);

// slider post from page
$st_blog_repeated_settings_controls['st-blog-select-post-from-page']  =  array(
    'repeated'  => 2,
    'feature-slider-page-id' => array(
        'setting' => array(
            'default'   => $st_blog_customizer_defaults['st-blog-select-post-from-page'] 
        ),
        'control' => array(
            /* translators: %s: search page */
            'label'             => esc_html__('Select a Page from Featured Slider %s','st-blog'),
            'section'           => 'st-blog-feature-section',
            'type'              => 'dropdown-pages',
            'priority'          => 50,
            'active_callback'   => ''
        )
    ),  
);
