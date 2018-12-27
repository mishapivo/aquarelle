<?php
/**
 * Widget template
 *
 * @package Travel_Gem
 */

$page_id = absint( $instance['special_page_id'] );
?>

<div class="section section-special-page heading-<?php echo esc_attr( $instance['heading_alignment'] ); ?>">

	<?php
	if ( $page_id > 0 ) {
		$attr = array(
			'class' => 'align' . esc_attr( $instance['featured_image_alignment'] ),
			);
		$thumbnail = get_the_post_thumbnail( $page_id, esc_attr( $instance['featured_image'] ), $attr );
		if ( ! empty( $thumbnail ) && 'disable' !== $instance['featured_image'] ) {
			echo wp_kses_post( $thumbnail );
		}
	}
	?>

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
		<p class="widget-subtitle"><?php echo esc_html( $instance['subtitle'] ); ?></p>
	<?php endif; ?>

	<?php if ( $page_id > 0 ) : ?>
		<?php
		$qargs = array(
			'posts_per_page' => 1,
			'page_id'        => absint( $instance['special_page_id'] ),
			'no_found_rows'  => true,
			);

		$the_query = new WP_Query( $qargs );
		?>
		<?php if ( $the_query->have_posts() ) : ?>

			<div class="special-page-section">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<?php the_content(); ?>

						<?php endwhile; ?>
			</div><!-- .special-page-section -->

		<?php endif; ?>

	<?php endif; ?>

</div> <!-- .section-special-page -->
