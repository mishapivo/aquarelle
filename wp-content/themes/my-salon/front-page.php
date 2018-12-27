<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package my_salon
 * @since 1.0.1
 * @version 1.0.3
 */

$slider_enable       = get_theme_mod( 'my_salon_ed_slider','1' );
$featured_enable     = get_theme_mod( 'my_salon_ed_featured_section', '1' );
$welcome_enable      = get_theme_mod( 'my_salon_ed_welcome_section','1' );
$portfolio_enable    = get_theme_mod( 'my_salon_ed_portfolio_section', '1' );
$testimonials_enable = get_theme_mod( 'my_salon_ed_testimonials_section', '1' );

get_header(); 
           
    if ( 'posts' == get_option( 'show_on_front' ) ) {
        include( get_home_template() );
    }elseif( $slider_enable || $featured_enable || $welcome_enable || $portfolio_enable || $testimonials_enable ){ 

         /**
         * Home Page Contents
         * @hooked my_salon_slider      - 10
         * @hooked my_salon_featured    - 20
         * @hooked my_salon_welcome     - 30
         * @hooked my_salon_portfolios  - 40
         * @hooked my_salon_testimonial - 50
        */
        do_action( 'my_salon_home_page' );
   
    }else {
        include( get_page_template() );
    }


get_footer();