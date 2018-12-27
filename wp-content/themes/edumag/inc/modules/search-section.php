<?php
/**
 * search section
 *
 * This is the template for the content of search section
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 1.0
 */

if ( ! function_exists( 'edumag_add_search_section' ) ) :
  /**
   * Add search section
   *
   * @since EduMag 1.0
   */
  function edumag_add_search_section() {

    // Check if search is enabled on frontpage
    $search_section_enable = apply_filters( 'edumag_section_status', true, 'search_section_enable' );
    if ( true !== $search_section_enable ) {
      return false;
    }

    // Get search section details
    $section_details = array();
    $section_details = apply_filters( 'edumag_filter_search_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render search section now.
    edumag_render_search_section( $section_details );
  }
endif;
add_action( 'edumag_primary_content', 'edumag_add_search_section', 30 );

if ( ! function_exists( 'edumag_get_search_section_details' ) ) :
  /**
   * search section details.
   *
   * @since EduMag 1.0
   * @param array $input search section details.
   */
  function edumag_get_search_section_details( $input ) {
    $options = edumag_get_theme_options();

    // search type

    $content = array();
    $id = ! empty( $options['search_content_page'] ) ? $options['search_content_page'] : '';
    if( ! empty ( $id ) ) {
        $args = array(
            'post_type'     => 'page',
            'page_id'       => absint( $id ),
        );
    }
    // Fetch posts.
    if ( ! empty( $args ) ) {
        $posts = get_posts( $args );
        foreach ( $posts as $key => $post ) {
            $page_id = $post->ID;
            $content[0]['title']        = get_the_title( $page_id );

            if ( has_post_thumbnail( $page_id ) ) {
                $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            } 
            if ( ! empty( $img_array ) ) {
                $content[0]['img_array'] = $img_array[0];
            }
        }
    }
    
    if ( !empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// search section content details.
add_filter( 'edumag_filter_search_section_details', 'edumag_get_search_section_details' );


if ( ! function_exists( 'edumag_render_search_section' ) ) :
  /**
   * Start search section
   *
   * @return string search content
   * @since EduMag 1.0
   *
   */
   function edumag_render_search_section( $content_details ) {
        if( empty(  $content_details ) ) return;

        $options                = edumag_get_theme_options(); // get theme options
        $search_button_text     = !empty( $options['search_section_button_text'] ) ? $options['search_section_button_text'] : esc_html__( 'Search', 'edumag' );

        foreach ( $content_details as $content ) :
        ?>
            <section id="fixed-background" class="page-section wow fadeInDown" data-wow-delay="0.3s" data-wow-duration="0.3s" style="background-image: url('<?php echo ! empty( $content['img_array'] ) ? esc_url( $content['img_array'] ) : esc_url( get_template_directory_uri() . '/assets/uploads/success.jpg' ); ?>');">
                <div class="blue-overlay"></div>
                <div class="container">
                    <header class="entry-header wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.5s">
                        <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                    </header><!--.entry-header-->

                    <div class="entry-content wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.5s">
                        <form action="<?php echo esc_url( home_url('/') ); ?>" role="search" method="get" >
                            <input type="text" name="s">
                            <i class="fa fa-search"></i>
                            <button type="submit" class="btn btn-orange"><?php echo esc_html( $search_button_text ); ?></button>
                        </form>
                    </div><!--.entry-content-->
                </div><!--.container-->
            </section><!--.fixed-background-->
        <?php 
        endforeach;
    }
endif;
