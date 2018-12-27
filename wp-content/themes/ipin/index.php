<?php get_header(); ?>

<div class="container-fluid">
	<div id="ajax-loader-masonry" class="ajax-loader"></div>
	<div id="masonry">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('thumb'); ?>>
			<div class="thumb-holder">
				<div class="masonry-actionbar">
					<a class="btn btn-mini" href="<?php the_permalink(); ?>/#respond"><i class="icon-comment"></i> <?php _e('Comment', 'ipin'); ?></a>
					<a class="btn btn-mini" href="<?php the_permalink(); ?>"><?php _e('View', 'ipin'); ?> <i class="icon-arrow-right"></i></a>
				</div>
				<a href="<?php the_permalink(); ?>">
					<?php
					if (has_post_thumbnail()) {
						$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
						$imgsrc = $imgsrc[0];
					} elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
						foreach($postimages as $postimage) {
							$imgsrc = wp_get_attachment_image_src($postimage->ID, 'medium');
							$imgsrc = $imgsrc[0];
						}
					} elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
						$imgsrc = $match[1];
					} else {
						$imgsrc = get_template_directory_uri() . '/img/blank.gif';
					}
					?>
					<img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title_attribute(); ?>" />

					<div class="thumbtitle"><?php the_title(); ?></div>
				</a>
			</div>
			
			<div class="masonry-meta<?php $show_avatars = get_option('show_avatars'); $comments_number = get_comments_number(); if ($comments_number == 0 && $show_avatars == '0') { echo ' text-align-center'; } ?>">
				<?php if ($show_avatars == '1') { ?>
				<div class="masonry-meta-avatar"><?php echo get_avatar(get_the_author_meta('user_email') , '30'); ?></div>
				<div class="masonry-meta-comment">
				<?php } ?>
					<span class="masonry-meta-author"><?php echo get_the_author_meta('display_name') ?></span> <?php _e('onto', 'ipin'); ?> <span class="masonry-meta-content"><?php the_category(', '); ?></span>
				<?php if ($show_avatars == '1') { ?>
				</div>
				<?php } ?>
			</div>
				
			<?php
			if ('0' != $frontpage_comments_number = of_get_option('frontpage_comments_number')) {
				$args = array(
					'number' => $frontpage_comments_number,
					'post_id' => $post->ID,
					'status' => 'approve'
				);
				$comments = get_comments($args);
				foreach($comments as $comment) {
				?>
				<div class="masonry-meta">
					<?php if ($show_avatars == '1') { ?>
					<div class="masonry-meta-avatar"><?php echo get_avatar( $comment->comment_author_email , '30'); ?></div>
					<div class="masonry-meta-comment">
					<?php } ?>
						<span class="masonry-meta-author"><?php echo $comment->comment_author; ?></span> 
						<?php echo $comment->comment_content; ?>
					<?php if ($show_avatars == '1') { ?>
					</div>
					<?php } ?>
				</div>
				<?php 
				}
				if ($comments_number > $frontpage_comments_number) {
				?>
				<div class="masonry-meta text-align-center">
					<span class="masonry-meta-author">
					<a href="<?php the_permalink() ?>/#navigation" title="<?php _e('View all', 'ipin'); ?> <?php echo $comments_number; ?> <?php _e('comments', 'ipin') ?>"><?php _e('View all', 'ipin'); ?> <?php echo $comments_number; ?> <?php _e('comments', 'ipin') ?></a>
					</span>
				</div>
			<?php } 
			}	?>
		</div>
		<?php 
		endwhile; 
		else :
		?>
		<div class="row-fluid">
			<div class="span3"></div>
	
			<div class="span6">
				<div class="post-wrapper">
					<div class="h1-wrapper">
						<h1><?php _e( 'No Items Found', 'ipin' ); ?></h1>
					</div>		
	
					<div class="post-content text-align-center">
					<p><?php _e('Perhaps searching will help.', 'ipin'); ?></p>
					<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		
			<div class="span3"></div>
		</div>
		<?php endif; ?>
	</div>

	<div id="navigation">
		<ul class="pager">
			<li id="navigation-next"><?php next_posts_link(__('&laquo; Previous', 'ipin')) ?></li>
			<li id="navigation-previous"><?php previous_posts_link(__('Next &raquo;', 'ipin')) ?></li>
		</ul>
	</div>

	<div id="scrolltotop"><a href="#"><i class="icon-chevron-up"></i><br /><?php _e('Top', 'ipin'); ?></a></div>
</div>

<?php get_footer(); ?>