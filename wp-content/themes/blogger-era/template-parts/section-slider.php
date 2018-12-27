<?php
/**
 * Template that display slider.
 *
 * @package Blogger_Era
 */
?>
<?php $enable_slider 		= blogger_era_get_option( 'enable_slider' );
$slider_category   			= blogger_era_get_option( 'slider_category' ); 
$slider_number   			= blogger_era_get_option( 'slider_number' );
$slider_type   				= blogger_era_get_option( 'slider_type' );
$banner_image   			= blogger_era_get_option( 'banner_image' );
?>
<?php if ( 'post-slider' == $slider_type ){ ?>
	<section class="freature-slider-section">
		<?php $slider_args = array(
				'posts_per_page' => absint( $slider_number),				
				'post_type' => 'post',
				'post_status' => 'publish',
				'paged' => 1,
				);

			if ( absint( $slider_category ) > 0 ) {
				$slider_args['cat'] = absint( $slider_category );
			}
		$slider_query = new WP_Query( $slider_args );
		if ( $slider_query->have_posts() ) : ?>
			<div class="owl-carousel owl-theme feature-slider">
				<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
					<?php $no_image = '';
					if ( !has_post_thumbnail() ): 
						$no_image = 'no-image';
					endif; ?>
					<div class="item <?php echo esc_attr( $no_image );?>">
						<?php the_post_thumbnail( 'blogger-era-slider' ); ?>
						<div class="caption text-right">
							<div class="caption-wrap">
								<?php blogger_era_categories();?>
								<header class="entry-header">
									<h2 class="entry-title">
										<a href="<?php the_permalink()?>"><?php the_title();?></a>
									</h2>
								</header>
								
								<div class="entry-meta">
									<?php blogger_era_posted_by();
									blogger_era_posted_on(); ?>
								</div>
								
								<div class="btn-wrap">
									<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__( 'Read More', 'blogger-era' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata();?>	
			</div>
		<?php endif; ?>
	</section>
<?php } else{ ?>
	<?php if ( $banner_image > 0 ): ?>
		<section class="freature-slider-section">
			<?php 
			$slider_args = array(						
					'post_type' => 'page',
					'post_status' => 'publish',
					'page_id' => absint( $banner_image ),
					);

			$slider_query = new WP_Query( $slider_args );		
			if ( $slider_query->have_posts() ) : ?>
				
				<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
					<?php $no_image = '';
						if ( !has_post_thumbnail() ): 
							$no_image = 'no-image';
					endif; ?>
					<div class="item <?php echo esc_attr( $no_image );?>">
						<?php the_post_thumbnail( 'blogger-era-slider' ); ?>
						<div class="caption text-right">
							<div class="caption-wrap">
								<?php blogger_era_categories();?>
								<header class="entry-header">
									<h2 class="entry-title">
										<a href="<?php the_permalink()?>"><?php the_title();?></a>
									</h2>
								</header>
								
								<div class="entry-meta">
									<?php blogger_era_posted_by();
									blogger_era_posted_on(); ?>
								</div>
								
								<div class="btn-wrap">
									<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__( 'Read More', 'blogger-era' ); ?></a>
								</div>
							</div>
						</div>
					</div>
					
				<?php endwhile;
				wp_reset_postdata();?>				
			<?php endif; ?>
		</section>

	<?php endif;
	}
