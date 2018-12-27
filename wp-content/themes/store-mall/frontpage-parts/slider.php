<?php
/**
 * Template part for displaying front page slider.
 *
 * @package Moral
 */

// Get default  mods value.
$slider = get_theme_mod( 'store_mall_slider', 'disable' );

if ( 'disable' === $slider ) {
    return;
}

$default = store_mall_get_default_mods();

$slider_num = 3;
$opacity = get_theme_mod( 'store_mall_slider_overlay', 0 );
?>

	<div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":true, "autoplay": true, "fade": false }'>
		<?php
		if (  in_array( $slider, array( 'page' ) ) ) {

	        $id = array();
	        for ( $i=1; $i <= $slider_num; $i++ ) { 
	            $id[] = get_theme_mod( "store_mall_slider_{$slider}_" . $i );
	        }
	        $args = array(
	            'post_type' => $slider,
	            'post__in' => (array)$id,   
                'orderby'   => 'post__in',
	            'posts_per_page' => $slider_num,
	            'ignore_sticky_posts' => true,
	        );

		    $query = new WP_Query( $args );

		    $j = 1;
		    if ( $query->have_posts() ) :
		        while ( $query->have_posts() ) :
		            $query->the_post();
		            ?>
		        
		            <article class="slick-item <?php echo ( $j == 1 ) ? 'display-block' : 'display-none'; ?>" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
		            	<div style="opacity: <?php echo esc_attr( $opacity ); ?>" class="overlay"></div>
			            <div class="wrapper">
			                <div class="featured-content-wrapper">
			                    <header class="entry-header">
			                        <h2 class="entry-title"><?php the_title();?></h2>
			                    </header>
			                    <div class="entry-content">
			                    	<p><?php the_excerpt(); ?></p>
			                    </div>
			                    <?php 
			                    $custom_btn = esc_html__( 'Know More', 'store-mall' ); ?>
				                    <div class="more-link">
				                        <a href="<?php the_permalink(); ?>" class="btn btn-primary"><span><?php echo esc_html( $custom_btn ); ?></span></a>
				                    </div><!-- .more-link -->
			            	</div><!-- .featured-content-wrapper -->
			            </div><!-- .wrapper -->
	    	        </article>
		        <?php 
		        $j++;
		    	endwhile;
		        wp_reset_postdata();
		    endif; 
		} elseif( in_array( $slider, array( 'product' ) ) ) {
			if ( 'product' ===  $slider ) {
	    		$product_ids = array();
	    		for ( $i=1; $i <= $slider_num; $i++ ) { 
	    	        $product_id = get_theme_mod( 'store_mall_slider_product_' . $i );
	    	        if ( $product_id ) {
	    	        	$product_ids[] = $product_id;
	    	        }
	    	    }

	    	    $args = array( 'orderby'   => 'post__in', 'include' => $product_ids );
			}
		    $products = wc_get_products( $args );
		    if ( $products ) :
		    	$j = 1;
		    	foreach ( $products as $product ) {
	    	        $thumbnail_id = $product->get_image_id();

	    	        $cat_ids = $product->get_category_ids();

	    	        $btn_txt = esc_html__( 'Know More', 'store-mall' );
	    	        
	    	        ?>
	    	        <article class="slick-item <?php echo ( $j == 1 ) ? 'display-block' : 'display-none'; ?>" style="background-image: url( <?php echo esc_url( wp_get_attachment_url( $thumbnail_id ) );?> );">
		            	<div style="opacity: <?php echo esc_attr( $opacity ); ?>" class="overlay"></div>
			            <div class="wrapper">
			                <div class="featured-content-wrapper">
		                		<div class="entry-meta">
		                	        <span class="cat-links">
		                	            <?php foreach ( $cat_ids as $cat_id ) { 
		                	            	$term_obj = get_term( $cat_id, '', OBJECT, 'raw' );
		                	            	?>
		                	        		<a href="<?php echo esc_url( get_term_link( $cat_id, 'product_cat' ) ); ?>"><?php echo esc_html( $term_obj->name ); ?></a>,
		                	            <?php 
		                	        	}
		                	        	?>
		                	        </span><!-- .cat-links -->
		                	    </div><!-- .entry-meta -->
			                    <header class="entry-header">
			                        <h2 class="entry-title"><?php echo esc_html( $product->get_title() );?></h2>
			                    </header>
			                    <div class="entry-content">
			                    	<p><?php echo esc_html( $product->get_short_description() ); ?></p>
			                    </div>
			                    <div class="more-link">
			                        <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="btn btn-primary"><span><?php echo esc_html( $btn_txt ); ?></span></a>
			                    </div><!-- .more-link -->
			                </div><!-- .featured-content-wrapper -->
			            </div><!-- .wrapper -->
	    	        </article>
		    	<?php
		    	$j++;
		    	}
		    endif;
		}
		?>
	</div><!-- #featured-slider -->
