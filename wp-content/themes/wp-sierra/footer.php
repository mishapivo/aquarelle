<?php
/**
 * The default template for displaying footer
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>
<footer>

	<?php
	if ( class_exists( 'Kirki' ) ) {
		get_template_part( 'inc/footers/footer', get_theme_mod( 'footer_layout', 'simple' ) );
	} else {
		get_template_part( 'inc/footers/footer', 'simple' );
	}
	?>

</footer>

	<?php wp_footer(); ?>

	</body>
</html>
