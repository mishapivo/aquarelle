<?php
/**
 * Social Media Sections
 *
 * @package Lifestyle Magazine
 */
add_action( 'customize_register', 'lifestyle_magazine_social_media_sections' );

function lifestyle_magazine_social_media_sections( $wp_customize ) {

	$wp_customize->add_section( 'lifestyle_magazine_social_media_sections', array(
	    'title'          => esc_html__( 'Social Media', 'lifestyle-magazine' ),
	    'description'    => esc_html__( 'Social Media', 'lifestyle-magazine' ),
	    'priority'       => 2,
	    'panel'			 => 'lifestyle_magazine_general_panel',
	) );

	$wp_customize->add_setting( new Lifestyle_Magazine_Repeater_Setting( $wp_customize, 'lifestyle_magazine_social_media', array(
        'default'     => '',
		'sanitize_callback' => array( 'Lifestyle_Magazine_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );
    
    $wp_customize->add_control( new Lifestyle_Magazine_Control_Repeater( $wp_customize, 'lifestyle_magazine_social_media', array(
		'section' => 'lifestyle_magazine_social_media_sections',
		'settings'    => 'lifestyle_magazine_social_media',
		'label'	  => esc_html__( 'Social Links', 'lifestyle-magazine' ),
		'fields' => array(
			'social_media_title' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Media Title', 'lifestyle-magazine' ),
				'description' => esc_html__( 'This will be the label.', 'lifestyle-magazine' ),
				'default'     => '',
			),
			'social_media_class' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Media Class', 'lifestyle-magazine' ),
				'default'     => '',
			),
			'social_media_link' => array(
				'type'      => 'url',
				'label'     => esc_html__( 'Social Media Links', 'lifestyle-magazine' ),
		        'default'   => '',
			),			
		),
        'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__('Social Media', 'lifestyle-magazine' ),
			'field' => 'social_media_title',
		),                        
	) ) );
	
}