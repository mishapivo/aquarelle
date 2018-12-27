<?php get_header(); ?>

	<div class="wrapper">
	
		<div id="content" class="content">
	
			<div class="row">
			
				<div id="main" class="main grid-100" role="main">
				
					<?php if ( have_posts() ) : ?>

						<div class="row">

							<?php while ( have_posts() ) : the_post(); ?>
								
								<div class="article grid-100">
								
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										
										<div class="content-hover">
										
											<header class="entry-header">
											
												<h1 class="entry-title"><?php the_title(); ?></h1>
											
											</header> <!-- .entry-header -->
											
											<div class="entry-content">
											
												<?php the_content(); ?>

											</div> <!-- .entry-content -->	
									
											<?php comments_template(); ?>
									
										</div> <!-- content-hover -->
										
										<footer class="entry-footer">
										
										</footer> <!-- .entry-footer -->

									</article> <!-- .post -->

								</div> <!-- .article .grid-100 -->
								
							<?php endwhile; ?>

						</div> <!-- .row -->
	
					<?php else : ?>
	
						<!-- nenhum post -->

					<?php endif; ?>
					
				</div> <!-- .main .grid-66 -->
			
			</div> <!-- .row--->
			
		</div> <!-- .content -->	
	
	</div> <!-- .wrapper -->

<?php get_footer(); ?>	
 
 