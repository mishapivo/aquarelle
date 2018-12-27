<?php
/**
 * Welcome section.
 *
 * @package Digimag Lite
 */

?>
<h1>
	<?php
	// Translators: %1$s - Theme name, %2$s - Theme version.
	echo esc_html( sprintf( __( 'Welcome to %1$s', 'digimag-lite' ), $this->theme->name, $this->theme->version ) );
	?>
</h1>

<p class="about-rating">
	<?php
	// Translators: theme slug.
	echo wp_kses_post( sprintf( __( 'Please rate <a href="https://wordpress.org/support/theme/%2$s/reviews/" target="_blank">%1$s</a> on <a href="https://wordpress.org/support/theme/%2$s/reviews/" target="_blank">WordPress.org</a> to help us spread the word. Thank you from GretaThemes!', 'digimag-lite' ), $this->pro_name, $this->slug ) );
	?>
</p>


<div class="about-text"><?php echo esc_html( $this->theme->description ); ?></div>

<a target="_blank" href="<?php echo esc_url( 'https://gretathemes.com/' . $this->utm ); ?>" class="wp-badge"><?php esc_html_e( 'GretaThemes', 'digimag-lite' ); ?></a>
