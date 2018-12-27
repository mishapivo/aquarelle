<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Devion
 */
?>
<div class="col-md-4">
	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
		<?php get_template_part( 'sponsors' ); ?>
	</div><!-- #secondary -->
</div>