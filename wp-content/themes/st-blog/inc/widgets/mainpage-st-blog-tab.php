<?php

if ( ! class_exists( 'st_blog_tab_widget' ) ) :

    /**
     * Latest News Widget Class
     *
     * @since st-blog 1.0.0
     *
     */
    class st_blog_tab_widget extends WP_Widget {

        function __construct()
        {
            parent :: __construct(
                'st-blog-tab-widget', //base_id
                esc_html__('ST Tab Widget','st-blog'),
                array( 'description' => esc_html__( 'Home page two column third widgets', 'st-blog' ) ) // Args
            );
        }


        function widget( $args, $instance ) {
            extract( $args );
            $title                  = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base );
            $popular_heading        = ! empty( $instance['popular_heading'] ) ? $instance['popular_heading'] : '';
            $popular_category       = ! empty( $instance['popular_category'] ) ? $instance['popular_category'] : 0;
            $popular_number         = ! empty( $instance['popular_number'] ) ? $instance['popular_number'] : 5;
            $recent_heading         = ! empty( $instance['recent_heading'] ) ? $instance['recent_heading'] : '';
            $recent_category        = ! empty( $instance['recent_category'] ) ? $instance['recent_category'] : 0;
            $recent_number          = ! empty( $instance['recent_number'] ) ? $instance['recent_number'] : 5;
            $comments_heading       = ! empty( $instance['comments_heading'] ) ? $instance['comments_heading'] : '';
            $comments_number        = ! empty( $instance['comments_number'] ) ? $instance['comments_number'] : 5;

            $custom_class           = apply_filters( 'widget_custom_class', empty( $instance['custom_class'] ) ? '' : $instance['custom_class'], $instance, $this->id_base );
            $featured_image         = ! empty( $instance['featured_image'] ) ? $instance['featured_image'] : 'st-blog-recent-sidebar';
            $excerpt_length         = ! empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 50;

            // Add Custom class
            if ( $custom_class ) {
                $before_widget      = str_replace( 'class="', 'class="'. $custom_class . ' ', $before_widget );
            }
    
            $tab_id = 'tabbed-' . $this->number;

           echo wp_kses_post($args['before_widget']);
           ?>
            <div id="st-blog-popular-posts" class="widget widget_popular_posts">
                <?php 
                // Title
                if ( $title ) 
                    echo wp_kses_post($before_title . $title . $after_title);
                ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php if (!empty($popular_heading) ) { ?>
                        <li class="nav-item">
                            <a href="#<?php echo esc_attr( $tab_id ); ?>-popular" class="nav-link active" data-toggle="tab" role="tab" aria-controls="<?php echo esc_attr( $tab_id ); ?>-popular" aria-selected="true"><?php echo esc_html($popular_heading);?></a>
                        </li>
                    <?php } ?>    
                    <?php if (!empty($recent_heading) ) { ?>
                        <li class="nav-item">
                            <a href="#<?php echo esc_attr( $tab_id ); ?>-recent" class="nav-link" data-toggle="tab" role="tab" aria-controls="<?php echo esc_attr( $tab_id ); ?>-recent" aria-selected="false"><?php echo esc_html($recent_heading);?></a>
                        </li>
                    <?php } ?>    
                    <?php if( !empty($comments_heading) ) { ?>
                        <li class="nav-item">
                            <a href="#<?php echo esc_attr( $tab_id ); ?>-comments" class="nav-link" data-toggle="tab" role="tab" aria-controls="<?php echo esc_attr( $tab_id ); ?>-comments" aria-selected="false"><?php echo esc_html($comments_heading);?></a>
                        </li>
                    <?php } ?>    
                </ul> 
                <div class="clear"></div>  

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show " id="<?php echo esc_attr( $tab_id ); ?>-popular" role="tabpanel" aria-labelledby="<?php echo esc_attr( $tab_id ); ?>-popular-tab">
                        <?php $this->render_news( 'popular', $instance ); ?>
                    </div>
                    <div class="tab-pane fade" id="<?php echo esc_attr( $tab_id ); ?>-recent" role="tabpanel" aria-labelledby="<?php echo esc_attr( $tab_id ); ?>-recent-tab">
                        <?php $this->render_news( 'recent', $instance ); ?>
                    </div>
                    <div class="tab-pane fade" id="<?php echo esc_attr( $tab_id ); ?>-comments" role="tabpanel" aria-labelledby="<?php echo esc_attr( $tab_id ); ?>-comments-tab">
                        <?php $this->render_comments(  $instance ); ?>
                    </div>
                </div>
            </div>
           <?php

           echo wp_kses_post($args['after_widget']);
        }
        /**
         * Render news.
         *
         * @since 1.0.0
         *
         * @param array $type Type.
         * @param array $instance Parameters.
         * @return void
         */
        function render_news( $type, $instance ) {

                
            if ( ! in_array( $type, array( 'popular', 'recent' ) ) ) {
                return;
            }
            
            switch ( $type ) {
                case 'popular':
                    $qargs = array(

                        'post_type'         => 'post',
                        'posts_per_page'    => isset($instance['popular_number'] ) ? $instance['popular_number'] : '',
                        'no_found_rows'     => true,
                        'cat'               => isset($instance['popular_category'] ) ? $instance['popular_category'] : '',
                    );
                    break;

                case 'recent':
                    $qargs = array(
                        'post_type'         => 'post',
                        'posts_per_page'    => isset($instance['recent_number'] ) ? $instance['recent_number'] : '',
                        'no_found_rows'     => true,
                        'cat'               =>  isset($instance['recent_category'] ) ? $instance['recent_category'] : '',
                        );
                    
                    break;

                default:
                    break;
            }

            $all_posts = get_posts( $qargs );
            ?>
            <?php if ( ! empty( $all_posts ) ) : ?>
                <?php global $post; ?>

                <!-- <ul class="col-md-12  news-list"> -->
                <?php foreach ( $all_posts as $key => $post ) : ?>
                    <?php setup_postdata( $post ); ?>
                    
                    <div class="st-blog-popular-posts-item clearfix">
                        <div class="st-blog-popular-posts-img">
                            <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
                            <?php if ( ! empty( $image ) ) : ?>
                                    <a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="" /></a>
                                <?php endif; ?>
                            <?php else : ?>
                                <img class="img-responsive" src=" " alt="" />
                            <?php endif; ?>
                        </div>
                        <div class="st-blog-popular-posts-content">
                            <h4 class="st-blog-popular-posts-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                            <div class="post-meta-content">
                                <?php
                                    $author_name = get_the_author_meta('nickname');
                                    $author_url  = get_author_posts_url(get_the_author_meta('Id'));
                                ?>
                                <span class="author-link"><a href="<?php echo esc_url($author_url) .  esc_html($author_name)  ?>  "><?php echo esc_html($author_name);?></a></span>
                                <span class="date-link"><a href="<?php the_permalink();?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
                            </div><!-- post meta -->
                        </div><!-- tab-heading-title -->
                    </div><!-- tab-category-tags-wrapper -->

                <?php endforeach; ?>
                <!-- </ul>.news-list -->

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

            <?php

        }
        
        /**
         * Render comments.
         *
         * @since 1.0.0
         *
         * @param array $instance Parameters.
         * @return void
         */
        function render_comments(  $instance ) {
            $comment_args = array(
                'number'      => $instance['comments_number'],
                'status'      => 'approve',
                'post_status' => 'publish',
            );

            $comments = get_comments( $comment_args );
            ?>
            <?php if ( ! empty( $comments ) ) : ?>
                <ul class="comments-list">
                    <?php foreach ( $comments as $key => $comment ) : ?>
                        <li class="comment-list st-blog-popular-posts-item">
                            <div class="comments-thumb st-blog-popular-posts-img">
                                <?php $comment_author_url = get_comment_author_url( $comment ); ?>
                                <?php if ( ! empty( $comment_author_url) ) : ?>
                                    <a href="<?php echo esc_url( $comment_author_url ); ?>"><?php echo get_avatar( $comment, 65 ); ?></a>
                                <?php else : ?>
                                    <?php echo get_avatar( $comment, 65 ); ?>
                                <?php endif; ?>
                            </div><!-- .comments-thumb -->
                            <div class="comments-content st-blog-popular-posts-content">
                                <?php echo get_comment_author_link( $comment ); ?>&nbsp;<?php echo esc_html_x( 'on', 'Tabbed Widget', 'st-blog' ); ?>&nbsp;<a href="<?php echo esc_url( get_comment_link( $comment ) );?>"><?php echo get_the_title( $comment->comment_post_ID ); ?></a>
                            </div><!-- .comments-content -->
                        </li>
                    <?php endforeach; ?>
                </ul><!-- .comments-list -->
            <?php endif; ?>
            <?php
        }
       

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title']                  = sanitize_text_field(strip_tags($new_instance['title']));
            $instance['popular_heading']        = sanitize_text_field(strip_tags($new_instance['popular_heading']));
            $instance['popular_category']       = sanitize_text_field( $new_instance['popular_category'] );
            $instance['popular_number']         = absint( $new_instance['popular_number'] );
            $instance['recent_heading']         = sanitize_text_field(strip_tags($new_instance['recent_heading']));
            $instance['recent_category']        =  sanitize_text_field( $new_instance['recent_category'] );
            $instance['recent_number']          = absint( $new_instance['recent_number'] );
            $instance['comments_heading']       = sanitize_text_field(strip_tags($new_instance['comments_heading']));
            $instance['comments_number']        =  sanitize_text_field( $new_instance['comments_number'] );
            $instance['custom_class']           = sanitize_text_field( $new_instance['custom_class'] );
            

            return $instance;
        }

        function form( $instance ) {

            //Defaults
            $instance = wp_parse_args( (array) $instance, array(
                'title'             => '',
                'popular_heading'   => '',
                'popular_category'  => '',
                'popular_number'    => 5,
                'recent_heading'    => '',
                'recent_category'   => '',
                'recent_number'     => 5,
                'comments_heading'  => '',
                'comments_number'   => '',
                'custom_class'      => ''
               
            ) );
            $title             = strip_tags( $instance['title'] );
            $popular_heading   = strip_tags( $instance['popular_heading'] );
            $popular_category  = $instance['popular_category'];
            $popular_number    = absint( $instance['popular_number'] );
            $recent_heading    = strip_tags( $instance['recent_heading'] );
            $recent_category   = $instance['recent_category'];
            $recent_number     = absint( $instance['recent_number'] );
            $comments_heading  = strip_tags( $instance['comments_heading'] );
            $comments_number   = $instance['comments_number'];
            $custom_class      = esc_attr( $instance['custom_class'] );
            

            ?>
            
            <p>
                <label for="<?php echo absint($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'st-blog' ); ?></label>
                <input class="widefat" id="<?php echo absint($this->get_field_id('title')); ?>" name="<?php echo esc_html($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo absint($this->get_field_id('popular_heading')); ?>"><?php esc_html_e( 'Tab1 Heading Title:', 'st-blog' ); ?></label>
                <input class="widefat" id="<?php echo absint($this->get_field_id('popular_heading')); ?>" name="<?php echo esc_html($this->get_field_name( 'popular_heading' )); ?>" type="text" value="<?php echo esc_attr( $popular_heading ); ?>" />
            </p>

            <p>
                <label for="<?php echo absint($this->get_field_id( 'popular_category' )); ?>"><?php esc_html_e( 'Tab1 Category:', 'st-blog' ); ?></label>
                <?php
                $cat_args = array(
                    'orderby'         => 'name',
                    'hide_empty'      => 0,
                    'taxonomy'        => 'category',
                    'name'            => esc_html($this->get_field_name('popular_category')),
                    'id'              => absint($this->get_field_id('popular_category')),
                    'selected'        => $popular_category,
                    'show_option_all' => __( 'All Categories','st-blog' ),
                );
                wp_dropdown_categories( $cat_args );
                ?>
            </p>

            <p>
                <label for="<?php echo absint($this->get_field_id( 'popular_number' )); ?>"><?php esc_html_e('Number of Tab1 Posts:', 'st-blog' ); ?></label>
                <input class="widefat1" id="<?php echo absint($this->get_field_id( 'popular_number' )); ?>" name="<?php echo esc_html($this->get_field_name( 'popular_number' )); ?>" type="number" value="<?php echo absint( $popular_number ); ?>" min="1" style="max-width:50px;" />
            </p>
            <p>
                <label for="<?php echo absint($this->get_field_id('recent_heading')); ?>"><?php esc_html_e( 'Tab2 Heading Title:', 'st-blog' ); ?></label>
                <input class="widefat" id="<?php echo absint($this->get_field_id('recent_heading')); ?>" name="<?php echo esc_html($this->get_field_name( 'recent_heading' )); ?>" type="text" value="<?php echo esc_attr( $recent_heading ); ?>" />
            </p>

            <p>
                <label for="<?php echo absint($this->get_field_id( 'recent_category' )); ?>"><?php esc_html_e( 'Tab2 Category:', 'st-blog' ); ?></label>
                <?php
                $cat_args = array(
                    'orderby'         => 'name',
                    'hide_empty'      => 0,
                    'taxonomy'        => 'category',
                    'name'            => esc_html($this->get_field_name('recent_category')),
                    'id'              => absint($this->get_field_id('recent_category')),
                    'selected'        => $recent_category,
                    'show_option_all' => __( 'All Categories','st-blog' ),
                );
                wp_dropdown_categories( $cat_args );
                ?>
            </p>



            <p>
                <label for="<?php echo absint($this->get_field_id( 'recent_number' )); ?>"><?php esc_html_e('Number of tab2 Posts:', 'st-blog' ); ?></label>
                <input class="widefat1" id="<?php echo absint($this->get_field_id( 'recent_number' )); ?>" name="<?php echo esc_html($this->get_field_name( 'recent_number' )); ?>" type="number" value="<?php echo absint( $recent_number ); ?>" min="1" style="max-width:50px;" />
            </p>
            <p>
                <label for="<?php echo absint($this->get_field_id('comments_heading')); ?>"><?php esc_attr_e( 'Comment Heading Title:', 'st-blog' ); ?></label>
                <input class="widefat" id="<?php echo absint($this->get_field_id('comments_heading')); ?>" name="<?php echo esc_html($this->get_field_name( 'comments_heading' )); ?>" type="text" value="<?php echo esc_attr( $comments_heading ); ?>" />
            </p>
            <p>
                <label for="<?php echo absint($this->get_field_id( 'comments_number' )); ?>"><?php esc_attr_e('Number of Coments Posts:', 'st-blog' ); ?></label>
                <input class="widefat1" id="<?php echo absint($this->get_field_id( 'comments_number' )); ?>" name="<?php echo esc_html($this->get_field_name( 'comments_number' )); ?>" type="number" value="<?php echo absint( $comments_number ); ?>" min="1" style="max-width:50px;" />
            </p>
            
            <p>
                <label for="<?php echo absint($this->get_field_id('custom_class')); ?>"><?php esc_html_e( 'Custom Class:', 'st-blog' ); ?></label>
                <input class="widefat" id="<?php echo absint($this->get_field_id('custom_class')); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_class' )); ?>" type="text" value="<?php echo esc_attr( $custom_class ); ?>" />
            </p>
            <?php
        }
    }
    add_action( 'widgets_init', 'st_blog_tab_post' );

    if ( ! function_exists( 'st_blog_tab_post' ) ) :

        /**
         * Load widget
         *
         * @since st-blog 1.0.0
         *
         */
        function st_blog_tab_post(){
            // Latest News widget
            register_widget( 'st_blog_tab_widget' );
        }

    endif;

endif;