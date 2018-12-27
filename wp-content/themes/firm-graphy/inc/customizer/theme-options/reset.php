<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'firm_graphy_reset_section', array(
	'title'             => esc_html__('Reset all settings','firm-graphy'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'firm-graphy' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'firm_graphy_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'firm_graphy_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'firm-graphy' ),
	'section'           => 'firm_graphy_reset_section',
	'type'              => 'checkbox',
) );
