<?php
/**
 * Displays all the options in the customizer
 *
 * @package Alacrity Lite
 */

// Homepage Panel
global $wp_customize;
    $wp_customize->add_panel( 'homepage_panel', array(
       'title' => __( 'Home Page Sections','alacrity-lite' ),
       'description' => __( 'Change home page sections from here','alacrity-lite' ),
       'priority' => 160, 
    ) );

    //Slider Section
    $wp_customize->add_section( 'slider_sec' , array(
       'title' => __( 'Slider Section','alacrity-lite' ),
       'panel' => 'homepage_panel',
       'priority'        => 110,
    ) );
    $wp_customize->add_setting('hide_slider',array(
       	'default' => 0,
        'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_checkbox',
        'capability' => 'edit_theme_options',
    ));  
    $wp_customize->add_control( 'hide_slider', array(
    	'label'     => __('Check this to Hide Slider Section','alacrity-lite'),     
    	'type'      => 'checkbox',
        'setting' => 'hide_slider',
        'section'   => 'slider_sec'  
     ));    
     $wp_customize->add_setting('hide_slide_caption', array(
        'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_checkbox'
     ));
     $wp_customize->add_control('hide_slide_caption', array(
        'label' => __('Hide Slide Caption', 'alacrity-lite'),
        'type' => 'checkbox',
        'setting' => 'hide_slide_caption',
        'section' => 'slider_sec'  
     ));
     $wp_customize->add_setting('slider_loop', array(
        'default' => '3',
        'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_integer',
     ));
     $wp_customize->add_control('slider_loop', array(
        'label' => __( 'No. of posts to display', 'alacrity-lite' ),
        'type' => 'number',
        'section' => 'slider_sec',
        'setting' => 'slider_loop' 
     ));

    // Services Section
   	$wp_customize->add_section('services_section' , array(
		'title'	=> esc_html__('Services Section','alacrity-lite'),
		'panel' => 'homepage_panel',
		'priority'	=> null
	));	
	$wp_customize->add_setting('hide_services_sec',array(
		'default' => 0,
		'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_services_sec', array(
   	   'label' => __('Check to Hide This Section', 'alacrity-lite'),
   	   'type' => 'checkbox',
   	   'setting' => 'hide_services_sec',
   	   'section' => 'services_section'
     ));	
	
	
	$wp_customize->add_setting('service_box1',	array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_integer',	
	));

	$wp_customize->add_control('service_box1', array(
		'description' => esc_html__('Select Page for Service box 1' , 'alacrity-lite'),
		'type' => 'dropdown-pages',
		'setting' => 'service_box1',
		'section' => 'services_section'
	));

	$wp_customize->add_setting('service_box2',	array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_integer',	
	));

	$wp_customize->add_control('service_box2', array(
		'description' => esc_html__('Select Page for Service box 2' , 'alacrity-lite'),
		'type' => 'dropdown-pages',
		'setting' => 'service_box2',
		'section' => 'services_section'	
	));

	$wp_customize->add_setting('service_box3',	array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_integer',	
	));

	$wp_customize->add_control('service_box3', array(
		'description' => esc_html__('Select Page for Service box 3' , 'alacrity-lite'),
		'type' => 'dropdown-pages',
		'setting' => 'service_box3',
		'section' => 'services_section'
	));

	$wp_customize->add_setting('service_box4',	array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_integer',	
	));

	$wp_customize->add_control('service_box4', array(
		'description' => esc_html__('Select Page for Service box 4' , 'alacrity-lite'),
		'type' => 'dropdown-pages',
		'setting' => 'service_box4',
		'section' => 'services_section'
	));


	// About Section
   	$wp_customize->add_section('about_section' , array(
		'title'	=> esc_html__('About Section','alacrity-lite'),
		'panel' => 'homepage_panel',
		'priority'	=> null
	));	
	$wp_customize->add_setting('hide_about_section',array(
		'default' => 0,
		'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_about_section', array(
   	   'label' => __('Check to Hide This Section', 'alacrity-lite'),
   	   'type' => 'checkbox',
   	   'setting' => 'hide_about_section',
   	   'section' => 'about_section'
     ));	

	$wp_customize->add_setting('about_setting' , array(
		'default' => 0,
		'alacrity_lite_sanitize_callback' => 'alacrity_lite_sanitize_integer'
	));

	$wp_customize->add_control("about_setting", array(
		'description' => __('Select a page to display in this section', 'alacrity-lite'),
		'type' =>'dropdown-pages',
		'setting' => 'about_setting',
		'section' => 'about_section'
	));
	
     // General Setting Panel
    $wp_customize->add_panel( 'general_setting', array(
      'title' => __( 'Header And Footer Setting','alacrity-lite' ),
      'description' => __( 'Change general settings from here','alacrity-lite' ),
      'priority' => 150, 
    ) );

	 
	// Top Bar
	$wp_customize->add_section( 'top_header_info',
		array(
		'title'     => esc_html__( 'Header Top Info', 'alacrity-lite' ),
		'panel'		=> 'general_setting',
		'priority'  => 1,
		)
	); 

		
	// Opening time 
	$wp_customize->add_setting( 'ht_time',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'ht_time',
		array(
		'label'  		=> __( 'Opening Time', 'alacrity-lite'),
		'setting' 		=> 'ht_time',
		'section' 		=>'top_header_info'
		)
	);
	$wp_customize->add_setting( 'ht_email',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_email',
		)
	);
	
	$wp_customize->add_control( 'ht_email',
		array(
		'label'  		=> __( 'Email Address', 'alacrity-lite'),
		'setting' 		=> 'ht_email',
		'section' 		=>'top_header_info'
		)
	);
	
	
	// Phone No.
	$wp_customize->add_setting( 'ht_phone',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'ht_phone',
		array(
		'label'  		=> __( 'Phone Number', 'alacrity-lite'),
		'setting' 		=> 'ht_phone',
		'section' 		=>'top_header_info'
		)
	);

	// Social links
	$wp_customize->add_section( 'social_links',
		array(
		'title'     => esc_html__( 'Social Links', 'alacrity-lite' ),
		'panel'		=> 'general_setting',
		'priority'  => 1,
		)
	); 

	$wp_customize->add_setting('fb_link',array(
		'default'	=> null,
		'alacrity_lite_sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
		'label'	=> esc_html__('Add facebook link here','alacrity-lite'),
		'section'	=> 'social_links',
		'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twit_link',array(
		'default'	=> null,
		'alacrity_lite_sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('twit_link',array(
		'label'	=> esc_html__('Add twitter link here','alacrity-lite'),
		'section'	=> 'social_links',
		'setting'	=> 'twit_link'
	));
	$wp_customize->add_setting('gplus_link',array(
		'default'	=> null,
		'alacrity_lite_sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
		'label'	=> esc_html__('Add google plus link here','alacrity-lite'),
		'section'	=> 'social_links',
		'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
		'default'	=> null,
		'alacrity_lite_sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
		'label'	=> esc_html__('Add linkedin link here','alacrity-lite'),
		'section'	=> 'social_links',
		'setting'	=> 'linkedin_link'
	));
	$wp_customize->add_setting('pinterest_link',array(
		'default'	=> null,
		'alacrity_lite_sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('pinterest_link',array(
		'label'	=> esc_html__('Add linkedin link here','alacrity-lite'),
		'section'	=> 'social_links',
		'setting'	=> 'pinterest_link'
	));


	// Footer Contact Info
	$wp_customize->add_section( 'footer_contact_info',
		array(
		'title'     => esc_html__( 'Footer Contact Info', 'alacrity-lite' ),
		'panel'		=> 'general_setting',
		'priority'  => 1,
		)
	); 

	// Contact Address
	$wp_customize->add_setting ( 'cnt_info_title', array(
		'default' => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( 'cnt_info_title', array(
		'label'  		=> __( 'Contact Info Title', 'alacrity-lite'),
		'setting' 		=> 'cnt_info_title',
		'section' 		=>'footer_contact_info'
	));
	$wp_customize->add_setting( 'cnt_info_text',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'cnt_info_text',
		array(
		'label'  		=> __( 'Contact Info Text', 'alacrity-lite'),
		'type'			=> 'textarea',
		'setting' 		=> 'cnt_info_text',
		'section' 		=>'footer_contact_info'
		)
	);

	// Contact Address
	$wp_customize->add_setting( 'cnt_address',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'cnt_address',
		array(
		'label'  		=> __( 'Contact Address', 'alacrity-lite'),
		'setting' 		=> 'cnt_address',
		'section' 		=>'footer_contact_info'
		)
	);

	// Contact No.
	$wp_customize->add_setting( 'cnt_number',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'cnt_number',
		array(
		'label'  		=> __( 'Contact Number', 'alacrity-lite'),
		'setting' 		=> 'cnt_number',
		'section' 		=>'footer_contact_info'
		)
	);

	// Contact No.
	$wp_customize->add_setting( 'cnt_number',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'cnt_number',
		array(
		'label'  		=> __( 'Contact Number', 'alacrity-lite'),
		'setting' 		=> 'cnt_number',
		'section' 		=>'footer_contact_info'
		)
	);

	// Contact Fax No.
	$wp_customize->add_setting( 'cnt_fax_number',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'cnt_fax_number',
		array(
		'label'  		=> __( 'Contact Fax Number', 'alacrity-lite'),
		'setting' 		=> 'cnt_fax_number',
		'section' 		=>'footer_contact_info'
		)
	);
	// Contact Email Address
	$wp_customize->add_setting( 'cnt_email',
		array(
		'default'    => null,
		'alacrity_lite_sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control( 'cnt_email',
		array(
		'label'  		=> __( 'Contact Email Address', 'alacrity-lite'),
		'setting' 		=> 'cnt_email',
		'section' 		=>'footer_contact_info'
		)
	);