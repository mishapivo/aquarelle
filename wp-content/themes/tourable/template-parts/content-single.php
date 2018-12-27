<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
$options = tourable_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear ' . $class ); ?>>
	
    <div class="featured-image">
    	<?php if ( ! $options['single_post_hide_date'] ) : ?>
	        <div class="entry-meta">
	            <?php 
	            	echo tourable_author_meta();
	            	tourable_posted_on(); 
	            ?>
	        </div><!-- .entry-meta -->
        <?php endif; ?>
    </div>

	<div class="post-wrapper">
		<div class="entry-container">
			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tourable' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tourable' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			
			<div class="entry-meta">
				<?php tourable_entry_footer(); ?>
			</div>
		</div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article><!-- #post-## -->
