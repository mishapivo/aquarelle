( function( api ) {

	// Extends our custom "relief-medical-hospital" section.
	api.sectionConstructor['relief-medical-hospital'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );