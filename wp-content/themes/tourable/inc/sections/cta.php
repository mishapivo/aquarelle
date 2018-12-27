<?php
/**
 * Call to action section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
if ( ! function_exists( 'tourable_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Tourable 1.0.0
    */
    function tourable_add_cta_section() {
    	$options = tourable_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'tourable_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'tourable_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        tourable_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'tourable_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Tourable 1.0.0
    * @param array $input cta section details.
    */
    function tourable_get_cta_section_details( $input ) {
        $options = tourable_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = get_the_excerpt();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// cta section content details.
add_filter( 'tourable_filter_cta_section_details', 'tourable_get_cta_section_details' );


if ( ! function_exists( 'tourable_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Tourable 1.0.0
   *
   */
   function tourable_render_cta_section( $content_details = array() ) {
        $options = tourable_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="call-to-action" class="relative page-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="section-header">
                        <?php if ( ! empty( $content['title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->

                    <div class="section-content">
                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                    </div><!-- .section-content -->

                    <?php if ( ! empty( $content['url'] ) && ! empty( $options['cta_btn_title'] ) ) : ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-fill"><?php echo esc_html( $options['cta_btn_title'] ); ?></a>
                        </div><!-- .read-more -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #call-to-action -->

        <?php endforeach;
    }
endif;