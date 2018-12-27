<?php
/**
 * Widget Featured Post
 *
 * @package feminine-munk
 */

// register Feminine_Munk_Featured_Post widget
function feminine_munk_register_featured_post_widget(){
    register_widget( 'Feminine_Munk_Featured_Post' );
}

add_action( 'widgets_init', 'feminine_munk_register_featured_post_widget' );

/**
 * Adds Feminine_Munk_Featured_Post widget.
 */
class Feminine_Munk_Featured_Post extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct(){
        parent::__construct(
            'about_us', // Base ID
            __( 'About Author ', 'feminine-munk' ), // Name
            array( 'description' => __( 'An About Author Widget', 'feminine-munk' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ){
        $show_thumbnail = !empty( $instance[ 'show_thumbnail' ] ) ? $instance[ 'show_thumbnail' ] : '';
        $post_id        = !empty( $instance[ 'post_list' ]) ? $instance[ 'post_list' ] : 1;

        if ( get_post_type( $post_id ) == 'post' ) {
            $qry = new WP_Query( "p=$post_id" );
        } else {
            $qry = new WP_Query( "page_id=$post_id" );
        }
        if ( $qry->have_posts() ) {
            echo $args[ 'before_widget' ];
            while ( $qry->have_posts()) {
                $qry->the_post();
                $title = get_the_title();
                if ( $title ) echo $args[ 'before_title' ] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args[ 'after_title' ];
                ?>
                <?php if ( has_post_thumbnail() && $show_thumbnail ) { ?>

                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'feminine-munk-author-post' ); ?>
                    </a>

                <?php } ?>
                <div class="text-holder">
                    <?php the_excerpt(); ?>
                </div>
                
                <?php
            }
            wp_reset_postdata();
            echo $args[ 'after_widget' ];
        }
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance){
        $postlist[0] = array(
            'value' => 0,
            'label' => __( '--Choose Page--', 'feminine-munk' ),
        );
        $arg = array( 'posts_per_page' => -1, 'post_type' => array( 'page' ) );
        $posts = get_posts( $arg );

        foreach ( $posts as $p ) {
            $postlist[ $p->ID ] = array(
                'value' => $p->ID,
                'label' => $p->post_title
            );
        }

        $show_thumbnail = !empty( $instance[ 'show_thumbnail' ]) ? $instance[ 'show_thumbnail' ] : '';
        $post_list      = !empty( $instance[ 'post_list' ]) ? $instance[ 'post_list' ] : 1;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'post_list' ) ); ?>"><?php esc_html_e( 'Choose Page', 'feminine-munk' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'post_list' ) ); ?>"
                    id="<?php echo esc_attr( $this->get_field_id( 'post_list' ) ); ?>" class="widefat">
                <?php
                foreach ( $postlist as $single_post ) { ?>
                    <option value="<?php echo esc_attr( $single_post[ 'value' ] ); ?>"
                            id="<?php echo esc_attr( $this->get_field_id( $single_post[ 'label' ] ) ); ?>" <?php selected( $single_post[ 'value' ], $post_list ); ?>><?php echo esc_html( $single_post[ 'label' ] ); ?></option>
                <?php } ?>
            </select>
        </p>

        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumbnail' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $show_thumbnail ); ?>/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'feminine-munk' ); ?></label>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ){
        $instance = array();

        $instance[ 'post_list' ]      = !empty( $new_instance[ 'post_list' ] ) ? absint( $new_instance[ 'post_list' ] ) : 1;
        $instance[ 'show_thumbnail' ] = !empty( $new_instance[ 'show_thumbnail' ] ) ? absint( $new_instance[ 'show_thumbnail' ] ) : '';
        return $instance;
    }

} // class feminine-munk_Featured_Post