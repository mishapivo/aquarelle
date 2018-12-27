<?php
/**
 * Widget template
 *
 * @package Travel_Gem
 */

?>

<div class="section section-trip-search heading-<?php echo esc_attr( $instance['heading_alignment'] ); ?>">

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
	<?php endif; ?>

	<?php if ( ! empty( $instance['subtitle'] ) ) : ?>
		<p class="widget-subtitle"><?php echo esc_html( $instance['subtitle'] ); ?></p>
	<?php endif; ?>

	<?php if ( function_exists( 'wp_travel_search_form' ) ) : ?>
		<div class="trip-search-section">
			<?php wp_travel_search_form(); ?>
		</div><!-- .trip-search-section -->
	<?php endif; ?>

</div><!-- .section-trip-search -->
