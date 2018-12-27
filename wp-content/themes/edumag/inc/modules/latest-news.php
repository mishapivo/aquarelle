<?php
/**
 * Latest news
 *
 * This is the template for the content of Latest news
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if ( ! function_exists( 'edumag_add_latest_news_section' ) ) :
  /**
   * Add Latest news
   *
   *@since EduMag 0.1
   */

  function edumag_add_latest_news_section() {

    // Check if Search is enabled on frontpage
    $latest_news_enable = apply_filters( 'edumag_section_status', true, 'latest_news_enable' );
    if ( true !== $latest_news_enable ) {
        return false;
    }

    // Get Latest news details
    $section_details = array();
    $section_details = apply_filters( 'edumag_filter_latest_news_section_details', $section_details );

    if ( empty( $section_details ) ) {
      return;
    }

    // Render Latest news now.
    edumag_render_latest_news_section( $section_details );
  }
endif;
add_action( 'edumag_primary_content', 'edumag_add_latest_news_section', 60 );


if ( ! function_exists( 'edumag_get_latest_news_section_details' ) ) :
  /**
   * Latest news details.
   *
   * @since EduMag 0.1
   * @param array $input Latest news details.
   */
  function edumag_get_latest_news_section_details( $input ) {
    $options = edumag_get_theme_options();

    // Search type
    $latest_news_content_type   = $options['latest_news_content_type'];
    
    $content = array();
    switch ( $latest_news_content_type ) {

        case 'category':
            $cat_ids = '';
            if ( !empty( $options['latest_news_content_category'] ) ) {
                $cat_ids = $options['latest_news_content_category'];
            }
            
            // Bail if no valid pages are selected.
            if ( empty( $cat_ids ) ) {
                return $input;
            }

            $args = array(
                'post_type'      => 'post',
                'category__in'   => $cat_ids,
                'posts_per_page' => 11,// absint( get_option( 'posts_per_page' ) ),  Maximum number of posts to show on a page; set in Reading Options.,
                'orderby'        => 'ASC',
            );

            $all_posts = get_posts( $args );

            $k = 1;
            foreach ( $all_posts as $key => $post ) {
                $post_id   =  $post->ID;
                $img_array = array();

                if ( has_post_thumbnail( $post_id ) ) {
                    $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'edumag-featured-category-image' );
                } else {
                    $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-450x300.jpg';
                }

            

                $content['all'][$k]['img_array'] = $img_array;
                $content['all'][$k]['url']       = get_permalink( $post_id );
                $content['all'][$k]['title']     = get_the_title( $post_id );
                $content['all'][$k]['excerpt']   = edumag_trim_content( 28, $post  );
                $content['all'][$k]['date']      = get_the_date( '', $post_id );
                $content['all'][$k]['cat_array'] = get_the_category( $post_id );
            $k++;
            }

            foreach ( $cat_ids as $key => $cat_id ) {
                // Fetch posts.
                $args = array( 
                    'cat'            => absint( $cat_id ),
                    'posts_per_page' => 11,// absint( get_option( 'posts_per_page' ) ), // Maximum number of posts to show on a page; set in Reading Options.,
                    'orderby'        => 'ASC',
                );

                $category_posts = get_posts( $args );

                $i = 1;
                foreach( $category_posts as $category_post ){
                    $post_id   = $category_post->ID;
                    $img_array = array();

                    if ( has_post_thumbnail( $post_id ) ) {
                        $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'edumag-featured-category-image' );
                    } else {
                        $img_array[0] =  get_template_directory_uri().'/assets/uploads/no-featured-image-450x300.jpg';
                    }

                    $content[$cat_id][$i]['img_array']    = $img_array;
                    $content[$cat_id][$i]['url']          = get_permalink( $post_id );
                    $content[$cat_id][$i]['title']        = get_the_title( $post_id );
                    $content[$cat_id][$i]['excerpt']      = edumag_trim_content( 28, $category_post  );
                    $content[$cat_id][$i]['date']         = get_the_date( '', $post_id );
                    $content[$cat_id][$i]['cat_array']    = get_the_category( $post_id );
                $i++;
                }
            }
        break;

        default :
        break;
    }
    if ( ! empty( $content ) ) {
      $input = $content;
    }
    return $input;
  }
endif;
// Latest news content details.
add_filter( 'edumag_filter_latest_news_section_details', 'edumag_get_latest_news_section_details' );


if ( ! function_exists( 'edumag_render_latest_news_section' ) ) :
  /**
   * Start Latest news
   *
   * @return string Search content
   * @since EduMag 0.1
   *
   */
   function edumag_render_latest_news_section( $content_details ) {

    if( empty(  $content_details ) ){
       return; 
    } 

    $options                = edumag_get_theme_options(); // get theme options
    $content_type           = $options['latest_news_content_type'];
    $section_title          = $options['latest_news_title'];
    $sidebar_layout         = edumag_layout();
    $sidebar_disabled_class = !is_active_sidebar( 'latest_news_sidebar' ) ? 'no-sidebar' : '';
    ?>
     <section id="latest-news" class="page-section <?php echo esc_attr( $sidebar_disabled_class ); ?>">
        <div class="container">
            <div class="main-content">
            <?php if( !empty( $section_title ) ){ ?>
                <header class="entry-header wow fadeInDown" data-wow-delay="0.3s" data-wow-duration="0.3s">
                    <h2 class="entry-title"><?php echo esc_html( $section_title ); ?></h2>
                </header><!--.entry-header-->
            <?php } ?>
                <div class="entry-content  wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.3s">
                    <div class="tab-section">
                        <ul class="tabs">
                        <?php 
                            $cat_ids = array(); 

                            if( !empty( $options['latest_news_content_category'] ) ){
                                $cat_ids = $options['latest_news_content_category'];
                            }

                            if( !empty( $cat_ids ) ){
                                echo '<li class="tab-link active" data-tab="all-latest-news"><a href="#.">'. esc_html__( 'all', 'edumag' ) .'</a></li>';
                                foreach( $cat_ids as $cat ){
                                        $cat_object = get_category( $cat );

                                        $tab_id    = 'tab-news-'. $cat_object->slug;
                                        $tab_name  = get_cat_name( $cat_object->term_id );
                                    
                                        echo '<li class="tab-link" data-tab="'. esc_attr( $tab_id ) .'"><a href="#.">'. esc_html( $tab_name ) .'</a></li>';
                                }
                                
                            }
                        ?>
                        </ul>
                    </div><!--.tab-section-->

                    <?php 

                    foreach ( $content_details as $key => $content_detail ) :
                
                        if( $key == 'all' ){
                            $section_tab_id       = 'all-latest-news';
                            $section_active_class = 'active';
                        } else {
                            $cat_object = get_category( absint( $key ) );
                            $section_tab_id       = 'tab-news-'. $cat_object->slug;
                            $section_active_class = '';
                        }

                        $row_class = count( $content_detail ) > 1 ? 'two-columns' : 'one-column';

                    ?>
                    <div id="<?php echo esc_attr( $section_tab_id ); ?>" class="tab-content <?php echo esc_attr( $section_active_class ); ?>">
                        <div class="row <?php echo esc_attr( $row_class ); ?>">

                            <div class="column-wrapper">
                                <?php foreach ( $content_detail as $key => $content ) { ?>
                                <div class="article-wrapper"> 
                                    <div class="image-wrapper">
                                        <a href="<?php echo esc_url( $content['url']); ?>"><img src="<?php echo esc_url( $content['img_array'][0] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                        <p class="cat-links">
                                            <?php 
                                                $cat_link = '';
                                                $cat_name = '';
                                                
                                                $cat_array = $content['cat_array'];

                                                foreach ( $cat_array as $key => $category ) {
                                                    $cat_link = get_category_link( $category->term_id );
                                                    $cat_name = $category->name;
                                                }
                                            ?>
                                            <a href="<?php echo esc_url( $cat_link ); ?>" class="category-name"><?php echo esc_html( $cat_name ); ?></a>
                                        </p><!-- .cat-links -->
                                    </div><!-- end .image-wrapper -->

                                    <div class="article-contents-wrapper">
                                        <?php if( !empty( $content['title'] ) ){ ?>
                                        <div class="article-title">
                                          <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                          <div class="title-bottom-line"></div>
                                        </div><!-- .article-title -->
                                        <?php }
                                        if( !empty( $content['excerpt'] ) ){ ?>

                                        <div class="article-desc">
                                          <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .article-desc -->
                                        <?php } ?>

                                        <div class="article-entry-meta">
                                            <div class="pull-left">
                                                <time><?php echo date_i18n( esc_html__( 'M d, Y', 'edumag' ), strtotime( $content['date'] ) ); ?></time>
                                            </div><!--.pull-left-->
                                        </div><!-- .article-entry-meta -->

                                    </div><!-- end .article-contents-wrapper -->
                                </div><!-- .article-wrapper -->

                                <?php 
                                break;
                                }; ?>
                            </div><!-- .column-wrapper -->

                            <?php 
                                $content_detail =  array_splice( $content_detail,1, count( $content_detail ) ); // remove first content element from array
                            if( !empty( $content_detail ) ) : ?>
                            <div class="column-wrapper">
                                <div class="regular widget widget_popular_views" data-slick="{"slidesToShow":1, "slidesToScroll":1, "infinite":false, "speed":800, "dots":false, "arrows":true, "autoplay":true, "fade":false, "draggable":false }">

                                    <div class="slider-item">
                                        <ul>
                                            <?php
                                                $index = 1;                  
                                                $count = count( $content_detail );
                                                foreach ( $content_detail as $key => $content ) { ?>
                                                <li class="has-post-thumbnail">
                                                    <div class="image-wrapper">
                                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['img_array'][0] ); ?>" alt="<?php echo esc_attr( $content['title'] );?>"></a>
                                                    </div><!-- end .image-wrapper -->

                                                    <div class="article-contents-wrapper">
                                                        <?php if( !empty( $content['title'] ) ){ ?>
                                                        <div class="article-title">
                                                            <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                                        </div><!-- .article-title -->
                                                        <?php } ?>
                                                        <div class="article-entry-meta">
                                                            <time><?php echo date_i18n( "M d, Y", strtotime( $content['date'] ) ); ?></time>
                                                        </div><!-- .article-desc -->
                                                    </div><!-- .articles-contents-wrapper -->
                                                </li>
                                            <?php 
                                            if( $count > 5 ) {
                                                $diviser = 5;
                                            } else {
                                                $diviser = $count;
                                            }

                                            if( ( $index % $diviser == 0 ) ){
                                                if( $count == $index  ){ 
                                                    echo '</ul></div><!-- .slider-item -->';
                                                }
                                                else {
                                                    echo  '</ul></div><div class="slider-item"><ul>';
                                                }
                                            }                                            
                                            $index++;
                                        }
                                        $search_array = array( 7,8,9,10 );
                                        if( in_array( $index, $search_array ) ){
                                            echo '</ul></div><!-- .slider-item -->';
                                        }?>                         
                                </div><!-- .regular -->
                            </div><!-- .column-wrapper -->
                            <?php endif; ?>
                        </div><!-- .two-columns -->
                    </div><!-- #tab-all-news -->
                    <?php endforeach; ?>
              
                </div><!--.entry-content-->
            </div><!--.main-content-->

            <?php if( is_active_sidebar( 'latest_news_sidebar' ) && ( 'no-sidebar' != $sidebar_layout ) ) : ?>
            <div class="section-sidebar">
                <?php dynamic_sidebar( 'latest_news_sidebar' ); ?>
            </div><!-- .section-sidebar -->
            <?php endif; ?>
        </div><!-- .container -->
    </section><!-- #latest-news -->
    <?php 
    }
endif;