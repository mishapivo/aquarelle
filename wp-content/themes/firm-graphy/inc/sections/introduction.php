<?php
/**
 * Introduction section
 *
 * This is the template for the content of introduction section
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
if ( ! function_exists( 'firm_graphy_add_introduction_section' ) ) :
    /**
    * Add introduction section
    *
    *@since Firm Graphy 1.0.0
    */
    function firm_graphy_add_introduction_section() {
    	$options = firm_graphy_get_theme_options();
        // Check if introduction is enabled on frontpage
        $introduction_enable = apply_filters( 'firm_graphy_section_status', true, 'introduction_section_enable' );

        if ( true !== $introduction_enable ) {
            return false;
        }
        // Get introduction section details
        $section_details = array();
        $section_details = apply_filters( 'firm_graphy_filter_introduction_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render introduction section now.
        firm_graphy_render_introduction_section( $section_details );
    }
endif;

if ( ! function_exists( 'firm_graphy_get_introduction_section_details' ) ) :
    /**
    * introduction section details.
    *
    * @since Firm Graphy 1.0.0
    * @param array $input introduction section details.
    */
    function firm_graphy_get_introduction_section_details( $input ) {
        $options = firm_graphy_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['introduction_content_page'] ) ? $options['introduction_content_page'] : '';
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
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = firm_graphy_trim_content( 50 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

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
// introduction section content details.
add_filter( 'firm_graphy_filter_introduction_section_details', 'firm_graphy_get_introduction_section_details' );


if ( ! function_exists( 'firm_graphy_render_introduction_section' ) ) :
  /**
   * Start introduction section
   *
   * @return string introduction content
   * @since Firm Graphy 1.0.0
   *
   */
   function firm_graphy_render_introduction_section( $content_details = array() ) {
        $options = firm_graphy_get_theme_options();
        $btn_label = ! empty( $options['introduction_btn_label'] ) ? $options['introduction_btn_label'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="work-experience" class="relative">
                <div class="wrapper">
                    <div class="work-section-wrapper <?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-featured-image">
                        <div class="entry-container">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <div class="section-header">
                                    <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                </div><!-- .section-header -->
                            <?php endif; 

                            if ( ! empty( $content['excerpt'] ) ) : ?>
                                <div class="section-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .section-content -->
                            <?php endif; 

                            if ( ! empty( $content['url'] ) && ! empty( $options['introduction_btn_label'] ) ) : ?>
                               <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_label ); ?></a>
                           <?php endif; ?>
                        </div><!-- .entry-container -->

                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <?php endif; ?>
                        </div><!-- .featured-image -->
                    </div><!-- .work-section-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- #work-experience -->
        <?php endforeach;
    }
endif;