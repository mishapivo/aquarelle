<?php
/**
 * Blog List Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_customize_blog_list_option' );

function lifestyle_magazine_customize_blog_list_option( $wp_customize ) {

    $wp_customize->add_section( 'lifestyle_magazine_blog_list_section', array(
        'title'          => esc_html__( 'Blog Options', 'lifestyle-magazine' ),
        'panel'          => 'lifestyle_magazine_theme_options_panel',
    ) );

    $wp_customize->add_setting( 'homepage_blog_post_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Custom_Text( $wp_customize, 'homepage_blog_post_title_text', array(
        'label' =>  esc_html__( 'Homepage Blog Section Options :', 'lifestyle-magazine' ),
        'section'   =>  'lifestyle_magazine_blog_list_section',
        'Settings'  =>  'homepage_blog_post_title_text'
    ) ) );

    $wp_customize->add_setting( 'homepage_blog_display_option', array(
      'sanitize_callback'     =>  'lifestyle_magazine_sanitize_checkbox',
      'default'               =>  true
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Toggle_Control( $wp_customize, 'homepage_blog_display_option', array(
      'label' => esc_html__( 'Hide / Show','lifestyle-magazine' ),
      'section' => 'lifestyle_magazine_blog_list_section',
      'settings' => 'homepage_blog_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'homepage_blog_section_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_category',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'homepage_blog_section_category', array(
        'label' => esc_html__( 'Choose Category', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_blog_list_section',
        'settings' => 'homepage_blog_section_category',
        'type' => 'dropdown-taxonomies',
    ) ) );

    $wp_customize->add_setting( 'blog_post_list_options_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Custom_Text( $wp_customize, 'blog_post_list_options_title_text', array(
        'label' =>  esc_html__( 'Blog List Options :', 'lifestyle-magazine' ),
        'section'   =>  'lifestyle_magazine_blog_list_section',
        'Settings'  =>  'blog_post_list_options_title_text'
    ) ) );

    $wp_customize->add_setting( 'blog_post_layout', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_choices',
        'default'     => 'sidebar-right',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Radio_Buttonset_Control( $wp_customize, 'blog_post_layout', array(
        'label' => esc_html__( 'Layouts :', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_blog_list_section',
        'settings' => 'blog_post_layout',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'sidebar-left' => esc_html__( 'Sidebar at left', 'lifestyle-magazine' ),
            'no-sidebar'    =>  esc_html__( 'No sidebar', 'lifestyle-magazine' ),
            'sidebar-right' => esc_html__( 'Sidebar at right', 'lifestyle-magazine' ),            
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_view', array(
        'transport'  => 'postMessage',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_choices',
        'default'     => 'grid-view',
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Radio_Buttonset_Control( $wp_customize, 'blog_post_view', array(
        'label' => esc_html__( 'Post View :', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_blog_list_section',
        'settings' => 'blog_post_view',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'grid-view' => esc_html__( 'Grid View', 'lifestyle-magazine' ),
            'list-view' => esc_html__( 'List View', 'lifestyle-magazine' ),
            'full-width-view' => esc_html__( 'Fullwidth View', 'lifestyle-magazine' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Multi_Check_Control( $wp_customize, 'blog_post_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_blog_list_section',
        'settings' => 'blog_post_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'lifestyle-magazine' ),
            'date' => esc_html__( 'Show post date', 'lifestyle-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'lifestyle-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'lifestyle-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'lifestyle-magazine' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'post_details_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Custom_Text( $wp_customize, 'post_details_title_text', array(
        'label' =>  esc_html__( 'Detail Page Options :', 'lifestyle-magazine' ),
        'section'   =>  'lifestyle_magazine_blog_list_section',
        'Settings'  =>  'post_details_title_text'
    ) ) );


    $wp_customize->add_setting( 'detail_post_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Multi_Check_Control( $wp_customize, 'detail_post_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_blog_list_section',
        'settings' => 'detail_post_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'lifestyle-magazine' ),
            'date' => esc_html__( 'Show post date', 'lifestyle-magazine' ),     
            'categories' => esc_html__( 'Show Categories', 'lifestyle-magazine' ),
            'tags' => esc_html__( 'Show Tags', 'lifestyle-magazine' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'lifestyle-magazine' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'show_hide_author_block_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'lifestyle_magazine_sanitize_array',
        'default'     => array( 'author' ),
    ) );

    $wp_customize->add_control( new Lifestyle_Magazine_Multi_Check_Control( $wp_customize, 'show_hide_author_block_details', array(
        'label' => esc_html__( 'Author Block', 'lifestyle-magazine' ),
        'section' => 'lifestyle_magazine_blog_list_section',
        'settings' => 'show_hide_author_block_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show author block', 'lifestyle-magazine' ),
        ),
    ) ) );
}