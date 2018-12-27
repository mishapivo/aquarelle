<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Moral
 */

get_header(); ?>
	<div id="inner-content-wrapper">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div id="infinite-post-wrap" class="post-archive grid">

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div><!-- #infinite-post-wrap -->
				<?php reblog_posts_pagination(); ?>
			</main><!-- #main -->
		</div><!-- #primary -->
    </div><!-- #inner-content-wrapper-->
<?php
get_footer();
