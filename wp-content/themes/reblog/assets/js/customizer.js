/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

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

	// Header title color.
	wp.customize( 'reblog_header_title_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header tagline color.
	wp.customize( 'reblog_header_tagline', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header text display.
	wp.customize( 'reblog_header_text_display', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( '#site-identity' ).css( {
					'display': 'block',
				} );
			} else {
				$( '#site-identity' ).css( {
					'display': 'none',
				} );
			}
		} );
	} );
} )( jQuery );
