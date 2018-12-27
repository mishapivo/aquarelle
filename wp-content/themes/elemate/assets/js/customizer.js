/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	api = wp.customize;
	// Site title and description.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.brand-logo' ).text( to );
		} );
	} );	
	
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( 'h5.header' ).text( to );
		} );
	} );
	
} )( jQuery );