<?php
/**
 * EleMate Theme Customizer
 *
 * @package EleMate
 * @since 	1.0.0
 * @version	1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elemate_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.brand-logo',
			'render_callback' => 'elemate_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => 'h5.header',
			'render_callback' => 'elemate_customize_partial_blogdescription',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'elemate_intro_title', array(
			'selector' => 'h1.header',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'elemate_intro_title' ) );
			},
		) );
		
		$wp_customize->selective_refresh->add_partial( 'elemate_header_text', array(
			'selector' => 'h5.header',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'elemate_header_text' ) );
			},
		) );
		
		$wp_customize->selective_refresh->add_partial( 'elemate_intro_button_text', array(
			'selector' => '#download-button',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'elemate_intro_button_text' ) );
			},
		) );
		
		$wp_customize->selective_refresh->add_partial( 'elemate_accent_primary', array(
			'selector' => '',
			'render_callback' => function() {
				return sanitize_hex_color( get_theme_mod( 'elemate_accent_primary' ) );
			},
		) );
		
		$wp_customize->selective_refresh->add_partial( 'elemate_accent_secondary', array(
			'selector' => '',
			'render_callback' => function() {
				return sanitize_hex_color( get_theme_mod( 'elemate_accent_secondary' ) );
			},
		) );
	}

	/**
	 * Header CTA Section
	 */
	$wp_customize->add_panel( 'header_settings', 
	    array( 
		    'title'       => __( 'EleMate Header Settings', 'elemate' ),
            'priority'    => 38,
            'capability'  => 'edit_theme_options',			
	        'description' => __( 'Settings panel for header CTA', 'elemate' ) 
		) 
	);
	
	$wp_customize->add_section( 'elemate_intro_options' , array(
       'title'       => __('EleMate CTA Options','elemate'),
	   'description' => sprintf( __( 'Use the following settings to control the CTA section.', 'elemate' )),
       'priority'    => 1,
	   'panel' => 'header_settings'
    ) );
	
	$wp_customize->add_setting(
        'elemate_intro_title',
    array(
        'default' => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'elemate_intro_title',
    array(
        'label'     => __('Intro Section Title!', 'elemate'),
        'section'   => 'elemate_intro_options',
		'priority'  => 1,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting( 'elemate_header_text', array(
		'default' => '',
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'wp_kses_post',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'elemate_header_text', array(
		'section'  => 'elemate_intro_options',
		'type'     => 'textarea',
		'priority' => 2,
		'label'    => __( 'Header Text', 'elemate' ),
	) );
	
	$wp_customize->add_setting(
        'elemate_intro_button_text',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'elemate_intro_button_text',
    array(
        'label'     => __('Intro Button Text!', 'elemate'),
        'section'   => 'elemate_intro_options',
		'priority'  => 3,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'elemate_intro_button_url',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage',
		'capability' => 'edit_theme_options',
    ));
	
	$wp_customize->add_control(
        'elemate_intro_button_url',
    array(
        'label'     => __('Intro Button Link!', 'elemate'),
        'section'   => 'elemate_intro_options',
		'priority'  => 4,
        'type'      => 'url',
    ));
	
	$wp_customize->add_setting( 'elemate_cta_url_target', array(
		'default' => '_self',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'elemate_sanitize_target_url',
		'capability' => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'elemate_cta_url_target', array(
        'label'   => __( 'Call To Action Url Window Target', 'elemate' ),
        'section' => 'elemate_intro_options',
	    'priority' => 5,
        'type'    => 'radio',
        'choices' => array(
             '_self'   => __( 'Same Tab', 'elemate' ),
			 '_blank'  => __( 'New Tab', 'elemate' ),
        ),
    ));
	
	/**
	 * Add the Blog Options section
	 */
	$wp_customize->add_panel( 'elemate_blog_panel', array(
		'title'       => __( 'Blog Feed Options', 'elemate' ),
		'priority'    => 39,
		'capability'  => 'edit_theme_options',
		'description' => __( 'Configure your blog\s layout', 'elemate' ),
	) );
	
	$wp_customize->add_section( 'elemate_blogfeed_options' , array(
       'title'       => __('EleMate Blog Feed Options','elemate'),
	   'description' => sprintf( __( 'Use the following settings to set Frontpage/Blog home feed layout.', 'elemate' )),
       'priority'    => 1,
	   'panel' => 'elemate_blog_panel'
    ) );
	
	$wp_customize->add_section( 'elemate_default_options' , array(
       'title'       => __('Default layout Options','elemate'),
	   'description' => sprintf( __( 'Set your blog home feed to the default layout.', 'elemate' )),
       'priority'    => 2,
	   'panel' => 'elemate_blog_panel'
    ) );
	
	$wp_customize->add_section( 'elemate_grid2_options' , array(
       'title'       => __('2 Grid layout Options','elemate'),
	   'description' => sprintf( __( 'Set your blog home feed to the 2 grid layout.', 'elemate' )),
       'priority'    => 3,
	   'panel' => 'feed_settings'
    ) );
	
	$wp_customize->add_section( 'elemate_grid3_options' , array(
       'title'       => __('3 Grid layout Options','elemate'),
	   'description' => sprintf( __( 'Set your blog home feed to the 3 grid layout.', 'elemate' )),
       'priority'    => 4,
	   'panel' => 'elemate_blog_panel'
    ) );

	// Begin Blog Feed section
	$wp_customize->add_setting( 'elemate_feed_layout', array(
		'default' => 'one-column',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'elemate_sanitize_feed_layout',
		'capability' => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'elemate_feed_layout', array(
        'label'    => __( 'Blog Feed Layout', 'elemate' ),
        'section'  => 'elemate_blogfeed_options',
	    'priority' => 1,
        'type'     => 'radio',
        'choices'  => array(
            'one-column' 	=> __( 'Default - One Column', 'elemate' ),
			'two-columns'   => __( 'Grid - Two Columns', 'elemate' ),
			'three-columns' => __( 'Grid - Three Columns', 'elemate' ),
        ),
    ));
	
	// Add page background color setting and control.
	$wp_customize->add_setting( 'elemate_accent_primary', array(
		'default'           => '#4db6ac',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'elemate_accent_primary', array(
		'label'       => __( 'Accent Color: Primary', 'elemate' ),
		'section'     => 'colors',
	) ) );
	
	$wp_customize->add_setting( 'elemate_accent_secondary', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'elemate_accent_secondary', array(
		'label'       => __( 'Accent Color: Secondary', 'elemate' ),
		'section'     => 'colors',
	) ) );
	
	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );
}
add_action( 'customize_register', 'elemate_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since EleMate 1.0.0
 * @see elemate_customize_register()
 *
 * @return void
 */
function elemate_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since EleMate 1.0.0
 * @see elemate_customize_register()
 *
 * @return void
 */
function elemate_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Sanitize a radio button.
 *
 * @param array $input Input array of layout choices.
 */
function elemate_sanitize_feed_layout( $input ) {
	$valid = array(
		'one-column'    => __( 'One Column', 'elemate' ),
		'two-columns'   => __( 'Two Columns', 'elemate' ),
		'three-columns' => __( 'Three Columns', 'elemate' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize a radio button.
 *
 * @param array $input Input array of layout choices.
 */
function elemate_sanitize_target_url( $input ) {
	$valid = array(
		'_self'    => __( 'Same Tab', 'elemate' ),
		'_blank'   => __( 'New Tab', 'elemate' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elemate_customize_preview_js() {
	wp_enqueue_script( 'elemate_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'elemate_customize_preview_js' );


function elemate_home_layout_option() {
	if ( get_theme_mod( 'elemate_feed_layout' ) === 'one-column' ) {
		get_template_part( 'content/content', get_post_format() );
	} elseif ( get_theme_mod( 'elemate_feed_layout' ) === 'two-columns' ) {
		get_template_part( 'content/content', 'cards' );
	} elseif ( get_theme_mod( 'elemate_feed_layout' ) === 'three-columns' ) {
		get_template_part( 'content/content', '3cards' );
	} else {
		get_template_part( 'content/content', get_post_format() );
	}
}
add_action( 'elemate_home_feed', 'elemate_home_layout_option' );

function elemate_custom_css_adjust() {
	$elemate_primary    = sanitize_hex_color( get_theme_mod( 'elemate_accent_primary' ) );
	$elemate_secondary  = sanitize_hex_color( get_theme_mod( 'elemate_accent_secondary' ) );
	$elemate = '
		nav.transparent.menu-fixed{background-color: ' . $elemate_primary . ' !important;}
		a,nav .brand-logo,.button-collapse,.parallax-container h1.header,.side-nav p,.side-nav a {color: ' . $elemate_primary . ';}
		nav.transparent.menu-fixed,.parallax-container .btn-large,.side-nav a:hover,
		.side-nav .header,.side-nav .widget-title,.anchor-menu,footer.page-footer{background-color: ' . $elemate_primary . ';}
		.footer-widgets .widget-title,.footer-widgets a,.footer-widgets p,footer.page-footer .footer-copyright{color: ' . $elemate_secondary . ';}
		
	';
	wp_add_inline_style( 'elemate-custom', $elemate );
}
add_action( 'wp_enqueue_scripts', 'elemate_custom_css_adjust' );