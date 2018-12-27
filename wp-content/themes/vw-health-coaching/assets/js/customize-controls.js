( function( api ) {

	// Extends our custom "vw-health-coaching" section.
	api.sectionConstructor['vw-health-coaching'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );