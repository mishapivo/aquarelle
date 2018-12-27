<?php
/**
 * Message field
 *
 * @package Travel_Gem
 */

/**
 * Class Travel_Gem_Field_Message
 *
 * @since 1.0.0
 */
class Travel_Gem_Field_Message extends SiteOrigin_Widget_Field_Base {

	/**
	 * The main field rendering function.
	 *
	 * @param mixed $value The current value of this field.
	 * @param array $instance The current widget instance.
	 * @return mixed Should output the desired HTML.
	 */
	protected function render_field( $value, $instance ) {
	}

	/**
	 * The main sanitization function.
	 *
	 * @param mixed $value The current value of this field.
	 * @param array $instance The current widget instance.
	 * @return mixed The sanitized value.
	 */
	protected function sanitize_field_input( $value, $instance ) {
		return $value;
	}

}
