<?php
/**
 * Home Page Options
 *
 * @package my_salon
 */

function my_salon_customize_register_home( $wp_customize ) {
    
    global $my_salon_options_pages;
    global $my_salon_options_posts;
    global $my_salon_option_categories;
    global $my_salon_default_post;
    global $my_salon_default_page;
    
    /** Home Page Settings */
    $wp_customize->add_panel( 
        'my_salon_home_page_settings',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'my-salon' ),
            'description' => __( 'Customize Home Page Settings', 'my-salon' ),
        ) 
    );
    
     /** Slider Settings */
    $wp_customize->add_section(
        'my_salon_slider_section_settings',
        array(
            'title'     => __( 'Slider Settings', 'my-salon' ),
            'priority'  => 10,
            'capability' => 'edit_theme_options',
            'panel' => 'my_salon_home_page_settings'
        )
    );
   
    /** Enable/Disable Slider */
    $wp_customize->add_setting(
        'my_salon_ed_slider',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_ed_slider',
        array(
            'label' => __( 'Enable Home Page Slider', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'my_salon_slider_auto',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_auto',
        array(
            'label' => __( 'Enable Slider Auto Transition', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Loop */
    $wp_customize->add_setting(
        'my_salon_slider_loop',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_loop',
        array(
            'label' => __( 'Enable Slider Loop', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Pager */
    $wp_customize->add_setting(
        'my_salon_slider_pager',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_pager',
        array(
            'label' => __( 'Enable Slider Pager', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'my_salon_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_caption',
        array(
            'label' => __( 'Enable Slider Caption', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'checkbox',
        )
    );
        
    /** Slider Animation */
    $wp_customize->add_setting(
        'my_salon_slider_animation',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'my_salon_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_animation',
        array(
            'label' => __( 'Select Slider Animation', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'select',
            'choices' => array(
                'fade' => __( 'Fade', 'my-salon' ),
                'slide' => __( 'Slide', 'my-salon' ),
            )
        )
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'my_salon_slider_speeds',
        array(
            'default' => 400,
            'sanitize_callback' => 'my_salon_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_speeds',
        array(
            'label' => __( 'Slider Speed', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Pause */
    $wp_customize->add_setting(
        'my_salon_slider_pause',
        array(
            'default' => 6000,
            'sanitize_callback' => 'my_salon_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_pause',
        array(
            'label' => __( 'Slider Pause', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'text',
        )
    );
    
    for( $i=1; $i<=3; $i++){  
        /** Select Slider Post */
        $wp_customize->add_setting(
            'my_salon_slider_post_'.$i,
            array(
                'default' => $my_salon_default_post,
                'sanitize_callback' => 'my_salon_sanitize_select',
            )
        );
        
        $wp_customize->add_control(
            'my_salon_slider_post_'.$i,
            array(
                'label' => __( 'Select Post ', 'my-salon' ).$i,
                'section' => 'my_salon_slider_section_settings',
                'type' => 'select',
                'choices' => $my_salon_options_posts,
            )
        );
    }

     /** Slider Readmore */
    $wp_customize->add_setting(
        'my_salon_slider_readmore',
        array(
            'default' => __( 'Learn More', 'my-salon' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_slider_readmore',
        array(
            'label' => __( 'Readmore Text', 'my-salon' ),
            'section' => 'my_salon_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Settings Ends */
    
    /** Featured Section */
    $wp_customize->add_section(
        'my_salon_feature_section_settings',
        array(
            'title' => __( 'Featured Section', 'my-salon' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'panel' => 'my_salon_home_page_settings'
        )
    );
    
    /** Enable/Disable Featured Section */
    $wp_customize->add_setting(
        'my_salon_ed_featured_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_ed_featured_section',
        array(
            'label' => __( 'Enable Featured Post Section', 'my-salon' ),
            'section' => 'my_salon_feature_section_settings',
            'type' => 'checkbox',
        )
    );

    /** Section Title */
    $wp_customize->add_setting(
        'my_salon_featured_section_title',
        array(
            'default'=> $my_salon_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    $wp_customize-> add_control(
        'my_salon_featured_section_title',
        array(
              'label' => __('Select Page','my-salon'),
              'type' => 'select',
              'choices' => $my_salon_options_pages,
              'section' => 'my_salon_feature_section_settings', 
         
            )
    );

       
    /** Enable/Disable Featured Section Icon*/
    $wp_customize->add_setting(
        'my_salon_ed_featured_icon',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_ed_featured_icon',
        array(
            'label' => __( 'Enable Featured Post Icon', 'my-salon' ),
            'section' => 'my_salon_feature_section_settings',
            'type' => 'checkbox',
        )
    );

    for( $i=1; $i<=3; $i++){  
    
        /** featured Post */
        $wp_customize->add_setting(
            'my_salon_feature_post_'.$i,
            array(
                'default' => $my_salon_default_post,
                'sanitize_callback' => 'my_salon_sanitize_select',
            ));
        
        $wp_customize->add_control(
            'my_salon_feature_post_'.$i,
            array(
                'label' => __( 'Select Featured Post ', 'my-salon' ) .$i ,
                'section' => 'my_salon_feature_section_settings',
                'type' => 'select',
                'choices' => $my_salon_options_posts
            ));

         $wp_customize->add_setting(
            'my_salon_feature_icon_'.$i,
            array(
                'default'           => 'fa-bell',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'my_salon_feature_icon_'.$i,
                array(
                    'settings'      => 'my_salon_feature_icon_'.$i,
                    'section'       => 'my_salon_feature_section_settings',
                    'type'          => 'text',
                    'label'         => __( 'FontAwesome Icon ', 'my-salon' ) .$i,
                )
        );
        
    }

    /** About Section Settings */
    $wp_customize->add_section(
        'my_salon_about_section_settings',
        array(
            'title' => __( 'About Section', 'my-salon' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'panel' => 'my_salon_home_page_settings'
        )
    );
    
    /** Enable about Section */   
    $wp_customize->add_setting(
        'my_salon_ed_about_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_ed_about_section',
        array(
            'label' => __( 'Enable Welcome Section', 'my-salon' ),
            'section' => 'my_salon_about_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Portfolio Section Settings */
    $wp_customize->add_section(
        'my_salon_portfolio_section_settings',
        array(
            'title' => __( 'Portfolio Section', 'my-salon' ),
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'panel' => 'my_salon_home_page_settings'
        )
    );
    
    /** Enable Portfolio Section */
    $wp_customize->add_setting(
        'my_salon_ed_portfolio_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_ed_portfolio_section',
        array(
            'label' => __( 'Enable Portfolio Section', 'my-salon' ),
            'section' => 'my_salon_portfolio_section_settings',
            'type' => 'checkbox',
        )
    );

    /** Section Title */
    $wp_customize->add_setting(
        'my_salon_portfolio_section_page',
        array(
            'default'=> $my_salon_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'my_salon_portfolio_section_page',
        array(
              'label' => __('Select Page','my-salon'),
              'type' => 'select',
              'choices' => $my_salon_options_pages,
              'section' => 'my_salon_portfolio_section_settings', 
              
        ));


    for( $i=1; $i<=6; $i++){  
        /** Portfolio Post */
        $wp_customize->add_setting(
            'my_salon_portfolio_post_'.$i,
            array(
                'default' => $my_salon_default_post,
                'sanitize_callback' => 'my_salon_sanitize_select',
            ));
        
        $wp_customize->add_control(
            'my_salon_portfolio_post_'.$i,
            array(
                'label' => __( 'Select Post ', 'my-salon' ). $i,
                'section' => 'my_salon_portfolio_section_settings',
                'type' => 'select',
                'choices' => $my_salon_options_posts
            ));
    }
    
    /** Portfolio Section Read More Text */
    $wp_customize->add_setting(
        'my_salon_portfolio_section_readmore',
        array(
            'default' => __( 'Read More', 'my-salon' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_portfolio_section_readmore',
        array(
            'label' => __( 'Portfolio Section Read More Text', 'my-salon' ),
            'section' => 'my_salon_portfolio_section_settings',
            'type' => 'text',
        )
    );

    /** Portfolio Section Read More Url */
    $wp_customize->add_setting(
        'my_salon_portfolio_section_url',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_portfolio_section_url',
        array(
            'label' => __( 'Portfolio Page url', 'my-salon' ),
            'section' => 'my_salon_portfolio_section_settings',
            'type' => 'text',
        )
    );
    
    /** Testimonials Section Settings */
    $wp_customize->add_section(
        'my_salon_testimonials_section_settings',
        array(
            'title' => __( 'Testimonials Section', 'my-salon' ),
            'priority' => 80,
            'capability' => 'edit_theme_options',
            'panel' => 'my_salon_home_page_settings'
        )
    );

    /** Enable Testimonials Section */   
    $wp_customize->add_setting(
        'my_salon_ed_testimonials_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'my_salon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'my_salon_ed_testimonials_section',
        array(
            'label' => __( 'Enable Testimonials Section', 'my-salon' ),
            'section' => 'my_salon_testimonials_section_settings',
            'type' => 'checkbox',
        ));
    
    /** Section Title */
    $wp_customize->add_setting(
        'my_salon_testimonials_section_title',
        array(
            'default'=> $my_salon_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    $wp_customize-> add_control(
        'my_salon_testimonials_section_title',
        array(
              'label' => __('Select Page','my-salon'),
              'type' => 'select',
              'choices' => $my_salon_options_pages,
              'section' => 'my_salon_testimonials_section_settings', 
         
            ));

    /** Select Testimonials Category */
    $wp_customize->add_setting(
        'my_salon_testimonial_category',
        array(
            'default' => '',
            'sanitize_callback' => 'my_salon_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'my_salon_testimonial_category',
        array(
            'label' => __( 'Select Testimonial Category', 'my-salon' ),
            'section' => 'my_salon_testimonials_section_settings',
            'type' => 'select',
            'choices' => $my_salon_option_categories
        ));


}
add_action( 'customize_register', 'my_salon_customize_register_home' );
