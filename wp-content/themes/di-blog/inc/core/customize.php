<?php
// Refresh and postMeaage / partial refresh handle.
function di_blog_pr_handle( $wp_customize ) {
	// Full refresh on logo select or switch.
	$wp_customize->get_setting( 'custom_logo' )->transport 	= 'refresh';

	// Blog name partial refresh handle.
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-name-pr',
		'render_callback' => 'di_blog_header_file_blogname_content',
	) );

	// Blog tagline / description partial refresh handle.
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description-pr',
		'render_callback' => 'di_blog_header_file_blogdescription_content',
	) );

	// Blog header_image partial refresh handle.
	$wp_customize->get_setting( 'header_image' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'header_image', array(
		'selector' => '.wp-custom-header',
	) );

	// Top Main menu partial refresh handle.
	$wp_customize->add_setting(
		'top_main_menu_hidden_field', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'top_main_menu_hidden_field', array(
			'priority' => 25,
			'type'     => 'hidden',
			'section'  => 'menu_locations',
		)
	);

	$wp_customize->get_setting( 'top_main_menu_hidden_field' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'top_main_menu_hidden_field', array(
			'selector'	=> '.nav.navbar-nav.primary-menu',
		)
	);

	// For owl posts slider.
	$wp_customize->get_setting( 'front_slider_endis' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'front_slider_endis', array(
			'selector'	=> '.ditop-owl-carousel',
		)
	);

	// For back to top icon.
	$wp_customize->get_setting( 'back_to_top' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'back_to_top', array(
			'selector'	=> '#back-to-top',
		)
	);

	// For sidebar menu.
	$wp_customize->get_setting( 'sb_menu_onoff' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'sb_menu_onoff', array(
			'selector'	=> '.side-menu-menu-button',
		)
	);

	if( class_exists( 'WooCommerce' ) ) {
		// For woo icons.
		$wp_customize->get_setting( 'shop_icon_endis' )->transport   = 'refresh';
		$wp_customize->selective_refresh->add_partial( 'shop_icon_endis', array(
				'selector'	=> '.woo_icons_ctmzr',
			)
		);
	}

	// For social profile.
	$wp_customize->get_setting( 'sprofile_link_facebook' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'sprofile_link_facebook', array(
			'selector'	=> '.sf_icons_ctmzr',
		)
	);

	// For archive info bar.
	$wp_customize->get_setting( 'archive_infobar_endis' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'archive_infobar_endis', array(
			'selector'	=> '.archive-info-outer',
		)
	);

}
add_action( 'customize_register', 'di_blog_pr_handle', 9999999 );

