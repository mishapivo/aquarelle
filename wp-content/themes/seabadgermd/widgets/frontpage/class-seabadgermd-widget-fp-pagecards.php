<?php
/**
 * Widget API: Seabadgermd_Widget_Fp_Pagecards - display pages on front page
 */

class Seabadgermd_Widget_Fp_Pagecards extends WP_Widget {

	/**
	 * Sets up a new FrontPage Pagecards widget instance.
	 *
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'seabadgermd_widget_fp_pagecards',
			'description'                 => esc_html__( 'List pages as cards on Front Page', 'seabadgermd' ),
			'customize_selective_refresh' => false,
		);
		parent::__construct( 'seabadgermd-fp-pagecards', esc_html__( 'FrontPage Pagecards', 'seabadgermd' ), $widget_ops );
		$this->alt_option_name = 'seabadgermd_widget_fp_pagecards';
	}

	/**
	 * Outputs the content for the current FrontPage Pagecards widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current FrontPage Pagecards widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		$title         = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$disable_image = isset( $instance['disable_image'] ) ? $instance['disable_image'] : false;
		$pages         = array();
		$pagetext      = array();
		for ( $i = 1; $i < 4; $i++ ) {
			$id    = 'page-' . $i;
			$idtxt = $id . '-text';
			if ( isset( $instance[ $id ] ) && '' !== $instance[ $id ] ) {
				array_push( $pages, (int) $instance[ $id ] );
				$pagetext[ $instance[ $id ] ] = $instance [ $idtxt ] ? $instance [ $idtxt ] : '';
			}
		}

		if ( 0 === count( $pages ) ) {
			return;
		}

		?>
		<?php echo $args['before_widget']; ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		echo '<div class="card-deck post-wrapper">';
		$qargs = array(
			'post_type'   => 'page',
			'post__in'    => $pages,
			'post_status' => 'publish',
			'orderby'     => 'post__in',
		);
		$r     = new WP_Query( apply_filters( 'widget_posts_args', $qargs, $instance ) );

		global $post;
		while ( $r->have_posts() ) {
			$r->the_post();
			if ( '' === $pagetext[ get_the_ID() ] ) {
				$the_text        = wp_strip_all_tags( get_the_content( '', false ) );
				$max_text_length = 340 - ( 80 * ( $limit - 1 ) );
				if ( strlen( $the_text ) > $max_text_length ) {
					$the_text_excerpt = preg_replace( '/[\s\.,][^\s\.,]*$/u', '', substr( $the_text, 0, $max_text_length ) ) . '...';
				} else {
					$the_text_excerpt = $the_text;
				}
			} else {
				$the_text_excerpt = $pagetext[ get_the_ID() ];
			}
		?>
			<div <?php post_class( 'card' ); ?>>
				<?php if ( has_post_thumbnail() && ! $disable_image ) : ?>
					<a href="<?php esc_url( the_permalink() ); ?>"
						title="<?php esc_attr( the_title_attribute() ); ?>"
						class="post-image">
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
					<p class="card-text"><?php echo wp_kses_post( $the_text_excerpt ); ?></p>
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
		}
		echo '</div>';

		wp_reset_postdata();

		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current FrontPage Pagecards widget instance.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                  = $old_instance;
		$instance['title']         = sanitize_text_field( $new_instance['title'] );
		$instance['disable_image'] = isset( $new_instance['disable_image'] ) ? (bool) $new_instance['disable_image'] : false;
		for ( $i = 1; $i < 4; $i++ ) {
			$id                 = 'page-' . $i;
			$idtxt              = $id . '-text';
			$instance[ $id ]    = isset( $new_instance[ $id ] ) ? (int) $new_instance[ $id ] : '';
			$instance[ $idtxt ] = isset( $new_instance[ $idtxt ] ) ? esc_attr( $new_instance[ $idtxt ] ) : '';
		}
		return $instance;
	}

	/**
	 * Outputs the settings form for the FrontPage Pagecards widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title         = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$disable_image = isset( $instance['disable_image'] ) ? (bool) $instance['disable_image'] : false;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'seabadgermd' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php
		for ( $i = 1; $i < 4; $i++ ) {
			$id       = 'page-' . $i;
			$idtxt    = $id . '-text';
			$value    = isset( $instance[ $id ] ) ? (int) $instance[ $id ] : '';
			$valuetxt = isset( $instance[ $idtxt ] ) ? $instance[ $idtxt ] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>">
				<?php printf( esc_html__( 'Page on card %d:', 'seabadgermd' ), absint( $i ) ); ?>
			</label>
			<?php
				$pargs = array(
					'selected'         => $value,
					'echo'             => 1,
					'name'             => $this->get_field_name( $id ),
					'id'               => $this->get_field_id( $id ),
					'class'            => '',
					'show_option_none' => esc_html__( 'Skip this card', 'seabadgermd' ),
				);
			?>
			<?php wp_dropdown_pages( $pargs ); ?>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $idtxt ) ); ?>">
				<?php printf( esc_html__( 'Card text of page card %d:', 'seabadgermd' ), absint( $i ) ); ?>
			</label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( $idtxt ) ); ?>"
			class="widefat"
			id="<?php echo esc_attr( $this->get_field_id( $idtxt ) ); ?>"
			value="<?php echo esc_html( $valuetxt ); ?>">
		</p>
		<?php
		}
		?>

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
