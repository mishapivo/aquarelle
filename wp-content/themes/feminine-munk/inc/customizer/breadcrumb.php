<?php
/**
 * Breadcrumbs Options
 *
 * @package feminine-munk
 */

function feminine_munk_customize_register_breadcrumbs($wp_customize){

    /** BreadCrumb Settings */
    $wp_customize->add_section(
        'breadcrumb_settings',
        array(
            'title'      => __('Breadcrumb Settings', 'feminine-munk'),
            'priority'   => 60,
            'capability' => 'edit_theme_options',
        )
    );

    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'ed_breadcrumb',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'ed_breadcrumb',
        array(
            'label'   => __('Enable Breadcrumb', 'feminine-munk'),
            'section' => 'breadcrumb_settings',
            'type'    => 'checkbox',
        )
    );

    /** Home Text */
    $wp_customize->add_setting(
        'breadcrumb_home_text',
        array(
            'default'           => __('Home', 'feminine-munk'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'breadcrumb_home_text',
        array(
            'label'   => __('Breadcrumb Home Text', 'feminine-munk'),
            'section' => 'breadcrumb_settings',
            'type'    => 'text',
        )
    );

    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'breadcrumb_separator',
        array(
            'default'           => __('>', 'feminine-munk'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'breadcrumb_separator',
        array(
            'label'     => __('Breadcrumb Separator', 'feminine-munk'),
            'section'   => 'breadcrumb_settings',
            'type'      => 'text',
        )
    );
    /** BreadCrumb Settings Ends */

}
add_action('customize_register', 'feminine_munk_customize_register_breadcrumbs');