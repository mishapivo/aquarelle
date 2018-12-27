<?php
/**
 * Copyright text
 *
 * @package Digimag Lite
 */

?>

<div class="widget-copyright">
	<?php
	/* translators: placeholder replaced with string */
	printf( nl2br( esc_html__( 'Copyright &copy; DigiMag Lite 2018 &bull; All rights reserved.
		Developed with %1$s by %2$s', 'digimag-lite' ) ),
		'<i class="icofont icofont-heart-alt"></i>',
		'<a href="' . esc_url( __( 'http://gretathemes.com/', 'digimag-lite' ) ) . '">' . esc_html__( 'GretaThemes', 'digimag-lite' ) . '</a>'
	);
	?>
</div>
