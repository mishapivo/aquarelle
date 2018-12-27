<?php
/**
 * medipress Theme Customizer
 *
 * @package medipress
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function medipress_customize_register( $wp_customize ) {
    
    // medipress theme choice options
    if (!function_exists('medipress_section_choice_option')) :
        function medipress_section_choice_option()
        {
            $medipress_section_choice_option = array(
                'show' => esc_html__('Show', 'medipress'),
                'hide' => esc_html__('Hide', 'medipress')
            );
            return apply_filters('medipress_section_choice_option', $medipress_section_choice_option);
        }
    endif;


    if (!function_exists('medipress_column_layout_option')) :
        function medipress_column_layout_option()
        {
            $medipress_column_layout_option = array(
                '6' => esc_html__('2 Column Layout', 'medipress'),
                '4' => esc_html__('3 Column Layout', 'medipress'),
                '3' => esc_html__('4 Column Layout', 'medipress'),
            );
            return apply_filters('medipress_column_layout_option', $medipress_column_layout_option);
        }
    endif;



    /**
     * Sanitizing the select callback example
     *
    */
    if ( !function_exists('medipress_sanitize_select') ) :
        function medipress_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

                // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;


    if ( !function_exists('medipress_column_layout_sanitize_select') ) :
        function medipress_column_layout_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

            // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;
    
    /**
     * Drop-down Pages sanitization callback example.
     *
     * - Sanitization: dropdown-pages
     * - Control: dropdown-pages
     * 
     * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
     * as an absolute integer, and then validates that $input is the ID of a published page.
     * 
     * @see absint() https://developer.wordpress.org/reference/functions/absint/
     * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
     *
     * @param int                  $page    Page ID.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return int|string Page ID if the page is published; otherwise, the setting default.
     */

    function medipress_sanitize_dropdown_pages( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
    
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
    }


    
    /** Front Page Section Settings starts **/  

    $wp_customize->add_panel('frontpage', 
        array(
            'title'       => esc_html__('Front Page Options', 'medipress'),        
            'description' => '',                                        
             'priority'   => 3,
        )
    );
    
    /** Header Section Settings Start **/

    $wp_customize->add_section('header_info', 
        array(
            'title'       => esc_html__('Header Section', 'medipress'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 40
        )
    );
  
    $wp_customize->add_setting(
    'medipress_header_section_hideshow',
    array(
        'default'           => 'show',
        'sanitize_callback' => 'medipress_sanitize_select',
    )
    );

    $medipress_header_section_hide_show_option = medipress_section_choice_option();

    $wp_customize->add_control('medipress_header_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Header Option', 'medipress'),
            'description' => esc_html__('Show/hide option for Header Section.', 'medipress'),
            'section'     => 'header_info',
            'choices'     => $medipress_header_section_hide_show_option,
            'priority'    => 1
        )
    );
  
  
    $wp_customize->add_setting('medipress_header_email_value', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('medipress_header_email_value',
        array(
            'label'    => esc_html__('Email Us', 'medipress'),
            'section'  => 'header_info',
            'priority' => 1
        )
    );
  
  
    $wp_customize->add_setting('medipress_header_phone_value', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('medipress_header_phone_value',
         array(
            'label'     => esc_html__('Contact Us', 'medipress'),
            'section'   => 'header_info',
            'priority'  => 2
        )
     );
  
  
   

    $wp_customize->add_setting('medipress_header_social_link_1', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('medipress_header_social_link_1', 
        array(
            'label'   => esc_html__('Facebook URL', 'medipress'),
            'section' => 'header_info',
            'priority'  => 7
        )
    );

    $wp_customize->add_setting('medipress_header_social_link_2', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('medipress_header_social_link_2', 
        array(
            'label'   => esc_html__('Twitter URL', 'medipress'),
            'section' => 'header_info',
            'priority'  => 7
        )
    );

    $wp_customize->add_setting('medipress_header_social_link_3', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('medipress_header_social_link_3', 
        array(
            'label'   => esc_html__('Google URL', 'medipress'),
            'section' => 'header_info',
            'priority'  => 7
        )
    );

    $wp_customize->add_setting('medipress_header_social_link_4', 
        array(
            'default'   =>  '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control('medipress_header_social_link_4', 
        array(
            'label'   => esc_html__('Instagram URL', 'medipress'),
            'section' => 'header_info',
            'priority'  => 7
        )
    );


   

 /** Header Section Settings end **/



    /** Slider Section Settings Start **/

    // Panel - Slider Section 1
    $wp_customize->add_section('sliderinfo', 
        array(
            'title'       => esc_html__('Slider Section', 'medipress'),
            'description' => '',
            'panel'       => 'frontpage',
             'priority'   => 130
        )
    );

    // hide show
    
    $wp_customize->add_setting('medipress_slider_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'medipress_sanitize_select',
        )
    );

    $medipress_slider_section_hide_show_option = medipress_section_choice_option();

    $wp_customize->add_control('medipress_slider_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Slider Option', 'medipress'),
            'description' => esc_html__('Show/hide option for Slider Section.', 'medipress'),
            'section'     => 'sliderinfo',
            'choices'     => $medipress_slider_section_hide_show_option,
            'priority'    => 1
        )
    );
  
    $slider_no = 3;
        for( $i = 1; $i <= $slider_no; $i++ ) {
            $medipress_slider_page   = 'medipress_slider_page_'  .$i;
            $medipress_slider_btntxt = 'medipress_slider_btntxt_' . $i;
            $medipress_slider_btnurl = 'medipress_slider_btnurl_' .$i;
        

    $wp_customize->add_setting( $medipress_slider_page,
        array(
            'default'           => 1,
            'sanitize_callback' => 'medipress_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( $medipress_slider_page,
        array(
            'label'     => esc_html__( 'Slider Page ', 'medipress' ) .$i,
            'section'   => 'sliderinfo',
            'type'      => 'dropdown-pages',
            'priority'  => 100,
        )
    );


    $wp_customize->add_setting( $medipress_slider_btntxt,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( $medipress_slider_btntxt,
        array(
            'label'        => esc_html__( 'Button Text','medipress' ),
            'section'      => 'sliderinfo',
            'type'         => 'text',
            'priority'     => 100,
        )
    );
        
    $wp_customize->add_setting( $medipress_slider_btnurl,
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control( $medipress_slider_btnurl,
        array(
            'label'       => esc_html__( 'Button URL', 'medipress' ),
            'section'     => 'sliderinfo',
            'type'        => 'text',
            'priority'    => 100,
        )
    );

                
    }   
    /** Slider Section Settings End **/


    /** Service Section Settings Start **/

    $wp_customize->add_section('services',              
        array(
            'title'       => esc_html__('Service Section', 'medipress'),          
            'description' => '',             
            'panel'       => 'frontpage',      
            'priority'    => 140,
        )
    );
    
    $wp_customize->add_setting('medipress_services_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'medipress_sanitize_select',
        )
    );

    $medipress_services_section_hide_show_option = medipress_section_choice_option();

    $wp_customize->add_control(
        'medipress_services_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Services Option', 'medipress'),
            'description' => esc_html__('Show/hide option Section.', 'medipress'),
            'section'     => 'services',
            'choices'     => $medipress_services_section_hide_show_option,
            'priority'    => 1
        )
    );


    // Services title
    $wp_customize->add_setting('medipress_services_title', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control('medipress_services_title',
        array(
           'label'    => esc_html__('service Title', 'medipress'),
           'section'  => 'services',
           'priority' => 1
        )
    );

  
    $wp_customize->add_setting('medipress_services_subtitle',
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control('medipress_services_subtitle', 
        array(
           'label'    => esc_html__('service description', 'medipress'),
           'section'  => 'services', 
           'priority' => 4
        )
    );

    // Services 
   
    $service_no = 3;
        for( $i = 1; $i <= $service_no; $i++ ) {
            $medipress_servicepage = 'medipress_service_page_' . $i;
            $medipress_serviceicon = 'medipress_page_service_icon_' . $i;
        
    
        
    $wp_customize->add_setting( $medipress_servicepage,
        array(
            'default'           => 1,
            'sanitize_callback' => 'medipress_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( $medipress_servicepage,
        array(
            'label'        => esc_html__( 'Service Page ', 'medipress' ) .$i,
            'section'      => 'services',
            'type'         => 'dropdown-pages',
            'priority'     => 100,
        )
    );
    }
    /** Service Section Settings End **/

    

    /** Blog Section Settings Start **/

    $wp_customize->add_section('medipress_blog_info', 
        array(
            'title'       => esc_html__('Blog Section', 'medipress'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 160
        )
     );
    
    $wp_customize->add_setting('medipress_blog_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'medipress_sanitize_select',
        )
    );

    $medipress_blog_section_hide_show_option = medipress_section_choice_option();

    $wp_customize->add_control('medipress_blog_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Blog Option', 'medipress'),
            'description' => esc_html__('Show/hide option for Blog Section.', 'medipress'),
            'section'     => 'medipress_blog_info',
            'choices'     => $medipress_blog_section_hide_show_option,
            'priority'    => 1
        )
    );
    
    $wp_customize->add_setting('medipress_blog_title', 
         array(
            'default'            => '',
            'type'               => 'theme_mod',
            'sanitize_callback'  => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('medipress_blog_title', 
        array(
            'label'    => esc_html__('Blog Title', 'medipress'),
            'section'  => 'medipress_blog_info',
            'priority' => 1
        )
    );
    
    $wp_customize->add_setting('medipress_blog_subtitle', 
        array(
            'default'             => '',
            'type'                => 'theme_mod',
            'sanitize_callback'   => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('medipress_blog_subtitle', 
        array(
            'label'    => esc_html__('Blog Subheading', 'medipress'),
            'section'  => 'medipress_blog_info', 
            'priority' => 4
        )
    );


    
    /** Blog Section Settings End **/


    /** Callout Section Settings Start **/

    $wp_customize->add_section(
        'medipress_footer_contact', 
        array(
            'title'   => esc_html__('Callout Section', 'medipress'),
            'description' => '',
            'panel' => 'frontpage',
            'priority'    => 170
        )
    );
    
    $wp_customize->add_setting(
        'medipress_contact_section_hideshow',
        array(
            'default' => 'hide',
            'sanitize_callback' => 'medipress_sanitize_select',
        )
    );

    $medipress_section_choice_option = medipress_section_choice_option();
    $wp_customize->add_control(
        'medipress_contact_section_hideshow',
        array(
            'type' => 'radio',
            'label' => esc_html__('Footer Callout', 'medipress'),
            'description' => esc_html__('Show/hide option for Footer Callout Section.', 'medipress'),
            'section' => 'medipress_footer_contact',
            'choices' => $medipress_section_choice_option,
            'priority' => 5
        )
    );

    $wp_customize->add_setting(
        'ctah_heading', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'ctah_heading', 
        array(
            'label'   => esc_html__('Callout Text', 'medipress'),
            'section' => 'medipress_footer_contact',
            'priority'  => 8
        )
    );

    $wp_customize->add_setting(
        'ctah_subtitle', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'ctah_subtitle', 
        array(
            'label'   => esc_html__('Callout Subtitle', 'medipress'),
            'section' => 'medipress_footer_contact',
            'priority'  => 9
        )
    );

    $wp_customize->add_setting(
        'ctah_btn_url', 
        array(
            'default'   =>'',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'ctah_btn_url', 
        array(
            'label'   => esc_html__('Button URL', 'medipress'),
            'section' => 'medipress_footer_contact',
            'priority'  => 10
        )
    );

    $wp_customize->add_setting(
        'ctah_btn_text', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'ctah_btn_text', 
        array(
            'label'   => esc_html__('Button Text', 'medipress'),
            'section' => 'medipress_footer_contact',
            'priority'  => 12
        )
    );
    
    /** Callout Section Settings End **/

    /** Footer Section Settings Start **/

    $wp_customize->add_section('medipress_footer_info',
        array(
            'title'       => esc_html__('Footer Section', 'medipress'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 180
        )
    );

    $wp_customize->add_setting('medipress_footer_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'medipress_sanitize_select',
        )
    );

    $medipress_footer_section_hide_show_option = medipress_section_choice_option();

    $wp_customize->add_control('medipress_footer_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Footer Option', 'medipress'),
            'description' => esc_html__('Show/hide option for Footer Section.', 'medipress'),
            'section'     => 'medipress_footer_info',
            'choices'     => $medipress_footer_section_hide_show_option,
            'priority'    => 1
        ) 
    );


    
   

    $wp_customize->add_setting('medipress_footer_text',
         array(
            'default'             => '',
            'type'                => 'theme_mod',
            'sanitize_callback'   => 'wp_kses_post'
        )
    );

    $wp_customize->add_control('medipress_footer_text',
         array(
            'label'    => esc_html__('Copyright', 'medipress'),
            'section'  => 'medipress_footer_info',
            'type'     => 'textarea',
            'priority' => 2
    ));

    /** Footer Section Settings End **/

}
add_action( 'customize_register', 'medipress_customize_register' );