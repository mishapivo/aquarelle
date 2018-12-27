<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 
 Template name: Videos
 *
 * @package Devion
 */

get_header(); ?>
<div class="pages-title">
	<div class="container"><div class="row"> 
		<div class="col-md-12">
			<h2> <?php _e('Videos','devion');?> </h2>
		</div>
	</div></div>
</div>
<div class="container"><div class="row"> 
	<div id="primary" class="content-area">
		<div id="videos-container">
		
			<?php
						
				if ( get_query_var('paged') )
				    $paged = get_query_var('paged');
				elseif ( get_query_var('page') )
				    $paged = get_query_var('page');
				else
				    $paged = 1;
				$wp_query = new WP_Query(array('post_type' => 'video_type', 'paged' => $paged ));
				?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				
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
			<div class="col-md-12">
				<?php kriesi_pagination(); ?>
			</div>
		</div>
	</div>
</div></div>
<?php get_footer(); ?>
