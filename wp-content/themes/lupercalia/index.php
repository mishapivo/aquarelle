<?php get_header(); ?>

	<div class="wrapper">
	
		<div id="content" class="content">
	
			<div class="row-post">
			
				<div id="main" class="main grid-66" role="main">
				
					<?php lupercalia_blog_slider(); ?>
				
					<?php if ( have_posts() ) : ?>

						<?php get_template_part( 'content', lupercalia_template_part() ); ?>
	
					<?php else : ?>
	
						<div class="e404 grid-50">
				
							<h1 class="entry-title"><?php echo esc_html__('Nothing Found', 'lupercalia'); ?></h1>
							<p><?php echo esc_html__('Nothing was found. You can try again using the search form below.', 'lupercalia'); ?></p>
							<?php get_search_form(); ?>
				
						</div> <!-- .e404 .grid-50 -->

					<?php endif; ?>
					
				</div> <!-- .main .grid-66 -->
				
				<?php get_sidebar(); ?>
			
			</div> <!-- .row-post -->
			
		</div> <!-- .content -->	
	
	</div> <!-- .wrapper -->

<?php get_footer(); ?>	