<?php
/**
 * Template part for content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>

    <?php
	the_content( sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'reblog' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'reblog' ),
		'after'  => '</div>',
	) );

	?>
	
</article><!-- #post-<?php the_ID(); ?> -->
