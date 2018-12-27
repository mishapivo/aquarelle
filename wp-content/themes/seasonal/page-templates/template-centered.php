<?php
/**
 * Template Name: Template Centered
 *
 * @package Seasonal
 *
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_sidebar( 'banner' ); ?>
            
				<?php
                // Start the loop.
                while ( have_posts() ) : the_post();
        
                    // Include the page content template.
                    get_template_part( 'template-parts/content', 'page' );
        
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
        
                // End the loop.
                endwhile;
                ?>
            
            <?php get_sidebar( 'bottom' ); ?>
            
        	<?php get_template_part( 'template-parts/site-footer' ); ?>
            
		</main><!-- .site-main -->
	</div><!-- .content-area -->
    
<?php get_footer(); ?>    