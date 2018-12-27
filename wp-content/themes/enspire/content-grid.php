<?php $format = get_post_format(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group post-grid'); ?>>	
	<div class="post-inner post-hover">
		
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail('enspire-medium'); ?>
				<?php elseif ( get_theme_mod('placeholder','on') == 'on' ): ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/thumb-medium.png" alt="<?php the_title_attribute(); ?>" />
				<?php endif; ?>
				<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-play"></i></span>'; ?>
				<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-volume-up"></i></span>'; ?>
				<?php if ( is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-star"></i></span>'; ?>
			</a>
			<?php if ( get_theme_mod('format-icon','on') == 'on' ): ?>
				<div class="square-icon"><div class="square-icon-inner"><a href="<?php echo get_post_format_link($format); ?>"><i class="fa fa-icon"></i></a></div></div>
			<?php endif; ?>
			<?php if ( comments_open() && ( get_theme_mod( 'comment-count','on' ) == 'on' ) ): ?>
				<a class="post-comments" href="<?php comments_link(); ?>"><span><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></span></a>
			<?php endif; ?>				
		</div><!--/.post-thumbnail-->
			
		<div class="post-content">
		
			<h2 class="post-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2><!--/.post-title-->
			
			<ul class="post-meta group">
				<li><?php the_category(' / '); ?></li>
				<li><i class="fa fa-clock-o"></i><?php the_time( get_option('date_format') ); ?></li>
			</ul><!--/.post-meta-->
			
			<?php if (get_theme_mod('excerpt-length','24') != '0'): ?>
			<div class="entry excerpt">				
				<?php the_excerpt(); ?>
			</div><!--/.entry-->
			<?php endif; ?>
		
		</div><!--/.post-content-->

	</div><!--/.post-inner-->	
</article><!--/.post-->