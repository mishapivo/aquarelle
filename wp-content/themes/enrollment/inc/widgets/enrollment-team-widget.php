<?php
/**
 * Widget for Team section.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

class Enrollment_Team extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'enrollment_team',
            'description' => __( 'Display posts from selected category show as team layout.', 'enrollment' )
        );
        parent::__construct( 'enrollment_team', __( 'CV: Team Member', 'enrollment' ), $widget_ops );
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
                'enrollment_widgets_title'        => __( 'Section Post Count', 'enrollment' ),
                'enrollment_widgets_default'      => 3,
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

        $enrollment_section_title      = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
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

        $enrollment_team_args = array(
            'post_type'      => 'post',
            'category_name'  => esc_attr( $enrollment_section_cat_slug ),
            'posts_per_page' => absint( $enrollment_section_post_count )
        );
        $enrollment_team_query = new WP_Query( $enrollment_team_args );
        echo $before_widget;
    ?>
            <div class="section-wrapper enrollment-widget-wrapper">
                <div class="cv-container">
                    <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?> clearfix">
                        <?php
                            if( !empty( $enrollment_section_title ) ) {
                                echo $before_title . esc_html( $enrollment_section_title ) . $after_title;
                            }
                        ?>
                    </div><!-- .section-title-wrapper -->
                    <div class="team-wrapper cv-column-wrapper">
                        <?php
                            if( $enrollment_team_query->have_posts() ) {
                                while( $enrollment_team_query->have_posts() ) {
                                    $enrollment_team_query->the_post();
                                    $image_id = get_post_thumbnail_id();
                                    $team_position = get_post( $image_id )->post_excerpt;
                        ?>
                                    <div class="single-post-wrapper cv-column-3">
                                        <?php if( has_post_thumbnail() ) { ?>
                                            <div class="img-holder">
                                                <?php the_post_thumbnail( 'enrollment-team-medium' ); ?>
                                                <div class="team-desc-wrapper">
                                                    <div class="team-desc"> <span> <?php the_excerpt(); ?> </span> </div>
                                                </div><!-- .team-desc -->
                                            </div><!-- .img-holder -->
                                        <?php } ?>
                                        <div class="team-title-wrapper">
                                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <span class="team-position"><?php echo esc_html( $team_position ); ?></span>
                                        </div>
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