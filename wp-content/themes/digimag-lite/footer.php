<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Digimag Lite
 */

$default_image = get_template_directory_uri() . '/images/parallax-bg-min.jpg';
$image         = get_theme_mod( 'subscribe_background_image', $default_image );
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php digimag_lite_footer_widget_area(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
get_template_part( 'template-parts/slideout-sidebar' );
wp_footer();
?>

</body>
</html>
