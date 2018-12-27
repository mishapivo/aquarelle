<?php
/**
 * Ads Options
 *
 * @package feminine_munk
 */
 
function feminine_munk_customize_register_ads( $wp_customize ) {
	
     /** AD Settings */
    $wp_customize->add_section(
        'feminine_munk_ad_settings',
        array(
            'title'       => __( 'AD Settings', 'feminine-munk' ),
            'description' => __( 'Header & Footer AD Settings', 'feminine-munk' ),
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Header AD */
    $wp_customize->add_setting(
        'feminine_munk_ed_ads',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'feminine_munk_ed_ads',
        array(
            'label'   => __( 'Enable ADs', 'feminine-munk' ),
            'section' => 'feminine_munk_ad_settings',
            'type'    => 'checkbox',
        )
    );
       
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'feminine_munk_open_link_diff_tab',
        array(
            'default'           => '1',
            'sanitize_callback' => 'feminine_munk_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'feminine_munk_open_link_diff_tab',
        array(
            'label'   => __( 'Open Link in Different Tab', 'feminine-munk' ),
            'section' => 'feminine_munk_ad_settings',
            'type'    => 'checkbox',
        )
    );
    
    /** Header AD */
    $wp_customize->add_setting(
        'feminine_munk_header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'feminine_munk_header_ad',
           array(
               'label'   => __( 'Upload Header AD', 'feminine-munk' ),
               'section' => 'feminine_munk_ad_settings',
               'width'   => 728,
               'height'  => 90,
           )
       )
    );
    
    /** Header AD Link */
    $wp_customize->add_setting(
        'feminine_munk_header_ad_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'feminine_munk_header_ad_link',
        array(
            'label' => __( 'Header AD Link', 'feminine-munk' ),
            'section' => 'feminine_munk_ad_settings',
            'type' => 'text',
        )
    );

    /** Before Post **/
    $wp_customize->add_setting(
        'feminine_munk_before_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'feminine_munk_before_post_ad',
           array(
               'label'   => __( 'Upload Before Post AD', 'feminine-munk' ),
               'section' => 'feminine_munk_ad_settings',
               'width'   => 728,
               'height'  => 90,
           )
       )
    );
    
    /** Before Post AD Link */
    $wp_customize->add_setting(
        'feminine_munk_before_post_ad_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'feminine_munk_before_post_ad_link',
        array(
            'label' => __( 'Before Post AD Link', 'feminine-munk' ),
            'section' => 'feminine_munk_ad_settings',
            'type' => 'text',
        )
    );

    /** After Post */

    $wp_customize->add_setting(
        'feminine_munk_after_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'feminine_munk_after_post_ad',
           array(
               'label'   => __( 'Upload After Post AD', 'feminine-munk' ),
               'section' => 'feminine_munk_ad_settings',
               'width'   => 728,
               'height'  => 90,
           )
       )
    );
    
    /** After Post AD Link */
    $wp_customize->add_setting(
        'feminine_munk_after_post_ad_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'feminine_munk_after_post_ad_link',
        array(
            'label' => __( 'After Post AD Link', 'feminine-munk' ),
            'section' => 'feminine_munk_ad_settings',
            'type' => 'text',
        )
    );

    /** Footer AD */

    $wp_customize->add_setting(
        'feminine_munk_footer_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_munk_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'feminine_munk_footer_ad',
           array(
               'label'   => __( 'Upload Footer AD', 'feminine-munk' ),
               'section' => 'feminine_munk_ad_settings',
               'width'   => 728,
               'height'  => 90,
           )
       )
    );
    
    /** Footer AD Link */
    $wp_customize->add_setting(
        'feminine_munk_footer_ad_link',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'feminine_munk_footer_ad_link',
        array(
            'label' => __( 'Footer AD Link', 'feminine-munk' ),
            'section' => 'feminine_munk_ad_settings',
            'type' => 'text',
        )
    );

    
    }
add_action( 'customize_register', 'feminine_munk_customize_register_ads' );
