( function( api ) {

	// Extends our custom "bloggist" section.
	api.sectionConstructor['bloggist'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
