<div class="row">

<?php while ( have_posts() ) : the_post(); ?>
	
	<div class="article grid-100">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php lupercalia_post_thumbnail( $args = array ( 'size' => 'blog-featured', 'sample' => false, 'link' => false, 'date' => false ) ); ?>

			<div class="content-hover">
			
				<header class="entry-header">
				
					<h1 class="entry-title"><?php the_title(); ?></h1>
				
				</header> <!-- .entry-header -->
				
				<div class="entry-content">
				
					<?php the_content(); ?>
					
					<?php wp_link_pages( array( 'before' => '<p class="pagination">', 'after' => '</p>', 'link_before' => '<span class="page-numbers">', 'link_after' => '</span>' ) ); ?>			
					
					<?php the_tags('<div class="tagcloud"> ', ' ' , '</div>'); ?>

				</div> <!-- .entry-content -->	
		
				<?php comments_template(); ?>
		
			</div> <!-- content-hover -->
			
			<footer class="entry-footer">
			
			</footer> <!-- .entry-footer -->

		</article> <!-- .post -->

	</div> <!-- .article .grid-100 -->
	
<?php endwhile; ?>

</div> <!-- .row -->