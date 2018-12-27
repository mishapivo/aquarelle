( function( $, api ) {

	/* === Dropdown Taxonomies Control === */
	api.controlConstructor['dropdown-taxonomies'] = api.Control.extend( {
		ready: function() {
			var control = this;

			$( 'select', control.container ).change(
				function() {
					control.setting.set( $( this ).val() );
				}
			);
		}
	} );

	/* === Dropdown Sidebars Control === */
	api.controlConstructor['dropdown-sidebars'] = api.Control.extend( {
		ready: function() {
			var control = this;

			$( 'select', control.container ).change(
				function() {
					control.setting.set( $( this ).val() );
				}
			);
		}
	} );

	/* === Radio Image Control === */
	api.controlConstructor['radio-image'] = api.Control.extend( {
		ready: function() {
			var control = this;

			$( 'input:radio', control.container ).change(
				function() {
					control.setting.set( $( this ).val() );
				}
			);
		}
	} );

	// Extends our custom "upsell" section.
	api.sectionConstructor['upsell'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( jQuery, wp.customize );
