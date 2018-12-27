<?php
/**
 * Video Post Widget
 *
 * @package Digimag Lite
 */

/**
 * Class Video Posts Widget
 */
class Digimag_Lite_Video_Posts_Widget extends WP_Widget {
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
			'title'        => '',
			'post_number'  => 4,
			'title_length' => 0,
		);
		parent::__construct(
			'digimag-video-posts',
			esc_html__( 'Digimag: Video Posts', 'digimag-lite' ),
			array(
				'classname'   => 'digimag-video-posts is-hidden',
				'description' => esc_html__( 'A widget that displays your post format video', 'digimag-lite' ),
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

		$title        = sanitize_text_field( $instance['title'] );
		$post_number  = absint( $instance['post_number'] );
		$title_length = intval( $instance['title_length'] );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'digimag-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
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
		$instance['post_number']  = absint( $new_instance['post_number'] );
		$instance['title_length'] = intval( $new_instance['title_length'] );

		return $instance;
	}

	/**
	 * How to display the widget on the screen.
	 *
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance     = wp_parse_args( $instance, $this->defaults );
		$title        = $instance['title'];
		$post_number  = $instance['post_number'];
		$title_length = $instance['title_length'];

		$arguments   = array(
			'pots_type'      => 'post',
			'posts_per_page' => $post_number,
			'tax_query'      => array(
				array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => 'post-format-video',
				),
			),
		);
		$format_link = get_post_format_link( 'video' );
		$query       = new WP_Query( $arguments );

		if ( $query->have_posts() ) {

			echo $args['before_widget']; // WPCS: XSS OK.
			?>
			<div class="video-posts__navigation">
				<?php echo $args['before_title'] . $title . $args['after_title']; // WPCS: XSS OK. ?>
				<div class="navigation__button">
					<button class="slick-prev slick-arrow" aria-label="Previous" data-direction="slickPrev" role="button"><i class="icofont icofont-simple-left"></i></button>
					<button class="slick-next slick-arrow" aria-label="Next" data-direction="slickNext" role="button"><i class="icofont icofont-simple-right"></i></button>
				</div>
				<a href="<?php echo esc_url( $format_link ); ?>"><span><?php echo esc_html__( 'Go to videos', 'digimag-lite' ); ?></span></a>
			</div>
			<div class="video-posts__items">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'video-posts__item' ); ?>">

						<a class="button-play" href="<?php the_permalink(); ?>"><i class="icofont icofont-ui-play"></i></a>
						<?php digimag_lite_post_thumbnail(); ?>
						<i class="icofont icofont-ui-video-play"></i>
						<div class="item__text">
							<span class="cat-links">
								<?php
									printf( '<a href="%s">Video</a>', esc_url( $format_link ) );
								?>
							</span>
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

					</article>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<?php

			echo $args['after_widget']; // WPCS: XSS OK.
		}

	}
}
