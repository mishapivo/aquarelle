<?php $i = 1; ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( $i == 1 ) echo "<div class='row-post'>"  ?>
	
		<div class="article grid-50">
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php lupercalia_post_thumbnail( $args = array ( 'size' => 'blog-featured', 'sample' => true, 'link' => true, 'date' => true ) ); ?>	
				
				<div class="content-hover">
				
					<header class="entry-header">
					
						<p class="entry-category"><?php the_category(' &bull; '); ?></p>
					
						<h3 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					
					</header> <!-- .entry-header -->
					
					<div class="entry-content">
					
						<?php the_excerpt(); ?>

					</div> <!-- .entry-content -->	
			
				</div> <!-- content-hover -->
				
				<footer class="entry-footer">
				
				</footer> <!-- .entry-footer -->

			</article> <!-- .post -->
	
		</div> <!-- .article .grid-50 -->
	
	<?php if ( $i == 2 ) : echo "</div> <!-- .row-post -->";  $i = 0; endif; ?>
	
	<?php $i++; ?>
	
<?php endwhile; ?>

<?php if ( $i == 2 ) : echo "</div> <!-- .row-post -->";  $i = 0; endif; ?>

<?php lupercalia_pagination(); ?>