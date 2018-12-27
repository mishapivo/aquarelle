<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 */

/**
 * Get all the default values of the theme mods.
 */
function reblog_get_default_mods() {
	$reblog_default_mods = array(
		// Blog section
		'reblog_blog_section_title' => esc_html__( 'Stay Updated. Happening Now.', 'reblog' ),
		'reblog_blog_section_sub_title' => esc_html__( 'Latest Blog', 'reblog' ),

	);

	return apply_filters( 'reblog_default_mods', $reblog_default_mods );
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function reblog_customize_register( $wp_customize ) {

	/**
	 * The radio image customize control extends the WP_Customize_Control class.  This class allows
	 * developers to create a list of image radio inputs.
	 *
	 * Note, the `$choices` array is slightly different than normal and should be in the form of
	 * `array(
		 *	$value => array( 'color' => $color_value ),
		 *	$value => array( 'color' => $color_value ),
	 * )`
	 *
	 */
	
	$default = reblog_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'reblog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'reblog_customize_partial_blogdescription',
		) );
	}

	/**
	 *
	 * 
	 * Header panel
	 *
	 * 
	 */
	// Header panel
	$wp_customize->add_panel(
		'reblog_header_panel',
		array(
			'title' => esc_html__( 'Header', 'reblog' ),
			'priority' => 100
		)
	);

	$wp_customize->get_section( 'title_tagline' )->panel         = 'reblog_header_panel';

	// Header text display setting
	$wp_customize->add_setting(	
		'reblog_header_text_display',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => true,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'reblog_header_text_display',
		array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Site Title and Tagline', 'reblog' ),
		)
	);

	// Header section
	$wp_customize->add_section(
		'reblog_header_section',
		array(
			'title' => esc_html__( 'Header', 'reblog' ),
			'panel' => 'reblog_header_panel',
		)
	);

	// Header search form settings
	$wp_customize->add_setting(
		'reblog_show_search',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => true
		)
	);

	$wp_customize->add_control(
		'reblog_show_search',
		array(
			'section'		=> 'reblog_header_section',
			'label'			=> esc_html__( 'Show search.', 'reblog' ),
			'type'			=> 'checkbox',
		)
	);

	/**
	 *
	 * General settings panel
	 * 
	 */
	// General settings panel
	$wp_customize->add_panel(
		'reblog_general_panel',
		array(
			'title' => esc_html__( 'Advanced Settings', 'reblog' ),
			'priority' => 107
		)
	);

	$wp_customize->get_section( 'colors' )->panel = 'reblog_general_panel';
	
	// Header title color setting
	$wp_customize->add_setting(	
		'reblog_header_title_color',
		array(
			'sanitize_callback' => 'reblog_sanitize_hex_color',
			'default' => '#fff',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'reblog_header_title_color',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site title Color:', 'reblog' ),
			)
		)
	);

	// Header tagline color setting
	$wp_customize->add_setting(	
		'reblog_header_tagline',
		array(
			'sanitize_callback' => 'reblog_sanitize_hex_color',
			'default' => '#fff',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'reblog_header_tagline',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site tagline Color:', 'reblog' ),
			)
		)
	);
	

	$wp_customize->get_section( 'background_image' )->panel         = 'reblog_general_panel';
	$wp_customize->get_section( 'custom_css' )->panel         = 'reblog_general_panel';

	/**
	 * General settings
	 */
	// General settings
	$wp_customize->add_section(
		'reblog_general_section',
		array(
			'title' => esc_html__( 'General', 'reblog' ),
			'panel' => 'reblog_general_panel',
		)
	);

	// Backtop enable setting
	$wp_customize->add_setting(
		'reblog_back_to_top_enable',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'reblog_back_to_top_enable',
		array(
			'section'		=> 'reblog_general_section',
			'label'			=> esc_html__( 'Enable Scroll up.', 'reblog' ),
			'type'			=> 'checkbox',
		)
	);

	/**
	 * Global Layout
	 */
	// Global Layout
	$wp_customize->add_section(
		'reblog_global_layout',
		array(
			'title' => esc_html__( 'Global Layout', 'reblog' ),
			'panel' => 'reblog_general_panel',
		)
	);


	// Global page layout setting
	$wp_customize->add_setting(
		'reblog_global_page_layout',
		array(
			'sanitize_callback' => 'reblog_sanitize_select',
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'reblog_global_page_layout',
		array(
			'section'		=> 'reblog_global_layout',
			'label'			=> esc_html__( 'Global page sidebar', 'reblog' ),
			'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'reblog' ),
			'type'			=> 'radio',
			'choices'		=> array( 
				'right' => esc_html__( 'Right', 'reblog' ), 
				'no' => esc_html__( 'No Sidebar', 'reblog' ), 
			),
		)
	);

	// Global post layout setting
	$wp_customize->add_setting(
		'reblog_global_post_layout',
		array(
			'sanitize_callback' => 'reblog_sanitize_select',
			'default' => 'right',
		)
	);

	$wp_customize->add_control(
		'reblog_global_post_layout',
		array(
			'section'		=> 'reblog_global_layout',
			'label'			=> esc_html__( 'Global post sidebar', 'reblog' ),
			'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'reblog' ),
			'type'			=> 'radio',
			'choices'		=> array( 
				'right' => esc_html__( 'Right', 'reblog' ), 
				'no' => esc_html__( 'No Sidebar', 'reblog' ), 
			),
		)
	);

	/**
	 * Blog/Archive section 
	 */
	// Blog/Archive section 
	$wp_customize->add_section(
		'reblog_archive_settings',
		array(
			'title' => esc_html__( 'Archive/Blog', 'reblog' ),
			'description' => esc_html__( 'Settings for archive pages including blog page too.', 'reblog' ),
			'panel' => 'reblog_general_panel',
		)
	);

	// Archive excerpt length setting
	$wp_customize->add_setting(
		'reblog_archive_excerpt_length',
		array(
			'sanitize_callback' => 'reblog_sanitize_number_range',
			'default' => 60,
		)
	);

	$wp_customize->add_control(
		'reblog_archive_excerpt_length',
		array(
			'section'		=> 'reblog_archive_settings',
			'label'			=> esc_html__( 'Excerpt more length:', 'reblog' ),
			'type'			=> 'number',
			'input_attrs'   => array( 'min' => 5 ),
		)
	);

	// Pagination type setting
	$wp_customize->add_setting(
		'reblog_archive_pagination_type',
		array(
			'sanitize_callback' => 'reblog_sanitize_select',
			'default' => 'numeric',
		)
	);

	$archive_pagination_description = '';
	$archive_pagination_choices = array( 
				'disable' => esc_html__( '--Disable--', 'reblog' ),
				'numeric' => esc_html__( 'Numeric', 'reblog' ),
				'older_newer' => esc_html__( 'Older / Newer', 'reblog' ),
			);
	$wp_customize->add_control(
		'reblog_archive_pagination_type',
		array(
			'section'		=> 'reblog_archive_settings',
			'label'			=> esc_html__( 'Pagination type:', 'reblog' ),
			'description'			=>  $archive_pagination_description,
			'type'			=> 'select',
			'choices'		=> $archive_pagination_choices,
		)
	);


	/**
	 * Single setting section 
	 */
	// Single setting section 
	$wp_customize->add_section(
		'reblog_single_settings',
		array(
			'title' => esc_html__( 'Single Posts', 'reblog' ),
			'description' => esc_html__( 'Settings for all single posts.', 'reblog' ),
			'panel' => 'reblog_general_panel',
		)
	);

	// Featured image enable setting
	$wp_customize->add_setting(
		'reblog_enable_single_featured_img',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'reblog_enable_single_featured_img',
		array(
			'section'		=> 'reblog_single_settings',
			'label'			=> esc_html__( 'Enable featured image.', 'reblog' ),
			'type'			=> 'checkbox',
		)
	);

	// Pagination enable setting
	$wp_customize->add_setting(
		'reblog_enable_single_pagination',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'reblog_enable_single_pagination',
		array(
			'section'		=> 'reblog_single_settings',
			'label'			=> esc_html__( 'Enable pagination.', 'reblog' ),
			'type'			=> 'checkbox',
		)
	);

	/**
	 * Single pages setting section 
	 */
	// Single pages setting section 
	$wp_customize->add_section(
		'reblog_single_page_settings',
		array(
			'title' => esc_html__( 'Single Pages', 'reblog' ),
			'description' => esc_html__( 'Settings for all single pages.', 'reblog' ),
			'panel' => 'reblog_general_panel',
		)
	);

	// Featured image enable setting
	$wp_customize->add_setting(
		'reblog_enable_single_page_featured_img',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'reblog_enable_single_page_featured_img',
		array(
			'section'		=> 'reblog_single_page_settings',
			'label'			=> esc_html__( 'Enable featured image.', 'reblog' ),
			'type'			=> 'checkbox',
		)
	);

	// Pagination enable setting
	$wp_customize->add_setting(
		'reblog_enable_single_page_pagination',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => false,
		)
	);

	$wp_customize->add_control(
		'reblog_enable_single_page_pagination',
		array(
			'section'		=> 'reblog_single_page_settings',
			'label'			=> esc_html__( 'Enable pagination.', 'reblog' ),
			'type'			=> 'checkbox',
		)
	);

	/**
	 * Reset all settings
	 */
	// Reset settings section
	$wp_customize->add_section(
		'reblog_reset_sections',
		array(
			'title' => esc_html__( 'Reset all', 'reblog' ),
			'description' => esc_html__( 'Reset all settings to default.', 'reblog' ),
			'panel' => 'reblog_general_panel',
		)
	);

	/**
	 *
	 *
	 * Footer copyright
	 *
	 *
	 */
	// Footer copyright
	$wp_customize->add_section(
		'reblog_footer_section',
		array(
			'title' => esc_html__( 'Footer', 'reblog' ),
			'priority' => 106,
			// 'panel' => 'reblog_general_panel',
		)
	);

	// Footer social menu enable setting
	$wp_customize->add_setting(
		'reblog_enable_footer_social_menu',
		array(
			'sanitize_callback' => 'reblog_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'reblog_enable_footer_social_menu',
		array(
			'section'		=> 'reblog_footer_section',
			'label'			=> esc_html__( 'Enable social menu.', 'reblog' ),
			'type'			=> 'checkbox',
		)
	);
}
add_action( 'customize_register', 'reblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function reblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function reblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function reblog_customize_preview_js() {
	wp_enqueue_script( 'reblog-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'reblog_customize_preview_js' );


/**
 *
 * Sanitization callbacks.
 * 
 */

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function reblog_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * HEX Color sanitization callback example.
 *
 * - Sanitization: hex_color
 * - Control: text, WP_Customize_Color_Control
 *
 */
function reblog_sanitize_hex_color( $hex_color, $setting ) {
	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
}


/**
 * Select sanitization callback example.
 *
 * - Sanitization: select, multiple-select
 * - Control: select, radio
 */
function reblog_sanitize_select( $input, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	if ( is_array( $input ) ) {
		foreach ( $input as $value ) {
		// Ensure input is a slug.
			$value = sanitize_key( $value );
			
			if ( ! array_key_exists( $value, $choices ) ) {
            	return $setting->default;
        	}
		}
	} else {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		
		if ( ! array_key_exists( $input, $choices ) ) {
        	return $setting->default;
    	}
	}

	return $input;
}

/**
 * Drop-down Pages sanitization callback example.
 *
 * - Sanitization: dropdown-pages
 * - Control: dropdown-pages
 * 
 */
function reblog_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/**
 * Number Range sanitization callback example.
 *
 * - Sanitization: number_range
 * - Control: number, tel
 * 
 */
function reblog_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * HTML sanitization callback example.
 *
 * - Sanitization: html
 * - Control: text, textarea
 *
 * @param string $html HTML to sanitize.
 * @return string Sanitized HTML.
 */
function reblog_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

