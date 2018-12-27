<?php
/**
 * Popular Destination Section options
 *
 * @popular_destination Theme Palace
 * @subpopular_destination Tourable
 * @since Tourable 1.0.0
 */

// Add Popular Destination section
$wp_customize->add_section( 'tourable_popular_destination_section', array(
	'title'             => esc_html__( 'Popular Destination','tourable' ),
	'description'       => esc_html__( 'Popular Destination Section options.', 'tourable' ),
	'panel'             => 'tourable_front_page_panel',
) );

// Popular Destination content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[popular_destination_section_enable]', array(
	'default'			=> 	$options['popular_destination_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[popular_destination_section_enable]', array(
	'label'             => esc_html__( 'Popular Destination Section Enable', 'tourable' ),
	'section'           => 'tourable_popular_destination_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// popular destination title setting and control
$wp_customize->add_setting( 'tourable_theme_options[popular_destination_title]', array(
	'default'			=> $options['popular_destination_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tourable_theme_options[popular_destination_title]', array(
	'label'           	=> esc_html__( 'Title', 'tourable' ),
	'section'        	=> 'tourable_popular_destination_section',
	'active_callback' 	=> 'tourable_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tourable_theme_options[popular_destination_title]', array(
		'selector'            => '#popular-destinations .section-header h2.section-title',
		'settings'            => 'tourable_theme_options[popular_destination_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tourable_popular_destination_title_partial',
    ) );
}

// popular destination read more setting and control
$wp_customize->add_setting( 'tourable_theme_options[popular_destination_read_more]', array(
	'default'			=> $options['popular_destination_read_more'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'tourable_theme_options[popular_destination_read_more]', array(
	'label'           	=> esc_html__( 'Read More Text', 'tourable' ),
	'section'        	=> 'tourable_popular_destination_section',
	'active_callback' 	=> 'tourable_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Popular Destination content type control and setting
$wp_customize->add_setting( 'tourable_theme_options[popular_destination_content_type]', array(
	'default'          	=> $options['popular_destination_content_type'],
	'sanitize_callback' => 'tourable_sanitize_select',
) );

$wp_customize->add_control( 'tourable_theme_options[popular_destination_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'tourable' ),
	'section'           => 'tourable_popular_destination_section',
	'type'				=> 'select',
	'active_callback' 	=> 'tourable_is_popular_destination_section_enable',
	'choices'			=> tourable_popular_destination_content_type(),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'tourable_theme_options[popular_destination_content_category]', array(
	'sanitize_callback' => 'tourable_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Tourable_Dropdown_Taxonomies_Control( $wp_customize,'tourable_theme_options[popular_destination_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'tourable' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'tourable' ),
	'section'           => 'tourable_popular_destination_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tourable_is_popular_destination_section_content_category_enable'
) ) );


// Add dropdown category setting and control.
$wp_customize->add_setting(  'tourable_theme_options[popular_destination_content_destination]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new Tourable_Dropdown_Taxonomies_Control( $wp_customize,'tourable_theme_options[popular_destination_content_destination]', array(
	'label'             => esc_html__( 'Select Destinations', 'tourable' ),
	'section'           => 'tourable_popular_destination_section',
	'taxonomy'			=> 'travel_locations',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'tourable_is_popular_destination_section_content_destination_enable'
) ) );
