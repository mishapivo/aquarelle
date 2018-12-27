<?php
/**
* Header options
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_header_options($wp_customize) {

    // Header
    $wp_customize->add_section( 'sc_clean_grid_header', array( 'title' => esc_html__( 'Header Options', 'clean-grid' ), 'panel' => 'clean_grid_main_options_panel', 'priority' => 240 ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'clean-grid' ), 'section' => 'sc_clean_grid_header', 'settings' => 'clean_grid_options[hide_header_content]', 'type' => 'checkbox', ) );

}