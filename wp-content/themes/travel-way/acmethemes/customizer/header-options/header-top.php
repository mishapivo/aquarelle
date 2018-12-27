<?php
/*check if enable header top*/
if ( !function_exists('travel_way_is_enable_header_top') ) :
	function travel_way_is_enable_header_top() {
		$travel_way_customizer_all_values = travel_way_get_theme_options();
		if( 1 == $travel_way_customizer_all_values['travel-way-enable-header-top'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for header options*/
$wp_customize->add_section( 'travel-way-header-top-option', array(
    'priority'                  => 10,
    'capability'                => 'edit_theme_options',
    'title'                     => esc_html__( 'Header Top', 'travel-way' ),
    'panel'                     => 'travel-way-header-panel',
) );

/*header top enable*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-enable-header-top]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['travel-way-enable-header-top'],
    'sanitize_callback'         => 'travel_way_sanitize_checkbox',
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-enable-header-top]', array(
    'label'		                => esc_html__( 'Enable Header Top Options', 'travel-way' ),
    'section'                   => 'travel-way-header-top-option',
    'settings'                  => 'travel_way_theme_options[travel-way-enable-header-top]',
    'type'	  	                => 'checkbox'
) );

/*header top message*/
$wp_customize->add_setting('travel_way_theme_options[travel-way-header-top-message]', array(
	'capability'		        => 'edit_theme_options',
	'sanitize_callback'         => 'wp_kses_post'
));

$wp_customize->add_control(
	new Travel_Way_Customize_Message_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-header-top-message]',
		array(
			'section'           => 'travel-way-header-top-option',
			'description'       => "<hr /><h2>".esc_html__('Display Different Element on Top Right or Left','travel-way')."</h2>",
			'settings'          => 'travel_way_theme_options[travel-way-header-top-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'travel_way_is_enable_header_top'
		)
	)
);

/*Top Menu Display*/
$choices = travel_way_header_top_display_selection();
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-header-top-menu-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['travel-way-header-top-menu-display-selection'],
	'sanitize_callback'         => 'travel_way_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Menu Items from %1$s here%2$s and select Menu Location : Top Menu ( Support First Level Only ) ', 'travel-way' ), '<a class="at-customizer button button-primary" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-header-top-menu-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Menu Display', 'travel-way' ),
	'description'		        => $description,
	'section'                   => 'travel-way-header-top-option',
	'settings'                  => 'travel_way_theme_options[travel-way-header-top-menu-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'travel_way_is_enable_header_top'
) );

/*Top Info display*/
$description = sprintf( esc_html__( 'Add/Edit Info Items from %1$s here%2$s', 'travel-way' ), '<a class="at-customizer button button-primary" data-section="travel-way-feature-info" style="cursor: pointer">','</a>' );
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-header-top-info-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['travel-way-header-top-info-display-selection'],
	'sanitize_callback'         => 'travel_way_sanitize_select'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-header-top-info-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Info Display', 'travel-way' ),
	'description'		        => $description,
	'section'                   => 'travel-way-header-top-option',
	'settings'                  => 'travel_way_theme_options[travel-way-header-top-info-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'travel_way_is_enable_header_top'
) );

/*Social Display*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-header-top-social-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['travel-way-header-top-social-display-selection'],
	'sanitize_callback'         => 'travel_way_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Social Items from %1$s here%2$s ', 'travel-way' ), '<a class="at-customizer button button-primary" data-section="travel-way-social-options" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-header-top-social-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Social Display', 'travel-way' ),
	'description'               => $description,
	'section'                   => 'travel-way-header-top-option',
	'settings'                  => 'travel_way_theme_options[travel-way-header-top-social-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'travel_way_is_enable_header_top'
) );