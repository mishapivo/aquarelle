<?php
/**
* Getting started options
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_getting_started($wp_customize) {

    $wp_customize->add_section( 'sc_clean_grid_getting_started', array( 'title' => esc_html__( 'Getting Started', 'clean-grid' ), 'description' => esc_html__( 'Thanks for your interest in Clean Grid! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'clean-grid' ), 'panel' => 'clean_grid_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'clean_grid_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new Clean_Grid_Customize_Button_Control( $wp_customize, 'clean_grid_documentation_control', array( 'label' => esc_html__( 'Documentation', 'clean-grid' ), 'section' => 'sc_clean_grid_getting_started', 'settings' => 'clean_grid_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/clean-grid-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'clean_grid_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new Clean_Grid_Customize_Button_Control( $wp_customize, 'clean_grid_contact_control', array( 'label' => esc_html__( 'Contact Us', 'clean-grid' ), 'section' => 'sc_clean_grid_getting_started', 'settings' => 'clean_grid_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

}