<?php if (get_theme_mod('oxane_postslider_enable') && is_front_page() ) : ?>
<div id="postthumb-slider" class="container">
	<div class="section-title">
		<span><?php echo esc_html( get_theme_mod('oxane_postslider_title','Featured Posts') ); ?></span>
	</div>
	<div class="container-posts">
	        	 <?php
			        $args = array( 
			        	'post_type' => 'post',
			        	'posts_per_page' => 4, 
			        	'cat' =>  esc_html( get_theme_mod('oxane_postslider_cat',0) ) ,
			        	'ignore_sticky_posts' => true,
					    
			        );
			        ?>
						<div class="thumbs col-md-2 col-sm-2">
							<?php  
								$loop = new WP_Query( $args );
								$i = 1;
						        while ( $loop->have_posts() ) : 
						        	$loop->the_post();  ?>
						        	<div class="thumb thumb<?php echo $i; ?>">
										<?php the_post_thumbnail('oxane-thumb'); ?>	
									</div> <?php
								$i++;		
								endwhile;
								wp_reset_query(); ?>
						</div>
						
						<div class="slides col-md-10 col-sm-10">
							<?php $loop = new WP_Query( $args );
								$i = 1;
						        while ( $loop->have_posts() ) : 
						        	$loop->the_post(); ?>
									<div class="slide col-md-12 slide<?php echo $i; ?>">
										<?php the_post_thumbnail('oxane-slider-thumb'); ?>
										<div class="post-details">
											<h1><?php the_title(); ?></h1>
										</div>	
									</div>
								<?php
								$i++;	
								endwhile;
								wp_reset_query(); ?>
						</div>
						

					 <?php 
						 wp_reset_postdata(); ?>	
	            	        
	    </div>
</div>
<?php endif; ?>