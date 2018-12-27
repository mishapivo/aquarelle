<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'travel-way-feature-page', array(
	'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Slider Selection', 'travel-way' ),
	'panel'          => 'travel-way-feature-panel'
) );

/* feature parent all-slides selection */
$slider_pages = array();
$slider_pages_obj = get_pages();
$slider_pages[''] = esc_html__('Select Slider Page','travel-way');
foreach ($slider_pages_obj as $page) {
	$slider_pages[$page->ID] = $page->post_title;
}
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-slides-data]', array(
	'sanitize_callback' => 'travel_way_sanitize_slider_data',
	'default'           => $defaults['travel-way-slides-data']
) );
$wp_customize->add_control(
	new Travel_Way_Repeater_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-slides-data]',
		array(
			'label'                         => esc_html__('Slider Selection','travel-way'),
			'description'                   => esc_html__('Select Page For Slider','travel-way'),
			'section'                       => 'travel-way-feature-page',
			'settings'                      => 'travel_way_theme_options[travel-way-slides-data]',
			'repeater_main_label'           => esc_html__('Select Slide of Slider','travel-way'),
			'repeater_add_control_field'    => esc_html__('Add New Slide','travel-way'),
		),
		array(
			'selectpage' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Select Page For Slide', 'travel-way' ),
				'options'     => $slider_pages
			),
			'button_1_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button One Text', 'travel-way' ),
			),
			'button_1_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button One Link', 'travel-way' ),
			),
			'button_2_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button Two Text', 'travel-way' ),
			),
			'button_2_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button Two Link', 'travel-way' ),
			)
		)
	)
);

/*enable animation*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-feature-slider-enable-animation]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-feature-slider-enable-animation'],
	'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-feature-slider-enable-animation]', array(
	'label'		        => esc_html__( 'Enable Animation', 'travel-way' ),
	'section'           => 'travel-way-feature-page',
	'settings'          => 'travel_way_theme_options[travel-way-feature-slider-enable-animation]',
	'type'	  	        => 'checkbox',

) );

/*display-title*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-feature-slider-display-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-feature-slider-display-title'],
	'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-feature-slider-display-title]', array(
	'label'		            => esc_html__( 'Display Title', 'travel-way' ),
	'section'               => 'travel-way-feature-page',
	'settings'              => 'travel_way_theme_options[travel-way-feature-slider-display-title]',
	'type'	  	            => 'checkbox',
) );

/*display-excerpt*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-feature-slider-display-excerpt]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-feature-slider-display-excerpt'],
	'sanitize_callback'     => 'travel_way_sanitize_checkbox'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-feature-slider-display-excerpt]', array(
	'label'		            => esc_html__( 'Display Excerpt', 'travel-way' ),
	'section'               => 'travel-way-feature-page',
	'settings'              => 'travel_way_theme_options[travel-way-feature-slider-display-excerpt]',
	'type'	  	            => 'checkbox',
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-fs-image-display-options]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-fs-image-display-options'],
	'sanitize_callback'     => 'travel_way_sanitize_select'
) );
$choices = travel_way_fs_image_display_options();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-fs-image-display-options]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Feature Slider Image Display Options', 'travel-way' ),
	'section'               => 'travel-way-feature-page',
	'settings'              => 'travel_way_theme_options[travel-way-fs-image-display-options]',
	'type'	  	            => 'radio',
) );

/*Slider Selection Text Align*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-feature-slider-text-align]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-feature-slider-text-align'],
	'sanitize_callback'     => 'travel_way_sanitize_select',
) );
$choices = travel_way_slider_text_align();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-feature-slider-text-align]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Slider Text Align', 'travel-way' ),
	'section'               => 'travel-way-feature-page',
	'settings'              => 'travel_way_theme_options[travel-way-feature-slider-text-align]',
	'type'	  	            => 'select',
) );