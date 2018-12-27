<?php

global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults;

//Call all defaults value
$defaults = business_click_defauts_value();

//create a section for top header bar
$business_click_sections['business-click-top-header-bar-sections'] = array(
	'title'				=> esc_html__('Top Header Bar','business-click'),
	'description'       => sprintf( '%1$s <a class="menu_locations" href="#"> %2$s </a> %3$s', esc_html__( 'Note: ', 'business-click' ), esc_html__( 'Click Here', 'business-click' ), esc_html__( 'to create Menu for Social icons.', 'business-click' ) ),
	'panel'				=>'business-click-main-page-options',
	'priority'			=> 10
); 


// cretae a enable top header
$business_click_settings_controls['business-click-enbale-top-bar-header']  = array(
	'setting' => array(
		'default' 		    => $defaults['business-click-enbale-top-bar-header']	
	),
	'control' => array(
		'label'				=> esc_html__('Show Top Header','business-click'),
		'section'			=> 'business-click-top-header-bar-sections',
		'type'				=> 'checkbox',
		'priority'			=> 10,
		'active_callback'	=>''

	)	

);

// create text field for phone  number
$business_click_settings_controls['business-click-top-bar-phone']  = array(
	'setting' => array(
		'default' 		    => $defaults['business-click-top-bar-phone']		
	),
	'control' => array(
		'label'				=> esc_html__('Phone Number','business-click'),
		'section'			=> 'business-click-top-header-bar-sections',
		'type'				=> 'text',
		'priority'			=> 20,
		'active_callback'	=>''

	)	

);

// create text field for email 
$business_click_settings_controls['bussiness-click-top-bar-email']  = array(
	'setting' => array(
		'default' 		=> $defaults['bussiness-click-top-bar-email']	
	),
	'control' => array(
		'label'				=> esc_html__('E-mail','business-click'),
		'section'			=> 'business-click-top-header-bar-sections',
		'type'				=> 'text',
		'priority'			=> 30,
		'active_callback'	=>''

	)	

);

// create text field for location  
$business_click_settings_controls['bussiness-click-top-bar-location']  = array(
	'setting' => array(
		'default' 		=> $defaults['bussiness-click-top-bar-location']	
	),
	'control' => array(
		'label'				=> esc_html__('Location Address','business-click'),
		'section'			=> 'business-click-top-header-bar-sections',
		'type'				=> 'text',
		'priority'			=> 40,
		'active_callback'	=>''

	)	

);



