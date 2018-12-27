<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Feminine_Munk
 */


get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

                <!-- Search Result For Text -->
                <div class="search-header">
                    <h1 class="page-title"> <?php
                        /* translators: %s: search query. */
                        printf( esc_html__( 'Search Results for: %s', 'feminine-munk' ), get_search_query() );
                        ?>
                    </h1>
                    <span> 
                        <?php
                        global $wp_query;
                        printf( esc_html__( '%s Results are found', 'feminine-munk' ), $wp_query->found_posts );
                        ?>
                    </span>
                </div>

                <?php

                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'search' );

                endwhile;

                /**
                 * Pagination 
                 * 
                 * @hooked feminine_munk_pagination
                */
                do_action( 'feminine_munk_pagination' );

            else :

                //if no any post found
                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_sidebar();
get_footer();