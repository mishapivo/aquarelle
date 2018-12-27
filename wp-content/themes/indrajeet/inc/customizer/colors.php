<?php
/**
 * Color Options
 *
 * @package Indrajeet
 */

// Footer background Color setting.
$wp_customize->add_setting('indrajeet_options[indrajeet_footer_bg_color]', array(
	'default'           => $defaults['indrajeet_footer_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color',
));

// Footer background Color Control.
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'indrajeet_options[indrajeet_footer_bg_color]', array(
	'label'       => esc_html__( 'Footer Section Background Color', 'indrajeet' ),
	'description' => esc_html__( 'Footer Section Background Color', 'indrajeet' ),
	'section'     => 'colors',
	'settings'    => 'indrajeet_options[indrajeet_footer_bg_color]',
	'priority'    => 21,
) ) );
