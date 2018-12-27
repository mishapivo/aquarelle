<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buzzo
 */

?>
<div <?php post_class(); ?>>
	<?php buzzo_post_media( 'buzzo-large' ); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="post-meta">
			<?php buzzo_post_categories(); ?>

			<?php buzzo_post_date(); ?>
		</div>
	<?php endif; ?>

	<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></div>' ); ?>

	<div class="post-content">
		<?php the_excerpt(); ?>
	</div>
</div> <!-- End .post -->
