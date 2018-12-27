( function( api ) {

	// Extends our custom "st-blog" section.
	api.sectionConstructor['st-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
