<?php
/**
 * Template part for adj post
 *
 * @package Buzzo
 */

?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="adjacent-post-box" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
<?php else : ?>
	<div class="adjacent-post-box no-bg pt-70 pb-70">
<?php endif; ?>

	<div <?php post_class(); ?>>
		<span><?php esc_html_e( 'Next post', 'buzzo' ); ?></span>

		<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></div>' ); ?>
	</div>
</div>
