<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Moral
 */

get_header(); ?>

<div class="wrapper singular-section page-section">

    <header class="entry-header">
        <h1><?php esc_html_e( '404', 'reblog' ); ?></h1>
        <h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'reblog' ); ?></h2>
    </header>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="single-post-wrapper">

                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'reblog' ); ?></p>

                <?php get_search_form(); ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

</div><!-- .wrapper -->

<?php
get_footer();
