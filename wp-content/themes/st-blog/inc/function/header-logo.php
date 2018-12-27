<?php
if ( ! function_exists( 'st_blog_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since st-blog 1.0.0
 */
function st_blog_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;