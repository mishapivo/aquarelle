<?php
/**
 * Custom columns of category with various options
 *
 * @package Acme Themes
 * @subpackage Travel Way
 * @since 1.0.0
 */
if ( ! class_exists( 'Travel_Way_Wc_Products' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage Travel_Way_Wc_Products
     * @since 1.0.0
     */
    class Travel_Way_Wc_Products extends WP_Widget {

        private $defaults = array(
	        'unique_id'                     => '',
	        'title'                         => '',
	        'wc_advanced_option'            => 'recent',
            'travel_way_wc_product_cat'     => -1,
            'travel_way_wc_product_tag'     => -1,
            'post_number'                   => 4,
            'column_number'                 => 4,

	        'orderby'                       => 'date',
            'order'                         => 'DESC',
	        'travel_way_img_size'           => 'shop_catalog',
	        'background_options'            => 'default'
        );

        function __construct() {
            parent::__construct(/*Base ID of your widget*/
                'travel_way_wc_products',
                /*Widget name will appear in UI*/
                esc_html__('AT WooCommerce Products', 'travel-way'),
                /*Widget description*/
                array(
                        'description' => esc_html__( 'Show WooCommerce Products with advanced options', 'travel-way' )
                )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance                   = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                  = esc_attr( $instance['unique_id'] );
	        $title                      = esc_attr( $instance['title'] );
	        $wc_advanced_option         = esc_attr( $instance[ 'wc_advanced_option' ] );
	        $travel_way_wc_product_cat  = esc_attr( $instance['travel_way_wc_product_cat'] );
	        $travel_way_wc_product_tag  = esc_attr( $instance['travel_way_wc_product_tag'] );
	        $post_number                = absint( $instance[ 'post_number' ] );
	        $column_number              = absint( $instance[ 'column_number' ] );
	        $orderby                    = esc_attr( $instance[ 'orderby' ] );
	        $order                      = esc_attr( $instance[ 'order' ] );
	        $travel_way_img_size        = esc_attr( $instance['travel_way_img_size'] );
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
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <?php esc_html_e( 'Title', 'travel-way' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'wc_advanced_option' ) ); ?>"><?php esc_html_e( 'Show', 'travel-way' ); ?></label>
                <select class="widefat at-wc-advanced-option" id="<?php echo esc_attr( $this->get_field_id( 'wc_advanced_option' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wc_advanced_option' ) ); ?>" >
			        <?php
			        $wc_advanced_options = travel_way_wc_advanced_options();
			        foreach ( $wc_advanced_options as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $wc_advanced_option ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p class="wc-product-cat wc-select">
                <label for="<?php echo esc_attr( $this->get_field_id('travel_way_wc_product_cat') ); ?>">
                    <?php esc_html_e('Select Category', 'travel-way'); ?>
                </label>
                <?php
                $travel_way_dropown_cat = array(
                    'show_option_none'   => false,
                    'orderby'            => 'name',
                    'order'              => 'asc',
                    'show_count'         => 1,
                    'hide_empty'         => 1,
                    'echo'               => 1,
                    'selected'           => $travel_way_wc_product_cat,
                    'hierarchical'       => 1,
                    'name'               => $this->get_field_name('travel_way_wc_product_cat'),
                    'id'                 => $this->get_field_name('travel_way_wc_product_cat'),
                    'class'              => 'widefat',
                    'taxonomy'           => 'product_cat',
                    'hide_if_empty'      => false
                );
                wp_dropdown_categories( $travel_way_dropown_cat );
                ?>
            </p>
            <p class="wc-product-tag wc-select">
                <label for="<?php echo esc_attr( $this->get_field_id('travel_way_wc_product_tag') ); ?>">
			        <?php esc_html_e('Select Tag', 'travel-way'); ?>
                </label>
		        <?php
		        $travel_way_dropown_cat = array(
			        'show_option_none'   => false,
			        'orderby'            => 'name',
			        'order'              => 'asc',
			        'show_count'         => 1,
			        'hide_empty'         => 1,
			        'echo'               => 1,
			        'selected'           => $travel_way_wc_product_tag,
			        'hierarchical'       => 1,
			        'name'               => $this->get_field_name('travel_way_wc_product_tag'),
			        'id'                 => $this->get_field_name('travel_way_wc_product_tag'),
			        'class'              => 'widefat',
			        'taxonomy'           => 'product_tag',
			        'hide_if_empty'      => false
		        );
		        wp_dropdown_categories( $travel_way_dropown_cat );
		        ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>">
			        <?php esc_html_e( 'Number of posts to show', 'travel-way' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo $post_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'travel-way' ); ?>:</label>
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
                <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'travel-way' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" >
			        <?php
			        $travel_way_wc_product_orderby = travel_way_wc_product_orderby();
			        foreach ( $travel_way_wc_product_orderby as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $orderby ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'travel-way' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" >
			        <?php
			        $travel_way_post_order = travel_way_post_order();
			        foreach ( $travel_way_post_order as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $order ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'travel_way_img_size' ) ); ?>">
			        <?php esc_html_e( 'Normal Featured Post Image', 'travel-way' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'travel_way_img_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'travel_way_img_size' ) ); ?>">
			        <?php
			        foreach( $choices as $key => $travel_way_column_array ){
				        echo ' <option value="'.esc_attr( $key ).'" '.selected( $travel_way_img_size, $key, 0). '>'.esc_attr( $travel_way_column_array ) .'</option>';
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
            <hr />
            <p>
                <small><?php esc_html_e( 'Note: Some of the features only work in "Home main content area" due to minimum width in other areas.' ,'travel-way'); ?></small>
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
	        $instance[ 'title' ]                        = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
	        $instance[ 'wc_advanced_option' ]           = esc_attr( $new_instance[ 'wc_advanced_option' ] );
	        $instance[ 'travel_way_wc_product_cat' ]    = ( isset( $new_instance['travel_way_wc_product_cat'] ) ) ? esc_attr( $new_instance['travel_way_wc_product_cat'] ) : '';
	        $instance[ 'travel_way_wc_product_tag' ]    = ( isset( $new_instance['travel_way_wc_product_tag'] ) ) ? esc_attr( $new_instance['travel_way_wc_product_tag'] ) : '';
	        $instance[ 'post_number' ]                  = absint( $new_instance[ 'post_number' ] );
	        $instance[ 'column_number' ]                = absint( $new_instance[ 'column_number' ] );
	        $instance[ 'orderby' ]                      = esc_attr( $new_instance[ 'orderby' ] );
	        $instance[ 'order' ]                        = esc_attr( $new_instance[ 'order' ] );
	        $instance[ 'travel_way_img_size' ]          = isset($new_instance['travel_way_img_size'])? esc_attr( $new_instance['travel_way_img_size'] ) : 'large';

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
            $instance                   = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                  = ! empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );
	        $wc_advanced_option         = esc_attr( $instance[ 'wc_advanced_option' ] );
	        $travel_way_wc_product_cat  = esc_attr( $instance['travel_way_wc_product_cat'] );
	        $travel_way_wc_product_tag  = esc_attr( $instance['travel_way_wc_product_tag'] );
	        $title                      = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	        $title                      = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	        $post_number                = absint( $instance[ 'post_number' ] );
	        $column_number              = absint( $instance[ 'column_number' ] );
	        $orderby                    = esc_attr( $instance[ 'orderby' ] );
	        $order                      = esc_attr( $instance[ 'order' ] );
	        $travel_way_img_size        = $travel_way_img_size = esc_attr( $instance['travel_way_img_size'] );
	        $background_options         = esc_attr( $instance['background_options'] );
	        $bg_gray_class              = $background_options == 'gray'?'at-gray-bg':'';

	        $product_visibility_term_ids = wc_get_product_visibility_term_ids();

	        /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 1.0.0
             *
             * @see WP_Query
             *
             */
	        $query_args = array(
		        'posts_per_page' => $post_number,
		        'post_status'    => 'publish',
		        'post_type'      => 'product',
		        'no_found_rows'  => 1,
		        'order'          => $order,
		        'meta_query'     => array(),
		        'tax_query'      => array(
			        'relation' => 'AND',
		        ),
	        );

	        switch ( $wc_advanced_option ) {

		        case 'featured' :
		            if( !empty( $product_visibility_term_ids['featured'] )){
			            $query_args['tax_query'][] = array(
				            'taxonomy' => 'product_visibility',
				            'field'    => 'term_taxonomy_id',
				            'terms'    => $product_visibility_term_ids['featured'],
			            );
                    }

			        break;

		        case 'onsale' :
			        $product_ids_on_sale    = wc_get_product_ids_on_sale();
			        if( !empty( $product_ids_on_sale ) ){
				        $query_args['post__in'] = $product_ids_on_sale;
			        }
			        break;

		        case 'cat' :
		            if( !empty( $travel_way_wc_product_cat )){
			            $query_args['tax_query'][] = array(
				            'taxonomy' => 'product_cat',
				            'field'    => 'term_id',
				            'terms'    => $travel_way_wc_product_cat,
			            );
                    }

			        break;

		        case 'tag' :
		            if( !empty( $travel_way_wc_product_tag )){
			            $query_args['tax_query'][] = array(
				            'taxonomy' => 'product_tag',
				            'field'    => 'term_id',
				            'terms'    => $travel_way_wc_product_tag,
			            );
                    }

			        break;
	        }

	        switch ( $orderby ) {

		        case 'price' :
			        $query_args['meta_key'] = '_price';
			        $query_args['orderby']  = 'meta_value_num';
			        break;

		        case 'sales' :
			        $query_args['meta_key'] = 'total_sales';
			        $query_args['orderby']  = 'meta_value_num';
			        break;

		        case 'ID' :
		        case 'author' :
		        case 'title' :
		        case 'date' :
		        case 'modified' :
		        case 'rand' :
		        case 'comment_count' :
		        case 'menu_order' :
		            $query_args['orderby']  = $orderby;
			        break;

		        default :
			        $query_args['orderby']  = 'date';
	        }

            $travel_way_featured_query = new WP_Query( $query_args );
	        if ($travel_way_featured_query->have_posts()) :
                echo $args['before_widget'];

		        $animation = "init-animate zoomIn";
		        ?>
                <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets acme-abouts <?php echo $bg_gray_class;?>">
                    <div class="container">
                        <?php
                        if ( ! empty( $title ) ) {
	                        echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                        }
                        $div_attr = 'class="featured-entries-col woocommerce"';
                        ?>
                        <div class="row at-cat-product-wrap clearfix ">
                            <div <?php echo $div_attr;?>>
			                    <?php
			                    $travel_way_featured_index = 1;
			                    while ( $travel_way_featured_query->have_posts() ) :$travel_way_featured_query->the_post();
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

				                    ?>
                                    <div class="<?php echo esc_attr( $travel_way_list_classes ); ?>">
                                       <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail($travel_way_img_size)?>
                                        <div class="caption">
                                       <h3 class="at-woo-title"><?php the_title();?></h3>

                                        <?php                                        
                                        woocommerce_template_loop_rating();
                                        $currency = get_woocommerce_currency_symbol();
                                        $price = get_post_meta( get_the_ID(), '_regular_price', true);
                                        $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                    
                                        if($sale) :
                                            global $post, $product;
                                            echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'travel-way' ) . '</span>', $post, $product );
                                            ?>
                                        <p class="product-price">
                                            <del>
                                                <?php
                                                echo esc_html($currency);
                                                echo esc_html( $price );
                                                ?>
                                            </del>
                                            <?php
                                            echo esc_html($currency);
                                            echo esc_html( $sale );
                                            ?>
                                        </p>    
                                        <?php elseif($price) : ?>
                                            <p class="product-price">
	                                            <?php
	                                            echo esc_html($currency);
	                                            echo esc_html( $price );
	                                            ?>
                                            </p>
                                        <?php endif; 
                                         ?> 
                                     </div>
                                   </a>
                                    </div><!--dynamic css-->
				                    <?php
				                    $travel_way_featured_index++;
			                    endwhile;
			                    ?>
                            </div><!--featured entries-col-->
                        </div><!--cat product wrap-->
                    <?php
                    echo $args['after_widget'];
                    echo "<div class='clearfix'></div>";
                    // Reset the global $the_post as this query will have stomped on it
                    ?>
                    </div>
                </section>
            <?php
            endif;
	        wp_reset_postdata();
        }
    } // Class Travel_Way_Wc_Products ends here
}