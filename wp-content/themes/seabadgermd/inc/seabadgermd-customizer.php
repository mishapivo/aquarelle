<?php

function seabadgermd_customize_register( $wp_customize ) {
	/* Color theme selector */
	$wp_customize->add_setting(
		'seabadgermd_color_theme', array(
			'default' => 'mdb_dark',
			'sanitize_callback' => 'seabadgermd_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_color_theme', array(
			'type' => 'select',
			'priority' => 10,
			'section' => 'colors',
			'label' => esc_html__( 'Color theme', 'seabadgermd' ),
			'description' => esc_html__( 'Defines tone of the theme', 'seabadgermd' ),
			'choices' => seabadgermd_get_color_theme_names(),
		)
	);

	$wp_customize->add_section(
		'navbar', array(
			'title' => esc_html__( 'Navigation bar', 'seabadgermd' ),
			'priority' => 20,
		)
	);
	/* Display/remove navigation bar */
	$wp_customize->add_setting(
		'seabadgermd_navbar_remove', array(
			'default' => false,
			'sanitize_callback' => 'seabadgermd_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_navbar_remove', array(
			'type' => 'checkbox',
			'section' => 'navbar',
			'label' => esc_html__( 'Hide navigation bar', 'seabadgermd' ),
			'description' => esc_html__( 'Hide top navigation bar', 'seabadgermd' ),
		)
	);
	/* Search form in navigation bar */
	$wp_customize->add_setting(
		'seabadgermd_navbar_search', array(
			'default' => 'show',
			'sanitize_callback' => 'seabadgermd_sanitize_showhide',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_navbar_search', array(
			'type' => 'radio',
			'section' => 'navbar',
			'label' => esc_html__( 'Search bar', 'seabadgermd' ),
			'description' => esc_html__( 'Show search form in navigation bar', 'seabadgermd' ),
			'choices' => array(
				'show' => esc_html__( 'Show', 'seabadgermd' ),
				'hide' => esc_html__( 'Hide', 'seabadgermd' ),
			),
		)
	);
	/* Navbar fix on top */
	$wp_customize->add_setting(
		'seabadgermd_navbar_fixing', array(
			'default' => 'on',
			'sanitize_callback' => 'seabadgermd_sanitize_onoff',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_navbar_fixing', array(
			'type' => 'radio',
			'section' => 'navbar',
			'label' => esc_html__( 'Navbar fixed on top', 'seabadgermd' ),
			'description' => esc_html__( 'Fix the navigation bar on the top of the screen', 'seabadgermd' ),
			'choices' => array(
				'on' => esc_html__( 'Fixed', 'seabadgermd' ),
				'off' => esc_html__( 'Scrolling', 'seabadgermd' ),
			),
		)
	);
	/* Hide/show navbar on scroll*/
	$wp_customize->add_setting(
		'seabadgermd_navbar_transparent', array(
			'default' => true,
			'sanitize_callback' => 'seabadgermd_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_navbar_transparent', array(
			'type' => 'checkbox',
			'section' => 'navbar',
			'label' => esc_html__( 'Transparent navbar', 'seabadgermd' ),
			'description' => esc_html__( 'Hide/show the main navigation bar on scroll (when fixed)', 'seabadgermd' ),
		)
	);

	/* Navbar brand */
	$wp_customize->add_setting(
		'seabadgermd_navbar_brand', array(
			'default' => 'off',
			'sanitize_callback' => 'seabadgermd_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_navbar_brand', array(
			'type' => 'select',
			'priority' => 10,
			'section' => 'navbar',
			'label' => esc_html__( 'Navbar brand', 'seabadgermd' ),
			'description' => esc_html__( 'Display brand in navigation bar', 'seabadgermd' ),
			'choices' => array(
				'off' => esc_html__( 'Off', 'seabadgermd' ),
				'title' => esc_html__( 'Blog name', 'seabadgermd' ),
				'logo' => esc_html__( 'Site logo', 'seabadgermd' ),
				'custom' => esc_html__( 'Custom text', 'seabadgermd' ),
				'custom_logo' => esc_html__( 'Custom logo', 'seabadgermd' ),
			),
		)
	);

	/* Custom text in navbar brand */
	$wp_customize->add_setting(
		'seabadgermd_navbar_brand_text', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_navbar_brand_text', array(
			'type' => 'text',
			'priority' => 10,
			'section' => 'navbar',
			'label' => esc_html__( 'Brand custom text', 'seabadgermd' ),
			'description' => esc_html__( 'Display this text if custom text is selected', 'seabadgermd' ),
		)
	);

	/* Custom logo in navbar brand */
	$wp_customize->add_setting(
		'seabadgermd_navbar_brand_logo', array(
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize,
		'seabadgermd_navbar_brand_logo',
		array(
			'section' => 'navbar',
			'label' => esc_html__( 'Brand custom logo', 'seabadgermd' ),
			'description' => esc_html__( 'Custom logo to display, maximum height 30px', 'seabadgermd' ),
			'height' => 30,
			'width' => 60,
			'flex-width' => true,
		)
	));

	/* Breadcrumb section */
	$wp_customize->add_section(
		'seabadgermd_breadcrumb', array(
			'title' => esc_html__( 'Breadcrumb', 'seabadgermd' ),
			'priority' => 20,
		)
	);
	$wp_customize->add_setting(
		'seabadgermd_breadcrumb_show', array(
			'default' => false,
			'sanitize_callback' => 'seabadgermd_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_breadcrumb_show', array(
			'type' => 'checkbox',
			'section' => 'seabadgermd_breadcrumb',
			'label' => esc_html__( 'Display breadcrumb', 'seabadgermd' ),
		)
	);
	$wp_customize->add_setting(
		'seabadgermd_breadcrumb_home', array(
			'default' => 'Homepage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'seabadgermd_breadcrumb_home', array(
			'type' => 'text',
			'section' => 'seabadgermd_breadcrumb',
			'label' => esc_html__( 'Homepage text', 'seabadgermd' ),
			'description' => esc_html__( 'Text of the link pointing to the homepage', 'seabadgermd' ),
		)
	);
	/* /Breadcrumb section */
}
add_action( 'customize_register', 'seabadgermd_customize_register' );

/* Custom sanitizers */
function seabadgermd_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function seabadgermd_sanitize_checkbox( $input ) {
	if ( is_bool( $input ) ) {
		return $input;
	}
	return false;
}

function seabadgermd_sanitize_showhide( $input ) {
	$choices = array( 'show', 'hide' );
	if ( in_array( $input, $choices, true ) ) {
		return $input;
	} else {
		return '';
	}
}

function seabadgermd_sanitize_onoff( $input ) {
	$choices = array( 'on', 'off', true );
	if ( in_array( $input, $choices ) ) {
		return $input;
	} else {
		return '';
	}
}

/* /Custom sanitizers */

/* Color theme definition / helper functions */
if ( ! function_exists( 'seabadgermd_get_color_themes' ) ) {
	function seabadgermd_get_color_themes() {
		$color_themes = array(
			'mdb_dark' => array(
				'name' => esc_html__( 'Dark', 'seabadgermd' ),
				'css' => '/css/themes/mdb_dark.css',
				'style' => 'dark',
			),
			'mdb_blue' => array(
				'name' => esc_html__( 'Blue', 'seabadgermd' ),
				'css' => '/css/themes/mdb_blue.css',
				'style' => 'dark',
			),
			'mdb_light' => array(
				'name' => esc_html__( 'Light', 'seabadgermd' ),
				'css' => '/css/themes/mdb_light.css',
				'style' => 'light',
			),
			'mdb_brown' => array(
				'name' => esc_html__( 'Brown', 'seabadgermd' ),
				'css' => '/css/themes/mdb_brown.css',
				'style' => 'dark',
			),
			'mdb_red' => array(
				'name' => esc_html__( 'Red', 'seabadgermd' ),
				'css' => '/css/themes/mdb_red.css',
				'style' => 'dark',
			),
			'mdb_green' => array(
				'name' => esc_html__( 'Green', 'seabadgermd' ),
				'css' => '/css/themes/mdb_green.css',
				'style' => 'dark',
			),
		);
		return $color_themes;
	}
} // End if().

function seabadgermd_get_color_theme( $id ) {
	$themes = seabadgermd_get_color_themes();
	$id = $id ? $id : 'mdb_dark';
	if ( array_key_exists( $id, $themes ) ) {
		return $themes[ $id ];
	} else {
		$keys = array_keys( $themes );
		return $themes[ $keys[0] ];
	}
}

function seabadgermd_get_color_theme_names() {
	$themes = seabadgermd_get_color_themes();
	$theme_names = array();
	foreach ( $themes as $id => $theme ) {
		$theme_names[ $id ] = $theme['name'];
	}
	return $theme_names;
}

function seabadgermd_color_theme_exists( $key = '' ) {
	if ( ! $key ) {
		return false;
	}
	return array_key_exists( $key, seabadgermd_get_color_themes() );
}
/* /Color theme definition / helper functions */


