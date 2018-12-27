<div class="row">

<?php while ( have_posts() ) : the_post(); ?>
	
	<div class="article grid-100">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php lupercalia_post_thumbnail( $args = array ( 'size' => 'blog-featured', 'sample' => true, 'link' => false, 'date' => true ) ); ?>
			
			<div class="content-hover">
			
				<header class="entry-header">
				
					<p class="entry-category"><?php the_category(' &bull; '); ?></p>
				
					<h1 class="entry-title"><?php the_title(); ?></h1>
				
				</header> <!-- .entry-header -->
				
				<div class="entry-content">
				
					<?php the_content(); ?>
					
					<?php wp_link_pages( array( 'before' => '<p class="pagination">', 'after' => '</p>', 'link_before' => '<span class="page-numbers">', 'link_after' => '</span>' ) ); ?>			

				</div> <!-- .entry-content -->	
				
				<footer class="entry-footer">
			
					<?php the_tags('<div class="tagcloud"> ', ' ' , '</div>'); ?>
				
				</footer> <!-- .entry-footer -->
				
				<?php lupercalia_related_posts(); ?>
					
				<?php comments_template(); ?>

			</div> <!-- content-hover -->
			
		</article> <!-- .post -->

	</div> <!-- .article .grid-100 -->
	
<?php endwhile; ?>

</div> <!-- .row-post -->