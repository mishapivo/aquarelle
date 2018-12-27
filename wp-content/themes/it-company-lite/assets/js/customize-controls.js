( function( api ) {

	// Extends our custom "it-company-lite" section.
	api.sectionConstructor['it-company-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );