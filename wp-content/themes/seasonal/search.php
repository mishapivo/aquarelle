<?php
/**
 * The template for displaying search results.
 *
 * @package Seasonal
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'seasonal' ), get_search_query() ); ?></h1>
			</header>

      <?php
      // Start the loop.
      while ( have_posts() ) : the_post();
      
        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/content', 'search' );
        
      // End the loop.
      endwhile;

			// Previous/next page navigation.
			seasonal_blog_pagination();
			
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		<?php get_template_part( 'template-parts/site-footer' ); ?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>