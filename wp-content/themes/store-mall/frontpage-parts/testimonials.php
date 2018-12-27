<?php
/**
 * Template part for displaying front page testimonial.
 *
 * @package Moral
 */

// Get default  mods value.
$testimonial = get_theme_mod( 'store_mall_testimonial', 'disable' );

if ( 'disable' === $testimonial ) {
    return;
}

$default = store_mall_get_default_mods();

$testimonial_num = 3;

$default = store_mall_get_default_mods();
$section_title = get_theme_mod( 'store_mall_testimonial_title', $default['store_mall_testimonial_title'] );
?>
<div id="testimonial-slider" class="relative page-section">
    <div class="wrapper">
    	<div class="section-header">
    	    <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
    	</div><!-- .section-header -->
        <div class="regular" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "fade": false }'>
	        	<?php
	        	if (  in_array( $testimonial, array( 'post' ) ) ) {
        	        $id = array();
        	        for ( $i=1; $i <= $testimonial_num; $i++ ) { 
        	            $id[] = get_theme_mod( "store_mall_testimonial_{$testimonial}_" . $i );
        	        }
        	        $args = array(
        	            'post_type' => $testimonial,
        	            'post__in' => (array)$id,   
                        'orderby'   => 'post__in',
        	            'posts_per_page' => absint( $testimonial_num ),
        	            'ignore_sticky_posts' => true,
        	        );

	        	    $query = new WP_Query( $args );
	        	    $i = 1;
	        	    if ( $query->have_posts() ) :
	        	        while ( $query->have_posts() ) :
	        	            $query->the_post();
	        	            ?>
	        	        	
	        	        	<article class="has-post-thumbnail">
                				<div class="testimonial-item-wrapper">
		        	            	<?php if ( has_post_thumbnail() ) { ?>
			        	        	    <div class="featured-image">
			        	        	        <?php the_post_thumbnail( 'large' ); ?>
			        	        	    </div><!-- .featured-image -->
		        	            	<?php } ?>


		        	        	        <header class="entry-header">
		        	        	            <h2 class="entry-title"><?php the_title();?></h2>
		        	        	        </header>

		        	        	        <div class="entry-content">
		        	        	            <?php the_content();?>
		        	        	        </div><!-- .entry-content -->
		        	        	    </div><!-- .entry-container -->
	        	        	</article>
	        	        <?php 
	        	        $i++;
	        	    	endwhile;
	        	        wp_reset_postdata();
	        	    endif; 
	        	}
	        	?>
		</div><!-- .testimonial-slider -->
    </div><!-- .wrapper -->
</div><!-- #testimonial-section -->