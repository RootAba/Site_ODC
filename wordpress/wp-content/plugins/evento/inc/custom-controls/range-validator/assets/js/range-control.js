wp.customize.controlConstructor['evento-range'] = wp.customize.Control.extend({

	ready: function() {
		'use strict';

		var control = this,
			slider = control.container.find( '.evento-range-defi' ),
			output = control.container.find( '.evento-range-value' );

		slider[0].oninput = function() {
			control.setting.set( this.value );
		}

		if ( control.params.default !== false ) {
			var reset = control.container.find( '.evento-resets-range-value' );

			reset[0].onclick = function() {
				control.setting.set( control.params.default );
			}
		}
	}

});
