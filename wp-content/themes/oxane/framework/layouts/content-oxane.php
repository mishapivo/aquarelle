<?php
/**
 * @package Oxane
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid oxane col-md-4 col-sm-4 col-xs-6'); ?>>


		<div class="featured-thumb col-md-12 col-sm-12">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('large'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
			<?php endif; ?>
			<div class="postedon"><?php oxane_posted_on_date(); ?></div>
		</div><!--.featured-thumb-->
		
		<div class="out-thumb col-md-12 col-sm-12">
			<header class="entry-header">
					<h1 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</header><!-- .entry-header -->
		</div>
		
				
		
</article><!-- #post-## -->