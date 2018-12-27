<?php
/**
 * The default template for displaying content
 *
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */

?>
<div class="single-post-content">
<?php

the_content();

		wp_link_pages(array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wp-sierra' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		));
?>
</div><!--/.single-post-content-->
