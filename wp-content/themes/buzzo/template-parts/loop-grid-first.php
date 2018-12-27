<?php
/**
 * Template for first post of posts grid section
 *
 * @package Buzzo
 */

?>

<div <?php post_class( 'post-layout-list-lg' ); ?>>
	<div class="row">
		<div class="col-sm-6">
			<?php buzzo_post_media( 'buzzo-large' ); ?>
		</div>

		<div class="col-sm-6">
			<div class="post-meta">
				<?php buzzo_post_categories(); ?>

				<?php buzzo_post_date(); ?>
			</div>

			<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></div>' ); ?>

			<?php buzzo_post_content(); ?>

			<span class="bottom-line"></span>
		</div>
	</div>
</div> <!-- End .post -->
