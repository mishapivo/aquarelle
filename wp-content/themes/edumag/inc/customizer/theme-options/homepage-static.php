<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage EduMag
* @since EduMag 0.1
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'edumag_theme_options[enable_frontpage_content]', 
	array(
		'sanitize_callback' => 'edumag_sanitize_checkbox',
		'default'           => $options['enable_frontpage_content'],
	)
);

$wp_customize->add_control( 'edumag_theme_options[enable_frontpage_content]', 
	array(
		'label'       		=> esc_html__( 'Enable Content', 'edumag' ),
		'description' 		=> esc_html__( 'Check to enable content on static front page only.', 'edumag' ),
		'section'     		=> 'static_front_page',
		'type'        		=> 'checkbox'
	)
);