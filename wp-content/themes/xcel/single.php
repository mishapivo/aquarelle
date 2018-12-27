<?php
/**
 * The template for displaying all single posts.
 *
 * @package Xcel
 */

get_header(); ?>

    <div class="site-container">

    	<div id="primary" class="content-area">
    		<main id="main" class="site-main" role="main">

    		<?php while ( have_posts() ) : the_post(); ?>

    			<?php get_template_part( 'content', 'single' ); ?>

    			<?php the_post_navigation(); ?>

    			<?php
    				// If comments are open or we have at least one comment, load up the comment template
    				if ( comments_open() || get_comments_number() ) :
    					comments_template();
    				endif;
    			?>

    		<?php endwhile; // end of the loop. ?>

    		</main><!-- #main -->
    	</div><!-- #primary -->
        
        <?php get_sidebar(); ?>
        
        <div class="clearboth"></div>
    </div>
    
<?php get_footer(); ?>
