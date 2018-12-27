( function( api ) {

	// Extends our custom "lifestyle-magazine" section.
	api.sectionConstructor['lifestyle-magazine'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
