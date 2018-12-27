/**
 *
 *
 *  Materialize Template <http://wordpress.org>
 *
 *  By KRATZ Geoffrey AKA Jul6art AKA VanIllaSkype
 *  for VsWeb <https://vsweb.be>
 *
 *  https://vsweb.be
 *  admin@vsweb.be
 *
 *  Special thanks to Brynnlow
 *  for his contribution
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The flex one, in a flex world
 *
 *     __    __    ___            __    __    __   ____
 *     \ \  / /   / __|           \ \  /  \  / /  |  __\   __
 *      \ \/ / _  \__ \  _         \ \/ /\ \/ /   |  __|  |  _\
 *       \__/ (_) |___/ (_)         \__/  \__/    |  __/  |___/
 *
 *                    https://vsweb.be
 *
 */
( function( $ ) {
    //live customizer API
    wp.customize( 'header_color', function( value ) {
        value.bind( function( newval ) {
            $('header nav.nav-extended div.nav-wrapper.blue-custom').css('background-color', newval );
        } );
    } );

    wp.customize( 'menu_color', function( value ) {
        value.bind( function( newval ) {
            $('header nav.nav-extended').css('background-color', newval );
        } );
    } );

    wp.customize( 'aside_color', function( value ) {
        value.bind( function( newval ) {
            $('main[role="main"] > .white > .container').css('background-color', newval );
        } );
    } );

    wp.customize( 'footer_color', function( value ) {
        value.bind( function( newval ) {
            $('footer.page-footer').css('background-color', newval );
        } );
    } );

    wp.customize( 'copyright_color', function( value ) {
        value.bind( function( newval ) {
            $('div.footer-copyright').css('background-color', newval );
        } );
    } );

    wp.customize( 'copyright_text', function( value ) {
        value.bind( function( newval ) {
            $('div.footer-copyright p span.text').html(newval );
        } );
    } );

    wp.customize( 'default_image', function( value ) {
        value.bind( function( newval ) {
            $('img.activator').attr('src', newval );
            $('div.parallax img').attr('src', newval );
        } );
    } );
} )( jQuery );

