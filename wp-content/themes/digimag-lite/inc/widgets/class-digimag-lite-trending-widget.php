<?php
/**
 * Trending Articles Widget
 *
 * @package Digimag Lite
 */

/**
 * Class Trending Widget
 */
class Digimag_Lite_Trending_Widget extends WP_Widget {
	/**
	 * Default widget options.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Widget setup.
	 */
	public function __construct() {
		$this->defaults = array(
			'title'       => esc_html__( 'Trending Articles', 'digimag-lite' ),
			'tag_name'    => '',
			'type'        => 'slide',
			'post_number' => 6,
			'speed'       => 20,
		);
		parent::__construct(
			'digimag-trending',
			esc_html__( 'Digimag: Trending Articles', 'digimag-lite' ),
			array(
				'classname'   => 'digimag-trending to-be-replaced', // This will be replaced by the type.
				'description' => esc_html__( 'A widget that displays your trending articles', 'digimag-lite' ),
			)
		);
	}

	/**
	 * How to display the widget on the screen.
	 *
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance    = wp_parse_args( $instance, $this->defaults );
		$post_number = $instance['post_number'];
		$title       = $instance['title'];
		$type        = $instance['type'];
		$speed    = $instance['speed'];

		$type = ( 'rotate' === $type ) ? 'rotate is-hidden' : 'slide';
		$args['before_widget'] = str_replace( 'to-be-replaced', 'digimag-trending-' . $type, $args['before_widget'] );

		$tag = $instance['tag_name'];
		if ( empty( $tag ) ) {
			return;
		}
		$term = get_term_by( 'name', $tag, 'post_tag' );
		if ( $term ) {
			$tag_id = $term->term_id;
		} else {
			$new_tag = wp_insert_term( $tag, 'post_tag' );
			$tag_id  = ( isset( $new_tag['term_id'] ) ) ? $new_tag['term_id'] : '';
		}

		$arguments = array(
			'posts_per_page' => $post_number,
			'tag_id'         => $tag_id,
		);

		if ( 'slide' === $type ) {
			$js_class      = 'js-trending-slide';
			$data_speed = 'data-speed="' . esc_attr( $speed ) . '"';
			$button        = '<button class="trending-shuffle"><i class="icofont icofont-random"></i></button>';
		} else {
			$js_class      = 'js-trending-rotate';
			$data_speed = '';
			$button        = '';
		}

		$query = new WP_Query( $arguments );

		if ( $query->have_posts() ) {

			echo $args['before_widget']; // WPCS: XSS OK.

			echo $args['before_title'] . $title . $args['after_title']; // WPCS: XSS OK.
			?>
			<div class="trending-items-container">
				<div class="trending-items <?php echo esc_attr( $js_class ); ?>" <?php echo wp_kses_post( $data_speed ); ?>>
					<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part( 'template-parts/content', 'trending' );
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
			<?php

			echo wp_kses_post( $button );

			echo $args['after_widget']; // WPCS: XSS OK.

		}

	}

	/**
	 * Update the widget settings.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']       = sanitize_text_field( $new_instance['title'] );
		$instance['tag_name']    = sanitize_text_field( $new_instance['tag_name'] );
		$instance['type']        = sanitize_key( $new_instance['type'] );
		$instance['post_number'] = absint( $new_instance['post_number'] );
		$instance['speed']       = absint( $new_instance['speed'] );

		return $instance;
	}

	/**
	 * Widget form.
	 *
	 * @param array $instance Widget instance.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );

		$title       = $instance['title'];
		$tag_name    = $instance['tag_name'];
		$type        = $instance['type'];
		$post_number = absint( $instance['post_number'] );
		$speed       = absint( $instance['speed'] );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'digimag-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tag_name' ) ); ?>"><?php esc_html_e( 'Tag Name:', 'digimag-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tag_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tag_name' ) ); ?>" value="<?php echo esc_attr( $tag_name ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php esc_html_e( 'Trending type: ', 'digimag-lite' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>">
				<option value="slide" <?php selected( $type, 'slide' ); ?>><?php esc_html_e( 'Slide', 'digimag-lite' ); ?></option>
				<option value="rotate" <?php selected( $type, 'rotate' ); ?>><?php esc_html_e( 'Rotate', 'digimag-lite' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><?php esc_html_e( 'Number Of Posts To Show:', 'digimag-lite' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $post_number ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'speed' ) ); ?>"><?php esc_html_e( 'Slide speed:', 'digimag-lite' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'speed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'speed' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $speed ); ?>" size="3" />
			<i class="tiny-text"><?php esc_html_e( '(Incresing it will slow down the slide speed)', 'digimag-lite' ); ?></i>
		</p>

		<?php
	}
}
