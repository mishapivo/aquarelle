<?php get_header(); ?>

<div class="content">
	<div class="pad group">
		
		<?php get_template_part('inc/page-title'); ?>
		
		<div class="notebox">
			<?php esc_html_e('For the term','enspire'); ?> "<span><?php echo get_search_query(); ?></span>".
			<?php if ( !have_posts() ): ?>
				<?php esc_html_e('Please try another search:','enspire'); ?>
			<?php endif; ?>
			<div class="search-again">
				<?php get_search_form(); ?>
			</div>
		</div><!--/.notebox-->
		
		<?php if ( have_posts() ) : ?>
			
			<?php if ( get_theme_mod('blog-layout','blog-standard') == 'blog-grid' ) : ?>
				
				<div class="post-grid group">
					<?php $i = 1; echo '<div class="post-row">'; while ( have_posts() ): the_post(); ?>
						<?php get_template_part('content-grid'); ?>
					<?php if($i % 2 == 0) { echo '</div><div class="post-row">'; } $i++; endwhile; echo '</div>'; ?>
				</div><!--/.post-grid-->
				
			<?php elseif ( get_theme_mod('blog-layout','blog-standard') == 'blog-list' ) : ?>
				
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part('content-list'); ?>
				<?php endwhile; ?>
				
			<?php else: ?>
			
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part('content'); ?>
				<?php endwhile; ?>
				
			<?php endif; ?>
			
			<?php get_template_part('inc/pagination'); ?>
			
		<?php endif; ?>
		
	</div><!--/.pad-->
</div><!--/.content-->

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>