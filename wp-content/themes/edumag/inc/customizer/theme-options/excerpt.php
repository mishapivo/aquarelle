<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// Add excerpt section
$wp_customize->add_section( 'edumag_excerpt_section', 
	array(
		'title'             => esc_html__( 'Excerpt','edumag' ),
		'description'       => esc_html__( 'Excerpt section options.', 'edumag' ),
		'panel'             => 'edumag_theme_options_panel'
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'edumag_theme_options[long_excerpt_length]', 
	array(
		'sanitize_callback' => 'edumag_sanitize_number_range',
		'validate_callback' => 'edumag_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'edumag_theme_options[long_excerpt_length]', 
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'edumag' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'edumag' ),
		'section'     		=> 'edumag_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       	=> 'width: 80px;',
			'max'         	=> 100,
			'min'         	=> 5,
		),
	)
);


// Read more text.
$wp_customize->add_setting( 'edumag_theme_options[read_more_text]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['read_more_text'],
	)
);

$wp_customize->add_control( 'edumag_theme_options[read_more_text]', 
	array(
		'label'       		=> esc_html__( 'Read More Text', 'edumag' ),
		'section'     		=> 'edumag_excerpt_section',
		'type'        		=> 'text',
	)
);