<?php
/**
 * Widget template
 *
 * @package Travel_Gem
 */

$qargs = array(
	'posts_per_page'      => absint( $instance['post_number'] ),
	'no_found_rows'       => true,
	'ignore_sticky_posts' => true,
	);

if ( absint( $instance['post_category'] ) > 0 ) {
	$qargs['cat'] = absint( $instance['post_category'] );
}

$the_query = new WP_Query( $qargs );
?>

<aside class="section section-latest-news heading-<?php echo esc_attr( $instance['heading_alignment'] ); ?>">

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
		<p class="widget-subtitle"><?php echo esc_html( $instance['subtitle'] ); ?></p>
	<?php endif; ?>

	<?php if ( $the_query->have_posts() ) : ?>

		<div class="latest-news-section latest-news-col-<?php echo absint( $instance['post_column'] ) ?>">
			<div class="inner-wrapper">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div class="latest-news-item latest-news-item-1">
						<div class="latest-news-wrapper section-inner-wrapper">
							<div class="latest-news-thumb">
								<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php
									$img_attributes = array( 'class' => 'aligncenter' );
									the_post_thumbnail( esc_attr( $instance['featured_image'] ), $img_attributes );
									?>
								<?php endif; ?>
								</a>
							</div><!-- .latest-news-thumb -->
							<div class="latest-news-text-content">
							<div class="news-meta-wrapper">

								<h3 class="latest-news-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="latest-news-meta">
									<span class="posted-on"><?php the_time( get_option( 'date_format' ) ); ?></span>
									<?php $category = travel_gem_get_single_post_category(); ?>
									<?php if ( ! empty( $category ) ) : ?>
										<span class="latest-news-category"><a href="<?php echo esc_url( $category['url'] ); ?>"><?php echo esc_html( $category['name'] ); ?></a></span>
									<?php endif; ?>
								</div><!-- .latest-news-meta -->
								</div> <!-- .news-meta-wrapper -->
								<?php if ( absint( $instance['excerpt_length'] ) > 0 ) : ?>
									<div class="latest-news-summary">
										<?php
										$excerpt = travel_gem_the_excerpt( absint( $instance['excerpt_length'] ) );
										echo wp_kses_post( wpautop( $excerpt ) );
										?>
									</div><!-- .latest-news-summary -->
								<?php endif; ?>

								<?php if ( ! empty( $instance['more_text'] ) ) : ?>
									<a href="<?php the_permalink(); ?>" class="more-link"><?php echo esc_html( $instance['more_text'] ); ?></a>
								<?php endif; ?>
							</div><!-- .latest-news-text-content -->
						</div><!-- .latest-news-wrapper -->
					</div><!-- .latest-news-item  -->

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

				<?php if ( ! empty( $instance['explore_button_url'] ) && ! empty( $instance['explore_button_text'] ) ) : ?>
					<div class="more-wrapper">
						<a href="<?php echo sow_esc_url( $instance['explore_button_url'] ); ?>" class="custom-button"><?php echo esc_html( $instance['explore_button_text'] ); ?></a>
					</div><!-- .more-wrapper -->
				<?php endif; ?>
			</div><!-- .inner-wrapper -->
		</div><!-- .latest-news-section -->

	<?php endif; ?>

</aside><!-- .section-latest-news -->
