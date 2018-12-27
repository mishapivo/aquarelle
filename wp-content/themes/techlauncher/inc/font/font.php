<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function techlauncher_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Muli:400,500,700,900', 'Open Sans:400,700,900');

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url( $fonts_url );
	
}
function techlauncher_scripts_styles() {
    wp_enqueue_style( 'techlauncher-fonts', techlauncher_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'techlauncher_scripts_styles' );
?>