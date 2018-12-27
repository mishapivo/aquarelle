<?php
/**
 * Widget API: Seabadgermd_Widget_Recent_Posts_Grid - list recent posts on SeaBadgerMD theme
 * Features: image grid, category select
 */

class Seabadgermd_Widget_Recent_Posts_Grid extends WP_Widget {

	/**
	 * Sets up a new Recent Posts Grid widget instance.
	 *
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'seabadgermd_widget_recent_posts_grid',
			'description' => esc_html__( 'Show most recent posts of category with thumbnails', 'seabadgermd' ),
			'customize_selective_refresh' => false,
		);
		parent::__construct( 'seabadgermd-recent-posts-grid', esc_html__( 'Recent Posts Grid [SeaBadgerMD]', 'seabadgermd' ), $widget_ops );
		$this->alt_option_name = 'seabadgermd_widget_recent_posts_grid';
	}

	/**
	 * Outputs the content for the current Recent Posts Grid widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$rows = ( ! empty( $instance['rows'] ) ) ? absint( $instance['rows'] ) : 2;
		$cols = ( ! empty( $instance['cols'] ) ) ? absint( $instance['cols'] ) : 2;
		$offset = ( ! empty( $instance['offset'] ) ) ? absint( $instance['offset'] ) : 0;
		if ( ! $rows ) {
			$rows = 2; }
		if ( ! $cols ) {
			$cols = 2; }

		$from_same_category = isset( $instance['from_same_category'] ) ? $instance['from_same_category'] : false;
		$category = get_the_category();
		$query_filter = array(
			'posts_per_page'      => $rows * $cols,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'offset' => $offset,
		);

		if ( ! is_front_page() && $from_same_category && ! empty( $category ) ) {
			$categories = array_values( $category );
			$last_category = end( $categories );
			$parent_categories = rtrim( get_category_parents( $last_category->term_id, false, ',', true ), ',' );
			$query_filter['category_name'] = $parent_categories;
		}
		/* query most recent posts */
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
		?>
		<div class="row recent-posts">
			<div class="col-12">
			<?php
				$w = 12 / $cols;
				$posts = ( $r->posts );
			for ( $r = 0; $r < $rows; $r++ ) {
				echo '<div class="row">';
				for ( $c = 0; $c < $cols; $c++ ) {
					$pos = ( $r * $cols ) + $c;
					if ( count( $posts ) > $pos ) {
						printf( '<div class="col-%d recent-posts-grid-item">', intval( $w ) );
						$recent_post = $posts[ $pos ];
						$post_title = get_the_title( $recent_post->ID );
						$title      = ( ! empty( $post_title ) ) ? $post_title : esc_attr__( '(no title)', 'seabadgermd' );
						printf(
							'<a href="%s" title="%s">',
							esc_url( get_the_permalink( $recent_post->ID ) ),
							esc_attr( wp_strip_all_tags( $title ) )
						);
						if ( get_post_thumbnail_id( $recent_post->ID ) ) {
							echo get_the_post_thumbnail( $recent_post->ID, 'thumbnail',
							array( 'class' => 'img-fluid' ) );
						} else {
							// post has no thumbnail
							printf( '<img src="%s/img/NoThumbnail.png" class="img-fluid">',
							esc_url( get_template_directory_uri() ) );
						}
						$max_stitle_length = 20;
						if ( strlen( $title ) > $max_stitle_length ) {
							$stitle = preg_replace( '/[\s\.,][^\s\.,]*$/u', '', substr( $title, 0, $max_stitle_length ) ) . '...';
						} else {
							$stitle = $title;
						}
						printf( '<span class="recent-posts-grid-textover">%s</span>',
						esc_html( $stitle ) );
						echo '</a>';
						echo '</div>';
					} else {
						//no more post to show
						echo '<!-- No post in this position -->';
						echo '<div class="recent-posts-grid-empty"></div>';
					}
				} // End for(). (cols)
				echo '</div>';
			} // End for(). (rows)
			?>
			</div>
		</div> <!-- /row recent-posts -->
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['rows'] = (int) $new_instance['rows'];
		$instance['cols'] = (int) $new_instance['cols'];
		$instance['offset'] = (int) $new_instance['offset'];
		$instance['from_same_category'] = isset( $new_instance['from_same_category'] ) ? (bool) $new_instance['from_same_category'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$rows    = isset( $instance['rows'] ) ? absint( $instance['rows'] ) : 2;
		$cols    = isset( $instance['cols'] ) ? absint( $instance['cols'] ) : 2;
		$offset    = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : 0;
		$from_same_category = isset( $instance['from_same_category'] ) ? (bool) $instance['from_same_category'] : false;
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php esc_html_e( 'Title:', 'seabadgermd' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			name="<?php echo $this->get_field_name( 'title' ); ?>"
			type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'rows' ); ?>">
				<?php esc_html_e( 'Number of rows:', 'seabadgermd' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'rows' ); ?>"
			name="<?php echo $this->get_field_name( 'rows' ); ?>"
			type="number" step="1" min="1" value="<?php echo intval( $rows ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cols' ); ?>">
				<?php esc_html_e( 'Number of columns:', 'seabadgermd' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'cols' ); ?>"
			name="<?php echo $this->get_field_name( 'cols' ); ?>"
			type="number" step="1" min="1" value="<?php echo intval( $cols ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'offset' ); ?>">
				<?php esc_html_e( 'Offset (skip x latest posts):', 'seabadgermd' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'offset' ); ?>"
			name="<?php echo $this->get_field_name( 'offset' ); ?>"
			type="number" step="1" min="0" value="<?php echo intval( $offset ); ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $from_same_category ); ?>
			id="<?php echo $this->get_field_id( 'from_same_category' ); ?>" 
			name="<?php echo $this->get_field_name( 'from_same_category' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'from_same_category' ); ?>">
				<?php esc_html_e( 'List posts only from the category of current page and its parent categories', 'seabadgermd' ); ?>
			</label>
		</p>
<?php
	}
}
