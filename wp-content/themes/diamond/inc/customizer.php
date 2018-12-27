<?php
function diamond_upsell_notice() {
 
	// Enqueue the script
	wp_enqueue_script(
		'diamond-customizer-upsell',
		get_template_directory_uri() . '/js/upsell.js',
		array(), '1.0.0',
		true
	);
 
	// Localize the script
	wp_localize_script(
		'diamond-customizer-upsell',
		'diamondL10n',
		array(
			'diamondURL'	=> esc_url( 'http://www.eightpixeldesign.com/diamond-pro/' ),
			'diamondLabel'	=> __( 'BUY NOW FOR $29', 'diamond' ),
		)
	);
 
}
add_action( 'customize_controls_enqueue_scripts', 'diamond_upsell_notice' );


function diamond_footer_text_register( $wp_customize ) {
	$wp_customize->add_section( 'coyright_footer' , array(
		'title' =>  'change text footer',
        'priority' => 200
	) );
    $wp_customize->add_setting(
        'copyright_textbox',
        array(
            'default' => '',
            'sanitize_callback' => 'diamond_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'copyright_textbox',
        array(
            'label' => 'Copyright text',
            'section' => 'coyright_footer',
            'type' => 'text',
        )
    );
}
add_action( 'customize_register', 'diamond_footer_text_register' );
function diamond_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
