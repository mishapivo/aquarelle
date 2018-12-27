(function($) {
	"use strict";

	$(document).ready(function() {

		//FontAwesome Icon Control JS
		$('body').on('click', '.elementare-icon-list li', function(){
			var icon_class = $(this).find('i').attr('class');
			$(this).addClass('icon-active').siblings().removeClass('icon-active');
			$(this).parent('.elementare-icon-list').prev('.elementare-selected-icon').children('i').attr('class','').addClass(icon_class);
			$(this).parent('.elementare-icon-list').next('input').val(icon_class).trigger('change');
		});

		$('body').on('click', '.elementare-selected-icon', function(){
			$(this).next().slideToggle();
		});
		
		//Scroll to section
		$('body').on('click', '#sub-accordion-panel-cresta_elementare_onepage .control-subsection .accordion-section-title', function(event) {
			var section_class = $(this).parent('.control-subsection').attr('id');
			scrollToSection( section_class );
		});
		
		function scrollToSection( section_class ){
			var preview_section_class = 'elementare_slider';
			var $contents = jQuery('#customize-preview iframe').contents();
			switch ( section_class ) {
				case 'accordion-section-cresta_elementareo_onepage_section_slider':
				preview_section_class = 'elementare_slider';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_aboutus':
				preview_section_class = 'elementare_aboutus';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_features':
				preview_section_class = 'elementare_features';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_skills':
				preview_section_class = 'elementare_skills';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_cta':
				preview_section_class = 'elementare_cta';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_services':
				preview_section_class = 'elementare_services';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_blog':
				preview_section_class = 'elementare_blog';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_team':
				preview_section_class = 'elementare_team';
				break;

				case 'accordion-section-cresta_elementare_onepage_section_contact':
				preview_section_class = 'elementare_contact';
				break;
			}
			if( $contents.find('.'+preview_section_class).length > 0 ){
				$contents.find('html, body').animate({
				scrollTop: $contents.find( '.' + preview_section_class ).offset().top
				}, 1000);
			}
		}
		
	});

})(jQuery);