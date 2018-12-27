<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'travel-way-footer-copyright-option', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Bottom Copyright Section', 'travel-way' ),
    'panel'                 => 'travel-way-footer-panel',
) );

/*copyright*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-footer-copyright]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['travel-way-footer-copyright'],
    'sanitize_callback'     => 'wp_kses_post'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-footer-copyright]', array(
    'label'		            => esc_html__( 'Copyright Text', 'travel-way' ),
    'section'               => 'travel-way-footer-copyright-option',
    'settings'              => 'travel_way_theme_options[travel-way-footer-copyright]',
    'type'	  	            => 'text'
) );

/*footer copyright beside*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-footer-copyright-beside-option]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-footer-copyright-beside-option'],
	'sanitize_callback'     => 'travel_way_sanitize_select'
) );
$choices = travel_way_footer_copyright_beside_option();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-footer-copyright-beside-option]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Footer Copyright Beside Option', 'travel-way' ),
	'section'               => 'travel-way-footer-copyright-option',
	'settings'              => 'travel_way_theme_options[travel-way-footer-copyright-beside-option]',
	'type'	  	            => 'select'
) );