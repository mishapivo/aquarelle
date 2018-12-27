<?php
/**
 * EduMag Pro Blogs Customizer options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// Add Blogs section enable option
$wp_customize->add_section( 'edumag_blogs_section', 
	array(
		'title'             => esc_html__( 'Blogs Section', 'edumag' ),
		'description'       => esc_html__( 'Blogs section options.', 'edumag' ),
		'panel'             => 'edumag_sections_panel'
	)
);

// Add category blog enable setting and control.
$wp_customize->add_setting( 'edumag_theme_options[blogs_section_enable]', 
	array(
		'default'           => $options['blogs_section_enable'],
		'sanitize_callback' => 'edumag_sanitize_select'
	)
);

$wp_customize->add_control( 'edumag_theme_options[blogs_section_enable]', 
	array(
		'label'             => esc_html__( 'Enable on', 'edumag' ),
		'section'           => 'edumag_blogs_section',
		'type'              => 'select',
		'choices'           => edumag_enable_disable_options()
	)
);

// Add category blog content type setting and control.
$wp_customize->add_setting( 'edumag_theme_options[blogs_section_content_type]', 
	array(
		'default'           => $options['blogs_section_content_type'],
		'sanitize_callback' => 'edumag_sanitize_select'
	)
);

$wp_customize->add_control( 'edumag_theme_options[blogs_section_content_type]', 
	array(
		'label'           	=> esc_html__( 'Content Type', 'edumag' ),
		'section'         	=> 'edumag_blogs_section',
		'type'            	=> 'select',
		'active_callback' 	=> 'edumag_is_blogs_section_active',
		'choices'         	=> array(
	        'category' 		=> esc_html__( 'Category', 'edumag' ),
	    ),
	)
);

for( $i=1; $i<=3; $i++ ){
	/**
 	 * Content type: Catgory
	 */ 

	// Show category type setting and control
	$wp_customize->add_setting( 'edumag_theme_options[blogs_section_content_category_'. $i .']', 
		array(
			'sanitize_callback' => 'edumag_sanitize_dropdown_category_list'
		)
	);

	$wp_customize->add_control( new Edumag_Dropdown_Category_Control( $wp_customize, 'edumag_theme_options[blogs_section_content_category_'. $i .']', 
		array(
			'label'           	=> sprintf( esc_html__( 'Select Category #%1$s', 'edumag' ), $i ),
			'description'     	=> esc_html__( 'Only top post from selected category will be shown.', 'edumag' ),
			'section'         	=> 'edumag_blogs_section',
			'active_callback' 	=> 'edumag_is_blogs_section_active',
		)
	) );
}