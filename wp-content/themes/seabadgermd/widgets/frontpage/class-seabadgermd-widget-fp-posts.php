<?php
/**
 * Widget API: Seabadgermd_Widget_Fp_Posts - display posts on front page
 */

class Seabadgermd_Widget_Fp_Posts extends WP_Widget {

	/**
	 * Sets up a new FrontPage Posts widget instance.
	 *
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'seabadgermd_widget_fp_posts',
			'description'                 => esc_html__( 'Show recent posts on Front Page', 'seabadgermd' ),
			'customize_selective_refresh' => false,
		);
		parent::__construct( 'seabadgermd-fp-posts', esc_html__( 'FrontPage Posts', 'seabadgermd' ), $widget_ops );
		$this->alt_option_name = 'seabadgermd_widget_fp_posts';
	}

	/**
	 * Outputs the content for the current FrontPage Posts widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current FrontPage Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$add_category_link = isset( $instance['add_category_link'] ) ? $instance['add_category_link'] : false;
		$category          = isset( $instance['category'] ) ? (int) $instance['category'] : -1;

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$limit  = ( ! empty( $instance['limit'] ) ) ? absint( $instance['limit'] ) : 3;
		$offset = ( ! empty( $instance['offset'] ) ) ? absint( $instance['offset'] ) : 0;
		if ( ! $limit ) {
			$limit = 3; }
		if ( ! isset( $offset ) ) {
			$offset = 0; }

		$ignore_sticky = isset( $instance['ignore_sticky'] ) ? (bool) $instance['ignore_sticky'] : true;

		$query_filter = array(
			'posts_per_page'      => $limit,
			'offset'              => $offset,
			'no_found_limit'      => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => $ignore_sticky,
		);

		if ( ! empty( $category ) && $category >= 0 ) {
			$query_filter['cat'] = $category;
		}

		$r = new WP_Query( apply_filters( 'widget_posts_args', $query_filter, $instance ) );

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		global $post;
		while ( $r->have_posts() ) {
			$r->the_post();
		?>
			<div <?php post_class( 'card post-wrapper' ); ?>>
			<?php get_template_part( 'template-parts/content' ); ?>
			</div>
		<?php
		}
		wp_reset_postdata();

		if ( ! empty( $category ) && $category >= 0 && $add_category_link ) {
			printf( '<div class="category-readmore"><a href="%s" class="btn btn-sm themecolor">%s</a></div>',
				esc_url( get_category_link( $category ) ),
				sprintf( esc_html__( 'More posts from %1$s', 'seabadgermd' ),
				esc_html( get_cat_name( $category ) ) )
			);
		}

		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current FrontPage Posts widget instance.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                      = $old_instance;
		$instance['title']             = sanitize_text_field( $new_instance['title'] );
		$instance['limit']             = absint( $new_instance['limit'] );
		$instance['offset']            = absint( $new_instance['offset'] );
		$instance['category']          = isset( $new_instance['category'] ) ? (int) $new_instance['category'] : -1;
		$instance['ignore_sticky']     = isset( $new_instance['ignore_sticky'] ) ? (bool) $new_instance['ignore_sticky'] : true;
		$instance['add_category_link'] = isset( $new_instance['add_category_link'] ) ? (bool) $new_instance['add_category_link'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the FrontPage Posts widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title             = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$limit             = isset( $instance['limit'] ) ? absint( $instance['limit'] ) : 2;
		$offset            = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : 0;
		$category          = isset( $instance['category'] ) ? (int) $instance['category'] : -1;
		$ignore_sticky     = isset( $instance['ignore_sticky'] ) ? (bool) $instance['ignore_sticky'] : true;
		$add_category_link = isset( $instance['add_category_link'] ) ? (bool) $instance['add_category_link'] : false;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'seabadgermd' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>">
				<?php esc_html_e( 'Maximum number of posts:', 'seabadgermd' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>"
			type="number" step="1" min="1" value="<?php echo intval( $limit ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>">
				<?php esc_html_e( 'Offset (skip x latest posts):', 'seabadgermd' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>"
			type="number" step="1" min="0" value="<?php echo intval( $offset ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Only from category:', 'seabadgermd' ); ?>
			</label>
			<?php
				$cargs = array(
					'selected'          => $category,
					'echo'              => 1,
					'name'              => esc_attr( $this->get_field_name( 'category' ) ),
					'id'                => esc_attr( $this->get_field_id( 'category' ) ),
					'class'             => 'postform',
					'show_option_none'  => esc_html__( 'From all categories', 'seabadgermd' ),
					'option_none_value' => -1,
					'taxonomy'          => 'category',
					'hide_if_empty'     => false,
					'hide_empty'        => false,
					'hierarchical'      => 1,
				);
			?>
			<?php wp_dropdown_categories( $cargs ); ?>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $add_category_link ); ?>
			id="<?php echo esc_attr( $this->get_field_id( 'add_category_link' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'add_category_link' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'add_category_link' ) ); ?>">
				<?php esc_html_e( 'Add "Read more from category" link if a category is selected', 'seabadgermd' ); ?>
			</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $ignore_sticky ); ?>
			id="<?php echo esc_attr( $this->get_field_id( 'ignore_sticky' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'ignore_sticky' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'ignore_sticky' ) ); ?>">
				<?php esc_html_e( 'Ignore sticky posts', 'seabadgermd' ); ?>
			</label>
		</p>
<?php
	}
}
