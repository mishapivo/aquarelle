<?php
/**
 * Implement Editor Styles
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'st_blog_add_editor_styles' );

if ( ! function_exists( 'st_blog_add_editor_styles' ) ) :
    function st_blog_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;