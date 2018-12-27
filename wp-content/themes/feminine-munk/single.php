<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Feminine_Munk
 */

get_header(); ?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); ?>

                <!-- Tags -->
                <div class="tag-block">
                    <span class="tags">
                        <?php the_tags( ' ', ' ' ); ?>
                    </span>
                </div>

                <?php 
                /**
                 * Pagination 
                 * 
                 * @hooked feminine_munk_pagination
                */
                do_action( 'feminine_munk_pagination' );
                
                /**
                 * Author Section
                 * 
                 * @hooked feminine_munk_author_info
                */
                do_action( 'feminine_munk_author_info' );

                /**
                 * Similar Posts 
                 * 
                 * @hooked feminine_munk_similar_post
                */
                do_action( 'feminine_munk_similar_post' ); ?>

                <?php

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();