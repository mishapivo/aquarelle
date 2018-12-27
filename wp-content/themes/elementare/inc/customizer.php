<?php
/**
 * Elementare Theme Customizer
 *
 * @package elementare
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elementare_customize_preview_js() {
	wp_enqueue_script( 'elementare-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'elementare_customize_preview_js' );

function elementare_customizer_script() {
	wp_enqueue_script( 'elementare-customizer-script', get_template_directory_uri() .'/js/customizer-script.js', array('jquery'),wp_get_theme()->get('Version'), true  );
	wp_enqueue_style( 'elementare-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css', array(), wp_get_theme()->get('Version'));	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css', array(), '4.7.0');
}
add_action( 'customize_controls_enqueue_scripts', 'elementare_customizer_script' );

/**
 * Delete font size style from tag cloud widget
 */
if( ! function_exists('elementare_fix_tag_cloud')){
	function elementare_fix_tag_cloud($tag_string){
	   return preg_replace('/ style=("|\')(.*?)("|\')/','',$tag_string);
	}
}
add_filter('wp_generate_tag_cloud', 'elementare_fix_tag_cloud',10,1);

/**
 * Replace Excerpt More
 */
if( ! function_exists('elementare_new_excerpt_more')){
	function elementare_new_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		$customMore = elementare_options('_excerpt_more', '&hellip;');
		return esc_html($customMore);
	}
}
add_filter('excerpt_more', 'elementare_new_excerpt_more');

/**
 * Custom Excerpt Length
 */
if( ! function_exists('elementare_custom_excerpt_length')){
	function elementare_custom_excerpt_length( $length ) {
		if ( ! is_admin() ) {
			$textBlog = elementare_options('_lenght_blog', '25');
			return intval($textBlog);
		} else {
			return $length;
		}
	}
}
add_filter( 'excerpt_length', 'elementare_custom_excerpt_length', 999 );

/**
 * Register Custom Settings
 */
function elementare_custom_settings_register( $wp_customize ) {
	/* Add Panels */
	$wp_customize->add_panel( 'cresta_elementare_themeoptions', array(
	 'priority'       => 50,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'title'          => esc_html__('Elementare Theme Options', 'elementare')
	) );
	$wp_customize->add_panel( 'cresta_elementare_onepage', array(
	 'priority'       => 50,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'active_callback' => 'elementare_is_one_page',
	  'title'    => esc_html__( 'Elementare Onepage', 'elementare' ),
	) );
	/* Add Sections Theme Options */
	$wp_customize->add_section( 'cresta_elementare_theme_options_general', array(
	     'title'    => esc_html__( 'General Settings', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_themeoptions',
	) );
	$wp_customize->add_section( 'cresta_elementare_theme_options_postpage', array(
	     'title'    => esc_html__( 'Posts and pages settings', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_themeoptions',
	) );
	$wp_customize->add_section( 'cresta_elementare_theme_options_colors', array(
	     'title'    => esc_html__( 'Theme Colors', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_themeoptions',
	) );
	$wp_customize->add_section( 'cresta_elementare_theme_options_social', array(
	     'title'    => esc_html__( 'Social Buttons', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_themeoptions',
	) );
	/* Add Sections OnePage */
	$wp_customize->add_section( 'cresta_elementare_onepage_section_settings', array(
	     'title'    => esc_html__( 'Onepage general settings', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_slider', array(
	     'title'    => esc_html__( 'Section slider', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_aboutus', array(
	     'title'    => esc_html__( 'Section about us', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_features', array(
	     'title'    => esc_html__( 'Section features', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_skills', array(
	     'title'    => esc_html__( 'Section skills', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_cta', array(
	     'title'    => esc_html__( 'Section call to action', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_services', array(
	     'title'    => esc_html__( 'Section services', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_blog', array(
	     'title'    => esc_html__( 'Section blog', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_team', array(
	     'title'    => esc_html__( 'Section team', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_onepage_section_contact', array(
	     'title'    => esc_html__( 'Section contact', 'elementare' ),
	     'priority' => 10,
		 'panel'  => 'cresta_elementare_onepage',
	) );
	$wp_customize->add_section( 'cresta_elementare_links', array(
	 'priority'       => 999,
	  'capability'     => 'edit_theme_options',
	  'title'          => esc_html__('Elementare useful links', 'elementare')
	) );
	/**
	* ################ SECTION GENERAL SETTINGS
	*/
	/* Show Page Loader */
	$wp_customize->add_setting('elementare_theme_options[_show_loader]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_show_loader]', array(
        'label'      => __( 'Display page loader', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_show_loader]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Show Search Button */
	$wp_customize->add_setting('elementare_theme_options[_search_button]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_search_button]', array(
        'label'      => __( 'Display search button in the header', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_search_button]',
        'type'       => 'checkbox',
		'priority' => 2,
    ) );
	/* Enable Smooth Scroll */
	$wp_customize->add_setting('elementare_theme_options[_smooth_scroll]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_smooth_scroll]', array(
        'label'      => __( 'Enable Smooth Scroll', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_smooth_scroll]',
        'type'       => 'checkbox',
		'priority' => 3,
    ) );
	/* Enable Animate Cursor */
	$wp_customize->add_setting('elementare_theme_options[_animate_cursor]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_animate_cursor]', array(
        'label'      => __( 'Enable Animate Cursor', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_animate_cursor]',
        'type'       => 'checkbox',
		'priority' => 3,
    ) );
	/* Scroll to top also in mobile */
	$wp_customize->add_setting('elementare_theme_options[_scroll_top]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_scroll_top]', array(
        'label'      => __( 'Show scroll to top button also on mobile view', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_scroll_top]',
        'type'       => 'checkbox',
		'priority' => 3,
    ) );
	/* Fixed main menu also on mobile view */
	$wp_customize->add_setting('elementare_theme_options[_menu_fixed_mobile]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_menu_fixed_mobile]', array(
        'label'      => __( 'Fixed main menu also on mobile view', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_menu_fixed_mobile]',
        'type'       => 'checkbox',
		'priority' => 3,
    ) );
	/* Custom Excerpt More */
	$wp_customize->add_setting('elementare_theme_options[_excerpt_more]', array(
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default'    => '&hellip;'
    ) );
	$wp_customize->add_control('elementare_theme_options[_excerpt_more]', array(
        'label'      => __( 'Custom Excerpt Final', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_excerpt_more]',
        'type'       => 'text',
		'priority' => 4,
    ) );
	/* Text lenght for blog */
	$wp_customize->add_setting('elementare_theme_options[_lenght_blog]', array(
        'default'    => '25',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
    ) );
	$wp_customize->add_control('elementare_theme_options[_lenght_blog]', array(
        'label'      => __( 'Text lenght for blog excerpt (number of words)', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_general',
        'settings'   => 'elementare_theme_options[_lenght_blog]',
        'type'       => 'number',
		'priority' => 5,
    ) );
	/**
	* ################ POSTS AND PAGES SETTINGS
	*/
	/* Show Scrool Down Button */
	$wp_customize->add_setting('elementare_theme_options[_scrolldown_button]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_scrolldown_button]', array(
        'label'      => __( 'Show the scroll down button', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_postpage',
        'settings'   => 'elementare_theme_options[_scrolldown_button]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Effect on featured image */
	$wp_customize->add_setting('elementare_theme_options[_effect_featimage]', array(
        'default'    => 'withZoom',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_select'
    ) );
	$wp_customize->add_control('elementare_theme_options[_effect_featimage]', array(
        'label'      => __( 'Scroll down effect on featured images', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_postpage',
        'settings'   => 'elementare_theme_options[_effect_featimage]',
        'type'       => 'select',
		'priority' => 2,
		'choices' => array(
			'none' => __( 'No effect', 'elementare'),
			'withZoom' => __( 'Zoom Effect', 'elementare'),
		),
    ) );
	/**
	* ################ SECTION THEME COLORS
	*/
	/* Main Border Section Color */
	$wp_customize->add_setting('elementare_theme_options[_heading_header]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_heading_header]',
		array(
			'settings'		=> 'elementare_theme_options[_heading_header]',
			'section'		=> 'cresta_elementare_theme_options_colors',
			'label'			=> __( 'Header Section', 'elementare' ),
			'priority' => 1,
		))
	);
	/* Content Section Color */
	$wp_customize->add_setting('elementare_theme_options[_heading_content]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_heading_content]',
		array(
			'settings'		=> 'elementare_theme_options[_heading_content]',
			'section'		=> 'cresta_elementare_theme_options_colors',
			'label'			=> __( 'Content Section', 'elementare' ),
			'priority' => 5,
		))
	);
	/* Sidebar Section Color */
	$wp_customize->add_setting('elementare_theme_options[_heading_sidebar]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_heading_sidebar]',
		array(
			'settings'		=> 'elementare_theme_options[_heading_sidebar]',
			'section'		=> 'cresta_elementare_theme_options_colors',
			'label'			=> __( 'Push Sidebar Section', 'elementare' ),
			'priority' => 11,
		))
	);
	/* Footer Section Color */
	$wp_customize->add_setting('elementare_theme_options[_heading_footer]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_heading_footer]',
		array(
			'settings'		=> 'elementare_theme_options[_heading_footer]',
			'section'		=> 'cresta_elementare_theme_options_colors',
			'label'			=> __( 'Footer Section', 'elementare' ),
			'priority' => 15,
		))
	);
	
	$colors = array();
	
	$colors[] = array(
	'slug'=>'_header_background_color', 
	'default' => '#13293d',
	'label' => __('Header Background Color', 'elementare'),
	'priority' => 2,
	);
	$colors[] = array(
	'slug'=>'_header_text_color', 
	'default' => '#fdfffc',
	'label' => __('Header Text Color', 'elementare'),
	'priority' => 3,
	);
	$colors[] = array(
	'slug'=>'_header_accent_color', 
	'default' => '#6ee004',
	'label' => __('Header Accent Color', 'elementare'),
	'priority' => 4,
	);
	$colors[] = array(
	'slug'=>'_content_background_color', 
	'default' => '#fdfffc',
	'label' => __('Content Background Color', 'elementare'),
	'priority' => 6,
	);
	$colors[] = array(
	'slug'=>'_content_text_color', 
	'default' => '#13293d',
	'label' => __('Content Text Color', 'elementare'),
	'priority' => 8,
	);
	$colors[] = array(
	'slug'=>'_content_accent_color', 
	'default' => '#6ee004',
	'label' => __('Content Accent Color', 'elementare'),
	'priority' => 9,
	);
	$colors[] = array(
	'slug'=>'_content_border_color', 
	'default' => '#d5d6d4',
	'label' => __('General Border Color', 'elementare'),
	'priority' => 10,
	);
	$colors[] = array(
	'slug'=>'_sidebar_background_color', 
	'default' => '#6ee004',
	'label' => __('Push sidebar first background color', 'elementare'),
	'priority' => 12,
	);
	$colors[] = array(
	'slug'=>'_sidebar_background_color_two', 
	'default' => '#00d0f9',
	'label' => __('Push sidebar second background color', 'elementare'),
	'priority' => 12,
	);
	$colors[] = array(
	'slug'=>'_sidebar_text_color', 
	'default' => '#13293d',
	'label' => __('Push sidebar text color', 'elementare'),
	'priority' => 13,
	);
	$colors[] = array(
	'slug'=>'_sidebar_accent_color', 
	'default' => '#008089',
	'label' => __('Push sidebar accent color', 'elementare'),
	'priority' => 14,
	);
	$colors[] = array(
	'slug'=>'_footer_background_color', 
	'default' => '#222222',
	'label' => __('Footer background color', 'elementare'),
	'priority' => 16,
	);
	$colors[] = array(
	'slug'=>'_footer_text_color', 
	'default' => '#afafaf',
	'label' => __('Footer text color', 'elementare'),
	'priority' => 17,
	);
	$colors[] = array(
	'slug'=>'_footer_accent_color', 
	'default' => '#e4e2e2',
	'label' => __('Footer accent color', 'elementare'),
	'priority' => 18,
	);
	foreach( $colors as $elementare_theme_options_colors ) {
		$wp_customize->add_setting(
			'elementare_theme_options[' . $elementare_theme_options_colors['slug'] . ']', array(
				'default' => $elementare_theme_options_colors['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'elementare_theme_options[' . $elementare_theme_options_colors['slug'] . ']', array(
					'label' => $elementare_theme_options_colors['label'], 
					'section' => 'cresta_elementare_theme_options_colors',
					'settings' =>'elementare_theme_options[' . $elementare_theme_options_colors['slug'] . ']',
					'priority' => $elementare_theme_options_colors['priority'],
				)
			)
		);
	}
	/**
	* ################ SECTION SOCIAL NETWORK
	*/	
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'_facebookurl', 
	'default' => '',
	'label' => __('Facebook URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_twitterurl', 
	'default' => '',
	'label' => __('Twitter URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_googleplusurl', 
	'default' => '',
	'label' => __('Google Plus URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_linkedinurl', 
	'default' => '',
	'label' => __('Linkedin URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_instagramurl', 
	'default' => '',
	'label' => __('Instagram URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_youtubeurl', 
	'default' => '',
	'label' => __('YouTube URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_pinteresturl', 
	'default' => '',
	'label' => __('Pinterest URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_tumblrurl', 
	'default' => '',
	'label' => __('Tumblr URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_flickrurl', 
	'default' => '',
	'label' => __('Flickr URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_vkurl', 
	'default' => '',
	'label' => __('VK URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_xingurl', 
	'default' => '',
	'label' => __('Xing URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_redditurl', 
	'default' => '',
	'label' => __('Reddit URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_vimeourl', 
	'default' => '',
	'label' => __('Vimeo URL', 'elementare')
	);
	$socialmedia[] = array(
	'slug'=>'_imdburl', 
	'default' => '',
	'label' => __('Imdb URL', 'elementare')
	);
	foreach( $socialmedia as $elementare_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'elementare_theme_options[' . $elementare_theme_options['slug']. ']', array(
				'default' => $elementare_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'option',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			'elementare_theme_options[' . $elementare_theme_options['slug']. ']', 
			array('label' => $elementare_theme_options['label'], 
			'section'    => 'cresta_elementare_theme_options_social',
			'settings' =>'elementare_theme_options[' . $elementare_theme_options['slug']. ']',
			)
		);
	}
	/* Open social links */
	$wp_customize->add_setting('elementare_theme_options[_social_open_links]', array(
        'default'    => '_self',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_select',
    ) );
	$wp_customize->add_control('elementare_theme_options[_social_open_links]', array(
        'label'      => __( 'Open social links', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_social',
        'settings'   => 'elementare_theme_options[_social_open_links]',
        'type'       => 'select',
		'priority' => 4,
		'choices' => array(
			'_self' => __( 'Same window', 'elementare'),
			'_blank' => __( 'New Window', 'elementare'),
		),
    ) );
	/* Show Social Network footer */
	$wp_customize->add_setting('elementare_theme_options[_social_footer]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_social_footer]', array(
        'label'      => __( 'Display social network in footer', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_social',
        'settings'   => 'elementare_theme_options[_social_footer]',
        'type'       => 'checkbox',
		'priority' => 5,
    ) );
	/* Show Social Network float */
	$wp_customize->add_setting('elementare_theme_options[_social_float]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_social_float]', array(
        'label'      => __( 'Display social network in float', 'elementare' ),
        'section'    => 'cresta_elementare_theme_options_social',
        'settings'   => 'elementare_theme_options[_social_float]',
        'type'       => 'checkbox',
		'priority' => 6,
    ) );
	/**
	* ################ ONEPAGE GENERAL SETTINGS
	*/
	/* One Page Map */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_sectionmaphead]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_settings_sectionmaphead]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_settings_sectionmaphead]',
			'section'		=> 'cresta_elementare_onepage_section_settings',
			'label'			=> __( 'One Page Map', 'elementare' ),
			'priority' => 1,
		))
	);
	/* One page section map */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_sectionmap]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_sectionmap]', array(
        'label'      => __( 'Show the one page section map', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_settings',
        'settings'   => 'elementare_theme_options[_onepage_settings_sectionmap]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Slider Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_slider]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_slider]', array(
		'label'      => __( 'Slider Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_slider]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* About us Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_aboutus]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_aboutus]', array(
		'label'      => __( 'About Us Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_aboutus]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* Features Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_features]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_features]', array(
		'label'      => __( 'Features Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_features]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* Skills Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_skills]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_skills]', array(
		'label'      => __( 'Skills Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_skills]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* CTA Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_cta]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_cta]', array(
		'label'      => __( 'CTA Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_cta]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* Services Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_services]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_services]', array(
		'label'      => __( 'Services Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_services]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* Blog Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_blog]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_blog]', array(
		'label'      => __( 'Blog Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_blog]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* Team Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_team]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_team]', array(
		'label'      => __( 'Team Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_team]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/* Contact Text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_settings_map_contact]', array(
		'default'    => '',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_settings_map_contact]', array(
		'label'      => __( 'Contact Text', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_settings',
		'settings'   => 'elementare_theme_options[_onepage_settings_map_contact]',
		'type'       => 'text',
		'active_callback' => 'elementare_is_sectionmap_active',
	) );
	/**
	* ################ SECTION SLIDER
	*/
	/* Show Slider Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_slider]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_slider]', array(
        'label'      => __( 'Display section slider', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_slider',
        'settings'   => 'elementare_theme_options[_onepage_section_slider]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_slider]', array(
        'default'    => 'slider',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_slider]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_slider',
        'settings'   => 'elementare_theme_options[_onepage_id_slider]',
		'active_callback' => 'elementare_is_slider_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Effect on slider */
	$wp_customize->add_setting('elementare_theme_options[_onepage_effect_slider]', array(
        'default'    => 'withZoom',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_select',
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_effect_slider]', array(
        'label'      => __( 'Scroll down effect on slider', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_slider',
        'settings'   => 'elementare_theme_options[_onepage_effect_slider]',
        'type'       => 'select',
		'active_callback' => 'elementare_is_slider_active',
		'priority' => 3,
		'choices' => array(
			'none' => __( 'No Effect', 'elementare'),
			'withZoom' => __( 'Zoom Effect', 'elementare'),
		),
    ) );
	/* Scroll down button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_scrolldown_slider]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_scrolldown_slider]', array(
        'label'      => __( 'Show scroll down button', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_slider',
        'settings'   => 'elementare_theme_options[_onepage_scrolldown_slider]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_slider_active',
		'priority' => 4,
    ) );
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_slider_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_slider_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_slider_background]',
			'section'		=> 'cresta_elementare_onepage_section_slider',
			'label'			=> __( 'Slider background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_slider_active',
			'priority' => 4,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_slider_first]', array(
		'default' => '#6ee004',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_slider_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_slider',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_slider_first]',
			'active_callback' => 'elementare_is_slider_active',
			'priority' => 4,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_slider_second]', array(
		'default' => '#00d0f9',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_slider_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_slider',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_slider_second]',
			'active_callback' => 'elementare_is_slider_active',
			'priority' => 4,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_slider_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_slider_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_slider_color]',
			'section'		=> 'cresta_elementare_onepage_section_slider',
			'label'			=> __( 'Slider text color', 'elementare' ),
			'active_callback' => 'elementare_is_slider_active',
			'priority' => 4,
		)
		)
	);
	/* Text Color Slider */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_slider]', array(
		'default' => '#fdfffc',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_slider]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_slider',
			'settings' =>'elementare_theme_options[_onepage_textcolor_slider]',
			'active_callback' => 'elementare_is_slider_active',
			'priority' => 4,
		) )
	);
	for( $number = 1; $number < ELEMENTARE_VALUE_FOR_SLIDER; $number++ ){
		/* Slider Text */
		$wp_customize->add_setting('elementare_theme_options[_onepage_head_'.$number.'_slider]', array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'       => 'option',
		));
		$wp_customize->add_control(
			new Elementare_Customize_Heading(
			$wp_customize,
			'elementare_theme_options[_onepage_head_'.$number.'_slider]',
			array(
				'settings'		=> 'elementare_theme_options[_onepage_head_'.$number.'_slider]',
				'section'		=> 'cresta_elementare_onepage_section_slider',
				'label'			=> __( 'Slider ', 'elementare' ).$number,
				'active_callback' => 'elementare_is_slider_active',
			))
		);
		/* Slide Image */
		$wp_customize->add_setting('elementare_theme_options[_onepage_image_'.$number.'_slider]', array(
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( 
			new WP_Customize_Image_Control(
			$wp_customize, 
			'elementare_theme_options[_onepage_image_'.$number.'_slider]', 
			array(
				'label'      => __( 'Slide image ', 'elementare' ).$number,
				'section'    => 'cresta_elementare_onepage_section_slider',
				'settings'   => 'elementare_theme_options[_onepage_image_'.$number.'_slider]',
				'active_callback' => 'elementare_is_slider_active',
			) ) 
		);
		/* Slide Text */
		$wp_customize->add_setting('elementare_theme_options[_onepage_text_'.$number.'_slider]', array(
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage'
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_text_'.$number.'_slider]', array(
			'label'      => __( 'Slider Text ', 'elementare' ).$number,
			'section'    => 'cresta_elementare_onepage_section_slider',
			'settings'   => 'elementare_theme_options[_onepage_text_'.$number.'_slider]',
			'type'       => 'text',
			'active_callback' => 'elementare_is_slider_active',
		) );
		/* Slide Subtext */
		$wp_customize->add_setting('elementare_theme_options[_onepage_subtext_'.$number.'_slider]', array(
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage'
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_subtext_'.$number.'_slider]', array(
			'label'      => __( 'Slider Subtext ', 'elementare' ).$number,
			'section'    => 'cresta_elementare_onepage_section_slider',
			'settings'   => 'elementare_theme_options[_onepage_subtext_'.$number.'_slider]',
			'type'       => 'text',
			'active_callback' => 'elementare_is_slider_active',
		) );
	}
	/* Info slider */
	$wp_customize->add_setting('elementare_theme_options[_onepage_info_slider]',array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Info_Text( 
		$wp_customize,
		'elementare_theme_options[_onepage_info_slider]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_info_slider]',
			'section'		=> 'cresta_elementare_onepage_section_slider',
			'label'			=> __( 'Note:', 'elementare' ),	
			'description'	=> __( 'Upload up to three sliders. Recommended image size: 1920X1080', 'elementare' ),
			'active_callback' => 'elementare_is_slider_active',
			'priority' => 18,
		))
	);
	/**
	* ################ SECTION ABOUT US
	*/
	/* Show About Us Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_aboutus]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_aboutus]', array(
        'label'      => __( 'Display section about us', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_aboutus',
        'settings'   => 'elementare_theme_options[_onepage_section_aboutus]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_aboutus]', array(
        'default'    => 'aboutus',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_aboutus]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_aboutus',
        'settings'   => 'elementare_theme_options[_onepage_id_aboutus]',
		'active_callback' => 'elementare_is_aboutus_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_aboutus_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_aboutus_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_aboutus_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_aboutus',
			'label'			=> __( 'About us background image', 'elementare' ),
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image About us */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_aboutus]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_aboutus]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_aboutus',
			'settings'   => 'elementare_theme_options[_onepage_imgback_aboutus]',
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_aboutus_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_aboutus_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_aboutus_background]',
			'section'		=> 'cresta_elementare_onepage_section_aboutus',
			'label'			=> __( 'About us background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 4,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_aboutus_first]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_aboutus_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_aboutus',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_aboutus_first]',
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 4,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_aboutus_second]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_aboutus_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_aboutus',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_aboutus_second]',
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 4,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_aboutus_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_aboutus_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_aboutus_color]',
			'section'		=> 'cresta_elementare_onepage_section_aboutus',
			'label'			=> __( 'About us text color', 'elementare' ),
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 4,
		)
		)
	);
	/* Text Color About us */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_aboutus]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_aboutus]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_aboutus',
			'settings' =>'elementare_theme_options[_onepage_textcolor_aboutus]',
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 4,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_aboutus_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_aboutus_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_aboutus_title]',
			'section'		=> 'cresta_elementare_onepage_section_aboutus',
			'label'			=> __( 'About us title and subtitle', 'elementare' ),
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 4,
		)
		)
	);
	/* About us title section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_title_aboutus]', array(
		'default'    => __( 'About Us', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_title_aboutus]', array(
        'label'      => __( 'Title', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_aboutus',
        'settings'   => 'elementare_theme_options[_onepage_title_aboutus]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_aboutus_active',
		'priority' => 6,
    ) );
	/* About us subtitle section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_subtitle_aboutus]', array(
		'default'    => __( 'Who We Are', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_subtitle_aboutus]', array(
        'label'      => __( 'Subtitle', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_aboutus',
        'settings'   => 'elementare_theme_options[_onepage_subtitle_aboutus]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_aboutus_active',
		'priority' => 7,
    ) );
	/* Show Title in background */
	$wp_customize->add_setting('elementare_theme_options[_onepage_showtitle_aboutus]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_showtitle_aboutus]', array(
        'label'      => __( 'Show section title in the background', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_aboutus',
        'settings'   => 'elementare_theme_options[_onepage_showtitle_aboutus]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_aboutus_active',
		'priority' => 7,
    ) );
	/* About us content */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_aboutus]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_aboutus]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_aboutus]',
			'section'		=> 'cresta_elementare_onepage_section_aboutus',
			'label'			=> __( 'About us content', 'elementare' ),
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 8,
		)
		)
	);
	/* Aboutus Dropdown pages */
	$wp_customize->add_setting('elementare_theme_options[_onepage_choosepage_aboutus]', array(
		'default'    => false,
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_choosepage_aboutus]', array(
		'label'      => __( 'Choose the page to display', 'elementare' ),
		'description'	=> __( 'Title, content and featured image will be used in the box', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_aboutus',
		'settings'   => 'elementare_theme_options[_onepage_choosepage_aboutus]',
		'type'       => 'dropdown-pages',
		'active_callback' => 'elementare_is_aboutus_active',
	) );
	/* About us button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_headbutton_aboutus]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_headbutton_aboutus]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_headbutton_aboutus]',
			'section'		=> 'cresta_elementare_onepage_section_aboutus',
			'label'			=> __( 'About us button', 'elementare' ),
			'active_callback' => 'elementare_is_aboutus_active',
			'priority' => 11,
		)
		)
	);
	/* About us text button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_textbutton_aboutus]', array(
		'default'    => __( 'More Information', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_textbutton_aboutus]', array(
        'label'      => __( 'Text Button', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_aboutus',
        'settings'   => 'elementare_theme_options[_onepage_textbutton_aboutus]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_aboutus_active',
		'priority' => 12,
    ) );
	/* About us link button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_linkbutton_aboutus]', array(
        'default'    => '#',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_linkbutton_aboutus]', array(
        'label'      => __( 'Link Button', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_aboutus',
        'settings'   => 'elementare_theme_options[_onepage_linkbutton_aboutus]',
        'type'       => 'url',
		'active_callback' => 'elementare_is_aboutus_active',
		'priority' => 13,
    ) );
	/**
	* ################ SECTION FEATURES
	*/
	/* Show Features Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_features]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_features]', array(
        'label'      => __( 'Display section features', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_features',
        'settings'   => 'elementare_theme_options[_onepage_section_features]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_features]', array(
        'default'    => 'features',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_features]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_features',
        'settings'   => 'elementare_theme_options[_onepage_id_features]',
		'active_callback' => 'elementare_is_features_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_features_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_features_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_features_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_features',
			'label'			=> __( 'About us background image', 'elementare' ),
			'active_callback' => 'elementare_is_features_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image Features */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_features]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_features]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_features',
			'settings'   => 'elementare_theme_options[_onepage_imgback_features]',
			'active_callback' => 'elementare_is_features_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_features_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_features_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_features_background]',
			'section'		=> 'cresta_elementare_onepage_section_features',
			'label'			=> __( 'Features background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_features_active',
			'priority' => 3,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_features_first]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_features_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_features',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_features_first]',
			'active_callback' => 'elementare_is_features_active',
			'priority' => 3,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_features_second]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_features_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_features',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_features_second]',
			'active_callback' => 'elementare_is_features_active',
			'priority' => 3,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_features_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_features_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_features_color]',
			'section'		=> 'cresta_elementare_onepage_section_features',
			'label'			=> __( 'About us text color', 'elementare' ),
			'active_callback' => 'elementare_is_features_active',
			'priority' => 4,
		)
		)
	);
	/* Text Color Features */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_features]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_features]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_features',
			'settings' =>'elementare_theme_options[_onepage_textcolor_features]',
			'active_callback' => 'elementare_is_features_active',
			'priority' => 5,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_features_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_features_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_features_title]',
			'section'		=> 'cresta_elementare_onepage_section_features',
			'label'			=> __( 'Features title, subtitle and options', 'elementare' ),
			'active_callback' => 'elementare_is_features_active',
			'priority' => 6,
		)
		)
	);
	/* Features title section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_title_features]', array(
		'default'    => __( 'Elements', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_title_features]', array(
        'label'      => __( 'Title', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_features',
        'settings'   => 'elementare_theme_options[_onepage_title_features]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_features_active',
		'priority' => 6,
    ) );
	/* Features subtitle section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_subtitle_features]', array(
		'default'    => __( 'Amazing Features', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_subtitle_features]', array(
        'label'      => __( 'Subtitle', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_features',
        'settings'   => 'elementare_theme_options[_onepage_subtitle_features]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_features_active',
		'priority' => 7,
    ) );
	/* Show Title in background */
	$wp_customize->add_setting('elementare_theme_options[_onepage_showtitle_features]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_showtitle_features]', array(
        'label'      => __( 'Show section title in the background', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_features',
        'settings'   => 'elementare_theme_options[_onepage_showtitle_features]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_features_active',
		'priority' => 7,
    ) );
	/* Text lenght for boxes */
	$wp_customize->add_setting('elementare_theme_options[_onepage_lenght_features]', array(
        'default'    => '20',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_lenght_features]', array(
        'label'      => __( 'Text lenght for boxes content (number of words)', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_features',
        'settings'   => 'elementare_theme_options[_onepage_lenght_features]',
        'type'       => 'number',
		'active_callback' => 'elementare_is_features_active',
		'priority' => 8,
    ) );
	/* Background Color Features Inner box */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_features_inner]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_features_inner]', 
		array(
			'label' => __( 'Background Color Inner box', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_features',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_features_inner]',
			'active_callback' => 'elementare_is_features_active',
			'priority' => 9,
		) )
	);
	/* Text Color Features Inner box */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_features_inner]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_features_inner]', 
		array(
			'label' => __( 'Text Color Inner box', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_features',
			'settings' =>'elementare_theme_options[_onepage_textcolor_features_inner]',
			'active_callback' => 'elementare_is_features_active',
			'priority' => 10,
		) )
	);
	/* How many boxes to display */
	$wp_customize->add_setting('elementare_theme_options[_onepage_manybox_features]', array(
        'default'    => '3',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_select',
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_manybox_features]', array(
        'label'      => __( 'How many boxes to display', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_features',
        'settings'   => 'elementare_theme_options[_onepage_manybox_features]',
        'type'       => 'select',
		'active_callback' => 'elementare_is_features_active',
		'priority' => 10,
		'choices' => array(
			'1' => __( '1', 'elementare'),
			'2' => __( '2', 'elementare'),
			'3' => __( '3', 'elementare'),
			'4' => __( '4', 'elementare'),
		),
    ) );
	for( $number = 1; $number < ELEMENTARE_VALUE_FOR_FEATURES; $number++ ){
		/* Box Title Description */
		$wp_customize->add_setting('elementare_theme_options[_onepage_head_'.$number.'_features]', array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'       => 'option',
		));
		$wp_customize->add_control(
			new Elementare_Customize_Heading(
			$wp_customize,
			'elementare_theme_options[_onepage_head_'.$number.'_features]',
			array(
				'settings'		=> 'elementare_theme_options[_onepage_head_'.$number.'_features]',
				'section'		=> 'cresta_elementare_onepage_section_features',
				'label'			=> __( 'Box number ', 'elementare' ).$number,
				'active_callback' => 'elementare_is_features_active',
			))
		);
		/* FontAwesome Icon */
		$wp_customize->add_setting('elementare_theme_options[_onepage_fontawesome_'.$number.'_features]', array(
			'default'			=> 'fa fa-bell',
			'sanitize_callback' => 'sanitize_text_field',
			'type'       => 'option',
		));
		$wp_customize->add_control(
			new Elementare_Fontawesome_Icon(
			$wp_customize,
			'elementare_theme_options[_onepage_fontawesome_'.$number.'_features]',
			array(
				'settings'		=> 'elementare_theme_options[_onepage_fontawesome_'.$number.'_features]',
				'section'		=> 'cresta_elementare_onepage_section_features',
				'label'			=> __( 'FontAwesome Icon', 'elementare' ),
				'type'       => 'icon',
				'active_callback' => 'elementare_is_features_active',
			))
		);
		/* Features Dropdown pages */
		$wp_customize->add_setting('elementare_theme_options[_onepage_choosepage_'.$number.'_features]', array(
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_choosepage_'.$number.'_features]', array(
			'label'      => __( 'Choose the page to display', 'elementare' ),
			'description'	=> __( 'Title and content (unformatted) will be used in the box', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_features',
			'settings'   => 'elementare_theme_options[_onepage_choosepage_'.$number.'_features]',
			'type'       => 'dropdown-pages',
			'active_callback' => 'elementare_is_features_active',
		) );
		/* Features text button */
		$wp_customize->add_setting('elementare_theme_options[_onepage_boxtextbutton_'.$number.'_features]', array(
			'default'    => __( 'More Information', 'elementare' ),
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage'
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_boxtextbutton_'.$number.'_features]', array(
			'label'      => __( 'Text Button ', 'elementare' ).$number,
			'section'    => 'cresta_elementare_onepage_section_features',
			'settings'   => 'elementare_theme_options[_onepage_boxtextbutton_'.$number.'_features]',
			'type'       => 'text',
			'active_callback' => 'elementare_is_features_active',
		) );
		/* Features link button */
		$wp_customize->add_setting('elementare_theme_options[_onepage_boxlinkbutton_'.$number.'_features]', array(
			'default'    => '#',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_boxlinkbutton_'.$number.'_features]', array(
			'label'      => __( 'Link Button ', 'elementare' ).$number,
			'section'    => 'cresta_elementare_onepage_section_features',
			'settings'   => 'elementare_theme_options[_onepage_boxlinkbutton_'.$number.'_features]',
			'type'       => 'url',
			'active_callback' => 'elementare_is_features_active',
		) );
	}
	/**
	* ################ SECTION SKILLS
	*/
	/* Show Skills Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_skills]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_skills]', array(
        'label'      => __( 'Display section skills', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_skills',
        'settings'   => 'elementare_theme_options[_onepage_section_skills]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_skills]', array(
        'default'    => 'skills',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_skills]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_skills',
        'settings'   => 'elementare_theme_options[_onepage_id_skills]',
		'active_callback' => 'elementare_is_skills_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_skills_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_skills_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_skills_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_skills',
			'label'			=> __( 'Skills background image', 'elementare' ),
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image Skills */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_skills]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_skills]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_skills',
			'settings'   => 'elementare_theme_options[_onepage_imgback_skills]',
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_skills_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_skills_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_skills_background]',
			'section'		=> 'cresta_elementare_onepage_section_skills',
			'label'			=> __( 'Skills background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 3,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_skills_first]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_skills_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_skills',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_skills_first]',
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 3,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_skills_second]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_skills_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_skills',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_skills_second]',
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 3,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_skills_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_skills_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_skills_color]',
			'section'		=> 'cresta_elementare_onepage_section_skills',
			'label'			=> __( 'Skills text color', 'elementare' ),
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 4,
		)
		)
	);
	/* Text Color Features */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_skills]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_skills]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_skills',
			'settings' =>'elementare_theme_options[_onepage_textcolor_skills]',
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 5,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_skills_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_skills_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_skills_title]',
			'section'		=> 'cresta_elementare_onepage_section_skills',
			'label'			=> __( 'Skills title and subtitle', 'elementare' ),
			'active_callback' => 'elementare_is_skills_active',
			'priority' => 5,
		)
		)
	);
	/* Features title section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_title_skills]', array(
		'default'    => __( 'Our Skills', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_title_skills]', array(
        'label'      => __( 'Title', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_skills',
        'settings'   => 'elementare_theme_options[_onepage_title_skills]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_skills_active',
		'priority' => 6,
    ) );
	/* Features subtitle section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_subtitle_skills]', array(
		'default'    => __( 'What We Do', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_subtitle_skills]', array(
        'label'      => __( 'Subtitle', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_skills',
        'settings'   => 'elementare_theme_options[_onepage_subtitle_skills]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_skills_active',
		'priority' => 7,
    ) );
	/* Show Title in background */
	$wp_customize->add_setting('elementare_theme_options[_onepage_showtitle_skills]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_showtitle_skills]', array(
        'label'      => __( 'Show section title in the background', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_skills',
        'settings'   => 'elementare_theme_options[_onepage_showtitle_skills]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_skills_active',
		'priority' => 7,
    ) );
	for( $number = 1; $number < ELEMENTARE_VALUE_FOR_SKILLS; $number++ ){
		/* Box Title Description */
		$wp_customize->add_setting('elementare_theme_options[_onepage_head_'.$number.'_skills]', array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'       => 'option',
		));
		$wp_customize->add_control(
			new Elementare_Customize_Heading(
			$wp_customize,
			'elementare_theme_options[_onepage_head_'.$number.'_skills]',
			array(
				'settings'		=> 'elementare_theme_options[_onepage_head_'.$number.'_skills]',
				'section'		=> 'cresta_elementare_onepage_section_skills',
				'label'			=> __( 'Skill number ', 'elementare' ).$number,
				'active_callback' => 'elementare_is_skills_active',
			))
		);
		/* Skill Name */
		$wp_customize->add_setting('elementare_theme_options[_onepage_skillname_'.$number.'_skills]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_skillname_'.$number.'_skills]', array(
			'label'      => __( 'Skill name', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_skills',
			'settings'   => 'elementare_theme_options[_onepage_skillname_'.$number.'_skills]',
			'active_callback' => 'elementare_is_skills_active',
			'type'       => 'text',
		) );
		/* Skill Value */
		$wp_customize->add_setting('elementare_theme_options[_onepage_skillvalue_'.$number.'_skills]', array(
			'default'    => '0',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_skillvalue_'.$number.'_skills]', array(
			'label'      => __( 'Skill value', 'elementare' ),
			'description'	=> __( 'Enter a value between 0 and 100', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_skills',
			'settings'   => 'elementare_theme_options[_onepage_skillvalue_'.$number.'_skills]',
			'active_callback' => 'elementare_is_skills_active',
			'type'       => 'number',
		) );
	}
	/**
	* ################ SECTION CALL TO ACTION
	*/
	/* Show Cta Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_cta]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_cta]', array(
        'label'      => __( 'Display section call to action', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_cta',
        'settings'   => 'elementare_theme_options[_onepage_section_cta]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_cta]', array(
        'default'    => 'cta',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_cta]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_cta',
        'settings'   => 'elementare_theme_options[_onepage_id_cta]',
		'active_callback' => 'elementare_is_cta_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_cta_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_cta_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_cta_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_cta',
			'label'			=> __( 'CTA background image', 'elementare' ),
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image Cta */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_cta]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_cta]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_cta',
			'settings'   => 'elementare_theme_options[_onepage_imgback_cta]',
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_cta_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_cta_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_cta_background]',
			'section'		=> 'cresta_elementare_onepage_section_cta',
			'label'			=> __( 'CTA background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 3,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_cta_first]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_cta_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_cta',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_cta_first]',
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 3,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_cta_second]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_cta_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_cta',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_cta_second]',
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 3,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_cta_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_cta_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_cta_color]',
			'section'		=> 'cresta_elementare_onepage_section_cta',
			'label'			=> __( 'CTA text color', 'elementare' ),
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 4,
		)
		)
	);
	/* Text Color Cta */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_cta]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_cta]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_cta',
			'settings' =>'elementare_theme_options[_onepage_textcolor_cta]',
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 5,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_cta_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_cta_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_cta_title]',
			'section'		=> 'cresta_elementare_onepage_section_cta',
			'label'			=> __( 'CTA title, subtitle and options', 'elementare' ),
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 5,
		)
		)
	);
	/* FontAwesome Icon */
	$wp_customize->add_setting('elementare_theme_options[_onepage_fontawesome_cta]', array(
		'default'			=> 'fa fa-flash',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option', 
	));
	$wp_customize->add_control(
		new Elementare_Fontawesome_Icon(
		$wp_customize,
		'elementare_theme_options[_onepage_fontawesome_cta]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_fontawesome_cta]',
			'section'		=> 'cresta_elementare_onepage_section_cta',
			'label'			=> __( 'FontAwesome Icon', 'elementare' ),
			'type'       => 'icon',
			'active_callback' => 'elementare_is_cta_active',
			'priority' => 6,
		))
	);
	/* Call to action phrase */
	$wp_customize->add_setting('elementare_theme_options[_onepage_phrase_cta]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_text',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_phrase_cta]', array(
        'label'      => __( 'Call to action phrase', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_cta',
        'settings'   => 'elementare_theme_options[_onepage_phrase_cta]',
		'active_callback' => 'elementare_is_cta_active',
        'type'       => 'text',
		'priority' => 7,
    ) );
	/* Call to action description */
	$wp_customize->add_setting('elementare_theme_options[_onepage_desc_cta]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_text',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_desc_cta]', array(
        'label'      => __( 'Call to action description', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_cta',
        'settings'   => 'elementare_theme_options[_onepage_desc_cta]',
		'active_callback' => 'elementare_is_cta_active',
        'type'       => 'text',
		'priority' => 8,
    ) );
	/* Call to action text button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_textbutton_cta]', array(
		'default'    => __( 'More Information', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_textbutton_cta]', array(
        'label'      => __( 'Text Button', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_cta',
        'settings'   => 'elementare_theme_options[_onepage_textbutton_cta]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_cta_active',
		'priority' => 9,
    ) );
	/* Call to action link button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_urlbutton_cta]', array(
        'default'    => '#',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_urlbutton_cta]', array(
        'label'      => __( 'Link Button', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_cta',
        'settings'   => 'elementare_theme_options[_onepage_urlbutton_cta]',
        'type'       => 'url',
		'active_callback' => 'elementare_is_cta_active',
		'priority' => 10,
    ) );
	/* Open the link in */
	$wp_customize->add_setting('elementare_theme_options[_onepage_openurl_cta]', array(
        'default'    => '_blank',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_select',
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_openurl_cta]', array(
        'label'      => __( 'Open the link in', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_cta',
        'settings'   => 'elementare_theme_options[_onepage_openurl_cta]',
        'type'       => 'select',
		'active_callback' => 'elementare_is_cta_active',
		'priority' => 11,
		'choices' => array(
			'_self' => __( 'Same window', 'elementare'),
			'_blank' => __( 'New window', 'elementare'),
		),
    ) );
	/**
	* ################ SECTION SERVICES
	*/
	/* Show Services Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_services]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_services]', array(
        'label'      => __( 'Display section services', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_section_services]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_services]', array(
        'default'    => 'services',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_services]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_id_services]',
		'active_callback' => 'elementare_is_services_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_services_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_services_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_services_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_services',
			'label'			=> __( 'Services background image', 'elementare' ),
			'active_callback' => 'elementare_is_services_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image Services */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_services]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_services]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_services',
			'settings'   => 'elementare_theme_options[_onepage_imgback_services]',
			'active_callback' => 'elementare_is_services_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_services_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_services_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_services_background]',
			'section'		=> 'cresta_elementare_onepage_section_services',
			'label'			=> __( 'Services background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_services_active',
			'priority' => 3,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_services_first]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_services_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_services',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_services_first]',
			'active_callback' => 'elementare_is_services_active',
			'priority' => 3,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_services_second]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_services_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_services',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_services_second]',
			'active_callback' => 'elementare_is_services_active',
			'priority' => 3,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_services_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_services_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_services_color]',
			'section'		=> 'cresta_elementare_onepage_section_services',
			'label'			=> __( 'Services text color', 'elementare' ),
			'active_callback' => 'elementare_is_services_active',
			'priority' => 4,
		)
		)
	);
	/* Text Color Services */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_services]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_services]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_services',
			'settings' =>'elementare_theme_options[_onepage_textcolor_services]',
			'active_callback' => 'elementare_is_services_active',
			'priority' => 4,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_services_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_services_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_services_title]',
			'section'		=> 'cresta_elementare_onepage_section_services',
			'label'			=> __( 'Services title, subtitle and options', 'elementare' ),
			'active_callback' => 'elementare_is_services_active',
			'priority' => 5,
		)
		)
	);
	/* Services title section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_title_services]', array(
		'default'    => __( 'Services', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_title_services]', array(
        'label'      => __( 'Title', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_title_services]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_services_active',
		'priority' => 6,
    ) );
	/* Services subtitle section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_subtitle_services]', array(
		'default'    => __( 'What We Offer', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_subtitle_services]', array(
        'label'      => __( 'Subtitle', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_subtitle_services]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_services_active',
		'priority' => 7,
    ) );
	/* Show Title in background */
	$wp_customize->add_setting('elementare_theme_options[_onepage_showtitle_services]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_showtitle_services]', array(
        'label'      => __( 'Show section title in the background', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_showtitle_services]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_services_active',
		'priority' => 7,
    ) );
	/* Text lenght for services */
	$wp_customize->add_setting('elementare_theme_options[_onepage_lenght_services]', array(
        'default'    => '30',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_lenght_services]', array(
        'label'      => __( 'Text lenght for boxes content (number of words)', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_lenght_services]',
        'type'       => 'number',
		'active_callback' => 'elementare_is_services_active',
		'priority' => 9,
    ) );
	for( $number = 1; $number < ELEMENTARE_VALUE_FOR_SERVICES; $number++ ){
		/* Box Title Description */
		$wp_customize->add_setting('elementare_theme_options[_onepage_head_'.$number.'_services]', array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'       => 'option',
		));
		$wp_customize->add_control(
			new Elementare_Customize_Heading(
			$wp_customize,
			'elementare_theme_options[_onepage_head_'.$number.'_services]',
			array(
				'settings'		=> 'elementare_theme_options[_onepage_head_'.$number.'_services]',
				'section'		=> 'cresta_elementare_onepage_section_services',
				'label'			=> __( 'Service number ', 'elementare' ).$number,
				'active_callback' => 'elementare_is_services_active',
			))
		);
		/* FontAwesome Icon */
		$wp_customize->add_setting('elementare_theme_options[_onepage_fontawesome_'.$number.'_services]', array(
			'default'			=> 'fa fa-bell',
			'sanitize_callback' => 'sanitize_text_field',
			'type'       => 'option',
		));
		$wp_customize->add_control(
			new Elementare_Fontawesome_Icon(
			$wp_customize,
			'elementare_theme_options[_onepage_fontawesome_'.$number.'_services]',
			array(
				'settings'		=> 'elementare_theme_options[_onepage_fontawesome_'.$number.'_services]',
				'section'		=> 'cresta_elementare_onepage_section_services',
				'label'			=> __( 'FontAwesome Icon', 'elementare' ),
				'type'       => 'icon',
				'active_callback' => 'elementare_is_services_active',
			))
		);
		/* Services Dropdown pages */
		$wp_customize->add_setting('elementare_theme_options[_onepage_choosepage_'.$number.'_services]', array(
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_choosepage_'.$number.'_services]', array(
			'label'      => __( 'Choose the page to display', 'elementare' ),
			'description'	=> __( 'Title and content (unformatted) will be used in the box', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_services',
			'settings'   => 'elementare_theme_options[_onepage_choosepage_'.$number.'_services]',
			'type'       => 'dropdown-pages',
			'active_callback' => 'elementare_is_services_active',
		) );
	}
	/* Services text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_headtext_services]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_headtext_services]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_headtext_services]',
			'section'		=> 'cresta_elementare_onepage_section_services',
			'label'			=> __( 'Services text', 'elementare' ),
			'active_callback' => 'elementare_is_services_active',
			'priority' => 15,
		))
	);
	/* Services phrase section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_phrase_services]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_phrase_services]', array(
        'label'      => __( 'Phrase', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_phrase_services]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_services_active',
		'priority' => 16,
    ) );
	/* Services textarea section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_textarea_services]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_text',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_textarea_services]', array(
        'label'      => __( 'Textarea', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_services',
        'settings'   => 'elementare_theme_options[_onepage_textarea_services]',
        'type'       => 'textarea',
		'active_callback' => 'elementare_is_services_active',
		'priority' => 17,
    ) );
	/* Services image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_headimage_services]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_headimage_services]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_headimage_services]',
			'section'		=> 'cresta_elementare_onepage_section_services',
			'label'			=> __( 'Services image', 'elementare' ),
			'active_callback' => 'elementare_is_services_active',
			'priority' => 18,
		)
		)
	);
	/* Upload Image Services */
	$wp_customize->add_setting('elementare_theme_options[_onepage_servimage_services]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_servimage_services]', 
		array(
			'label'      => __( 'Upload Image', 'elementare' ),
			'description'	=> __( 'Recommended image size: 1000X600px.', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_services',
			'settings'   => 'elementare_theme_options[_onepage_servimage_services]',
			'active_callback' => 'elementare_is_services_active',
			'priority' => 19,
		) ) 
	);
	/**
	* ################ SECTION BLOG
	*/
	/* Show Blog Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_blog]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_blog]', array(
        'label'      => __( 'Display section blog', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_blog',
        'settings'   => 'elementare_theme_options[_onepage_section_blog]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_blog]', array(
        'default'    => 'blog',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_blog]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_blog',
        'settings'   => 'elementare_theme_options[_onepage_id_blog]',
		'active_callback' => 'elementare_is_blog_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_blog_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_blog_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_blog_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_blog',
			'label'			=> __( 'Blog background image', 'elementare' ),
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image Blog */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_blog]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_blog]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_blog',
			'settings'   => 'elementare_theme_options[_onepage_imgback_blog]',
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_blog_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_blog_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_blog_background]',
			'section'		=> 'cresta_elementare_onepage_section_blog',
			'label'			=> __( 'Blog background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 3,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_blog_first]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_blog_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_blog',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_blog_first]',
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 4,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_blog_second]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_blog_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_blog',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_blog_second]',
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 4,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_blog_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_blog_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_blog_color]',
			'section'		=> 'cresta_elementare_onepage_section_blog',
			'label'			=> __( 'Blog text color', 'elementare' ),
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 5,
		)
		)
	);
	/* Text Color Blog */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_blog]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_blog]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_blog',
			'settings' =>'elementare_theme_options[_onepage_textcolor_blog]',
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 5,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_blog_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_blog_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_blog_title]',
			'section'		=> 'cresta_elementare_onepage_section_blog',
			'label'			=> __( 'Blog title, subtitle and options', 'elementare' ),
			'active_callback' => 'elementare_is_blog_active',
			'priority' => 6,
		)
		)
	);
	/* Blog title section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_title_blog]', array(
		'default'    => __( 'News', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_title_blog]', array(
        'label'      => __( 'Title', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_blog',
        'settings'   => 'elementare_theme_options[_onepage_title_blog]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_blog_active',
		'priority' => 6,
    ) );
	/* Blog subtitle section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_subtitle_blog]', array(
		'default'    => __( 'Latest Posts', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_subtitle_blog]', array(
        'label'      => __( 'Subtitle', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_blog',
        'settings'   => 'elementare_theme_options[_onepage_subtitle_blog]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_blog_active',
		'priority' => 7,
    ) );
	/* Show Title in background */
	$wp_customize->add_setting('elementare_theme_options[_onepage_showtitle_blog]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_showtitle_blog]', array(
        'label'      => __( 'Show section title in the background', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_blog',
        'settings'   => 'elementare_theme_options[_onepage_showtitle_blog]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_blog_active',
		'priority' => 7,
    ) );
	/* Number of posts to show */
	$wp_customize->add_setting('elementare_theme_options[_onepage_noposts_blog]', array(
		'default'    => '3',
		'type'       => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control('elementare_theme_options[_onepage_noposts_blog]', array(
		'label'      => __( 'Number of posts to show', 'elementare' ),
		'section'    => 'cresta_elementare_onepage_section_blog',
		'settings'   => 'elementare_theme_options[_onepage_noposts_blog]',
		'active_callback' => 'elementare_is_blog_active',
		'type'       => 'number',
		'priority' => 8,
	) );
	/* Text Blog Button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_textbutton_blog]', array(
		'default'    => __( 'Go to the blog!', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_textbutton_blog]', array(
        'label'      => __( 'Text blog button', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_blog',
        'settings'   => 'elementare_theme_options[_onepage_textbutton_blog]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_blog_active',
		'priority' => 9,
    ) );
	/* Link blog button */
	$wp_customize->add_setting('elementare_theme_options[_onepage_linkbutton_blog]', array(
        'default'    => '#',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_linkbutton_blog]', array(
        'label'      => __( 'Link Blog Button', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_blog',
        'settings'   => 'elementare_theme_options[_onepage_linkbutton_blog]',
        'type'       => 'url',
		'active_callback' => 'elementare_is_blog_active',
		'priority' => 10,
    ) );
	/**
	* ################ SECTION TEAM
	*/
	/* Show Team Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_team]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_team]', array(
        'label'      => __( 'Display section team', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_team',
        'settings'   => 'elementare_theme_options[_onepage_section_team]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_team]', array(
        'default'    => 'team',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_team]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_team',
        'settings'   => 'elementare_theme_options[_onepage_id_team]',
		'active_callback' => 'elementare_is_team_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_team_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_team_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_team_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_team',
			'label'			=> __( 'Team background image', 'elementare' ),
			'active_callback' => 'elementare_is_team_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image Team */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_team]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_team]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_team',
			'settings'   => 'elementare_theme_options[_onepage_imgback_team]',
			'active_callback' => 'elementare_is_team_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_team_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_team_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_team_background]',
			'section'		=> 'cresta_elementare_onepage_section_team',
			'label'			=> __( 'Team background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_team_active',
			'priority' => 3,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_team_first]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_team_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_team',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_team_first]',
			'active_callback' => 'elementare_is_team_active',
			'priority' => 4,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_team_second]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_team_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_team',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_team_second]',
			'active_callback' => 'elementare_is_team_active',
			'priority' => 4,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_team_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_team_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_team_color]',
			'section'		=> 'cresta_elementare_onepage_section_team',
			'label'			=> __( 'Team text color', 'elementare' ),
			'active_callback' => 'elementare_is_team_active',
			'priority' => 5,
		)
		)
	);
	/* Text Color Blog */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_team]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_team]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_team',
			'settings' =>'elementare_theme_options[_onepage_textcolor_team]',
			'active_callback' => 'elementare_is_team_active',
			'priority' => 5,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_team_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_team_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_team_title]',
			'section'		=> 'cresta_elementare_onepage_section_team',
			'label'			=> __( 'Team title, subtitle and options', 'elementare' ),
			'active_callback' => 'elementare_is_team_active',
			'priority' => 6,
		)
		)
	);
	/* Team title section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_title_team]', array(
		'default'    => __( 'Our Team', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_title_team]', array(
        'label'      => __( 'Title', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_team',
        'settings'   => 'elementare_theme_options[_onepage_title_team]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_team_active',
		'priority' => 6,
    ) );
	/* Team subtitle section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_subtitle_team]', array(
		'default'    => __( 'Nice to meet you', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_subtitle_team]', array(
        'label'      => __( 'Subtitle', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_team',
        'settings'   => 'elementare_theme_options[_onepage_subtitle_team]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_team_active',
		'priority' => 7,
    ) );
	/* Show Title in background */
	$wp_customize->add_setting('elementare_theme_options[_onepage_showtitle_team]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_showtitle_team]', array(
        'label'      => __( 'Show section title in the background', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_team',
        'settings'   => 'elementare_theme_options[_onepage_showtitle_team]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_team_active',
		'priority' => 7,
    ) );
	/* Text lenght for team */
	$wp_customize->add_setting('elementare_theme_options[_onepage_lenght_team]', array(
        'default'    => '50',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_lenght_team]', array(
        'label'      => __( 'Text lenght for team content (number of words)', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_team',
        'settings'   => 'elementare_theme_options[_onepage_lenght_team]',
        'type'       => 'number',
		'active_callback' => 'elementare_is_team_active',
		'priority' => 7,
    ) );
	for( $number = 1; $number < ELEMENTARE_VALUE_FOR_TEAM; $number++ ){
		/* Box Title Description */
		$wp_customize->add_setting('elementare_theme_options[_onepage_head_'.$number.'_team]', array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'       => 'option',
		));
		$wp_customize->add_control(
			new Elementare_Customize_Heading(
			$wp_customize,
			'elementare_theme_options[_onepage_head_'.$number.'_team]',
			array(
				'settings'		=> 'elementare_theme_options[_onepage_head_'.$number.'_team]',
				'section'		=> 'cresta_elementare_onepage_section_team',
				'label'			=> __( 'Person number ', 'elementare' ).$number,
				'active_callback' => 'elementare_is_team_active',
			))
		);
		/* Team Dropdown pages */
		$wp_customize->add_setting('elementare_theme_options[_onepage_choosepage_'.$number.'_team]', array(
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control('elementare_theme_options[_onepage_choosepage_'.$number.'_team]', array(
			'label'      => __( 'Choose the page to display', 'elementare' ),
			'description'	=> __( 'Featured Image, title and content will be used in the box', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_team',
			'settings'   => 'elementare_theme_options[_onepage_choosepage_'.$number.'_team]',
			'type'       => 'dropdown-pages',
			'active_callback' => 'elementare_is_team_active',
		) );
	}
	/**
	* ################ SECTION CONTACT
	*/
	/* Show Contact Section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_section_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_section_contact]', array(
        'label'      => __( 'Display section contact', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_section_contact]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Section ID */
	$wp_customize->add_setting('elementare_theme_options[_onepage_id_contact]', array(
        'default'    => 'contact',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_id_contact]', array(
        'label'      => __( 'Section ID name', 'elementare' ),
		'description'	=> __( 'ID for this section - if you want the user to be able to scroll down to this section.', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_id_contact]',
		'active_callback' => 'elementare_is_contact_active',
        'type'       => 'text',
		'priority' => 2,
    ) );
	/* Header background image */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_contact_bkimage]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_contact_bkimage]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_contact_bkimage]',
			'section'		=> 'cresta_elementare_onepage_section_contact',
			'label'			=> __( 'Contact background image', 'elementare' ),
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 2,
		)
		)
	);
	/* Background Image Contact */
	$wp_customize->add_setting('elementare_theme_options[_onepage_imgback_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
		$wp_customize, 
		'elementare_theme_options[_onepage_imgback_contact]', 
		array(
			'label'      => __( 'Background Image Section (optional)', 'elementare' ),
			'section'    => 'cresta_elementare_onepage_section_contact',
			'settings'   => 'elementare_theme_options[_onepage_imgback_contact]',
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 3,
		) ) 
	);
	/* Header background color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_contact_background]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_contact_background]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_contact_background]',
			'section'		=> 'cresta_elementare_onepage_section_contact',
			'label'			=> __( 'Contact background color', 'elementare' ),
			'description'	=> __( 'Use the same background color in both boxes if you do not want to use a gradient background.', 'elementare' ),
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 3,
		)
		)
	);
	/* First Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_contact_first]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_contact_first]', 
		array(
			'label' => __( 'First Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_contact',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_contact_first]',
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 4,
		) )
	);
	/* Second Color */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_contact_second]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_contact_second]', 
		array(
			'label' => __( 'Second Background Color', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_contact',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_contact_second]',
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 4,
		) )
	);
	/* Header text color */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_contact_color]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_contact_color]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_contact_color]',
			'section'		=> 'cresta_elementare_onepage_section_contact',
			'label'			=> __( 'Contact text color', 'elementare' ),
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 5,
		)
		)
	);
	/* Text Color Contact */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_contact]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_contact]', 
		array(
			'label' => __( 'Text Color Section', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_contact',
			'settings' =>'elementare_theme_options[_onepage_textcolor_contact]',
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 5,
		) )
	);
	/* Header title, subtitle and options */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_contact_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_contact_title]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_contact_title]',
			'section'		=> 'cresta_elementare_onepage_section_contact',
			'label'			=> __( 'Contact title and subtitle', 'elementare' ),
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 6,
		)
		)
	);
	/* Contact title section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_title_contact]', array(
		'default'    => __( 'Contact Us', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_title_contact]', array(
        'label'      => __( 'Title', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_title_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 6,
    ) );
	/* Contact subtitle section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_subtitle_contact]', array(
		'default'    => __( 'Get in touch', 'elementare' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_subtitle_contact]', array(
        'label'      => __( 'Subtitle', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_subtitle_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 7,
    ) );
	/* Show Title in background */
	$wp_customize->add_setting('elementare_theme_options[_onepage_showtitle_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_showtitle_contact]', array(
        'label'      => __( 'Show section title in the background', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_showtitle_contact]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 7,
    ) );
	/* Contact text */
	$wp_customize->add_setting('elementare_theme_options[_onepage_head_contact]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Customize_Heading(
		$wp_customize,
		'elementare_theme_options[_onepage_head_contact]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_head_contact]',
			'section'		=> 'cresta_elementare_onepage_section_contact',
			'label'			=> __( 'Contact fields', 'elementare' ),
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 8,
		))
	);
	/* Contact company additional text section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_additionaltext_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_text',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_additionaltext_contact]', array(
        'label'      => __( 'Additional Text', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_additionaltext_contact]',
        'type'       => 'textarea',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 9,
    ) );
	/* Contact company name section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyname_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyname_contact]', array(
        'label'      => __( 'Company Name', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyname_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 10,
    ) );
	/* Contact company address line 1 section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyaddress1_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyaddress1_contact]', array(
        'label'      => __( 'Address line 1', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyaddress1_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 11,
    ) );
	/* Contact company address line 2 section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyaddress2_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyaddress2_contact]', array(
        'label'      => __( 'Address line 2', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyaddress2_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 12,
    ) );
	/* Contact company address line 3 section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyaddress3_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyaddress3_contact]', array(
        'label'      => __( 'Address line 3', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyaddress3_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 13,
    ) );
	/* Contact company phone number section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyphone_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyphone_contact]', array(
        'label'      => __( 'Phone Number', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyphone_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 14,
    ) );
	/* Make phone number clickable */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyphone_contact_link]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyphone_contact_link]', array(
        'label'      => __( 'Make phone number clickable', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyphone_contact_link]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 14,
    ) );
	/* Contact company fax number section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyfax_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyfax_contact]', array(
        'label'      => __( 'Fax Number', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyfax_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 15,
    ) );
	/* Contact company email address section */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyemail_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_email',
		'transport' => 'postMessage'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyemail_contact]', array(
        'label'      => __( 'Email Address', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyemail_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 16,
    ) );
	/* Make email clickable */
	$wp_customize->add_setting('elementare_theme_options[_onepage_companyemail_contact_link]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'elementare_sanitize_checkbox'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_companyemail_contact_link]', array(
        'label'      => __( 'Make email clickable', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_companyemail_contact_link]',
        'type'       => 'checkbox',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 16,
    ) );
	/* Contact Form Shortcode */
	$wp_customize->add_setting('elementare_theme_options[_onepage_shortcode_contact]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
    ) );
	$wp_customize->add_control('elementare_theme_options[_onepage_shortcode_contact]', array(
        'label'      => __( 'Contact Form Shortcode', 'elementare' ),
		'description'	=> wp_kses_post( 'Paste the contact form shortcode. For example the Contact Form 7 plugin shortcode: <code>[contact-form-7 id="xxx" title="Contact form 1"]</code>', 'elementare' ),
        'section'    => 'cresta_elementare_onepage_section_contact',
        'settings'   => 'elementare_theme_options[_onepage_shortcode_contact]',
        'type'       => 'text',
		'active_callback' => 'elementare_is_contact_active',
		'priority' => 17,
    ) );
	/* Background Color Contact Form */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_imgcolor_contact_form]', array(
		'default' => '#f5f5f5',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_imgcolor_contact_form]', 
		array(
			'label' => __( 'Background Color Contact Form', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_contact',
			'settings' =>'elementare_theme_options[_onepage_imgcolor_contact_form]',
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 17,
		) )
	);
	/* Text Color Contact Form */
	$wp_customize->add_setting( 'elementare_theme_options[_onepage_textcolor_contact_form]', array(
		'default' => '#121212',
		'type' => 'option', 
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
		'elementare_theme_options[_onepage_textcolor_contact_form]', 
		array(
			'label' => __( 'Text Color Contact Form', 'elementare' ),
			'section' => 'cresta_elementare_onepage_section_contact',
			'settings' =>'elementare_theme_options[_onepage_textcolor_contact_form]',
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 17,
		) )
	);
	/* Big Icon Contact */
	$wp_customize->add_setting('elementare_theme_options[_onepage_icon_contact]', array(
		'default'			=> 'fa fa-envelope',
		'sanitize_callback' => 'sanitize_text_field',
		'type'       => 'option',
	));
	$wp_customize->add_control(
		new Elementare_Fontawesome_Icon(
		$wp_customize,
		'elementare_theme_options[_onepage_icon_contact]',
		array(
			'settings'		=> 'elementare_theme_options[_onepage_icon_contact]',
			'section'		=> 'cresta_elementare_onepage_section_contact',
			'label'			=> __( 'FontAwesome Icon', 'elementare' ),
			'type'       => 'icon',
			'active_callback' => 'elementare_is_contact_active',
			'priority' => 18,
		))
	);
	/**
	* ################ SECTION IMPORTANT LINK AND DOCUMENTATION
	*/
	$wp_customize->add_setting('elementare_theme_options[_documentation_link]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	));
	
	$wp_customize->add_control(
		new Elementare_Customize_Upgrade_Control(
		$wp_customize,
		'elementare_theme_options[_documentation_link]',
		array(
			'section' => 'cresta_elementare_links',
			'settings' => 'elementare_theme_options[_documentation_link]',
		))
	);
}
add_action( 'customize_register', 'elementare_custom_settings_register' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elementare_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	/* Onepage title and subtitle */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_title_aboutus]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtitle_aboutus]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_title_features]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtitle_features]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_title_skills]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtitle_skills]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_title_services]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtitle_services]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_title_blog]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtitle_blog]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_title_team]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtitle_team]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_title_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtitle_contact]' )->transport  = 'postMessage';
	/* Onepage slider section */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_text_1_slider]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_text_2_slider]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_text_3_slider]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtext_1_slider]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtext_2_slider]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_subtext_3_slider]' )->transport  = 'postMessage';
	/* Onepage about us section */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textbutton_aboutus]' )->transport  = 'postMessage';
	/* Onepage features section */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_boxtextbutton_1_features]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_boxtextbutton_2_features]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_boxtextbutton_3_features]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_boxtextbutton_4_features]' )->transport  = 'postMessage';
	/* Onepage CTA section */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_phrase_cta]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_desc_cta]' )->transport  = 'postMessage';
	/* Onepage services section */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_phrase_services]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textarea_services]' )->transport  = 'postMessage';
	/* Onepage contact section */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_additionaltext_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_companyname_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_companyaddress1_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_companyaddress2_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_companyaddress3_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_companyphone_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_companyfax_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_companyemail_contact]' )->transport  = 'postMessage';
	/* Onepage slider color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_slider_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_slider_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_slider]' )->transport  = 'postMessage';
	/* Onepage about us color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_aboutus_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_aboutus_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_aboutus]' )->transport  = 'postMessage';
	/* Onepage features color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_features_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_features_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_features]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_features_inner]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_features_inner]' )->transport  = 'postMessage';
	/* Onepage skills color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_skills_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_skills_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_skills]' )->transport  = 'postMessage';
	/* Onepage cta color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_cta_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_cta_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_cta]' )->transport  = 'postMessage';
	/* Onepage services color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_services_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_services_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_services]' )->transport  = 'postMessage';
	/* Onepage blog color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_blog_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_blog_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_blog]' )->transport  = 'postMessage';
	/* Onepage team color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_team_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_team_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_team]' )->transport  = 'postMessage';
	/* Onepage contact color and background */
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_contact_first]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_contact_second]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_contact]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_imgcolor_contact_form]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'elementare_theme_options[_onepage_textcolor_contact_form]' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'elementare_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'elementare_customize_partial_blogdescription',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_title_aboutus]', array(
		  'selector' => '.elementare_action_aboutus .elementare_main_text, .elementare_action_aboutus .title-absolute',
		  'settings' => 'elementare_theme_options[_onepage_title_aboutus]',
		  'render_callback' => 'elementare_selective_refresh_title_aboutus',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_title_features]', array(
		  'selector' => '.elementare_action_features .elementare_main_text, .elementare_action_features .title-absolute',
		  'settings' => 'elementare_theme_options[_onepage_title_features]',
		  'render_callback' => 'elementare_selective_refresh_title_features',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_title_skills]', array(
		  'selector' => '.elementare_action_skills .elementare_main_text, .elementare_action_skills .title-absolute',
		  'settings' => 'elementare_theme_options[_onepage_title_skills]',
		  'render_callback' => 'elementare_selective_refresh_title_skills',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_phrase_cta]', array(
		  'selector' => '.cta_columns .ctaPhrase h3',
		  'settings' => 'elementare_theme_options[_onepage_phrase_cta]',
		  'render_callback' => 'elementare_selective_refresh_phrase_cta',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_desc_cta]', array(
		  'selector' => '.cta_columns .ctaPhrase p',
		  'settings' => 'elementare_theme_options[_onepage_desc_cta]',
		  'render_callback' => 'elementare_selective_refresh_desc_cta',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_title_services]', array(
		  'selector' => '.elementare_action_services .elementare_main_text, .elementare_action_services .title-absolute',
		  'settings' => 'elementare_theme_options[_onepage_title_services]',
		  'render_callback' => 'elementare_selective_refresh_title_services',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_textarea_services]', array(
		  'selector' => '.services_columns_single .serviceContent p',
		  'settings' => 'elementare_theme_options[_onepage_textarea_services]',
		  'render_callback' => 'elementare_selective_refresh_textarea_services',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_title_blog]', array(
		  'selector' => '.elementare_action_blog .elementare_main_text, .elementare_action_blog .title-absolute',
		  'settings' => 'elementare_theme_options[_onepage_title_blog]',
		  'render_callback' => 'elementare_selective_refresh_title_blog',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_title_team]', array(
		  'selector' => '.elementare_action_team .elementare_main_text, .elementare_action_team .title-absolute',
		  'settings' => 'elementare_theme_options[_onepage_title_team]',
		  'render_callback' => 'elementare_selective_refresh_title_team',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_title_contact]', array(
		  'selector' => '.elementare_action_contact .elementare_main_text, .elementare_action_contact .title-absolute',
		  'settings' => 'elementare_theme_options[_onepage_title_contact]',
		  'render_callback' => 'elementare_selective_refresh_title_contact',
		) );
		$wp_customize->selective_refresh->add_partial('elementare_theme_options[_onepage_additionaltext_contact]', array(
		  'selector' => '.elementareAdditionalText p',
		  'settings' => 'elementare_theme_options[_onepage_additionaltext_contact]',
		  'render_callback' => 'elementare_selective_refresh_additionaltext_contact',
		) );
	}
}
add_action( 'customize_register', 'elementare_customize_register' );

/* Render Callback for selective refresh */
function elementare_customize_partial_blogname() {
	bloginfo( 'name' );
}
function elementare_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function elementare_selective_refresh_title_aboutus() {
	return esc_html(elementare_options('_onepage_title_aboutus'));
}
function elementare_selective_refresh_title_features() {
	return esc_html(elementare_options('_onepage_title_features'));
}
function elementare_selective_refresh_title_skills() {
	return esc_html(elementare_options('_onepage_title_skills'));
}
function elementare_selective_refresh_phrase_cta() {
	return wp_kses(elementare_options('_onepage_phrase_cta'), elementare_allowed_html());
}
function elementare_selective_refresh_desc_cta() {
	return wp_kses(elementare_options('_onepage_desc_cta'), elementare_allowed_html());
}
function elementare_selective_refresh_title_services() {
	return esc_html(elementare_options('_onepage_title_services'));
}
function elementare_selective_refresh_textarea_services() {
	return wp_kses(elementare_options('_onepage_textarea_services'), elementare_allowed_html());
}
function elementare_selective_refresh_title_blog() {
	return esc_html(elementare_options('_onepage_title_blog'));
}
function elementare_selective_refresh_title_team() {
	return esc_html(elementare_options('_onepage_title_team'));
}
function elementare_selective_refresh_title_contact() {
	return esc_html(elementare_options('_onepage_title_contact'));
}
function elementare_selective_refresh_additionaltext_contact() {
	return wp_kses(elementare_options('_onepage_additionaltext_contact'), elementare_allowed_html());
}

/* Custom Class */
if( class_exists( 'WP_Customize_Control' ) ):
	class Elementare_Customize_Upgrade_Control extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="elementare-custom-title">
        		<span class="customize-control-title">
					<h3 style="text-align:center;"><div class="dashicons dashicons-megaphone"></div> <?php esc_html_e('Thank you for using Elementare WordPress Theme', 'elementare'); ?></h3>
        		</span>
        	</p>
			<p style="text-align:center;" class="elementare-custom-button">
				<a style="margin: 10px;display: block;" target="_blank" href="<?php echo esc_url(admin_url('themes.php?page=elementare-welcome&tab=documentation')); ?>" class="button button-secondary">
					<?php esc_html_e('Theme Documentation', 'elementare'); ?>
				</a>
				<a style="margin: 10px;display: block;" target="_blank" href="https://crestaproject.com/demo/elementare/" class="button button-secondary">
					<?php esc_html_e('Watch the demo', 'elementare'); ?>
				</a>
				<a style="margin: 10px;display: block;" target="_blank" href="https://crestaproject.com/demo/elementare-pro/" class="button button-secondary">
					<?php esc_html_e('Watch the PRO Version demo', 'elementare'); ?>
				</a>
				<a style="margin: 10px;display: block;" target="_blank" href="https://crestaproject.com/downloads/elementare/" class="button button-secondary">
					<?php esc_html_e('More info about Elementare theme', 'elementare'); ?>
				</a>
			</p>
			<?php
        }
    }
	class Elementare_Customize_Heading extends WP_Customize_Control {
		public $type = 'heading';

		public function render_content() {
			if ( !empty( $this->label ) ) : ?>
				<h3 class="elementare_options-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
			<?php endif;
			if($this->description){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post($this->description); ?>
				</span>
			<?php }
		}
	}
	class Elementare_Info_Text extends WP_Customize_Control{
		public function render_content(){
		?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if($this->description){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post($this->description); ?>
				</span>
			<?php }
		}
	}
	class Elementare_Fontawesome_Icon extends WP_Customize_Control{
		public $type = 'icon';
		public function render_content(){
			?>
				<label>
					<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
					</span>
					<?php if($this->description){ ?>
					<span class="description customize-control-description">
						<?php echo wp_kses_post($this->description); ?>
					</span>
					<?php } ?>
					<div class="elementare-selected-icon">
						<i class="fa <?php echo esc_attr($this->value()); ?>"></i>
						<span><i class="fa fa-angle-down"></i></span>
					</div>
					<ul class="elementare-icon-list clearfix">
						<?php
						$elementare_font_awesome_icon_array = elementare_font_awesome_icon_array();
						foreach ($elementare_font_awesome_icon_array as $elementare_font_awesome_icon) {
							$icon_class = $this->value() == $elementare_font_awesome_icon ? 'icon-active' : '';
							echo '<li class='.esc_attr($icon_class).'><i class="'.esc_attr($elementare_font_awesome_icon).'"></i></li>';
						}
						?>
					</ul>
					<input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
				</label>
			<?php
		}
	}
endif;

function elementare_is_scroll_in_post() {
	$scrollButton = elementare_options('_scrolldown_button', '1');
	if ($scrollButton == 1) {
		return true;
	}
	return false;
}

function elementare_is_one_page() {
	if (!is_page_template('template-onepage.php')) {
		return false;
	}
	return true;
}

function elementare_is_sectionmap_active() {
	$showSectionmap = elementare_options('_onepage_settings_sectionmap', '');
	if ($showSectionmap == 1) {
		return true;
	}
	return false;
}

function elementare_is_slider_active() {
	$showSlider = elementare_options('_onepage_section_slider', '1');
	if ($showSlider == 1) {
		return true;
	}
	return false;
}

function elementare_onepage_is_scroll_in_post() {
	$showSlider = elementare_options('_onepage_section_slider', '1');
	$scrollButton = elementare_options('_onepage_scrolldown_slider', '1');
	if ($scrollButton == 1 && $showSlider) {
		return true;
	}
	return false;
}

function elementare_is_aboutus_active() {
	$showAbout = elementare_options('_onepage_section_aboutus', '');
	if ($showAbout == 1) {
		return true;
	}
	return false;
}

function elementare_is_features_active() {
	$showFeatures = elementare_options('_onepage_section_features', '');
	if ($showFeatures == 1) {
		return true;
	}
	return false;
}

function elementare_is_skills_active() {
	$showSkills = elementare_options('_onepage_section_skills', '');
	if ($showSkills == 1) {
		return true;
	}
	return false;
}

function elementare_is_cta_active() {
	$showCta = elementare_options('_onepage_section_cta', '');
	if ($showCta == 1) {
		return true;
	}
	return false;
}

function elementare_is_services_active() {
	$showServices = elementare_options('_onepage_section_services', '');
	if ($showServices == 1) {
		return true;
	}
	return false;
}

function elementare_is_blog_active() {
	$showBlog = elementare_options('_onepage_section_blog', '');
	if ($showBlog == 1) {
		return true;
	}
	return false;
}

function elementare_is_team_active() {
	$showTeam = elementare_options('_onepage_section_team', '');
	if ($showTeam == 1) {
		return true;
	}
	return false;
}

function elementare_is_contact_active() {
	$showContact = elementare_options('_onepage_section_contact', '');
	if ($showContact == 1) {
		return true;
	}
	return false;
}

function elementare_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function elementare_sanitize_text( $input ) {
	return wp_kses($input, elementare_allowed_html());
}

function elementare_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

if( ! function_exists('elementare_font_awesome_icon_array')){
	function elementare_font_awesome_icon_array(){
		return array("fa fa-500px","fa fa-address-book","fa fa-address-book-o","fa fa-address-card","fa fa-address-card-o","fa fa-adjust","fa fa-adn","fa fa-align-center","fa fa-align-justify","fa fa-align-left","fa fa-align-right","fa fa-amazon","fa fa-ambulance","fa fa-american-sign-language-interpreting","fa fa-anchor","fa fa-android","fa fa-angellist","fa fa-angle-double-down","fa fa-angle-double-left","fa fa-angle-double-right","fa fa-angle-double-up","fa fa-angle-down","fa fa-angle-left","fa fa-angle-right","fa fa-angle-up","fa fa-apple","fa fa-archive","fa fa-area-chart","fa fa-arrow-circle-down","fa fa-arrow-circle-left","fa fa-arrow-circle-o-down","fa fa-arrow-circle-o-left","fa fa-arrow-circle-o-right","fa fa-arrow-circle-o-up","fa fa-arrow-circle-right","fa fa-arrow-circle-up","fa fa-arrow-down","fa fa-arrow-left","fa fa-arrow-right","fa fa-arrow-up","fa fa-arrows","fa fa-arrows-alt","fa fa-arrows-h","fa fa-arrows-v","fa fa-assistive-listening-systems","fa fa-asterisk","fa fa-at","fa fa-audio-description","fa fa-backward","fa fa-balance-scale","fa fa-ban","fa fa-bandcamp","fa fa-bar-chart","fa fa-barcode","fa fa-bars","fa fa-bath","fa fa-battery-empty","fa fa-battery-full","fa fa-battery-half","fa fa-battery-quarter","fa fa-battery-three-quarters","fa fa-bed","fa fa-beer","fa fa-behance","fa fa-behance-square","fa fa-bell","fa fa-bell-o","fa fa-bell-slash","fa fa-bell-slash-o","fa fa-bicycle","fa fa-binoculars","fa fa-birthday-cake","fa fa-bitbucket","fa fa-bitbucket-square","fa fa-black-tie","fa fa-blind","fa fa-bluetooth","fa fa-bluetooth-b","fa fa-bold","fa fa-bolt","fa fa-bomb","fa fa-book","fa fa-bookmark","fa fa-bookmark-o","fa fa-braille","fa fa-briefcase","fa fa-btc","fa fa-bug","fa fa-building","fa fa-building-o","fa fa-bullhorn","fa fa-bullseye","fa fa-bus","fa fa-buysellads","fa fa-calculator","fa fa-calendar","fa fa-calendar-check-o","fa fa-calendar-minus-o","fa fa-calendar-o","fa fa-calendar-plus-o","fa fa-calendar-times-o","fa fa-camera","fa fa-camera-retro","fa fa-car","fa fa-caret-down","fa fa-caret-left","fa fa-caret-right","fa fa-caret-square-o-down","fa fa-caret-square-o-left","fa fa-caret-square-o-right","fa fa-caret-square-o-up","fa fa-caret-up","fa fa-cart-arrow-down","fa fa-cart-plus","fa fa-cc","fa fa-cc-amex","fa fa-cc-diners-club","fa fa-cc-discover","fa fa-cc-jcb","fa fa-cc-mastercard","fa fa-cc-paypal","fa fa-cc-stripe","fa fa-cc-visa","fa fa-certificate","fa fa-chain-broken","fa fa-check","fa fa-check-circle","fa fa-check-circle-o","fa fa-check-square","fa fa-check-square-o","fa fa-chevron-circle-down","fa fa-chevron-circle-left","fa fa-chevron-circle-right","fa fa-chevron-circle-up","fa fa-chevron-down","fa fa-chevron-left","fa fa-chevron-right","fa fa-chevron-up","fa fa-child","fa fa-chrome","fa fa-circle","fa fa-circle-o","fa fa-circle-o-notch","fa fa-circle-thin","fa fa-clipboard","fa fa-clock-o","fa fa-clone","fa fa-cloud","fa fa-cloud-download","fa fa-cloud-upload","fa fa-code","fa fa-code-fork","fa fa-codepen","fa fa-codiepie","fa fa-coffee","fa fa-cog","fa fa-cogs","fa fa-columns","fa fa-comment","fa fa-comment-o","fa fa-commenting","fa fa-commenting-o","fa fa-comments","fa fa-comments-o","fa fa-compass","fa fa-compress","fa fa-connectdevelop","fa fa-contao","fa fa-copyright","fa fa-creative-commons","fa fa-credit-card","fa fa-credit-card-alt","fa fa-crop","fa fa-crosshairs","fa fa-css3","fa fa-cube","fa fa-cubes","fa fa-cutlery","fa fa-dashcube","fa fa-database","fa fa-deaf","fa fa-delicious","fa fa-desktop","fa fa-deviantart","fa fa-diamond","fa fa-digg","fa fa-dot-circle-o","fa fa-download","fa fa-dribbble","fa fa-dropbox","fa fa-drupal","fa fa-edge","fa fa-eercast","fa fa-eject","fa fa-ellipsis-h","fa fa-ellipsis-v","fa fa-empire","fa fa-envelope","fa fa-envelope-o","fa fa-envelope-open","fa fa-envelope-open-o","fa fa-envelope-square","fa fa-envira","fa fa-eraser","fa fa-etsy","fa fa-eur","fa fa-exchange","fa fa-exclamation","fa fa-exclamation-circle","fa fa-exclamation-triangle","fa fa-expand","fa fa-expeditedssl","fa fa-external-link","fa fa-external-link-square","fa fa-eye","fa fa-eye-slash","fa fa-eyedropper","fa fa-facebook","fa fa-facebook-official","fa fa-facebook-square","fa fa-fast-backward","fa fa-fast-forward","fa fa-fax","fa fa-female","fa fa-fighter-jet","fa fa-file","fa fa-file-archive-o","fa fa-file-audio-o","fa fa-file-code-o","fa fa-file-excel-o","fa fa-file-image-o","fa fa-file-o","fa fa-file-pdf-o","fa fa-file-powerpoint-o","fa fa-file-text","fa fa-file-text-o","fa fa-file-video-o","fa fa-file-word-o","fa fa-files-o","fa fa-film","fa fa-filter","fa fa-fire","fa fa-fire-extinguisher","fa fa-firefox","fa fa-first-order","fa fa-flag","fa fa-flag-checkered","fa fa-flag-o","fa fa-flask","fa fa-flickr","fa fa-floppy-o","fa fa-folder","fa fa-folder-o","fa fa-folder-open","fa fa-folder-open-o","fa fa-font","fa fa-font-awesome","fa fa-fonticons","fa fa-fort-awesome","fa fa-forumbee","fa fa-forward","fa fa-foursquare","fa fa-free-code-camp","fa fa-frown-o","fa fa-futbol-o","fa fa-gamepad","fa fa-gavel","fa fa-gbp","fa fa-genderless","fa fa-get-pocket","fa fa-gg","fa fa-gg-circle","fa fa-gift","fa fa-git","fa fa-git-square","fa fa-github","fa fa-github-alt","fa fa-github-square","fa fa-gitlab","fa fa-glass","fa fa-glide","fa fa-glide-g","fa fa-globe","fa fa-google","fa fa-google-plus","fa fa-google-plus-official","fa fa-google-plus-square","fa fa-google-wallet","fa fa-graduation-cap","fa fa-gratipay","fa fa-grav","fa fa-h-square","fa fa-hacker-news","fa fa-hand-lizard-o","fa fa-hand-o-down","fa fa-hand-o-left","fa fa-hand-o-right","fa fa-hand-o-up","fa fa-hand-paper-o","fa fa-hand-peace-o","fa fa-hand-pointer-o","fa fa-hand-rock-o","fa fa-hand-scissors-o","fa fa-hand-spock-o","fa fa-handshake-o","fa fa-hashtag","fa fa-hdd-o","fa fa-header","fa fa-headphones","fa fa-heart","fa fa-heart-o","fa fa-heartbeat","fa fa-history","fa fa-home","fa fa-hospital-o","fa fa-hourglass","fa fa-hourglass-end","fa fa-hourglass-half","fa fa-hourglass-o","fa fa-hourglass-start","fa fa-houzz","fa fa-html5","fa fa-i-cursor","fa fa-id-badge","fa fa-id-card","fa fa-id-card-o","fa fa-ils","fa fa-imdb","fa fa-inbox","fa fa-indent","fa fa-industry","fa fa-info","fa fa-info-circle","fa fa-inr","fa fa-instagram","fa fa-internet-explorer","fa fa-ioxhost","fa fa-italic","fa fa-joomla","fa fa-jpy","fa fa-jsfiddle","fa fa-key","fa fa-keyboard-o","fa fa-krw","fa fa-language","fa fa-laptop","fa fa-lastfm","fa fa-lastfm-square","fa fa-leaf","fa fa-leanpub","fa fa-lemon-o","fa fa-level-down","fa fa-level-up","fa fa-life-ring","fa fa-lightbulb-o","fa fa-line-chart","fa fa-link","fa fa-linkedin","fa fa-linkedin-square","fa fa-linode","fa fa-linux","fa fa-list","fa fa-list-alt","fa fa-list-ol","fa fa-list-ul","fa fa-location-arrow","fa fa-lock","fa fa-long-arrow-down","fa fa-long-arrow-left","fa fa-long-arrow-right","fa fa-long-arrow-up","fa fa-low-vision","fa fa-magic","fa fa-magnet","fa fa-male","fa fa-map","fa fa-map-marker","fa fa-map-o","fa fa-map-pin","fa fa-map-signs","fa fa-mars","fa fa-mars-double","fa fa-mars-stroke","fa fa-mars-stroke-h","fa fa-mars-stroke-v","fa fa-maxcdn","fa fa-meanpath","fa fa-medium","fa fa-medkit","fa fa-meetup","fa fa-meh-o","fa fa-mercury","fa fa-microchip","fa fa-microphone","fa fa-microphone-slash","fa fa-minus","fa fa-minus-circle","fa fa-minus-square","fa fa-minus-square-o","fa fa-mixcloud","fa fa-mobile","fa fa-modx","fa fa-money","fa fa-moon-o","fa fa-motorcycle","fa fa-mouse-pointer","fa fa-music","fa fa-neuter","fa fa-newspaper-o","fa fa-object-group","fa fa-object-ungroup","fa fa-odnoklassniki","fa fa-odnoklassniki-square","fa fa-opencart","fa fa-openid","fa fa-opera","fa fa-optin-monster","fa fa-outdent","fa fa-pagelines","fa fa-paint-brush","fa fa-paper-plane","fa fa-paper-plane-o","fa fa-paperclip","fa fa-paragraph","fa fa-pause","fa fa-pause-circle","fa fa-pause-circle-o","fa fa-paw","fa fa-paypal","fa fa-pencil","fa fa-pencil-square","fa fa-pencil-square-o","fa fa-percent","fa fa-phone","fa fa-phone-square","fa fa-picture-o","fa fa-pie-chart","fa fa-pied-piper","fa fa-pied-piper-alt","fa fa-pied-piper-pp","fa fa-pinterest","fa fa-pinterest-p","fa fa-pinterest-square","fa fa-plane","fa fa-play","fa fa-play-circle","fa fa-play-circle-o","fa fa-plug","fa fa-plus","fa fa-plus-circle","fa fa-plus-square","fa fa-plus-square-o","fa fa-podcast","fa fa-power-off","fa fa-print","fa fa-product-hunt","fa fa-puzzle-piece","fa fa-qq","fa fa-qrcode","fa fa-question","fa fa-question-circle","fa fa-question-circle-o","fa fa-quora","fa fa-quote-left","fa fa-quote-right","fa fa-random","fa fa-ravelry","fa fa-rebel","fa fa-recycle","fa fa-reddit","fa fa-reddit-alien","fa fa-reddit-square","fa fa-refresh","fa fa-registered","fa fa-renren","fa fa-repeat","fa fa-reply","fa fa-reply-all","fa fa-retweet","fa fa-road","fa fa-rocket","fa fa-rss","fa fa-rss-square","fa fa-rub","fa fa-safari","fa fa-scissors","fa fa-scribd","fa fa-search","fa fa-search-minus","fa fa-search-plus","fa fa-sellsy","fa fa-server","fa fa-share","fa fa-share-alt","fa fa-share-alt-square","fa fa-share-square","fa fa-share-square-o","fa fa-shield","fa fa-ship","fa fa-shirtsinbulk","fa fa-shopping-bag","fa fa-shopping-basket","fa fa-shopping-cart","fa fa-shower","fa fa-sign-in","fa fa-sign-language","fa fa-sign-out","fa fa-signal","fa fa-simplybuilt","fa fa-sitemap","fa fa-skyatlas","fa fa-skype","fa fa-slack","fa fa-sliders","fa fa-slideshare","fa fa-smile-o","fa fa-snapchat","fa fa-snapchat-ghost","fa fa-snapchat-square","fa fa-snowflake-o","fa fa-sort","fa fa-sort-alpha-asc","fa fa-sort-alpha-desc","fa fa-sort-amount-asc","fa fa-sort-amount-desc","fa fa-sort-asc","fa fa-sort-desc","fa fa-sort-numeric-asc","fa fa-sort-numeric-desc","fa fa-soundcloud","fa fa-space-shuttle","fa fa-spinner","fa fa-spoon","fa fa-spotify","fa fa-square","fa fa-square-o","fa fa-stack-exchange","fa fa-stack-overflow","fa fa-star","fa fa-star-half","fa fa-star-half-o","fa fa-star-o","fa fa-steam","fa fa-steam-square","fa fa-step-backward","fa fa-step-forward","fa fa-stethoscope","fa fa-sticky-note","fa fa-sticky-note-o","fa fa-stop","fa fa-stop-circle","fa fa-stop-circle-o","fa fa-street-view","fa fa-strikethrough","fa fa-stumbleupon","fa fa-stumbleupon-circle","fa fa-subscript","fa fa-subway","fa fa-suitcase","fa fa-sun-o","fa fa-superpowers","fa fa-superscript","fa fa-table","fa fa-tablet","fa fa-tachometer","fa fa-tag","fa fa-tags","fa fa-tasks","fa fa-taxi","fa fa-telegram","fa fa-television","fa fa-tencent-weibo","fa fa-terminal","fa fa-text-height","fa fa-text-width","fa fa-th","fa fa-th-large","fa fa-th-list","fa fa-themeisle","fa fa-thermometer-empty","fa fa-thermometer-full","fa fa-thermometer-half","fa fa-thermometer-quarter","fa fa-thermometer-three-quarters","fa fa-thumb-tack","fa fa-thumbs-down","fa fa-thumbs-o-down","fa fa-thumbs-o-up","fa fa-thumbs-up","fa fa-ticket","fa fa-times","fa fa-times-circle","fa fa-times-circle-o","fa fa-tint","fa fa-toggle-off","fa fa-toggle-on","fa fa-trademark","fa fa-train","fa fa-transgender","fa fa-transgender-alt","fa fa-trash","fa fa-trash-o","fa fa-tree","fa fa-trello","fa fa-tripadvisor","fa fa-trophy","fa fa-truck","fa fa-try","fa fa-tty","fa fa-tumblr","fa fa-tumblr-square","fa fa-twitch","fa fa-twitter","fa fa-twitter-square","fa fa-umbrella","fa fa-underline","fa fa-undo","fa fa-universal-access","fa fa-university","fa fa-unlock","fa fa-unlock-alt","fa fa-upload","fa fa-usb","fa fa-usd","fa fa-user","fa fa-user-circle","fa fa-user-circle-o","fa fa-user-md","fa fa-user-o","fa fa-user-plus","fa fa-user-secret","fa fa-user-times","fa fa-users","fa fa-venus","fa fa-venus-double","fa fa-venus-mars","fa fa-viacoin","fa fa-viadeo","fa fa-viadeo-square","fa fa-video-camera","fa fa-vimeo","fa fa-vimeo-square","fa fa-vine","fa fa-vk","fa fa-volume-control-phone","fa fa-volume-down","fa fa-volume-off","fa fa-volume-up","fa fa-weibo","fa fa-weixin","fa fa-whatsapp","fa fa-wheelchair","fa fa-wheelchair-alt","fa fa-wifi","fa fa-wikipedia-w","fa fa-window-close","fa fa-window-close-o","fa fa-window-maximize","fa fa-window-minimize","fa fa-window-restore","fa fa-windows","fa fa-wordpress","fa fa-wpbeginner","fa fa-wpexplorer","fa fa-wpforms","fa fa-wrench","fa fa-xing","fa fa-xing-square","fa fa-y-combinator","fa fa-yahoo","fa fa-yelp","fa fa-yoast","fa fa-youtube","fa fa-youtube-play","fa fa-youtube-square");
	}
}

if( ! function_exists('elementare_options')){
	function elementare_options($name, $default = false) {
		$options = ( get_option( 'elementare_theme_options' ) ) ? get_option( 'elementare_theme_options' ) : null;
		// return the option if it exists
		if ( isset( $options[ $name ] ) ) {
			return apply_filters( "elementare_theme_options_{$name}", $options[ $name ] );
		}
		// return default if nothing else
		return apply_filters( "elementare_theme_options_{$name}", $default );
	}
}

if( ! function_exists('elementare_allowed_html')){
	function elementare_allowed_html() {
		$allowed_tags = array(
			'a' => array(
				'class' => array(),
				'id'    => array(),
				'href'  => array(),
				'rel'   => array(),
				'title' => array(),
				'target' => array(),
			),
			'abbr' => array(
				'title' => array(),
			),
			'b' => array(),
			'blockquote' => array(
				'cite'  => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'code' => array(),
			'del' => array(
				'datetime' => array(),
				'title' => array(),
			),
			'dd' => array(),
			'div' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
			'h6' => array(),
			'i' => array(),
			'br' => array(),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
			),
			'li' => array(
				'class' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'p' => array(
				'class' => array(),
			),
			'q' => array(
				'cite' => array(),
				'title' => array(),
			),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'strike' => array(),
			'strong' => array(),
			'ul' => array(
				'class' => array(),
			),
		);
		return $allowed_tags;
	}
}

if( ! function_exists('elementare_show_social_network')){
	function elementare_show_social_network($position) {
		$openLinks = elementare_options('_social_open_links', '_self');
		$facebookURL = elementare_options('_facebookurl', '');
		$twitterURL = elementare_options('_twitterurl', '');
		$googleplusURL = elementare_options('_googleplusurl', '');
		$linkedinURL = elementare_options('_linkedinurl', '');
		$instagramURL = elementare_options('_instagramurl', '');
		$youtubeURL = elementare_options('_youtubeurl', '');
		$pinterestURL = elementare_options('_pinteresturl', '');
		$tumblrURL = elementare_options('_tumblrurl', '');
		$flickrURL = elementare_options('_flickrurl', '');
		$vkURL = elementare_options('_vkurl', '');
		$xingURL = elementare_options('_xingurl', '');
		$redditURL = elementare_options('_redditurl', '');
		$vimeoURL = elementare_options('_vimeourl', '');
		$imdbURL = elementare_options('_imdburl', '');
		?>
		<div class="<?php echo $position == 'float' ? 'site-social-float' : 'site-social-footer' ?>">
			<?php if ($facebookURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($facebookURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Facebook', 'elementare' ); ?>"><i class="fa fa-facebook spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($twitterURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($twitterURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Twitter', 'elementare' ); ?>"><i class="fa fa-twitter spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($googleplusURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($googleplusURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Google Plus', 'elementare' ); ?>"><i class="fa fa-google-plus spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Google Plus', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($linkedinURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($linkedinURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Linkedin', 'elementare' ); ?>"><i class="fa fa-linkedin spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($instagramURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($instagramURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Instagram', 'elementare' ); ?>"><i class="fa fa-instagram spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($youtubeURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($youtubeURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'YouTube', 'elementare' ); ?>"><i class="fa fa-youtube spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($pinterestURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($pinterestURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Pinterest', 'elementare' ); ?>"><i class="fa fa-pinterest spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($tumblrURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($tumblrURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Tumblr', 'elementare' ); ?>"><i class="fa fa-tumblr spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Tumblr', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($flickrURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($flickrURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Flickr', 'elementare' ); ?>"><i class="fa fa-flickr spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Flickr', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($vkURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($vkURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'VK', 'elementare' ); ?>"><i class="fa fa-vk spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'VK', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($xingURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($xingURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Xing', 'elementare' ); ?>"><i class="fa fa-xing spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Xing', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($redditURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($redditURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Reddit', 'elementare' ); ?>"><i class="fa fa-reddit-alien spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Reddit', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($vimeoURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($vimeoURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Vimeo', 'elementare' ); ?>"><i class="fa fa-vimeo spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Vimeo', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($imdbURL) : ?>
				<a class="elementare-social" href="<?php echo esc_url($imdbURL); ?>" target="<?php echo esc_attr($openLinks); ?>" title="<?php esc_attr_e( 'Imdb', 'elementare' ); ?>"><i class="fa fa-imdb spaceLeftRight"><span class="screen-reader-text"><?php esc_html_e( 'Imdb', 'elementare' ); ?></span></i></a>
			<?php endif; ?>
		</div>
		<?php
	}
}

if( ! function_exists('elementare_loadingPage')){
	function elementare_loadingPage () {
		echo '<div class="fLoader1"><span class="loader__inner"></span><span class="loader__inner"></span></div>';
	}
}

/**
* One page map
*/
if( ! function_exists('elementare_sectionmap')){
	function elementare_sectionmap() {
		if (elementare_options('_onepage_settings_sectionmap', '') == 1) {
			$singleSection = 'slider,aboutus,features,skills,cta,services,blog,team,contact';
			$values = explode( ',', $singleSection );
			echo '<ul class="elementare_sectionmap">';
			foreach( $values as $val ) {
				if(elementare_options('_onepage_section_'.$val) == 1) {
					$sectionID = elementare_options('_onepage_id_'.$val, $val);
					$sectionText = elementare_options('_onepage_settings_map_'.$val);
					if ($sectionText) {
						echo '<li class="' . esc_attr($sectionID) . '"><a href="#' . esc_attr($sectionID) . '"><span class="box"></span></a><span class="text">' .esc_html($sectionText). '</span></li>';
					}
				}
			}
			echo '</ul>';
		}
	}
}

/**
 * Add Custom CSS to Header 
 */
function elementare_custom_css_styles() {
	echo '<style type="text/css">';
	$headerBackgroundColor = elementare_options('_header_background_color', '#13293d');
	$headerTextColor = elementare_options('_header_text_color', '#fdfffc');
	$headerAccentColor = elementare_options('_header_accent_color', '#6ee004');
	$contentBackgroundColor = elementare_options('_content_background_color', '#fdfffc');
	$contentTextColor = elementare_options('_content_text_color', '#13293d');
	$contentAccentColor = elementare_options('_content_accent_color', '#6ee004');
	$contentBorderColor = elementare_options('_content_border_color', '#d5d6d4');
	$sidebarBackgroundColor = elementare_options('_sidebar_background_color', '#6ee004');
	$sidebarBackgroundColorTwo = elementare_options('_sidebar_background_color_two', '#00d0f9');
	$sidebarTextColor = elementare_options('_sidebar_text_color', '#13293d');
	$sidebarAccentColor = elementare_options('_sidebar_accent_color', '#008089');
	$footerBackgroundColor = elementare_options('_footer_background_color', '#222222');
	$footerTextColor = elementare_options('_footer_text_color', '#afafaf');
	$footerAccentColor = elementare_options('_footer_accent_color', '#e4e2e2');
	/* Header Text Color */
	?>
	.site-branding .site-description,
	.main-navigation > div > ul > li > a,
	.site-branding .site-title a,
	.elementareBigText header.entry-header,
	.elementareBigText header.entry-header .entry-meta > span i,
	.elementareBigText header.entry-header .entry-meta > span a,
	.main-navigation ul ul a,
	header.site-header .crestaMenuButton a,
	.flexslider:hover .flex-direction-nav .flex-prev:hover,
	.flexslider:hover .flex-direction-nav .flex-next:hover,
	.menu-toggle,
	.menu-toggle:hover,
	.menu-toggle:focus,
	.menu-toggle:active {
		color: <?php echo esc_html($headerTextColor); ?>;
	}
	header.site-header .crestaMenuButton:hover a,
	header.site-header .crestaMenuButton:active a,
	header.site-header .crestaMenuButton:focus a {
		color: <?php echo esc_html($headerTextColor); ?> !important;
	}
	.search-button .search-line,
	.hamburger-menu .hamburger-inner,
	.hamburger-menu .hamburger-inner:after,
	.hamburger-menu .hamburger-inner:before {
		background-color: <?php echo esc_html($headerTextColor); ?>;
	}
	.search-button .search-circle, .scrollDown .mouse {
		border-color: <?php echo esc_html($headerTextColor); ?>;
	}
	@media all and (max-width: 1025px) {
		.main-navigation ul li .indicator,
		.main-navigation > div > ul > li > a,
		.main-navigation ul ul a {
			border-color: <?php echo esc_html($headerTextColor); ?>;
		}
		.main-navigation ul li .indicator:before {
			color: <?php echo esc_html($headerTextColor); ?>;
		}
	}
	<?php
	/* Header Accent Color */
	?>
	header.site-header .crestaMenuButton,
	.elementareBigText header.entry-header .entry-meta > span i,
	.main-navigation > div > ul > li > a::before,
	.menu-toggle,
	.menu-toggle:hover,
	.menu-toggle:focus,
	.menu-toggle:active,
	.flexslider .slides > li .flexText .inside h2:after {
		background-color: <?php echo esc_html($headerAccentColor); ?>;
	}
	<?php
	/* Header Background Color */
	list($r, $g, $b) = sscanf($headerBackgroundColor, '#%02x%02x%02x');
	?>
	header.site-header {
		background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.0);
	}
	header.site-header.menuMinor,
	header.site-header.noImage {
		background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,1);
	}
	.flexslider .slides > li .flexText,
	.elementareImageOp {
		background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.4);
	}
	.main-navigation ul ul a {
		background-color: <?php echo esc_html($headerBackgroundColor); ?>;
	}
	@media all and (max-width: 1025px) {
		header.site-header {
			background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,1) !important;
		}
		.main-navigation.toggled .nav-menu {
			background: <?php echo esc_html($headerBackgroundColor); ?>;
		}
	}
	<?php
	/* Content Accent Color */
	list($r, $g, $b) = sscanf($contentAccentColor, '#%02x%02x%02x');
	?>
	a, a:visited,
	blockquote::before,
	.woocommerce ul.products > li .price,
	.woocommerce div.product .summary .price,
	.hentry header.entry-header .entry-meta > span i,
	.hentry footer.entry-footer span:not(.read-more) i {
		color: <?php echo esc_html($contentAccentColor); ?>;
	}
	hr,
	.navigation.pagination .nav-links .prev,
	.woocommerce-pagination > ul.page-numbers li a.prev,
	.navigation.pagination .nav-links .next,
	.woocommerce-pagination > ul.page-numbers li a.next,
	.navigation.pagination .nav-links a,
	.woocommerce-pagination > ul.page-numbers li a,
	#wp-calendar > caption,
	.tagcloud a,
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	footer.entry-footer span.read-more a, a.more-link,
	#toTop,
	.content-area .onsale,
	.woocommerce .wooImage .button,
	.woocommerce .wooImage .added_to_cart,
	.woocommerce-error li a,
	.woocommerce-message a,
	.return-to-shop a,
	.wc-proceed-to-checkout .button.checkout-button,
	.widget_shopping_cart p.buttons a,
	.woocommerce .wishlist_table td.product-add-to-cart a,
	.woocommerce .content-area .woocommerce-tabs .tabs li.active a,
	.widget_price_filter .ui-slider .ui-slider-range,
	.widget_price_filter .ui-slider .ui-slider-handle,
	.elementareButton,
	.elementareButton.aboutus a,
	ul.elementare_sectionmap li span.text,
	.page-links a,
	.serviceText:after,
	.cursor.active,
	ul.elementare_sectionmap li:hover a span.box,
	ul.elementare_sectionmap li:focus a span.box,
	ul.elementare_sectionmap li:active a span.box,
	ul.elementare_sectionmap li.current-section a span.box,
	.elemMask:after {
		background-color: <?php echo esc_html($contentAccentColor); ?>;
	}
	blockquote,
	.navigation.pagination .nav-links span.current,
	.woocommerce-pagination > ul.page-numbers li span,
	.widget .widget-title h3,
	#wp-calendar tbody td#today,
	.woocommerce ul.products > li:hover,
	.woocommerce ul.products > li:focus,
	.woocommerce ul.products > li h2:after,
	ul.elementare_sectionmap li a span.box,
	.team_columns .elementareTeamSingle .elementareTeamDesc:before {
		border-color: <?php echo esc_html($contentAccentColor); ?>;
	}
	.elementare_contact.withForm .elementareContactForm,
	.features_columns_single {
		border-bottom-color: <?php echo esc_html($contentAccentColor); ?>;
	}
	.cursor  {
		box-shadow: 0px 0px 0px 3px <?php echo esc_html($contentAccentColor); ?>;
	}
	.elemMask {
		border-top-color: <?php echo esc_html($contentAccentColor); ?>;
	}
	.fLoader1 .loader__inner {
		box-shadow: 0 -10px 0 0 rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>, 0.7), -7.5px 5px 0 0 rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>, 0.6), 7.5px 5px 0 0 rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>, 0.5);
	}
	.fLoader1 .loader__inner:nth-child(2) {
		box-shadow: 7.5px -5px 0 0 rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>, 0.5), -7.5px -5px 0 0 rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>, 0.4), 0 10px 0 0 rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>, 0.3);
	}
	<?php
	/* Sidebar Push Accent Color */
	?>
	#tertiary.widget-area a {
		color: <?php echo esc_html($sidebarAccentColor); ?>;
	}
	#tertiary.widget-area .tagcloud a,
	#tertiary.widget-area button,
	#tertiary.widget-area input[type="button"],
	#tertiary.widget-area input[type="reset"],
	#tertiary.widget-area input[type="submit"],
	#tertiary.widget-area .widget_price_filter .ui-slider .ui-slider-range,
	#tertiary.widget-area .widget_price_filter .ui-slider .ui-slider-handle,
	#tertiary.widget-area #wp-calendar > caption {
		background-color: <?php echo esc_html($sidebarAccentColor); ?>;
	}
	#tertiary.widget-area .widget .widget-title h3,
	#tertiary.widget-area #wp-calendar tbody td#today {
		border-color: <?php echo esc_html($sidebarAccentColor); ?>;
	}
	<?php
	/* Footer Accent Color */
	?>
	footer.site-footer a {
		color: <?php echo esc_html($footerAccentColor); ?>;
	}
	.mainFooter .elementareFooterWidget .tagcloud a,
	.mainFooter .elementareFooterWidget button,
	.mainFooter .elementareFooterWidget input[type="button"],
	.mainFooter .elementareFooterWidget input[type="reset"],
	.mainFooter .elementareFooterWidget input[type="submit"],
	.mainFooter .elementareFooterWidget .widget_price_filter .ui-slider .ui-slider-range,
	.mainFooter .elementareFooterWidget .widget_price_filter .ui-slider .ui-slider-handle {
		background-color: <?php echo esc_html($footerAccentColor); ?>;
	}
	.mainFooter .elementareFooterWidget aside.footer .widget .widget-title h3,
	.mainFooter .elementareFooterWidget aside.footer #wp-calendar tbody td#today {
		border-color: <?php echo esc_html($footerAccentColor); ?>;
	}
	<?php
	/* Footer Background Color */
	?>
	footer.site-footer {
		background-color: <?php echo esc_html($footerBackgroundColor); ?>;
	}
	.mainFooter .elementareFooterWidget .tagcloud a,
	.mainFooter .elementareFooterWidget button,
	.mainFooter .elementareFooterWidget input[type="button"],
	.mainFooter .elementareFooterWidget input[type="reset"],
	.mainFooter .elementareFooterWidget input[type="submit"] {
		color: <?php echo esc_html($footerBackgroundColor); ?>;
	}
	<?php
	/* Footer Text Color */
	?>
	footer.site-footer {
		color: <?php echo esc_html($footerTextColor); ?>;
	}
	.mainFooter .elementareFooterWidget .tagcloud a:hover,
	.mainFooter .elementareFooterWidget .tagcloud a:focus,
	.mainFooter .elementareFooterWidget .tagcloud a:active {
		background-color: <?php echo esc_html($footerTextColor); ?>;
	}
	<?php
	/* Content Text Color */
	list($r, $g, $b) = sscanf($contentTextColor, '#%02x%02x%02x');
	?>
	body,
	input,
	select,
	optgroup,
	textarea,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="password"],
	input[type="search"],
	input[type="number"],
	input[type="tel"],
	input[type="range"],
	input[type="date"],
	input[type="month"],
	input[type="week"],
	input[type="time"],
	input[type="datetime"],
	input[type="datetime-local"],
	input[type="color"],
	textarea,
	a:hover,
	a:focus,
	a:active,
	.nav-links .meta-nav,
	.search-container input[type="search"],
	.hentry header.entry-header .entry-meta > span a,
	.hentry header.entry-header h2 a,
	.hentry footer.entry-footer span:not(.read-more) a,
	.site-social-float a {
		color: <?php echo esc_html($contentTextColor); ?>;
	}
	.woocommerce ul.products > li .price {
		color: <?php echo esc_html($contentTextColor); ?> !important;
	}
	.search-container ::-webkit-input-placeholder {
		color: <?php echo esc_html($contentTextColor); ?>;
	}
	.search-container ::-moz-placeholder {
		color: <?php echo esc_html($contentTextColor); ?>;
	}
	.search-container :-ms-input-placeholder {
		color: <?php echo esc_html($contentTextColor); ?>;
	}
	.search-container :-moz-placeholder {
		color: <?php echo esc_html($contentTextColor); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	button:active, button:focus,
	input[type="button"]:active,
	input[type="button"]:focus,
	input[type="reset"]:active,
	input[type="reset"]:focus,
	input[type="submit"]:active,
	input[type="submit"]:focus,
	.navigation.pagination .nav-links a:hover,
	.navigation.pagination .nav-links a:focus,
	.woocommerce-pagination > ul.page-numbers li a:hover,
	.woocommerce-pagination > ul.page-numbers li a:focus,
	.tagcloud a:hover,
	.tagcloud a:focus,
	.tagcloud a:active,
	footer.entry-footer span.read-more a:hover,
	footer.entry-footer span.read-more a:focus,
	a.more-link:hover,
	a.more-link:focus,
	.woocommerce ul.products > li:hover .wooImage .button,
	.woocommerce ul.products > li:hover .wooImage .added_to_cart,
	.woocommerce-error li a:hover,
	.woocommerce-message a:hover,
	.return-to-shop a:hover,
	.wc-proceed-to-checkout .button.checkout-button:hover,
	.widget_shopping_cart p.buttons a:hover,
	.elementareButton:hover,
	.elementareButton:focus,
	.elementareButton:active,
	.elementareButton.aboutus a:hover,
	.elementareButton.aboutus a:focus,
	.elementareButton.aboutus a:active,
	.page-links > .page-links-number {
		background-color: <?php echo esc_html($contentTextColor); ?>;
	}
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	select:focus {
		border-color: <?php echo esc_html($contentTextColor); ?>;
	}
	.inc-input .focus-bg {
		color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.6);
	}
	<?php
	/* Content Background Color */
	?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.navigation.pagination .nav-links .prev,
	.woocommerce-pagination > ul.page-numbers li a.prev,
	.navigation.pagination .nav-links .next,
	.woocommerce-pagination > ul.page-numbers li a.next,
	.navigation.pagination .nav-links a,
	.woocommerce-pagination > ul.page-numbers li a,
	#wp-calendar > caption,
	.tagcloud a,
	footer.entry-footer span.read-more a, a.more-link,
	#toTop,
	.content-area .onsale,
	.woocommerce .wooImage .button,
	.woocommerce .wooImage .added_to_cart,
	.woocommerce-error li a,
	.woocommerce-message a,
	.return-to-shop a,
	.wc-proceed-to-checkout .button.checkout-button,
	.widget_shopping_cart p.buttons a,
	.woocommerce .wishlist_table td.product-add-to-cart a,
	.woocommerce .content-area .woocommerce-tabs .tabs li.active a,
	.widget_price_filter .price_slider_amount .button,
	.woocommerce div.product form.cart .button,
	.elementareButton a, .elementareButton a:hover, .elementareButton a:focus, .elementareButton a:active,
	ul.elementare_sectionmap li span.text,
	.page-links a,
	.page-links a:hover,
	.page-links a:focus,
	.page-links a:active,
	.page-links > .page-links-number {
		color: <?php echo esc_html($contentBackgroundColor); ?>;
	}
	body,
	select,
	.elementareLoader,
	.site-social-float a,
	#page.site {
		background-color: <?php echo esc_html($contentBackgroundColor); ?>;
	}
	<?php
	/* Content Border Color */
	?>
	#wp-calendar th,
	header.page-header,
	.wp-caption .wp-caption-text,
	.woocommerce .content-area .woocommerce-tabs .tabs,
	.woocommerce-message,
	.woocommerce-info,
	.woocommerce-error,
	.woocommerce table.shop_attributes tr,
	.woocommerce table.shop_attributes tr th,
	.woocommerce-page .entry-content table thead th,
	.woocommerce-page .entry-content table tr:nth-child(even),
	#payment .payment_methods li .payment_box,
	.widget_price_filter .price_slider_wrapper .ui-widget-content {
		background-color: <?php echo esc_html($contentBorderColor); ?>;
	}
	.star-rating:before {
		color: <?php echo esc_html($contentBorderColor); ?>;
	}
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="password"],
	input[type="search"],
	input[type="number"],
	input[type="tel"],
	input[type="range"],
	input[type="date"],
	input[type="month"],
	input[type="week"],
	input[type="time"],
	input[type="datetime"],
	input[type="datetime-local"],
	input[type="color"],
	textarea,
	select,
	.site-main .post-navigation,
	#wp-calendar tbody td,
	aside ul.menu .indicatorBar,
	.hentry,
	#comments ol .pingback,
	#comments ol article,
	#comments .reply,
	.woocommerce ul.products > li,
	body.woocommerce form.cart,
	.woocommerce .product_meta,
	.woocommerce .single_variation,
	.woocommerce .woocommerce-tabs,
	.woocommerce #reviews #comments ol.commentlist li .comment-text,
	.woocommerce p.stars a.star-1,
	.woocommerce p.stars a.star-2,
	.woocommerce p.stars a.star-3,
	.woocommerce p.stars a.star-4,
	.single-product div.product .woocommerce-product-rating,
	.woocommerce-page .entry-content table,
	.woocommerce-page .entry-content table thead th,
	#order_review, #order_review_heading,
	#payment,
	#payment .payment_methods li,
	.widget_shopping_cart p.total,
	.site-social-float a,
	.entry-content table, .entry-content th, .entry-content td {
		border-color: <?php echo esc_html($contentBorderColor); ?>;
	}
	aside ul li,
	aside ul.menu li a {
		border-bottom-color: <?php echo esc_html($contentBorderColor); ?>;
	}
	<?php
	/* Push Sidebar Text Color */
	list($r, $g, $b) = sscanf($sidebarTextColor, '#%02x%02x%02x');
	?>
	#tertiary.widget-area,
	.close-hamburger,
	#tertiary.widget-area a:hover,
	#tertiary.widget-area a:focus,
	#tertiary.widget-area a:active {
		color: <?php echo esc_html($sidebarTextColor); ?>;
	}
	#tertiary.widget-area .tagcloud a:hover,
	#tertiary.widget-area .tagcloud a:focus,
	#tertiary.widget-area .tagcloud a:active,
	.close-ham-inner:before,
	.close-ham-inner:after,
	.nano > .nano-pane > .nano-slider {
		background-color: <?php echo esc_html($sidebarTextColor); ?>;
	}
	.nano > .nano-pane {
		background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.15);
	}
	.nano > .nano-pane > .nano-slider {
		background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.3);
	}
	<?php
	/* Push Sidebar Background Color */
	?>
	#tertiary.widget-area {
		background-image: linear-gradient(45deg, <?php echo esc_html($sidebarBackgroundColor); ?>, <?php echo esc_html($sidebarBackgroundColorTwo); ?>);
	}
	#tertiary.widget-area .tagcloud a,
	#tertiary.widget-area button,
	#tertiary.widget-area input[type="button"],
	#tertiary.widget-area input[type="reset"],
	#tertiary.widget-area input[type="submit"] {
		color: <?php echo esc_html($sidebarBackgroundColor); ?>;
	}
	<?php
	/* One page colors settings */
	if (is_page_template('template-onepage.php')) {
		$showSlider = elementare_options('_onepage_section_slider', '');
		$showAboutus = elementare_options('_onepage_section_aboutus', '');
		$showFeatures = elementare_options('_onepage_section_features', '');
		$showSkills = elementare_options('_onepage_section_skills', '');
		$showCta = elementare_options('_onepage_section_cta', '');
		$showServices = elementare_options('_onepage_section_services', '');
		$showBlog = elementare_options('_onepage_section_blog', '');
		$showTeam = elementare_options('_onepage_section_team', '');
		$showContact = elementare_options('_onepage_section_contact', '');
		if ($showSlider == 1) {
			$sliderColorBackFirst = elementare_options('_onepage_imgcolor_slider_first', '#6ee004');
			$sliderColorBackSecond = elementare_options('_onepage_imgcolor_slider_second', '#00d0f9');
			$sliderColorText = elementare_options('_onepage_textcolor_slider', '#f5f5f5');
			list($r1, $g1, $b1) = sscanf($sliderColorBackFirst, '#%02x%02x%02x');
			list($r2, $g2, $b2) = sscanf($sliderColorBackSecond, '#%02x%02x%02x');
			?>
			<?php if (!empty($sliderColorBackFirst) ) : ?>
				.flexslider .slides > li .flexText {
					background-image: linear-gradient(45deg, rgba(<?php echo esc_html($r1).', '.esc_html($g1).', '.esc_html($b1); ?>,0.6) , rgba(<?php echo esc_html($r2).', '.esc_html($g2).', '.esc_html($b2); ?>,0.6));
				}
			<?php endif; ?>
			<?php if (!empty($sliderColorText) ) : ?>
				.flexslider .slides > li .flexText .inside, .flex-direction-nav a {
					color: <?php echo esc_html($sliderColorText); ?>;
				}
				.scrollDown .mouse {
					border-color: <?php echo esc_html($sliderColorText); ?>;
				}
				.scrollDown .mouse:before {
					background-color: <?php echo esc_html($sliderColorText); ?>;
				}
			<?php endif; ?>
			<?php
		}
		if ($showAboutus == 1) {
			$aboutusImageBack = elementare_options('_onepage_imgback_aboutus');
			$aboutusColorBackFirst = elementare_options('_onepage_imgcolor_aboutus_first', '#f5f5f5');
			$aboutusColorBackSecond = elementare_options('_onepage_imgcolor_aboutus_second', '#f5f5f5');
			$aboutusColorText = elementare_options('_onepage_textcolor_aboutus', '#121212');
			?>
			<?php if (!empty($aboutusImageBack) ) : ?>
				section.elementare_aboutus {
					background-image: url(<?php echo esc_url($aboutusImageBack); ?>);
				}
			<?php else: ?>
				.elementare_aboutus_color {
					opacity : 1;
				}
			<?php endif; ?>
			<?php if (!empty($aboutusColorBackFirst) ) : ?>
				.elementare_aboutus_color {
					background-image: linear-gradient(45deg, <?php echo esc_html($aboutusColorBackFirst); ?>, <?php echo esc_html($aboutusColorBackSecond); ?>);
				}
			<?php endif; ?>
			<?php if (!empty($aboutusColorText) ) : ?>
				section.elementare_aboutus {
					color: <?php echo esc_html($aboutusColorText); ?>;
				}
			<?php endif; ?>
		<?php
		}
		if ($showFeatures == 1) {
			$featuresImageBack = elementare_options('_onepage_imgback_features');
			$featuresColorBackFirst = elementare_options('_onepage_imgcolor_features_first', '#121212');
			$featuresColorBackSecond = elementare_options('_onepage_imgcolor_features_second', '#121212');
			$featuresColorText = elementare_options('_onepage_textcolor_features', '#f5f5f5');
			$featuresColorBackInner = elementare_options('_onepage_imgcolor_features_inner', '#f5f5f5');
			$featuresColorTextInner = elementare_options('_onepage_textcolor_features_inner', '#121212');
			?>
				<?php if (!empty($featuresImageBack) ) : ?>
					section.elementare_features {
						background-image: url(<?php echo esc_url($featuresImageBack); ?>);
					}
				<?php else: ?>
					.elementare_features_color  {
						opacity : 1;
					}
				<?php endif; ?>
				<?php if (!empty($featuresColorBackFirst) ) : ?>
					.elementare_features_color {
						background-image: linear-gradient(45deg, <?php echo esc_html($featuresColorBackFirst); ?>, <?php echo esc_html($featuresColorBackSecond); ?>);
					}
				<?php endif; ?>
				<?php if (!empty($featuresColorText) ) : ?>
					section.elementare_features {
						color: <?php echo esc_html($featuresColorText); ?>;
					}
				<?php endif; ?>
				<?php if (!empty($featuresColorBackInner) ) : ?>
					.features_columns_single, .features_columns_single:hover .featuresIcon i, .features_columns_single:focus .featuresIcon i, .features_columns_single:active .featuresIcon i {
						background-color: <?php echo esc_html($featuresColorBackInner); ?>;
					}
					.features_columns_single .featuresIcon i {
						color: <?php echo esc_html($featuresColorBackInner); ?>;
					}
				<?php endif; ?>
				<?php if (!empty($featuresColorTextInner) ) : ?>
					.features_columns_single, .features_columns_single:hover .featuresIcon i, .features_columns_single:focus .featuresIcon i, .features_columns_single:active .featuresIcon i {
						color: <?php echo esc_html($featuresColorTextInner); ?>;
					}
					.features_columns_single .featuresIcon i {
						background-color: <?php echo esc_html($featuresColorTextInner); ?>;
					}
				<?php endif; ?>
			<?php
		}
		if ($showSkills == 1) {
			$skillsImageBack = elementare_options('_onepage_imgback_skills');
			$skillsColorBackFirst = elementare_options('_onepage_imgcolor_skills_first', '#f5f5f5');
			$skillsColorBackSecond = elementare_options('_onepage_imgcolor_skills_second', '#f5f5f5');
			$skillsColorText = elementare_options('_onepage_textcolor_skills', '#121212');
			?>
				<?php if (!empty($skillsImageBack) ) : ?>
					section.elementare_skills {
						background-image: url(<?php echo esc_url($skillsImageBack); ?>);
					}
				<?php else: ?>
					.elementare_skills_color  {
						opacity : 1;
					}
				<?php endif; ?>
				<?php if (!empty($skillsColorBackFirst) ) : ?>
					.elementare_skills_color {
						background-image: linear-gradient(45deg, <?php echo esc_html($skillsColorBackFirst); ?>, <?php echo esc_html($skillsColorBackSecond); ?>);
					}
				<?php endif; ?>
				<?php if (!empty($skillsColorText) ) : ?>
					section.elementare_skills {
						color: <?php echo esc_html($skillsColorText); ?>;
					}
					.skillBottom .skillBar, .skillBottom .skillRealBar, .skillBottom .skillRealBarCyrcle {
						background: <?php echo esc_html($skillsColorText); ?>;
					}
				<?php endif; ?>
			<?php
		}
		if ($showCta == 1) {
			$ctaImageBack = elementare_options('_onepage_imgback_cta');
			$ctaColorBackFirst = elementare_options('_onepage_imgcolor_cta_first', '#121212');
			$ctaColorBackSecond = elementare_options('_onepage_imgcolor_cta_second', '#121212');
			$ctaColorText = elementare_options('_onepage_textcolor_cta', '#f5f5f5');
			?>
				<?php if (!empty($ctaImageBack) ) : ?>
					section.elementare_cta {
						background-image: url(<?php echo esc_url($ctaImageBack); ?>);
					}
				<?php else: ?>
					.elementare_cta_color {
						opacity : 1;
					}
				<?php endif; ?>
				<?php if (!empty($ctaColorBackFirst) ) : ?>
					section.elementare_cta:hover .cta_columns .ctaIcon i, section.elementare_cta:focus .cta_columns .ctaIcon i, section.elementare_cta:active .cta_columns .ctaIcon i {
						background-color: <?php echo esc_html($ctaColorBackFirst); ?>;
					}
					.elementare_cta_color {
						background-image: linear-gradient(45deg, <?php echo esc_html($ctaColorBackFirst); ?>, <?php echo esc_html($ctaColorBackSecond); ?>);
					}
					.cta_columns .ctaIcon i {
						color: <?php echo esc_html($ctaColorBackFirst); ?>;
					}
				<?php endif; ?>
				<?php if (!empty($ctaColorText) ) : ?>
					section.elementare_cta, section.elementare_cta:hover .cta_columns .ctaIcon i, section.elementare_cta:focus .cta_columns .ctaIcon i, section.elementare_cta:active .cta_columns .ctaIcon i {
						color: <?php echo esc_html($ctaColorText); ?>;
					}
					.cta_columns .ctaIcon i {
						background: <?php echo esc_html($ctaColorText); ?>;
					}
				<?php endif; ?>
			<?php
		}
		if ($showServices == 1) {
			$servicesImageBack = elementare_options('_onepage_imgback_services');
			$servicesColorBackFirst = elementare_options('_onepage_imgcolor_services_first', '#f5f5f5');
			$servicesColorBackSecond = elementare_options('_onepage_imgcolor_services_second', '#f5f5f5');
			$servicesColorText = elementare_options('_onepage_textcolor_services', '#121212');
			?>
				<?php if (!empty($servicesImageBack) ) : ?>
					section.elementare_services {
						background-image: url(<?php echo esc_url($servicesImageBack); ?>);
					}
				<?php else: ?>
					.elementare_services_color {
						opacity : 1;
					}
				<?php endif; ?>
				<?php if (!empty($servicesColorBackFirst) ) : ?>
					.services_columns .singleService:hover .serviceIcon i, .services_columns .singleService:focus .serviceIcon i, .services_columns .singleService:active .serviceIcon i {
						background-color: <?php echo esc_html($servicesColorBackFirst); ?>;
					}
					.serviceIcon i, .services_columns_single .serviceContent {
						color: <?php echo esc_html($servicesColorBackFirst); ?>;
					}
					.elementare_services_color {
						background-image: linear-gradient(45deg, <?php echo esc_html($servicesColorBackFirst); ?>, <?php echo esc_html($servicesColorBackSecond); ?>);
					}
				<?php endif; ?>
				<?php if (!empty($servicesColorText) ) : ?>
					section.elementare_services, .services_columns .singleService:hover .serviceIcon i, .services_columns .singleService:focus .serviceIcon i, .services_columns .singleService:active .serviceIcon i {
						color: <?php echo esc_html($servicesColorText); ?>;
					}
					.serviceIcon i {
						background: <?php echo esc_html($servicesColorText); ?>;
					}
					.services_columns_single.two .serviceColumnSingleColor {
						background-color: <?php echo esc_html($servicesColorText); ?>;
					}
				<?php endif; ?>
			<?php
		}
		if ($showBlog == 1) {
			$blogImageBack = elementare_options('_onepage_imgback_blog');
			$blogColorBackFirst = elementare_options('_onepage_imgcolor_blog_first', '#f5f5f5');
			$blogColorBackSecond = elementare_options('_onepage_imgcolor_blog_second', '#f5f5f5');
			$blogColorText = elementare_options('_onepage_textcolor_blog', '#121212');
			?>
				<?php if (!empty($blogImageBack) ) : ?>
					section.elementare_blog {
						background-image: url(<?php echo esc_url($blogImageBack); ?>);
					}
				<?php else: ?>
					.elementare_blog_color {
						opacity : 1;
					}
				<?php endif; ?>
				<?php if (!empty($blogColorBackFirst) ) : ?>
					.elementare_blog_color {
						background-image: linear-gradient(45deg, <?php echo esc_html($blogColorBackFirst); ?>, <?php echo esc_html($blogColorBackSecond); ?>);
					}
				<?php endif; ?>
				<?php if (!empty($blogColorText) ) : ?>
					section.elementare_blog,
					.elementareBlogSingle h2 a,
					.elementareBlogSingle h2 a:hover,
					.elementareBlogSingle h2 a:focus,
					.elementareBlogSingle h2 a:active {
						color: <?php echo esc_html($blogColorText); ?>;
					}
				<?php endif; ?>
			<?php
		}
		if ($showTeam == 1) {
			$teamImageBack = elementare_options('_onepage_imgback_team');
			$teamColorBackFirst = elementare_options('_onepage_imgcolor_team_first', '#f5f5f5');
			$teamColorBackSecond = elementare_options('_onepage_imgcolor_team_second', '#f5f5f5');
			$teamColorText = elementare_options('_onepage_textcolor_team', '#121212');
			?>
				<?php if (!empty($teamImageBack) ) : ?>
					section.elementare_team {
						background-image: url(<?php echo esc_url($teamImageBack); ?>);
					}
				<?php else: ?>
					.elementare_team_color {
						opacity : 1;
					}
				<?php endif; ?>
				<?php if (!empty($teamColorBackFirst) ) : ?>
					.elementare_team_color {
						background-image: linear-gradient(45deg, <?php echo esc_html($teamColorBackFirst); ?>, <?php echo esc_html($teamColorBackSecond); ?>);
					}
				<?php endif; ?>
				<?php if (!empty($teamColorText) ) : ?>
					section.elementare_team {
						color: <?php echo esc_html($teamColorText); ?>;
					}
				<?php endif; ?>
			<?php
		}
		if ($showContact == 1) {
			$contactImageBack = elementare_options('_onepage_imgback_contact');
			$contactColorBackFirst = elementare_options('_onepage_imgcolor_contact_first', '#121212');
			$contactColorBackSecond = elementare_options('_onepage_imgcolor_contact_second', '#121212');
			$contactColorText = elementare_options('_onepage_textcolor_contact', '#f5f5f5');
			$contactColorBackForm = elementare_options('_onepage_imgcolor_contact_form', '#f5f5f5');
			$contactColorTextForm = elementare_options('_onepage_textcolor_contact_form', '#121212');
			?>
				<?php if (!empty($contactImageBack) ) : ?>
					section.elementare_contact {
						background-image: url(<?php echo esc_url($contactImageBack); ?>);
					}
				<?php else: ?>
					.elementare_contact_color {
						opacity : 1;
					}
				<?php endif; ?>
				<?php if (!empty($contactColorBackFirst) ) : ?>
					.elementare_contact_color {
						background-image: linear-gradient(45deg, <?php echo esc_html($contactColorBackFirst); ?>, <?php echo esc_html($contactColorBackSecond); ?>);
					}
					.elementareCompanyAddress1Icon,
					.elementareCompanyPhoneIcon,
					.elementareCompanyFaxIcon,
					.elementareCompanyEmailIcon {
						color: <?php echo esc_html($contactColorBackFirst); ?>;
					}
				<?php endif; ?>
				<?php if (!empty($contactColorText) ) : ?>
					section.elementare_contact {
						color: <?php echo esc_html($contactColorText); ?>;
						border-color: <?php echo esc_html($contactColorText); ?>;
					}
					.elementareCompanyAddress1Icon,
					.elementareCompanyPhoneIcon,
					.elementareCompanyFaxIcon,
					.elementareCompanyEmailIcon {
						background: <?php echo esc_html($contactColorText); ?>;
					}
				<?php endif; ?>
				<?php if (!empty($contactColorBackForm) ) : ?>
					.elementare_contact.withForm .elementareContactForm,
					.contact_columns .elementareContactForm input:not([type="submit"]),
					.contact_columns .elementareContactForm textarea {
						background-color: <?php echo esc_html($contactColorBackForm); ?>;
					}
				<?php endif; ?>
				<?php if (!empty($contactColorTextForm) ) : ?>
					.contact_columns .elementareContactForm input:not([type="submit"]),
					.contact_columns .elementareContactForm input:not([type="submit"]):focus,
					.contact_columns .elementareContactForm textarea,
					.contact_columns .elementareContactForm textarea:focus {
						color: <?php echo esc_html($contactColorTextForm); ?>;
						border-color: <?php echo esc_html($contactColorTextForm); ?>;
					}
					.elementare_contact.withForm .elementareContactForm {
						color: <?php echo esc_html($contactColorTextForm); ?>;
					}
				<?php endif; ?>
			<?php
		}
	}
	echo '</style>';
}
add_action('wp_head', 'elementare_custom_css_styles');

