<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'tourable_reset_section', array(
	'title'             => esc_html__('Reset all settings','tourable'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'tourable' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'tourable_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'tourable_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'tourable_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'tourable' ),
	'section'           => 'tourable_reset_section',
	'type'              => 'checkbox',
) );
