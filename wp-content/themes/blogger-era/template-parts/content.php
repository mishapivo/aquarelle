<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogger_Era
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post-wrapper">

		<?php blogger_era_post_thumbnail();?>
			
		<div class="blog-post-caption">
			<?php blogger_era_categories();?>
			<header class="entry-header">
				<h2 class="entry-title">
					<a href="<?php the_permalink();?>"><?php the_title();?></a>
				</h2>
			</header>
			<div class="entry-meta">
				<?php blogger_era_posted_by();
				blogger_era_posted_on(); ?>
			</div>
			<?php blogger_era_posted_content(); 
			blogger_era_button_title(); ?>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
