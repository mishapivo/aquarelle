<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('home-post-new'); ?>>
		<a href="<?php the_permalink(); ?>">
		<div class="thumbnail">
			<?php the_post_thumbnail('luck_for_all-square'); ?>
		</div>
		<div class="content">
			<h2 class="post-title"><?php the_title(); ?></h2>
			<div class="post-excerpt"><?php the_excerpt(); ?></div>
		</div>
		</a>
	</article><!-- #post -->
