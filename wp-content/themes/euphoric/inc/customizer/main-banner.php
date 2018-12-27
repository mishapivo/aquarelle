<?php
/**
 * Euphoric Main Banner
 *
 * @package euphoric
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
    // Main Banner
    $wp_customize->add_setting( 'select_main_banner_category', array(
        'default' => '',
        'sanitize_callback' => 'euphoric_sanitize_select',
    ));
    $wp_customize->add_control( 'select_main_banner_category', array(
        'priority'=>10,
        'label' => __('Select Main Banner', 'euphoric'),
        'section' => 'euphoric_main_banner_section',
        'type' => 'select',
        'choices'   =>  euphoric_cat_list()
    ));


    // Highlight Category
    $wp_customize->add_setting( 'select_category_highlight', array(
        'default' => '',
        'sanitize_callback' => 'euphoric_sanitize_select',
    ));
    $wp_customize->add_control( 'select_category_highlight', array(
        'priority'=>20,
        'label' => __('Select Category Highlight Primary', 'euphoric'),
        'section' => 'euphoric_category_highlight_section',
        'type' => 'select',
        'choices'   =>  euphoric_cat_list()
    ));