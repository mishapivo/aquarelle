<?php
/*check for travel-way-menu-right-button-options*/
if ( !function_exists('travel_way_menu_right_button_if_not_disable') ) :
	function travel_way_menu_right_button_if_not_disable() {
		$travel_way_customizer_all_values = travel_way_get_theme_options();
		if( 'disable' != $travel_way_customizer_all_values['travel-way-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('travel_way_menu_right_button_if_booking') ) :
	function travel_way_menu_right_button_if_booking() {
		$travel_way_customizer_all_values = travel_way_get_theme_options();
		if( 'booking' == $travel_way_customizer_all_values['travel-way-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('travel_way_menu_right_button_if_link') ) :
	function travel_way_menu_right_button_if_link() {
		$travel_way_customizer_all_values = travel_way_get_theme_options();
		if( 'link' == $travel_way_customizer_all_values['travel-way-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

/*Menu Section*/
$wp_customize->add_section( 'travel-way-menu-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Menu Options', 'travel-way' ),
    'panel'          => 'travel-way-header-panel'
) );

/*enable transparent*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-enable-transparent]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-enable-transparent'],
	'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );

$wp_customize->add_control( 'travel_way_theme_options[travel-way-enable-transparent]', array(
	'label'		=> esc_html__( 'Enable Transparent Menu', 'travel-way' ),
	'section'   => 'travel-way-menu-options',
	'settings'  => 'travel_way_theme_options[travel-way-enable-transparent]',
	'type'	  	=> 'checkbox'
) );

/*enable sticky*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-enable-sticky]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-enable-sticky'],
    'sanitize_callback' => 'travel_way_sanitize_checkbox'
) );

$wp_customize->add_control( 'travel_way_theme_options[travel-way-enable-sticky]', array(
    'label'		=> esc_html__( 'Enable Sticky Menu', 'travel-way' ),
    'section'   => 'travel-way-menu-options',
    'settings'  => 'travel_way_theme_options[travel-way-enable-sticky]',
    'type'	  	=> 'checkbox'
) );

if( travel_way_is_woocommerce_active() ){
	/*enable cart*/
	$wp_customize->add_setting( 'travel_way_theme_options[travel-way-enable-cart-icon]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['travel-way-enable-cart-icon'],
		'sanitize_callback' => 'travel_way_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'travel_way_theme_options[travel-way-enable-cart-icon]', array(
		'label'		=> esc_html__( 'Enable Cart', 'travel-way' ),
		'section'   => 'travel-way-menu-options',
		'settings'  => 'travel_way_theme_options[travel-way-enable-cart-icon]',
		'type'	  	=> 'checkbox'
	) );
}

/*Button Right Message*/
$wp_customize->add_setting('travel_way_theme_options[travel-way-menu-right-button-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Travel_Way_Customize_Message_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-menu-right-button-message]',
		array(
			'section'       => 'travel-way-menu-options',
			'description'   => "<hr /><h2>".esc_html__('Special Button On Menu Right','travel-way')."</h2>",
			'settings'      => 'travel_way_theme_options[travel-way-menu-right-button-message]',
			'type'	  	    => 'message'
		)
	)
);

/*Button Link Options*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-menu-right-button-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-menu-right-button-options'],
	'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_menu_right_button_link_options();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-menu-right-button-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Button Options', 'travel-way' ),
	'section'       => 'travel-way-menu-options',
	'settings'      => 'travel_way_theme_options[travel-way-menu-right-button-options]',
	'type'	  	    => 'select'
) );

/*Button title*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-menu-right-button-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-menu-right-button-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-menu-right-button-title]', array(
	'label'		        => esc_html__( 'Button Title', 'travel-way' ),
	'section'           => 'travel-way-menu-options',
	'settings'          => 'travel_way_theme_options[travel-way-menu-right-button-title]',
	'type'	  	        => 'text',
	'active_callback'   => 'travel_way_menu_right_button_if_not_disable'
) );

/*Button Right booking Message*/
$wp_customize->add_setting('travel_way_theme_options[travel-way-menu-right-button-booking-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));
$description = sprintf( esc_html__( 'Add Popup Widget from %1$s here%2$s ', 'travel-way' ), '<a class="at-customizer" data-section="sidebar-widgets-popup-widget-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new Travel_Way_Customize_Message_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-menu-right-button-booking-message]',
		array(
			'section'           => 'travel-way-menu-options',
			'description'       => $description,
			'settings'          => 'travel_way_theme_options[travel-way-menu-right-button-booking-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'travel_way_menu_right_button_if_booking'
		)
	)
);

/*Button link*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-menu-right-button-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-menu-right-button-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-menu-right-button-link]', array(
	'label'		        => esc_html__( 'Button Link', 'travel-way' ),
	'section'           => 'travel-way-menu-options',
	'settings'          => 'travel_way_theme_options[travel-way-menu-right-button-link]',
	'type'	  	        => 'url',
	'active_callback'   => 'travel_way_menu_right_button_if_link'
) );