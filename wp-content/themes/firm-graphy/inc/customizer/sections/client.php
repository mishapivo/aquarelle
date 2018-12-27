<?php
/**
 * Client Section options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add Client section
$wp_customize->add_section( 'firm_graphy_client_section', array(
	'title'             => esc_html__( 'Client','firm-graphy' ),
	'description'       => esc_html__( 'Client Section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_front_page_panel',
) );

// Client content enable control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[client_section_enable]', array(
	'default'			=> 	$options['client_section_enable'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[client_section_enable]', array(
	'label'             => esc_html__( 'Client Section Enable', 'firm-graphy' ),
	'section'           => 'firm_graphy_client_section',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// client title setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[client_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['client_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[client_title]', array(
	'label'           	=> esc_html__( 'Title', 'firm-graphy' ),
	'section'        	=> 'firm_graphy_client_section',
	'active_callback' 	=> 'firm_graphy_is_client_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'firm_graphy_theme_options[client_title]', array(
		'selector'            => '#client-slider .section-header h2.section-title',
		'settings'            => 'firm_graphy_theme_options[client_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'firm_graphy_client_title_partial',
    ) );
}

for ( $i = 1; $i <= 5; $i++ ) :
	// client pages drop down chooser control and setting
	$wp_customize->add_setting( 'firm_graphy_theme_options[client_content_page_' . $i . ']', array(
		'sanitize_callback' => 'firm_graphy_sanitize_page',
	) );

	$wp_customize->add_control( new Firm_Graphy_Dropdown_Chooser( $wp_customize, 'firm_graphy_theme_options[client_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'firm-graphy' ), $i ),
		'section'           => 'firm_graphy_client_section',
		'choices'			=> firm_graphy_page_choices(),
		'active_callback'	=> 'firm_graphy_is_client_section_enable',
	) ) );

endfor;

