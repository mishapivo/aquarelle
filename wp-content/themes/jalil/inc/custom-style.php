<?php 
function jalil_custom_css() {
    wp_enqueue_style('jalil-custom', get_template_directory_uri() . '/assets/css/custom-style.css' );
    $header_text_color = get_header_textcolor();
    $jalil_custom_css = '';
    $jalil_custom_css .= '
        .site-title a,
        .site-title a:hover {
            color: #'.esc_attr( $header_text_color ).' ;
        }
    ';
    wp_add_inline_style( 'jalil-custom', $jalil_custom_css );
}
add_action( 'wp_enqueue_scripts', 'jalil_custom_css' );