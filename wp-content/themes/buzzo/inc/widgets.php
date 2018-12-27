<?php
/**
 * Buzzo widgets
 *
 * @package Buzzo
 */

function buzzo_register_widgets() {
	register_widget( 'Buzzo_Widget_Posts' );
}
add_action( 'widgets_init', 'buzzo_register_widgets' );


abstract class Buzzo_Widget extends WP_Widget {

	abstract public function get_id();

	abstract public function get_name();

	abstract public function get_default();

	public function get_classname() {
		return 'widget_' . $this->get_id();
	}

	public function get_description() {
		return '';
	}

	/**
	 * Sets up the widgets name etc.
	 */
	public function __construct() {
		$this->_default = $this->get_default();

		$widget_ops = array(
			'classname'   => $this->get_classname(),
			'description' => $this->get_description(),
		);
		parent::__construct( $this->get_id(), $this->get_name(), $widget_ops );
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {}

	/**
	 * Outputs the options form on admin.
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {}

	/**
	 * Processing widget options on save.
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 */
	public function update( $new_instance, $old_instance ) {}

	protected function _parse_instance( $instance ) {
		return wp_parse_args( $instance, $this->get_default() );
	}
}


class Buzzo_Widget_Posts extends Buzzo_Widget {

	public function get_id() {
		return 'buzzo-posts';
	}

	public function get_name() {
		return esc_html__( 'Buzzo: Posts', 'buzzo' );
	}

	public function get_default() {
		return array(
			'title'   => '',
			'number'  => 5,
			'cat'     => '',
			'tag'     => '',
			'orderby' => 'latest',
			'order'   => 'desc',
			'columns' => 1,
		);
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$instance = $this->_parse_instance( $instance );

		$query_args = $this->_get_query_args( $instance );
		$query = new WP_Query( $query_args );

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		}

		$col_class = 'col-sm-' . ( 12 / intval( $instance['columns'] ) );
		?>
		<div class="widget-posts-content">
			<div class="row">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="<?php echo esc_attr( $col_class ); ?>">
						<?php get_template_part( 'template-parts/loop-small' ); ?>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Outputs the options form on admin.
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
		$instance = $this->_parse_instance( $instance );

		$option_cats = get_terms( array(
			'taxonomy'   => 'category',
			'fields'     => 'id=>name',
		) );

		$option_tags = get_terms( array(
			'taxonomy'   => 'post_tag',
			'fields'     => 'id=>name',
		) );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'buzzo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'buzzo' ); ?></label>
			<input type="number" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" class="widefat" value="<?php echo intval( $instance['number'] ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>"><?php esc_html_e( 'Category:', 'buzzo' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat' ) ); ?>">
				<option value=""><?php esc_html_e( 'All categories', 'buzzo' ); ?></option>
				<?php foreach ( $option_cats as $id => $name ) : ?>
					<option value="<?php echo intval( $id ) ?>" <?php selected( $instance['cat'], $id ); ?>><?php echo esc_html( $name ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>"><?php esc_html_e( 'Tag:', 'buzzo' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tag' ) ); ?>">
				<option value=""><?php esc_html_e( 'All tags', 'buzzo' ); ?></option>
				<?php foreach ( $option_tags as $id => $name ) : ?>
					<option value="<?php echo intval( $id ) ?>" <?php selected( $instance['tag'], $id ); ?>><?php echo esc_html( $name ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order by:', 'buzzo' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>">
				<option value="latest" <?php selected( $instance['orderby'], 'latest' ); ?>><?php esc_html_e( 'Latest', 'buzzo' ); ?></option>
				<option value="comment_count" <?php selected( $instance['orderby'], 'comment_count' ); ?>><?php esc_html_e( 'Comment count', 'buzzo' ); ?></option>
				<option value="rand" <?php selected( $instance['orderby'], 'rand' ); ?>><?php esc_html_e( 'Random', 'buzzo' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Order:', 'buzzo' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>">
				<option value="desc" <?php selected( $instance['order'], 'desc' ); ?>><?php esc_html_e( 'DESC', 'buzzo' ); ?></option>
				<option value="asc" <?php selected( $instance['order'], 'asc' ); ?>><?php esc_html_e( 'ASC', 'buzzo' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"><?php esc_html_e( 'Number of columns:', 'buzzo' ); ?></label>
			<input type="number" name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>" class="widefat" value="<?php echo intval( $instance['columns'] ); ?>" min="1" max="3">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save.
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = $this->_parse_instance( $new_instance );

		$instance['title'] = wp_kses( $new_instance['title'], array() );
		$instance['number'] = intval( $new_instance['number'] );
		$instance['cat'] = intval( $new_instance['cat'] );
		$instance['tag'] = intval( $new_instance['tag'] );
		$instance['orderby'] = sanitize_text_field( $new_instance['orderby'] );
		$instance['order'] = sanitize_text_field( $new_instance['order'] );
		$instance['columns'] = intval( $new_instance['columns'] );

		return $instance;
	}

	protected function _get_query_args( $instance ) {
		$query_args = array(
			'posts_per_page'      => intval( $instance['number'] ),
			'ignore_sticky_posts' => true,
		);

		if ( $instance['cat'] ) {
			$query_args['cat'] = intval( $instance['cat'] );
		}

		if ( $instance['tag'] ) {
			$query_args['tag_id'] = intval( $instance['tag'] );
		}

		if ( 'latest' != $instance['orderby'] ) {
			$query_args['orderby'] = $instance['orderby'];
		}

		if ( $instance['order'] ) {
			$query_args['order'] = $instance['order'];
		}

		return $query_args;
	}
}
