<?php
/**
 * Widget for Course section.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

class Enrollment_Course extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'enrollment_course',
            'description' => __( 'Display posts from selected category show in fullwidth', 'enrollment' )
        );
        parent::__construct( 'enrollment_course', __( 'CV: Course', 'enrollment' ), $widget_ops );
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
                'enrollment_widgets_title'        => __( 'No. of Items', 'enrollment' ),
                'enrollment_widgets_default'      => 6,
                'enrollment_widgets_field_type'   => 'number'
            ),

            'section_read_more_text' => array(
                'enrollment_widgets_name'         => 'section_read_more_text',
                'enrollment_widgets_title'        => __( 'Read More Text', 'enrollment' ),
                'enrollment_widgets_field_type'   => 'text'
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

        $enrollment_section_title      = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        $enrollment_section_cat_slug   = empty( $instance['section_cat_slug'] ) ? '' : $instance['section_cat_slug'];
        $enrollment_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];
        $enrollment_read_more_text     = empty( $instance['section_read_more_text'] ) ? '' : $instance['section_read_more_text'];

        if( empty( $enrollment_section_cat_slug ) ) {
            return ;
        }

        if( !empty( $enrollment_section_title ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $course_args = array(
            'post_type'      => 'post',
            'category_name'  => esc_attr( $enrollment_section_cat_slug ),
            'posts_per_page' => absint( $enrollment_section_post_count )
        );
        $course_query = new WP_Query( $course_args );
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
                <div class="items-wrapper">
                    <?php
                        if( $course_query->have_posts() ) {
                            while( $course_query->have_posts() ) {
                                $course_query->the_post();
                    ?>
                                <div class="single-post-wrapper">
                                    <?php if( has_post_thumbnail() ) { ?>
                                        <div class="img-holder">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail( 'large' ); ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="courses-block-wrapper">
                                        <h3 class="courses-post-title"> <?php the_title(); ?> </h3>
                                        <div class="courses-post-content"> <?php the_excerpt(); ?> </div>
                                        <a class="courses-link" href="<?php the_permalink(); ?>"> <?php echo esc_html( $enrollment_read_more_text ); ?> <i class="fa fa-plus"> </i></a>
                                    </div>
                                </div><!-- .single-post-wrapper -->
                    <?php
                            }
                        }
                        wp_reset_postdata();
                    ?>
                </div><!-- .items-wrapper -->
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