<?php
/**
 * Widget template
 *
 * @package Travel_Gem
 */

$qargs = array(
	'post_type'           => 'itineraries',
	'post_status'         => 'publish',
	'posts_per_page'      => absint( $instance['post_number'] ),
	'no_found_rows'       => true,
	'ignore_sticky_posts' => true,
	);

if ( absint( $instance['post_category'] ) > 0 ) {
	$qargs['tax_query'] = array(
		array(
			'taxonomy' => 'itinerary_types',
			'field'    => 'term_id',
			'terms'    => absint( $instance['post_category'] ),
			),
		);
}

$the_query = new WP_Query( $qargs );
?>

<aside class="section section-latest-trips heading-<?php echo esc_attr( $instance['heading_alignment'] ); ?>">

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
		<p class="widget-subtitle"><?php echo esc_html( $instance['subtitle'] ); ?></p>
	<?php endif; ?>

	<?php if ( class_exists( 'WP_Travel' ) ) : ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<div class="latest-trips-section latest-trips-col-<?php echo absint( $instance['post_column'] ) ?>">
				<div class="inner-wrapper">
					<div class="trips-list">

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<div class="trip-item">
								<div class="trip-item-wrapper section-inner-wrapper">
									<div class="trip-post-thumbnail">
										<a href="<?php the_permalink(); ?>">
											<?php echo wp_travel_get_post_thumbnail( get_the_ID(), esc_attr( $instance['featured_image'] ) ); ?>
										</a>
										<?php wp_travel_save_offer( get_the_ID() ); ?>
									</div><!-- .trip-post-thumbnail -->
								<div class="trip-item-content-wrapper">
									<div class="trip-post-info">
										<h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
										<div class="trip-post-bottom-meta">
											<?php wp_travel_trip_price( get_the_ID(), true ); ?>
										</div>
									</div><!-- .trip-post-info -->

									<div class="trip-post-content">
										<?php wp_travel_get_trip_duration( get_the_ID() ); ?>
										<div class="trip-post-category">
											<?php if ( wp_travel_tab_show_in_menu( 'reviews' ) ) : ?>
												<?php $average_rating = wp_travel_get_average_rating() ?>
												<div class="trip-average-review" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'travel-gem' ), $average_rating ); ?>">

													<span style="width:<?php echo esc_attr( ( $average_rating / 5 ) * 100 ); ?>%">
														<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average_rating ); ?></strong> <?php printf( esc_html__( 'out of %1$s5%2$s', 'travel-gem' ), '<span itemprop="bestRating">', '</span>' ); ?>
													</span>
												</div>
												<?php $count = (int) wp_travel_get_review_count(); ?>
												<span class="trip-review-text"> (<?php printf( esc_html( _n( '%d Review', '%d Reviews', $count, 'travel-gem' ) ), $count ); ?>)</span>
											<?php endif; ?>
										</div><!-- .trip-post-category -->

										<?php travel_gem_render_trip_categories( get_the_ID() ); ?>
									</div><!-- .trip-post-content -->

									<?php $enable_sale = get_post_meta( get_the_ID(), 'wp_travel_enable_sale', true ); ?>
									<?php if ( $enable_sale ) : ?>
										<div class="trip-item-offer">
											<span><?php esc_html_e( 'Offer', 'travel-gem' ); ?></span>
										</div><!-- .trip-item-offer -->
									<?php endif; ?>
								</div><!-- .trip-item-content-wrapper-->
								</div><!-- .trip-item-wrapper -->
							</div><!-- .trip-item -->

						<?php endwhile; ?>

					</div><!-- .trips-list -->

					<?php wp_reset_postdata(); ?>

					<?php if ( ! empty( $instance['explore_button_url'] ) && ! empty( $instance['explore_button_text'] ) ) : ?>
						<div class="more-wrapper">
							<a href="<?php echo sow_esc_url( $instance['explore_button_url'] ); ?>" class="custom-button"><?php echo esc_html( $instance['explore_button_text'] ); ?></a>
						</div><!-- .more-wrapper -->
					<?php endif; ?>

				</div><!-- .inner-wrapper -->
			</div><!-- .latest-trips-section -->

		<?php endif; ?>

	<?php else : ?>

		<?php if ( current_user_can( 'activate_plugins' ) ) : ?>

			<p><?php esc_html_e( 'WP Travel plugin is not active. Please install and activate the plugin first.', 'travel-gem' ); ?></p>

		<?php endif; ?>

	<?php endif; ?>

</aside><!-- .section-latest-trips -->
