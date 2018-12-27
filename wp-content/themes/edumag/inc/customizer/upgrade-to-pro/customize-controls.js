( function( api ) {

	// Extends our custom "edumag" section.
	api.sectionConstructor['edumag'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
