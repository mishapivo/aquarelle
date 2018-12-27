<?php
/**
 * Template part for displaying posts
 *
 * @package business-land
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-item'); ?>>
	<div class="post-inner-wrapper">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
		<?php endif; ?>
		
		<div class="post-body-wrapper">
			<ul class="post-meta">
				<li class="post-author list-inline-item">
					<?php business_land_post_author(); ?>
				</li>
				<li class="post-date list-inline-item">
					<?php business_land_post_date(); ?>
				</li>
				<li class="post-categories list-inline-item">
					<?php business_land_post_categories(); ?>
				</li>
				
				<li class="post-comment list-inline-item">
					<?php business_land_post_comment();?>
				</li>
			</ul>
		
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			<?php if( has_tag() ) : ?>
			<div class="post-tag">
				 <?php business_land_post_tags(); ?>
			</div>
			<?php endif; ?>
		</div>
		
	</div>
</article>
