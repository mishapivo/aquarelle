<?php
/**
 * Client section
 *
 * This is the template for the content of client section
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
if ( ! function_exists( 'firm_graphy_add_client_section' ) ) :
    /**
    * Add client section
    *
    *@since Firm Graphy 1.0.0
    */
    function firm_graphy_add_client_section() {
    	$options = firm_graphy_get_theme_options();
        // Check if client is enabled on frontpage
        $client_enable = apply_filters( 'firm_graphy_section_status', true, 'client_section_enable' );

        if ( true !== $client_enable ) {
            return false;
        }
        // Get client section details
        $section_details = array();
        $section_details = apply_filters( 'firm_graphy_filter_client_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render client section now.
        firm_graphy_render_client_section( $section_details );
    }
endif;

if ( ! function_exists( 'firm_graphy_get_client_section_details' ) ) :
    /**
    * client section details.
    *
    * @since Firm Graphy 1.0.0
    * @param array $input client section details.
    */
    function firm_graphy_get_client_section_details( $input ) {
        $options = firm_graphy_get_theme_options();
        $client_count = ! empty( $options['client_count'] ) ? $options['client_count'] : 3;
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 5; $i++ ) {
            if ( ! empty( $options['client_content_page_' . $i] ) )
                $page_ids[] = $options['client_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            );                    
        // Run The Loop.
        $query = new WP_Query( $args );
        $i = 0;
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// client section content details.
add_filter( 'firm_graphy_filter_client_section_details', 'firm_graphy_get_client_section_details' );


if ( ! function_exists( 'firm_graphy_render_client_section' ) ) :
  /**
   * Start client section
   *
   * @return string client content
   * @since Firm Graphy 1.0.0
   *
   */
   function firm_graphy_render_client_section( $content_details = array() ) {
        $options = firm_graphy_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } 
        ?>

        <div id="client-slider" class="page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['client_title'] ) ) : ?>
                    <div class="section-header align-center">
                        <h2 class="section-title"><?php echo esc_html( $options['client_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="regular" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "infinite": false, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": false }'>
                    <?php foreach ( $content_details as $content ) : 
                        if ( ! empty( $content['image'] ) ) : ?>
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="slick-item"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                        <?php endif; 
                    endforeach; ?>
                </div><!-- .testimonial-slider -->
            </div><!-- .wrapper -->
        </div><!-- #client-slider -->
    <?php }
endif;