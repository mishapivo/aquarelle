<?php
/**
 * Euphoric Callback Functions
 *
 * @package euphoric
 */

/**
 * Euphoric call back functions for securing the code before entering into the database
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function euphoric_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


function euphoric_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function euphoric_sanitize_multi_checkbox( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

function euphoric_sanitize_positive_integer( $input, $setting ) {

	$input = absint( $input );

	return ( $input ? $input : $setting->default );

}