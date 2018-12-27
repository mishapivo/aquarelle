<div class="frontPageContainer">
	
	<div class="frontPageServices">
		
		<div class="frontPageWelcome">
		
			<?php
			
				$trexoWelcomePostTitle = '';
				$trexoWelcomePostDesc = '';

				if( '' != get_theme_mod('trexo_welcome_post') && 'select' != get_theme_mod('trexo_welcome_post') ){

					$trexoWelcomePostId = get_theme_mod('trexo_welcome_post');

					if( ctype_alnum($trexoWelcomePostId) ){

						$trexoWelcomePost = get_post( $trexoWelcomePostId );

						$trexoWelcomePostTitle = $trexoWelcomePost->post_title;
						$trexoWelcomePostDesc = $trexoWelcomePost->post_excerpt;
						$trexoWelcomePostContent = $trexoWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($trexoWelcomePostTitle); ?></h1>
			<div class="frontWelcomeContent">
				<p>
					<?php 
					
						if( '' != $trexoWelcomePostDesc ){
							
							echo esc_html($trexoWelcomePostDesc);
							
						}else{
							
							echo esc_html($trexoWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontWelcomeContent -->			
			
		</div><!-- .frontPageWelcome -->
		
		<div class="frontPageServiceItems">
			
			<?php

				$trexo_left_cat = '';

				if(get_theme_mod('trexo_services_cat')){
					$trexo_left_cat = get_theme_mod('trexo_services_cat');
					$trexo_left_cat_num = -1;
				}else{
					$trexo_left_cat = 0;
					$trexo_left_cat_num = 5;
				}		

				$trexo_left_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $trexo_left_cat_num,
				   'cat' => $trexo_left_cat
				);

				$trexo_left = new WP_Query($trexo_left_args);		

				if ( $trexo_left->have_posts() ) : while ( $trexo_left->have_posts() ) : $trexo_left->the_post();
   			?> 			
			<div class="frontPageServiceItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontitemimage.png" />';
						}						
				?>
				<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(trexolimitedstring(get_the_content(), 50));
						}
					
					?>
				</p>				
				
			</div><!-- .frontPageServiceItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPageServiceItems -->
		
	</div><!-- .frontPageServices -->
	
	<div class="frontPagePortfolio">
		
		<h1><?php _e('Portfolio', 'trexo'); ?></h1>
		
		<div class="frontPagePortfolioItems">
			
			<?php

				$trexo_portfolio_cat = '';

				if(get_theme_mod('trexo_portfolio_cat')){
					$trexo_portfolio_cat = get_theme_mod('trexo_portfolio_cat');
					$trexo_portfolio_cat_num = -1;
				}else{
					$trexo_portfolio_cat = 0;
					$trexo_portfolio_cat_num = 5;
				}		

				$trexo_portfolio_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $trexo_portfolio_cat_num,
				   'cat' => $trexo_portfolio_cat
				);

				$trexo_portfolio = new WP_Query($trexo_portfolio_args);		

				if ( $trexo_portfolio->have_posts() ) : while ( $trexo_portfolio->have_posts() ) : $trexo_portfolio->the_post();
   			?>			
			<div class="frontPagePortfolioItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						}						
				?>
				<?php the_title( '<h3>', '</h3>' ); ?>				
				
			</div><!-- .frontPagePortfolioItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPagePortfolioItems -->
		
	</div><!-- .frontPagePortfolio -->
	
	<div class="frontPageNews">
		
			<h1><?php _e('News', 'trexo'); ?></h1>
			
			<?php

				$trexo_right_cat = '';

				if(get_theme_mod('trexo_news_cat')){
					$trexo_right_cat = get_theme_mod('trexo_news_cat');
				}else{
					$trexo_right_cat = 0;
				}		

				$trexo_right_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 4,
				   'cat' => $trexo_right_cat
				);

				$trexo_right = new WP_Query($trexo_right_args);		

				if ( $trexo_right->have_posts() ) : while ( $trexo_right->have_posts() ) : $trexo_right->the_post();
   			?> 			
			<div class="frontNewsItem">
				
				<?php the_title( '<h3>', '</h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(trexolimitedstring(get_the_content(), 100));
						}
					
					?>				
				</p>
				<p class="readmore"><a href="<?php echo esc_url(get_the_permalink()); ?>">Read More</a></p>
				
			</div><!-- .frontNewsItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>			
		
	</div><!-- .frontPageNews -->	
	
</div><!-- .frontPageContainer -->	