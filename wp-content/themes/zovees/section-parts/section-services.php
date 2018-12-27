<?php
/**
 * Template part - Service Section
 * @package Zovees
 */
    $zovees_services_title = get_theme_mod('zovees-services_title');
    $zovees_services_section = get_theme_mod( 'zovees_services_section_hideshow','hide');
    $col_layout = get_theme_mod( 'zovees_service_col_layout', '' );
   
    $services_no = 6;
    $services_pages = array();
    $services_icons = array();
    for( $i = 1; $i <= $services_no; $i++ ) {
        $services_pages[] = get_theme_mod( "zovees_service_page_$i", 1 );
		$services_icons[] = get_theme_mod( "zovees_page_service_icon_$i", '' );
    }
	$services_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $services_pages ),
        'posts_per_page' => absint($services_no),
        'orderby' => 'post__in'
	   
    ); 
	
    $services_query = new wp_Query( $services_args );
    if( $zovees_services_section == "show" ) : ?>

<!-- Start about us section -->
<div class="content-section ptb-100 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                <div class="main-heading-content text-center">

                	<?php if($zovees_services_title != "")
					{?>
						<h2> <?php echo esc_html(get_theme_mod('zovees-services_title')); ?><span><?php echo esc_html__( '.', 'zovees' ); ?></span></h2>
					<?php }?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="service-wrapper">

            	<?php
				$count = 0;
				while($services_query->have_posts()) :
				$services_query->the_post();
				?>
				<div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-<?php echo esc_attr($col_layout); ?>" style="padding: 15px;">
                    <div class="service-item">
                    	<?php if($services_icons[$count] !="")
						{?>
							<div class="service-icon">
                            	<i class= " fa <?php echo esc_attr($services_icons[$count]); ?>"></i>
                        	</div>
						    <?php
						} ?>

                        <div class="service-text">
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__( 'Read More', 'zovees' ); ?> </a>
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
<?php
    endif;
?>