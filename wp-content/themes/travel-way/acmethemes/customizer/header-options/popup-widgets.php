<?php
/*Title*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-popup-widget-title]', array(
	'label'		        => esc_html__( 'Main Title', 'travel-way' ),
	'section'           => 'travel-way-menu-options',
	'settings'          => 'travel_way_theme_options[travel-way-popup-widget-title]',
	'type'	  	        => 'text',
	'priority'	  	    => 1,
) );
$travel_way_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
if ( ! empty( $travel_way_popup_widget_area ) ) {
	$travel_way_popup_widget_area->panel = 'travel-way-header-panel';
	$travel_way_popup_widget_area->title = esc_html__( 'Popup Widgets', 'travel-way' );
	$travel_way_popup_widget_area->priority = 999;

	$travel_way_popup_widget_title = $wp_customize->get_control( 'travel_way_theme_options[travel-way-popup-widget-title]' );
	if ( ! empty( $travel_way_popup_widget_title ) ) {
		$travel_way_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
		$travel_way_popup_widget_title->priority = -1;
	}
}