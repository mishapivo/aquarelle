<?php
/**
 * Event Section options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add Event section
$wp_customize->add_section( 'firm_graphy_event_section', array(
	'title'             => esc_html__( 'Event','firm-graphy' ),
	'description'       => esc_html__( 'Event Section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_front_page_panel',
) );

// Event content enable control and setting
$wp_customize->add_setting( 'firm_graphy_theme_options[event_section_enable]', array(
	'default'			=> 	$options['event_section_enable'],
	'sanitize_callback' => 'firm_graphy_sanitize_switch_control',
) );

$wp_customize->add_control( new Firm_Graphy_Switch_Control( $wp_customize, 'firm_graphy_theme_options[event_section_enable]', array(
	'label'             => esc_html__( 'Event Section Enable', 'firm-graphy' ),
	'section'           => 'firm_graphy_event_section',
	'on_off_label' 		=> firm_graphy_switch_options(),
) ) );

// event title setting and control
$wp_customize->add_setting( 'firm_graphy_theme_options[event_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['event_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[event_title]', array(
	'label'           	=> esc_html__( 'Title', 'firm-graphy' ),
	'section'        	=> 'firm_graphy_event_section',
	'active_callback' 	=> 'firm_graphy_is_event_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'firm_graphy_theme_options[event_title]', array(
		'selector'            => '#education .section-header h2.section-title',
		'settings'            => 'firm_graphy_theme_options[event_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'firm_graphy_event_title_partial',
    ) );
}


// event image setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[event_image]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'firm_graphy_theme_options[event_image]',
		array(
		'label'       		=> esc_html__( 'Image', 'firm-graphy' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'firm-graphy' ), 520, 717 ),
		'section'     		=> 'firm_graphy_event_section',
		'active_callback'	=> 'firm_graphy_is_event_section_enable',
) ) );


for ( $i = 1; $i <= 2; $i++ ) :
	// event pages drop down chooser control and setting
	$wp_customize->add_setting( 'firm_graphy_theme_options[event_content_page_' . $i . ']', array(
		'sanitize_callback' => 'firm_graphy_sanitize_page',
	) );

	$wp_customize->add_control( new Firm_Graphy_Dropdown_Chooser( $wp_customize, 'firm_graphy_theme_options[event_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'firm-graphy' ), $i ),
		'section'           => 'firm_graphy_event_section',
		'choices'			=> firm_graphy_page_choices(),
		'active_callback'	=> 'firm_graphy_is_event_section_enable',
	) ) );

	// event hr setting and control
	$wp_customize->add_setting( 'firm_graphy_theme_options[event_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Firm_Graphy_Customize_Horizontal_Line( $wp_customize, 'firm_graphy_theme_options[event_hr_'. $i .']',
		array(
			'section'         => 'firm_graphy_event_section',
			'active_callback' => 'firm_graphy_is_event_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;


