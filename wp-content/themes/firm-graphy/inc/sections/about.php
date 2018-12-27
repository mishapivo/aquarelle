<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
if ( ! function_exists( 'firm_graphy_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Firm Graphy 1.0.0
    */
    function firm_graphy_add_about_section() {
    	$options = firm_graphy_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'firm_graphy_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'firm_graphy_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        firm_graphy_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'firm_graphy_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Firm Graphy 1.0.0
    * @param array $input about section details.
    */
    function firm_graphy_get_about_section_details( $input ) {
        $options = firm_graphy_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
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
// about section content details.
add_filter( 'firm_graphy_filter_about_section_details', 'firm_graphy_get_about_section_details' );


if ( ! function_exists( 'firm_graphy_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Firm Graphy 1.0.0
   *
   */
   function firm_graphy_render_about_section( $content_details = array() ) {
        $options = firm_graphy_get_theme_options();
        $readmore = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : '';

        if ( empty( $content_details ) && empty( $options['about_skill'] ) ) {
            return;
        } 
        ?>
        
        <div id="skills" class="<?php echo ( ! empty( $content_details ) && ! empty( $options['about_skill'] ) ) ? 'col-2' : 'col-1'; ?>">
            <div class="wrapper">
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="hentry">
                        <div class="about-wrapper">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                </header>
                            <?php endif; 

                            if ( ! empty( $content['excerpt'] ) ) : ?>
                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                            <?php endif; 

                            if ( ! empty( $content['url'] ) && ! empty( $options['about_btn_title'] ) ) : ?>
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $readmore ); ?></a>
                            <?php endif; ?>
                        </div>
                    </article><!-- .hentry -->
                <?php endforeach; 

                if ( ! empty( $options['about_skill'] ) ) : ?>
                    <article class="hentry">
                        <div class="skills-wrapper">
                            <?php echo do_shortcode( wp_kses_post( $options['about_skill'] ) ); ?>
                        </div><!-- .skills-wrapper -->
                    </article><!-- .hentry -->
                <?php endif; ?>
            </div><!-- wrapper --> 
        </div><!-- #skills -->

    <?php
    }
endif;