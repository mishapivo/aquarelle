<?php
/**
 * The default template for displaying blog sidebar
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>
<div class="sidebar">
	<?php if ( ! dynamic_sidebar( 'blog' ) ) : ?>
	<div class="widget">
		<h3 class="widget-title-style"><?php esc_html_e( 'Blog widgets area', 'wp-sierra' ); ?></h3>
		<div class="textwidget">
			<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
					<?php esc_html_e( 'Please add your widget here.', 'wp-sierra' ); ?>
			</a>
		</div>
	</div>
	<?php endif; ?>
</div>
