<?php
/**
* Footer options
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_footer_options($wp_customize) {

    $wp_customize->add_section( 'sc_clean_grid_footer', array( 'title' => esc_html__( 'Footer', 'clean-grid' ), 'panel' => 'clean_grid_main_options_panel', 'priority' => 440 ) );

    $wp_customize->add_setting( 'clean_grid_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_html', ) );

    $wp_customize->add_control( 'clean_grid_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'clean-grid' ), 'section' => 'sc_clean_grid_footer', 'settings' => 'clean_grid_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'clean-grid' ), 'section' => 'sc_clean_grid_footer', 'settings' => 'clean_grid_options[hide_footer_widgets]', 'type' => 'checkbox', ) );


    $wp_customize->add_setting( 'clean_grid_options[hide_credit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_credit_control', array( 'label' => esc_html__( 'Hide Theme Designer Credits', 'clean-grid' ), 'section' => 'sc_clean_grid_footer', 'settings' => 'clean_grid_options[hide_credit]', 'type' => 'checkbox', ) );

}