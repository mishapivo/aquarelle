<?php
/**
 * Template part for displaying single post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Gem
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>

	<?php travel_gem_single_post_thumbnail(); ?>

	<div class="entry-content-wrapper">

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php travel_gem_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<div class="entry-content">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'travel-gem' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-gem' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div><!-- .entry-content-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->
