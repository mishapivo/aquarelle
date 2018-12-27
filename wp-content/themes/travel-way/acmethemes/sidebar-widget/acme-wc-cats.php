<?php
/**
 * Feature Section
 * Two different types
 *
 * @package Acme Themes
 * @subpackage Travel Way
 * @since 1.0.0
 */
if ( ! class_exists( 'Travel_Way_Wc_Feature_Cats' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage Travel_Way_Wc_Feature_Cats
     * @since 1.0.0
     */
    class Travel_Way_Wc_Feature_Cats extends WP_Widget {

        /*defaults values for fields*/
        private $defaults = array(
	        'unique_id'                 => '',
	        'travel_way_widget_title'   => '',
	        'travel_way_featured_cats'  => array(),
	        'content_number'            => 5,
	        'column_number'             => 4,
	        'travel_way_img_size'       => 'full',
	        'background_options'        => 'default'
        );

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'travel_way_wc_feature_cats',
                /*Widget name will appear in UI*/
                esc_html__('AT WooCommerce Categories', 'travel-way'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Show WooCommerce Categories Beautifully', 'travel-way' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);

	        $unique_id                  = esc_attr( $instance['unique_id'] );
	        $travel_way_widget_title    = esc_attr( $instance['travel_way_widget_title'] );

	        $travel_way_featured_cats   = array_map( 'esc_attr', $instance['travel_way_featured_cats'] );
	        $content_number             = intval( $instance['content_number'] );
	        $column_number              = absint( $instance[ 'column_number' ] );
	        $travel_way_img_size        = $instance['travel_way_img_size'];
	        $background_options         = esc_attr( $instance['background_options'] );

	        $choices = travel_way_get_image_sizes_options();
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php esc_html_e( 'Section ID', 'travel-way' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>"/>
                <br/>
                <small><?php esc_html_e( 'Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.', 'travel-way' ) ?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'travel_way_widget_title' ) ); ?>">
                    <?php esc_html_e( 'Title', 'travel-way' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'travel_way_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'travel_way_widget_title' ) ); ?>" type="text" value="<?php echo $travel_way_widget_title; ?>" />
            </p>

            <p>
                <label>
                    <?php esc_html_e('Select Feature Categories', 'travel-way'); ?>
                </label>
            </p>
            <div class="at-multiple-checkbox">
	        <?php
	        $args = array(
		        'taxonomy'     => 'product_cat',
		        'hide_empty'   => false,
		        'number'      => 999
	        );

	        $woocommerce_categories_obj = get_categories( $args );
	        if( !empty( $woocommerce_categories_obj ) ){
		        foreach( $woocommerce_categories_obj as $category ) {
			        $at_option_name = $category->term_id;
			        $at_option_title = $category->name;
			        if( isset( $travel_way_featured_cats[$at_option_name] ) ) {
				        $travel_way_featured_cats[$at_option_name] = 1;
			        }else{
				        $travel_way_featured_cats[$at_option_name] = 0;
			        }
			        ?>
                    <p>
                        <input id="<?php echo esc_attr( $this->get_field_id($at_option_name) ); ?>" name="<?php echo esc_attr( $this->get_field_name('travel_way_featured_cats').'['.$at_option_name.']' ); ?>" type="checkbox" value="1" <?php checked('1', $travel_way_featured_cats[$at_option_name]); ?>/>
                        <label for="<?php echo esc_attr( $this->get_field_id($at_option_name) ); ?>"><?php echo esc_html( $at_option_title ); ?></label>
                    </p>
			        <?php
		        }
            }
            else{
	            esc_html_e('No Categories found', 'travel-way');
            }
	        ?>
            </div>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_number' ); ?>"><?php _e( 'Number of words in content', 'travel-way' ); ?>:</label>
                <br/>
                <small>
			        <?php esc_html_e('Please enter -1 to show full content or 0 to show none','travel-way'); ?>
                </small>
                <input class="widefat" id="<?php echo $this->get_field_id( 'content_number' ); ?>" name="<?php echo $this->get_field_name( 'content_number' ); ?>" type="number" value="<?php echo $content_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Cat Per Slide', 'travel-way' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>" >
			        <?php
			        $travel_way_widget_column_numbers = travel_way_widget_column_number();
			        foreach ( $travel_way_widget_column_numbers as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'travel_way_img_size' ) ); ?>">
			        <?php esc_html_e( 'Image Size', 'travel-way' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'travel_way_img_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'travel_way_img_size' ) ); ?>">
			        <?php
			        foreach( $choices as $key => $travel_way_column_array ){
				        echo ' <option value="'.esc_attr( $key ).'" '.selected( $travel_way_img_size, $key, 0).'>'.esc_attr( $travel_way_column_array ).'</option>';
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>"><?php esc_html_e( 'Background Options', 'travel-way' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_options' ) ); ?>">
			        <?php
			        $travel_way_background_options = travel_way_background_options();
			        foreach ( $travel_way_background_options as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $background_options ); ?>><?php echo esc_attr( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {

            $instance = array();
	        $instance['unique_id']                      = sanitize_key( $new_instance['unique_id'] );
	        $instance['travel_way_widget_title']        = ( isset( $new_instance['travel_way_widget_title'] ) ) ? sanitize_text_field( $new_instance['travel_way_widget_title'] ) : '';
	        $instance['travel_way_featured_cats']       = ( isset( $new_instance['travel_way_featured_cats'] ) && is_array( $new_instance['travel_way_featured_cats'] ) ) ? array_map( 'esc_attr', $new_instance['travel_way_featured_cats'] ) : array();

	        $instance['content_number']                 = intval( $new_instance['content_number'] );

	        $instance[ 'column_number' ]                = absint( $new_instance[ 'column_number' ] );
	        $instance['travel_way_img_size']            = isset($new_instance['travel_way_img_size'])? esc_attr( $new_instance['travel_way_img_size'] ) : 'large';

	        $travel_way_widget_background_options       = travel_way_background_options();
	        $instance[ 'background_options' ]           = travel_way_sanitize_choice_options( $new_instance[ 'background_options' ], $travel_way_widget_background_options, 'default' );

	        return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance = wp_parse_args( (array) $instance, $this->defaults );
	        $unique_id                  = ! empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );
	        $travel_way_widget_title    = !empty( $instance['travel_way_widget_title'] ) ? esc_attr( $instance['travel_way_widget_title'] ) : '';
	        $travel_way_widget_title    = apply_filters( 'widget_title', $travel_way_widget_title, $instance, $this->id_base );

	        $travel_way_featured_cats   = array_map( 'esc_attr', $instance['travel_way_featured_cats'] );
	 
	        $content_number             = intval( $instance['content_number'] );

	        $column_number              = absint( $instance[ 'column_number' ] );
	        $travel_way_img_size        = esc_attr( $instance['travel_way_img_size'] );

	        $background_options         = esc_attr( $instance['background_options'] );
	        $bg_gray_class              = $background_options == 'gray'?'at-gray-bg':'';

	        $animation = "init-animate zoomIn";

	        echo $args['before_widget'];
	        if ( !empty( $travel_way_widget_title )){

		        echo $args['before_title'];
		        echo $travel_way_widget_title;
		      
		        echo $args['after_title'];
	        }

	        if(!empty( $travel_way_featured_cats ) ){

		        $div_attr = 'class="featured-entries-col"';
		      
		        ?>
		        <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets acme-abouts <?php echo $bg_gray_class;?>">
		        	<div class="container">
                    	<div class="row clearfix">
                    		<div <?php echo $div_attr;?>>
                    			 	<?php
					         
									$travel_way_featured_index = 1;
									foreach ( $travel_way_featured_cats as $term_id => $value ) {
									    $travel_way_list_classes = 'single-list';

									    if ( 1 == $column_number ) {
											$travel_way_list_classes .= " col-sm-12";
										} elseif ( 2 == $column_number ) {
											$travel_way_list_classes .= " col-sm-6";
										} elseif ( 3 == $column_number ) {
											$travel_way_list_classes .= " col-sm-4 col-md-4";
										} else {
											$travel_way_list_classes .= " col-sm-4 col-md-3";
										}

										$taxonomy = 'product_cat';
										$term = get_term_by( 'id', $term_id, $taxonomy );
										if ( $term && ! is_wp_error( $term ) ) {
											$term_link = get_term_link( $term_id, $taxonomy );
											$term_name = $term->name;
											$term_description = $term->description;
											$thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );
											$image_url = wp_get_attachment_image_src( $thumbnail_id, $travel_way_img_size );
											if ( !$image_url ) {
												$image_url[0] =  get_template_directory_uri() . '/assets/img/default-image.jpg';
											}
									
											?>
							                <div class="single-list single-at-woo-cat no-media <?php echo esc_attr( $travel_way_list_classes )?>">
							                    <div class="no-media-query single-unit" style="background-image:url(<?php echo esc_url( $image_url[0] ); ?>);">
							                        <a class="at-overlay" href="<?php echo esc_url( $term_link ); ?>"></a>
							                        <div class="cat-details">
							                            <a href="<?php echo esc_url( $term_link ); ?>">
							                                <div class="cat-title">
							                                    <h3><?php echo esc_html( $term_name ); ?></h3>
							                                </div>
							                                <?php
							                                if( 0 != $content_number && !empty($term_description)){
							                                	?>
							                                	<p class="cat-description">
							                                	<?php echo esc_html( wp_trim_words( $term_description, $content_number ) ); ?>
							                                	</p>
							                                	<?php

							                                }
							                                ?>
							                            </a>
							                        </div>
							                    </div>
							                </div>
											<?php
											
										}
										$travel_way_featured_index++;
									}
					
			                    ?>
                    		</div><!-- div_attr -->
                    	</div><!-- .row -->
                    </div><!-- .container -->
		        </section>
                <?php
	        }
	        echo $args['after_widget'];
        }
    } // Class Travel_Way_Wc_Feature_Cats ends here
}