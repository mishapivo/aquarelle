<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add About section
$wp_customize->add_section( 'firm_graphy_about_section', array(
	'title'             => esc_html__( 'About Us','firm-graphy' ),
	'description'       => esc_html__( 'About Section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'firm-graphy' ),
	'section'           => 'firm_graphy_about_section',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[about_content_page]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_page',
) );

$wp_customize->add_control( new Firm_Graphy_Dropdown_Chooser( $wp_customize, 'firm_graphy_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'firm-graphy' ),
	'section'           => 'firm_graphy_about_section',
	'choices'			=> firm_graphy_page_choices(),
	'active_callback'	=> 'firm_graphy_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'firm-graphy' ),
	'section'        	=> 'firm_graphy_about_section',
	'active_callback' 	=> 'firm_graphy_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'firm_graphy_theme_options[about_btn_title]', array(
		'selector'            => '#skills a.btn-primary',
		'settings'            => 'firm_graphy_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'firm_graphy_about_btn_title_partial',
    ) );
}

// about hr setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[about_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( new Firm_Graphy_Customize_Horizontal_Line( $wp_customize, 'firm_graphy_theme_options[about_hr]',
	array(
		'section'         => 'firm_graphy_about_section',
		'active_callback' => 'firm_graphy_is_about_section_enable',
		'type'			  => 'hr'
) ) );

// skills setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[about_skill]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[about_skill]', array(
	'label'           	=> esc_html__( 'Skill Shortcode', 'firm-graphy' ),
	'description'       => sprintf( '%1$s <a href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=install' ) ) . '" target="_blank"> %2$s </a> %3$s', esc_html__( 'Show your skills in horizontal line graph. Use shortcode from TP PieBuilder plugin. ', 'firm-graphy' ), esc_html__( 'Click Here', 'firm-graphy' ), esc_html__( 'to download.', 'firm-graphy' ) ),
	'section'        	=> 'firm_graphy_about_section',
	'active_callback' 	=> 'firm_graphy_is_about_section_enable',
	'type'				=> 'textarea',
) );