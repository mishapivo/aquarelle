<?php
/**
 * business-land Theme Customizer
 *
 * @package business-land
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_land_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image'  )->transport    = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'business_land_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'business_land_customize_partial_blogdescription',
	) );
	
	$default = business_land_default_theme_options();
	
	//theme option panel
	$wp_customize->add_panel( 'theme_option_panel', array( 'title' => esc_html__( 'Theme Options', 'business-land' ), 'priority' => 200, 'capability' => 'edit_theme_options' ) );
	
	
	// header section
	$wp_customize->add_section( 'business_land_header_section', 
		array( 'title' => esc_html__( 'Header Option', 'business-land' ),
			   'priority' => 100, 
			   'capability' => 'edit_theme_options', 
			   'panel' => 'theme_option_panel' 
		)
	);
	
	// sticky header setting.
	$wp_customize->add_setting( 'business_land_sticky_header_status',
		array(
			'default'           => $default['business_land_sticky_header_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	// sticky header control
	$wp_customize->add_control( 'business_land_sticky_header_status',
		array(
			'label'       => esc_html__( 'Enable Sticky Header', 'business-land' ),
			'section'     => 'business_land_header_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	// breadcrumb header setting.
	$wp_customize->add_setting( 'business_land_breadcrumb_status',
		array(
			'default'           => $default['business_land_breadcrumb_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	// breadcrumb header control
	$wp_customize->add_control( 'business_land_breadcrumb_status',
		array(
			'label'       => esc_html__( 'Enable Breadcrumb', 'business-land' ),
			'section'     => 'business_land_header_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	//footer section
	$wp_customize->add_section( 'business_land_footer_section', 
		array( 'title' => esc_html__( 'Footer Option', 'business-land' ),
			   'priority' => 200, 
			   'capability' => 'edit_theme_options', 
			   'panel' => 'theme_option_panel' 
		)
	);
	
	//footer facebook setting.
	$wp_customize->add_setting( 'business_land_footer_facebook_link', array( 'sanitize_callback' => 'esc_url_raw' ) );
	
	//footer facebook control
	$wp_customize->add_control( 'business_land_footer_facebook_link', 
		array( 'label' => esc_html__( 'facebook', 'business-land' ),
			   'description' =>  __( 'e.g: http://example.com', 'business-land' ), 
			   'section' => 'business_land_footer_section', 
			   'type' => 'url',
			   'priority' => 100 
		) 
	);
	
	//footer twitter setting.
	$wp_customize->add_setting( 'business_land_footer_twitter_link', array( 'sanitize_callback' => 'esc_url_raw' ) );
	
	//footer twitter control
	$wp_customize->add_control( 'business_land_footer_twitter_link', 
		array( 'label' => esc_html__( 'Twitter', 'business-land' ),
			   'description' =>  __( 'e.g: http://example.com', 'business-land' ), 
			   'section' => 'business_land_footer_section', 
			   'type' => 'url',
			   'priority' => 100 
		) 
	);
	
	//footer google plus setting.
	$wp_customize->add_setting( 'business_land_footer_google_plus_link', array( 'sanitize_callback' => 'esc_url_raw' ) );
	
	//footer google plus control
	$wp_customize->add_control( 'business_land_footer_google_plus_link', 
		array( 'label' => esc_html__( 'Google Plus', 'business-land' ),
			   'description' =>  __( 'e.g: http://example.com', 'business-land' ), 
			   'section' => 'business_land_footer_section', 
			   'type' => 'url',
			   'priority' => 100 
		) 
	);
	
	//footer youtube setting.
	$wp_customize->add_setting( 'business_land_footer_youtube_link', array( 'sanitize_callback' => 'esc_url_raw' ) );
	
	//footer youtube control
	$wp_customize->add_control( 'business_land_footer_youtube_link', 
		array( 'label' => esc_html__( 'Youtube', 'business-land' ),
			   'description' =>  __( 'e.g: http://example.com', 'business-land' ), 
			   'section' => 'business_land_footer_section', 
			   'type' => 'url',
			   'priority' => 100 
		) 
	);
	
	//footer instagram setting.
	$wp_customize->add_setting( 'business_land_footer_instagram_link', array( 'sanitize_callback' => 'esc_url_raw' ) );
	
	//footer instagram control
	$wp_customize->add_control( 'business_land_footer_instagram_link', 
		array( 'label' => esc_html__( 'Instagram', 'business-land' ),
			   'description' =>  __( 'e.g: http://example.com', 'business-land' ), 
			   'section' => 'business_land_footer_section', 
			   'type' => 'url',
			   'priority' => 100 
		) 
	);
	
	//post slider section
	$wp_customize->add_section( 'business_land_post_slider_section', 
		array( 'title' => esc_html__( 'Slider Option', 'business-land' ),
			   'priority' => 300, 
			   'capability' => 'edit_theme_options', 
			   'panel' => 'theme_option_panel' 
		)
	);
	
	// post slider setting.
	$wp_customize->add_setting( 'business_land_post_slider_status',
		array(
			'default'           => $default['business_land_post_slider_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	//post slider control
	$wp_customize->add_control( 'business_land_post_slider_status',
		array(
			'label'       => esc_html__( 'Enable Post Slider', 'business-land' ),
			'section'     => 'business_land_post_slider_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	// page slider setting.
	$wp_customize->add_setting( 'business_land_page_slider_status',
		array(
			'default'           => $default['business_land_page_slider_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	//post slider control
	$wp_customize->add_control( 'business_land_page_slider_status',
		array(
			'label'       => esc_html__( 'Enable Page Slider', 'business-land' ),
			'section'     => 'business_land_post_slider_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	/* Option list of all post */  
    $pages = array();
	$args = array(
		'sort_order' => 'desc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'meta_key' => '',
		'meta_value' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
    $pages_obj = get_pages( $args );
    $pages[''] = esc_html__( 'Choose Page', 'business-land' );
    foreach ( $pages_obj as $posts ) {
    	$pages[$posts->ID] = $posts->post_title;
    }
	
	//Select Post One
	$wp_customize->add_setting( 'business_land_slider_page_one',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'business_land_sanitize_select',
		)
	);
            
	$wp_customize->add_control( 'business_land_slider_page_one',
		array(
			'label'		  => esc_html__( 'Select Page One', 'business-land'),
			'section'	  => 'business_land_post_slider_section',
			'type'		  => 'select',
			'priority'    => 100,
			'choices'	  => $pages
		)
	);
	
	//Select Post Two
	$wp_customize->add_setting( 'business_land_slider_page_two',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'business_land_sanitize_select',
		)
	);
            
	$wp_customize->add_control( 'business_land_slider_page_two',
		array(
			'label'			=> esc_html__( 'Select Page Two', 'business-land'),
			'section'	    => 'business_land_post_slider_section',
			'type'			=> 'select',
			'priority'    	=> 100,
			'choices'	  	=> $pages
		)
	);
	
	//Select Post Three
	$wp_customize->add_setting( 'business_land_slider_page_three',
		array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'business_land_sanitize_select',
		)
	);
            
	$wp_customize->add_control( 'business_land_slider_page_three',
		array(
			'label'			=> esc_html__( 'Select Page Three', 'business-land'),
			'section'	  	=> 'business_land_post_slider_section',
			'type'			=> 'select',
			'priority'    	=> 100,
			'choices'	  	=> $pages
		)
	);
	
	$wp_customize->add_setting( 'business_land_page_slider_excerpt',
		array(
	  		'capability' 		=> 'edit_theme_options',
	  		'sanitize_callback' => 'business_land_sanitize_select',
	  		'default' 			=> $default['business_land_page_slider_excerpt'],
		) 
	);
	
	$wp_customize->add_control( 'business_land_page_slider_excerpt',
		array(
  			'type' 			=> 'select',
  			'section' 		=> 'business_land_post_slider_section', // Add a default or your own section
  			'label' 		=> esc_html__( 'Page Slider Excerpt', 'business-land' ),
			'choices' 		=> array(
				'20' 	=> esc_html__( 'Default', 'business-land' ),
				'30' 	=> esc_html__( '30', 'business-land' ),
				'40' 	=> esc_html__( '40', 'business-land' ),
				'50' 	=> esc_html__( '50', 'business-land' ),
				'60' 	=> esc_html__( '60', 'business-land' ),
				'70' 	=> esc_html__( '70', 'business-land' ),
				'80' 	=> esc_html__( '80', 'business-land' ),
				'90' 	=> esc_html__( '90', 'business-land' ),
				'100' 	=> esc_html__( '100', 'business-land' ),
				'0'		=> esc_html__( 'None', 'business-land' ),
			),
			'priority'    => 100
		) 
	);
	
	//sidebar sticky section
	$wp_customize->add_section( 'business_land_sticky_sidebar_section', 
		array( 'title' => esc_html__( 'Sidebar Sticky Option', 'business-land' ),
			   'priority' => 300, 
			   'capability' => 'edit_theme_options', 
			   'panel' => 'theme_option_panel' 
		)
	);
	
	// blog sidebar sticky setting.
	$wp_customize->add_setting( 'business_land_blog_sidebar_sticky',
		array(
			'default'           => $default['business_land_blog_sidebar_sticky'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	
	//blog post sidebar sticky control
	$wp_customize->add_control( 'business_land_blog_sidebar_sticky',
		array(
			'label'       => esc_html__( 'Blog Sidebar Sticky', 'business-land' ),
			'section'     => 'business_land_sticky_sidebar_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	// archive post sidebar sticky setting.
	$wp_customize->add_setting( 'business_land_archive_blog_sidebar_sticky',
		array(
			'default'           => $default['business_land_archive_blog_sidebar_sticky'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	//archive post sidebar sticky control
	$wp_customize->add_control( 'business_land_archive_blog_sidebar_sticky',
		array(
			'label'       => esc_html__( 'Archive Blog Sidebar Sticky', 'business-land' ),
			'section'     => 'business_land_sticky_sidebar_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
		
	// single post sidebar sticky setting.
	$wp_customize->add_setting( 'business_land_single_blog_sidebar_sticky',
		array(
			'default'           => $default['business_land_single_blog_sidebar_sticky'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	//single post sidebar sticky control
	$wp_customize->add_control( 'business_land_single_blog_sidebar_sticky',
		array(
			'label'       => esc_html__( 'Single Blog Sidebar Sticky', 'business-land' ),
			'section'     => 'business_land_sticky_sidebar_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);

	//back to top section
	$wp_customize->add_section( 'business_land_backto_top_section', 
		array( 'title' => esc_html__( 'Back To Top Option', 'business-land' ),
			   'priority' => 500, 
			   'capability' => 'edit_theme_options', 
			   'panel' => 'theme_option_panel' 
		)
	);
	
	// back to top setting.
	$wp_customize->add_setting( 'business_land_backto_top_status',
		array(
			'default'           => $default['business_land_backto_top_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	// back to top control
	$wp_customize->add_control( 'business_land_backto_top_status',
		array(
			'label'       => esc_html__( 'Enable Back To Top Button', 'business-land' ),
			'section'     => 'business_land_backto_top_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	// copyright section
	$wp_customize->add_section( 'business_land_copyright_section', 
		array( 'title'       => esc_html__( 'Copyright Option', 'business-land' ),
			   'priority'    => 600, 
			   'capability'  => 'edit_theme_options', 
			   'panel'       => 'theme_option_panel' 
		)
	);
	
	$wp_customize->add_setting( 'business_land_copyright_text', 
		array(	'capability'        => 'edit_theme_options',
  				'default'           => $default['business_land_copyright_text'],
  				'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control( 'business_land_copyright_text', 
		array(	'type'         => 'text',
	  			'section'      => 'business_land_copyright_section', // // Add a default or your own section
	  			'label'        => esc_html__( 'Copyright Text', 'business-land' )
		) 
	);
	
	// header section
	$wp_customize->add_section( 'business_land_pageloader_section', 
		array( 'title' => esc_html__( 'Page Loader Option', 'business-land' ),
			   'priority' => 700, 
			   'capability' => 'edit_theme_options', 
			   'panel' => 'theme_option_panel' 
		)
	);
	
	// sticky header setting.
	$wp_customize->add_setting( 'business_land_pageloader_status',
		array(
			'default'           => $default['business_land_pageloader_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'business_land_sanitize_checkbox',
		)
	);
	// sticky header control
	$wp_customize->add_control( 'business_land_pageloader_status',
		array(
			'label'       => esc_html__( 'Enable Page Loader', 'business-land' ),
			'section'     => 'business_land_pageloader_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	//page loader image
	$wp_customize->add_setting('business_land_pageloader_image',
		array(
			'default' 		=> $default['business_land_pageloader_image'],
			'transport'		=> 'refresh',
			'height'        => 300,
			'width'        => 300,
			'sanitize_callback' => 'esc_url_raw',
    ));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'business_land_pageloader_image', array(
        'label' 		=> __('Page Loader Image', 'business-land'),
		'description' 	=> 'maximum size 300x300',
        'section' 		=> 'business_land_pageloader_section',
        'settings' 		=> 'business_land_pageloader_image',
    )));
}
add_action( 'customize_register', 'business_land_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_land_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_land_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! function_exists( 'business_land_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.1
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function business_land_sanitize_select( $input, $setting ) {

		// Ensure input is clean.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

/**
 * @param bool $checked Whether the checkbox is checked.
 *
 * @return bool Whether the checkbox is checked.
 */
if( ! function_exists( 'business_land_sanitize_checkbox' ) ):
	
	function business_land_sanitize_checkbox( $checked ){
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
endif; 

if( ! function_exists( 'business_land_default_theme_options' ) ):
	
	function business_land_default_theme_options(){
		
		$defaults = array();
		
		$defaults['business_land_post_slider_status'] = false;
		
		$defaults['business_land_page_slider_status'] = false;
		
		$defaults['business_land_page_slider_excerpt'] = 20;
		
		$defaults['business_land_sticky_header_status'] = false;
		
		$defaults['business_land_breadcrumb_status'] = false;
		
		$defaults['business_land_blog_sidebar_sticky'] = false;
		
		$defaults['business_land_single_blog_sidebar_sticky'] = false;
		
		$defaults['business_land_archive_blog_sidebar_sticky'] = false;
		
		$defaults['business_land_backto_top_status'] = false;
		
		$defaults['business_land_copyright_text'] = esc_html__( 'Copyright &copy; All rights reserved.', 'business-land' );
		
		$defaults['business_land_pageloader_status'] = false;
		
		//page loader image
		$defaults['business_land_pageloader_image'] = get_template_directory_uri() . '/assets/images/loader.gif';
		
		return $defaults;
	}

endif;
/**
 * Get theme option.
 * @param string $key Option key.
 * @return mixed Option value.
 */
	 
if ( ! function_exists( 'business_land_get_option' ) ) :

	function business_land_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$value 			= '';

		$default 		= business_land_default_theme_options();

		$default_value 	= null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {

			$default_value = $default[ $key ];

		}

		if ( null !== $default_value ) {

			$value = get_theme_mod( $key, $default_value );

		}else {

			$value = get_theme_mod( $key );

		}

		return $value;

	}

endif;
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_land_customize_preview_js() {
	wp_enqueue_script( 'business-land-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_land_customize_preview_js' );
