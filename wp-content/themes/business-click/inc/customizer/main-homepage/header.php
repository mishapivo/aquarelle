<?php
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults;

// Call all default value
$defaults  =  business_click_defauts_value();

/*create a header section */
$business_click_sections['business-click-header-section'] = array(
	'title'		=> esc_html__('Header Section','business-click'),
	'panel'		=>'business-click-main-page-options',
	'priority'	=> 20
);

/*enable option for extar button*/
$business_click_settings_controls['business-click-enable-extra-button']  =  array(
	'setting'  => array(
		'default'		  => $defaults['business-click-enable-extra-button']
	),
	'control' => array(
		'label'			  => esc_html__('Show Button','business-click'),
		'description'	  => esc_html__('It will appear in menu section, if you put the link and text in that button','business-click'),
		'section'		  => 'business-click-header-section',	
		'type'			  => 'checkbox',
		'priority'		  => 10,
		'active_callback' => ''
	)		

);


/*button text*/
$business_click_settings_controls['business-click-text-extra-button-text']  =  array(
	'setting'  => array(
		'default'		  => $defaults['business-click-text-extra-button-text']
	),
	'control' => array(
		'label'			  => esc_html__('Button Text','business-click'),
		'section'		  => 'business-click-header-section',
		'type'			  => 'text',
		'priority'		  => 20,
		'active_callback' => ''
	)		

);

/*button-link*/
$business_click_settings_controls['business-click-link-extra-button']  =  array(
	'setting'  => array(
		'default'		=> $defaults['business-click-link-extra-button']
	),
	'control' => array(
		'label'			  => esc_html__('Button Link','business-click'),
		'section'		  => 'business-click-header-section',
		'type'			  => 'url',
		'priority'		  => 30,
		'active_callback' => ''
	)		

);

/*transparent-header*/
$business_click_settings_controls['business-click-enable-transparent-header']  =  array(
	'setting'  => array(
		'default'		=> $defaults['business-click-enable-transparent-header']
	),
	'control' => array(
		'label'			  => esc_html__('Show Transparent Header','business-click'),
		'description'	  => esc_html__('Transparent Header works only when Feature Slider Section is enabled.','business-click'),
		'section'		  => 'business-click-header-section',
		'type'			  => 'checkbox',
		'priority'		  => 40,
		'active_callback' => ''
	)		

);


