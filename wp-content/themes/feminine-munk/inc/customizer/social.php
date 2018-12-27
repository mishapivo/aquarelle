<?php
/**
 * Social Setting
 *
 * @package feminine-munk
 */
function feminine_munk_social($wp_customize){
    /** Social Settings */
    $wp_customize->add_section(
        'social_settings',
        array(
            'title'       => __('Social Settings', 'feminine-munk'),
            'description' => __('Leave blank if you do not want to show the social link.', 'feminine-munk'),
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
        )
    );

    /** Enable/Disable Social */
    $wp_customize->add_setting(
        'ed_header_social_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'ed_header_social_setting',
        array(
            'label'     => __('Enable Header Social Links', 'feminine-munk'),
            'section'   => 'social_settings',
            'type'      => 'checkbox',
        )
    );

    /** Enable/Disable Social */
    $wp_customize->add_setting(
        'ed_footer_social_setting',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'ed_footer_social_setting',
        array(
            'label'     => __('Enable Fooer Social Links', 'feminine-munk'),
            'section'   => 'social_settings',
            'type'      => 'checkbox',
        )
    );

    /** Facebook */
    $wp_customize->add_setting(
        'facebook',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'facebook',
        array(
            'label'     => __('Facebook', 'feminine-munk'),
            'section'   => 'social_settings',
            'type'      => 'text',
        )
    );

    /** Twitter */
    $wp_customize->add_setting(
        'twitter',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'twitter',
        array(
            'label'   => __('Twitter', 'feminine-munk'),
            'section' => 'social_settings',
            'type'    => 'text',
        )
    );

    /** Google Plus */
    $wp_customize->add_setting(
        'google_plus',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'google_plus',
        array(
            'label'     => __('Google Plus', 'feminine-munk'),
            'section'   => 'social_settings',
            'type'      => 'text',
        )
    );

    /** Instagram */
    $wp_customize->add_setting(
        'instagram',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'instagram',
        array(
            'label'     => __('Instagram', 'feminine-munk'),
            'section'   => 'social_settings',
            'type'      => 'text',
        )
    );

    /** pinterest */
    $wp_customize->add_setting(
        'pinterest',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'pinterest',
        array(
            'label'     => __('Pinterest', 'feminine-munk'),
            'section'   => 'social_settings',
            'type'      => 'text',
        )
    );

    /** Youtube */
    $wp_customize->add_setting(
        'youtube',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'youtube',
        array(
            'label'     => __('Youtube', 'feminine-munk'),
            'section'   => 'social_settings',
            'type'      => 'text',
        )
    );
    
    /** Social Settings Ends */
}
add_action('customize_register', 'feminine_munk_social');