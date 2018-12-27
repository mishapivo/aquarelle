<?php
/**
 * Widget API: Seabadgermd_Widget_Fp_Postcards - display posts on front page
 */

class Seabadgermd_Widget_Fp_Postcards extends WP_Widget {

	/**
	 * Sets up a new FrontPage Postcards widget instance.
	 *
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'seabadgermd_widget_fp_postcards',
			'description'                 => esc_html__( 'Show recent posts as cards on Front Page', 'seabadgermd' ),
			'customize_selective_refresh' => false,
		);
		parent::__construct( 'seabadgermd-fp-postcards', esc_html__( 'FrontPage Postcards', 'seabadgermd' ), $widget_ops );
		$this->alt_option_name = 'seabadgermd_widget_fp_postcards';
	}

	/**
	 * Outputs the content for the current FrontPage Postcards widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current FrontPage Postcards widget instance.
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
		if ( ! $limit || $limit > 3 ) {
			$limit = 3; }
		if ( ! isset( $offset ) ) {
			$offset = 0; }

		$ignore_sticky = isset( $instance['ignore_sticky'] ) ? $instance['ignore_sticky'] : true;
		$disable_image = isset( $instance['disable_image'] ) ? $instance['disable_image'] : false;

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

		global $post;
		echo '<div class="card-deck post-wrapper">';
		while ( $r->have_posts() ) {
			$r->the_post();
			if ( ! has_excerpt() || post_password_required() ) {
				$content  = get_the_content( '', false );
				$content  = apply_filters( 'the_content', $content );
				$the_text = str_replace( ']]>', ']]&gt;', $content );
			} else {
				$the_text = get_the_excerpt();
			}
		?>
			<div <?php post_class( 'card' ); ?>>
				<?php if ( has_post_thumbnail() && ! $disable_image ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-image">
						<?php
						$limit > 1 ? $psize = 'small-size' : 'post-thumbnail';
						the_post_thumbnail( $psize, array( 'class' => 'img-fluid' ) );
						?>
					</a>
				<?php endif; ?>
				<h4 class="card-title postcard-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
				</h4>
				<div class="card-body postcard-body">
					<p class="card-text text-muted"><?php echo wp_kses_post( $the_text ); ?></p>
					<?php
					if ( has_tag() ) {
						echo '<hr><span class="text-muted tagline">' . esc_html__( 'Tagged with ', 'seabadgermd' );
						echo get_the_tag_list( '', ' ' );
						echo '</span><br class="clear">';
					}
					?>
				</div>
				<div class="card-footer">
					<?php
					printf( '<a href="%s" class="btn btn-sm themecolor">%s</a>',
						esc_url( get_permalink() ),
						esc_html__( 'Read more', 'seabadgermd' )
					);
					?>
				</div>
			</div>
		<?php
		} // end if(). have_posts()
		echo '</div>';

		if ( ! empty( $category ) && $category >= 0 && $add_category_link ) {
			printf( '<div class="category-readmore"><a href="%s" class="btn btn-sm themecolor">%s</a></div>',
				esc_url( get_category_link( $category ) ),
				sprintf( esc_html__( 'More posts from %1$s', 'seabadgermd' ),
				esc_html( get_cat_name( $category ) ) )
			);
		}

		wp_reset_postdata();

		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current FrontPage Postcards widget instance.
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
		$instance['disable_image']     = isset( $new_instance['disable_image'] ) ? (bool) $new_instance['disable_image'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the FrontPage Postcards widget.
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
		$disable_image     = isset( $instance['disable_image'] ) ? (bool) $instance['disable_image'] : false;
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
				<?php esc_html_e( 'Number of cards:', 'seabadgermd' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"
			name="<?php echo esc_Attr( $this->get_field_name( 'limit' ) ); ?>"
			type="number" step="1" min="1" max="3" value="<?php echo intval( $limit ); ?>" size="3" />
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

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $disable_image ); ?>
			id="<?php echo esc_attr( $this->get_field_id( 'disable_image' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'disable_image' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'disable_image' ) ); ?>">
				<?php esc_html_e( 'Disable featured image', 'seabadgermd' ); ?>
			</label>
		</p>
<?php
	}
}
