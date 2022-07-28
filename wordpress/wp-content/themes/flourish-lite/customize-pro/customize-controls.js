( function( api ) {
	// Extends our custom "flourish-lite" section.
	api.sectionConstructor['flourish-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );