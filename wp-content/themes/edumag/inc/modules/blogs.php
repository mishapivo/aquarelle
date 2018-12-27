<?php
/**
 * Blogs section
 *
 * This is the template for the content of Blogs section
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */
if ( ! function_exists( 'edumag_add_blogs_section' ) ) :
  /**
   * Add Blogs section
   *
   *@since EduMag 0.1
   */
  function edumag_add_blogs_section() {

    // Check if blog section is enabled on frontpage
    $blogs_section_enable = apply_filters( 'edumag_section_status', true, 'blogs_section_enable' );
    if ( true !== $blogs_section_enable ) {
      return false;
    }

    // Get Blogs section details
    $section_details = array();
    $section_details = apply_filters( 'edumag_filter_blogs_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Blogs section now.
    edumag_render_blogs_section( $section_details );
  }
endif;
add_action( 'edumag_primary_content_footer', 'edumag_add_blogs_section', 10 );


if ( ! function_exists( 'edumag_get_blogs_section_details' ) ) :
  /**
   * Blogs section details.
   *
   * @since EduMag 0.1
   * @param array $input Blogs section details.
   */
    function edumag_get_blogs_section_details( $input ) {
        $options = edumag_get_theme_options();

        // blog section type
        $content_type = $options['blogs_section_content_type'];

        $content = array();
        switch ( $content_type ) {
            
            case 'category':
                $cat_ids = array();
                for( $i=1; $i<=3; $i++ ){
                    if ( !empty( $options['blogs_section_content_category_'. $i] ) ) {
                        $cat_ids = array_merge( $cat_ids, array( $options['blogs_section_content_category_'. $i] ) );
                    }
                }

                // Bail if no valid pages are selected.
                if ( empty( $cat_ids ) ) {
                    return $input;
                }

                foreach ( $cat_ids as $key => $cat_id ) {
                    $args = array(
                        'cat'                 => $cat_id,
                        'posts_per_page'      => 1,
                        'orderby'             => 'DESC',
                        'ignore_sticky_posts' => true
                    );

                    $category_posts = get_posts( $args );

                    if( !empty( $category_posts ) ){
                        $post_id   = $category_posts[0]->ID;
                        $img_array = array();

                        if ( has_post_thumbnail( $post_id ) ) {
                            $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'edumag-featured-category-image' );
                        } else {
                            $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-450x300.jpg';
                        }   

                        $content[$cat_id]['img_array'] = $img_array;
                        $content[$cat_id]['url']          = get_permalink( $post_id );
                        $content[$cat_id]['title']        = get_the_title( $post_id );
                        $content[$cat_id]['cat_title']    = get_cat_name( $cat_id );
                        $content[$cat_id]['cat_url']      = get_category_link( $cat_id );
                        $content[$cat_id]['post_date']    = get_the_date( '', $post_id );

                    }
                }  
            break;

            default:
            break;
    }

    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// Blogs section content details.
add_filter( 'edumag_filter_blogs_section_details', 'edumag_get_blogs_section_details' );


if ( ! function_exists( 'edumag_render_blogs_section' ) ) :
  /**
   * Start Blogs section
   *
   * @return string blog section content
   * @since EduMag 0.1
   *
   */
   function edumag_render_blogs_section( $content_details  ) {
    if ( empty( $content_details ) ) return;
    $options = edumag_get_theme_options(); // get theme options 
    $content_type = $options['blogs_section_content_type']; 
    $count = count( $content_details );
    ?>
    <section id="blog" class="page-section">
        <div class="container">
            <div class="entry-content">
                <div class="row three-columns col-<?php echo absint( $count ); ?>">

                <?php foreach ( $content_details as $key => $content ) { ?>                    
                    <div class="column-wrapper wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
                        <div class="blog-post-wrapper">
                            <div class="image-wrapper">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'][0] ); ?>">
                                <div class="black-overlay"></div></a>
                            </div><!--.blog-image-->
                            <div class="blog-content">
                                <?php
                                    $category_url  = !empty( $content['cat_url'] ) ? $content['cat_url'] : '#';
                                    $category_name = !empty( $content['cat_title'] ) ? $content['cat_title'] : '';
                                ?>
                                <a href="<?php echo esc_url( $category_url ); ?>" class="category-name"><?php echo esc_html( $category_name ); ?></a>
                                <h3><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title']); ?></a></h3>
                                <time><?php echo date_i18n( esc_html__( 'M d, Y', 'edumag' ), strtotime( $content['post_date'] ) ); ?></time>
                            </div><!--.blog-content-->
                        </div><!--.blog-post-wrapper-->
                    </div><!--.column-wrapper-->
                <?php } ?>

                </div><!--.row-->
            </div><!-- .entry-content -->
        </div><!-- .container -->
    </section><!-- #blog -->
    <?php 
    }
endif;