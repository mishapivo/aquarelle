/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	function convertHex(hex,opacity){
		hex = hex.replace('#','');
		r = parseInt(hex.substring(0,2), 16);
		g = parseInt(hex.substring(2,4), 16);
		b = parseInt(hex.substring(4,6), 16);

		result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
		return result;
	}
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
	/* Text */
	wp.customize( 'elementare_theme_options[_onepage_text_1_slider]', function( value ) {
		value.bind( function( to ) {
			$( '.flexslider .slides > li:first-child .flexText .inside h2' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_text_2_slider]', function( value ) {
		value.bind( function( to ) {
			$( '.flexslider .slides > li:nth-child(2) .flexText .inside h2' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_text_3_slider]', function( value ) {
		value.bind( function( to ) {
			$( '.flexslider .slides > li:nth-child(3) .flexText .inside h2' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtext_1_slider]', function( value ) {
		value.bind( function( to ) {
			$( '.flexslider .slides > li:first-child .flexText .inside span' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtext_2_slider]', function( value ) {
		value.bind( function( to ) {
			$( '.flexslider .slides > li:nth-child(2) .flexText .inside span' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtext_3_slider]', function( value ) {
		value.bind( function( to ) {
			$( '.flexslider .slides > li:nth-child(3) .flexText .inside span' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_title_aboutus]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_aboutus .elementare_main_text, .elementare_action_aboutus .title-absolute' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtitle_aboutus]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_aboutus .elementare_subtitle' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_title_features]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_features .elementare_main_text, .elementare_action_features .title-absolute' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtitle_features]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_features .elementare_subtitle' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_title_skills]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_skills .elementare_main_text, .elementare_action_skills .title-absolute' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtitle_skills]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_skills .elementare_subtitle' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_phrase_cta]', function( value ) {
		value.bind( function( to ) {
			$( '.cta_columns .ctaPhrase h3' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_desc_cta]', function( value ) {
		value.bind( function( to ) {
			$( '.cta_columns .ctaPhrase p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_title_services]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_services .elementare_main_text, .elementare_action_services .title-absolute' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtitle_services]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_services .elementare_subtitle' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_phrase_services]', function( value ) {
		value.bind( function( to ) {
			$( '.services_columns_single .serviceContent h3' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textarea_services]', function( value ) {
		value.bind( function( to ) {
			$( '.services_columns_single .serviceContent p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_title_blog]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_blog .elementare_main_text, .elementare_action_blog .title-absolute' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtitle_blog]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_blog .elementare_subtitle' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_title_team]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_team .elementare_main_text, .elementare_action_team .title-absolute' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtitle_team]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_team .elementare_subtitle' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_title_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_contact .elementare_main_text, .elementare_action_contact .title-absolute' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_subtitle_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementare_action_contact .elementare_subtitle' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_additionaltext_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareAdditionalText p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_companyname_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareCompanyName h3' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_companyaddress1_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareCompanyAddress1 p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_companyaddress2_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareCompanyAddress2 p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_companyaddress3_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareCompanyAddress3 p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_companyphone_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareCompanyPhone p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_companyfax_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareCompanyFax p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_companyemail_contact]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareCompanyEmail p' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_post_scrolldown_text]', function( value ) {
		value.bind( function( to ) {
			$( '.elementareBigText .scrollDown span' ).text( to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_scrolldown_text]', function( value ) {
		value.bind( function( to ) {
			$( '.flexslider .scrollDown span' ).text( to );
		} );
	} );
	/* Background Color and Text */
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_slider_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_slider_second]' )();
			$('.flexslider .slides > li .flexText').css('background-image', 'linear-gradient(45deg,' + convertHex(color1,60) + ', ' + convertHex(color2,60) + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_slider_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_slider_first]' )();
			$('.flexslider .slides > li .flexText').css('background-image', 'linear-gradient(45deg,' + convertHex(color1,60) + ', ' + convertHex(color2,60) + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_slider]', function( value ) {
		value.bind( function( to ) {
			$('.flexslider .slides > li .flexText .inside, .flex-direction-nav a').css('color', to );
			$('.scrollDown .mouse').css('border-color', to );
			$('.scrollDown .mouse:before').css('background-color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_aboutus_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_aboutus_second]' )();
			$('.elementare_aboutus_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_aboutus_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_aboutus_first]' )();
			$('.elementare_aboutus_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_aboutus]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_aboutus').css('color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_features_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_features_second]' )();
			$('.elementare_features_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_features_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_features_first]' )();
			$('.elementare_features_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_features]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_features').css('color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_features_inner]', function( value ) {
		value.bind( function( to ) {
			$('.features_columns_single, .features_columns_single:hover .featuresIcon i, .features_columns_single:focus .featuresIcon i, .features_columns_single:active .featuresIcon i').css('background-color', to );
			$('.features_columns_single .featuresIcon i').css('color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_features_inner]', function( value ) {
		value.bind( function( to ) {
			$('.features_columns_single, .features_columns_single:hover .featuresIcon i, .features_columns_single:focus .featuresIcon i, .features_columns_single:active .featuresIcon i').css('color', to );
			$('.features_columns_single .featuresIcon i').css('background-color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_skills_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_skills_second]' )();
			$('.elementare_skills_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_skills_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_skills_first]' )();
			$('.elementare_skills_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_skills]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_skills').css('color', to );
			$('.skillBottom .skillBar, .skillBottom .skillRealBar, .skillBottom .skillRealBarCyrcle').css('background', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_cta_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_cta_second]' )();
			$('section.elementare_cta:hover .cta_columns .ctaIcon i, section.elementare_cta:focus .cta_columns .ctaIcon i, section.elementare_cta:active .cta_columns .ctaIcon i').css('background-color', color1 );
			$('.cta_columns .ctaIcon i').css('color', color1 );
			$('.elementare_cta_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_cta_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_cta_first]' )();
			$('.elementare_cta_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_cta]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_cta, section.elementare_cta:hover .cta_columns .ctaIcon i, section.elementare_cta:focus .cta_columns .ctaIcon i, section.elementare_cta:active .cta_columns .ctaIcon i').css('color', to );
			$('.cta_columns .ctaIcon i').css('background', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_services_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_services_second]' )();
			$('.services_columns .singleService:hover .serviceIcon i, .services_columns .singleService:focus .serviceIcon i, .services_columns .singleService:active .serviceIcon i').css('background-color', color1 );
			$('.serviceIcon i, .services_columns_single .serviceContent').css('color', color1 );
			$('.elementare_services_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_services_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_services_first]' )();
			$('.elementare_services_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_services]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_services, .services_columns .singleService:hover .serviceIcon i, .services_columns .singleService:focus .serviceIcon i, .services_columns .singleService:active .serviceIcon i').css('color', to );
			$('.serviceIcon i').css('background', to );
			$('.services_columns_single.two .serviceColumnSingleColor').css('background-color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_blog_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_blog_second]' )();
			$('.elementare_blog_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_blog_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_blog_first]' )();
			$('.elementare_blog_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_blog]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_blog, .elementareBlogSingle h2 a, .elementareBlogSingle h2 a:hover, .elementareBlogSingle h2 a:focus, .elementareBlogSingle h2 a:active').css('color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_team_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_team_second]' )();
			$('.elementare_team_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_team_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_team_first]' )();
			$('.elementare_team_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_team]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_team').css('color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_contact_first]', function( value ) {
		value.bind( function( color1 ) {
			var color2 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_contact_second]' )();
			$('.elementare_contact_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
			$('.elementareCompanyAddress1Icon, .elementareCompanyPhoneIcon, .elementareCompanyFaxIcon, .elementareCompanyEmailIcon').css('color', color1 );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_contact_second]', function( value ) {
		value.bind( function( color2 ) {
			var color1 = wp.customize( 'elementare_theme_options[_onepage_imgcolor_contact_first]' )();
			$('.elementare_contact_color').css('background-image', 'linear-gradient(45deg,' + color1 + ', ' + color2 + ')' );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_contact]', function( value ) {
		value.bind( function( to ) {
			$('section.elementare_contact').css('color', to );
			$('section.elementare_contact').css('border-color', to );
			$('.elementareCompanyAddress1Icon, .elementareCompanyPhoneIcon, .elementareCompanyFaxIcon, .elementareCompanyEmailIcon').css('background', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_imgcolor_contact_form]', function( value ) {
		value.bind( function( to ) {
			$('.elementare_contact.withForm .elementareContactForm, .contact_columns .elementareContactForm input:not([type="submit"]), .contact_columns .elementareContactForm textarea').css('background-color', to );
		} );
	} );
	wp.customize( 'elementare_theme_options[_onepage_textcolor_contact_form]', function( value ) {
		value.bind( function( to ) {
			$('.elementare_contact.withForm .elementareContactForm, .contact_columns .elementareContactForm input:not([type="submit"]), .contact_columns .elementareContactForm input:not([type="submit"]):focus, .contact_columns .elementareContactForm textarea, .contact_columns .elementareContactForm textarea:focus').css('color', to );
			$('.elementare_contact.withForm .elementareContactForm, .contact_columns .elementareContactForm input:not([type="submit"]), .contact_columns .elementareContactForm input:not([type="submit"]):focus, .contact_columns .elementareContactForm textarea, .contact_columns .elementareContactForm textarea:focus').css('border-color', to );
		} );
	} );
	
} )( jQuery );
