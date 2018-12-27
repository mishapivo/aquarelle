( function( api ) {

	// Extends our custom "multipurpose-magazine" section.
	api.sectionConstructor['multipurpose-magazine'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );