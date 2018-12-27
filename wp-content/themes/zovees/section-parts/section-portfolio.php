<?php
/**
 * Template part - Portfolio Section
 * @package Zovees
 */
    $zovees_portfolio_title = get_theme_mod('zovees-portfolio_title');
    $zovees_portfolio_sub_title = get_theme_mod('zovees-portfolio_sub_title');
    $zovees_portfolio_section = get_theme_mod( 'zovees_portfolio_section_hideshow','hide');


    $portfolio_no = 6;
    $portfolio_pages = array();
    $portfolio_icons = array();
    for( $i = 1; $i <= $portfolio_no; $i++ ) {
        $portfolio_pages[] = get_theme_mod( "zovees_portfolio_page_$i", 1 );
    }
    $portfolio_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $portfolio_pages ),
        'posts_per_page' => absint($portfolio_no),
        'orderby' => 'post__in'
       
    ); 
    
    $portfolio_query = new wp_Query( $portfolio_args );
    if( $zovees_portfolio_section == "show" ) : ?>

    <!-- Start portfolio section -->
    <div class="content-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                    <div class="main-heading-content text-center portfolio-heading">
                        <?php if($zovees_portfolio_title != "")
                        {?>
                            <h2><?php echo esc_html($zovees_portfolio_title); ?><span>.</span></h2>
                        <?php }?>
                        <p><?php echo esc_html($zovees_portfolio_sub_title); ?></p>

                    </div>
                </div>
            </div>
            <!-- Start portfolio Wrapper -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-content">
                        <div class="portfolio portfolio-masonry portfolio-3-column portfolio-gutter">
                            <?php
                                $count = 0;
                                while( 
                                    $portfolio_query->have_posts()) :
                                    $portfolio_query->the_post();
                            ?>
                            <div class="portfolio-item cat1 cat3">
                                <div class="portfolio-item-content">
                                    <div class="item-thumbnail">
                                        <?php the_post_thumbnail('zovees-page-thumbnail', array('class' => 'img-responsive')); ?>
                        
                                        <div class="zoom-icon">
                                            <a class="venobox portfolio-view-btn" data-gall="myGallery" href="<?php the_post_thumbnail_url(); ?>"><i class="ti-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio-details">
                                        <div class="portfolio-details-inner">
                                            <h4><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $count++;
                                endwhile;
                                wp_reset_postdata();
                            ?>  
                        </div>
                    </div>
                </div>
            </div>
            <!-- End portfolio Wrapper -->
        </div>
    </div>
    <!-- End portfolio section -->
<?php
    endif;
?>