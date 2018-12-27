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

<div class="section section-recent-posts heading-<?php echo esc_attr( $instance['heading_alignment'] ); ?>">

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
		<p class="widget-subtitle"><?php echo esc_html( $instance['subtitle'] ); ?></p>
	<?php endif; ?>

	<?php if ( $the_query->have_posts() ) : ?>

		<div class="recent-posts-section">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<div class="recent-posts-item">
					<div class="recent-posts-wrapper">
						<?php if ( 'disable' !== $instance['featured_image'] ) : ?>
							<div class="recent-posts-thumb">
								<a href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php
										$img_attributes = array(
											'style' => 'max-width:' . esc_attr( $instance['image_width'] ) . 'px;',
											);
										the_post_thumbnail( esc_attr( $instance['featured_image'] ), $img_attributes );
										?>
									<?php endif; ?>
								</a>
							</div><!-- .recent-posts-thumb -->
						<?php endif; ?>

						<div class="recent-posts-text-content">
							<div class="recent-posts-meta-wrapper">

								<h3 class="recent-posts-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="recent-posts-meta">
									<span class="posted-on"><?php the_time( get_option( 'date_format' ) ); ?></span>
								</div><!-- .recent-posts-meta -->
							</div><!-- .news-meta-wrapper -->

						</div><!-- .recent-posts-text-content -->
					</div><!-- .recent-posts-wrapper -->
				</div><!-- .recent-posts-item  -->

			<?php endwhile; ?>

		</div><!-- .recent-posts-section -->

	<?php endif; ?>

</div><!-- .section-recent-posts -->
