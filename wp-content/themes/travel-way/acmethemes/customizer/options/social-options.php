<?php
/*adding sections for header social options */
$wp_customize->add_section( 'travel-way-social-options', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Social Options', 'travel-way' ),
    'panel'                 => 'travel-way-options'
) );

/*repeater social data*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-social-data]', array(
	'sanitize_callback'     => 'travel_way_sanitize_social_data',
	'default'               => $defaults['travel-way-social-data']
) );
$wp_customize->add_control(
	new Travel_Way_Repeater_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-social-data]',
		array(
			'label'                         => esc_html__('Social Options Selection','travel-way'),
			'description'                   => esc_html__('Select Social Icons and enter link','travel-way'),
			'section'                       => 'travel-way-social-options',
			'settings'                      => 'travel_way_theme_options[travel-way-social-data]',
			'repeater_main_label'           => esc_html__('Social Icon','travel-way'),
			'repeater_add_control_field'    => esc_html__('Add New Icon','travel-way')
		),
		array(
			'icon' => array(
				'type'        => 'icons',
				'label'       => esc_html__( 'Select Icon', 'travel-way' ),
			),
			'link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Enter Link', 'travel-way' ),
			),
			'checkbox' => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Window', 'travel-way' ),
			)
		)
	)
);