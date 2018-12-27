<?php
/**
 * Widget to show the content of EDD featured products
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

add_action( 'widgets_init', 'edigital_register_featured_products_widget' );

function edigital_register_featured_products_widget() {
    register_widget( 'EDigital_Featured_Products' );
}

class EDigital_Featured_Products extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'edigital_featured_products',
            'description' => __( 'To show featured products of EDD.', 'edigital' )
        );
        parent::__construct( 'edigital_featured_products', __( 'EDigital: Featured Products', 'edigital' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $edd_terms = get_terms( 'download_category' );
        $edigital_edd_terms['0'] = __( 'Select EDD Category', 'edigital' );
        foreach ( $edd_terms as $edd_term ) {
            $edigital_edd_terms[$edd_term->term_id] = $edd_term->name;
        }
        
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

            'section_edd_cat_id' => array(
                'edigital_widgets_name'         => 'section_edd_cat_id',
                'edigital_widgets_title'        => __( 'Section Category', 'edigital' ),
                'edigital_widgets_field_type'   => 'select',
                'edigital_widgets_default'      => '0',
                'edigital_widgets_field_options'=> $edigital_edd_terms
            ),

            'section_post_count' => array(
                'edigital_widgets_name'         => 'section_post_count',
                'edigital_widgets_title'        => __( 'Section Post Count', 'edigital' ),
                'edigital_widgets_default'      => '3',
                'edigital_widgets_field_type'   => 'number'
            )


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

        $edigital_section_title      = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        $edigital_section_info       = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
        $edigital_section_cat_id     = empty( $instance['section_edd_cat_id'] ) ? 0 : $instance['section_edd_cat_id'];
        $edigital_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];

        if( empty( $edigital_section_cat_id ) ) {
            return ;
        }

        if( !empty( $edigital_section_title ) || !empty( $edigital_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $featured_args = array(
            'post_type' => 'download',
            'tax_query' => array(
                array(
                    'taxonomy' => 'download_category',
                    'field'    => 'term_id',
                    'terms'    => absint( $edigital_section_cat_id ),
                ),
            ),
            'posts_per_page' => absint( $edigital_section_post_count )
        );
        
        $featured_query = new WP_Query( $featured_args );
        echo $before_widget;
    ?>
            <div class="section-wrapper edigital-widget-wrapper">
                <div class="mt-container">
                    <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?> clearfix">
                        <?php
                            if( !empty( $edigital_section_title ) ) {
                                echo $before_title . esc_html( $edigital_section_title ) . $after_title;
                            }

                            if( !empty( $edigital_section_info ) ) {
                                echo '<span class="section-info">'. esc_html( $edigital_section_info ) .'</span>';
                            }
                        ?>
                    </div><!-- .section-title-wrapper -->

                    <div class="featured-items-wrapper mt-column-wrapper">
                        <?php
                            if( $featured_query->have_posts() ) {
                                while( $featured_query->have_posts() ) {
                                    $featured_query->the_post();
                        ?>
                                    <div class="single-post-wrapper mt-column-3">
                                        <?php if( has_post_thumbnail() ) { ?>
                                            <div class="img-holder">
                                                <figure><?php the_post_thumbnail( 'medium-large' ); ?></figure>
                                            </div>
                                        <?php } ?>
                                        <div class="product-caption">
                                            <h2 class="prd-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
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
                                            <div class="product-details">
                                                <div class="product-btns">
                                                    <a href="<?php the_permalink(); ?>" class="mt-more-btn" title="<?php echo esc_attr( 'view', 'edigital' ); ?>"><i class="fa fa-search"></i></a>
                                                    <a href="<?php echo esc_url( site_url() ). '?edd_action=add_to_cart&download_id='.get_the_ID(); ?>" class="mt-edd-cart-btn" title="<?php echo esc_attr( 'Add to Cart', 'edigital' ); ?>"><i class="fa fa-shopping-bag"></i></a>
                                                </div><!-- .product-btns -->
                                            </div><!-- .product-details -->
                                        </div><!--. product-caption -->
                                    </div><!-- .single-post-wrapper -->
                        <?php
                                }
                            }
                        ?>
                    </div><!-- .service-items-wrapper -->
                </div><!-- .mt-container -->
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