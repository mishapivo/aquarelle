( function( api ) {

	// Extends our custom "lz-charity-welfare" section.
	api.sectionConstructor['lz-charity-welfare'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );