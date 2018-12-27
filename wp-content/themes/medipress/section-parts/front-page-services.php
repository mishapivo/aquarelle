<?php
/**
 * Template part - Service Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Medipress
 */
    $medipress_services_section = get_theme_mod( 'medipress_services_section_hideshow','hide');
    $medipress_services_title = get_theme_mod('medipress_services_title'); 
    $medipress_services_subtitle = get_theme_mod('medipress_services_subtitle'); 
 

   
    $services_no        = 3;
    $services_pages      = array();
    $services_icons     = array();
    
    for( $i = 1; $i <= $services_no; $i++ ) {
        $services_pages[]    =  get_theme_mod( "medipress_service_page_$i", 1 );
        $services_icons[]    = get_theme_mod( "medipress_page_service_icon_$i", '' );
    }

    $services_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $services_pages ),
        'posts_per_page' => absint($services_no),
        'orderby' => 'post__in'
    ); 
    
    $services_query = new wp_Query( $services_args );
     
     if( $medipress_services_section == "show") :
    
?>

 <!-- Start Service Section  -->
    <section class="section">
        <div class="container">
            <div class="title-block title-medical">
                <?php if($medipress_services_title !="") { ?>
                    <h2 class="title no-after"><?php echo esc_html($medipress_services_title); ?></h2>
                <?php } if($medipress_services_subtitle !=""){?>
                    <div class="sub-title">
                        <?php echo esc_html($medipress_services_subtitle); ?>                
                    </div>
                <?php } ?>
            </div>
            <div class="row ">
                <?php
                    $count = 0;
                    while($services_query->have_posts()) :
                    $services_query->the_post();
                ?>
                <div class="col-sm-4 about-col">
                    <?php if(has_post_thumbnail()) { ?>
                    <a class="about-link">
                   	 <?php the_post_thumbnail('medipress-portfolio-thumbnail'); ?>
                    </a>
                    
                    <h3 class="about-title medical-h3">
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php the_excerpt(); ?>
                <?php } else{ ?>

                    <h3 class="abt-title medical-h3">
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php the_excerpt(); ?>
                    <?php } ?>
                </div>
                <?php
                    $count = $count + 1;
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

<!-- End service Section -->
<?php
  endif;
?>