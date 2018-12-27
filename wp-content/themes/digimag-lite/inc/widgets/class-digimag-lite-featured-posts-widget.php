<?php
/**
 * Featured Posts Widget
 *
 * @package Digimag Lite
 */

/**
 * Class Featured Posts Widget
 */
class Digimag_Lite_Featured_Posts_Widget extends WP_Widget {
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
			'title'         => esc_html__( 'Featured Post', 'digimag-lite' ),
			'tag_name'      => '',
			'type'          => 'slider',
			'post_number'   => 5,
			'title_length'  => 0,
			'hide_category' => false,
		);
		parent::__construct(
			'digimag-featured-posts',
			esc_html__( 'Digimag: Featured Posts', 'digimag-lite' ),
			array(
				'classname'   => 'digimag-featured to-be-replaced', // This will be replaced by the type.
				'description' => esc_html__( 'A widget that displays your featured posts based on the tag you choose', 'digimag-lite' ),
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

		$type          = $instance['type'];
		$post_number   = $instance['post_number'];
		$title         = $instance['title'];
		$title_length  = $instance['title_length'];
		$hide_category = $instance['hide_category'];

		$type = ( 'slider' === $type ) ? 'slider is-hidden' : 'single';
		$args['before_widget'] = str_replace( 'to-be-replaced', 'digimag-featured-' . $type, $args['before_widget'] );

		$class = array( 'featured-item' );
		if ( $hide_category ) {
			$class[] = 'is-hidden-category';
		}

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

		$post_number = 'slider is-hidden' === $type ? $post_number : 1;

		$arguments = array(
			'posts_per_page' => $post_number,
			'tag_id'         => $tag_id,
		);

		$query = new WP_Query( $arguments );

		if ( $query->have_posts() ) {

			echo $args['before_widget']; // WPCS: XSS OK.

			echo $args['before_title'] . $title . $args['after_title']; // WPCS: XSS OK.

			echo '<div class="featured-container">'; // WPCS: XSS OK.

			while ( $query->have_posts() ) : $query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>">
					<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
						<?php
						if ( 'slider is-hidden' === $type ) {
							the_post_thumbnail( array( 760, 442, true ) );
						} else {
							the_post_thumbnail();
						}
						?>

					</a>
					<div class="featured-content">
						<div class="entry-category">
							<?php digimag_lite_print_single_category( true ); ?>
						</div>
						<h3 class="entry-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
								<?php
								if ( 0 === $title_length ) {
									$title = get_the_title();
								} else {
									$title = wp_trim_words( get_the_title(), $title_length, esc_html__( '...', 'digimag-lite' ) );
								}
								echo esc_html( $title );
								?>
							</a>
						</h3>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->

			<?php
			endwhile;
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

		$instance['title']         = sanitize_text_field( $new_instance['title'] );
		$instance['tag_name']      = sanitize_text_field( $new_instance['tag_name'] );
		$instance['type']          = sanitize_key( $new_instance['type'] );
		$instance['post_number']   = absint( $new_instance['post_number'] );
		$instance['title_length']  = intval( $new_instance['title_length'] );
		$instance['hide_category'] = (bool) ( $new_instance['hide_category'] );

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

		$title         = $instance['title'];
		$tag_name      = $instance['tag_name'];
		$type          = $instance['type'];
		$post_number   = absint( $instance['post_number'] );
		$title_length  = intval( $instance['title_length'] );
		$hide_category = (bool) ( $instance['hide_category'] );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'digimag-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php esc_html_e( 'Type: ', 'digimag-lite' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>">
				<option value="slider" <?php selected( $type, 'slider' ); ?>><?php esc_html_e( 'Slider', 'digimag-lite' ); ?></option>
				<option value="single" <?php selected( $type, 'single' ); ?>><?php esc_html_e( 'Single', 'digimag-lite' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tag_name' ) ); ?>"><?php esc_html_e( 'Tag Name:', 'digimag-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tag_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tag_name' ) ); ?>" value="<?php echo esc_attr( $tag_name ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><?php esc_html_e( 'Number Of Posts To Show:', 'digimag-lite' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $post_number ); ?>" size="3" />
			<i class="tiny-text"><?php esc_html_e( '(Please choose 5 or more to make the slider work properly)', 'digimag-lite' ); ?></i>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>"><?php esc_html_e( 'Title Length:', 'digimag-lite' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_length' ) ); ?>" type="number" step="1" min="0" value="<?php echo esc_attr( $title_length ); ?>" size="3" />
			<i class="tiny-text"><?php esc_html_e( '(Leave 0 to get full title)', 'digimag-lite' ); ?></i>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['hide_category'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'hide_category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_category' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'hide_category' ) ); ?>"><?php esc_html_e( 'Hide Category', 'digimag-lite' ); ?></label>
		</p>

		<?php
	}
}
