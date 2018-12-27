<?php
/**
 * Colors Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_change_colors_panel' );

function lifestyle_magazine_change_colors_panel( $wp_customize)  {
    //$wp_customize->get_section( 'colors' )->title = esc_html__( 'Colors and Fonts', 'lifestyle-magazine' );
    $wp_customize->get_section( 'colors' )->priority = 1;
    $wp_customize->get_section( 'colors' )->panel = 'lifestyle_magazine_general_panel';
}