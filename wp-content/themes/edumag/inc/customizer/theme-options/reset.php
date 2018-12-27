<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

/**
* Reset section
*/

// Add reset enable section
$wp_customize->add_section( 'edumag_reset_section', 
	array(
		'title'             => esc_html__( 'Reset all settings', 'edumag' ),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'edumag' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'edumag_theme_options[reset_options]', 
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'edumag_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'edumag_theme_options[reset_options]', 
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'edumag' ),
		'section'           => 'edumag_reset_section',
		'type'              => 'checkbox',
	)
);