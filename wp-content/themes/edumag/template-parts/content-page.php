<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

global $post;

	/*
	 * edumag_post_title hook
	 *
	 * @hooked edumag_get_post_title -  10
	 *
	*/
	do_action( 'edumag_post_title' );
?>
 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-wow-delay="0.3s" data-wow-duration="0.5s">
 	<?php if ( has_post_thumbnail() ) : ?>
        <div class="image-wrapper">
        	<?php edumag_get_thumbnail_image(); // get thumbnail images ?>
        </div>
    <?php endif; ?>

		<div class="entry-content">
			<?php 
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'edumag' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edumag' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edumag_entry_footer(); ?>
		</footer><!-- .entry-footer -->

    </article><!-- #post-1 -->