<?php get_header(); ?>

	<div id="content" class="content">
	
		<div class="wrapper">
	
				<div class="e404 grid-50">
				
					<h1 class="entry-title"><?php echo esc_html__('Nothing Found', 'lupercalia'); ?></h1>
					<p><?php echo esc_html__('Nothing was found. You can try again using the search form below.', 'lupercalia'); ?></p>
					<?php get_search_form(); ?>
				
				</div> <!-- .e404 .grid-50 -->
			
		</div> <!-- .wrapper -->	
	
	</div>

<?php get_footer(); ?>	