<?php
/**
 * Widget for Latest News Section (Blog)
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

add_action( 'widgets_init', 'edigital_register_latest_blog_widget' );

function edigital_register_latest_blog_widget() {
    register_widget( 'EDigital_Latest_Blog' );
}

class EDigital_Latest_Blog extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'edigital_latest_blog',
            'description' => __( 'This widget shows the latest posts from selected categories.', 'edigital' )
        );
        parent::__construct( 'edigital_latest_blog', __( 'EDigital: Latest Blog', 'edigital' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $edigital_categories_lists = edigital_categories_lists();
        
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

            'section_cat_ids' => array(
                'edigital_widgets_name'         => 'section_cat_ids',
                'edigital_widgets_title'        => __( 'Section Categories', 'edigital' ),
                'edigital_widgets_field_type'   => 'multicheckboxes',
                'edigital_widgets_field_options' => $edigital_categories_lists
            ),

            'section_post_count' => array(
                'edigital_widgets_name'         => 'section_post_count',
                'edigital_widgets_title'        => __( 'Section Post Count', 'edigital' ),
                'edigital_widgets_default'      => 3,
                'edigital_widgets_field_type'   => 'number'
            ),

            'section_btn_text' => array(
                'edigital_widgets_name'         => 'section_btn_text',
                'edigital_widgets_title'        => __( 'Section button text', 'edigital' ),
                'edigital_widgets_field_type'   => 'text'
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
        $edigital_section_cat_ids  = empty( $instance['section_cat_ids'] ) ? '' : $instance['section_cat_ids'];
        $edigital_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];
        $edigital_section_btn_text = empty( $instance['section_btn_text'] ) ? __( 'Read More', 'edigital' ) : $instance['section_btn_text'];


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
                <?php
                    if( !empty( $edigital_section_cat_ids ) ) {
                        $checked_cats = array();
                        foreach( $edigital_section_cat_ids as $cat_key => $cat_value ){
                            $checked_cats[] = $cat_key;
                        }
                        $get_checked_cat_ids = implode( ",", $checked_cats );

                        $latest_blog_args = array(
                                    'post_type' => 'post',
                                    'cat' => esc_attr( $get_checked_cat_ids ),
                                    'posts_per_page' => absint( $edigital_section_post_count )
                                );
                        $latest_blog_query = new WP_Query( $latest_blog_args );
                ?>
                    <div class="latest-posts-wrapper mt-column-wrapper">
                    <?php
                        if( $latest_blog_query->have_posts() ) {
                            while( $latest_blog_query->have_posts() ) {
                                $latest_blog_query->the_post();
                    ?>
                            <div class="single-post-wrapper mt-column-3">
                                
                                <?php if( has_post_thumbnail() ) { ?>
                                	<div class="post-thumb">
	                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
	                                        <figure><?php the_post_thumbnail( 'edigital-home-blog' ); ?></figure>
	                                    </a>
                                        <div class="blog-date">
                                            <span class="date-month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
                                            <span class="date-day"><?php echo esc_html( get_the_date( 'd' ) ); ?></span>
                                        </div><!-- .blog-date -->
                                    </div><!-- .post-thumb -->
                                <?php } ?>                                

                                <div class="blog-content-wrapper">
                                    <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-meta">
                                        <?php edigital_posted_on(); ?>
                                     </div>
                                    <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                    <a class="news-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php echo esc_html( $edigital_section_btn_text ); ?></a>
                                </div><!-- .blog-content-wrapper -->
                                
                            </div><!-- .single-post-wrapper -->
                    <?php
                            }
                        }
                    ?>
                        </div><!-- .latest-posts-wrapper -->
                <?php
                    }
                ?>
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