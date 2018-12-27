<?php
/**
 * Event section
 *
 * This is the template for the content of event section
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
if ( ! function_exists( 'firm_graphy_add_event_section' ) ) :
    /**
    * Add event section
    *
    *@since Firm Graphy 1.0.0
    */
    function firm_graphy_add_event_section() {
    	$options = firm_graphy_get_theme_options();
        // Check if event is enabled on frontpage
        $event_enable = apply_filters( 'firm_graphy_section_status', true, 'event_section_enable' );

        if ( true !== $event_enable ) {
            return false;
        }
        // Get event section details
        $section_details = array();
        $section_details = apply_filters( 'firm_graphy_filter_event_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render event section now.
        firm_graphy_render_event_section( $section_details );
    }
endif;

if ( ! function_exists( 'firm_graphy_get_event_section_details' ) ) :
    /**
    * event section details.
    *
    * @since Firm Graphy 1.0.0
    * @param array $input event section details.
    */
    function firm_graphy_get_event_section_details( $input ) {
        $options = firm_graphy_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 2; $i++ ) {
            if ( ! empty( $options['event_content_page_' . $i] ) )
                $page_ids[] = $options['event_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 2,
            'orderby'           => 'post__in',
            );                    
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = firm_graphy_trim_content( 15 );

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
// event section content details.
add_filter( 'firm_graphy_filter_event_section_details', 'firm_graphy_get_event_section_details' );


if ( ! function_exists( 'firm_graphy_render_event_section' ) ) :
  /**
   * Start event section
   *
   * @return string event content
   * @since Firm Graphy 1.0.0
   *
   */
   function firm_graphy_render_event_section( $content_details = array() ) {
        $options = firm_graphy_get_theme_options();
        $i = 1;        

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="education" class="relative page-section no-padding-top">
                <div class="wrapper">
                    <div class="education-content-wrapper <?php echo ! empty( $options['event_image'] ) ? 'has' : 'no'; ?>-featured-image">
                        <?php if ( ! empty( $options['event_image'] ) ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $options['event_image'] ); ?>');"></div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <?php if ( ! empty( $options['event_title'] ) ) : ?>
                                <div class="section-header">
                                    <h2 class="section-title"><?php echo esc_html( $options['event_title'] ); ?></h2>
                                </div><!-- .section-header -->
                            <?php endif;

                             foreach ( $content_details as $content ) : ?>
                                <div class="education-wrapper">
                                    <div class="icon-container">
                                        <?php echo firm_graphy_get_svg( array( 'icon' => 'check' ) ); ?>
                                    </div><!-- .icon-container -->

                                    <div class="header-wrapper"> 
                                        <header class="entry-header">   
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->
                                    </div><!-- .header-wrapper -->
                                </div><!-- .education-wrapper -->
                            <?php $i++; endforeach;  ?>
                        </div><!-- .entry-container -->
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #education -->
        
    <?php }
endif;