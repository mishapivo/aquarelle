<?php
/**
 * Banner section
 *
 * This is the template for the content of banner section
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
if ( ! function_exists( 'firm_graphy_add_banner_section' ) ) :
    /**
    * Add banner section
    *
    *@since Firm Graphy 1.0.0
    */
    function firm_graphy_add_banner_section() {
    	$options = firm_graphy_get_theme_options();
        // Check if banner is enabled on frontpage
        $banner_enable = apply_filters( 'firm_graphy_section_status', true, 'banner_section_enable' );

        if ( true !== $banner_enable ) {
            return false;
        }
        // Get banner section details
        $section_details = array();
        $section_details = apply_filters( 'firm_graphy_filter_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render banner section now.
        firm_graphy_render_banner_section( $section_details );
    }
endif;

if ( ! function_exists( 'firm_graphy_get_banner_section_details' ) ) :
    /**
    * banner section details.
    *
    * @since Firm Graphy 1.0.0
    * @param array $input banner section details.
    */
    function firm_graphy_get_banner_section_details( $input ) {
        $options = firm_graphy_get_theme_options();

        // Content type.
        $content = array();
        $page_id = ! empty( $options['banner_content_page'] ) ? $options['banner_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = firm_graphy_trim_content( 25 );
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
// banner section content details.
add_filter( 'firm_graphy_filter_banner_section_details', 'firm_graphy_get_banner_section_details' );


if ( ! function_exists( 'firm_graphy_render_banner_section' ) ) :
  /**
   * Start banner section
   *
   * @return string banner content
   * @since Firm Graphy 1.0.0
   *
   */
   function firm_graphy_render_banner_section( $content_details = array() ) {
        $options = firm_graphy_get_theme_options();
        $btn_label = ! empty( $options['banner_btn_label'] ) ? $options['banner_btn_label'] : esc_html__( 'Learn More', 'firm-graphy' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="hero-banner">
                <div class="relative">
                    <div class="wrapper">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article class="hero-banner-wrapper <?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-featured-image">
                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                    </div><!-- .section-content -->

                                    <div class="buttons">
                                        <?php if ( ! empty( $content['url'] ) ) : ?>
                                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $btn_label ); ?></a>
                                        <?php endif;  ?>
                                    </div>
                                </div><!-- .entry-container -->
                           
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>
                            </article><!-- .hero-banner -->
                        <?php endforeach; ?>
                    </div><!-- .wrapper -->
                </div><!-- .hero-banner-wrapper -->

            </div><!-- #hero-banner -->
        
    <?php }
endif;