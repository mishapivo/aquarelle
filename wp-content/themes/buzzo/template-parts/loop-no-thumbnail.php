<div <?php post_class(); ?>>
	<div class="post-meta">
		<?php buzzo_post_categories(); ?>

		<?php buzzo_post_date(); ?>
	</div>

	<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></div>' ); ?>
</div>
