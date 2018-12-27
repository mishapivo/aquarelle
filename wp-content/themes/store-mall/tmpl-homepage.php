<?php
/**
 * Template Name: Home Page
 *
 * @package Moral Themes
 * @subpackage Store_Mall_Pro
 * @since Store Mall 1.0.0
 */

get_header();
?>

<div id="content" class="site-content">
    
    <?php
    $sorted_sections = array( 'slider', 'featured', 'popular', 'cta', 'latest', 'widget', 'testimonials', 'blog' );

    foreach ( $sorted_sections as $sorted_section ) {
        get_template_part( 'frontpage-parts/' . $sorted_section ); 
    }
    ?>
    
</div><!-- #content -->

<?php 
get_footer();