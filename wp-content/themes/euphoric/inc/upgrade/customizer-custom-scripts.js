( function( api ) {

	// Extends our custom "euphoric" section.
	api.sectionConstructor['euphoric'] = api.Section.extend( {

		// No euphoric for this type of section.
		attachEuphoric: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
