<?php
/**
 * Widget Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-land
 */
?>
<?php

if( ! function_exists('businesss_land_widget_register') ):
	
	function businesss_land_widget_register(){
	
		register_widget( 'Businessland_Quote_Widget' );
		register_widget( 'Businessland_Service_Widget' );
		register_widget( 'Businessland_Counter' );
		register_widget( 'Businessland_Blog' );
		register_widget( 'Businessland_Project' );
		register_widget( 'Businessland_Aboutus_Widget' );
	}

endif;

add_action('widgets_init', 'businesss_land_widget_register');


if( !class_exists( 'Businessland_Quote_Widget' ) ):

	class Businessland_Quote_Widget extends WP_Widget{
	
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			parent::__construct(
				'businessland_quote_widget', // Base ID
				esc_html__( 'Get A Quote', 'business-land' ), // Name
				array( 'description' => esc_html__( 'Get A Quote Widget', 'business-land' ) ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		 $businessland_quote_title = ! empty( $instance['businessland_quote_title'] ) ? $instance['businessland_quote_title'] : '';
		 $businessland_quote_btn_label = ! empty( $instance['businessland_quote_btn_label'] ) ? $instance['businessland_quote_btn_label'] : '';
		 $businessland_quote_btn_url = ! empty( $instance['businessland_quote_btn_url'] ) ? $instance['businessland_quote_btn_url'] : '';
		 $business_quote_bg_image = ! empty( $instance['business_quote_bg_image'] ) ? $instance['business_quote_bg_image'] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'businessland_quote_title' ) ); ?>"><?php esc_attr_e( 'Get A Quote Title:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'businessland_quote_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'businessland_quote_title' ) ); ?>" type="text" value="<?php echo esc_attr( $businessland_quote_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'businessland_quote_btn_label' ) ); ?>"><?php esc_attr_e( 'Button Label:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'businessland_quote_btn_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'businessland_quote_btn_label' ) ); ?>" type="text" value="<?php echo esc_attr( $businessland_quote_btn_label ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'businessland_quote_btn_url' ) )?>"><?php esc_attr_e( 'Quote Link: ', 'business-land' )?></label>
			<?php
				$page_id = array(
					'hierarchical' => 1,
					'sort_order' => 'asc',
					'parent' => -1,
					'exclude_tree' => '',
					'name' => $this->get_field_name( 'businessland_quote_btn_url' ),
					'post_type' => 'page',
					'value_field' => 'ID',
					'post_status' => 'publish',
					'id'	=> $this->get_field_id( 'businessland_quote_btn_url' ),
					'selected'	=> absint( $businessland_quote_btn_url )
				); 
				wp_dropdown_pages( wp_kses_post( $page_id ) );
			?>
		</p>
		<div class="cover-image" style="margin-bottom:10px">
			<label for="<?php echo esc_attr( $this->get_field_id( 'business_quote_bg_image' ) ); ?>"><?php esc_attr_e( 'Background Image:', 'business-land' ); ?></label> 
			<input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'business_quote_bg_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'business_quote_bg_image' ) ); ?>" value="<?php echo esc_url( $business_quote_bg_image ); ?>" style="margin-top:5px;">
		   <input type="button" class="select-img button button-primary promobox-upload-btn" value="<?php esc_attr_e( 'Upload', 'business-land' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'business-land' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'business-land' ); ?>" />
			<input type="button" value="<?php esc_attr_e( 'Remove', 'business-land' ); ?>" class="button button-secondary btn-image-remove promobox-remove-btn"/>
    	</div>
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['businessland_quote_title'] = ( ! empty( $new_instance['businessland_quote_title'] ) ) ? sanitize_text_field( $new_instance['businessland_quote_title'] ) : '';
			$instance['businessland_quote_btn_label'] = ( ! empty( $new_instance['businessland_quote_btn_label'] ) ) ? sanitize_text_field( $new_instance['businessland_quote_btn_label'] ) : '';
			$instance['businessland_quote_btn_url'] = absint( $new_instance[ 'businessland_quote_btn_url' ] );
			$instance['business_quote_bg_image'] = ( ! empty( $new_instance['business_quote_bg_image'] ) ) ? esc_url_raw( $new_instance['business_quote_bg_image'] ) : '';
			
			return $instance;
		}
		
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $businessland_quote_title = ! empty( $instance['businessland_quote_title'] ) ? $instance['businessland_quote_title'] : '';
		 $businessland_quote_btn_label = ! empty( $instance['businessland_quote_btn_label'] ) ? $instance['businessland_quote_btn_label'] : '';
		 $businessland_quote_btn_url = ! empty( $instance['businessland_quote_btn_url'] ) ? $instance['businessland_quote_btn_url'] : '';
		 $business_quote_bg_image = ! empty( $instance['business_quote_bg_image'] ) ? $instance['business_quote_bg_image'] : '';
		?>
		
		<section class="quote-section p-100"<?php if ( !empty( $business_quote_bg_image ) ) : ?> style="background-image:url('<?php echo esc_url( $business_quote_bg_image ); ?>');" <?php endif; ?> <?php if( !empty( $business_quote_bg_image ) ): ?>data-stellar-background-ratio="0.5"<?php endif; ?>>
			<span class="theme-opacity"></span>
			<div class="container">
				<div class="row quote-wrapper">
					<div class="col-lg-10">
						<div class="title-wrap">
							<h3 class="quote-title text-white"><?php echo esc_html( $businessland_quote_title ); ?></h3>
						</div>
					</div>
					<?php 
					$args = array(
							'post_type' => 'page',
							'posts_per_page'        => 2,
							'ignore_sticky_posts'   => true,
							'post_status'		   	=> 'publish',
							'post__in'				=> array( $businessland_quote_btn_url )
					);
					$post_query = new WP_Query( $args );
						
					if( $post_query->have_posts() ):
						while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
							<div class="col-lg-2">
								<div class="button-wrap">
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="quote-btn btn bg-white theme-color hv-default"><?php echo esc_html( $businessland_quote_btn_label );?></a>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					endif; ?>													
				</div>
			</div>
		</section>
		<?php }
	
	}
	
endif;

if( !class_exists( 'Businessland_Service_Widget' ) ):

	class Businessland_Service_Widget extends WP_Widget{
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			parent::__construct(
				'businessland_service_widget', // Base ID
				esc_html__( 'Our Service', 'business-land' ), // Name
				array( 'description' => esc_html__( 'Service Widget', 'business-land' ) ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		 public function form( $instance ){
		 
		 	$service_section_title 			= ! empty( $instance['service_section_title'] ) ? $instance['service_section_title'] : '';
			$service_section_sub_title 		= ! empty( $instance['service_section_sub_title'] ) ? $instance['service_section_sub_title'] : '';
			$service_section_post_item 		= ! empty( $instance['service_section_post_item'] ) ? $instance['service_section_post_item'] : '';
			$service_section_post_excerpt 	= ! empty( $instance['service_section_post_excerpt'] ) ? $instance['service_section_post_excerpt'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'service_section_title' ) ); ?>"><?php esc_attr_e( 'Section Title:', 'business-land' ); ?></label>
				<?php
					$post_cat = array(
						'orderby'		=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'service_section_title' ),
						'name'	=> $this->get_field_name( 'service_section_title' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $service_section_title ),
						'show_option_all'	=> esc_html__( 'Choose Category', 'business-land' )
					);
					wp_dropdown_categories( $post_cat );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'service_section_sub_title' ) ); ?>"><?php esc_attr_e( 'Section Sub Title:', 'business-land' ); ?></label> 
				<input class="checkbox" type="checkbox" <?php checked( $service_section_sub_title ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'service_section_sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'service_section_sub_title' ) ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'service_section_post_item' ) )?>"><?php esc_attr_e( 'Number Of Post: ', 'business-land' )?></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'service_section_post_item' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'service_section_post_item' ) ); ?>" value="<?php echo esc_attr( $service_section_post_item ); ?>" min="1" max="9" class="widefat">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'service_section_post_excerpt' ) )?>"><?php esc_attr_e( 'Excerpt: ', 'business-land' )?></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'service_section_post_excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'service_section_post_excerpt' ) ); ?>" value="<?php echo esc_attr( $service_section_post_excerpt ); ?>" min="1" max="100" class="widefat">
			</p>
			
		<?php }
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		 public function update( $new_instance, $old_instance ) {
		 
		 	$instance = array();
			$instance['service_section_title'] 			= absint( $new_instance[ 'service_section_title' ] );
			$instance['service_section_sub_title'] 		= (bool) $new_instance['service_section_sub_title'] ? 1 : 0;
			$instance['service_section_post_item'] 		= absint( $new_instance[ 'service_section_post_item' ] );
			$instance['service_section_post_excerpt'] 	= absint( $new_instance[ 'service_section_post_excerpt' ] );
			return $instance;
		 }
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		  public function widget( $args, $instance ) {
		  
		  	$service_section_title 			= ! empty( $instance['service_section_title'] ) ? $instance['service_section_title'] : '';
			$service_section_sub_title 		= ! empty( $instance['service_section_sub_title'] ) ? $instance['service_section_sub_title'] : '';
			$service_section_post_item 		= ! empty( $instance['service_section_post_item'] ) ? $instance['service_section_post_item'] : 2;
			$service_section_post_excerpt 	= ! empty( $instance['service_section_post_excerpt'] ) ? $instance['service_section_post_excerpt'] : 5;
			//echo get_cat_name($service_section_title); echo category_description( $service_section_title );
		?>
		<section class="service-section featurebox p-100 pb-1 bg-white">
		 	<div class="container">
				<?php if( !empty($service_section_title) ): ?>
					<div class="row title-wrap">
						<div class="col-md-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center"><?php echo esc_html( get_cat_name($service_section_title) ); ?></h2>
								<?php if( $service_section_sub_title ): ?>
									<p class="sub-title mb-0"><?php echo wp_kses_post( category_description( $service_section_title ) ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row content-wrap pt-5">
					<?php
						$args = array(
							'post_type' 			=> 'post',
							'posts_per_page' 		=> absint( $service_section_post_item ),
							'ignore_sticky_posts' 	=> true,
							'post_status'		  	=> 'publish',
							'cat'					=> absint( $service_section_title )
						);
						$post_query = new WP_Query( $args );
						
						if( $post_query->have_posts() ):
							while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
								<div class="col-lg-4 col-md-6">
									<div class="featurebox-wrapper">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="featurebox-icon">
												<?php the_post_thumbnail('thumbnail'); ?>
											</div>
										<?php endif; ?>
										<div class="featurebox-body">
											<div class="featurebox-title">
												<?php the_title('<h5 class="title">', '</h5>'); ?>
											</div>
											<div class="featurebox-content">
												<p class="content"><?php printf( esc_html( wp_trim_words( get_the_content(), $service_section_post_excerpt, '' ) ) ); ?></p>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile;
							wp_reset_postdata();
						endif; ?>
				</div>
			</div>
		</section>
		<?php }
		 
	}
endif;

if( !class_exists( 'Businessland_Counter' ) ):

	class Businessland_Counter extends WP_Widget{
	
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			parent::__construct(
				'businessland_counter', // Base ID
				esc_html__( 'Counter', 'business-land' ), // Name
				array( 'description' => esc_html__( 'Counter Widget', 'business-land' ) ) // Args
			);
		}
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		 public function form( $instance ){
	
			$counter_one_title = ! empty( $instance['counter_one_title'] ) ? $instance['counter_one_title'] : '';
			$counter_one_count = ! empty( $instance['counter_one_count'] ) ? $instance['counter_one_count'] : '';
			$counter_one_icon  = ! empty( $instance['counter_one_icon'] ) ? $instance['counter_one_icon'] : '';
			$counter_two_title = ! empty( $instance['counter_two_title'] ) ? $instance['counter_two_title'] : '';
			$counter_two_count = ! empty( $instance['counter_two_count'] ) ? $instance['counter_two_count'] : '';
			$counter_two_icon  = ! empty( $instance['counter_two_icon'] ) ? $instance['counter_two_icon'] : '';
			$counter_three_title = ! empty( $instance['counter_three_title'] ) ? $instance['counter_three_title'] : '';
			$counter_three_count = ! empty( $instance['counter_three_count'] ) ? $instance['counter_three_count'] : '';
			$counter_three_icon  = ! empty( $instance['counter_three_icon'] ) ? $instance['counter_three_icon'] : '';
			$counter_four_title = ! empty( $instance['counter_four_title'] ) ? $instance['counter_four_title'] : '';
			$counter_four_count = ! empty( $instance['counter_four_count'] ) ? $instance['counter_four_count'] : '';
			$counter_four_icon  = ! empty( $instance['counter_four_icon'] ) ? $instance['counter_four_icon'] : '';
			$counter_bg_image  = ! empty( $instance['counter_bg_image'] ) ? $instance['counter_bg_image'] : '';
		?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_one_title' ) ); ?>"><?php esc_attr_e( 'Counter 1 Title', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_one_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_one_title' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_one_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_one_count' ) ); ?>"><?php esc_attr_e( 'Counter 1 Count:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_one_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_one_count' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_one_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_one_icon' ) ); ?>"><?php esc_attr_e( 'Counter 1 Icon:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_one_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_one_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_one_icon ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_two_title' ) ); ?>"><?php esc_attr_e( 'Counter 2 Title', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_two_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_two_title' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_two_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_two_count' ) ); ?>"><?php esc_attr_e( 'Counter 2 Count:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_two_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_two_count' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_two_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_two_icon' ) ); ?>"><?php esc_attr_e( 'Counter 2 Icon:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_two_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_two_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_two_icon ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_three_title' ) ); ?>"><?php esc_attr_e( 'Counter 3 Title', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_three_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_three_title' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_three_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_three_count' ) ); ?>"><?php esc_attr_e( 'Counter 3 Count:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_three_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_three_count' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_three_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_three_icon' ) ); ?>"><?php esc_attr_e( 'Counter 3 Icon:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_three_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_three_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_three_icon ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_four_title' ) ); ?>"><?php esc_attr_e( 'Counter 4 Title', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_four_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_four_title' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_four_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_four_count' ) ); ?>"><?php esc_attr_e( 'Counter 4 Count:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_four_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_four_count' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_four_count ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_four_icon' ) ); ?>"><?php esc_attr_e( 'Counter 4 Icon:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'counter_four_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counter_four_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $counter_four_icon ); ?>">
		</p>
		<div class="cover-image" style="margin-bottom:10px">
			<label for="<?php echo esc_attr( $this->get_field_id( 'counter_bg_image' ) ); ?>"><?php esc_attr_e( 'Background Image:', 'business-land' ); ?></label> 
			<input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'counter_bg_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'counter_bg_image' ) ); ?>" value="<?php echo esc_url( $counter_bg_image ); ?>" style="margin-top:5px;">
		   <input type="button" class="select-img button button-primary promobox-upload-btn" value="<?php esc_attr_e( 'Upload', 'business-land' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'business-land' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'business-land' ); ?>" />
			<input type="button" value="<?php esc_attr_e( 'Remove', 'business-land' ); ?>" class="button button-secondary btn-image-remove promobox-remove-btn"/>
    	</div>

		<?php }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['counter_one_title'] = ( ! empty( $new_instance['counter_one_title'] ) ) ? sanitize_text_field( $new_instance['counter_one_title'] ) : '';
			$instance['counter_one_count'] = ( ! empty( $new_instance['counter_one_count'] ) ) ? sanitize_text_field( $new_instance['counter_one_count'] ) : '';
			$instance['counter_one_icon'] = ( ! empty( $new_instance['counter_one_icon'] ) ) ? sanitize_text_field( $new_instance['counter_one_icon'] ) : '';
			$instance['counter_two_title'] = ( ! empty( $new_instance['counter_two_title'] ) ) ? sanitize_text_field( $new_instance['counter_two_title'] ) : '';
			$instance['counter_two_count'] = ( ! empty( $new_instance['counter_two_count'] ) ) ? sanitize_text_field( $new_instance['counter_two_count'] ) : '';
			$instance['counter_two_icon'] = ( ! empty( $new_instance['counter_two_icon'] ) ) ? sanitize_text_field( $new_instance['counter_two_icon'] ) : '';
			$instance['counter_three_title'] = ( ! empty( $new_instance['counter_three_title'] ) ) ? sanitize_text_field( $new_instance['counter_three_title'] ) : '';
			$instance['counter_three_count'] = ( ! empty( $new_instance['counter_three_count'] ) ) ? sanitize_text_field( $new_instance['counter_three_count'] ) : '';
			$instance['counter_three_icon'] = ( ! empty( $new_instance['counter_three_icon'] ) ) ? sanitize_text_field( $new_instance['counter_three_icon'] ) : '';
			$instance['counter_four_title'] = ( ! empty( $new_instance['counter_four_title'] ) ) ? sanitize_text_field( $new_instance['counter_four_title'] ) : '';
			$instance['counter_four_count'] = ( ! empty( $new_instance['counter_four_count'] ) ) ? sanitize_text_field( $new_instance['counter_four_count'] ) : '';
			$instance['counter_four_icon'] = ( ! empty( $new_instance['counter_four_icon'] ) ) ? sanitize_text_field( $new_instance['counter_four_icon'] ) : '';
			$instance['counter_bg_image'] = ( ! empty( $new_instance['counter_bg_image'] ) ) ? esc_url_raw( $new_instance['counter_bg_image'] ) : '';
			return $instance;
		}
		
		/**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 	$counter_one_title = ! empty( $instance['counter_one_title'] ) ? $instance['counter_one_title'] : '';
			$counter_one_count = ! empty( $instance['counter_one_count'] ) ? $instance['counter_one_count'] : '';
			$counter_one_icon  = ! empty( $instance['counter_one_icon'] ) ? $instance['counter_one_icon'] : '';
			$counter_two_title = ! empty( $instance['counter_two_title'] ) ? $instance['counter_two_title'] : '';
			$counter_two_count = ! empty( $instance['counter_two_count'] ) ? $instance['counter_two_count'] : '';
			$counter_two_icon  = ! empty( $instance['counter_two_icon'] ) ? $instance['counter_two_icon'] : '';
			$counter_three_title = ! empty( $instance['counter_three_title'] ) ? $instance['counter_three_title'] : '';
			$counter_three_count = ! empty( $instance['counter_three_count'] ) ? $instance['counter_three_count'] : '';
			$counter_three_icon  = ! empty( $instance['counter_three_icon'] ) ? $instance['counter_three_icon'] : '';
			$counter_four_title = ! empty( $instance['counter_four_title'] ) ? $instance['counter_four_title'] : '';
			$counter_four_count = ! empty( $instance['counter_four_count'] ) ? $instance['counter_four_count'] : '';
			$counter_four_icon  = ! empty( $instance['counter_four_icon'] ) ? $instance['counter_four_icon'] : '';
			$counter_bg_image  = ! empty( $instance['counter_bg_image'] ) ? $instance['counter_bg_image'] : '';
		
		?>
		
		<section class="counter-section p-100 text-white"<?php if ( !empty( $counter_bg_image ) ) : ?> style="background-image:url('<?php echo esc_url( $counter_bg_image ); ?>');" <?php endif; ?> <?php if( !empty( $counter_bg_image ) ): ?>data-stellar-background-ratio="0.5"<?php endif; ?>>
			<span class="theme-opacity"></span>
			<div class="container">
				<div class="row counter-wrapper text-center">
					
					<div class="col-md-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $counter_one_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $counter_one_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $counter_one_title );?></h6>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $counter_two_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $counter_two_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $counter_two_title );?></h6>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $counter_three_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $counter_three_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $counter_three_title );?></h6>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="counter-item">
							<div class="counter-icon">
								<i class="<?php echo esc_attr( $counter_four_icon );?>"></i>
							</div>
							<div class="counter">
								<span class="count"><?php echo esc_html( $counter_four_count );?></span>
							</div>
							<div class="counter-title">
								<h6 class="title"><?php echo esc_html( $counter_four_title );?></h6>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<?php }
	} 
endif;

if( !class_exists( 'Businessland_Blog' ) ):

	class Businessland_Blog extends WP_Widget{
	
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			parent::__construct(
				'businessland_blog_widget', // Base ID
				esc_html__( 'Latest Blog', 'business-land' ), // Name
				array( 'description' => esc_html__( 'Latest Blog Widget', 'business-land' ) ) // Args
			);
		}
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		 $blog_section_title = ! empty( $instance['blog_section_title'] ) ? $instance['blog_section_title'] : '';
		 $blog_section_sub_title = ! empty( $instance['blog_section_sub_title'] ) ? $instance['blog_section_sub_title'] : '';
		 $blog_post_cat = ! empty( $instance[ 'blog_post_cat' ] ) ? $instance[ 'blog_post_cat' ] : '';
		 $blog_post_item = ! empty( $instance['blog_post_item'] ) ? $instance['blog_post_item'] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'blog_section_title' ) ); ?>"><?php esc_attr_e( 'Section Title:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'blog_section_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog_section_title' ) ); ?>" type="text" value="<?php echo esc_attr( $blog_section_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'blog_section_sub_title' ) ); ?>"><?php esc_attr_e( 'Sub Title:', 'business-land' ); ?></label> 
			<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'blog_section_sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('blog_section_sub_title') ); ?>"><?php echo esc_html( $blog_section_sub_title ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'blog_post_cat' ) ); ?>"><?php esc_attr_e( 'Post Category:', 'business-land' ); ?></label>
			<?php
				$post_cat = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 0,
					'id'	=> $this->get_field_id( 'blog_post_cat' ),
					'name'	=> $this->get_field_name( 'blog_post_cat' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $blog_post_cat ),
					'show_option_all'	=> esc_html__( 'Choose Category', 'business-land' )
				);
				wp_dropdown_categories( $post_cat );
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'blog_post_item' ) )?>"><?php esc_attr_e( 'Number Of Post: ', 'business-land' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'blog_post_item' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'blog_post_item' ) ); ?>" value="<?php echo esc_attr( $blog_post_item ); ?>" min="1" max="4" class="widefat">
		</p>
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['blog_section_title'] = ( ! empty( $new_instance['blog_section_title'] ) ) ? sanitize_text_field( $new_instance['blog_section_title'] ) : '';
			$instance['blog_section_sub_title'] = ( ! empty( $new_instance['blog_section_sub_title'] ) ) ? sanitize_textarea_field( $new_instance['blog_section_sub_title'] ) : '';
			$instance['blog_post_cat'] = absint( $new_instance[ 'blog_post_cat' ] );
			$instance['blog_post_item'] = absint( $new_instance[ 'blog_post_item' ] );
			
			return $instance;
		}
		
		/**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $blog_section_title = ! empty( $instance['blog_section_title'] ) ? $instance['blog_section_title'] : '';
		 $blog_section_sub_title = ! empty( $instance['blog_section_sub_title'] ) ? $instance['blog_section_sub_title'] : '';
		 $blog_post_cat = ! empty( $instance[ 'blog_post_cat' ] ) ? $instance[ 'blog_post_cat' ] : '';
		 $blog_post_item = ! empty( $instance[ 'blog_post_item' ] ) ? absint( $instance[ 'blog_post_item' ] ) : 3 ;
		 
		?>
		
		<section class="latest-blog-section p-100 pb-75">
			<div class="container">
				<?php if( !empty( $blog_section_title ) ): ?>
					<div class="row title-wrap">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center"><?php echo esc_html( $blog_section_title );?></h2>
								<p class="sub-title mb-0"><?php echo esc_html( $blog_section_sub_title ); ?></p>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row content-wrap pt-5">
				
				<?php if( $blog_post_item == '4' ){
							$size = 'col-lg-3';
				
						}elseif( $blog_post_item == '3' ){
							$size = 'col-lg-4';
						}elseif( $blog_post_item == '2' ){
							$size = 'col-lg-6';
						}else{
							$size = 'col-lg-12';
						}
				$args = array(
						'post_type' => 'post',
						'posts_per_page'        => absint( $blog_post_item ),
						'ignore_sticky_posts'   => true,
						'post_status'		   => 'publish',
						'cat'					=> absint( $blog_post_cat )
				);
				$post_query = new WP_Query( $args );
						
				if( $post_query->have_posts() ):
					while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
						
						<div class="<?php echo esc_attr( $size ); ?>">
							<article id="post-<?php the_ID(); ?>" <?php post_class('post-item mb-30'); ?>>
								<div class="post-inner-wrapper">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="post-thumbnail pb-0">
											<span class="bg-overlay-light"></span>
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
										</div>
									<?php endif; ?>
									<div class="post-body-wrapper clearfix bg-white">
										<div class="entry-header mb-0">
											<?php the_title( '<h5 class="entry-title mb-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
											<ul class="post-meta mb-0 mt-2">
												<li class="post-author list-inline-item">
													<?php business_land_post_author(); ?>
												</li>
												<li class="post-date list-inline-item">
													<?php business_land_post_date(); ?>
												</li>
											</ul>
										</div>
										<div class="entry-content mt-0">
											<p class="read-more mb-0">
												<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-btn rounded-circle"><i class="icon-arrow-right"></i></a>
											</p>
										</div>
									</div>
								</div>
							</article>
						</div>
					
					<?php endwhile;
					
					wp_reset_postdata();
					 
				endif; ?>
					
				</div>
			</div>
		</section>
	<?php }
		
	}
endif;

if( !class_exists( 'Businessland_Project' ) ):

	class Businessland_Project extends WP_Widget{
	
	/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			parent::__construct(
				'businessland_project_widget', // Base ID
				esc_html__( 'Our Project', 'business-land' ), // Name
				array( 'description' => esc_html__( 'Project Widget', 'business-land' ) ) // Args
			);
		}
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		 $project_section_title = ! empty( $instance['project_section_title'] ) ? $instance['project_section_title'] : '';
		 $project_section_sub_title = ! empty( $instance['project_section_sub_title'] ) ? $instance['project_section_sub_title'] : '';
		 $project_post_cat = ! empty( $instance[ 'project_post_cat' ] ) ? $instance[ 'project_post_cat' ] : '';
		 $project_post_item = ! empty( $instance['project_post_item'] ) ? $instance['project_post_item'] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'project_section_title' ) ); ?>"><?php esc_attr_e( 'Section Title:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'project_section_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'project_section_title' ) ); ?>" type="text" value="<?php echo esc_attr( $project_section_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'project_section_sub_title' ) ); ?>"><?php esc_attr_e( 'Sub Title:', 'business-land' ); ?></label> 
			<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'project_section_sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('project_section_sub_title') ); ?>"><?php echo esc_html( $project_section_sub_title ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'project_post_cat' ) ); ?>"><?php esc_attr_e( 'Post Category:', 'business-land' ); ?></label>
			<?php
				$post_cat = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 0,
					'id'	=> $this->get_field_id( 'project_post_cat' ),
					'name'	=> $this->get_field_name( 'project_post_cat' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $project_post_cat ),
					'show_option_all'	=> esc_html__( 'Choose Category', 'business-land' )
				);
				wp_dropdown_categories( $post_cat );
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'project_post_item' ) )?>"><?php esc_attr_e( 'Number Of Post: ', 'business-land' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'project_post_item' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'project_post_item' ) ); ?>" value="<?php echo esc_attr( $project_post_item ); ?>" min="1" max="6" class="widefat">
		</p>
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['project_section_title'] = ( ! empty( $new_instance['project_section_title'] ) ) ? sanitize_text_field( $new_instance['project_section_title'] ) : '';
			$instance['project_section_sub_title'] = ( ! empty( $new_instance['project_section_sub_title'] ) ) ? sanitize_textarea_field( $new_instance['project_section_sub_title'] ) : '';
			$instance['project_post_cat'] = absint( $new_instance[ 'project_post_cat' ] );
			$instance['project_post_item'] = absint( $new_instance[ 'project_post_item' ] );
			
			return $instance;
		}
		
		/**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $project_section_title = ! empty( $instance['project_section_title'] ) ? $instance['project_section_title'] : '';
		 $project_section_sub_title = ! empty( $instance['project_section_sub_title'] ) ? $instance['project_section_sub_title'] : '';
		 $project_post_cat = ! empty( $instance[ 'project_post_cat' ] ) ? $instance[ 'project_post_cat' ] : '';
		 $project_post_item = ! empty( $instance[ 'project_post_item' ] ) ? absint( $instance[ 'project_post_item' ] ) : 3 ;
		 
		?>
		
		<section class="project-section p-100 pb-75">
			<div class="container">
				<?php if( !empty( $project_section_title ) ): ?>
					<div class="row title-wrap">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center"><?php echo esc_html( $project_section_title );?></h2>
								<p class="sub-title mb-0"><?php echo esc_html( $project_section_sub_title ); ?></p>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row content-wrap pt-5">
				
				<?php if( $project_post_item == '1' ){
							$size = 'col-lg-12';
						}elseif( $project_post_item == '2' ){
							$size = 'col-lg-6';
						}elseif( $project_post_item == '3' ){
							$size = 'col-lg-4 col-md-6';
						}else{
							$size = 'col-lg-4 col-md-6';
						}
				$args = array(
						'post_type' => 'post',
						'posts_per_page'        => absint( $project_post_item ),
						'ignore_sticky_posts'   => true,
						'post_status'		   => 'publish',
						'cat'					=> absint( $project_post_cat )
				);
				$post_query = new WP_Query( $args );
						
				if( $post_query->have_posts() ):
					while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
						
						<div class="<?php echo esc_attr( $size ); ?>">
							<article id="post-<?php the_ID(); ?>" <?php post_class('post-item mb-30'); ?>>
								<div class="post-inner-wrapper">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="post-thumbnail pb-0">
											<span class="bg-overlay-light"></span>
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
										</div>
									<?php endif; ?>
									<div class="post-body-wrapper clearfix bg-white text-center">
										<div class="entry-header mb-0">
											<?php the_title( '<h5 class="entry-title mb-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
											<ul class="post-meta mb-0 mt-2">
												<li class="post-author list-inline-item">
													<?php $author = sprintf( '<span class="pre mr-1">%1$s</span><span class="name">%2$s</span>', esc_html__( 'by', 'business-land' ), esc_html( get_the_author() ) );  echo wp_kses_post( $author ); ?>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</article>
						</div>
					
					<?php endwhile;
					
					wp_reset_postdata();
					 
				endif; ?>
					
				</div>
			</div>
		</section>
	<?php }
	
	}
endif;

if( !class_exists( 'Businessland_Aboutus_Widget' ) ):

	class Businessland_Aboutus_Widget extends WP_Widget{
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			parent::__construct(
				'businessland_aboutus_widget', // Base ID
				esc_html__( 'About Us', 'business-land' ), // Name
				array( 'description' => esc_html__( 'About Us Widget', 'business-land' ) ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		 $aboutus_section_title = ! empty( $instance['aboutus_section_title'] ) ? $instance['aboutus_section_title'] : '';
		 $aboutus_section_sub_title = ! empty( $instance['aboutus_section_sub_title'] ) ? $instance['aboutus_section_sub_title'] : '';
		 $aboutus_excerpt_lenth = ! empty( $instance['aboutus_excerpt_lenth'] ) ? $instance['aboutus_excerpt_lenth'] : '';
		 $aboutus_page_one = ! empty( $instance['aboutus_page_one'] ) ? $instance['aboutus_page_one'] : '';
		 $aboutus_page_two = ! empty( $instance['aboutus_page_two'] ) ? $instance['aboutus_page_two'] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'aboutus_section_title' ) ); ?>"><?php esc_attr_e( 'Section Title:', 'business-land' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'aboutus_section_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'aboutus_section_title' ) ); ?>" type="text" value="<?php echo esc_attr( $aboutus_section_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'aboutus_section_sub_title' ) ); ?>"><?php esc_attr_e( 'Sub Title:', 'business-land' ); ?></label> 
			<textarea class="widefat" rows="5" cols="10" id="<?php echo esc_attr( $this->get_field_id( 'aboutus_section_sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('aboutus_section_sub_title') ); ?>"><?php echo esc_html( $aboutus_section_sub_title ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'aboutus_excerpt_lenth' ) )?>"><?php esc_attr_e( 'Excerpt: ', 'business-land' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'aboutus_excerpt_lenth' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'aboutus_excerpt_lenth' ) ); ?>" value="<?php echo esc_attr( $aboutus_excerpt_lenth ); ?>" min="1" max="100" class="widefat">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'aboutus_page_one' ) )?>"><?php esc_attr_e( 'Select Page One: ', 'business-land' )?></label>
			<?php
				$page_one = array(
					'hierarchical' => 1,
					'sort_order' => 'asc',
					'parent' => -1,
					'exclude_tree' => '',
					'name' => $this->get_field_name( 'aboutus_page_one' ),
					'post_type' => 'page',
					'value_field' => 'ID',
					'post_status' => 'publish',
					'id'	=> $this->get_field_id( 'aboutus_page_one' ),
					'selected'	=> absint( $aboutus_page_one ),
				); 
				wp_dropdown_pages( wp_kses_post( $page_one ) );
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'aboutus_page_two' ) )?>"><?php esc_attr_e( 'Select Page Two: ', 'business-land' )?></label>
		<?php
			$page_two = array(
				'hierarchical' => 1,
				'sort_order' => 'asc',
				'parent' => -1,
				'exclude_tree' => '',
				'name' => $this->get_field_name( 'aboutus_page_two' ),
				'post_type' => 'page',
				'value_field' => 'ID',
				'post_status' => 'publish',
				'id'	=> $this->get_field_id( 'aboutus_page_two' ),
				'selected'	=> absint( $aboutus_page_two ),
			); 
			wp_dropdown_pages( wp_kses_post( $page_two ) );
 		?>
		</p>
		<?php
	    }
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['aboutus_section_title'] = ( ! empty( $new_instance['aboutus_section_title'] ) ) ? sanitize_text_field( $new_instance['aboutus_section_title'] ) : '';
			$instance['aboutus_section_sub_title'] = ( ! empty( $new_instance['aboutus_section_sub_title'] ) ) ? sanitize_textarea_field( $new_instance['aboutus_section_sub_title'] ) : '';
			$instance['aboutus_excerpt_lenth'] = absint( $new_instance[ 'aboutus_excerpt_lenth' ] );
			$instance['aboutus_page_one'] = absint( $new_instance[ 'aboutus_page_one' ] );
			$instance['aboutus_page_two'] = absint( $new_instance[ 'aboutus_page_two' ] );
			return $instance;
		}
		
		/**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		 
		 $aboutus_section_title = ! empty( $instance['aboutus_section_title'] ) ? $instance['aboutus_section_title'] : '';
		 $aboutus_section_sub_title = ! empty( $instance['aboutus_section_sub_title'] ) ? $instance['aboutus_section_sub_title'] : '';
		 $aboutus_excerpt_lenth = ! empty( $instance[ 'aboutus_excerpt_lenth' ] ) ? absint( $instance[ 'aboutus_excerpt_lenth' ] ) : '';
		 $aboutus_page_one = ! empty( $instance[ 'aboutus_page_one' ] ) ? absint( $instance[ 'aboutus_page_one' ] ) : '' ;
		 $aboutus_page_two = ! empty( $instance[ 'aboutus_page_two' ] ) ? absint( $instance[ 'aboutus_page_two' ] ) : '' ;
		?>
		
		<section class="aboutus-section p-100 pb-75 bg-white">
			<div class="container">
				<?php if( !empty( $aboutus_section_title ) ): ?>
					<div class="row title-wrap">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title feature-bottom-center"><?php echo esc_html( $aboutus_section_title );?></h2>
								<p class="sub-title mb-0"><?php echo esc_html( $aboutus_section_sub_title ); ?></p>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="row content-wrap pt-5">
				
				<?php 
				$args = array(
						'post_type' => 'page',
						'posts_per_page'        => 2,
						'ignore_sticky_posts'   => true,
						'post_status'		   => 'publish',
						'post__in'			 => array( $aboutus_page_one,  $aboutus_page_two )
				);
				$post_query = new WP_Query( $args );
						
				if( $post_query->have_posts() ):
					while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
						
						<div class="col-md-6">
							<article id="post-<?php the_ID(); ?>" <?php post_class('post-item mb-30'); ?>>
								<div class="post-inner-wrapper <?php if ( has_post_thumbnail() ): ?>has-thumb<?php endif; ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="post-thumbnail pb-0">
											<span class="bg-overlay-light"></span>
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
										</div>
									<?php endif; ?>
									<div class="post-body-wrapper bg-white text-center">
										<div class="entry-header mb-0">
											<?php the_title( '<h4 class="entry-title mb-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
										</div>
										<div class="entry-content">
											<p><?php printf( esc_html( wp_trim_words( get_the_content(), $aboutus_excerpt_lenth ) ) ); ?></p>
											<p class="read-more mb-0">
												<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn hv-default">
													<?php esc_html_e( 'Read More','business-land' );?>
												</a>
                                			</p>
										</div>
										
									</div>
								</div>
							</article>
						</div>
					
					<?php endwhile;
					
					wp_reset_postdata();
					 
				endif; ?>
					
				</div>
			</div>
		</section>
	<?php }
		
	} 

endif;