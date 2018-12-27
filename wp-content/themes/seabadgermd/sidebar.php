<?php
if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="sidebar" class="widget-area col-md-12 col-lg-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside>
