<?php

function feminine_munk_feature_post($wp_customize)
{

    global $feminine_munk_options_posts;

    /**Feature Post */
    $wp_customize->add_section(
        'feature_post',
        array(
            'title'       => __('Feature Post', 'feminine-munk'),
            'description' => __('Select post to show the feature post on home page', 'feminine-munk'),
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
        )
    );

    /** Enable/Disable feature post */
    $wp_customize->add_setting(
        'ed_feature_post',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'ed_feature_post',
        array(
            'label'     => __('Enable/Disable Feature Post', 'feminine-munk'),
            'section'   => 'feature_post',
            'type'      => 'checkbox',
        )
    );

    /** Featured Post One */
    $wp_customize->add_setting(
        'featured_post_one',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'featured_post_one',
        array(
            'label'     => __('Select Post one', 'feminine-munk'),
            'section'   => 'feature_post',
            'type'      => 'select',
            'choices'   => $feminine_munk_options_posts,
        )
    );
    /** Featured Post two */
    $wp_customize->add_setting(
        'featured_post_two',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'featured_post_two',
        array(
            'label'     => __('Select Post two', 'feminine-munk'),
            'section'   => 'feature_post',
            'type'      => 'select',
            'choices'   => $feminine_munk_options_posts,
        )
    );
    /** Featured Post three */
    $wp_customize->add_setting(
        'featured_post_three',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'featured_post_three',
        array(
            'label'     => __('Select Post three', 'feminine-munk'),
            'section'   => 'feature_post',
            'type'      => 'select',
            'choices'   => $feminine_munk_options_posts,
        )
    );
    /** Featured Post Four */
    $wp_customize->add_setting(
        'featured_post_four',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'featured_post_four',
        array(
            'label'     => __('Select Post Four', 'feminine-munk'),
            'section'   => 'feature_post',
            'type'      => 'select',
            'choices'   => $feminine_munk_options_posts,
        )
    );

        /** Featured Post Four */
    $wp_customize->add_setting(
        'featured_post_five',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'featured_post_five',
        array(
            'label'     => __('Select Post Five', 'feminine-munk'),
            'section'   => 'feature_post',
            'type'      => 'select',
            'choices'   => $feminine_munk_options_posts,
        )
    );
}
add_action('customize_register', 'feminine_munk_feature_post', 50);