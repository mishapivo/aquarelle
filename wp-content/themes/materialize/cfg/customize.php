<?php
/**
 *
 *  This file contain the theme options settings
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    function mythemes_customize_register( $wp_customize )
	{

        {   // site identity options

            $wp_customize -> add_section( 'title_tagline', array(
                'title'             => __( 'Site Identity', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 0
            ));

            if ( !function_exists( 'the_custom_logo' ) ){
                $wp_customize -> add_setting( 'mythemes-blog-logo', array(
                    'default'           => get_template_directory_uri() . '/media/_frontend/img/logo.png',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Upload_Control(
                    $wp_customize,
                    'mythemes-blog-logo',
                    array(
                        'label'         => __( 'Preview Logo', 'materialize' ),
                        'section'       => 'title_tagline',
                        'settings'      => 'mythemes-blog-logo',
                    )
                ));
            }

            // margin top
            $wp_customize -> add_setting( 'mythemes-blog-logo-m-top', array(
                'default'           => 0,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'mythemes_validate_number',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-blog-logo-m-top', array(
                'label'             => __( 'Logo Margin Top', 'materialize' ),
                'section'           => 'title_tagline',
                'settings'          => 'mythemes-blog-logo-m-top',
                'type'              => 'range',
                'input_attrs'       => array(
                    'min'       => 0,
                    'max'       => 100,
                    'step'      => 1
                )
            ));


            // margin bottom
            $wp_customize -> add_setting( 'mythemes-blog-logo-m-bottom', array(
                'default'           => 0,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'mythemes_validate_number',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-blog-logo-m-bottom', array(
                'label'             => __( 'Logo Marign Bottom', 'materialize' ),
                'section'           => 'title_tagline',
                'settings'          => 'mythemes-blog-logo-m-bottom',
                'type'              => 'range',
                'input_attrs'       => array(
                    'min'       => 0,
                    'max'       => 100,
                    'step'      => 1
                )
            ));

            $wp_customize -> add_setting( 'display_header_text' );
            $wp_customize -> add_control( 'display_header_text', array( 'theme_supports' => false ) );
        }


        {   // colors options

            $wp_customize -> add_section( 'colors', array(
                'title'             => __( 'Colors', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 1
            ));

            // disabled colors unsupported options
            $wp_customize -> add_setting( 'header_textcolor' );
            $wp_customize -> add_control( 'header_textcolor', array( 'theme_supports' => false ) );
        }


        {   // background image options

            $wp_customize -> add_section( 'background_image', array(
                'title'             => __( 'Background Image', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 2
            ));
        }


        {   // header image options

            $wp_customize -> add_section( 'header_image', array(
                'title'             => __( 'Header Image', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 3
            ));
        }


    	{   // header elements options

            $header_panel_args = array(
                'title'         => __( 'Header Elements', 'materialize' ),
                'priority'      => 4,
                'capability'    => 'edit_theme_options'
            );

            $wp_customize -> add_panel( 'mythemes-header-panel', $header_panel_args );


            {   // general options

            	$wp_customize -> add_section( 'mythemes-header', array(
                    'title'             => __( 'General' , 'materialize' ),
                    'priority'          => 30,
                    'panel'             => 'mythemes-header-panel',
                    'capability'        => 'edit_theme_options'
            	));

                // front page
                $wp_customize -> add_setting( 'mythemes-header-front-page', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-front-page', array(
                    'label'             => __( 'Display Header on Front Page', 'materialize' ),
                    'section'           => 'mythemes-header',
                    'settings'          => 'mythemes-header-front-page',
                    'type'              => 'checkbox',
                ));

                // blog page
                $wp_customize -> add_setting( 'mythemes-header-blog-page', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-blog-page', array(
                    'label'             => __( 'Display Header on Blog Page', 'materialize' ),
                    'section'           => 'mythemes-header',
                    'settings'          => 'mythemes-header-blog-page',
                    'type'              => 'checkbox',
                ));

                // templates
                $wp_customize -> add_setting( 'mythemes-header-templates', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-templates', array(
                    'label'             => __( 'Display Header on Templates', 'materialize' ),
                    'description'       => __( 'enabale / disable header on: Archives, Categories, Tags, Author, 404 and Search Results.' , 'materialize' ),
                    'section'           => 'mythemes-header',
                    'settings'          => 'mythemes-header-templates',
                    'type'              => 'checkbox',
                ));

                // single post
                $wp_customize -> add_setting( 'mythemes-header-single-post', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-single-post', array(
                    'label'             => __( 'Display Header on Single Post', 'materialize' ),
                    'section'           => 'mythemes-header',
                    'settings'          => 'mythemes-header-single-post',
                    'type'              => 'checkbox',
                ));

                // single page
                $wp_customize -> add_setting( 'mythemes-header-single-page', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-single-page', array(
                    'label'             => __( 'Display Header on Single Page', 'materialize' ),
                    'section'           => 'mythemes-header',
                    'settings'          => 'mythemes-header-single-page',
                    'type'              => 'checkbox'
                ));

                // header height
                $wp_customize -> add_setting( 'mythemes-header-height', array(
                    'default'           => 450,
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'mythemes_validate_number',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-height', array(
                    'label'             => __( 'Header height', 'materialize' ),
                    'section'           => 'mythemes-header',
                    'settings'          => 'mythemes-header-height',
                    'type'              => 'number',
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 500,
                        'step'  => 1
                    )
                ));

                // header background color
                $wp_customize -> add_setting( 'mythemes-header-background-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-background-color',
                    array(
                        'label'         => __( 'Background Color', 'materialize' ),
                        'section'       => 'mythemes-header',
                        'settings'      => 'mythemes-header-background-color',
                    )
                ));

                // mask color
                $wp_customize -> add_setting( 'mythemes-header-mask-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-mask-color',
                    array(
                        'label'     => __( 'Mask Color', 'materialize' ),
                        'section'   => 'mythemes-header',
                        'settings'  => 'mythemes-header-mask-color',
                    )
                ));

                // mask transparency
                $wp_customize -> add_setting( 'mythemes-header-mask-transp', array(
                    'default'           => 75,
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'mythemes_validate_number',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-mask-transp', array(
                    'label'             => __( 'Mask Transparency', 'materialize' ),
                    'description'       => __( 'by default the mask is a dark transparent foil over the header background image.' , 'materialize' ),
                    'section'           => 'mythemes-header',
                    'settings'          => 'mythemes-header-mask-transp',
                    'type'              => 'range',
                    'input_attrs' => array(
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1
                    ),
                ));
            }


            {   // content options

                $wp_customize -> add_section( 'mythemes-header-content', array(
                    'title'             => __( 'Content' , 'materialize' ),
                    'panel'             => 'mythemes-header-panel',
                    'priority'          => 30,
                    'capability'        => 'edit_theme_options'
                ));

                // show headline
                $wp_customize -> add_setting( 'mythemes-header-show-headline', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-show-headline', array(
                    'label'             => __( 'Show Headline', 'materialize' ),
                    'section'           => 'mythemes-header-content',
                    'settings'          => 'mythemes-header-show-headline',
                    'type'              => 'checkbox',
                ));

                // headline text
                $wp_customize -> add_setting( 'mythemes-header-headline', array(
                    'default'           => __( 'The best WordPress Theme based on Material Design' , 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-headline', array(
                    'label'             => __( 'Headline Text', 'materialize' ),
                    'section'           => 'mythemes-header-content',
                    'settings'          => 'mythemes-header-headline',
                    'type'              => 'text'
                ));

                // headline color
                $wp_customize -> add_setting( 'mythemes-header-headline-color', array(
                    'default'           => '#e53932',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-headline-color',
                    array(
                        'label'         => __( 'Headline Color', 'materialize' ),
                        'section'       => 'mythemes-header-content',
                        'settings'      => 'mythemes-header-headline-color',
                    )
                ));

                // show description
                $wp_customize -> add_setting( 'mythemes-header-show-description', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-show-description', array(
                    'label'             => __( 'Show Description', 'materialize' ),
                    'section'           => 'mythemes-header-content',
                    'settings'          => 'mythemes-header-show-description',
                    'type'              => 'checkbox',
                ));

                // description text
                $wp_customize -> add_setting( 'mythemes-header-description', array(
                    'default'           => __( 'free WordPress theme developed by myThem.es' , 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-description', array(
                    'label'             => __( 'Header Description', 'materialize' ),
                    'section'           => 'mythemes-header-content',
                    'settings'          => 'mythemes-header-description',
                    'type'              => 'text',
                ));

                // description color
                $wp_customize -> add_setting( 'mythemes-header-description-color', array(
                    'default'           => '#000000',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-description-color',
                    array(
                        'label'         => __( 'Description Color', 'materialize' ),
                        'section'       => 'mythemes-header-content',
                        'settings'      => 'mythemes-header-description-color',
                    )
                ));
            }


            {   // first button options

                $wp_customize -> add_section( 'mythemes-header-btn-1', array(
                    'title'             => __( 'First Button' , 'materialize' ),
                    'panel'             => 'mythemes-header-panel',
                    'priority'          => 30,
                    'capability'        => 'edit_theme_options'
                ));

                // show first button
                $wp_customize -> add_setting( 'mythemes-header-show-btn-1', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-show-btn-1', array(
                    'label'             => __( 'Show Button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-1',
                    'settings'          => 'mythemes-header-show-btn-1',
                    'type'              => 'checkbox'
                ));

                // text color
                $wp_customize -> add_setting( 'mythemes-header-btn-1-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-btn-1-color',
                    array(
                        'label'         => __( 'Text Color', 'materialize' ),
                        'section'       => 'mythemes-header-btn-1',
                        'settings'      => 'mythemes-header-btn-1-color',
                    )
                ));

                // background color
                $wp_customize -> add_setting( 'mythemes-header-btn-1-bkg-color', array(
                    'default'           => '#4caf50',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-btn-1-bkg-color',
                    array(
                        'label'         => __( 'Background Color', 'materialize' ),
                        'section'       => 'mythemes-header-btn-1',
                        'settings'      => 'mythemes-header-btn-1-bkg-color',
                    )
                ));

                // hover background color
                $wp_customize -> add_setting( 'mythemes-header-btn-1-bkg-h-color', array(
                    'default'           => '#43a047',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-btn-1-bkg-h-color',
                    array(
                        'label'         => __( 'Background Color ( over )', 'materialize' ),
                        'description'   => __( 'When the mouse is over the button.' , 'materialize' ),
                        'section'       => 'mythemes-header-btn-1',
                        'settings'      => 'mythemes-header-btn-1-bkg-h-color'
                    )
                ));

                // url
                $wp_customize -> add_setting( 'mythemes-header-btn-1-url', array(
                    'default'           => esc_url( home_url( '#' ) ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-btn-1-url', array(
                    'label'             => __( 'URL', 'materialize' ),
                    'description'       => __( 'Link for first button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-1',
                    'settings'          => 'mythemes-header-btn-1-url',
                    'type'              => 'url',
                ));

                // text
                $wp_customize -> add_setting( 'mythemes-header-btn-1-text', array(
                    'default'           => __( 'First Button', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-btn-1-text', array(
                    'label'             => __( 'Text', 'materialize' ),
                    'description'       => __( 'Text for first button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-1',
                    'settings'          => 'mythemes-header-btn-1-text',
                    'type'              => 'text',
                ));

                // description
                $wp_customize -> add_setting( 'mythemes-header-btn-1-description', array(
                    'default'           => __( 'first button link description...', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_textarea',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-btn-1-description', array(
                    'label'             => __( 'Description', 'materialize' ),
                    'description'       => __( 'link description for first button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-1',
                    'settings'          => 'mythemes-header-btn-1-description',
                    'type'              => 'textarea',
                ));
            }


            {   // second button options

                $wp_customize -> add_section( 'mythemes-header-btn-2', array(
                    'title'             => __( 'Second Button' , 'materialize' ),
                    'panel'             => 'mythemes-header-panel',
                    'priority'          => 30,
                    'capability'        => 'edit_theme_options'
                ));

                // show second button
                $wp_customize -> add_setting( 'mythemes-header-show-btn-2', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-show-btn-2', array(
                    'label'             => __( 'Display second button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-2',
                    'settings'          => 'mythemes-header-show-btn-2',
                    'type'              => 'checkbox'
                ));

                // text color
                $wp_customize -> add_setting( 'mythemes-header-btn-2-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-btn-2-color',
                    array(
                        'label'         => __( 'Text Color', 'materialize' ),
                        'section'       => 'mythemes-header-btn-2',
                        'settings'      => 'mythemes-header-btn-2-color',
                    )
                ));

                // background color
                $wp_customize -> add_setting( 'mythemes-header-btn-2-bkg-color', array(
                    'default'           => '#e53935',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-btn-2-bkg-color',
                    array(
                        'label'         => __( 'Background Color', 'materialize' ),
                        'section'       => 'mythemes-header-btn-2',
                        'settings'      => 'mythemes-header-btn-2-bkg-color',
                    )
                ));

                // hover background color
                $wp_customize -> add_setting( 'mythemes-header-btn-2-bkg-h-color', array(
                    'default'           => '#d32f2f',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'mythemes-header-btn-2-bkg-h-color',
                    array(
                        'label'         => __( 'Background Color ( over )', 'materialize' ),
                        'description'   => __( 'When the mouse is over the button.' , 'materialize' ),
                        'section'       => 'mythemes-header-btn-2',
                        'settings'      => 'mythemes-header-btn-2-bkg-h-color'
                    )
                ));

                // url
                $wp_customize -> add_setting( 'mythemes-header-btn-2-url', array(
                    'default'           => esc_url( home_url( '#' ) ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-btn-2-url', array(
                    'label'             => __( 'URL', 'materialize' ),
                    'description'       => __( 'Link for second button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-2',
                    'settings'          => 'mythemes-header-btn-2-url',
                    'type'              => 'url'
                ));

                // text
                $wp_customize -> add_setting( 'mythemes-header-btn-2-text', array(
                    'default'           => __( 'Second Button', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-btn-2-text', array(
                    'label'             => __( 'Text', 'materialize' ),
                    'description'       => __( 'Text for second button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-2',
                    'settings'          => 'mythemes-header-btn-2-text',
                    'type'              => 'text',
                ));

                // description
                $wp_customize -> add_setting( 'mythemes-header-btn-2-description', array(
                    'default'           => __( 'second button link description...', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_textarea',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-header-btn-2-description', array(
                    'label'             => __( 'Description', 'materialize' ),
                    'description'       => __( 'link description for second button', 'materialize' ),
                    'section'           => 'mythemes-header-btn-2',
                    'settings'          => 'mythemes-header-btn-2-description',
                    'type'              => 'textarea'
                ));
            }
        }


        {   // breadcrumbs options

            $wp_customize -> add_section( 'mythemes-breadcrumbs', array(
                'title'             => __( 'Breadcrumbs' , 'materialize' ),
                'priority'          => 5,
                'capability'        => 'edit_theme_options'
            ));

            // show breadcrumbs
            $wp_customize -> add_setting( 'mythemes-show-breadcrumbs', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'mythemes_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-show-breadcrumbs', array(
                'label'             => __( 'Show Breadcrumbs', 'materialize' ),
                'section'           => 'mythemes-breadcrumbs',
                'settings'          => 'mythemes-show-breadcrumbs',
                'type'              => 'checkbox',
            ));

            // breadcrumbs "Home" link text
            $wp_customize -> add_setting( 'mythemes-breadcrumbs-blog-title', array(
                'default'           => __( 'Blog', 'materialize' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control(  'mythemes-breadcrumbs-blog-title', array(
                'label'             => __( 'Blog Title', 'materialize' ),
                'section'           => 'mythemes-breadcrumbs',
                'settings'          =>  'mythemes-breadcrumbs-blog-title',
                'type'              => 'text',
            ));

            // breadcrumbs "Home" link text
            $wp_customize -> add_setting( 'mythemes-breadcrumbs-home-link-text', array(
                'default'           => __( 'Home', 'materialize' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-breadcrumbs-home-link-text', array(
                'label'             => __( '"Home" link text', 'materialize' ),
                'description'       => __( 'breadcrumbs "Home" link text.', 'materialize' ),
                'section'           => 'mythemes-breadcrumbs',
                'settings'          => 'mythemes-breadcrumbs-home-link-text',
                'type'              => 'text',
            ));

            // breadcrumbs "Home" link description
            $wp_customize -> add_setting( 'mythemes-breadcrumbs-home-link-description', array(
                'default'           => __( 'go to home', 'materialize' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'esc_textarea',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-breadcrumbs-home-link-description', array(
                'label'             => __( '"Home" link description', 'materialize' ),
                'description'       => __( 'breadcrumbs "Home" link description.', 'materialize' ),
                'section'           => 'mythemes-breadcrumbs',
                'settings'          => 'mythemes-breadcrumbs-home-link-description',
                'type'              => 'textarea',
            ));

            // breadcrumbs space ( inner above and below )
            $wp_customize -> add_setting( 'mythemes-breadcrumbs-space', array(
                'default'           => 60,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'mythemes_validate_number',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-breadcrumbs-space', array(
                'label'             => __( 'Space', 'materialize' ),
                'description'       => __( 'inner above and below space allow you to change breadcrumbs height.', 'materialize' ),
                'section'           => 'mythemes-breadcrumbs',
                'settings'          => 'mythemes-breadcrumbs-space',
                'type'              => 'number',
                'input_attrs'       => array(
                    'min'   => 0,
                    'max'   => 100,
                )
            ));
        }


        {   // additional option

            $wp_customize -> add_section( 'mythemes-additional', array(
                'title'             => __( 'Additional' , 'materialize' ),
                'priority'          => 6,
                'capability'        => 'edit_theme_options'
            ));

            // show top meta
            $wp_customize -> add_setting( 'mythemes-top-meta', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'mythemes_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-top-meta', array(
                'label'             => __( 'Display top meta', 'materialize' ),
                'description'       => __( 'enable / disable top meta from single posts ( all posts ).', 'materialize' ),
                'section'           => 'mythemes-additional',
                'settings'          => 'mythemes-top-meta',
                'type'              => 'checkbox'
            ));

            // show bottom meta
            $wp_customize -> add_setting( 'mythemes-bottom-meta', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'mythemes_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-bottom-meta', array(
                'label'             => __( 'Display bottom meta', 'materialize' ),
                'description'       => __( 'enable / disable bottom meta from single posts ( all posts ).', 'materialize' ),
                'section'           => 'mythemes-additional',
                'settings'          => 'mythemes-bottom-meta',
                'type'              => 'checkbox'
            ));

            // show html suggestions
            $wp_customize -> add_setting( 'mythemes-html-suggestions', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'mythemes_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'mythemes-html-suggestions', array(
                'label'             => __( 'HTML Suggestions', 'materialize' ),
                'description'       => __( 'enable / disable HTML Suggestions after comments form ( all posts ).', 'materialize' ),
                'section'           => 'mythemes-additional',
                'settings'          => 'mythemes-html-suggestions',
                'type'              => 'checkbox'
            ));
        }


        {   // layout options

            $layout_panel = array(
                'title'             => __( 'Layout' , 'materialize' ),
                'priority'          => 7,
                'capability'        => 'edit_theme_options'
            );

            $wp_customize -> add_panel( 'mythemes-layout-panel', $layout_panel );

            $sidebars   = array(
                'main'              => __( 'Main Sidebar' , 'materialize' ),
                'front-page'        => __( 'Front Page Sidebar' , 'materialize' ),
                'page'              => __( 'Page Sidebar' , 'materialize' ),
                'post'              => __( 'Post Sidebar' , 'materialize' ),
                'special-page'      => __( 'Special Page Sidebar' , 'materialize' )
            );


            {   // default layout options

                $wp_customize -> add_section( 'mythemes-layout', array(
                    'title'             => __( 'Default' , 'materialize' ),
                    'description'       => __( 'Default Layout is used for the next templates: Blog, Archives, Categories, Tags, Author and Search Results.' , 'materialize' ),
                    'panel'             => 'mythemes-layout-panel',
                    'capability'        => 'edit_theme_options'
                ));

                // layout
                $wp_customize -> add_setting( 'mythemes-layout', array(
                    'default'           => 'right',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'mythemes-layout',
                    'settings'          => 'mythemes-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'mythemes-sidebar', array(
                    'default'           => 'main',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'mythemes-layout',
                    'settings'          => 'mythemes-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'mythemes-sidebar', $sidebar_args );
            }


            {   // front page layout options

                $wp_customize -> add_section( 'mythemes-front-page-layout', array(
                    'title'             => __( 'Front Page' , 'materialize' ),
                    'description'       => __( 'In order to use this option set you need to activate a staic page on Front Page from - "Static Front Page" tab' , 'materialize' ),
                    'panel'             => 'mythemes-layout-panel',
                    'capability'        => 'edit_theme_options'
                ));

                // layout
                $wp_customize -> add_setting( 'mythemes-front-page-layout', array(
                    'default'           => 'full',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-front-page-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'mythemes-front-page-layout',
                    'settings'          => 'mythemes-front-page-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'mythemes-front-page-sidebar', array(
                    'default'           => 'front-page',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $front_page_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'mythemes-front-page-layout',
                    'settings'          => 'mythemes-front-page-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'mythemes-front-page-sidebar', $front_page_sidebar_args);
            }


            {   // single page layout options

                $page_layout_args = array(
                    'title'             => __( 'Single Page' , 'materialize' ),
                    'panel'             => 'mythemes-layout-panel',
                    'capability'        => 'edit_theme_options'
                );

                $wp_customize -> add_section( 'mythemes-page-layout', $page_layout_args );

                // layout
                $wp_customize -> add_setting( 'mythemes-page-layout', array(
                    'default'           => 'full',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-page-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'mythemes-page-layout',
                    'settings'          => 'mythemes-page-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'mythemes-page-sidebar', array(
                    'default'           => 'page',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $page_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'mythemes-page-layout',
                    'settings'          => 'mythemes-page-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'mythemes-page-sidebar', $page_sidebar_args );
            }


            {   // single post layout

                $post_layout_args = array(
                    'title'             => __( 'Single Post' , 'materialize' ),
                    'panel'             => 'mythemes-layout-panel',
                    'capability'        => 'edit_theme_options'
                );

                $wp_customize -> add_section( 'mythemes-post-layout', $post_layout_args );

                // layout
                $wp_customize -> add_setting( 'mythemes-post-layout', array(
                    'default'           => 'right',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-post-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'mythemes-post-layout',
                    'settings'          => 'mythemes-post-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'mythemes-post-sidebar', array(
                    'default'           => 'post',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $post_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'mythemes-post-layout',
                    'settings'          => 'mythemes-post-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'mythemes-post-sidebar', $post_sidebar_args );
            }


            {   // special page layout options

                $special_page_layout_args = array(
                    'title'             => __( 'Special Page' , 'materialize' ),
                    'panel'             => 'mythemes-layout-panel',
                    'capability'        => 'edit_theme_options'
                );

                $wp_customize -> add_section( 'mythemes-special-page-layout', $special_page_layout_args );

                // special page
                $wp_customize -> add_setting( 'mythemes-special-page', array(
                    'default'           => 2,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_number',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-special-page', array(
                    'label'             => __( 'Special page' , 'materialize' ),
                    'description'       => __( 'for selected page you can overwrite default page layout settings with special layout settings', 'materialize' ),
                    'section'           => 'mythemes-special-page-layout',
                    'settings'          => 'mythemes-special-page',
                    'type'              => 'dropdown-pages'
                ));

                // layout
                $wp_customize -> add_setting( 'mythemes-special-page-layout', array(
                    'default'           => 'right',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-special-page-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'mythemes-special-page-layout',
                    'settings'          => 'mythemes-special-page-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'mythemes-special-page-sidebar', array(
                    'default'           => 'special-page',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'mythemes_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $special_page_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'mythemes-special-page-layout',
                    'settings'          => 'mythemes-special-page-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'mythemes-special-page-sidebar', $special_page_sidebar_args );
            }
        }


        {   // social options

            $wp_customize -> add_section( 'mythemes-social', array(
                'title'             => __( 'Social' , 'materialize' ),
                'priority'          => 35,
                'capability'        => 'edit_theme_options'
            ));

            $social_items = array(
                'github'            => __( 'GitHub', 'materialize'),
                'gitlab'            => __( 'GitLab', 'materialize'),
                'instagram'         => __( 'Instagram', 'materialize'),
                'evernote'          => __( 'Evernote', 'materialize'),
                'vimeo'             => __( 'Vimeo', 'materialize'),
                'vimeo-circled'     => __( 'Vimeo Circled', 'materialize'),
                'twitter'           => __( 'Twitter', 'materialize'),
                'skype'             => __( 'Skype', 'materialize'),
                'renren'            => __( 'Renren', 'materialize'),
                'rdio'              => __( 'Rdio', 'materialize'),
                'linkedin'          => __( 'Linkedin', 'materialize'),
                'behance'           => __( 'Behance', 'materialize'),
                'dropbox'           => __( 'Dropbox', 'materialize'),
                'flickr'            => __( 'Flickr', 'materialize'),
                'vkontakte'         => __( 'Vkontakte', 'materialize'),
                'facebook'          => __( 'Facebook', 'materialize'),
                'tumblr'            => __( 'Tumblr', 'materialize'),
                'picasa'            => __( 'Picasa', 'materialize'),
                'dribbble'          => __( 'Dribbble', 'materialize'),
                'stumbleupon'       => __( 'Stumbleupon', 'materialize'),
                'lastfm'            => __( 'Lastfm', 'materialize'),
                'gplus'             => __( 'Google Plus', 'materialize'),
                'google-circles'    => __( 'Google Circle', 'materialize'),
                'youtube-play'      => __( 'YouTube Play', 'materialize'),
                'youtube'           => __( 'YouTube', 'materialize'),
                'pinterest'         => __( 'Pinterest', 'materialize'),
                'smashing'          => __( 'Smashing', 'materialize'),
                'soundcloud'        => __( 'SoundCloud', 'materialize'),
                'flattr'            => __( 'Flattr', 'materialize'),
                'odnoklassniki'     => __( 'Odnoklassniki', 'materialize'),
                'mixi'              => __( 'Mixi', 'materialize'),
                'reddit'            => __( 'Reddit', 'materialize')
            );

            foreach( $social_items as $item => $label ){
                $wp_customize -> add_setting( "mythemes-{$item}", array(
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( "mythemes-{$item}", array(
                    'label'             => $label,
                    'section'           => 'mythemes-social',
                    'settings'          => "mythemes-{$item}",
                    'type'              => 'url',
                ));
            }

            $wp_customize -> add_setting( "mythemes-display-rss", array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'mythemes_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( "mythemes-display-rss", array(
                'label'             => __( 'Display RSS Feed', 'materialize' ),
                'section'           => 'mythemes-social',
                'settings'          => "mythemes-display-rss",
                'type'              => 'checkbox',
            ));

            $wp_customize -> add_setting( "mythemes-rss", array(
                'default'           => esc_url( get_bloginfo('rss2_url') ),
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( "mythemes-rss", array(
                'label'             => __( 'RSS Feed', 'materialize' ),
                'section'           => 'mythemes-social',
                'settings'          => "mythemes-rss",
                'type'              => 'url',
            ));
        }

        {   // others options

            $others_panel = array(
                'title'             => __( 'Others' , 'materialize' ),
                'priority'          => 36,
                'capability'        => 'edit_theme_options'
            );

            $wp_customize -> add_panel( 'mythemes-others-panel', $others_panel );

            {
                $wp_customize -> add_section( 'mythemes-custom-css', array(
                    'title'             => __( 'Custom CSS' , 'materialize' ),
                    'panel'             => 'mythemes-others-panel',
                    'capability'        => 'edit_theme_options'
                ));

                // custom css ie
                $wp_customize -> add_setting( 'mythemes-custom-css-ie', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-custom-css-ie', array(
                    'label'                 => __( 'Custom CSS IE', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer', 'materialize' ),
                    'section'               => 'mythemes-custom-css',
                    'settings'              => 'mythemes-custom-css-ie',
                    'type'                  => 'textarea',
                ));

                // custom css ie 11
                $wp_customize -> add_setting( 'mythemes-custom-css-ie-11', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-custom-css-ie-11', array(
                    'label'                 => __( 'Custom CSS IE 11', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 11', 'materialize' ),
                    'section'               => 'mythemes-custom-css',
                    'settings'              => 'mythemes-custom-css-ie-11',
                    'type'                  => 'textarea',
                ));

                // custom css ie 10
                $wp_customize -> add_setting( 'mythemes-custom-css-ie-10', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-custom-css-ie-10', array(
                    'label'                 => __( 'Custom CSS IE 10', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 10', 'materialize' ),
                    'section'               => 'mythemes-custom-css',
                    'settings'              => 'mythemes-custom-css-ie-10',
                    'type'                  => 'textarea',
                ));

                // custom css ie 9
                $wp_customize -> add_setting( 'mythemes-custom-css-ie-9', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-custom-css-ie-9', array(
                    'label'                 => __( 'Custom CSS IE 9', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 9', 'materialize' ),
                    'section'               => 'mythemes-custom-css',
                    'settings'              => 'mythemes-custom-css-ie-9',
                    'type'                  => 'textarea',
                ));

                // custom css ie 8
                $wp_customize -> add_setting( 'mythemes-custom-css-ie-8', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-custom-css-ie-8', array(
                    'label'                 => __( 'Custom CSS IE 8', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 8', 'materialize' ),
                    'section'               => 'mythemes-custom-css',
                    'settings'              => 'mythemes-custom-css-ie-8',
                    'type'                  => 'textarea',
                ));
            }

            {
                $wp_customize -> add_section( 'mythemes-copyright', array(
                    'title'             => __( 'Copyright' , 'materialize' ),
                    'panel'             => 'mythemes-others-panel',
                    'capability'        => 'edit_theme_options'
                ));

                // content copyright
                $wp_customize -> add_setting( 'mythemes-copyright', array(
                    'default'           => sprintf( __( 'Copyright &copy; %1s. Powered by %2s.' , 'materialize' ), date( 'Y' ), '<a href="http://wordpress.org/">WordPress</a>' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'mythemes_validate_copyright',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'mythemes-copyright', array(
                    'label'             => __( 'Website content Copyright', 'materialize' ),
                    'description'       => __( 'From the theme options you can change only the website content copyright.' , 'materialize' ),
                    'section'           => 'mythemes-copyright',
                    'settings'          => 'mythemes-copyright',
                    'type'              => 'textarea',
                ));
            }
        }
	}

	add_action( 'customize_register' , 'mythemes_customize_register' );

	function mythemes_customizer_live_preview()
	{
        $mythemes_js_ajaxurl = esc_url( admin_url( '/admin-ajax.php' ) );
    	wp_register_script( 'mythemes-themecustomizer', get_template_directory_uri() . '/media/_backend/js/customizer.js', array( 'jquery', 'customize-preview' ), '',  true );
        wp_localize_script( 'mythemes-themecustomizer', 'mythemes_js_ajaxurl', $mythemes_js_ajaxurl );
        wp_enqueue_script( 'mythemes-themecustomizer' );
	}

	add_action( 'customize_preview_init', 'mythemes_customizer_live_preview' );

    if( is_user_logged_in() ){
        add_action( 'wp_ajax_mythemes_layout_load_sidebar' , array( 'mythemes_layout', 'load_sidebar' ), 100 );
    }

    /* FUNCTIONS FOR VALIDATE */
    function mythemes_validate_logic( $value )
    {
        $rett = true;

        if( absint( $value ) == 0 ){
            $rett = false;
        }

        return $rett;
    }

    function mythemes_validate_number( $value )
    {
        return absint( $value );
    }

    function mythemes_validate_layout( $value )
    {
        if( !in_array( $value , array( 'left' , 'full' , 'right' ) ) ){
            $value = 'right';
        }

        return $value;
    }

    function mythemes_validate_sidebar( $value )
    {
        if( !in_array( $value , array( 'main', 'front-page', 'page', 'post', 'special-page' ) ) ){
            $value = 'main';
        }

        return $value;
    }

    function mythemes_validate_copyright( $value )
    {
        return wp_kses( $value, array(
            'a' => array(
                'href'  => array(),
                'title' => array(),
                'class' => array(),
                'id'    => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'span'      => array()
        ));
    }
?>
