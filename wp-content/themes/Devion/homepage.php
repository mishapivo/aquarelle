<?php
/**
 * The template for displaying homepage
 *
 
 Template name: Homepage
 
 * @package Devion
 */

get_header(); ?>

<div id="featured-videos">
	<div class="container"> <div class="row"> 
			<div id="fvideos">
		
			<?php
			$slidecount = of_get_option('slide_number','6');
			$featcat = of_get_option('vid_cat','1');
			$args = array( 'posts_per_page' => $slidecount, 'post_type' => 'video_type','genre' => $featcat);
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			
			<div class="fvideo">
				<?php 
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 460, 240, true,true, true ); //resize & crop the image
				?>
				<?php if($image) : ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
				<?php endif; ?>
				<div class="fvideo-entry">
				
					<h3> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
					<div class="entry-meta">
						<span class="vid-cats">  <?php echo get_the_term_list( $post->ID, 'genre', ' ', ', ', '' ); ?>   </span>
						<span class="view-count"> <?php if( function_exists('the_views')) { the_views(); } ?> </span>
						<span class="like-count"> <?php if( function_exists('zilla_likes')) {zilla_likes(); }?> </span>
					</div><!-- .entry-meta -->
					
				</div>
	
			</div>
			
			<?php endforeach; 
			wp_reset_postdata();?>
			
			</div>
	</div></div>
	
</div>



<div id="videos-container">
	<div class="container"><div class="row">
			
			<div class="col-md-12">
				<h2 class="section-title"> <?php _e('Latest Videos','devion') ?></h2>
			</div>
		
			<?php
					
			$args = array( 'posts_per_page' => 8, 'post_type' => 'video_type');
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
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
			<?php endforeach; 
			wp_reset_postdata();?>
			
			
	</div></div>
</div>



<div id="latest-posts">
	<div class="container"><div class="row">
			<div class="col-md-12">
				<h2 class="section-title"> <?php _e('Latest Articles','devion') ?></h2>
			</div>
		
		<?php
					
			$args = array( 'posts_per_page' => 3);
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<div class="col-md-4">
				<div class="recpost">
					<?php 
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 720, 400, true,true,true ); //resize & crop the image
					?>
					<?php if($image) : ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
					<?php endif; ?>
					<div class="recpost-entry">
					
						<h3> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
						<div class="entry-meta">
							<?php the_category(', '); ?>					
						</div><!-- .entry-meta -->
						<div class="entry-summary"> <?php the_excerpt(); ?> </div>
					</div>
		
				</div>
			</div>
			<?php endforeach; 
			wp_reset_postdata();?>

		
	</div></div>
</div>

<?php get_footer(); ?>