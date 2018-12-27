<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package Ecommerce Solution
 */
get_header(); ?>

<div id="content_box">
    <div class="container">
        <div class="page-content">
            <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'ecommerce-solution' ), esc_html__( 'Not Found', 'ecommerce-solution' ) ) ?></h1>
            <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'ecommerce-solution' ); ?></p>
            <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'ecommerce-solution' ); ?></p>
            <div class="read-moresec">
                <a href="<?php echo esc_url( home_url() ); ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'ecommerce-solution' ); ?></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>