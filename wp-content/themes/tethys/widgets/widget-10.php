<?php

class tethys_widget_10 extends WP_Widget {

/*  Widget #10 Setup  */

	public function __construct() {
		parent::__construct(false, $name = esc_html__('#10 Widget [tethys]', 'tethys' ), array(
			'description' => esc_html__('Widget #10 for the Homepage', 'tethys' )
		));
	}

/*  Display Widget #10  */

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 2;
		if ( ! $number ) {
			$number = 2;
		}
		$categories = isset( $instance['cats_id'] ) ? $instance['cats_id'] : '';

		$category_link = get_category_link( $categories );
		$r1 = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'cat'      => $categories,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r1->have_posts()) :
		?>

					<div class="space-widget relative">
						<?php if ( $title ) { ?>
						<div class="space-widget-title relative">
							<div class="space-widget-title-line relative"></div>
							<span><?php echo esc_html($title); ?></span>
						</div>
						<?php } ?>
						<div class="space-news-widget-10 relative">
							<ul class="space-news-widget-10-items relative">
								<?php while ( $r1->have_posts() ) : $r1->the_post(); ?>
								<li class="space-news-widget-10-item relative">
									<div class="space-news-widget-10-item-ins case-15 white relative">
										<?php 
											$widget_10_small = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-loop-img'); 
											$widget_10_small_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
											if ($widget_10_small) { ?>
										<div class="space-news-widget-10-item-img relative">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<img src="<?php echo esc_url($widget_10_small[0]); ?>" alt="<?php echo esc_attr($widget_10_small_alt); ?>">
												<?php if ( has_post_format( 'video' )) { ?>
													<div class="space-post-format absolute"><i class="fa fa-play" aria-hidden="true"></i></div>
												<?php } ?>
												<?php if ( has_post_format( 'image' )) { ?>
													<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
												<?php } ?>
												<?php if ( has_post_format( 'gallery' )) { ?>
													<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
												<?php } ?>
											</a>
										</div>
										<?php } ?>
										<div class="space-news-widget-10-item-title relative">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
											<span class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php if( get_theme_mod('tethys_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'tethys' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?> <span>&raquo;</span> <?php the_category(', '); ?></span>
										</div>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>

		<?php
		wp_reset_postdata();
		endif;
	}

/*  Update Widget #10  */

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['cats_id'] = (int) $new_instance['cats_id'];
		return $instance;
	}

/*  Widget #10 Settings Form  */

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 2;
		$cats = get_categories();
		$categories = isset( $instance['cats_id'] ) ? $instance['cats_id'] : '';
?>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'tethys' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'cats_id' )); ?>"><?php esc_html_e('Select Category:' , 'tethys' );?></label>
		<select id="<?php echo esc_attr($this->get_field_id( 'cats_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cats_id' )); ?>">
 		<option value=""><?php esc_html_e('All' , 'tethys' );?></option>
			<?php foreach ( $cats as $cat ) {?>
			<option value="<?php echo esc_attr($cat->term_id); ?>"<?php echo selected( $categories, $cat->term_id, false ) ?>> <?php echo esc_attr( $cat->name ) ?></option>
			<?php }?>
 		</select></p>

 		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of post to show:', 'tethys' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_html($this->get_field_id( 'number' )); ?>" name="<?php echo esc_html($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_html($number); ?>" size="2" /></p>

<?php

	}
}

add_action( 'widgets_init', 'tethys_widget_10' );

function tethys_widget_10() {
	register_widget( 'tethys_widget_10' );
}