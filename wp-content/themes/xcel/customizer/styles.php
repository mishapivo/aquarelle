<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library Demo
 */

if ( ! function_exists( 'customizer_library_xcel_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_xcel_build_styles() {

    // Main Color
    $color = 'xcel-setting-main-color';
    $titlecolor = 'xcel-setting-title-color';
    $titlefontcolor = 'xcel-setting-title-font-color';
    
    $colormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    
    $titlecolormod = get_theme_mod( $titlecolor, customizer_library_get_default( $titlecolor ) );
    $titlefontcolormod = get_theme_mod( $titlefontcolor, customizer_library_get_default( $titlefontcolor ) );
    
    $bgcolormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    $bghardcolormod = get_theme_mod( $color, customizer_library_get_default( $color ) );
    $bgbordercolormod = get_theme_mod( $color, customizer_library_get_default( $color ) );

    if ( $colormod !== customizer_library_get_default( $color ) ) {

        $sancolor = sanitize_hex_color( $colormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                'a,
                .error-404.not-found .page-header .page-title span'
            ),
            'declarations' => array(
                'color' => $sancolor
            )
        ) );
    }
    
    if ( $bgcolormod !== customizer_library_get_default( $color ) ) {

        $bgsancolor = sanitize_hex_color( $bgcolormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                '#comments .form-submit #submit,
                .search-block .search-submit,
                .no-results-btn,
                button,
                input[type="button"],
                input[type="reset"],
                input[type="submit"],
                .woocommerce ul.products li.product a.add_to_cart_button, .woocommerce-page ul.products li.product a.add_to_cart_button,
                .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale,
                .woocommerce span.onsale,
                .woocommerce button.button.alt,
                .woocommerce-page button.button.alt,
                .woocommerce input.button.alt:hover,
                .woocommerce-page #content input.button.alt:hover,
                .woocommerce .cart-collaterals .shipping_calculator .button,
                .woocommerce-page .cart-collaterals .shipping_calculator .button,
                .woocommerce a.button,
                .woocommerce-page a.button,
                .woocommerce input.button,
                .woocommerce-page #content input.button,
                .woocommerce-page input.button,
                .woocommerce #review_form #respond .form-submit input,
                .woocommerce-page #review_form #respond .form-submit input,
                .woocommerce .site-header,
                .woocommerce-page .site-header,
                .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
                .main-navigation button,
                .wpcf7-submit'
            ),
            'declarations' => array(
                'background' => 'inherit',
                'background-color' => $bgsancolor
            )
        ) );
    }
    
    if ( $titlecolormod !== customizer_library_get_default( $titlecolor ) ) {

        $titlesancolor = sanitize_hex_color( $titlecolormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                '.page-titlebar'
            ),
            'declarations' => array(
                'background' => 'inherit',
                'background-color' => $titlesancolor
            )
        ) );
    }
    
    if ( $titlefontcolormod !== customizer_library_get_default( $titlefontcolor ) ) {

        $titlefontsancolor = sanitize_hex_color( $titlefontcolormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                '.page-titlebar-left .entry-title,
                .page-titlebar-right,
                .page-titlebar-right a'
            ),
            'declarations' => array(
                'color' => $titlefontsancolor
            )
        ) );
    }
    
    if ( $bgbordercolormod !== customizer_library_get_default( $color ) ) {

        $bgbordersancolor = sanitize_hex_color( $bgbordercolormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                '.woocommerce ul.products li.product .onsale:after,
                .woocommerce-page ul.products li.product .onsale:after'
            ),
            'declarations' => array(
                'border-right' => '4px solid ' . $bgbordersancolor
            )
        ) );
    }

    // Main Color Hover
    $colorh = 'xcel-setting-main-color-hover';
    $colorhmod = get_theme_mod( $colorh, customizer_library_get_default( $colorh ) );
    
    $bgcolorhmod = get_theme_mod( $colorh, customizer_library_get_default( $colorh ) );

    if ( $colorhmod !== customizer_library_get_default( $colorh ) ) {

        $sancolorh = sanitize_hex_color( $colorhmod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                'a:hover,
                .widget-area .widget a:hover,
                .site-footer-widgets .widget a:hover,
                .search-btn:hover,
                .search-button .fa-search:hover,
                .woocommerce #content div.product p.price,
                .woocommerce-page #content div.product p.price,
                .woocommerce-page div.product p.price,
                .woocommerce #content div.product span.price,
                .woocommerce div.product span.price,
                .woocommerce-page #content div.product span.price,
                .woocommerce-page div.product span.price,

                .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
                .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
                .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
                .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active'
            ),
            'declarations' => array(
                'color' => $sancolorh
            )
        ) );
    }
    
    if ( $bgcolorhmod !== customizer_library_get_default( $colorh ) ) {

        $bgsancolorh = sanitize_hex_color( $bgcolorhmod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                '.main-navigation button:hover,
                #comments .form-submit #submit:hover,
                .search-block .search-submit:hover,
                .no-results-btn:hover,
                button,
                input[type="button"],
                input[type="reset"],
                input[type="submit"],
                .woocommerce input.button.alt,
                .woocommerce-page #content input.button.alt,
                .woocommerce .cart-collaterals .shipping_calculator .button,
                .woocommerce-page .cart-collaterals .shipping_calculator .button,
                .woocommerce a.button:hover,
                .woocommerce-page a.button:hover,
                .woocommerce input.button:hover,
                .woocommerce-page #content input.button:hover,
                .woocommerce-page input.button:hover,
                .woocommerce ul.products li.product a.add_to_cart_button:hover, .woocommerce-page ul.products li.product a.add_to_cart_button:hover,
                .woocommerce button.button.alt:hover,
                .woocommerce-page button.button.alt:hover,
                .woocommerce #review_form #respond .form-submit input:hover,
                .woocommerce-page #review_form #respond .form-submit input:hover,
                .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
                .wpcf7-submit:hover'
            ),
            'declarations' => array(
                'background' => 'inherit',
                'background-color' => $bgsancolorh
            )
        ) );
    }


    // Body Font
    $font = 'xcel-setting-body-font';
    $fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
    $fontstack = customizer_library_get_font_stack( $fontmod );
    
    $fontcolor = 'xcel-setting-body-font-color';
    $fontcolormod = get_theme_mod( $fontcolor, customizer_library_get_default( $fontcolor ) );

    if ( $fontmod != customizer_library_get_default( $font ) ) {

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                'body'
            ),
            'declarations' => array(
                'font-family' => $fontstack
            )
        ) );

    }
    
    if ( $fontcolormod !== customizer_library_get_default( $fontcolor ) ) {

        $sanfontcolor = sanitize_hex_color( $fontcolormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                'body,
                .widget-area .widget a,
                .site-footer-widgets a'
            ),
            'declarations' => array(
                'color' => $sanfontcolor
            )
        ) );
    }
    
    
    // Heading Font
    $hfont = 'xcel-setting-heading-font';
    $hfontmod = get_theme_mod( $hfont, customizer_library_get_default( $hfont ) );
    $hfontstack = customizer_library_get_font_stack( $hfontmod );
    
    $hfontcolor = 'xcel-setting-heading-font-color';
    $hfontcolormod = get_theme_mod( $hfontcolor, customizer_library_get_default( $hfontcolor ) );

    if ( $hfontmod != customizer_library_get_default( $hfont ) ) {

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                'h1, h2, h3, h4, h5, h6,
                h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
                .woocommerce table.cart th,
                .woocommerce-page #content table.cart th,
                .woocommerce-page table.cart th,
                .woocommerce input.button.alt,
                .woocommerce-page #content input.button.alt,
                .woocommerce table.cart input,
                .woocommerce-page #content table.cart input,
                .woocommerce-page table.cart input,
                button, input[type="button"],
                input[type="reset"],
                input[type="submit"]'
            ),
            'declarations' => array(
                'font-family' => $hfontstack
            )
        ) );

    }
    
    if ( $hfontcolormod !== customizer_library_get_default( $hfontcolor ) ) {

        $sanhfontcolor = sanitize_hex_color( $hfontcolormod );

        Customizer_Library_Styles()->add( array(
            'selectors' => array(
                'h1, h2, h3, h4, h5, h6,
                h1 a, h2 a, h3 a, h4 a, h5 a, h6 a'
            ),
            'declarations' => array(
                'color' => $sanhfontcolor
            )
        ) );
    }


}
endif;

add_action( 'customizer_library_styles', 'customizer_library_xcel_build_styles' );

if ( ! function_exists( 'customizer_library_xcel_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_xcel_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"kaira-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'customizer_library_xcel_styles', 11 );