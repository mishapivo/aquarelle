<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package euphoric
 */

//Excerpt More
function euphoric_excerpt_more( $link ) {
   $excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','euphoric'));
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf(
        '<div class="read-more"><a href="%1$s" class="more-link">%2$s</a></div>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( $excerpt_text, get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'euphoric_excerpt_more' );

//Excerpt length
function euphoric_excerpt_length($length) {
    $excerpt_length = get_theme_mod('excerpt_length','40');
    if( is_admin() ){
        return absint($length);
    }

    $length = $excerpt_length;
    return absint($length);
}
add_filter('excerpt_length', 'euphoric_excerpt_length');

function euphoric_breadcrumbs() {
    if (function_exists('bcn_display')) { ?>
        <div class="breadcrumb-wrapper">
            <?php bcn_display(); ?>
        </div> <!-- .breadcrumbs -->
    <?php }
}

add_action ('euphoric_frontpage_breadcrumbs','euphoric_breadcrumbs');