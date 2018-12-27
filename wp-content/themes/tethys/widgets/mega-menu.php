<?php

class tethys_widget_mega_menu extends WP_Widget {

/*  Widget Mega Menu Setup  */

	public function __construct() {
		parent::__construct(false, $name = esc_html__('#Mega Menu Posts [tethys]', 'tethys' ), array(
			'description' => esc_html__('Widget for displaying posts in the mega menu.', 'tethys' )
		));
	}

/*  Display Widget Mega Menu  */

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$categories = isset( $instance['cats_id'] ) ? $instance['cats_id'] : '';

		$category_link = get_category_link( $categories );
		$r1 = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => 5,
			'cat'      => $categories,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r1->have_posts()) :
		?>

											<div class="space-mega-menu-items relative">
												<?php while ( $r1->have_posts() ) : $r1->the_post(); ?>
												<div class="space-mega-menu-post left relative">
													<div class="space-mega-menu-post-ins relative">
														<?php 
															$widget_mega_menu_small = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-mega-menu-img');
															$image_mega_menu_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
															if ($widget_mega_menu_small) { ?>
														<div class="mega-menu-post-img relative">
															<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
																<div class="mega-menu-post-img-wrap relative">
																<img src="<?php echo esc_url($widget_mega_menu_small[0]); ?>" alt="<?php echo esc_attr($image_mega_menu_alt); ?>" />
																<?php if ( has_post_format( 'video' )) { ?>
																	<div class="space-post-format absolute"><i class="fa fa-play" aria-hidden="true"></i></div>
																<?php } ?>
																<?php if ( has_post_format( 'image' )) { ?>
																	<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
																<?php } ?>
																<?php if ( has_post_format( 'gallery' )) { ?>
																	<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
																<?php } ?>
																</div>
															</a>
														</div>
														<?php } ?>
														<div class="mega-menu-post-title relative">
															<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
														</div>
														<div class="mega-menu-post-meta space-common-meta relative">
															<i class="fa fa-calendar-o" aria-hidden="true"></i> <?php if( get_theme_mod('tethys_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'tethys' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?>
														</div>
													</div>
												</div>
												<?php endwhile; ?>
											</div>

		<?php
		wp_reset_postdata();
		endif;
	}

/*  Update Widget Mega Menu  */

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['cats_id'] = (int) $new_instance['cats_id'];
		return $instance;
	}

/*  Widget Mega Menu Settings Form  */

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

add_action( 'widgets_init', 'tethys_widget_mega_menu' );

function tethys_widget_mega_menu() {
	register_widget( 'tethys_widget_mega_menu' );
}