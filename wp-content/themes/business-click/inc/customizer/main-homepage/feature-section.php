<?php
global $business_click_panels;
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults;

// Call all default values
$defaults = business_click_defauts_value();

/*create section for feature*/
$business_click_sections['business-click-feature-section'] = array(
	'title'		          => esc_html__('Features Section','business-click'),
	'panel'		          => 'business-click-main-page-options',	
	'priority'	          => 30,

);

/*enable feature section*/
$business_click_settings_controls['business-click-feature-enable'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['business-click-feature-enable']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Show Features Section', 'business-click' ),
        'section'               =>   'business-click-feature-section',
        'type'                  =>   'checkbox',
        'priority'              =>   10,
        'active_callback'       =>   ''
    )
);
    
/*Section Title*/
$business_click_settings_controls['business-click-feature-section-title'] = array(
    'setting' =>       array(
        'default'              =>   $defaults['business-click-feature-section-title']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Section Title', 'business-click' ),
        'section'               =>   'business-click-feature-section',
        'type'                  =>   'text',
        'priority'              =>   15,
        'active_callback'       =>   ''
    )
);


/*Excerpt length */
$business_click_settings_controls['business-click-feature-excerpt-length'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['business-click-feature-excerpt-length']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Excerpt Length', 'business-click' ),
        'section'               =>   'business-click-feature-section',
        'type'                  =>   'number',
        'priority'              =>   30,
        'active_callback'       =>   ''
    )
);

/* Select slider post */
$business_click_settings_controls['business-click-feature-select-form'] = array(
    'setting' => array(
    'default'                   => $defaults['business-click-feature-select-form'] 
    ),
    'control' => array(
        'label'                 => esc_html__('Select Slider Post Type ','business-click'),
        'section'               => 'business-click-feature-section',
        'type'                  => 'select',
        'choices' => array(
            'form-category'     => esc_html__('Choose From Category','business-click'),    
            'form-post'         => esc_html__('Choose From page','business-click'),    
        ),            
        'priority'              => 40,
        'acticve_callback'      => ''

    ),     
);

/*post type slider from post */
$business_click_settings_controls['business-click-feature-from-category'] = array(
    'setting' => array(
    'default'                   => $defaults['business-click-feature-from-category'] 
    ),
    'control' => array(
        'label'                 => esc_html__('Select Category','business-click'),
        'section'               => 'business-click-feature-section',
        'type'                  => 'category_dropdown',            
        'priority'              => 50,
        'acticve_callback'      => ''

    ),     
);



/*page Selection */
$business_click_repeated_settings_controls['business-click-feature-from-page'] = array(
	'repeated' 		=> 3,
	'feature-icons-ids' => array(
        'setting' => array(
            'default'               =>   $defaults['business-click-feature-page-icon']
        ),
        'control' =>   array(
            /* translators: %s: search page icon */
            'label'                 =>    esc_html__( 'Icon for Page %s', 'business-click' ),
            /* translators: %s: search page icon describe */
            'description'           =>   sprintf( esc_html__( 'Eg: %1$s. %2$s View Font Awesome Cheatsheet. %3$s', 'business-click' ), "<b>".'fa-wrench'."</b>",'<a href="'.esc_url('http://fontawesome.io/cheatsheet/').'" target="_blank">','</a>'. '' .'Removing icons will display the featured image.' ),
            'section'               =>   'business-click-feature-section',
            'type'                  =>   'text',
            'priority'              =>   60,
            'active_callback'       =>   ''
        )
	),
    'feature-page-ids' => array(
        'setting' => array(
            'default'              =>   $defaults['business-click-feature-from-page']
        ),
        'control' =>   array(
            /* translators: %s: search feature page */
            'label'                 =>    esc_html__( 'Page %s', 'business-click' ),
            'section'               =>   'business-click-feature-section',
            'type'                  =>   'dropdown-pages',
            'priority'              =>   60,
            'active_callback'       =>   ''
        )
    ),      
	
);

/* button text*/
$business_click_settings_controls['business-click-feature-button-text'] = array(
    'setting' =>       array(
        'default'               =>   $defaults['business-click-feature-button-text']
    ),
    'control' =>   array(
        'label'                 =>    esc_html__( 'Button Text', 'business-click' ),
        'section'               =>   'business-click-feature-section',
        'type'                  =>   'text',
        'priority'              =>   70,
        'active_callback'       =>   ''
    )
);

/*Background image upload*/
$business_click_settings_controls['business-click-feature-background-image'] = array(
    'setting' => array(
        'default'                   => $defaults['business-click-feature-background-image']
    ),
    'control' => array(
        'label'                     => esc_html__('Background Image','business-click'),
        'section'                   => 'business-click-feature-section',
        'type'                      => 'image',
        'priority'                  => 80,
        'active_callback'           => ''
    )
);