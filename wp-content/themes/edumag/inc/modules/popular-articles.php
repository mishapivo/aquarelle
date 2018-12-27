<?php
/**
 * Popular articles section
 *
 * This is the template for the content of Popular articles section
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 1.0
 */

if ( ! function_exists( 'edumag_add_popular_articles_section' ) ) :
  /**
   * Add Popular articles section
   *
   * @since EduMag 1.0
   */
  function edumag_add_popular_articles_section() {

    // Check if Popular articles is enabled on frontpage
    $featured_category_enable = apply_filters( 'edumag_section_status', true, 'popular_articles_enable' );
    if ( true !== $featured_category_enable ) {
      return false;
    }

    // Get Popular articles section details
    $section_details = array();
    $section_details = apply_filters( 'edumag_filter_popular_articles_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Popular articles section now.
    edumag_render_popular_articles_section( $section_details );
  }
endif;
add_action( 'edumag_primary_content', 'edumag_add_popular_articles_section', 20 );

if ( ! function_exists( 'edumag_get_popular_articles_section_details' ) ) :
  /**
   * Popular articles section details.
   *
   * @since EduMag 1.0
   * @param array $input Popular articles section details.
   */
  function edumag_get_popular_articles_section_details( $input ) {
    $options = edumag_get_theme_options();

    // Popular articles type

    $content = array();
    $cat_id = ! empty( $options['popular_articles_content_category'] ) ? $options['popular_articles_content_category'] : '';
        
    // Fetch posts.
    $args = array( 
        'post_type'      => 'post',
        'cat'            => absint( $cat_id ),
        'posts_per_page' => 2,
        'ignore_sticky_posts' => true,
    );

    $category_posts = get_posts( $args );

    $i = 1;
    foreach( $category_posts as $category_post ){
        $post_id   = $category_post->ID;
        $img_array = array();

        if ( has_post_thumbnail( $post_id ) ) {
            $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'edumag-featured-popular-article' );
        } else {
            $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-450x300.jpg';
        }


        $content[$i]['img_array']    = $img_array;
        $content[$i]['url']          = get_permalink( $post_id );
        $content[$i]['title']        = get_the_title( $post_id );
        $content[$i]['excerpt']      = edumag_trim_content( 15, $category_post  );
        $content[$i]['date']         = get_the_date( '', $post_id );
        $content[$i]['cat_array']    = get_the_category( $post_id );

    $i++;
    }
    
    if ( !empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// Popular articles section content details.
add_filter( 'edumag_filter_popular_articles_section_details', 'edumag_get_popular_articles_section_details' );


if ( ! function_exists( 'edumag_render_popular_articles_section' ) ) :
  /**
   * Start Popular articles section
   *
   * @return string Popular articles content
   * @since EduMag 1.0
   *
   */
   function edumag_render_popular_articles_section( $content_details ) {
    if( empty(  $content_details ) ) return;

       $options                = edumag_get_theme_options(); // get theme options
       $sidebar_layout         = edumag_layout();
       $sidebar_disabled_class = !is_active_sidebar( 'popular_articles_sidebar' ) ? 'sidebar-disabled' : '';
    ?>
    <section id="popular-articles" class="page-section">
        <div class="container">
            <div class="main-content <?php echo esc_attr( $sidebar_disabled_class ); ?>">
            <?php 
                $section_header = ! empty( $options['popular_articles_title'] ) ? $options['popular_articles_title'] : '';

                if( !empty( $section_header ) ){ ?>
                    <header class="entry-header wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.4s">
                        <?php echo '<h2 class="entry-title">'. esc_html( $section_header ) .'</h2>'; ?>   
                    </header><!--.entry-header-->
                <?php   
                }
            ?>
                <div class="entry-content wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.3s">
                    
                        
                    <div class="tab-content active">
                        <div class="regular row" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "infinite": false, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": false, "draggable": false }'>

                            <?php foreach ( $content_details as $content ) : ?>
                                        <div class="slider-item">    
                                            <div class="image-wrapper">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'][0]); ?>" alt="<?php echo esc_attr( $content['title'] );?>"></a>
                                        <p class="cat-links">
                                          <?php 
                                              $cat_array = $content['cat_array'];
                                              $i = 1;
                                              foreach ($cat_array as $key => $cat ) {
                                                 echo '<a href="'. esc_url( get_category_link( $cat->term_id ) ) .'" class="category-name">'. esc_html( $cat->name ) .'</a>';
                                                 if( $i == 2 ) break;
                                                 $i++;
                                              }
                                          ?>
                                                </p><!-- .cat-links -->
                                            </div><!-- end .image-wrapper -->

                                    <div class="article-contents-wrapper">
                                        <div class="article-title">
                                            <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] );?></a></h2>
                                            <div class="title-bottom-line"></div>
                                        </div><!-- .article-title -->

                                        <div class="article-desc">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .article-desc -->

                                        <div class="article-entry-meta">
                                            <div class="pull-left">
                                                <time><?php echo date_i18n( esc_html__( 'M d, Y', 'edumag' ), strtotime( $content['date'] ) );?></time>
                                            </div><!--.pull-left-->

                                        </div><!-- .article-entry-meta -->

                                    </div><!-- end .article-contents-wrapper -->
                            </div><!-- .slider-item -->
                            <?php endforeach; ?>                       
                        </div><!-- .regular -->
                    </div><!-- #all-popular-article  -->

                    
                </div><!--.entry-content-->
            </div><!--.main-content-->
            <?php if( is_active_sidebar( 'popular_articles_sidebar' ) && ( 'no-sidebar' != $sidebar_layout ) ) : ?>
            <div class="section-sidebar wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.3s">
                <?php dynamic_sidebar('popular_articles_sidebar'); ?>
            </div><!--.section-sidebar-->
            <?php endif; ?>

        </div><!--.container-->
    </section><!--#popular-articles-->
    <?php 
    }
endif;
