<?php

global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults; 


// Call all defaults value
$defaults = business_click_defauts_value();

/*create a section */
$business_click_sections['business-click-testimonial-section'] = array(
	'title'							=> esc_html__('Testimonial Section','business-click'),
	'panel'							=> 'business-click-main-page-options',
	'priority'						=> 80
);

/*Enable Testimonial*/
$business_click_settings_controls['business-click-testimonila-enable'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-testimonila-enable']
	),
	'control' => array(
		'label'						=> esc_html__('Show testimonial','business-click'),
		'section'					=> 'business-click-testimonial-section',
		'type'						=> 'checkbox',
		'priority'					=> 10,
		'active_callback'			=> ''
	)
);

/*Section Title*/
$business_click_settings_controls['business-click-testimonial-section-title'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-testimonial-section-title']
	),
	'control' => array(
		'label'						=> esc_html__('Section Title','business-click'),
		'section'					=> 'business-click-testimonial-section',
		'type'						=> 'text',
		'priority'					=> 20,
		'active_callback'			=> ''
	)
);

/*Excerpt Length*/
$business_click_settings_controls['business-click-testimonial-excerpt-length'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-testimonial-excerpt-length']
	),
	'control' => array(
		'label'						=> esc_html__('Excerpt Length','business-click'),
		'section'					=> 'business-click-testimonial-section',
		'type'						=> 'number',
		'priority'					=> 40,
		'active_callback'			=> ''
	)
);

/* Select slider post */
$business_click_settings_controls['business-click-testimonial-select-form'] = array(
        'setting' => array(
        'default'                   => $defaults['business-click-testimonial-select-form'] 
        ),
        'control' => array(
            'label'                 => esc_html__('Select Slider Post Type ','business-click'),
            'section'               => 'business-click-testimonial-section',
            'type'                  => 'select',
            'choices' => array(
                'form-category'     => esc_html__('Choose From Category','business-click'),    
                'form-post'         => esc_html__('Choose From page','business-click'),    
            ),            
            'priority'              => 50,
            'acticve_callback'      => ''

        ),     
);

/*post type slider from post */
$business_click_settings_controls['business-click-testimonial-from-category'] = array(
        'setting' => array(
        'default'                   => $defaults['business-click-testimonial-from-category'] 
        ),
        'control' => array(
            'label'                 => esc_html__('Select Category','business-click'),
            'section'               => 'business-click-testimonial-section',
            'type'                  => 'category_dropdown',            
            'priority'              => 60,
            'acticve_callback'      => ''

        ),     
);


/*Select number of page*/
$business_click_repeated_settings_controls['business-click-testimonial-designation'] = array(
	'repeated'					   => 2,
	'testimonial-designation-ids' => array(
		'setting' => array(
			'default'					=> $defaults['business-click-testimonial-designation']
		),
		'control' => array(
			/* translators: %s: search testimonila designation */
			'label'						=> esc_html__('Designation %s','business-click'),
			'section'					=> 'business-click-testimonial-section',
			'type'						=> 'text',
			'priority'					=> 70,
			'active_callback'			=> ''
		)
	),
	'testimonial-page-ids' => array(
		'setting' => array(
			'default'					=> $defaults['business-click-testimonial-select-for-page']
		),
		'control' => array(
			/* translators: %s: search testimonial page */
			'label'						=> esc_html__('Testimonial %s','business-click'),
			'section'					=> 'business-click-testimonial-section',
			'type'						=> 'dropdown-pages',
			'priority'					=> 70,
			'active_callback'			=> ''
		)
	),	
);

/*Background image upload*/
$business_click_settings_controls['business-click-testimonial-background-image'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-testimonial-background-image']
	),
	'control' => array(
		'label'						=> esc_html__('Background Image','business-click'),
		'section'					=> 'business-click-testimonial-section',
		'type'						=> 'image',
		'priority'					=> 80,
		'active_callback'			=> ''
	)
);

