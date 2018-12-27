<?php
/**
 * Widget API: WP_Widget_Archives class redesigned for SeabadgerMD
 */

class Seabadgermd_Widget_Archives extends WP_Widget {

	/**
	 * Sets up a new Archives widget instance.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'seabadgermd_widget_archives',
			'description' => esc_html__( 'A monthly archive of your site&#8217;s Posts.', 'seabadgermd' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'seabadgermd_widget_archives', esc_html__( 'Archives [SeabadgerMD]', 'seabadgermd' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Archives widget instance.
	 *
	 * @param array $args        Display arguments including 'before_title', 'after_title',
	 *                                              'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Archives widget instance.
	 */
	public function widget( $args, $instance ) {
		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';
		$limit = ! empty( $instance['limit'] ) ? absint( $instance['limit'] ) : 12;
		if ( ! $limit ) {
			$limit = 12;
		};

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Archives', 'seabadgermd' ) : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		if ( $d ) {
			$dropdown_id = "{$this->id_base}-dropdown-{$this->number}";
			?>
		<label class="screen-reader-text sr-only" for="<?php echo esc_attr( $dropdown_id ); ?>">
			<?php echo esc_html( $title ); ?>
		</label>
		<!-- <select id="<?php echo esc_attr( $dropdown_id ); ?>" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> -->
			<?php
			/**
			 * Filters the arguments for the Archives widget drop-down.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_get_archives()
			 *
			 * @param array $args An array of Archives widget drop-down arguments.
			 */
			$dropdown_args = apply_filters(
				'widget_archives_dropdown_args', array(
					'type'                      => 'monthly',
					'format'                    => 'custom',
					'after' => ',',
					'show_post_count' => $c,
					'limit' => $limit,
					'echo' => 0,
				)
			);

			switch ( $dropdown_args['type'] ) {
				case 'yearly':
					$label = __( 'Select Year', 'seabadgermd' );
					break;
				case 'monthly':
					$label = __( 'Select Month', 'seabadgermd' );
					break;
				case 'daily':
					$label = __( 'Select Day', 'seabadgermd' );
					break;
				case 'weekly':
					$label = __( 'Select Week', 'seabadgermd' );
					break;
				default:
					$label = __( 'Select Post', 'seabadgermd' );
					break;
			}
			?>
			<div class="btn-group archive-dropdown" id="<?php echo esc_attr( $dropdown_id ); ?>">
				<button class="btn themecolor dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo esc_attr( $label ); ?>
				</button>
				<div class="dropdown-menu">
				<?php
					$getarch = wp_get_archives( $dropdown_args );
					$archives = explode( ',', $getarch );
				foreach ( $archives as $archive ) {
					$link = preg_replace( '/(<a.*a>).*/', '$1', $archive );
					$link = str_replace( '<a ', '<a class="dropdown-item archive-item" ', $link );
					$count = preg_replace( '/.*\((.*)\).*/', '$1', $archive );
					if ( '' !== $count && $count !== $archive ) {
						$link = str_replace( '</a>', ' <span class="badge badge-pill themecolor archive_count_badge">' . $count . '</span></a>', $link );
					}
					echo $link;
				}
				?>
				</div>
			</div>
		<?php } else { ?>
		<ul>
		<?php
		/**
		 * Filters the arguments for the Archives widget.
		 *
		 * @since 2.8.0
		 *
		 * @see wp_get_archives()
		 *
		 * @param array $args An array of Archives option arguments.
		 */
		wp_get_archives(
			apply_filters(
				'widget_archives_args', array(
					'type'          => 'monthly',
					'show_post_count' => $c,
					'limit' => $limit,
				)
			)
		);
		?>
		</ul>
		<?php
} // End if().

		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Archives widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                                                      WP_Widget_Archives::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args(
			(array) $new_instance, array(
				'title' => '',
				'count' => 0,
				'dropdown' => '',
			)
		);
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['count'] = $new_instance['count'] ? 1 : 0;
		$instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;
		$instance['limit'] = (int) $new_instance['limit'];

		return $instance;
	}

	/**
	 * Outputs the settings form for the Archives widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance, array(
				'title' => '',
				'count' => 0,
				'dropdown' => '',
			)
		);
		$title = sanitize_text_field( $instance['title'] );
		$limit = isset( $instance['limit'] ) ? absint( $instance['limit'] ) : 12;
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php esc_html__( 'Title:', 'seabadgermd' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['dropdown'] ); ?>
			id="<?php echo $this->get_field_id( 'dropdown' ); ?>"
			name="<?php echo $this->get_field_name( 'dropdown' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'dropdown' ); ?>">
				<?php esc_html_e( 'Display as dropdown', 'seabadgermd' ); ?>
			</label>
			<br/>
			<input class="checkbox" type="checkbox"<?php checked( $instance['count'] ); ?>
			id="<?php echo $this->get_field_id( 'count' ); ?>"
			name="<?php echo $this->get_field_name( 'count' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'count' ); ?>">
				<?php echo esc_html_e( 'Show post counts', 'seabadgermd' ); ?>
			</label>
			<br/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
				<?php echo esc_html__( 'Limit displayed items to:', 'seabadgermd' ); ?>
			</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'limit' ); ?>"
			name="<?php echo $this->get_field_name( 'limit' ); ?>"
			type="number" step="1" min="1" value="<?php echo intval( $limit ); ?>" size="3" /></p>
		</p>
		<?php
	}
}
