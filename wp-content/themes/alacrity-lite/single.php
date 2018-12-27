<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Alacrity Lite
 */

get_header();?>

	<div id="primary" class="site-content row">
		<div id="content" role="main">	
			<div class="container">
				<div class="content_box">		
					<?php while ( have_posts() ) : the_post();
						// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'alacrity-lite' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'alacrity-lite' ) . '<i class="fa fa fa-angle-right"></i></span>' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'alacrity-lite' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fa fa fa-angle-left"></i>' . __( 'Previous Post', 'alacrity-lite' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'alacrity-lite' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			 ?>
					<?php endwhile; // end of the loop. ?>
				</div>			
		    	<?php get_sidebar(); ?>
			</div>
	</main><!-- #main -->
</div><!-- #primary -->
    
<?php get_footer(); ?>