<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Feminine_Munk
 */

get_header(); ?>

    <div class="not-found">
        <div class="text">

            <span><?php esc_html_e( '404', 'feminine-munk' ); ?></span>

            <h1><?php esc_html_e( 'oops page not found.', 'feminine-munk' ); ?></h1>

            <p><?php esc_html_e( 'It looks like nothing was found at this location. Click the link below to return home.', 'feminine-munk' ); ?></p>
            
            <a href=" <?php echo esc_url( home_url( '/' ) ); ?>" class="homepage"> <?php esc_html_e( 'Back to Home', 'feminine-munk' ) ?></a>

        </div>
    </div>

<?php
get_footer();