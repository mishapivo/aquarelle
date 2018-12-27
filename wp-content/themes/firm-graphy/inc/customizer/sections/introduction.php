<?php
/**
 * Introduction Section options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add Introduction section
$wp_customize->add_section( 'firm_graphy_introduction_section', array(
	'title'             => esc_html__( 'Introduction','firm-graphy' ),
	'description'       => esc_html__( 'Introduction Section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_front_page_panel',
) );

// Introduction content enable control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[introduction_section_enable]', array(
	'default'			=> 	$options['introduction_section_enable'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[introduction_section_enable]', array(
	'label'             => esc_html__( 'Introduction Section Enable', 'firm-graphy' ),
	'section'           => 'firm_graphy_introduction_section',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_page',
) );

$wp_customize->add_control( new Firm_Graphy_Dropdown_Chooser( $wp_customize, 'firm_graphy_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'firm-graphy' ),
	'section'           => 'firm_graphy_introduction_section',
	'choices'			=> firm_graphy_page_choices(),
	'active_callback'	=> 'firm_graphy_is_introduction_section_enable',
) ) );

// Introduction btn label setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[introduction_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['introduction_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[introduction_btn_label]', array(
	'label'           	=> esc_html__( 'Button Label', 'firm-graphy' ),
	'section'        	=> 'firm_graphy_introduction_section',
	'active_callback' 	=> 'firm_graphy_is_introduction_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'firm_graphy_theme_options[introduction_btn_label]', array(
		'selector'            => '#work-experience .work-section-wrapper a.btn-primary',
		'settings'            => 'firm_graphy_theme_options[introduction_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'firm_graphy_introduction_btn_label_partial',
    ) );
}
