<?php
/**
 * Widget for grid layout which is suitable for services/features and teams.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

class Enrollment_Testimonials extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'enrollment_testimonials',
            'description' => __( 'Display posts from selected category as testimonials layout.', 'enrollment' )
        );
        parent::__construct( 'enrollment_testimonials', __( 'CV: Testimonials', 'enrollment' ), $widget_ops );
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

            'section_bg_image' => array(
                'enrollment_widgets_name'         => 'section_bg_image',
                'enrollment_widgets_title'        => __( 'Section Background Image', 'enrollment' ),
                'enrollment_widgets_field_type'   => 'upload',
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
        $enrollment_section_info       = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
        $enrollment_section_bg_image   = empty( $instance['section_bg_image'] ) ? '' : $instance['section_bg_image'];
        $enrollment_section_cat_slug   = empty( $instance['section_cat_slug'] ) ? '' : $instance['section_cat_slug'];

        if( empty( $enrollment_section_cat_slug ) ) {
            return ;
        }

        if( !empty( $enrollment_section_title ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $testimonials_args = array(
            'post_type'      => 'post',
            'category_name'  => esc_attr( $enrollment_section_cat_slug ),
            'posts_per_page' => -1
        );
        $testimonials_query = new WP_Query( $testimonials_args );
        echo $before_widget;
    ?>
            <div class="section-wrapper enrollment-widget-wrapper" style="background-image:url('<?php echo esc_url( $enrollment_section_bg_image ); ?>'); background-position: center; background-attachment: fixed; background-size: cover;">
                <div class="cv-container">
                    <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?> clearfix">
                        <?php
                            if( !empty( $enrollment_section_title ) ) {
                                echo $before_title . esc_html( $enrollment_section_title ) . $after_title;
                            }
                        ?>
                    </div><!-- .section-title-wrapper -->

                    <div class="section-items-wrapper">
                        <?php
                            if( $testimonials_query->have_posts() ) {
                                echo '<ul class="testimonialsSlider">';
                                while( $testimonials_query->have_posts() ) {
                                    $testimonials_query->the_post();
                                    $image_id = get_post_thumbnail_id();
                                    $client_position = get_post( $image_id )->post_excerpt;
                        ?>
                                    <li>
                                        <div class="single-post-wrapper">
                                            <div class="testimonial-name-wrap">
                                                <h3 class="client-name"><?php the_title(); ?></h3>
                                                <span class="client-position"><?php echo esc_html( $client_position ); ?></span>
                                            </div>
                                            <div class="testimonial-content"><?php the_content(); ?></div>
                                            <?php if( has_post_thumbnail() ) { ?>
                                                <div class="img-holder">
                                                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                                                </div>
                                            <?php } ?>
                                        </div><!-- .single-post-wrapper -->
                                    </li>
                        <?php
                                }
                                echo '</ul>';
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