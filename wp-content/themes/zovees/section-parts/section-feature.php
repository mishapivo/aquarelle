<?php
/**
 * Template part - Planing Section
 *
 * @package Zovees
 */
    $zovees_feature_section = get_theme_mod( 'zovees_feature_section_hideshow','hide');
    $col_layout = get_theme_mod( 'zovees_feature_col_layout', '' );
    $sec_no = get_theme_mod( 'zovees_feature_no_hideshow', '' );
    if ($col_layout == 6) {
        $feature_no = 2;
    }
    elseif ($col_layout == 4) {
        $feature_no = 3;
    }
    else {
        $feature_no = 4;
    }
    
    $feature_pages = array();

    for( $i = 1; $i <= $feature_no; $i++ ) {
        $feature_pages[] = get_theme_mod( "zovees_feature_page_$i", 1 );
    }
    $feature_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $feature_pages ),
        'posts_per_page' => absint($feature_no),
        'orderby' => 'post__in'
       
    );

    $feature_query = new wp_Query( $feature_args );
    if( $zovees_feature_section == "show" ) : ?>

    <!-- Start Planing section -->
    <div class="content-section">
        <div class="planing-wrapper">
            <?php
                $count = 1;
                while( 
                    $feature_query->have_posts()) :
                    $feature_query->the_post();
                if ($count == 1 || $count == 3) :
            ?>

            <div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-<?php echo esc_attr($col_layout); ?>" style="padding: 0;">
                <div class="planing-item feature-color-<?php echo esc_attr($count); ?>" style="background-image: linear-gradient(rgba(206, 27, 40, 0.8), rgba(206, 27, 40, 0.8)),url(<?php the_post_thumbnail_url(); ?>)">

                <?php else: ?>
                    <div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-<?php echo esc_attr($col_layout); ?>" style="padding: 0;">
                    <div class="planing-item feature-color-<?php echo esc_attr($count); ?>" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)),url(<?php the_post_thumbnail_url(); ?>)">
                <?php endif; ?>
                    <?php if ( $sec_no == 'show') : ?>
                        <h2><?php echo esc_html($count); ?>.</h2>
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?> </p>
                </div>
            </div>
            <?php
                $count++;
                endwhile;
                wp_reset_postdata();
            ?>  
        </div>
    </div>
    <!-- End Planing section -->
<?php endif; ?>