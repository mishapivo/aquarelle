( function( api ) {

	// Extends our custom "chalak-driving-school" section.
	api.sectionConstructor['chalak-driving-school'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );