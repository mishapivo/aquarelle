<?php

class tethys_widget_7 extends WP_Widget {

/*  Widget #7 Setup  */

	public function __construct() {
		parent::__construct(false, $name = esc_html__('#7 Widget [tethys]', 'tethys' ), array(
			'description' => esc_html__('Widget #7 for the Homepage. Video Posts.', 'tethys' )
		));
	}

/*  Display Widget #7  */

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$categories = isset( $instance['cats_id'] ) ? $instance['cats_id'] : '';

		$category_link = get_category_link( $categories );
		$r1 = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => 1,
			'cat'      => $categories,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'tax_query' => array(
		        array(                
		            'taxonomy' => 'post_format',
		            'field' => 'slug',
		            'terms' => array( 
		                'post-format-video'
		            ),
		            'operator' => 'IN'
		        )
		    )
		) ) );

		$r2 = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => 4,
			'cat'      => $categories,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'offset'	=> 1,
			'ignore_sticky_posts' => true,
			'tax_query' => array(
		        array(                
		            'taxonomy' => 'post_format',
		            'field' => 'slug',
		            'terms' => array( 
		                'post-format-video'
		            ),
		            'operator' => 'IN'
		        )
		    )
		) ) );

		if ($r1->have_posts()) :
		?>

					<?php if ( $title ) { ?>
					<div class="space-widget case-15 widget-video-posts relative">
						<div class="space-widget-title relative">
							<span><?php echo esc_html($title); ?></span>
						</div>
					<?php } else { ?>
					<div class="space-widget case-15 widget-video-posts no-title relative">
					<?php } ?>
						<div class="space-news-widget-7 relative">
							<div class="space-news-widget-7-big relative">
								<?php
									while ( $r1->have_posts() ) : $r1->the_post();
									$post_id = get_the_ID();
									$terms = get_the_terms( $post_id, 'category' );
								?>
								<?php 
									$widget_7_big = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-medium-img'); 
									$widget_7_big_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
									if ($widget_7_big) {  ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<img src="<?php echo esc_url($widget_7_big[0]); ?>" alt="<?php echo esc_attr($widget_7_big_alt); ?>">
									<div class="space-news-widget-7-big-play absolute"><i class="fa fa-play" aria-hidden="true"></i></div>
									<div class="space-news-widget-7-big-title absolute">
										<div class="space-news-widget-7-big-category relative"><?php foreach( $terms as $term ){ echo esc_html($term->name); } ?></div>
										<div class="space-news-widget-7-big-title-link relative">
											<?php get_the_title() ? the_title() : the_ID(); ?>
										</div>
									</div>
								</a>
								<?php } ?>
								<?php
									endwhile;
									wp_reset_postdata();
								?>
							</div>
							<div class="space-news-widget-7-small-items relative">
								<?php while ( $r2->have_posts() ) : $r2->the_post(); ?>
								<div class="space-news-widget-7-small-item box-50 left relative">
									<div class="space-news-widget-7-small-item-ins relative">
										<div class="space-news-widget-7-small-item-img left relative">
											<?php 
												$widget_7_small = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-small-img'); 
												$widget_7_small_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
												if ($widget_7_small) {  ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<img src="<?php echo esc_url($widget_7_small[0]); ?>" alt="<?php echo esc_attr($widget_7_small_alt); ?>">
												<div class="space-news-widget-7-small-play absolute"><i class="fa fa-play" aria-hidden="true"></i></div>
											</a>
											<?php } ?>
										</div>
										<div class="space-news-widget-7-small-item-title right relative">
											<div class="space-news-widget-7-small-item-title-ins relative">
												<span class="category"><?php the_category(', '); ?></span>
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
											</div>
										</div>
									</div>
								</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>

		<?php
		wp_reset_postdata();
		endif;
	}

/*  Update Widget #7  */

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['cats_id'] = (int) $new_instance['cats_id'];
		return $instance;
	}

/*  Widget #7 Settings Form  */

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
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

<?php

	}
}

add_action( 'widgets_init', 'tethys_widget_7' );

function tethys_widget_7() {
	register_widget( 'tethys_widget_7' );
}