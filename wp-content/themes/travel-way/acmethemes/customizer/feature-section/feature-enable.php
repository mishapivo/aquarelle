<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'travel-way-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Enable Feature Section', 'travel-way' ),
    'panel'          => 'travel-way-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-enable-feature'],
    'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );

$wp_customize->add_control( 'travel_way_theme_options[travel-way-enable-feature]', array(
    'label'		        => esc_html__( 'Enable Feature Section', 'travel-way' ),
    'description'	    => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Slider and Feature Column.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to enable it', 'travel-way' ), '<br />','<b><a class="at-customizer" data-section="static_front_page"> ','</a></b>' ),
    'section'           => 'travel-way-enable-feature',
    'settings'          => 'travel_way_theme_options[travel-way-enable-feature]',
    'type'	  	        => 'checkbox'
) );