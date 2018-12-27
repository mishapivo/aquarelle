<?php if( get_theme_mod( 'theme_headline_display_option', false ) ) : ?>

	<?php
		$category_id = get_theme_mod( 'theme_headline_category' );
		$title = get_theme_mod( 'headline_title' );
		$posts_per_page = get_theme_mod( 'number_of_headline_posts', 3 );

		$args = array(
			'cat' => absint( $category_id ),
			'posts_per_page' => $posts_per_page,
			'ignore_sticky_posts' => 1
		);
		$query = new WP_Query( $args );
	?>

	<?php if( $query->have_posts() && $posts_per_page ) : ?>
		<div class="headline-ticker-4">
			<div class="container">
				<div class="headline-ticker-wrapper">
					<?php if( $title ) : ?><div class="headline-title"><?php echo esc_html( $title ); ?></div><?php endif; ?>
					<div class="headline-wrapper">
					<div id="owl-heading" class="owl-carousel" >
					<?php while( $query->have_posts() ) : $query->the_post(); ?> 
						<div class="item">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
							<?php if( ! empty( $image ) ) : ?>
								<a href="<?php the_permalink(); ?>" class="feature-image">
									<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive">
								</a>
							<?php endif; ?>
							<small><?php echo get_the_date(); ?></small> 
							<a href="<?php the_permalink(); ?>" class="heading-title"><?php the_title(); ?></a>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
						
					</div>	
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>


<?php endif; ?>