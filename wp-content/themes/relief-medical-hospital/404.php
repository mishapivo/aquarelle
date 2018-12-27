<?php
/**
 * Display 404 page
 * @package Relief Medical Hospital
 */

get_header(); ?>

<div id="main-content">
    <div class="container">
        <div class="page-content">
            <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'relief-medical-hospital' ), esc_html__( 'Not Found', 'relief-medical-hospital' ) ) ?></h1>
            <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'relief-medical-hospital' ); ?></p>
            <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'relief-medical-hospital' ); ?></p>
            <div class="read-moresec">
                <a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to the home page', 'relief-medical-hospital' ); ?></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>