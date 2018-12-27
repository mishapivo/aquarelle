<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'tourable_service_section', array(
	'title'             => esc_html__( 'Services','tourable' ),
	'description'       => esc_html__( 'Services Section options.', 'tourable' ),
	'panel'             => 'tourable_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'tourable' ),
	'section'           => 'tourable_service_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// service btn label setting and control
$wp_customize->add_setting( 'tourable_theme_options[service_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_btn_label'],
	'transport'			=> 'refresh',
) );

$wp_customize->add_control( 'tourable_theme_options[service_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'tourable' ),
	'section'        	=> 'tourable_service_section',
	'active_callback' 	=> 'tourable_is_service_section_enable',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'tourable_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Tourable_Icon_Picker( $wp_customize, 'tourable_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'tourable' ), $i ),
		'section'           => 'tourable_service_section',
		'active_callback'	=> 'tourable_is_service_section_enable',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'tourable_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'tourable_sanitize_page',
	) );

	$wp_customize->add_control( new Tourable_Dropdown_Chooser( $wp_customize, 'tourable_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'tourable' ), $i ),
		'section'           => 'tourable_service_section',
		'choices'			=> tourable_page_choices(),
		'active_callback'	=> 'tourable_is_service_section_enable',
	) ) );

	// service hr setting and control
	$wp_customize->add_setting( 'tourable_theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Tourable_Customize_Horizontal_Line( $wp_customize, 'tourable_theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'tourable_service_section',
			'active_callback' => 'tourable_is_service_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;
