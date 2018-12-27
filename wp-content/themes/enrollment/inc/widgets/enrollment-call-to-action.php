<?php
/**
 * Widget to show the content of Call To Action
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

class Enrollment_Call_To_Action extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'enrollment_call_to_action',
            'description' => __( 'Display content as Call To Action.', 'enrollment' )
        );
        parent::__construct( 'enrollment_call_to_action', __( 'CV: Call To Action', 'enrollment' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'section_bg_image' => array(
                'enrollment_widgets_name'       => 'section_bg_image',
                'enrollment_widgets_title'      => __( 'Section Background Image', 'enrollment' ),
                'enrollment_widgets_field_type' => 'upload',
            ),

            'section_content' => array(
                'enrollment_widgets_name'         => 'section_content',
                'enrollment_widgets_title'        => __( 'Section Content', 'enrollment' ),
                'enrollment_widgets_row'          => 5,
                'enrollment_widgets_field_type'   => 'textarea'
            ),

            'section_btn_text' => array(
                'enrollment_widgets_name'         => 'section_btn_text',
                'enrollment_widgets_title'        => __( 'Section Button Text', 'enrollment' ),
                'enrollment_widgets_field_type'   => 'text'
            ),

            'section_btn_url' => array(
                'enrollment_widgets_name'         => 'section_btn_url',
                'enrollment_widgets_title'        => __( 'Section Button Url', 'enrollment' ),
                'enrollment_widgets_field_type'   => 'url'
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

        $enrollment_section_bg_image   = empty( $instance['section_bg_image'] ) ? '' : $instance['section_bg_image'];
        $enrollment_section_content    = empty( $instance['section_content'] ) ? '' : $instance['section_content'];
        $enrollment_section_btn_text   = empty( $instance['section_btn_text'] ) ? '' : $instance['section_btn_text'];
        $enrollment_section_btn_url    = empty( $instance['section_btn_url'] ) ? '' : $instance['section_btn_url'];

        echo $before_widget;
    ?>
            <div class="section-wrapper enrollment-widget-wrapper" style="background-image:url('<?php echo esc_url( $enrollment_section_bg_image ); ?>'); background-position: center; background-attachment: fixed; background-size: cover;">
                <div class="cv-container">
                    <div class="cta-content-wrapper">
                        <div class="cta-content"><?php echo esc_html( $enrollment_section_content ); ?></div>
                        <?php if( !empty( $enrollment_section_btn_text ) ) { ?>
                            <div class="cta-btn-wrap">
                                <a href="<?php echo esc_url( $enrollment_section_btn_url ); ?>"><?php echo esc_html( $enrollment_section_btn_text ); ?></a>
                            </div>
                        <?php } ?>
                    </div>
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