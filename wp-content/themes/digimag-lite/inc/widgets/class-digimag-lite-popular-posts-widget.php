<?php
/**
 * Popular Posts Widget
 *
 * @package Digimag Lite
 */

/**
 * Class Popular Posts Widget
 */
class Digimag_Lite_Popular_Posts_Widget extends WP_Widget {
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
			'title'           => esc_html__( "What's rising", 'digimag-lite' ),
			'tag_name'        => '',
			'use_current_cat' => 0,
			'column_number'   => 3,
			'post_number'     => 6,
		);
		parent::__construct(
			'digimag-popular-posts',
			esc_html__( 'Digimag: Popular Posts', 'digimag-lite' ),
			array(
				'classname'   => 'digimag-popular-posts to-be-replaced', // This will be replaced by the column number.
				'description' => esc_html__( 'A widget that displays your popular posts based on the tag you choose', 'digimag-lite' ),
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
		$instance = wp_parse_args( $instance, $this->defaults );

		$use_current_cat = $instance['use_current_cat'];
		$post_number     = $instance['post_number'];
		$title           = $instance['title'];
		$column_number   = $instance['column_number'];

		$class                 = 'column-' . $column_number;
		$args['before_widget'] = str_replace( 'to-be-replaced', $class, $args['before_widget'] );

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
		$cat_id    = get_queried_object_id();
		if ( $use_current_cat && ! empty( $cat_id ) ) {
			$arguments['cat'] = $cat_id;
		}
		$query = new WP_Query( $arguments );

		if ( $query->have_posts() ) {

			echo $args['before_widget']; // WPCS: XSS OK.

			echo $args['before_title'] . $title . $args['after_title']; // WPCS: XSS OK.

			echo '<div class="grid grid--' . $column_number . '">'; // WPCS: XSS OK.

			while ( $query->have_posts() ) {
				$query->the_post();

				get_template_part( 'template-parts/content', 'popular' );
			}
			wp_reset_postdata();

			echo '</div>';

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

		$instance['title']           = sanitize_text_field( $new_instance['title'] );
		$instance['tag_name']        = sanitize_text_field( $new_instance['tag_name'] );
		$instance['use_current_cat'] = (bool) $new_instance['use_current_cat'];
		$instance['column_number']   = absint( $new_instance['column_number'] );
		$instance['post_number']     = absint( $new_instance['post_number'] );

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

		$title           = $instance['title'];
		$tag_name        = $instance['tag_name'];
		$use_current_cat = (bool) $instance['use_current_cat'];
		$column_number   = absint( $instance['column_number'] );
		$post_number     = absint( $instance['post_number'] );
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
			<input class="checkbox" type="checkbox"<?php checked( $use_current_cat ); ?> class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'use_current_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'use_current_cat' ) ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'use_current_cat' ) ); ?>"><?php esc_html_e( 'Use Current Category? ', 'digimag-lite' ); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><?php esc_html_e( 'Number Of Posts To Show:', 'digimag-lite' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $post_number ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Number Of Columns: ', 'digimag-lite' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>">
				<option value="1" <?php selected( $column_number, 1 ); ?>><?php esc_html_e( '1', 'digimag-lite' ); ?></option>
				<option value="3" <?php selected( $column_number, 3 ); ?>><?php esc_html_e( '3', 'digimag-lite' ); ?></option>
			</select>
		</p>

		<?php
	}
}
