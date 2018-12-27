<?php
if ( ! function_exists( 'salient_customizer_sanitize_button' ) ) :
    /**
     * button sanitization callback example.
     *
     * - Sanitization: button
     * - Control: text
     *
     * Sanitization callback for 'button' type text controls. This callback sanitizes `$button`
     * as a valid button address.
     *
     * @see sanitize_button() https://developer.wordpress.org/reference/functions/sanitize_key/
     * @link sanitize_button() https://codex.wordpress.org/Function_Reference/sanitize_button
     *
     * @param string               $button   button address to sanitize.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return string The sanitized button if not null; otherwise, the setting default.
     */
    function salient_customizer_sanitize_button( $button, $setting ) {
        // Sanitize $input as a hex value without the hash prefix.
        $button = sanitize_button( $button );

        // If $button is a valid button, return it; otherwise, return the default.
        return ( ! null( $button ) ? $button : $setting->default );
    }
endif;