<?php
/**
 * Euphoric All theme Options
 *
 * @package euphoric
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//Front Page Category (List of categories to hide from home page)

    $frontpage_cat_lists = euphoric_frontpage_cat_list();

    $wp_customize->add_setting(
        'front_page_categories',
        array(
            'default'           => '',
            'sanitize_callback' => 'euphoric_sanitize_multi_checkbox'
        )
    );

    $wp_customize->add_control(
        new Euphoric_Customize_Multiple_Checkboxes_Control(
            $wp_customize,
            'front_page_categories',
            array(
                'section' => 'euphoric_all_theme_options',
                'label'   => __( 'Front/ Home page posts categories', 'euphoric' ),
                'description' => __('Selected category display on front/ home page. If not selected, all post will be displayed','euphoric'),
                'choices' => $frontpage_cat_lists,
                'priority'    => 10,
            )
        )
    );

    // Padding in Header Image
    $wp_customize->add_setting( 'header_image_padding',
        array(
        'default'           => '100',
        'sanitize_callback' => 'euphoric_sanitize_positive_integer',
        )
    );
    $wp_customize->add_control( 'header_image_padding',
        array(
        'label'       => esc_html__( 'Header Image padding', 'euphoric' ),
        'description' => esc_html__( 'Top and Bottom Padding in px', 'euphoric' ),
        'section'     => 'header_image',
        'type'        => 'number',
        'priority'    => 1,
        'input_attrs' => array( 'min' => 1, 'max' => 200),
        )
    );


    // Disable Blog Options
    $wp_customize->add_setting('main-title', array(
            'type'              => 'main-title-control',
            'sanitize_callback' => 'sanitize_text_field',            
        )
    );
    $wp_customize->add_control( new Euphoric_title_display( $wp_customize, 'eup-1', array(
            'priority' => 100,
            'label' => __('Disable Blog/ Single Options', 'euphoric'),
            'section' => 'euphoric_all_theme_options',
            'settings' => 'main-title',
        ) )
    );

    $wp_customize->add_setting( 'disable-author', array(
        'default' => 0,
        'sanitize_callback' => 'euphoric_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-author', array(
        'priority'=>110,
        'label' => __('Disable Author', 'euphoric'),
        'section' => 'euphoric_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'disable-date', array(
        'default' => 0,
        'sanitize_callback' => 'euphoric_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-date', array(
        'priority'=>120,
        'label' => __('Disable Date', 'euphoric'),
        'section' => 'euphoric_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'disable-cateogry', array(
        'default' => 0,
        'sanitize_callback' => 'euphoric_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-cateogry', array(
        'priority'=>130,
        'label' => __('Disable Category', 'euphoric'),
        'section' => 'euphoric_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'disable-comments', array(
        'default' => 0,
        'sanitize_callback' => 'euphoric_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-comments', array(
        'priority'=>140,
        'label' => __('Disable Comments', 'euphoric'),
        'section' => 'euphoric_all_theme_options',
        'type' => 'checkbox',
    ));

    //Select Theme Layout
    $wp_customize->add_setting( 'select-layout', array(
        'default' => 'right',
        'sanitize_callback' => 'euphoric_sanitize_select',
    ));
    $wp_customize->add_control( 'select-layout', array(
        'priority'=>200,
        'label' => __('Select Sidebar Layout', 'euphoric'),
        'section' => 'euphoric_all_theme_options',
        'type' => 'radio',
        'choices' => array(
            'right' => __( 'Default Right Sidebar','euphoric' ),
            'left' => __( 'Left Sidebar','euphoric' ),
            'full-width' => __( 'Fullwidth','euphoric' ),
        ),
    ));

     // Disable Blog Options
    $wp_customize->add_setting('main-title', array(
        'type'              => 'main-title-control',
        'sanitize_callback' => 'sanitize_text_field',            
    ));
    $wp_customize->add_control( new Euphoric_title_display( $wp_customize, 'euphoric-2', array(
        'priority' => 250,
        'label' => __('Disable Sidebar Widget Design Layout', 'euphoric'),
        'description'   => __('Disable Image and text widgets from Widget design. It will display default widgets on secondary sidebar','euphoric'),
        'section' => 'euphoric_all_theme_options',
        'settings' => 'main-title',
    ) ) );

    $wp_customize->add_setting( 'disable-widget-design', array(
        'default' => 0,
        'sanitize_callback' => 'euphoric_sanitize_checkbox',
    ));
    $wp_customize->add_control( 'disable-widget-design', array(
        'priority'=>260,
        'label' => __('Disable Widgets Design', 'euphoric'),
        'section' => 'euphoric_all_theme_options',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'post-pagination', array(
        'default' => 'default',
        'sanitize_callback' => 'euphoric_sanitize_select',
    ));
    $wp_customize->add_control( 'post-pagination', array(
        'priority'=>270,
        'label' => __('Post Pagination', 'euphoric'),
        'section' => 'euphoric_all_theme_options',
        'type' => 'radio',
        'choices' => array(
            'default' => __( 'Default','euphoric' ),
            'numeric' => __( 'Numeric','euphoric' ),
        ),
    ));
