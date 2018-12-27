<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digimag Lite
 */

?>
<div class="blog-article">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-media">
			<?php digimag_lite_post_thumbnail( 'digimag-lite-related' ); ?>
		</div>

		<div class="entry-category">
			<?php digimag_lite_print_single_category(); ?>
		</div>

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

	</article><!-- #post-<?php the_ID(); ?> -->
</div>
