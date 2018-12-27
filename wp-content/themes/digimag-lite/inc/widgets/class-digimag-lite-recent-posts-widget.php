<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Digimag Lite
 */

/**
 * Digimag Recent Posts
 */
class Digimag_Lite_Recent_Posts_Widget extends WP_Widget {
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
			'title'        => esc_html__( 'Latest Articles', 'digimag-lite' ),
			'title_length' => 6,
			'number'       => 4,
			'type'         => 'latest',
			'category'     => -1,
		);

		parent::__construct(
			'digimag-recent-posts',
			esc_html__( 'Digimag: Recent Posts', 'digimag-lite' ),
			array(
				'classname'   => 'digimag_lite_recent_posts',
				'description' => 'A widget that displays your recent posts from all categories or a category',
			)
		);
	}

	/**
	 * Widget form.
	 *
	 * @param array $instance Widget instance.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$title        = $instance['title'];
		$title_length = $instance['title_length'];
		$number       = $instance['number'];
		$type         = $instance['type'];
		$category     = $instance['category'];
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title: ', 'digimag-lite' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; // WPCS XSS: OK. ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>"><?php esc_html_e( 'Title Length: ', 'digimag-lite' ); ?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_length' ) ); ?>" type="text" value="<?php echo $title_length; // WPCS XSS: OK. ?>" />
			<i class="tiny-text"><?php esc_html_e( '(Leave 0 to get full title)', 'digimag-lite' ); ?></i>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to display: ', 'digimag-lite' ); ?></label>
			<input type="number" min="1" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo $number; // WPCS XSS: OK. ?>" size="3" />
		</p>
		<p>
			<input type="radio" <?php checked( $type, 'latest' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>" value="latest"/><?php esc_html_e( 'Show latest posts', 'digimag-lite' ); ?><br />
			<input type="radio" <?php checked( $type, 'category' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>" value="category"/><?php esc_html_e( 'Show posts from a category', 'digimag-lite' ); ?><br />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select category: ', 'digimag-lite' ); ?></label>
			<?php
			wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) );
			?>
		</p>
		<?php
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

		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['title_length'] = absint( $new_instance['title_length'] );
		$instance['number']       = absint( $new_instance['number'] );
		$instance['type']         = sanitize_key( $new_instance['type'] );
		$instance['category']     = intval( $new_instance['category'] );
		return $instance;
	}

	/**
	 * How to display the widget on the screen.
	 *
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$title        = $instance['title'];
		$title_length = $instance['title_length'];
		$number       = $instance['number'];
		$type         = $instance['type'];
		$category     = $instance['category'];

		$query_args = array(
			'posts_per_page'      => $number,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
		);
		if ( 'category' === $type ) {
			$query_args['category__in'] = $category;
		}
		$query = new WP_Query( $query_args );

		echo $args['before_widget']; // WPCS XSS: OK.
		if ( $title ) {
			echo $args['before_title'], $title , $args['after_title']; // WPCS: XSS OK.
		}

		while ( $query->have_posts() ) : $query->the_post(); ?>
			<article <?php post_class( 'recent-post' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="recent-post__image">
						<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
							<?php the_post_thumbnail( array( 80, 80, true ) ); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="recent-post__text">
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
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
					<div class="entry-meta">
						<?php
						digimag_lite_posted_on();
						?>
					</div>
				</div>
			</article>
			<hr width="150px;" style="margin: 30px 0; background-color: #e2e2e2;">
		<?php
		endwhile;

		wp_reset_postdata();

		echo $args['after_widget']; // WPCS XSS: OK.
	}
}

