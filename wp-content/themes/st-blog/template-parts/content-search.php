<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package st-blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="image">
		<?php st_blog_post_thumbnail(); ?>
	</div>
	
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
		<div class="entry-meta">
			<?php
			st_blog_posted_by();
			st_blog_posted_on();
			?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
</article><!-- #post -->
