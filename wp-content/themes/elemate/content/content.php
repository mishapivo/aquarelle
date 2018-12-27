<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php if ( is_single() ) { 
				the_post_thumbnail( 'elemate-featured-image' );
			} else { ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'elemate-featured-image' ); ?>
				</a>
			<?php } ?>
			
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php elemate_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif;
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			if ( is_single() ) {
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'elemate' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			} else {
				the_excerpt();
			}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'elemate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php elemate_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php
	if ( '' !== get_the_author_meta( 'description' ) && is_single() ) {
		get_template_part( 'content/biography' );
	}
	?>
</article><!-- #post-## -->
