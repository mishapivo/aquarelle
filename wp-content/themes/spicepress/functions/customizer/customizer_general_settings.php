<?php 
function spicepress_general_settings_customizer( $wp_customize ){


$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

/* Home Page Panel */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('General settings','spicepress'),
	) );
	
	
	/* Remove animation */
	$wp_customize->add_section( 'remove_wow_animation_setting' , array(
		'title'      => esc_html__('Animation Settings','spicepress'),
		'panel'  => 'general_settings',
   	) );
	
	
			// Reservation Title
			$wp_customize->add_setting( 'remove_wow_desktop_animation',array(
			'capability'     => 'edit_theme_options',
			'default' => false,
			'sanitize_callback' => 'spicepress_home_page_sanitize_text',
			));	
			$wp_customize->add_control( 'remove_wow_desktop_animation',array(
			'label'   => esc_html__('Disable animation effect in desktop','spicepress'),
			'section' => 'remove_wow_animation_setting',
			'type' => 'checkbox',
			));

			// Reservation Title
			$wp_customize->add_setting( 'remove_wow_mobile_animation',array(
			'capability'     => 'edit_theme_options',
			'default' => false,
			'sanitize_callback' => 'spicepress_home_page_sanitize_text',
			));	
			$wp_customize->add_control( 'remove_wow_mobile_animation',array(
			'label'   => esc_html__('Disable animation effect on mobile devices','spicepress'),
			'section' => 'remove_wow_animation_setting',
			'type' => 'checkbox',
			));
			

	/* footer copyright section */
	$wp_customize->add_section( 'spicepress_footer_copyright' , array(
		'title'      => esc_html__('Footer copyright settings','spicepress'),
		'panel'  => 'general_settings',
   	) );
	
	
	$wp_customize->add_setting(
		'footer_copyright_text',
		array(
			'default'           =>  '<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://spicethemes.com" rel="designer">SpicePress</a> by SpiceThemes', 'spicepress' ).'</p>',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'spicepress_copyright_sanitize_text',
			'transport'         => $selective_refresh,
		)	
	);
	$wp_customize->add_control('footer_copyright_text', array(
			'label' => esc_html__('Copyright text','spicepress'),
			'section' => 'spicepress_footer_copyright',
			'type'    =>  'textarea'
	));	 // footer copyright
	
	function spicepress_copyright_sanitize_text( $input ) 
	{
		return wp_kses_post( force_balance_tags( $input ) );
	}
}
add_action( 'customize_register', 'spicepress_general_settings_customizer' );


function spicepress_register_copyright_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'footer_copyright_text', array(
		'selector'            => '.site-footer .site-info p',
		'settings'            => 'footer_copyright_text',
		'render_callback'  => 'spicepress_footer_copyright_text_render_callback',
	
	) );

}
add_action( 'customize_register', 'spicepress_register_copyright_section_partials' );


function spicepress_footer_copyright_text_render_callback() {
	return get_theme_mod( 'footer_copyright_text' );
}

function spicepress_home_page_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

}