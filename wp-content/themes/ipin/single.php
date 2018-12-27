<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="span9">
			<div class="row">
				<div id="double-left-column" class="span6 pull-right">
					<?php while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
						<div class="h1-wrapper">
							<h1><?php the_title(); ?></h1>
						</div>
						
						<div class="post-meta-top">
							<div class="pull-right"><a href="#navigation"><?php comments_number(__('0 Comments','ipin'), __('1 Comment', 'ipin'), __('% Comments',' ipin'));?></a><?php edit_post_link(__('Edit', 'ipin'), ' | '); ?></div>
							<div class="pull-left"><?php echo ipin_human_time_diff(get_post_time('U', true)) . ' / ';the_author(); ?></div>
						</div>		

						<div class="post-content">
							<?php
							the_content();
							wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'ipin') . '</strong>', 'after' => '</p>' ) );							
							?>
							
							<div class="clearfix"></div>
							
							<div class="post-meta-category-tag">
								<?php _e('Categories', 'ipin'); ?>: <?php the_category(', '); ?> 
								<?php the_tags(__('Tags: ', 'ipin'), ', '); ?>
							</div>
							
							<div id="navigation">
								<ul class="pager">
									<li class="previous"><?php previous_post_link('%link', '&laquo; %title'); ?></li>
									<li class="next"><?php next_post_link('%link', '%title &raquo;'); ?></li>
								</ul>
							</div>
						</div>
						
						<div class="post-comments">
							<div class="post-comments-wrapper">
								<?php comments_template(); ?>
							</div>
						</div>
						
					</div>
					<?php endwhile; ?>
				</div>
				
				<div id="single-right-column" class="span3">
					<?php get_sidebar('left'); ?>
				</div>
			</div>
		</div>
		
		<div class="span3">
			<?php get_sidebar('right'); ?>
		</div>
	</div>

	<div id="scrolltotop"><a href="#"><i class="icon-chevron-up"></i><br /><?php _e('Top', 'ipin'); ?></a></div>
</div>

<?php get_footer(); ?>