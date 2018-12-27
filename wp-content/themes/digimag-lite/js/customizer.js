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
			}
			$( '.page-header, .page-header h1, .page-header i, .breadcrumbs a, .breadcrumbs span' ).css({
				color: to
			});
		} );
	} );

	// Sticky header
	wp.customize( 'sticky_header', function( value ) {
		value.bind( function ( newval ) {
			if ( true === newval ) {
				$( 'body' ).addClass( 'is-sticky-header' );
				$( 'body' ).css( 'margin-top', '59px' );
				$( '.site-header' ).css( {
					'position': 'fixed',
					'width' : '100%'
				} );
			}
			else {
				$( 'body' ).removeClass( 'is-sticky-header' );
				$( 'body' ).css( 'margin-top', '0' );
				$( '.site-header' ).css( {
					'position': 'sticky'
				} );
			}
		} );
	} );

} )( jQuery );
