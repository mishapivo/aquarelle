<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'firm_graphy_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','firm-graphy' ),
	'description'       => esc_html__( 'Excerpt section options.', 'firm-graphy' ),
	'panel'             => 'firm_graphy_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'firm_graphy_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'firm_graphy_sanitize_number_range',
	'validate_callback' => 'firm_graphy_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'firm_graphy_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'firm-graphy' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'firm-graphy' ),
	'section'     		=> 'firm_graphy_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
