( function( api ) {

	// Extends our custom "kindergarten-education" section.
	api.sectionConstructor['kindergarten-education'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );