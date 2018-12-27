<?php
/**
 * Template part for displaying card content in index.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */

?>
	<div class="col s12 m4">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="card">
			
            <div class="card-image">
            <?php if ( '' !== get_the_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'elemate-featured-image' ); ?>
				</a>			
			</div><!-- .post-thumbnail -->
			<?php endif; ?>			
            </div>
			
            <div class="card-content">
			
			<?php the_title( '<span class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></span>' );
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php elemate_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>
              <div class="entry-content">
			<?php
			echo wp_kses_post( elemate_3cards_excerpt() );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'elemate' ),
				'after'  => '</div>',
			) );
			?>
			</div><!-- .entry-content -->
            </div>
			
            <div class="card-action">
            <footer class="entry-footer">
			<?php elemate_entry_footer(); ?>
			</footer><!-- .entry-footer -->
            </div>
			
          </div>
		</article><!-- #post-## -->  
    </div>