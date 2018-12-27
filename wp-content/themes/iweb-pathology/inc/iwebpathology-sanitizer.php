<?php
/**
 *
 * @package IWeb_Pathology
 */

// radio box sanitization function.
function iwebpatho_sanitize_radio( $input ) {
			$valid_keys = array(
				'1' => __( 'Enable','iweb-pathology' ),
				'0' => __( 'Disable','iweb-pathology' ),
				);
	if ( array_key_exists( $input, $valid_keys ) ) {
				return $input;
	} else {
				return '';
	}
}

// radio box for theme color sanitization function.
function iwebpatho_color_sanitize_radio( $input ) {
			$valid_keys = array(
				'#00bd86' => __( 'Green','iweb-pathology' ),
				'#0db7c4' => __( 'Blue','iweb-pathology' ),
				'#ff9933' => __( 'Orange','iweb-pathology' ),
				);
	if ( array_key_exists( $input, $valid_keys ) ) {
				return $input;
	} else {
				return '';
	}
}

// file input sanitization function.
function iwebpatho_sanitize_file( $file, $setting ) {

			//allowed file types
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/,gif',
				'png'          => 'image/png',
			);

			//check file type from file name
			$file_ext = wp_check_filetype( $file, $mimes );

			//if file has a valid mime type return it, otherwise return default
			return ( $file_ext['ext'] ? $file : $setting->default );
}
