<?php
/*active callback function for front-page-header*/
if ( !function_exists('travel_way_active_callback_front_page_header') ) :
    function travel_way_active_callback_front_page_header() {
        $travel_way_customizer_all_values = travel_way_get_theme_options();
        if( 1 != $travel_way_customizer_all_values['travel-way-hide-front-page-content'] ){
            return true;
        }
        return false;
    }
endif;

/*adding sections for front page content */
$wp_customize->add_section( 'travel-way-front-page-content', array(
    'priority'          => 10,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Front Page Content Options', 'travel-way' ),
    'panel'             => 'travel-way-design-panel'

) );

/*hide front page content*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-hide-front-page-content]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-hide-front-page-content'],
    'sanitize_callback' => 'travel_way_sanitize_checkbox',
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-hide-front-page-content]', array(
    'label'		        => esc_html__( 'Hide Front Page Content', 'travel-way' ),
    'description'       => esc_html__( 'You may want to hide front page content and want to show only Feature section and Home Widgets. Check this to hide front page content.', 'travel-way' ),
    'section'           => 'travel-way-front-page-content',
    'settings'          => 'travel_way_theme_options[travel-way-hide-front-page-content]',
    'type'	  	        => 'checkbox'
) );

/*hide front page header*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-hide-front-page-header]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-hide-front-page-header'],
    'sanitize_callback' => 'travel_way_sanitize_checkbox',
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-hide-front-page-header]', array(
    'label'		        => esc_html__( 'Hide Front Page Header', 'travel-way' ),
    'description'       => esc_html__( 'You may want to hide front page header and want to show only Feature section and Home Widgets. Check this to hide front page Header.', 'travel-way' ),
    'section'           => 'travel-way-front-page-content',
    'settings'          => 'travel_way_theme_options[travel-way-hide-front-page-header]',
    'type'	  	        => 'checkbox',
    'active_callback'   => 'travel_way_active_callback_front_page_header'
) );