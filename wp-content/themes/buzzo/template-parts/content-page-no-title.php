<?php
/**
 * Template part for displaying page content in page.php.
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
</div>
