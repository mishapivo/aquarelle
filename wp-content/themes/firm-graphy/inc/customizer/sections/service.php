<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'firm_graphy_service_section', array(
	'title'             => esc_html__( 'Services','firm-graphy' ),
	'description'       => esc_html__( 'Services Section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'firm-graphy' ),
	'section'           => 'firm_graphy_service_section',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// service title setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[service_title]', array(
	'label'           	=> esc_html__( 'Title', 'firm-graphy' ),
	'section'        	=> 'firm_graphy_service_section',
	'active_callback' 	=> 'firm_graphy_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'firm_graphy_theme_options[service_title]', array(
		'selector'            => '#services .section-header h2.section-title',
		'settings'            => 'firm_graphy_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'firm_graphy_service_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'firm_graphy_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Firm_Graphy_Icon_Picker( $wp_customize, 'firm_graphy_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'firm-graphy' ), $i ),
		'section'           => 'firm_graphy_service_section',
		'active_callback'	=> 'firm_graphy_is_service_section_enable',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'firm_graphy_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'firm_graphy_sanitize_page',
	) );

	$wp_customize->add_control( new Firm_Graphy_Dropdown_Chooser( $wp_customize, 'firm_graphy_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'firm-graphy' ), $i ),
		'section'           => 'firm_graphy_service_section',
		'choices'			=> firm_graphy_page_choices(),
		'active_callback'	=> 'firm_graphy_is_service_section_enable',
	) ) );

endfor;
