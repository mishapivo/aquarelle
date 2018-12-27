<?php

$post_img = get_template_directory_uri() . '/assets/images/post-thumbnail.png';

?>

<div class="recent-post-slider">
	<div id="recent-slider" class="owl-carousel owl-theme">
	
	  <?php $args = array(
					'post_type'	=> 'post',
					'orderby'	=> 'post_date',
					'order'	=> 'DESC',
					'posts_per_page' => 3,
					'ignore_sticky_posts' => 1 ,
					'post_status' => 'publish'
			);
		
		$sliderQuery = new WP_Query();
		$sliderQuery->query( $args );
			
			// Loop Start
		if ( $sliderQuery->have_posts() ) :

			while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post(); ?>
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-wrapper">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<span class="bg-overlay"></span>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							</div><!-- .post-thumbnail -->
						<?php else: ?>
							<div class="post-thumbnail">
								<span class="bg-overlay"></span>
								<img src="<?php echo esc_url( $post_img )?>" class="img-responsive" height="750" width="1600" />
							</div>
						<?php endif; ?>
						<div class="post-content overlay">
							<div class="post-inner-wrapper text-center">
								<header class="entry-header">
									<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
								</header><!-- .entry-header -->
								
								<p class="read-more">
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
										<?php esc_html_e( 'Continue Reading', 'business-land' );?>
									</a>
								</p>
								
							</div>  
						</div>
					</div>
				</article><!-- #post-## -->
			<?php endwhile; wp_reset_query();
		endif; ?>
	</div>
</div>
