<?php 
/**
 * Template Name: Home Page
 * @package Medipress
*/

get_header();
get_template_part( 'section-parts/front-page-slider' );
get_template_part( 'section-parts/front-page-thecontent');
get_template_part( 'section-parts/front-page-services' );
get_template_part( 'section-parts/front-page-blogpost' );
get_template_part( 'section-parts/front-page-callout' );
get_footer(); 
?>