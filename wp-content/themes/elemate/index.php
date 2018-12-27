<?php
/**
 * This is the default index template
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<div class="container">
    <div class="section content">

      <div class="row">
        <div class="col s12">
		<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					do_action( 'elemate_home_feed' );
					

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'content/content', 'none' );

			endif; ?>
		</div>
      </div>

    </div>
</div>
  
<?php get_footer();