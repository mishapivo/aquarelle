<?php
/**
 * Widget for grid layout which is suitable for services/features and teams.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

class Enrollment_Service extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'enrollment_service',
            'description' => __( 'Display posts from selected category as grid view.', 'enrollment' )
        );
        parent::__construct( 'enrollment_service', __( 'CV: Services Items', 'enrollment' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'section_title' => array(
                'enrollment_widgets_name'         => 'section_title',
                'enrollment_widgets_title'        => __( 'Section Title', 'enrollment' ),
                'enrollment_widgets_field_type'   => 'text'
            ),

            'section_cat_slug' => array(
                'enrollment_widgets_name'         => 'section_cat_slug',
                'enrollment_widgets_title'        => __( 'Section Category', 'enrollment' ),
                'enrollment_widgets_default'      => '',
                'enrollment_widgets_field_type'   => 'category_dropdown'
            ),

            'section_post_count' => array(
                'enrollment_widgets_name'         => 'section_post_count',
                'enrollment_widgets_title'        => __( 'No. of. Items', 'enrollment' ),
                'enrollment_widgets_default'      => 4,
                'enrollment_widgets_field_type'   => 'number'
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

    	$enrollment_section_title 	    = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        $enrollment_section_cat_slug   = empty( $instance['section_cat_slug'] ) ? '' : $instance['section_cat_slug'];
        $enrollment_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];

    	if( empty( $enrollment_section_cat_slug ) ) {
    		return ;
    	}

        if( !empty( $enrollment_section_title ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $service_args = array(
			'post_type'      => 'post',
			'category_name'  => esc_attr( $enrollment_section_cat_slug ),
			'posts_per_page' => absint( $enrollment_section_post_count )
		);
        $service_query = new WP_Query( $service_args );
        echo $before_widget;
    ?>
    		<div class="section-wrapper enrollment-widget-wrapper clearfix">
    			<div class="cv-container">
	                <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?> clearfix">
	                    <?php
	                        if( !empty( $enrollment_section_title ) ) {
	                            echo $before_title . esc_html( $enrollment_section_title ) . $after_title;
	                        }
	                    ?>
	                </div><!-- .section-title-wrapper -->

	                <div class="grid-items-wrapper">
	                	<?php
	                		if( $service_query->have_posts() ) {
	                			while( $service_query->have_posts() ) {
	                				$service_query->the_post();
	                	?>
	                				<div class="single-post-wrapper">
		                				<?php if( has_post_thumbnail() ) { ?>
                                            <div class="img-holder">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <?php the_excerpt(); ?>
	                				</div><!-- .single-post-wrapper -->
	                	<?php
	                			}
	                		}
                            wp_reset_postdata();
	                	?>
	                </div><!-- .grid-items-wrapper -->
	            </div><!-- .cv-container -->
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
     * @uses    enrollment_widgets_updated_field_value()      defined in enrollment-widget-fields.php
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
            $instance[$enrollment_widgets_name] = enrollment_widgets_updated_field_value( $widget_field, $new_instance[$enrollment_widgets_name] );
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
     * @uses    enrollment_widgets_show_widget_field()        defined in enrollment-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $enrollment_widgets_field_value = !empty( $instance[$enrollment_widgets_name] ) ? wp_kses_post( $instance[$enrollment_widgets_name] ) : '';
            enrollment_widgets_show_widget_field( $this, $widget_field, $enrollment_widgets_field_value );
        }
    }

}