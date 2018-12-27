<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'tourable_slider_section', array(
	'title'             => esc_html__( 'Main Slider','tourable' ),
	'description'       => esc_html__( 'Slider Section options.', 'tourable' ),
	'panel'             => 'tourable_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'tourable' ),
	'section'           => 'tourable_slider_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// Slider btn label setting and control
$wp_customize->add_setting( 'tourable_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
) );

$wp_customize->add_control( 'tourable_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'tourable' ),
	'section'        	=> 'tourable_slider_section',
	'active_callback' 	=> 'tourable_is_slider_section_enable',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'tourable_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'tourable_sanitize_page',
	) );

	$wp_customize->add_control( new Tourable_Dropdown_Chooser( $wp_customize, 'tourable_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'tourable' ), $i ),
		'section'           => 'tourable_slider_section',
		'choices'			=> tourable_page_choices(),
		'active_callback'	=> 'tourable_is_slider_section_enable',
	) ) );
endfor;
