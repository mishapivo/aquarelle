<?php
/**
 * Widget Social Links
 *
 * @package feminine munk
 */

// register feminine_munk_Social_Links widget  
function feminine_munk_register_social_links_widget(){
    register_widget( 'feminine_munk_Social_Links' );
}

add_action( 'widgets_init', 'feminine_munk_register_social_links_widget' );

/**
 * Adds feminine-munk_Social_Links widget.
 */
class feminine_munk_Social_Links extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct(){
        parent::__construct(
            'social_networks', // Base ID
            __( 'Social Links', 'feminine-munk' ), // Name
            array( 'description' => __( 'A Social Links Widget', 'feminine-munk' ), ) // Args
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

        $title      = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Social', 'feminine-munk' );
        $facebook   = !empty( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
        $twitter    = !empty( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
        $pinterest  = !empty( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '';
        $instagram  = !empty( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '';
        $linkedin   = !empty( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : '';
        $googleplus = !empty( $instance[ 'google_plus' ] ) ? $instance[ 'google_plus' ] : '';


        if ( $facebook || $twitter || $pinterest || $instagram || $linkedin || $googleplus ) {
            echo $args[ 'before_widget' ];

            echo $args[ 'before_title' ] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args[ 'after_title' ];
            ?>
            <ul>
                <?php 
                if ( $facebook ) { ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" class="facebook-icon" title="<?php esc_attr_e( 'Facebook', 'feminine-munk' ); ?>"><span class="fa fa-facebook"></span></a></li>
                <?php }
                if ( $twitter ) { ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank" class="twitter-icon" title="<?php esc_attr_e( 'Twitter', 'feminine-munk' ); ?>"><span class="fa fa-twitter"></span></a>
                    </li>
                <?php }
                if ( $pinterest ) { ?>
                    <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank" class="pinterest-icon" title="<?php esc_attr_e( 'Pinterest', 'feminine-munk' ); ?>"><span class="fa fa-pinterest-p"></span></a></li>
                <?php }
                if ( $instagram ) { ?>
                    <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" class="instagram-icon" title="<?php esc_attr_e( 'Instagram', 'feminine-munk' ); ?>"><span class="fa fa-instagram"></span></a>
                    </li>
                <?php }
                if ( $linkedin ) { ?>
                    <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" class="linkedin-icon" title="<?php esc_attr_e( 'Linkedin', 'feminine-munk' ); ?>"><span class="fa fa-linkedin"></span></a></li>
                <?php }
                if ( $googleplus ) { ?>
                    <li><a href="<?php echo esc_url( $googleplus ); ?>" target="_blank" class="google-plus-icon" title="<?php esc_attr_e( 'Google Plus', 'feminine-munk' ); ?>"><span class="fa fa-google-plus"></span></a></li>
                <?php } ?>
            </ul>
            <?php
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
    public function form( $instance ){

        $title      = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Social', 'feminine-munk' );
        $facebook   = !empty( $instance[ 'facebook' ] ) ? esc_url( $instance[ 'facebook' ] ) : '';
        $twitter    = !empty( $instance[ 'twitter' ] ) ? esc_url( $instance[ 'twitter' ] ) : '';
        $pinterest  = !empty( $instance[ 'pinterest' ] ) ? esc_url( $instance[ 'pinterest' ] ) : '';
        $instagram  = !empty( $instance[ 'instagram' ] ) ? esc_url( $instance[ 'instagram' ] ) : '';
        $linkedin   = !empty( $instance[ 'linkedin' ] ) ? esc_url( $instance[ 'linkedin' ] ) : '';
        $googleplus = !empty( $instance[ 'google_plus' ] ) ? esc_url( $instance[ 'google_plus' ] ) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'feminine-munk' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'feminine-munk' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_url( $facebook ); ?>"/>
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'feminine-munk' ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'feminine-munk' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_url( $twitter ); ?>"/>
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'feminine-munk' ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest', 'feminine-munk' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_url( $pinterest ); ?>"/>
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'feminine-munk' ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'feminine-munk' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_url( $instagram ); ?>"/>
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'feminine-munk' ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn', 'feminine-munk' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_url( $linkedin ); ?>"/>
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'feminine-munk' ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'google_plus' ) ); ?>"><?php esc_html_e( 'Google Plus', 'feminine-munk' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google_plus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google_plus' ) ); ?>" type="text" value="<?php echo esc_url( $googleplus ); ?>"/>
            <small><?php esc_html_e( 'Leave blank if you do not want to show.', 'feminine-munk' ); ?></small>
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
    public function update($new_instance, $old_instance){
        $instance = array();

        $instance[ 'title' ]       = !empty( $new_instance[ 'title' ] ) ? sanitize_text_field( $new_instance[ 'title' ] ) : __('Social', 'feminine-munk');
        $instance[ 'facebook' ]    = !empty( $new_instance[ 'facebook' ] ) ? esc_url_raw( $new_instance[ 'facebook' ] ) : '';
        $instance[ 'twitter' ]     = !empty( $new_instance[ 'twitter' ] ) ? esc_url_raw( $new_instance[ 'twitter' ] ) : '';
        $instance[ 'pinterest' ]   = !empty( $new_instance[ 'pinterest' ] ) ? esc_url_raw( $new_instance[ 'pinterest' ] ) : '';
        $instance[ 'instagram' ]   = !empty( $new_instance[ 'instagram' ] ) ? esc_url_raw( $new_instance[ 'instagram' ] ) : '';
        $instance[ 'linkedin' ]    = !empty( $new_instance[ 'linkedin' ] ) ? esc_url_raw( $new_instance[ 'linkedin' ] ) : '';
        $instance[ 'google_plus' ] = !empty( $new_instance[ 'google_plus' ] ) ? esc_url_raw( $new_instance[ 'google_plus' ] ) : '';

        return $instance;
    }

} // class feminine_munk_Social_Links 