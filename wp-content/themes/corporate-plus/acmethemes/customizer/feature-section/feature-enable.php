<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'corporate-plus-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Enable Feature Section', 'corporate-plus' ),
    'panel'          => 'corporate-plus-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'corporate_plus_theme_options[corporate-plus-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['corporate-plus-enable-feature'],
    'sanitize_callback' => 'corporate_plus_sanitize_checkbox'
) );

$wp_customize->add_control( 'corporate_plus_theme_options[corporate-plus-enable-feature]', array(
    'label'		=> __( 'Enable Feature Section', 'corporate-plus' ),
    'description'	=> sprintf( __( 'Feature section will display on front/home page. Feature Section includes Feature Slider.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to enable it', 'corporate-plus' ), '<br />','<b><a class="at-customizer" data-section="static_front_page"> ','</a></b>' ),
    'section'   => 'corporate-plus-enable-feature',
    'settings'  => 'corporate_plus_theme_options[corporate-plus-enable-feature]',
    'type'	  	=> 'checkbox',
    'priority'  => 10
) );