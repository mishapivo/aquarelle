<?php
 /**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_widget
 * @package euphoric
 */

 class Euphoric_posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'widget-latest-posts', 'description' => __( 'Display Latest Posts/ Category', 'euphoric') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name=__('T-Spiral: Latest Posts','euphoric'), $widget_ops, $control_ops );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$no_of_posts = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : 5;
		$posts_title = ! empty( $instance['posts_title'] ) ? esc_attr( $instance['posts_title'] ) : '';
		$latest_posts = ! empty( $instance['latest_posts'] ) ? esc_attr( $instance['latest_posts'] ) : 'latest';
		$category = ! empty( $instance['category'] ) ? esc_attr( $instance['category'] ) : 'category';
	?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'no_of_posts' )); ?>"><?php esc_html_e( 'Number of popular posts:', 'euphoric' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'no_of_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'no_of_posts' )); ?>" type="text" value="<?php echo absint( $no_of_posts ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>"><?php esc_html_e( 'Title:', 'euphoric' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_title' )); ?>" type="text" value="<?php echo esc_attr( $posts_title ); ?>">
		</p>
		<p><input type="radio" <?php checked(esc_attr($latest_posts), 'latest'); ?> id="<?php echo $this->get_field_id( 'latest_posts' ); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts' )); ?>" value="latest"/><?php _e( 'Latest Posts', 'euphoric' );?>
			<br>
		 <input type="radio" <?php checked(esc_attr($latest_posts), 'category'); ?> id="<?php echo esc_attr($this->get_field_id( 'latest_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts' )); ?>" value="category"/><?php _e( 'Show Category posts', 'euphoric' );?>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Select category', 'euphoric' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>__('-- Select -- ','euphoric'),'name' => esc_attr($this->get_field_name( 'category' )), 'selected' => esc_attr($category) ) ); ?>
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['no_of_posts'] = ( ! empty( $new_instance['no_of_posts'] ) ) ? absint( $new_instance['no_of_posts'] ) : '';
		$instance[ 'posts_title' ] = sanitize_text_field($new_instance[ 'posts_title' ]);
		$instance[ 'posts_title' ] = sanitize_text_field($new_instance[ 'posts_title' ]);
		$instance[ 'latest_posts' ] = sanitize_text_field($new_instance[ 'latest_posts' ]);
		$instance[ 'category' ] = sanitize_text_field($new_instance[ 'category' ]);

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		extract($args);
		$no_of_posts = ( ! empty( $instance['no_of_posts'] ) ) ? absint( $instance['no_of_posts'] ) : 5;
		$posts_title = ! empty( $instance['posts_title'] ) ? esc_attr( $instance['posts_title'] ) : '';
		$latest_posts = ! empty( $instance['latest_posts'] ) ? esc_attr( $instance['latest_posts'] ) : 'latest';
		$category = ! empty( $instance['category'] ) ? esc_attr( $instance['category'] ) : 'category';

		echo $before_widget;
		if(!empty($posts_title) ){ ?>
			<h2 class="widget-title"><?php echo esc_attr($posts_title); ?></h2>
		<?php } ?>
		<div class="recent-posts-wrap">
		
			<?php
			if( $latest_posts == 'latest' ) {
				$get_posts = new WP_Query( array(
					'posts_per_page' 			=> absint($no_of_posts),
					'post_type'					=> 'post',
					'ignore_sticky_posts' 	=> true
				) );
			}
			else {
				$get_posts = new WP_Query( array(
					'posts_per_page' 			=> absint($no_of_posts),
					'post_type'					=> 'post',
					'category__in'				=> absint($category)
				) );
			}

			while( $get_posts-> have_posts() ) : $get_posts->the_post(); ?>
			<article <?php post_class('post');?>>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
					</div>
				<?php } ?>
				<header class="entry-header">
					<div class="entry-meta">
						<?php 
							euphoric_posted_by();
							euphoric_posted_on();
						 ?>
					</div><!-- .entry-meta -->
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->
			</article><!-- #post -->
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div><!-- .recent-posts-wrap -->
		<?php echo $after_widget;
	}

}