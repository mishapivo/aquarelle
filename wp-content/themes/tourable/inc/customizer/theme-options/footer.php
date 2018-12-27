<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'tourable_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'tourable' ),
		'priority'   			=> 900,
		'panel'      			=> 'tourable_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'tourable_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'tourable_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'tourable_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'tourable' ),
		'section'    			=> 'tourable_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tourable_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'tourable_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tourable_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'tourable_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'tourable_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'tourable' ),
		'section'    			=> 'tourable_section_footer',
		'on_off_label' 		=> tourable_switch_options(),
    )
) );