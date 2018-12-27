<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Devion
 */

get_header(); ?>
<div class="container"><div class="row"> 

	<section id="primary" class="content-area">
		<div id="videos-container">

		<?php if ( have_posts() ) : ?>

			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

					<div class="col-md-3 col-sm-6 ">
						<div class="latvideo">
							<?php 
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
							$image = aq_resize( $img_url, 720, 400, true,true,true ); //resize & crop the image
							?>
							<?php if($image) : ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
							<?php endif; ?>
							<div class="latvideo-entry">
							
								<h3> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
								<div class="entry-meta">
									<div>  <?php echo get_the_term_list( $post->ID, 'genre', ' ', ', ', '' ); ?>   </div>
									<span class="view-count"> <?php if( function_exists('the_views')) { the_views(); } ?> </span>
									<span class="like-count"> <?php if( function_exists('zilla_likes')) {zilla_likes(); }?> </span>
								</div><!-- .entry-meta -->
								
							</div>
				
						</div>
					</div>

			<?php endwhile; ?>

			
				<?php kriesi_pagination(); ?>
			

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div>
	</section><!-- #primary -->


	</div></div>
<?php get_footer(); ?>
