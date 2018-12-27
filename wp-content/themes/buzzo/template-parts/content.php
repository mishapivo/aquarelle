<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buzzo
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content">
		<?php the_content(); ?>
	</div>

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'buzzo' ),
		'after'  => '</div>',
	) );
	?>

	<?php if ( is_active_sidebar( 'buzzo-post-footer' ) ) : ?>
		<div class="post-footer">
			<?php dynamic_sidebar( 'buzzo-post-footer' ); ?>
		</div>
	<?php endif; ?>
</div>
