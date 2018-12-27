<?php 
function chilly_general_footer_settings_customizer( $wp_customize ){


$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	$wp_customize->add_setting(
		'footer_copyright_text',
		array(
			'default'           =>  '<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://spicethemes.com" rel="designer">Chilly</a> by SpiceThemes', 'chilly' ).'</p>',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'chilly_copyright_sanitize_text',
			'transport'         => $selective_refresh,
		)	
	);
	$wp_customize->add_control('footer_copyright_text', array(
			'label' => esc_html__('Copyright text','chilly'),
			'section' => 'spicepress_footer_copyright',
			'type'    =>  'textarea'
	));	 // footer copyright
	
	function chilly_copyright_sanitize_text( $input ) 
	{
		return wp_kses_post( force_balance_tags( $input ) );
	}
}
add_action( 'customize_register', 'chilly_general_footer_settings_customizer' );


function chilly_register_copyright_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'footer_copyright_text', array(
		'selector'            => '.site-footer .site-info p',
		'settings'            => 'footer_copyright_text',
		'render_callback'  => 'chilly_footer_copyright_text_render_callback',
	
	) );

}
add_action( 'customize_register', 'chilly_register_copyright_section_partials' );


function chilly_footer_copyright_text_render_callback() {
	return get_theme_mod( 'footer_copyright_text' );
}