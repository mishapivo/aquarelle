<?php
/**
 * Display Widget
 *
 * @package Blogger_Era
 */

/**
* A widget that display Latest Blog
*/
class Blogger_Era_Latest_Blog extends WP_Widget
{

    function __construct() {

        global $control_ops;

        $widget_ops = array(
            'classname'   => 'latest-post',
            'description' => esc_html__( 'Add Widget to Display Latest Blog.', 'blogger-era' )
        );

        parent::__construct( 'blogger_era_latest_blog',esc_html__( 'Blogger Era: Latest Blog', 'blogger-era' ), $widget_ops, $control_ops );
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'blogger-era' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php echo esc_html__( 'Number of posts to show:', 'blogger-era' );?></label>
        <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="4" /></p>

        <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php echo esc_html__( 'Display post date?', 'blogger-era' ); ?></label></p>      


        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }

    function widget( $args, $instance ) {

    $title = ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) : esc_html__( 'Latest Blog','blogger-era' );

    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
    if ( ! $number )
    $number = 4;

    $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => absint( $number ),
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) ) );
    echo $args['before_widget'];     
        if ($r->have_posts()) : ?>           

                <?php if ( $title ) : ?>
                    <h2 class="widget-title"><?php echo esc_html( $title );?></h2>
                <?php endif;?>

                <?php while ( $r->have_posts() ) : $r->the_post(); ?>

                    <article class="post">

                        <?php if ( has_post_thumbnail() ) : ?>

                            <figure>

                                <?php the_post_thumbnail( 'thumbnail' );?>

                            </figure>

                        <?php endif;?>
                        

                        <div class="post-wrap">
                            <?php blogger_era_categories();?>
                            <header class="entry-header">
                                <h2 class="entry-title">

                                <a href="<?php the_permalink();?>"><?php the_title();?></a>

                                </h2>
                            </header>

                            <?php if ( $show_date ) : ?>

                                <div class="entry-meta">
                                    <?php blogger_era_posted_on(); ?>
                                </div>

                            <?php endif;?> 
                        </div>

                    </article>
                <?php endwhile;
                wp_reset_postdata();?>
        <?php endif;
    echo $args['after_widget'];    
    } 

}

if ( ! class_exists( 'Blogger_Era_Social_Widget' ) ) :

    /**
     * Social widget class.
     *
     * @since 1.0.0
     */
    class Blogger_Era_Social_Widget extends WP_Widget {
        /**
        * Constructor.
        *
        * @since 1.0.0
        */
        function __construct() {
            $opts = array(
            'classname'   => 'follow-us',
            'description' => esc_html__( 'Social Link Widget', 'blogger-era' ),
            );
            parent::__construct( 'blogger-era-social', esc_html__( 'Blogger Era: Social', 'blogger-era' ), $opts );
        }

        /**
        * Echo the widget content.
        *
        * @since 1.0.0
        *
        * @param array $args     Display arguments including before_title, after_title,
        *                        before_widget, and after_widget.
        * @param array $instance The settings for the particular instance of the widget.
        */
        function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            echo $args['before_widget'];

            if ( ! empty( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            if ( has_nav_menu( 'social-menu' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'social-menu',
                    'depth'          => 1,
                     'container'      => 'div',
                    'container_class'=> 'social-links inline-design',
                ) );
            }

            echo $args['after_widget'];

        }

        /**
        * Update widget instance.
        *
        * @since 1.0.0
        *
        * @param array $new_instance New settings for this instance as input by the user via
        *                            {@see WP_Widget::form()}.
        * @param array $old_instance Old settings for this instance.
        * @return array Settings to save or bool false to cancel saving.
        */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field( $new_instance['title'] );

            return $instance;
            }

            /**
            * Output the settings update form.
            *
            * @since 1.0.0
            *
            * @param array $instance Current settings.
            * @return void
            */
        function form( $instance ) {

            $instance = wp_parse_args( (array) $instance, array(
                'title' => '',
            ) );
            ?>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blogger-era' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <?php if ( ! has_nav_menu( 'social-menu' ) ) : ?>
                <p>
                <?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Theme Location.', 'blogger-era' ); ?>
                </p>
            <?php endif; ?>
            <?php
        }
    }

endif;

if ( ! class_exists( 'Blogger_Era_Instagram_Feeds_Widget' ) ) :

    /**
     * Instagram Feeds widget class.
     *
     * @since 1.0.0
     */
    class Blogger_Era_Instagram_Feeds_Widget extends WP_Widget {

        function __construct() {
            $opts = array(
                    'classname'   => 'blogger_era_widget_instagram',
                    'description' => esc_html__( 'Display Instagram Feeds.', 'blogger-era' ),
            );
            parent::__construct( 'blogger-era-instagram-feeds', esc_html__( 'Blogger Era: Instagram Feeds', 'blogger-era' ), $opts );
        }

        function widget( $args, $instance ) {

            $title              = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ); 

            $label_text         = ! empty( $instance['label_text'] ) ? $instance['label_text'] : false;

            $access_token       = ! empty( $instance['access_token'] ) ? $instance['access_token'] : false;
            
            $image_num          = ! empty( $instance['image_num'] ) ? absint( $instance['image_num'] ) : 8;

            echo $args['before_widget']; 

            if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } 

            $insta_feeds    = blogger_era_insta_feeds( $access_token, $image_num );

            $count          = count( $insta_feeds['images'] ); ?>

            <div class="feed-container">

                <?php
                if ( ! empty( $label_text ) ) {
                    echo '<h3 class="feed-title v-center">';
                    echo '<a href="' . esc_url( 'https://www.instagram.com/' . $insta_feeds['link'] ) . '/" target="_blank"><i class="fa fa-instagram"></i>' . esc_textarea( $label_text ) . '</a>';
                    echo '</h3>';
                }

                echo '<ul class="feed-thumbnails">';
                    for ( $i = 0; $i < $count; $i ++ ) {
                        if ( $insta_feeds['images'][ $i ] ) {
                            $insta_feeds['images'][ $i ] = preg_replace( '/s320x320/', 's150x150', $insta_feeds['images'][ $i ] );
                            echo '<li>';
                            echo '<a href="' . esc_url( $insta_feeds['images'][ $i ][1] ) . '" target="_blank"><img src="'.esc_url( $insta_feeds['images'][ $i ][0] ).'" alt=""></a>';
                            echo '</li>';
                        }
                    }
                echo '</ul>'; ?>

            </div>

            <?php 

            echo $args['after_widget'];

        }

        function update( $new_instance, $old_instance ) {

            $instance = $old_instance;

            $instance['title']          = sanitize_text_field( $new_instance['title'] );

            $instance['label_text']     = sanitize_text_field( $new_instance['label_text'] );

            $instance['access_token']   = sanitize_text_field( $new_instance['access_token'] );

            $instance['image_num']      = absint( $new_instance['image_num'] );

            return $instance;
        }

        function form( $instance ) {

            // Defaults.
            $defaults = array(
                'title'         => '',
                'label_text'    => '', 
                'access_token'  => '', 
                'image_num'     => 8,
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
            ?>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'blogger-era' ); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('label_text') ); ?>">
                    <?php esc_html_e('Label Text:', 'blogger-era'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('label_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('label_text') ); ?>" type="text" value="<?php echo esc_attr( $instance['label_text'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('access_token') ); ?>">
                    <?php esc_html_e('Access Token:', 'blogger-era'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('access_token') ); ?>" name="<?php echo esc_attr( $this->get_field_name('access_token') ); ?>" type="text" value="<?php echo esc_attr( $instance['access_token'] ); ?>" />
                <small>
                    <?php esc_html_e('You can generate Instagram Access Token online. For ex: ', 'blogger-era'); ?>  
                     <a href="<?php echo esc_url('http://instagram.pixelunion.net/'); ?>" target="_blank"><?php esc_html_e('Click Here', 'blogger-era'); ?></a>  
                </small>
            </p>
            

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('image_num') ); ?>">
                    <?php esc_html_e('Number of Image:', 'blogger-era'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('image_num') ); ?>" name="<?php echo esc_attr( $this->get_field_name('image_num') ); ?>" type="number" value="<?php echo absint( $instance['image_num'] ); ?>" />   
            </p>

        <?php
                
        }
    }

endif;


if ( ! function_exists( 'blogger_era_insta_feeds' ) ) :

function blogger_era_insta_feeds( $access_token, $image_num ) {    

    $count = $image_num;

    $url              = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . trim( $access_token ). '&count=' . trim( $count );

    $feeds_json         = wp_remote_fopen( $url );

    $feeds_obj          = json_decode( $feeds_json, true ); 

    $feeds_images_array = array();


    if ( 200 == $feeds_obj['meta']['code'] ) {

        if ( ! empty( $feeds_obj['data'] ) ) {

            foreach ( $feeds_obj['data'] as $data ) {
                array_push( $feeds_images_array, array( $data['images']['thumbnail']['url'], $data['link'] ) );
            }

            foreach ( $feeds_images_array as $key => $value ) {
                $feeds_images_array[ $key ] = preg_replace( '/s150x150/', 's320x320', $value );
            }

            $ending_array = array(
                'link'   => $feeds_obj['data'][0]['user']['username'],
                'images' => $feeds_images_array,
            );

            return $ending_array;
        }
    }
}

endif;


function Blogger_Era_Action_Latest_Blog() {

    register_widget( 'Blogger_Era_Latest_Blog' );
    register_widget( 'Blogger_Era_Social_Widget' );
    register_widget( 'Blogger_Era_Instagram_Feeds_Widget' );  

}
add_action( 'widgets_init', 'Blogger_Era_Action_Latest_Blog' );