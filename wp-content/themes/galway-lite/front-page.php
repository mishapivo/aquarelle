<?php
/**
 * The template for displaying home page.
 * @package Galway Lite
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    get_template_part( 'index' );
    }
else{ ?>
		<section class="section-block recent-blog">
				<div id="primary" class="content-area">
				<?php
				while ( have_posts() ) : the_post();
					the_title('<h2 class="entry-title section-title">', '</h2>');
					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
				?>
				</div><!-- #primary -->
			    <?php get_sidebar(); ?>
			    <!-- #sidebar -->
		</section>
	<?php
}
get_footer();