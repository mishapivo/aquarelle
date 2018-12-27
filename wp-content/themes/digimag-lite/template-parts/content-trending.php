<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digimag Lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'trending-item' ); ?>>


	<div class="entry-category">
		<?php digimag_lite_print_single_category(); ?>
	</div>
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<span class="entry-published">
				<?php digimag_lite_post_published_date(); ?>
			</span>
			<?php the_title(); ?>
		</a>
	</h2>

</article><!-- #post-<?php the_ID(); ?> -->
