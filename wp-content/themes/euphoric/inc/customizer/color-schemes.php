<?php
/**
 * Euphoric Color Schemes
 *
 * @package euphoric
 */

// Color Schemes
$wp_customize->add_setting( 'color-schemes' , array(
    'default'   => '#83c5c7',
    'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color-schemes', array(
    'label'      => __( 'Color Schemes', 'euphoric' ),
    'priority'   => 20,
    'section'    => 'colors',
) ) );