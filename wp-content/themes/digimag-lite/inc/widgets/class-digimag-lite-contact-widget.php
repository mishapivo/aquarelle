<?php
/**
 * Contact Widget
 *
 * @package Digimag Lite
 */

/**
 * Class Contact Widget
 */
class Digimag_Lite_Contact_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'digimag-contact-info',
			'description'                 => __( 'Display your location and contact information.', 'digimag-lite' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct(
			'digimag-contact-info',
			esc_html__( 'Digimag: Contact Info', 'digimag-lite' ),
			$widget_ops
		);
	}

	/**
	 * Return an associative array of default values
	 *
	 * These values are used in new widgets.
	 *
	 * @return array Array of default values for the Widget's options
	 */
	public function defaults() {
		return array(
			'title'   => __( 'Get in touch', 'digimag-lite' ),
			'address' => __( 'Timposn St, Suite 247, USA, GA', 'digimag-lite' ),
			'phone'   => _x( '+559-843-4919', 'phone', 'digimag-lite' ),
			'email'   => null,
		);
	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @param array $args     An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 *
	 * @return void Echoes it's output
	 **/
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults() );

		echo $args['before_widget']; // WPCS: XSS OK.

		if ( '' !== $instance['title'] ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title']; // WPCS: XSS OK.
		}

		echo '<ul class="contact">';

		if ( '' !== $instance['address'] ) {

			$map_link = $this->build_map_link( $instance['address'] );

			echo '<li><a href="' . esc_url( $map_link ) . '" target="_blank"><i class="icofont icofont-location-pin"></i>' . esc_html( $instance['address'] ) . '</a></li>';
		}

		if ( '' !== $instance['phone'] ) {
			echo '<li><a href="' . esc_url( 'tel:' . $instance['phone'] ) . '"><i class="icofont icofont-ui-call"></i>' . esc_html( $instance['phone'] ) . '</a></li>';
		}

		if ( is_email( trim( $instance['email'] ) ) ) {
			printf(
				'<li><a href="mailto:%1$s"><i class="icofont icofont-envelope"></i>%1$s</a></li>',
				esc_html( $instance['email'] )
			);
		}

		echo '</div>';

		echo $args['after_widget']; // WPCS: XSS OK.
	}


	/**
	 * Update the widget settings.
	 *
	 * @param array $new_instance New configuration values.
	 * @param array $old_instance Old configuration values.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance            = array();
		$instance['title']   = wp_kses( $new_instance['title'], array() );
		$instance['address'] = wp_kses( $new_instance['address'], array() );
		$instance['phone']   = wp_kses( $new_instance['phone'], array() );
		$instance['email']   = wp_kses( $new_instance['email'], array() );

		return $instance;
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 *
	 * @param array $instance Instance configuration.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults() );

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'digimag-lite' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address:', 'digimag-lite' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"><?php echo esc_textarea( $instance['address'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone:', 'digimag-lite' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['phone'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email Address:', 'digimag-lite' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['email'] ); ?>" />
		</p>

		<?php
	}


	/**
	 * Generate a Google Maps link for the supplied address.
	 *
	 * @param string $address Address to link to.
	 *
	 * @return string
	 */
	public function build_map_link( $address ) {
		// Google map urls have lots of available params but zoom (z) and query (q) are enough.
		return 'https://maps.google.com/maps?z=16&q=' . $this->urlencode_address( $address );
	}

	/**
	 * Encode an URL
	 *
	 * @param string $address The URL to encode.
	 *
	 * @return string The encoded URL
	 */
	public function urlencode_address( $address ) {

		$address = strtolower( $address );
		$address = preg_replace( '/\s+/', ' ', trim( $address ) ); // Get rid of any unwanted whitespace.
		$address = str_ireplace( ' ', '+', $address ); // Use + not %20.
		urlencode( $address );

		return $address;
	}

}
