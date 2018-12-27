<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'tourable_cta_section', array(
	'title'             => esc_html__( 'Call to Action','tourable' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'tourable' ),
	'panel'             => 'tourable_front_page_panel',
) );

// Call to Action content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'Call to Action Section Enable', 'tourable' ),
	'section'           => 'tourable_cta_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'tourable_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'tourable_sanitize_page',
) );

$wp_customize->add_control( new Tourable_Dropdown_Chooser( $wp_customize, 'tourable_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'tourable' ),
	'section'           => 'tourable_cta_section',
	'choices'			=> tourable_page_choices(),
	'active_callback'	=> 'tourable_is_cta_section_enable',
) ) );

// cta btn title setting and control
$wp_customize->add_setting( 'tourable_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tourable_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'tourable' ),
	'section'        	=> 'tourable_cta_section',
	'active_callback' 	=> 'tourable_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tourable_theme_options[cta_btn_title]', array(
		'selector'            => '#call-to-action .wrapper .read-more a',
		'settings'            => 'tourable_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tourable_cta_btn_title_partial',
    ) );
}
