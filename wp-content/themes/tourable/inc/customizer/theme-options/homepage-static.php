<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Tourable
* @since Tourable 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'tourable_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'tourable_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'tourable_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'tourable' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'tourable' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'tourable_is_static_homepage_enable',
) );