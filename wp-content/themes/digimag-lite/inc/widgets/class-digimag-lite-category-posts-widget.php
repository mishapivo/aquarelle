<?php
/**
 * Category Post Widget
 *
 * @package Digimag Lite
 */

/**
 * Class Category Posts Widget
 */
class Digimag_Lite_Category_Posts_Widget extends WP_Widget {
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
			'latest_text'    => esc_html__( 'Latest From: ', 'digimag-lite' ),
			'excerpt_length' => 25,
			'category_1'     => -1,
			'category_2'     => -1,
			'category_3'     => -1,
			'category_4'     => -1,
		);

		parent::__construct(
			'digimag-category-posts',
			esc_html__( 'Digimag Lite: Category Posts', 'digimag-lite' ),
			array(
				'classname'   => 'digimag-category-posts',
				'description' => esc_html__( 'A widget that displays your latest posts from chosen categories', 'digimag-lite' ),
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

		$latest_text    = $instance['latest_text'];
		$excerpt_length = $instance['excerpt_length'];

		$category_1 = $instance['category_1'];
		$category_2 = $instance['category_2'];
		$category_3 = $instance['category_3'];
		$category_4 = $instance['category_4'];
		$cats       = array( $category_1, $category_2, $category_3, $category_4 );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'latest_text' ) ); ?>"><?php esc_html_e( 'Latest Text: ', 'digimag-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'latest_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'latest_text' ) ); ?>" value="<?php echo esc_attr( $latest_text ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>"><?php esc_html_e( 'Excerpt Length (words): ', 'digimag-lite' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt_length' ) ); ?>" type="number" step="1" min="0" value="<?php echo esc_attr( $excerpt_length ); ?>" size="3" />
		</p>


		<?php foreach ( $cats as $index => $cat ) : ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category_' . ( $index + 1 ) ) ); ?>"><?php esc_html_e( 'Select category: ', 'digimag-lite' ); ?></label>
				<?php
				wp_dropdown_categories( array(
					'show_option_none' => esc_html__( 'Select', 'digimag-lite' ),
					'name'             => $this->get_field_name( 'category_' . ( $index + 1 ) ),
					'selected'         => $cat,
				) );
				?>
			</p>
		<?php
		endforeach;
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

		$instance['latest_text']    = sanitize_text_field( $new_instance['latest_text'] );
		$instance['excerpt_length'] = absint( $new_instance['excerpt_length'] );
		$instance['category_1']     = intval( $new_instance['category_1'] );
		$instance['category_2']     = intval( $new_instance['category_2'] );
		$instance['category_3']     = intval( $new_instance['category_3'] );
		$instance['category_4']     = intval( $new_instance['category_4'] );

		return $instance;
	}

	/**
	 * How to display the widget on the screen.
	 *
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance       = wp_parse_args( $instance, $this->defaults );
		$latest_text    = $instance['latest_text'];
		$excerpt_length = $instance['excerpt_length'];

		$category_1 = intval( $instance['category_1'] );
		$category_2 = intval( $instance['category_2'] );
		$category_3 = intval( $instance['category_3'] );
		$category_4 = intval( $instance['category_4'] );
		$cat_ids    = array( $category_1, $category_2, $category_3, $category_4 );

		echo $args['before_widget']; // WPCS: XSS OK.
		?>
		<div class="container">
			<div class="grid grid--4">
				<?php
				foreach ( $cat_ids as $cat_id ) {
					$arguments = array(
						'cat'            => $cat_id,
						'posts_per_page' => 1,
					);
					$query     = new WP_Query( $arguments );
					while ( $query->have_posts() ) : $query->the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header>
								<div class="latest-text"><?php echo esc_html( $latest_text ); ?></div>
								<div class="entry-category"><?php digimag_lite_print_single_category(); ?></div>

								<?php digimag_lite_post_thumbnail( 'digimag-lite-related' ); ?>

								<div class="entry-meta">
									<?php
									digimag_lite_posted_by( false );
									digimag_lite_posted_on();
									?>
								</div>
							</header>

							<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

							<div class="entry-content">
								<?php
								$content = wp_trim_words( get_the_excerpt(), $excerpt_length, esc_html__( '...', 'digimag-lite' ) );
								echo esc_html( $content );
								?>
							</div><!-- .entry-content -->
							<footer class="entry-footer">
								<p class="link-more">
									<a href="<?php the_permalink(); ?>" class="more-link tag-alike-style"><?php echo esc_html__( 'Read More ...', 'digimag-lite' ); ?></a>
								</p>
								<?php digimag_lite_edit_link(); ?>
							</footer><!-- .entry-footer -->
						</article>
					<?php
					endwhile;
					wp_reset_postdata();
				}
				?>
			</div>
		</div><!-- .container -->
		<?php

		echo $args['after_widget']; // WPCS: XSS OK.

	}
}
