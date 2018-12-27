<?php
/**
 * Widget for sponsors
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

class Enrollment_Sponsors extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'enrollment_sponsors',
            'description' => __( 'Display posts from sponsors category', 'enrollment' )
        );
        parent::__construct( 'enrollment_sponsors', __( 'CV: Sponsors', 'enrollment' ), $widget_ops );
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

        $enrollment_section_title      = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        $enrollment_section_cat_slug   = empty( $instance['section_cat_slug'] ) ? '' : $instance['section_cat_slug'];


        if( !empty( $enrollment_section_title ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        echo $before_widget;

    ?>
        <div class="section-wrapper enrollment-widget-wrapper">
            <div class="cv-container">
                <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?>">
                    <?php
                        if( !empty( $enrollment_section_title ) ) {
                            echo $before_title . esc_html( $enrollment_section_title ) . $after_title;
                        }
                    ?>
                </div><!-- .section-title-wrapper -->
                <?php 
                    if( $enrollment_section_cat_slug ) {
                        $client_args = array(
                            'post_type'       => 'post',
                            'posts_per_page'  => 5,
                            'category_name'   => esc_attr( $enrollment_section_cat_slug )
                        );
                        $client_query = new WP_Query( $client_args );
                        if( $client_query->have_posts() ) {
                            echo '<div class="sponsor-wrapper">';
                            while( $client_query->have_posts() ) {
                                $client_query->the_post();
                                if( has_post_thumbnail() ) {
                        ?>
                                <figure><?php the_post_thumbnail( 'medium' ); ?></figure>
                        <?php
                                }
                            }
                            echo '</div>';
                        }

                        wp_reset_postdata();
                    }
                ?>
            </div><!-- .enrollment-container-->
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
