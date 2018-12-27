<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

/*Footer Section*/
$wp_customize->add_section( 'edumag_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'edumag' ),
		'priority'   			=> 900,
		'panel'      			=> 'edumag_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'edumag_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'edumag_santize_allow_tag',
	)
);
$wp_customize->add_control( 'edumag_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Footer Text', 'edumag' ),
		'section'    			=> 'edumag_section_footer',
		'type'		 			=> 'textarea',
    )
);

// scroll top visible
$wp_customize->add_setting( 'edumag_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback'		=> 'edumag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'edumag_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'edumag' ),
		'section'    			=> 'edumag_section_footer',
		'type'		 			=> 'checkbox',
    )
);