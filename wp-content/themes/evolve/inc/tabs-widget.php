<?php

class evolve_Tabs_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'evolve_tabs-widget', __( 'evolve: Tabs', 'evolve' ), // Name
			array(
				'classname'   => 'evolve_tabs',
				'description' => __( 'Popular posts, recent posts and comments.', 'evolve' ),
			) // Args
		);
	}

	function widget( $args, $instance ) {
		global $data, $post;

		extract( $args );

		if ( is_array( $instance ) && count( $instance ) == 0 ) {
			$instance = array(
				'posts'              => '3',
				'comments'           => '3',
				'tags'               => '3',
				'show_popular_posts' => 'on',
				'show_recent_posts'  => 'on',
				'show_comments'      => 'on',
				'show_tags'          => 'on',
				'orderby'            => 'Highest Comments'
			);
		}

		if ( ! empty( $instance['posts'] ) ) {
			$posts = $instance['posts'];
		}
		if ( ! empty( $instance['comments'] ) ) {
			$number = $instance['comments'];
		}
		if ( ! empty( $instance['tags'] ) ) {
			$tags_count = $instance['tags'];
		}
		if ( ! empty( $instance['orderby'] ) ) {
			$orderby = $instance['orderby'];
		}

		$show_popular_posts = isset( $instance['show_popular_posts'] ) ? 'true' : 'false';
		$show_recent_posts  = isset( $instance['show_recent_posts'] ) ? 'true' : 'false';
		$show_comments      = isset( $instance['show_comments'] ) ? 'true' : 'false';

		echo $before_widget; ?>

        <ul id="nav-tabs" class="nav nav-tabs flex-column flex-sm-row" role="tablist">

			<?php if ( $show_popular_posts == 'true' ): ?>

                <li class="flex-sm-fill text-center nav-item"><a class="nav-link" id="popular-tab" data-toggle="tab"
                                                                 role="tab"
                                                                 href="#tab-popular"
                                                                 aria-controls="popular"><?php esc_html_e( 'Popular', 'evolve' ); ?></a>
                </li>

			<?php endif;
			if ( $show_recent_posts == 'true' ): ?>

                <li class="flex-sm-fill text-center nav-item"><a class="nav-link" id="recent-tab" data-toggle="tab"
                                                                 role="tab" href="#tab-recent"
                                                                 aria-controls="recent"><?php esc_html_e( 'Recent', 'evolve' ); ?></a>
                </li>

			<?php endif;
			if ( $show_comments == 'true' ): ?>

                <li class="flex-sm-fill text-center nav-item"><a class="nav-link" id="comments-tab" data-toggle="tab"
                                                                 role="tab"
                                                                 href="#tab-comments"
                                                                 aria-controls="comments"><?php esc_html_e( 'Comments', 'evolve' ); ?></a>
                </li>

			<?php endif; ?>

        </ul>
        <div class="tab-content">

			<?php if ( $show_popular_posts == 'true' ): ?>

                <div id="tab-popular" class="tab-pane fade" role="tabpanel" aria-labelledby="popular-tab">

					<?php
					if ( $orderby == 'Highest Comments' ) {
						$order_string = '&orderby=comment_count';
					} else {
						$order_string = '&meta_key=evolve_post_views_count&orderby=meta_value_num';
					}
					$popular_posts = new WP_Query( 'showposts=' . $posts . $order_string . '&order=DESC' );
					if ( $popular_posts->have_posts() ): ?>

                        <ul>

							<?php while ( $popular_posts->have_posts() ): $popular_posts->the_post(); ?>

                                <li>

									<?php if ( has_post_thumbnail() ): ?>

                                        <div class="image">
                                            <a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( 'tabs-img', array( 'itemprop' => 'image' ) ); ?>
                                            </a>
                                        </div>

									<?php endif; ?>

                                    <div class="post-holder">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                        <div class="meta">

											<?php the_time( get_option( 'date_format' ) ); ?>

                                        </div>
                                    </div>
                                </li>

							<?php endwhile; ?>

                        </ul>

					<?php endif; ?>

                </div>

			<?php endif;
			if ( $show_recent_posts == 'true' ): ?>

                <div id="tab-recent" class="tab-pane fade" role="tabpanel" aria-labelledby="recent-tab">

					<?php $recent_posts = new WP_Query( 'showposts=' . $tags_count );
					if ( $recent_posts->have_posts() ): ?>

                        <ul>

							<?php while ( $recent_posts->have_posts() ): $recent_posts->the_post(); ?>

                                <li>

									<?php if ( has_post_thumbnail() ): ?>

                                        <div class="image">
                                            <a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( 'tabs-img', array( 'itemprop' => 'image' ) ); ?>
                                            </a>
                                        </div>

									<?php endif; ?>

                                    <div class="post-holder">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <div class="meta">

											<?php the_time( get_option( 'date_format' ) ); ?>

                                        </div>
                                    </div>
                                </li>

							<?php endwhile; ?>

                        </ul>

					<?php endif; ?>

                </div>

			<?php
			endif;
			if ( $show_comments == 'true' ):
				?>

                <div id="tab-comments" class="tab-pane fade" role="tabpanel" aria-labelledby="comments-tab">
                    <ul>

						<?php
						global $wpdb;
						$recent_comments = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,110) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $number";
						$the_comments    = $wpdb->get_results( $recent_comments );
						foreach ( $the_comments as $comment ) {
							?>

                            <li>
                                <div class="image">

									<?php echo get_avatar( $comment, '50', '', '', array( 'class' => 'rounded-circle' ) ); ?>

                                </div>
                                <div class="post-holder">
                                    <a class="comment-text-side"
                                       href="<?php echo get_permalink( $comment->ID ); ?>#comment-<?php echo $comment->comment_ID; ?>"
                                       title="<?php echo strip_tags( $comment->comment_author ); ?> on <?php echo $comment->post_title; ?>"><?php echo strip_tags( $comment->comment_author ); ?><?php esc_html_e( ' says', 'evolve' ); ?></a>
                                    <div class="meta">

										<?php echo evolve_truncate( 70, strip_tags( $comment->com_excerpt ), true, '...' ); ?>

                                    </div>
                                </div>
                            </li>

						<?php } ?>

                    </ul>
                </div>

			<?php endif; ?>

        </div>

		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['posts']              = stripslashes( wp_filter_post_kses( addslashes( $new_instance['posts'] ) ) );
		$instance['comments']           = stripslashes( wp_filter_post_kses( addslashes( $new_instance['comments'] ) ) );
		$instance['tags']               = stripslashes( wp_filter_post_kses( addslashes( $new_instance['tags'] ) ) );
		$instance['show_popular_posts'] = $new_instance['show_popular_posts'];
		$instance['show_recent_posts']  = $new_instance['show_recent_posts'];
		$instance['show_comments']      = $new_instance['show_comments'];
		$instance['show_tags']          = $new_instance['show_tags'];
		$instance['orderby']            = $new_instance['orderby'];

		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'posts'              => '3',
			'comments'           => '3',
			'tags'               => '3',
			'show_popular_posts' => 'on',
			'show_recent_posts'  => 'on',
			'show_comments'      => 'on',
			'show_tags'          => 'on',
			'orderby'            => 'Highest Comments'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php esc_html_e( 'Popular Posts Order By', 'evolve' ); ?>
                :</label>
            <select id="<?php echo $this->get_field_id( 'orderby' ); ?>"
                    name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat" style="width:100%;">
                <option <?php
				if ( 'Highest Comments' == $instance['orderby'] ) {
					echo 'selected="selected"';
				}
				?>><?php esc_html_e( 'Highest Comments', 'evolve' ); ?></option>
                <option <?php
				if ( 'Highest Views' == $instance['orderby'] ) {
					echo 'selected="selected"';
				}
				?>><?php esc_html_e( 'Highest Views', 'evolve' ); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'posts' ); ?>"><?php esc_html_e( 'Number of popular posts', 'evolve' ); ?>
                :</label>
            <input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id( 'posts' ); ?>"
                   name="<?php echo $this->get_field_name( 'posts' ); ?>" value="<?php echo $instance['posts']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'tags' ); ?>"><?php esc_html_e( 'Number of recent posts', 'evolve' ); ?>
                :</label>
            <input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id( 'tags' ); ?>"
                   name="<?php echo $this->get_field_name( 'tags' ); ?>" value="<?php echo $instance['tags']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'comments' ); ?>"><?php esc_html_e( 'Number of comments', 'evolve' ); ?>
                :</label>
            <input class="widefat" type="text" style="width: 30px;"
                   id="<?php echo $this->get_field_id( 'comments' ); ?>"
                   name="<?php echo $this->get_field_name( 'comments' ); ?>"
                   value="<?php echo $instance['comments']; ?>"/>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance['show_popular_posts'], 'on' ); ?>
                   id="<?php echo $this->get_field_id( 'show_popular_posts' ); ?>"
                   name="<?php echo $this->get_field_name( 'show_popular_posts' ); ?>"/>
            <label for="<?php echo $this->get_field_id( 'show_popular_posts' ); ?>"><?php esc_html_e( 'Show popular posts', 'evolve' ); ?></label>
            <br/>
            <input class="checkbox" type="checkbox" <?php checked( $instance['show_recent_posts'], 'on' ); ?>
                   id="<?php echo $this->get_field_id( 'show_recent_posts' ); ?>"
                   name="<?php echo $this->get_field_name( 'show_recent_posts' ); ?>"/>
            <label for="<?php echo $this->get_field_id( 'show_recent_posts' ); ?>"><?php esc_html_e( 'Show recent posts', 'evolve' ); ?></label>
            <br/>
            <input class="checkbox" type="checkbox" <?php checked( $instance['show_comments'], 'on' ); ?>
                   id="<?php echo $this->get_field_id( 'show_comments' ); ?>"
                   name="<?php echo $this->get_field_name( 'show_comments' ); ?>"/>
            <label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php esc_html_e( 'Show comments', 'evolve' ); ?></label>
        </p>

		<?php
	}
}

register_widget( 'evolve_Tabs_Widget' );