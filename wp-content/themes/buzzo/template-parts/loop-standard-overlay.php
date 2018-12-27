<div <?php post_class( 'post-layout-standard-overlay' ); ?>>
	<?php buzzo_post_media( 'buzzo-large-wide' ); ?>

	<div class="post-overlay">
		<div class="post-overlay-content">
			<div class="post-meta">
				<?php buzzo_post_categories(); ?>

				<?php buzzo_post_date(); ?>
			</div>

			<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></div>' ); ?>
		</div>
	</div>
</div> <!-- End .post -->
