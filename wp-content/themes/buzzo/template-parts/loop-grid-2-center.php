<div <?php post_class(); ?>>
	<?php buzzo_post_media(); ?>

	<div class="post-meta">
		<?php buzzo_post_categories(); ?>
	</div>

	<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></div>' ); ?>

	<?php buzzo_post_content(); ?>

	<div class="post-meta2">
		<?php buzzo_post_date(); ?>
	</div>
</div> <!-- End .post -->
