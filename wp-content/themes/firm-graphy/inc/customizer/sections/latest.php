<?php
/**
 * Latest Section options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add Latest section
$wp_customize->add_section( 'firm_graphy_latest_section', array(
	'title'             => esc_html__( 'Latest Projects','firm-graphy' ),
	'description'       => esc_html__( 'Latest Section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_front_page_panel',
) );

// Latest content enable control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[latest_section_enable]', array(
	'default'			=> 	$options['latest_section_enable'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[latest_section_enable]', array(
	'label'             => esc_html__( 'Latest Section Enable', 'firm-graphy' ),
	'section'           => 'firm_graphy_latest_section',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// latest title setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[latest_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['latest_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[latest_title]', array(
	'label'           	=> esc_html__( 'Title', 'firm-graphy' ),
	'section'        	=> 'firm_graphy_latest_section',
	'active_callback' 	=> 'firm_graphy_is_latest_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'firm_graphy_theme_options[latest_title]', array(
		'selector'            => '#project .section-header h2.section-title',
		'settings'            => 'firm_graphy_theme_options[latest_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'firm_graphy_latest_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'firm_graphy_theme_options[latest_content_category]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Firm_Graphy_Dropdown_Taxonomies_Control( $wp_customize,'firm_graphy_theme_options[latest_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'firm-graphy' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'firm-graphy' ),
	'section'           => 'firm_graphy_latest_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'firm_graphy_is_latest_section_enable'
) ) );
