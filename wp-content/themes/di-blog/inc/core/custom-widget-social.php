<?php

class Di_Blog_Social_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'di_blog_social_widget',
			'description' => __( 'Display social profile. Social links will be fetch from customize.', 'di-blog' ),
		);
		parent::__construct( 'di_blog_social_widget', __( 'Di Blog Social Profile', 'di-blog' ), $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		if( ! empty( $title ) ) {
			echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];
		}
		
		?>
		<div class="dib-socail-widget">
			<?php get_template_part( 'template-parts/sections/header', 'reuse-icons' ); ?>
		</div>
		<?php
		
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'di-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
}

function di_blog_register_social_widget() {
	register_widget( 'Di_Blog_Social_Widget' );
}
add_action( 'widgets_init', 'di_blog_register_social_widget' );
