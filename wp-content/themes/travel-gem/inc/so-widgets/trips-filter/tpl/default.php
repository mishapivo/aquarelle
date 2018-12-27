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

$the_trips = new WP_Query( $qargs );
?>

<div class="section section-trips-filter heading-<?php echo esc_attr( $instance['heading_alignment'] ); ?>">

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
		<p class="widget-subtitle"><?php echo esc_html( $instance['subtitle'] ); ?></p>
	<?php endif; ?>

	<?php if ( class_exists( 'WP_Travel' ) ) : ?>
		<?php $data = $this->get_trip_details( $instance ); ?>

		<?php if ( ! empty( $data ) ) : ?>

			<div class="portfolio-main-wrapper">

				<?php if ( ! empty( $data['categories'] ) && absint( count( $data['categories'] ) ) > 1 ) : ?>
					<nav class="portfolio-filter">
						<ul>
							<li><a class="current" href="#" data-filter="*"><?php esc_html_e( 'All', 'travel-gem' ); ?></a></li>
							<?php foreach ( $data['categories'] as $key => $category ) : ?>
								<li>
									<a href="#" data-filter=".<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $category ); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav><!-- .portfolio-filter -->
				<?php endif; ?>

				<?php if ( ! empty( $data['posts'] ) ) : ?>
					<div class="portfolio-container portfolio-col-3">
						<?php foreach ( $data['posts'] as $key => $portfolio ) : ?>

							<?php
							$filter_classes = '';
							$categories_text = '';

							if ( ! empty( $portfolio['categories'] ) ) {
								foreach ( $portfolio['categories'] as $key => $cat ) {
									$filter_classes .= ' ' . $cat->slug;
									$categories_text .= $cat->name . ', ';
								}
							}
							?>

							<div class="portfolio-item <?php echo esc_attr( $filter_classes ); ?>">
								<div class="item-inner-wrapper">
									<?php if ( ! empty( $portfolio['image'] ) ) : ?>
										<img src="<?php echo esc_url( $portfolio['image'][0] ); ?>" alt="<?php echo esc_attr( $portfolio['title'] ); ?>" class="portfolio-thumb" />
									<?php endif; ?>

									<div class="overlay"></div>

									<div class="portfolio-content">
										<h3><a href="<?php echo esc_url( $portfolio['url'] ); ?>"><?php echo esc_html( $portfolio['title'] ); ?></a></h3>
										<span><a class="custom-button" href="<?php echo esc_url( $portfolio['url'] ); ?>"><?php esc_html_e( 'Read more', 'travel-gem' ); ?></a></span>
									</div><!-- .portfolio-content -->
								</div><!-- .item-inner-wrapper -->
							</div><!-- .portfolio-item -->

						<?php endforeach; ?>
					</div><!-- .masonry-wrapper -->
				<?php endif; ?>

			</div><!-- .portfolio-main-wrapper -->

		<?php endif; ?>

	<?php else : ?>

		<?php if ( current_user_can( 'activate_plugins' ) ) : ?>

			<p><?php esc_html_e( 'WP Travel plugin is not active. Please install and activate the plugin first.', 'travel-gem' ); ?></p>

		<?php endif; ?>

	<?php endif; ?>

</div><!-- .section-trips-filter -->
