<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Archi
* @since Archi 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'firm_graphy_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'firm_graphy_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'firm-graphy' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'firm-graphy' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );