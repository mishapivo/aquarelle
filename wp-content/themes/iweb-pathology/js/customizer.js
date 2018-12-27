/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * @package IWeb_Pathology
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
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Copyright
		wp.customize( 'iweb_copyright_text', function( value ) {
				value.bind( function( to ) {
					$( '#iweb-cuscr' ).text( to );
				} );
		} );

	// Top Bar

	wp.customize( 'iwebpatho_topbar_add', function( value ) {
		value.bind( function( to ) {
			$( '.topbarsocial-a1' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_topbar_tel', function( value ) {
		value.bind( function( to ) {
			$( '.topbarsocial-a2' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_topbar_btntxt', function( value ) {
		value.bind( function( to ) {
			$( '.topbarbut' ).text( to );
		} );
	} );

	// About Us

	wp.customize( 'iwebpatho_whours_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebpath-abtus-a h3' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_desc', function( value ) {
		value.bind( function( to ) {
			$( '#abtdesc' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_days1', function( value ) {
		value.bind( function( to ) {
			$( '#abtdy1' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_time1', function( value ) {
		value.bind( function( to ) {
			$( '#abttm1' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_days2', function( value ) {
		value.bind( function( to ) {
			$( '#abtdy2' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_time2', function( value ) {
		value.bind( function( to ) {
			$( '#abttm2' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_days3', function( value ) {
		value.bind( function( to ) {
			$( '#abtdy3' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_time3', function( value ) {
		value.bind( function( to ) {
			$( '#abttm3' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_days4', function( value ) {
		value.bind( function( to ) {
			$( '#abtdy4' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_whours_time4', function( value ) {
		value.bind( function( to ) {
			$( '#abttm4' ).text( to );
		} );
	} );

	// Health Packages

	wp.customize( 'iwebpatho_package_mtitle', function( value ) {
		value.bind( function( to ) {
			$( '#hpckgmt' ).text( to );
		} );
	} );

	// Our Doctors

	wp.customize( 'iwebpatho_ourdoc_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebpatho-ourdoc-w h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_ourdoc_desc', function( value ) {
		value.bind( function( to ) {
			$( '#oddesc' ).text( to );
		} );
	} );

	// Testimonials

	wp.customize( 'iwebpatho_tmonials_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebpatho-tmonial-slider-w h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_tmonials_desc', function( value ) {
		value.bind( function( to ) {
			$( '#tmonialsp' ).text( to );
		} );
	} );

	// Latest News

	wp.customize( 'iwebpatho_latestnews_title', function( value ) {
		value.bind( function( to ) {
			$( '.iweb-patho-isection8-a h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_latestnews_desc', function( value ) {
		value.bind( function( to ) {
			$( '#ilnwsdsc' ).text( to );
		} );
	} );

	// Featured Test Profiles

	wp.customize( 'iwebpatho_testprofile_title', function( value ) {
		value.bind( function( to ) {
			$( '.iwebpatho_testpf-b h1' ).text( to );
		} );
	} );

	wp.customize( 'iwebpatho_testprofile_desc', function( value ) {
		value.bind( function( to ) {
			$( '#ftpcust2' ).text( to );
		} );
	} );

	// Home Collection

	wp.customize( 'iwebpatho_homcoll_title', function( value ) {
		value.bind( function( to ) {
			$( '.iweb-patho-isection3-a1 h1' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_homcoll_desc', function( value ) {
		value.bind( function( to ) {
			$( '.iweb-patho-isection3-a1 p' ).text( to );
		} );
	} );
	wp.customize( 'iwebpatho_homcoll_btntxt', function( value ) {
		value.bind( function( to ) {
			$( '#hmcbtn' ).text( to );
		} );
	} );

} )( jQuery );
