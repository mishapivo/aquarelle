<?php
/**
 * Template name: FullWidth
 *
 * @package EleMate
 * @since 	1.0.0
 * @version	1.0.0
 */
get_header(); ?>

<div class="content-container container">
    <div class="section">

      <div class="row">
        <div class="col s12">
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
      </div>

    </div>
  </div>
  
<?php get_footer();