<?php
/**
 * Custom heading for customizer.
 *
 * @package Digimag Lite
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Add custom heading for each part in section.
	 */
	class Digimag_Lite_Custom_Heading extends WP_Customize_Control {
		/**
		 * Control's type.
		 *
		 * @var string
		 */
		public $type = '';

		/**
		 * Label for the control.
		 *
		 * @var string
		 */
		public $label = '';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			if ( 'custom_message' === $this->type ) {
				echo wp_kses_post( $this->description );
			} else {
				echo '<h3 style="margin-top: 3em; padding-bottom: .3em; border-bottom: 1px solid #ddd; text-transform: uppercase; color: #555d66;">' . esc_html( $this->label ) . '</h3>';
			}
		}
	}
}
