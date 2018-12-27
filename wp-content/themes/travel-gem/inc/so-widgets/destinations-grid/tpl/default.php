<?php
/**
 * Widget template
 *
 * @package Travel_Gem
 */

$details = $this->get_destination_details( $instance );
?>

<div class="section section-destinations-grid heading-<?php echo esc_attr( $instance['heading_alignment'] ); ?>">

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
		<p class="widget-subtitle"><?php echo esc_html( $instance['subtitle'] ); ?></p>
	<?php endif; ?>

	<?php if ( class_exists( 'WP_Travel' ) ) : ?>

		<?php if ( ! empty( $details ) ) : ?>

			<div class="destinations-grid-section">
				<div class="inner-wrapper">
					<div class="destinations-list destinations-grid-col-<?php echo absint( $instance['post_column'] ) ?>">

						<?php foreach ( $details as $item ) : ?>

							<div class="destination-item">
								<div class="destination-item-wrapper">
									<div class="destination-post-thumbnail">
										<a href="<?php echo esc_url( $item['url'] ); ?>">
											<?php if ( ! empty( $item['image'] ) ) : ?>
												<img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" />
											<?php else : ?>
												<img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-image-default.png' ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" />
											<?php endif; ?>
										</a>
									</div><!-- .destination-post-thumbnail -->
									<div class="destination-item-content-wrapper">
										<div class="destination-post-info">
											<h4 class="destinaton-post-title"><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a></h4>
										</div><!-- .destination-post-info -->
									</div><!-- .destination-item-content-wrapper -->
								</div><!-- .destination-item-wrapper -->
							</div><!-- .destination-item -->

						<?php endforeach; ?>

					</div><!-- .destinations-list -->
				</div><!-- .inner-wrapper -->
			</div><!-- .destinations-grid-section -->

		<?php endif; ?>

	<?php else : ?>

		<?php if ( current_user_can( 'activate_plugins' ) ) : ?>

			<p><?php esc_html_e( 'WP Travel plugin is not active. Please install and activate the plugin first.', 'travel-gem' ); ?></p>

		<?php endif; ?>

	<?php endif; ?>

</div><!-- .section-destinations-grid -->
