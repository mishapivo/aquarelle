<?php
/**
 * Widget for Latest News Section
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

class Enrollment_Latest_Blog extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'enrollment_latest_blog',
            'description' => __( 'Display latest posts except from selected categories.', 'enrollment' )
        );
        parent::__construct( 'enrollment_latest_blog', __( 'CV: Latest Blog', 'enrollment' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $enrollment_categories_lists = enrollment_categories_lists();
        
        $fields = array(

            'section_title' => array(
                'enrollment_widgets_name'         => 'section_title',
                'enrollment_widgets_title'        => __( 'Section Title', 'enrollment' ),
                'enrollment_widgets_field_type'   => 'text'
            ),

            'section_cat_slugs' => array(
                'enrollment_widgets_name'         => 'section_cat_slugs',
                'enrollment_widgets_title'        => __( 'Section Categories', 'enrollment' ),
                'enrollment_widgets_field_type'   => 'multicheckboxes',
                'enrollment_widgets_field_options' => $enrollment_categories_lists
            ),

            'section_post_count' => array(
                'enrollment_widgets_name'         => 'section_post_count',
                'enrollment_widgets_title'        => __( 'Section Post Count', 'enrollment' ),
                'enrollment_widgets_default'      => 6,
                'enrollment_widgets_field_type'   => 'number'
            ),

            'section_btn_text' => array(
                'enrollment_widgets_name'         => 'section_btn_text',
                'enrollment_widgets_title'        => __( 'Section button text', 'enrollment' ),
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
        $enrollment_section_cat_slugs  = empty( $instance['section_cat_slugs'] ) ? '' : $instance['section_cat_slugs'];
        $enrollment_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];
        $enrollment_section_btn_text   = empty( $instance['section_btn_text'] ) ? __( 'Read More', 'enrollment' ) : $instance['section_btn_text'];


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
                    if( !empty( $enrollment_section_cat_slugs ) ) {
                        $checked_cats = array();
                        foreach( $enrollment_section_cat_slugs as $cat_key => $cat_value ){
                            $checked_cats[] = $cat_key;
                        }
                        $get_checked_cat_slugs = implode( ",", $checked_cats );

                        $latest_blog_args = array(
                            'post_type'      => 'post',
                            'category_name'  => wp_kses_post( $get_checked_cat_slugs ),
                            'posts_per_page' => absint( $enrollment_section_post_count )
                        );
                        $latest_blog_query = new WP_Query( $latest_blog_args );
                ?>
                    <div class="latest-posts-wrapper cv-column-wrapper">
                    <?php
                        if( $latest_blog_query->have_posts() ) {
                            while( $latest_blog_query->have_posts() ) {
                                $latest_blog_query->the_post();
                    ?>
                            <div class="single-post-wrapper cv-column-3">
                                <div class="post-thumb">
                                <?php if( has_post_thumbnail() ) { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail( 'enrollment-blog-medium' ); ?>
                                    </a>
                                <?php } ?>
                                </div>

                                <div class="blog-content-wrapper">
                                    <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-meta">
                                        <?php enrollment_posted_on(); ?>
                                     </div>
                                    <div class="post-excerpt">
                                        <?php 
                                            $post_content = get_the_content();
                                            echo wp_kses_post( enrollment_get_excerpt( $post_content, 150 ) );
                                        ?>
                                    </div>
                                    <a class="news-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php echo esc_html( $enrollment_section_btn_text ); ?></a>
                                </div>
                            </div><!-- .single-post-wrapper -->
                    <?php
                            }
                        }
                        wp_reset_postdata();
                    ?>
                        </div><!-- .latest-posts-wrapper -->
                <?php
                    }
                ?>
            </div><!-- .enrollment-container -->
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