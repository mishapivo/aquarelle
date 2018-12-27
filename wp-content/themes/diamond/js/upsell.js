/**
 * Upsell notice for theme
 */
 
( function( $ ) {
 
	// Add Upgrade Message
	if ('undefined' !== typeof diamondL10n) {
		upsell = $('<a class="diamond-upsell-link"></a>')
			.attr('href', diamondL10n.diamondURL)
			.attr('target', '_blank')
			.text(diamondL10n.diamondLabel)
			.css({
				'display' : 'inline-block',
				'background-color' : '#f7f7f7',
				'color' : '#000',
				'text-transform' : 'uppercase',
				'margin-top' : '6px',
				'padding' : '10px 12px',
				'font-size': '12px',
				'letter-spacing': '1px',
				'line-height': '1.5',
				'clear' : 'both'
			})
		;
 
		setTimeout(function () {
			$('#accordion-section-themes h3').append(upsell);
		}, 200);
 
		// Remove accordion click event
		$('.diamond-upsell-link').on('click', function(e) {
			e.stopPropagation();
		});
	}
 
} )( jQuery );