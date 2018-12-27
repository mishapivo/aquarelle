/**
 * Theme Customizer enhancements for a better user experience.
 */

( function( $ ) {
	wp.customize.bind( 'ready', function () {
		var customize = this;

		$.each( [ 'homepage', 'archive' ], function( index, location ) {

			customize( 'ad_type_' + location, function( value ) {
				customize.control( 'ad_code_' + location ).toggle( false );
				value.bind( function( to ) {
					customize.control( 'ad_code_' + location ).toggle( ( 'html' === to ) && ( 'hide' !== to) );
					customize.control( 'ad_image_' + location ).toggle( ( 'html' !== to ) && ( 'hide' !== to) );
					customize.control( 'ad_url_' + location ).toggle( ( 'html' !== to ) && ( 'hide' !== to) );
					customize.control( 'ad_position_' + location ).toggle( ( 'hide' !== to) );
				} );
			});
		} );

	});
} )( jQuery );
