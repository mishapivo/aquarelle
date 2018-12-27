<?php
/**
 * Travelers Choice Section options
 *
 * @traveler_choice Theme Palace
 * @subtraveler_choice Tourable
 * @since Tourable 1.0.0
 */

// Add Travelers Choice section
$wp_customize->add_section( 'tourable_traveler_choice_section', array(
	'title'             => esc_html__( 'Travelers Choice','tourable' ),
	'description'       => esc_html__( 'Travelers Choice Section options.', 'tourable' ),
	'panel'             => 'tourable_front_page_panel',
) );

// Travelers Choice content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[traveler_choice_section_enable]', array(
	'default'			=> 	$options['traveler_choice_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[traveler_choice_section_enable]', array(
	'label'             => esc_html__( 'Travelers Choice Section Enable', 'tourable' ),
	'section'           => 'tourable_traveler_choice_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// popular destination title setting and control
$wp_customize->add_setting( 'tourable_theme_options[traveler_choice_title]', array(
	'default'			=> $options['traveler_choice_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tourable_theme_options[traveler_choice_title]', array(
	'label'           	=> esc_html__( 'Title', 'tourable' ),
	'section'        	=> 'tourable_traveler_choice_section',
	'active_callback' 	=> 'tourable_is_traveler_choice_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tourable_theme_options[traveler_choice_title]', array(
		'selector'            => '#travellers-choice .section-header h2.section-title',
		'settings'            => 'tourable_theme_options[traveler_choice_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tourable_traveler_choice_title_partial',
    ) );
}

// popular destination read more setting and control
$wp_customize->add_setting( 'tourable_theme_options[traveler_choice_read_more]', array(
	'default'			=> $options['traveler_choice_read_more'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'tourable_theme_options[traveler_choice_read_more]', array(
	'label'           	=> esc_html__( 'Read More Text', 'tourable' ),
	'section'        	=> 'tourable_traveler_choice_section',
	'active_callback' 	=> 'tourable_is_traveler_choice_section_enable',
	'type'				=> 'text',
) );

// Travelers Choice content type control and setting
$wp_customize->add_setting( 'tourable_theme_options[traveler_choice_content_type]', array(
	'default'          	=> $options['traveler_choice_content_type'],
	'sanitize_callback' => 'tourable_sanitize_select',
) );

$wp_customize->add_control( 'tourable_theme_options[traveler_choice_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'tourable' ),
	'section'           => 'tourable_traveler_choice_section',
	'type'				=> 'select',
	'active_callback' 	=> 'tourable_is_traveler_choice_section_enable',
	'choices'			=> tourable_traveler_choice_content_type(),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'tourable_theme_options[traveler_choice_content_category]', array(
	'sanitize_callback' => 'tourable_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Tourable_Dropdown_Taxonomies_Control( $wp_customize,'tourable_theme_options[traveler_choice_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'tourable' ),
	'description'      	=> esc_html__( 'Note: Travelers Choice selected no of posts will be shown from selected category', 'tourable' ),
	'section'           => 'tourable_traveler_choice_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tourable_is_traveler_choice_section_content_category_enable'
) ) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'tourable_theme_options[traveler_choice_content_trip_types]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Tourable_Dropdown_Taxonomies_Control( $wp_customize,'tourable_theme_options[traveler_choice_content_trip_types]', array(
	'label'             => esc_html__( 'Select Trip Types', 'tourable' ),
	'section'           => 'tourable_traveler_choice_section',
	'taxonomy'			=> 'itinerary_types',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tourable_is_traveler_choice_section_content_trip_types_enable'
) ) );
