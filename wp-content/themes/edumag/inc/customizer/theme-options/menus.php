<?php 
/**
 * Menus Customizer options
 *
 * @package Theme Palace
 * @subpackage Edumag
 * @since Edumag 0.1
 */

//menu section
$wp_customize->add_section( 'menu_options', 
	array(
		'description'		=> esc_html__( 'Extra Menu Options specific to this theme','edumag' ),
		'priority'			=> 10,
		'panel'  			=> 'nav_menus',
		'title'    			=> esc_html__( 'Additional Menu Options', 'edumag' ),
	)
);

//Disable search options
$wp_customize->add_setting( 'edumag_theme_options[append_search]', 
	array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $options['append_search'],
		'sanitize_callback' => 'edumag_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'edumag_theme_options[append_search]', 
	array(			
		'label'    			=> esc_html__( 'Check to Append Search Options', 'edumag' ),
		'section'  			=> 'menu_options',
		'settings' 			=> 'edumag_theme_options[append_search]',
		'type'	   			=> 'checkbox',
	)
);