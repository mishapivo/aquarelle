<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Galway Lite
 */

get_header(); ?>

    <div class="container">
        <div class="row">
            <main id="main" class="col-sm-8 col-sm-offset-2 site-main pt-40 pb-40" role="main">
                <section class="error-404 not-found pt-80 pb-80">
                    <div class="page-content text-center">
                        <h2>
                            <?php esc_html_e('404 page not found', 'galway-lite'); ?></h2>
                        <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try going back to Homepage or a search?', 'galway-lite'); ?></p>

                        <?php get_search_form(); ?>

                    </div><!-- .page-content -->
                </section><!-- .error-404 -->

            </main><!-- #main -->
        </div>
    </div><!-- #primary -->

<?php
get_footer();
