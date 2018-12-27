<?php
/**
 * Widget for showing page content
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

add_action( 'widgets_init', 'edigital_register_single_page_widget' );

function edigital_register_single_page_widget() {
    register_widget( 'EDigital_Single_Page' );
}

class EDigital_Single_Page extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'edigital_single_page',
            'description' => __( 'This widget shows the whole content from selected page.', 'edigital' )
        );
        parent::__construct( 'edigital_single_page', __( 'EDigital: Single Page', 'edigital' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $edigital_pages_dropdown = edigital_pages_dropdown();
        
        $fields = array(

            'section_page_id' => array(
                'edigital_widgets_name'         => 'section_page_id',
                'edigital_widgets_title'        => __( 'Section Page', 'edigital' ),
                'edigital_widgets_field_type'   => 'select',
                'edigital_widgets_default'      => 0,
                'edigital_widgets_field_options' => $edigital_pages_dropdown
            ),

            'page_featured_img' => array(
                'edigital_widgets_name'         => 'page_featured_img',
                'edigital_widgets_title'        => __( 'Use featured image', 'edigital' ),
                'edigital_widgets_field_type'   => 'checkbox'
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

        $section_page_id    = empty( $instance['section_page_id'] ) ? '' : $instance['section_page_id'];
        $featued_img_option = empty( $instance['page_featured_img'] ) ? '' : $instance['page_featured_img'];
        if( empty( $section_page_id ) ) {
        	return;
        }
        echo $before_widget;
    ?>
            <div class="section-wrapper edigital-widget-wrapper">
        		<div class="mt-single-page-wrapper">
                    <div class="mt-container">
            			<?php
            				$page_query = new WP_Query( array( 'page_id' => absint( $section_page_id ) ) );
            				if( $page_query->have_posts() ) {
            					while( $page_query->have_posts() ) {
            						$page_query->the_post();
            						echo $before_title . get_the_title() .  $after_title;
            			?>
            						<div class="page-content">
                                        <div class="about-content">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="about-img">
                                            <?php if( has_post_thumbnail() && $featued_img_option == 1 ) { ?>
                                                <div class="page-img"><?php the_post_thumbnail( 'large' ); ?></div>
                                            <?php } ?>
                                        </div>
                                    </div><!-- .page-content -->
            			<?php
            					}
            				}
            			?>
                    </div><!-- .mt-container -->
        		</div><!-- . mt-single-page-wrapper -->
          </div>
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