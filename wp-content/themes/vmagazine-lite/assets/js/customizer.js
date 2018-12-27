/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	"use strict";

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


/**
* Mobile navigation background position
*
*/
var mobileNavOverlay = $('.vmagazine-lite-mobile-navigation-wrapper').find('.img-overlay').length;
if( mobileNavOverlay ){

	wp.customize( 'vmagazine_lite_mobile_header_bg_repeat', function( value ) {
			value.bind( function( to ) {
				$( '.mob-search-form,.mobile-navigation' ).css('background-repeat', to );
			} );
		} );
	wp.customize( 'vmagazine_lite_mobile_header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.mob-search-form .img-overlay,.mobile-navigation .img-overlay' ).css('background-color', to );
		} );
	} );

}else{
	wp.customize( 'vmagazine_lite_mobile_header_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.mob-search-form,.mobile-navigation' ).css('background-color', to );
		} );
	} );
}

//News ticker title
wp.customize( 'vmagazine_lite_ticker_caption', function( value ) {
	value.bind( function( to ) {
		$( '.vmagazine-lite-ticker-caption span' ).text( to );
	} );
} );


} )( jQuery );
