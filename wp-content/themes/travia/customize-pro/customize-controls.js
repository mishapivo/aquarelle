( function( api ) {

	// Extends our custom "travia" section.
	api.sectionConstructor['travia'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );