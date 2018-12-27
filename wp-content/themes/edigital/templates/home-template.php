<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary-home" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="home-slider-wrapper">
				<?php
					$home_slider_option = get_theme_mod( 'homepage_slider_option', 'show' );
					$home_slider_cat_id = get_theme_mod( 'slider_cat_id', '0' );
					if( $home_slider_option != 'hide' && !empty( $home_slider_cat_id ) ) {
						$slider_args = array(
								'post_type' => 'post',
								'category__in' => absint( $home_slider_cat_id ),
								'posts_per_page' => 5
							);
						$slider_query = new WP_Query( $slider_args );
						if( $slider_query->have_posts() ) {
							echo '<ul class="homepage-slider cS-hidden">';
							while ( $slider_query->have_posts() ) {
								$slider_query->the_post();
								if( has_post_thumbnail() ) {
				?>
								<li>
									<div class="single-slide-wrap">
										<figure><?php the_post_thumbnail( 'edigital-slider-img' ); ?></figure>
										<div class="slider-overlay"></div>
										<div class="slider-content-wrapper">
											<h3 class="slide-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
											<div class="slide-content"><?php the_content();?></div>
              
										</div><!-- .slider-content-wrapper -->
									</div><!-- .single-slide-wrap -->
								</li>
				<?php
								}
							}
							echo '</ul>';
						}
						wp_reset_postdata();
					}
				?>
			</div><!-- .home-slider-wrapper -->

			<?php
				/**
				 * Display the widget area section at homepage
				 */
	        	if( is_active_sidebar( 'edigital_home_fullwidth_area' ) ) {
	            	if ( !dynamic_sidebar( 'edigital_home_fullwidth_area' ) ):
	            	endif;
	         	}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
