<?php
/**
 * Widget for Latest Products Section
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

add_action( 'widgets_init', 'edigital_register_latest_products_widget' );

function edigital_register_latest_products_widget() {
    register_widget( 'EDigital_Latest_Products' );
}

class EDigital_Latest_Products extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'edigital_latest_products',
            'description' => __( 'This widget shows the latest Products available in store.', 'edigital' )
        );
        parent::__construct( 'edigital_latest_products', __( 'EDigital: Latest Products', 'edigital' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'section_title' => array(
                'edigital_widgets_name'         => 'section_title',
                'edigital_widgets_title'        => __( 'Section Title', 'edigital' ),
                'edigital_widgets_field_type'   => 'text'
            ),

            'section_info' => array(
                'edigital_widgets_name'         => 'section_info',
                'edigital_widgets_title'        => __( 'Section Info', 'edigital' ),
                'edigital_widgets_row'          => 5,
                'edigital_widgets_field_type'   => 'textarea'
            ),
        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $edigital_section_title    = empty( $instance['section_title'] ) ? '' : $instance['section_title'];        
        $edigital_section_info     = empty( $instance['section_info'] ) ? '' : $instance['section_info'];

        if( !empty( $edigital_section_title ) || !empty( $edigital_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        echo $before_widget;
    ?>
        <div class="section-wrapper edigital-widget-wrapper">
            <div class="mt-container">
                <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?>">
                    <?php
                        if( !empty( $edigital_section_title ) ) {
                            echo $before_title . esc_html( $edigital_section_title ) . $after_title;
                        }

                        if( !empty( $edigital_section_info ) ) {
                            echo '<span class="section-info">'. esc_html( $edigital_section_info ) .'</span>';
                        }
                    ?>
                </div><!-- .section-title-wrapper -->
                <div class="latest-products-wrapper mt-column-wrapper">
	                <?php
	                	$latest_products_args = array(
	                        'post_type' => 'download',
	                        'posts_per_page' => 8
	                    );
	        			$latest_products_query = new WP_Query( $latest_products_args );
	        			if( $latest_products_query->have_posts() ) {
	        				while( $latest_products_query->have_posts() ) {
	        					$latest_products_query->the_post();
	        		?>
	        					<div class="single-product-wrapper mt-column-4">
	        						<div class="product-thumb-wrap">
		        						<?php if( has_post_thumbnail() ) { ?>
	                                        <div class="img-holder">
	                                            <figure><?php the_post_thumbnail( 'medium' ); ?></figure>
	                                        </div>
	                                    <?php } ?>
	                                    <?php if( function_exists( 'edd_price' ) ) { ?>
                                            <div class="product-price">
                                                <?php 
                                                    if( edd_has_variable_prices( get_the_ID() ) ) {
                                                        // if the download has variable prices, show the first one as a starting price
                                                        esc_html_e( 'Starting at: ', 'edigital' ); edd_price( get_the_ID() );
                                                    } else {
                                                        edd_price( get_the_ID() );
                                                    }
                                                ?>
                                            </div><!--end .product-price-->
                                        <?php } ?>
                                    </div><!-- .product-thumb-wrap -->
                                    <div class="product-info-wrapper">
                                    	<div class="product-title-wrap">
                                    		<h3 class="product-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                                    	</div><!-- .product-title-wrap -->
                                    	<div class="product-details-wrap clearfix">
                                    		<div class="product-vendor">
                                    			<?php
                                					$author = get_current_user_id();
                                					$author_name = get_the_author_meta( 'display_name' );
                                    			?>
                                    			<span class="product-author"> <span> <i class="fa fa-user"> </i> </span> <?php echo esc_html( $author_name ); ?></span>
                                    		</div><!-- .product-vender -->
                                            <div class="product-btns">
                                                <a href="<?php the_permalink(); ?>" class="mt-more-btn" title="<?php echo esc_attr( 'view', 'edigital' ); ?>"><i class="fa fa-search"></i></a>
                                                <a href="<?php echo esc_url( site_url() ). '?edd_action=add_to_cart&download_id='.get_the_ID(); ?>" class="mt-edd-cart-btn" title="<?php echo esc_attr( 'Add to Cart', 'edigital' ); ?>"><i class="fa fa-shopping-bag"></i></a>
                                            </div><!-- .product-btns -->
                                        </div><!-- .product-details-wrap -->
                                    </div><!-- .product-info-wrapper -->
	        					</div><!-- .single-product-wrapper -->
	        		<?php
	        				}
	        			}
	                ?>
	            </div><!-- .latest-products-wrapper -->
            </div><!-- .edigital-container -->
        </div><!-- .section-wrapper -->
    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    edigital_widgets_updated_field_value()      defined in edigital-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$edigital_widgets_name] = edigital_widgets_updated_field_value( $widget_field, $new_instance[$edigital_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    edigital_widgets_show_widget_field()        defined in edigital-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $edigital_widgets_field_value = !empty( $instance[$edigital_widgets_name] ) ? wp_kses_post( $instance[$edigital_widgets_name] ) : '';
            edigital_widgets_show_widget_field( $this, $widget_field, $edigital_widgets_field_value );
        }
    }
}