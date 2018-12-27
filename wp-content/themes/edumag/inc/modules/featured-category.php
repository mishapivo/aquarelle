<?php
/**
 * Featured category section
 *
 * This is the template for the content of Featured category section
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */
if ( ! function_exists( 'edumag_add_featured_category_section' ) ) :
  /**
   * Add Featured category section
   *
   *@since EduMag 0.1
   */
  function edumag_add_featured_category_section() {

    // Check if Featured category is enabled on frontpage
    $featured_category_enable = apply_filters( 'edumag_section_status', true, 'featured_category_enable' );
    if ( true !== $featured_category_enable ) {
      return false;
    }

    // Get Featured category section details
    $section_details = array();
    $section_details = apply_filters( 'edumag_filter_featured_category_section_details', $section_details );
    if ( empty( $section_details ) ) {
      return;
    }

    // Render Featured category section now.
    edumag_render_featured_category_section( $section_details );
  }
endif;
add_action( 'edumag_primary_content', 'edumag_add_featured_category_section', 10 );


if ( ! function_exists( 'edumag_get_featured_category_section_details' ) ) :
  /**
   * Featured category section details.
   *
   * @since EduMag 0.1
   * @param array $input Featured category section details.
   */
  function edumag_get_featured_category_section_details( $input ) {
    $options = edumag_get_theme_options();

    // Featured category type
    $featured_category_content_type = $options['featured_category_content_type'];

    $content = array();
    switch ( $featured_category_content_type ) {
        case 'category':
            // Fetch posts.
            for( $i=1; $i<=4; $i++ ){
                $category_id = !empty( $options['featured_category_content_category_'. $i ] ) ? $options['featured_category_content_category_'. $i ] : '';
                
                if( !empty( $category_id ) ){
                    $args = array( 
                        'cat'                 => absint( $category_id ),
                        'posts_per_page'      => 1,
                        'ignore_sticky_posts' => true
                    );

                    $category_posts = get_posts( $args );

                    if( ! empty( $category_posts ) ){
                        $post_id   = $category_posts[0]->ID;
                        $img_array = array();

                        if ( has_post_thumbnail( $post_id ) ) {
                            $image_size = ( 1 === $i ) ? 'large' : 'edumag-featured-category-image';
                            $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $image_size );
                        }  else {
                            $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-450x300.jpg';
                        }   

                        $content[$i]['img_array']    = $img_array;
                        $content[$i]['url']          = get_permalink( $post_id );
                        $content[$i]['title']        = get_the_title( $post_id );
                        $content[$i]['cat_title']    = get_cat_name( $category_id );
                        $content[$i]['cat_url']      = get_category_link( $category_id );
                    }
                }
            }
        break;

        default:
        break;
    }
                                                                                                               
    if ( !empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// Featured category section content details.
add_filter( 'edumag_filter_featured_category_section_details', 'edumag_get_featured_category_section_details' );


if ( ! function_exists( 'edumag_render_featured_category_section' ) ) :
  /**
   * Start Featured category section
   *
   * @return string Featured category content
   * @since EduMag 0.1
   *
   */
   function edumag_render_featured_category_section( $content_details ) {
    ?>
    <section id="featured-category" class="page-section two-columns">
        <div class="shadow-overlay"></div>
        <div class="container">
        <?php   
            if ( empty( $content_details ) ) return;
            $options = edumag_get_theme_options(); // get theme options
            $count = count( $content_details );
        ?>
            <div class="column-wrapper">
                <?php 
                    $index = 1;
                    foreach ( $content_details as $content_detail ) :

                        $cat_html = array();
                    
                        if( 'category' == $options['featured_category_content_type'] ){
                            $cat_html[0] = '<a class="category-name" href="'. esc_url( $content_detail['cat_url'] ) .'">'. esc_html( $content_detail['cat_title'] ) .'</a>';
                        }

                        if( $index == 1 ){
                        ?>
                            <div class="featured-post-image" style="background-image: url('<?php echo esc_url( $content_detail['img_array'][0] ); ?>" >
                            </div><!-- .featured-post-image -->

                            <div class="featured-post-title">
                                <?php foreach( $cat_html as $value ) echo wp_kses_post( $value ); ?>
                                <div class="title-bottom-line"></div>
                                <h2 class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.3s"><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title']); ?></a></h2>
                            </div><!-- .featured-post-title -->

                    <?php 
                        } else{ ?>
                            <div class="featured-category-wrapper" style="background-image: url('<?php echo esc_url( $content_detail['img_array'][0] ); ?>')">

                                <div class="black-overlay"></div>
                                <div class="featured-category-contents">
                                    <?php foreach( $cat_html as $value ) echo wp_kses_post( $value ); ?>
                                    <h4><a href="<?php echo esc_url( $content_detail['url'] ); ?>"><?php echo esc_html( $content_detail['title']); ?></a></h4>
                                </div><!--.featured-category-contents-->
                            </div><!--.featured-category-wrapper-->

                    <?php }

                        $index++; 
                        if( $index == 2 && $count > 1 ){
                            echo '</div><!--.column-wrapper-->';
                            echo '<div class="column-wrapper">';
                        }

                endforeach; ?>
            </div><!--.column-wrapper-->
        </div><!--.container-->      
    </section><!-- #featured-category -->
    <?php 
    }
endif;