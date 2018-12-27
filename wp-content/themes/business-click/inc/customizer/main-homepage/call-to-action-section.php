<?php
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults;

// call all defaults values
$defaults = business_click_defauts_value();

/*create section for call to action*/
$business_click_sections['business-click-call-to-action-portfolio'] = array(
	'title'							=> esc_html__('Call To Action','business-click'),
	'panel'							=> 'business-click-main-page-options',
	'priority'						=> 50,
);

/*create enable section*/
$business_click_settings_controls['business-click-enable-call-to-action'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-enable-call-to-action'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Show Call To Action','business-click'),
		'section'					=> 'business-click-call-to-action-portfolio',
		'type'						=> 'checkbox',
		'priority'					=> 10,
		'acitive_callback'			=> ''
	)		

);

/*Excerpt Length*/
$business_click_settings_controls['business-click-call-excerpt-length'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-call-excerpt-length'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Excerpt Length','business-click'),
		'section'					=> 'business-click-call-to-action-portfolio',
		'type'						=> 'number',
		'priority'					=> 20,
		'acitive_callback'			=> ''
	)		

);


/*page selection*/
$business_click_settings_controls['business-click-call-to-action-select-from-page'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-call-to-action-select-from-page'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Select page','business-click'),
		'section'					=> 'business-click-call-to-action-portfolio',
		'type'						=> 'dropdown-pages',
		'priority'					=> 50,
		'acitive_callback'			=> ''
	)		

);

/*Button Text*/
$business_click_settings_controls['business-click-button-text'] = array(
	'setting' => array(
		'default'					=> $defaults['business-click-button-text'] 
	),	
	'control' => array(
		'label'						=> esc_html__('Button Text','business-click'),
		'section'					=> 'business-click-call-to-action-portfolio',
		'type'						=> 'text',
		'priority'					=> 60,
		'acitive_callback'			=> ''
	)		

);



