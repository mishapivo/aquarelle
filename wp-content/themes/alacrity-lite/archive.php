<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alacrity Lite
 */

get_header();
?>

<div id="primary" class="site-content">
        <div id="content" role="main">
            <div class="container">
            <div class="content_box">
       <?php if ( have_posts() ) : ?>
                <div class="blog-container">
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                    <?php endwhile; /* End the Loop */ ?>
                </div> <!-- blog-container-->
                <?php  
                // Previous/next post navigation.
                alacrity_lite_custom_pagination();
            else : 
                get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>
    </div>
            <?php get_sidebar(); ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
    
<?php get_footer(); ?>
