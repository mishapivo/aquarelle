<?php
/**
 * Social Media Widget
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if ( ! class_exists( 'Edumag_Custom_Social_Link_Widget' ) ) :
	/**
	 * Social Media class.
	 *
	 * @since EduMag 0.1
	 */
	class Edumag_Custom_Social_Link_Widget extends WP_Widget {
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'edumag_social_link',
				'description' => esc_html__( 'Enter the url only the icon will be displayed as per the links.', 'edumag' ),
			);
			parent::__construct( 'edumag_social_link',esc_html__('TP : Social Link','edumag'), $widget_ops );
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			// outputs the content of the widget
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$title 	= ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Stay Connected', 'edumag' );

			$open_link  = ! empty( $instance['open_link'] ) ? true : false;
			$target = ( empty( $open_link ) ) ? '' : 'target=_blank';


			echo $args['before_widget'];
				if ( ! empty( $title ) ) {
					echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				}
			$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3; ?>

		   	<ul class="social-icons">
				<?php
				for ( $i=1; $i <= $number ; $i++ ) {
					$link = ( ! empty( $instance['link' . '-' . $i] ) ) ? $instance['link' . '-' . $i] : ''; 
				?>
			        <li><a href="<?php echo esc_url( $link ) . '" ' . esc_attr( $target ); ?> class="icon-animation icon-hover-effect"></a></li>
				<?php } ?>
     		</ul>
		     <div class="clear"></div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			$title     	= isset( $instance['title'] ) ? $instance['title'] : esc_html__( 'Stay Connected', 'edumag' );
			$number 	= isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
			$open_link 	= isset( $instance['open_link'] ) ? $instance['open_link'] : false;
		   ?>

		   <p>
			   <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'edumag' ); ?></label>
			   <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		   </p>

		   <p>
		   	<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of links to show:', 'edumag' ); ?></label>
		   	<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="6" value="<?php echo absint( $number ); ?>" size="3" />
		   </p>

		   <p>
		      <label for="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>"><?php esc_html_e( 'Open in New Tab', 'edumag' ); ?>:</label>
		      <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'open_link' ), 'edumag' ); ?>"  <?php checked( $open_link, true ); ?> />
		    </p>

		   <?php for ( $i=1; $i <= $number; $i++ ) {
		   	$link = isset( $instance['link'. '-' . $i ] ) ? $instance['link' . '-' . $i ] : '';?>
			   <p>
			   	<label for="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>"><?php printf( esc_html__( 'Link %s :', 'edumag' ), $i ); ?></label>
			   	<input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' . '-' . $i ) ); ?>" value="<?php echo esc_url( $link ); ?>"/>
			   </p>
		   <?php }?>

		   <?php
		}

		/**
		* Processing widget options on save
		*
		* @param array $new_instance The new options
		* @param array $old_instance The previous options
		*/
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
			$instance           			= $old_instance;
			$instance['title']  			= sanitize_text_field( $new_instance['title'] );
			$instance['number'] 			= absint( $new_instance['number'] );
			$instance['open_link']       	= edumag_sanitize_checkbox( $new_instance['open_link'] );
			for ( $i=1; $i <= $instance['number']; $i++ ) {
				$instance['link' . '-' . $i] = esc_url_raw( $new_instance['link' . '-' . $i] );
			}
			return $instance;
		}
	}
endif;

function edumag_register_social_link_widget() {
	register_widget( 'Edumag_Custom_Social_Link_Widget' );
}
add_action( 'widgets_init', 'edumag_register_social_link_widget' );