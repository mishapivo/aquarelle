<?php
/**
 * General Setting
 *
 * @package feminine-munk
 */
function feminine_munk_general_setting($wp_customize){

    /** General Settings */
    $wp_customize->add_panel(
        'general_settings',
        array(
            'title'       => __('General Settings', 'feminine-munk'),
            'description' => __('Leave blank if you do not want to show the social link.', 'feminine-munk'),
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
        )
    );

    /** General Settings */
    $wp_customize->add_section(
        'top_header_settings',
        array(
            'title'      => __('Header Settings', 'feminine-munk'),
            'priority'   => 40,
            'panel'      => 'general_settings',
            'capability' => 'edit_theme_options',
        )
    );
    /** Enable/Disable Top Header */
    $wp_customize->add_setting(
        'ed_header_setting',
        array(
            'default'           => '1',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'ed_header_setting',
        array(
            'label'   => __('Enable Top Header', 'feminine-munk'),
            'section' => 'top_header_settings',
            'type'    => 'checkbox',
        )
    );

    /** Enable/Disable Search */
    $wp_customize->add_setting(
        'ed_header_search_setting',
        array(
            'default'           => '1',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'ed_header_search_setting',
        array(
            'label'   => __('Enable Search Form', 'feminine-munk'),
            'section' => 'top_header_settings',
            'type'    => 'checkbox',
        )
    );

    /** Footer Settings */
    $wp_customize->add_section(
        'footer_credit_settings',
        array(
            'title'      => __('Footer Settings', 'feminine-munk'),
            'priority'   => 40,
            'panel'      => 'general_settings',
            'capability' => 'edit_theme_options',
        )
    );

    /** Text for Footer credit */
    $wp_customize->add_setting(
        'footer_credit_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $wp_customize->add_control(
        'footer_credit_setting',
        array(
            'label'     => __('Footer Credit', 'feminine-munk'),
            'section'   => 'footer_credit_settings',
            'type'      => 'textarea',
        )
    );

    /** Similar Post Settings */
    $wp_customize->add_section(
        'similar_post_settings',
        array(
            'title'      => __('Similar Post Setting', 'feminine-munk'),
            'priority'   => 40,
            'panel'      => 'general_settings',
            'capability' => 'edit_theme_options',
        )
    );

    /** enable/disable */
    $wp_customize->add_setting(
        'ed_similar_post_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'ed_similar_post_setting',
        array(
            'label'     => __('Eable/Disable Similar Post', 'feminine-munk'),
            'section'   => 'similar_post_settings',
            'type'      => 'checkbox',
        )
    );

    /** Text for Similar Post */
    $wp_customize->add_setting(
        'similar_post_text_setting',
        array(
            'default'           => 'Similar Post',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'similar_post_text_setting',
        array(
            'label'   => __('Similar Post Text', 'feminine-munk'),
            'section' => 'similar_post_settings',
            'type'    => 'text',
        )
    );

    /** Similar Post Settings */
    $wp_customize->add_section(
        'continue_reading_settings',
        array(
            'title'      => __('Continue Reading', 'feminine-munk'),
            'priority'   => 40,
            'panel'      => 'general_settings',
            'capability' => 'edit_theme_options',
        )
    );

    /** Text for Similar Post */
    $wp_customize->add_setting(
        'continue_reading_text_setting',
        array(
            'default'           => 'Continue Reading',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'continue_reading_text_setting',
        array(
            'label'   => __('Continue Reading Text', 'feminine-munk'),
            'section' => 'continue_reading_settings',
            'type'    => 'text',
        )
    );
}
add_action('customize_register', 'feminine_munk_general_setting');