<?php
/**
 * evento range value control
 */
  if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}
  if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}
	class Evento_Customizer_Range_Control extends WP_Customize_Control {

		public $type = 'evento-range';

		public function to_json() {
			if ( ! empty( $this->setting->default ) ) {
				$this->json['default'] = $this->setting->default;
			} else {
				$this->json['default'] = false;
			}
			parent::to_json();
		}

		public function enqueue() {
			wp_enqueue_script( 'range', EVENTO_PLUGIN_URL . 'inc/custom-controls/range-validator/assets/js/range-control.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'range-value', EVENTO_PLUGIN_URL . 'inc/custom-controls/range-validator/assets/css/range-control.css' );
		}

		public function render_content() {
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<div id="<?php echo esc_attr( $this->id ); ?>">
					<div class="evento-range">
						<input class="evento-range-defi" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<input class="evento-range-value" type="number" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<?php if ( ! empty( $this->setting->default ) ) : ?>
							<span class="evento-resets-range-value" title="<?php _e( 'Reset', 'evento' ); ?>"><span class="dashicons dashicons-image-rotate"></span></span>
						<?php endif;?>
					</div>
				</div>
			</label>
		<?php }

	}
