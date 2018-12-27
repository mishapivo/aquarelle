<?php

/**
 * The customizer options
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */

if ( class_exists( 'Kirki' ) ) {
    function wpsierra_configuration_styling( $config )
    {
        return wp_parse_args( array(
            'logo_image'     => get_template_directory_uri() . '/images/customizer/sierra-kirki-logo.png',
            'description'    => esc_html__( 'WP Sierra Theme', 'wp-sierra' ),
            'disable_loader' => true,
        ), $config );
    }

    add_filter( 'kirki_config', 'wpsierra_configuration_styling' );
    // Config
    Kirki::add_config( 'wp-sierra', array(
        'capability'  => 'edit_theme_options',
        'option_type' => 'theme_mod',
    ) );
    // General Otions
    Kirki::add_section( 'general_options', array(
        'title'       => esc_html__( 'General Options', 'wp-sierra' ),
        'description' => esc_html__( 'There are general theme options.', 'wp-sierra' ),
        'priority'    => 10,
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'accent_color',
        'label'     => esc_html__( 'Accent Color', 'wp-sierra' ),
        'section'   => 'general_options',
        'default'   => '#2962FF',
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => array( array(
        'element'  => array( 'a, a:hover, a:active, a:focus, .single a:hover,
				.menu a:hover, .widget a:hover, .sierra-nav .sub-menu a:hover, .mobile-menu .sub-menu a:hover,
				.mobile-menu .menu.open a:hover, .breadcrumb ul li.current,
				#search #searchform input[type="text"]:focus + button[type="submit"] i,
				.comment-metadata a:hover, .post-list-title a:hover, .post-list-author a:hover,
				.page-numbers:hover, .page-numbers.current, .sierra-blog-default .widget-title-style a:hover,
				.sierra-blog-lines .widget-title-style a:hover, .footer .menu a:hover, .footer .widget a:hover, .sierra-nav  ul > li.megamenu > ul > ul > li.hover > a, .sierra-nav  ul > li.megamenu ul li a:hover,
				.sierra-social-buttons a, .elementor-element.sierra-button-arrow .sierra-button, .elementor-element.sierra-button-arrow .sierra-button:hover,
				.elementor-element.sierra-button-arrow .sierra-button:focus, .elementor-element.sierra-button-arrow .sierra-button:visited' ),
        'property' => 'color',
    ), array(
        'element'  => array( 'button, button:hover, .b-btn, .btn, .button, .wpcf7 input[type="submit"], .wpcf7 input[type="submit"]:hover,
				.wpcf7 input[type="submit"]:active,	.wpcf7 input[type="submit"]:focus, .open .dropdown-toggle.btn-primary,
				.comment-form #submit, .post-header .single-post-categories a:hover, .b-btn:hover, .b-btn:active, .b-btn:focus,
				.sierra-back:hover, .archive-blog-header, .post-header, .sierra-button, .prev.page-numbers, .next.page-numbers, .prev.page-numbers:hover, .next.page-numbers:hover' ),
        'property' => 'background-color',
    ), array(
        'element'  => array( '#respond textarea[id="comment"]:focus,
				#respond input[type="text"]:focus,
				#respond input[type="email"]:focus,
				#respond input[type="url"]:focus,
				input:focus, textarea:focus,
				.post-header .single-post-categories a:hover' ),
        'property' => 'border-color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'header_overlay_color',
        'label'     => esc_html__( 'Header Overlay Color', 'wp-sierra' ),
        'section'   => 'general_options',
        'default'   => 'rgba(0,0,0,0.3)',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => array( '.blog-header-overlay, .post-header-overlay' ),
        'property' => 'background',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'        => 'dimension',
        'settings'    => 'theme_radius',
        'label'       => esc_html__( 'Corner Radius', 'wp-sierra' ),
        'description' => esc_html__( 'Corner radius for theme elements like: images, input, textara or select fields.', 'wp-sierra' ),
        'section'     => 'general_options',
        'default'     => '10px',
        'output'      => array( array(
        'element'  => array( '.blog-style2, #authorarea .avatar, .featured-image img, .single-post-content img, .sierra-blog-default, .sierra-blog-lines, .sierra-blog-art, input, textarea, select' ),
        'property' => 'border-radius',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'select',
        'settings' => 'webfonts_load_mothod',
        'label'    => esc_html__( 'Webfonts Load Method', 'wp-sierra' ),
        'section'  => 'general_options',
        'default'  => 'async',
        'priority' => 10,
        'choices'  => array(
        'link'  => esc_html__( 'Link', 'wp-sierra' ),
        'async' => esc_html__( 'Async', 'wp-sierra' ),
    ),
    ) );
    // Header Section
    Kirki::add_section( 'header_section', array(
        'title'       => esc_html__( 'Header Options', 'wp-sierra' ),
        'description' => esc_html__( 'There are header theme options.', 'wp-sierra' ),
        'priority'    => 20,
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'select',
        'settings' => 'main_header_layout',
        'label'    => esc_html__( 'Header Layout', 'wp-sierra' ),
        'section'  => 'header_section',
        'default'  => 'center',
        'priority' => 10,
        'choices'  => array(
        'center' => esc_html__( 'Center', 'wp-sierra' ),
        'left'   => esc_html__( 'Left', 'wp-sierra' ),
        'right'  => esc_html__( 'Right', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'image',
        'settings' => 'logo_url',
        'label'    => esc_html__( 'Logo Upload', 'wp-sierra' ),
        'section'  => 'header_section',
        'default'  => '',
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'        => 'image',
        'settings'    => 'alternative_logo_url',
        'label'       => esc_html__( 'Alternative Logo Upload', 'wp-sierra' ),
        'description' => esc_html__( 'Use for transparent header in Page Settings when edit your page', 'wp-sierra' ),
        'section'     => 'header_section',
        'default'     => '',
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'header_background',
        'label'     => esc_html__( 'Header Background Color', 'wp-sierra' ),
        'section'   => 'header_section',
        'default'   => '#FFFFFF',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => array( '.sierra-header, .sierra-nav li > .sub-menu, .mobile-menu .menu.open' ),
        'property' => 'background-color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'header_shadow',
        'label'    => esc_html__( 'Header Shadow', 'wp-sierra' ),
        'section'  => 'header_section',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'color',
        'settings'        => 'header_shadow_color',
        'label'           => esc_html__( 'Header Shadow Color', 'wp-sierra' ),
        'section'         => 'header_section',
        'default'         => 'rgba(0,0,0,0.2)',
        'priority'        => 10,
        'transport'       => 'auto',
        'choices'         => array(
        'alpha' => true,
    ),
        'active_callback' => array( array(
        'setting'  => 'header_shadow',
        'operator' => '==',
        'value'    => '1',
    ) ),
        'output'          => array( array(
        'element'       => '.sierra-header-shadow',
        'property'      => 'box-shadow',
        'value_pattern' => '0 0 120px $',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'header_menu_color',
        'label'     => esc_html__( 'Text and icons color', 'wp-sierra' ),
        'section'   => 'header_section',
        'default'   => '#212121',
        'priority'  => 10,
        'transport' => 'auto',
        'output'    => array( array(
        'element'  => array( '.sierra-nav > ul > li > a, #search-button a, .sierra-nav .sub-menu a,
				.mobile-menu .menu li a, .mobile-menu .drop-menu, .search-mobile-menu input[type="text"], .search-mobile-menu i' ),
        'property' => 'color',
    ), array(
        'element'  => array( '.search-mobile-menu #search #searchform input[type="text"]' ),
        'property' => 'border-color',
    ), array(
        'element'  => array( '#burger-icon span, .sierra-header-transparent.top #burger-icon.open span' ),
        'property' => 'background-color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'        => 'color',
        'settings'    => 'header_alternative_color',
        'label'       => esc_html__( 'Alternative text and icons color', 'wp-sierra' ),
        'description' => esc_html__( 'Use for transparent headers', 'wp-sierra' ),
        'section'     => 'header_section',
        'default'     => '#FFFFFF',
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => array( array(
        'element'  => array( '.sierra-header-transparent.top .sierra-nav > ul > li > a, .sierra-header-transparent.top .sierra-brand-title a, .sierra-header-transparent.top #search-button a' ),
        'property' => 'color',
    ), array(
        'element'  => array( '.sierra-header-transparent.top #burger-icon span' ),
        'property' => 'background-color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'header_search',
        'label'    => esc_html__( 'Search Icon', 'wp-sierra' ),
        'section'  => 'header_section',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    // Blog Panel
    Kirki::add_panel( 'blog_panel', array(
        'title'       => esc_html__( 'Blog', 'wp-sierra' ),
        'description' => esc_html__( 'There are blog theme options.', 'wp-sierra' ),
        'priority'    => 30,
    ) );
    Kirki::add_section( 'archive_blog', array(
        'title'    => esc_html__( 'Archive Blog Options', 'wp-sierra' ),
        'priority' => 10,
        'panel'    => 'blog_panel',
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'enable_archive_blog_title',
        'label'    => esc_html__( 'Archive Title', 'wp-sierra' ),
        'section'  => 'archive_blog',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'select',
        'settings' => 'archive_blog_layout',
        'label'    => esc_html__( 'Archive Style', 'wp-sierra' ),
        'section'  => 'archive_blog',
        'default'  => 'modern',
        'priority' => 10,
        'choices'  => array(
        'modern' => esc_html__( 'Modern', 'wp-sierra' ),
        'lines'  => esc_html__( 'Lines', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'select',
        'settings' => 'archive_boxed_columns',
        'label'    => esc_html__( 'Archive Columns', 'wp-sierra' ),
        'section'  => 'archive_blog',
        'default'  => 'col2',
        'priority' => 10,
        'choices'  => array(
        'col1' => esc_html__( '1 Column', 'wp-sierra' ),
        'col2' => esc_html__( '2 Columns', 'wp-sierra' ),
        'col3' => esc_html__( '3 Columns', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'read_more_button',
        'label'    => esc_html__( 'Read More Button', 'wp-sierra' ),
        'section'  => 'archive_blog',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    // Archive Blog Header
    Kirki::add_section( 'archive_blog_header', array(
        'title'    => esc_html__( 'Archive Blog Header', 'wp-sierra' ),
        'priority' => 10,
        'panel'    => 'blog_panel',
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'enable_archive_blog_header',
        'label'    => esc_html__( 'Header', 'wp-sierra' ),
        'section'  => 'archive_blog_header',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'select',
        'settings'        => 'archive_header_height',
        'label'           => esc_html__( 'Header Height', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => 'custom',
        'priority'        => 10,
        'choices'         => array(
        'custom' => esc_html__( 'Custom Height', 'wp-sierra' ),
        'full'   => esc_html__( 'Fullscreen', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'dimension',
        'settings'        => 'custom_header_height',
        'label'           => esc_html__( 'Height', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => '700px',
        'output'          => array( array(
        'element'  => '.archive-blog-header',
        'property' => 'height',
    ) ),
        'active_callback' => array( array(
        'setting'  => 'archive_header_height',
        'operator' => '==',
        'value'    => 'custom',
    ), array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'background',
        'settings'        => 'archive_header_background',
        'label'           => esc_html__( 'Header Background', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => array(
        'background-color'      => esc_attr( get_theme_mod( 'accent_color' ) ),
        'background-image'      => esc_url( get_template_directory_uri() . '/images/sierra-blog-header.jpg' ),
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'fixed',
    ),
        'output'          => array( array(
        'element' => '.archive-blog-header',
    ) ),
        'active_callback' => array( array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'switch',
        'settings'        => 'enable_blog_header_overlay',
        'label'           => esc_html__( 'Overlay', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => '0',
        'priority'        => 10,
        'choices'         => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'switch',
        'settings'        => 'enable_archive_header_transparent',
        'label'           => esc_html__( 'Transparent Header', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => '1',
        'priority'        => 10,
        'choices'         => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'switch',
        'settings'        => 'enable_archive_header_alternative_logo',
        'label'           => esc_html__( 'Alternative Logo For Transparent Header', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => '1',
        'priority'        => 10,
        'choices'         => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ), array(
        'setting'  => 'enable_archive_header_transparent',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'text',
        'settings'        => 'blog_heading_text',
        'label'           => __( 'Heading Text', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array( array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'text',
        'settings'        => 'blog_tagline_text',
        'label'           => __( 'Tagline Text', 'wp-sierra' ),
        'section'         => 'archive_blog_header',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array( array(
        'setting'  => 'enable_archive_blog_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    // Single Post Header
    Kirki::add_section( 'single_post_header', array(
        'title'    => esc_html__( 'Single Post Header', 'wp-sierra' ),
        'priority' => 10,
        'panel'    => 'blog_panel',
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'enable_single_post_header',
        'label'    => esc_html__( 'Header', 'wp-sierra' ),
        'section'  => 'single_post_header',
        'default'  => '0',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'select',
        'settings'        => 'post_header_height',
        'label'           => esc_html__( 'Header Height', 'wp-sierra' ),
        'section'         => 'single_post_header',
        'default'         => 'full',
        'priority'        => 10,
        'choices'         => array(
        'custom' => esc_html__( 'Custom Height', 'wp-sierra' ),
        'full'   => esc_html__( 'Fullscreen', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_single_post_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'dimension',
        'settings'        => 'custom_post_header_height',
        'label'           => esc_html__( 'Height', 'wp-sierra' ),
        'section'         => 'single_post_header',
        'default'         => '700px',
        'output'          => array( array(
        'element'  => '.post-header',
        'property' => 'height',
    ) ),
        'active_callback' => array( array(
        'setting'  => 'post_header_height',
        'operator' => '==',
        'value'    => 'custom',
    ), array(
        'setting'  => 'enable_single_post_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'switch',
        'settings'        => 'enable_post_header_overlay',
        'label'           => esc_html__( 'Overlay', 'wp-sierra' ),
        'section'         => 'single_post_header',
        'default'         => '1',
        'priority'        => 10,
        'choices'         => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_single_post_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'select',
        'settings'        => 'post-background-position',
        'label'           => esc_html__( 'Background Position', 'wp-sierra' ),
        'section'         => 'single_post_header',
        'default'         => 'center center',
        'priority'        => 10,
        'multiple'        => 1,
        'choices'         => array(
        'left top'      => esc_html__( 'Left Top', 'wp-sierra' ),
        'left center'   => esc_html__( 'Left Center', 'wp-sierra' ),
        'left bottom'   => esc_html__( 'Left Bottom', 'wp-sierra' ),
        'right top'     => esc_html__( 'Right Top', 'wp-sierra' ),
        'right center'  => esc_html__( 'Right Center', 'wp-sierra' ),
        'right bottom'  => esc_html__( 'Right Bottom', 'wp-sierra' ),
        'center top'    => esc_html__( 'Center Top', 'wp-sierra' ),
        'center center' => esc_html__( 'Center Center', 'wp-sierra' ),
        'center bottom' => esc_html__( 'Center Bottom', 'wp-sierra' ),
    ),
        'output'          => array( array(
        'element'  => '.post-header',
        'property' => 'background-position',
    ) ),
        'active_callback' => array( array(
        'setting'  => 'enable_single_post_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'radio-buttonset',
        'settings'        => 'post-background-attachment',
        'label'           => esc_html__( 'Background Attachment', 'wp-sierra' ),
        'section'         => 'single_post_header',
        'default'         => 'scroll',
        'priority'        => 10,
        'choices'         => array(
        'scroll' => esc_html__( 'Scroll', 'wp-sierra' ),
        'fixed'  => esc_html__( 'Fixed', 'wp-sierra' ),
    ),
        'output'          => array( array(
        'element'  => '.post-header',
        'property' => 'background-attachment',
    ) ),
        'active_callback' => array( array(
        'setting'  => 'enable_single_post_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'switch',
        'settings'        => 'enable_post_header_transparent',
        'label'           => esc_html__( 'Transparent Header', 'wp-sierra' ),
        'section'         => 'single_post_header',
        'default'         => '0',
        'priority'        => 10,
        'choices'         => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_single_post_header',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'switch',
        'settings'        => 'enable_post_header_alternative_logo',
        'label'           => esc_html__( 'Alternative Logo For Transparent Header', 'wp-sierra' ),
        'section'         => 'single_post_header',
        'default'         => '0',
        'priority'        => 10,
        'choices'         => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'enable_single_post_header',
        'operator' => '==',
        'value'    => '1',
    ), array(
        'setting'  => 'enable_post_header_transparent',
        'operator' => '==',
        'value'    => '1',
    ) ),
    ) );
    //Single Post Options
    Kirki::add_section( 'single_post_options', array(
        'title'    => esc_html__( 'Single Post Options', 'wp-sierra' ),
        'priority' => 10,
        'panel'    => 'blog_panel',
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'select',
        'settings' => 'post_layout',
        'label'    => esc_html__( 'Post Layout', 'wp-sierra' ),
        'section'  => 'single_post_options',
        'default'  => 'right-sidebar',
        'priority' => 10,
        'choices'  => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'wp-sierra' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'wp-sierra' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'post_about_author',
        'label'    => esc_html__( 'About Author', 'wp-sierra' ),
        'section'  => 'single_post_options',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'related_posts',
        'label'    => esc_html__( 'Related Posts', 'wp-sierra' ),
        'section'  => 'single_post_options',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'switch',
        'settings' => 'social_icons_post',
        'label'    => esc_html__( 'Social Icons', 'wp-sierra' ),
        'section'  => 'single_post_options',
        'default'  => '1',
        'priority' => 10,
        'choices'  => array(
        'on'  => esc_html__( 'Enable', 'wp-sierra' ),
        'off' => esc_html__( 'Disable', 'wp-sierra' ),
    ),
    ) );
    //Footer
    Kirki::add_section( 'footer_section', array(
        'title'    => esc_html__( 'Footer', 'wp-sierra' ),
        'priority' => 50,
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'     => 'select',
        'settings' => 'footer_layout',
        'label'    => esc_html__( 'Footer Layout', 'wp-sierra' ),
        'section'  => 'footer_section',
        'default'  => 'simple',
        'priority' => 10,
        'multiple' => 1,
        'choices'  => array(
        'simple'       => esc_html__( 'Simple', 'wp-sierra' ),
        '4col-widgets' => esc_html__( '4 Columns', 'wp-sierra' ),
    ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'image',
        'settings'        => 'footer_logo',
        'label'           => esc_html__( 'Logo Upload', 'wp-sierra' ),
        'section'         => 'footer_section',
        'default'         => '',
        'active_callback' => array( array(
        'setting'  => 'footer_layout',
        'operator' => 'in',
        'value'    => array( 'simple' ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'text',
        'settings'        => 'footer_logo_width',
        'label'           => esc_html__( 'Logo Width', 'wp-sierra' ),
        'section'         => 'footer_section',
        'default'         => '',
        'active_callback' => array( array(
        'setting'  => 'footer_layout',
        'operator' => 'in',
        'value'    => array( 'simple' ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'select',
        'settings'        => 'copyright_select',
        'label'           => esc_html__( 'Copyright', 'wp-sierra' ),
        'section'         => 'footer_section',
        'default'         => 'auto',
        'priority'        => 10,
        'multiple'        => 1,
        'choices'         => array(
        'auto'   => esc_html__( 'Auto', 'wp-sierra' ),
        'custom' => esc_html__( 'Custom', 'wp-sierra' ),
    ),
        'active_callback' => array( array(
        'setting'  => 'footer_layout',
        'operator' => 'in',
        'value'    => array( 'simple' ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'            => 'textarea',
        'settings'        => 'copy_description',
        'label'           => esc_html__( 'Copyright text', 'wp-sierra' ),
        'section'         => 'footer_section',
        'default'         => '',
        'priority'        => 10,
        'active_callback' => array( array(
        'setting'  => 'copyright_select',
        'operator' => '==',
        'value'    => 'custom',
    ), array(
        'setting'  => 'footer_layout',
        'operator' => 'in',
        'value'    => array( 'simple' ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'footer_background_color',
        'label'     => esc_html__( 'Background Color', 'wp-sierra' ),
        'section'   => 'footer_section',
        'default'   => '',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => '.footer',
        'property' => 'background-color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'footer_text_color',
        'label'     => esc_html__( 'Text Color', 'wp-sierra' ),
        'section'   => 'footer_section',
        'default'   => '',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => '.footer .widget p, .footer .widget a, .footer .widget .widget-title-style,
				 .footer .widget select, .footer-copyright p, .footer-copyright a, .footer .widget span,
				 .footer .widget.widget_calendar, .footer .widget ul li',
        'property' => 'color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'footer_menu_color',
        'label'     => esc_html__( 'Menu Color', 'wp-sierra' ),
        'section'   => 'footer_section',
        'default'   => '',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => '.footer .menu a',
        'property' => 'color',
    ) ),
    ) );
    // Buttons Section
    Kirki::add_section( 'buttons_section', array(
        'title'       => esc_html__( 'Buttons', 'wp-sierra' ),
        'description' => esc_html__( 'There are customize button options.', 'wp-sierra' ),
        'priority'    => 60,
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'button_background_color',
        'label'     => esc_html__( 'Background Color', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'default'   => '',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => '.comment-form #submit,button, .b-btn, .prev.page-numbers, .next.page-numbers, .sierra-button, .wpcf7 input[type="submit"]',
        'property' => 'background-color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'button_text_color',
        'label'     => esc_html__( 'Text Color', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'default'   => '',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => '.comment-form #submit, button, .b-btn, .prev.page-numbers, .next.page-numbers, .sierra-button, .wpcf7 input[type="submit"]',
        'property' => 'color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'button_hover_background',
        'label'     => esc_html__( 'Background Color on Hover', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'default'   => '',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => '.comment-form #submit:hover, .prev.page-numbers:hover, .next.page-numbers:hover, button:hover, .b-btn:hover, .b-btn:active, .b-btn:focus,
				.sierra-button:hover, .sierra-button:focus, .sierra-button:visited, .wpcf7 input[type="submit"]:hover,
				.wpcf7 input[type="submit"]:active,	.wpcf7 input[type="submit"]:focus',
        'property' => 'background-color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'button_hover_text',
        'label'     => esc_html__( 'Text Color on Hover', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'default'   => '',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'  => '.comment-form #submit:hover, button:hover, .b-btn:hover, .b-btn:active, .b-btn:focus,
				.prev.page-numbers:hover, .next.page-numbers:hover, .sierra-button:hover, .sierra-button:focus, .sierra-button:visited, .wpcf7 input[type="submit"]:hover,
				.wpcf7 input[type="submit"]:active,	.wpcf7 input[type="submit"]:focus',
        'property' => 'color',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'color',
        'settings'  => 'button_shadow_color',
        'label'     => esc_html__( 'Shadow Color on Hover', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'default'   => 'rgba(41,98,255,0.30)',
        'priority'  => 10,
        'transport' => 'auto',
        'choices'   => array(
        'alpha' => true,
    ),
        'output'    => array( array(
        'element'       => '.comment-form #submit:hover, .b-btn:hover, button:hover, .prev.page-numbers:hover,
				.next.page-numbers:hover, .b-btn:active, .b-btn:focus,	.sierra-button:hover, .sierra-button:focus,
				.sierra-button:visited, .wpcf7 input[type="submit"]:hover,
				.wpcf7 input[type="submit"]:active,	.wpcf7 input[type="submit"]:focus',
        'property'      => 'box-shadow',
        'value_pattern' => '0 8px 20px $',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'dimension',
        'settings'  => 'button_radius',
        'label'     => esc_html__( 'Corner Radius', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'priority'  => 10,
        'default'   => '10px',
        'transport' => 'auto',
        'output'    => array( array(
        'element'  => array( '.comment-form #submit, .b-btn, button, .prev.page-numbers, .next.page-numbers,
				.sierra-button, .wpcf7 input[type="submit"]' ),
        'property' => 'border-radius',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'slider',
        'settings'  => 'button_vertical_padding',
        'label'     => esc_html__( 'Vertical Padding', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'transport' => 'auto',
        'priority'  => 10,
        'default'   => 20,
        'choices'   => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
        'output'    => array( array(
        'element'  => array( '.comment-form #submit, .b-btn, button, .wpcf7 input[type="submit"]' ),
        'property' => 'padding-top',
        'units'    => 'px',
    ), array(
        'element'  => array( '.comment-form #submit, .b-btn, button, .wpcf7 input[type="submit"]' ),
        'property' => 'padding-bottom',
        'units'    => 'px',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'slider',
        'settings'  => 'button_horizontal_padding',
        'label'     => esc_html__( 'Horizontal Padding', 'wp-sierra' ),
        'section'   => 'buttons_section',
        'transport' => 'auto',
        'priority'  => 10,
        'default'   => 42,
        'choices'   => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
        'output'    => array( array(
        'element'  => array( '.comment-form #submit, .b-btn, button, .wpcf7 input[type="submit"]' ),
        'property' => 'padding-left',
        'units'    => 'px',
    ), array(
        'element'  => array( '.comment-form #submit, .b-btn, button, .wpcf7 input[type="submit"]' ),
        'property' => 'padding-right',
        'units'    => 'px',
    ) ),
    ) );
    Kirki::add_section( 'typography_section', array(
        'title'       => esc_html__( 'Typography', 'wp-sierra' ),
        'description' => esc_html__( 'There are general typography theme options.', 'wp-sierra' ),
        'priority'    => 70,
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'        => 'typography',
        'settings'    => 'body_typography',
        'label'       => esc_html__( 'Body Typography', 'wp-sierra' ),
        'description' => esc_html__( 'Select the main typography options for your site.', 'wp-sierra' ),
        'help'        => esc_html__( 'The typography options you set here apply to body class on your site.', 'wp-sierra' ),
        'section'     => 'typography_section',
        'priority'    => 10,
        'default'     => array(
        'font-family'    => '',
        'variant'        => '',
        'font-size'      => '16px',
        'line-height'    => '24px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport'   => 'auto',
        'output'      => array( array(
        'element' => 'body',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'        => 'typography',
        'settings'    => 'headings_typography',
        'label'       => esc_html__( 'Headings Typography', 'wp-sierra' ),
        'description' => esc_html__( 'Select the all headings font family for your site.', 'wp-sierra' ),
        'section'     => 'typography_section',
        'priority'    => 10,
        'default'     => array(
        'font-family' => '',
        'variant'     => '',
    ),
        'transport'   => 'auto',
        'output'      => array( array(
        'element' => array( 'h1, h2, h3, h4, h5, h6' ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'h1_typography',
        'label'     => esc_html__( 'H1 Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => 'bold',
        'font-size'      => '50px',
        'line-height'    => '60px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => 'h1',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'h2_typography',
        'label'     => esc_html__( 'H2 Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => 'bold',
        'font-size'      => '42px',
        'line-height'    => '50px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => 'h2',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'h3_typography',
        'label'     => esc_html__( 'H3 Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => 'bold',
        'font-size'      => '30px',
        'line-height'    => '37px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => array(
        'h3',
        '.col3 h1.post-list-title',
        '.col4 h1.post-list-title',
        '.col5 h1.post-list-title'
    ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'h4_typography',
        'label'     => esc_html__( 'H4 Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => 'bold',
        'font-size'      => '26px',
        'line-height'    => '31px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => 'h4',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'h5_typography',
        'label'     => esc_html__( 'H5 Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => 'bold',
        'font-size'      => '19px',
        'line-height'    => '23px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => 'h5',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'h6_typography',
        'label'     => esc_html__( 'H6 Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => 'bold',
        'font-size'      => '16px',
        'line-height'    => '24px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => 'h6',
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'p_typography',
        'label'     => esc_html__( 'Paragraph Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => '',
        'font-size'      => '16px',
        'line-height'    => '24px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => array( 'p,	dt, dd,	dl,	address, label, small, pre, code' ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'blockquote_typography',
        'label'     => esc_html__( 'Blockquote Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => '',
        'font-size'      => '16px',
        'line-height'    => '24px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'none',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => array( 'blockquote, blockquote p' ),
    ) ),
    ) );
    Kirki::add_field( 'wp-sierra', array(
        'type'      => 'typography',
        'settings'  => 'menu_typography',
        'label'     => esc_html__( 'Menu Typography', 'wp-sierra' ),
        'section'   => 'typography_section',
        'priority'  => 10,
        'default'   => array(
        'font-family'    => '',
        'variant'        => '',
        'font-size'      => '14px',
        'line-height'    => '14px',
        'color'          => '#212121',
        'letter-spacing' => '0px',
        'text-transform' => 'uppercase',
    ),
        'transport' => 'auto',
        'output'    => array( array(
        'element' => array( '.sierra-nav > ul > li > a, .sierra-nav .sub-menu a' ),
    ) ),
    ) );
}
