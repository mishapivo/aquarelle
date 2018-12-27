<?php
/**
 * Information about theme
 *
 * @link https://jetpack.com/
 *
 * @package euphoric
 */

/*
** Notice after Theme Activation and Update.
*/
function euphoric_activation_notice() {

	$theme_data	 = wp_get_theme();

	echo '<div class="notice notice-success euphoric-activation-notice">';
	
		echo '<h1>';
			/* translators: %s theme name */
			printf( esc_html__( 'Welcome to %s', 'euphoric' ), esc_html( $theme_data->Name ) );
		echo '</h1>';

		echo '<p>';
			/* translators: %1$s: theme name, %2$s link */
			printf( __( 'Thank you for choosing %1$s! To fully take advantage of our best theme, make sure you visit Welcome page', 'euphoric' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=euphoric-about' ) ) );
			printf( '<a href="%1$s" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>', '?' . esc_html( $theme_data->get( 'euphoric' ) ) . '_notice_ignore=0' );
		echo '</p>';

		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=euphoric-about' ) ) .'" class="button button-primary button-hero">';
			/* translators: %s theme name */
			printf( esc_html__( 'Get started with %s', 'euphoric' ), esc_html( $theme_data->Name ) );
		echo '</a></p>';

	echo '</div>';
}