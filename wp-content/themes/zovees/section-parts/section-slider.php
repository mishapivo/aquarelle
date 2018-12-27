
<?php
/**
 * Template part - Features Section of FrontPage
 * @package Zovees
 */

    $zovees_slider_section = get_theme_mod( 'zovees_slider_section_hideshow','hide');
    
    $slider_no = 3;
    $slider_pages = array();
    for( $i = 1; $i <= $slider_no; $i++ ) {
        $slider_pages[] = get_theme_mod( "zovees_slider_page_$i", 1 );
        $zovees_slider_btntxt1[] = get_theme_mod( "zovees_slider_btntxt1_$i", 1 );
        $zovees_slider_btnurl1[] = get_theme_mod( "zovees_slider_btnurl1_$i", 1 );

        $zovees_slider_btntxt2[] = get_theme_mod( "zovees_slider_btntxt2_$i", 1 );
        $zovees_slider_btnurl2[] = get_theme_mod( "zovees_slider_btnurl2_$i", 1 );

    }
    $slider_args = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $slider_pages ),
        'posts_per_page' => absint($slider_no),
        'orderby' => 'post__in'
       
    ); 
    
$slider_query = new wp_Query( $slider_args );

if ($zovees_slider_section =='show' ) : ?>

<!-- Start Slider Section -->
<div class="slider-area">
    <div class="slider-wrapper owl-carousel">
        <?php
            $count = 0;
            while($slider_query->have_posts()) :
            $slider_query->the_post();
        ?>
        <div class="slider-item home-one-slider-otem slider-item-four slider-bg-one" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">

            <div class="container">
                <div class="row">
                    <div class="slider-content-area">
                        <div class="slide-text">
                            <h1 class="homepage-three-title"><?php the_title(); ?></h1>
                            <p><?php the_content(); ?></p>
                            <div class="slider-content-btn">
                                <?php if ( $zovees_slider_btnurl1[$count] ): ?>
                                    <a href="<?php echo esc_url($zovees_slider_btnurl1[$count]); ?>" class="button button-color active margin-right-15"><?php echo esc_html($zovees_slider_btntxt1[$count]); ?></a>
                                <?php endif; ?>

                                <?php if ( $zovees_slider_btnurl2[$count] ): ?>
                                    <a href="<?php echo esc_url($zovees_slider_btnurl2[$count]); ?>" class="button button-transparent slide-right margin-top-20"><?php echo esc_html($zovees_slider_btntxt2[$count]); ?></a>
                                <?php endif; ?>

                            </div>
                        </div>
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
<!-- End Slider Section -->

<?php endif; ?>