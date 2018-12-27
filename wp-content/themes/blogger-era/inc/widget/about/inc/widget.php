<?php
/**
 * Plugin widgets.
 *
 * @package Blogger_Era
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Blog_Era_Promo.
 *
 * @since 1.0.0
 */
class Blogger_Era_Promo extends WP_Widget {

	/**
	 * Sets up a new widget instance.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Widget options.
		$opts = array(
			'classname'                   => 'about-us',
			'description'                 => __( 'A widget that displays about me section', 'blogger-era' ),
			'customize_selective_refresh' => true,
			);

		parent::__construct( 'blogger-era', __( 'Blogger Era: About Me', 'blogger-era' ), $opts );

	}

	function widget( $args, $instance ) {	
		$title = ! empty( $instance['title'] ) ? esc_html($instance['title']) : '';
		$image_url = ! empty( $instance['image_url'] ) ? esc_url($instance['image_url']) : '';
		$name = ! empty( $instance['name'] ) ? esc_html($instance['name']) : '';		
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';


        echo $args['before_widget'];  
		?>
			<div class="about-us-content-wrapper">
				<?php if( !empty( $title) ) : ?>
					<h2 class="widget-title"><?php echo esc_html( $title );?></h2>
				<?php endif;?>
				<div class="about-us-wrapper">
					<figure class="author-img">
						<img src="<?php echo esc_url( $image_url);?>">
					</figure>
					<div class="about-us-caption">
						<div class="entry-content">
							<p><?php echo esc_html( $description);?></p>
						</div>
						<div class="author-info">
							<span class="author-name"><?php echo esc_html( $name );?></span>
						</div>
					</div>
				</div>
			</div>
		<?php echo $args['after_widget']; 
	}


	/**
	 * Outputs the widget settings form.
	 *
	 * @since 1.0.0
	 *
	 * @param array $instance Current settings.
	 */
	function form( $instance ) {

		// Defaults.
		$instance = wp_parse_args( (array) $instance, array(
			'title'                 => '',
			'description'           => '',
			'image_url'             => '',
			'name'          		=> '',
			) );
		$image_url = '';
		$image_url  = esc_url( $instance[ 'image_url' ] );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php echo esc_html_e( 'Title:', 'blogger-era' ); ?>:
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
				<?php echo esc_html_e( 'Description', 'blogger-era' ); ?>:
			</label>
			<textarea class="widefat" rows="4" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_textarea( $instance['description'] ); ?></textarea>
		</p>

		<div class="cover-image">
			<label for="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>">
				<?php esc_html_e( 'Cover Image:', 'blogger-era' ); ?>
			</label><br />
			<input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'image_url' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>" value="<?php echo esc_url( $instance['image_url'] ); ?>" /><br />
			<input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'blogger-era' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Cover Photo', 'blogger-era' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'blogger-era' ); ?>" style="margin-top:5px;" />

			<?php
			$image_url = '';

			if ( ! empty( $instance['image_url'] ) ) {

				$image_url = $instance['image_url'];

			}

			$wrap_style = '';

			if ( empty( $image_url ) ) {

				$wrap_style = ' style="display:none;" ';
			}
			?>
			<div class="rtam-preview-wrap" <?php echo esc_attr($wrap_style ); ?>>
				<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Preview', 'blogger-era' ); ?>" style="max-width: 100%;"  />
			</div><!-- .rtam-preview-wrap -->
			
		</div>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>">
				<?php esc_html_e( 'Name', 'blogger-era' ); ?>:
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>" />
		</p>		
		<?php
	}
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title']          = sanitize_text_field( $new_instance['title'] );
		$instance['image_url'] 			= isset($new_instance['image_url']) ? esc_url_raw($new_instance['image_url']) : '';
		$instance['name'] 	= sanitize_text_field( $new_instance['name'] );	

		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['description'] = $new_instance['description'];
		} else {
			$instance['description'] = wp_kses_post( $new_instance['description'] );
		}
		return $instance;

	}
}
