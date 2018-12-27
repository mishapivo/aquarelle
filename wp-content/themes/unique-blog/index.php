<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unique_Blog
 */

get_header();
?>
	<?php
		if ( have_posts() ) :

			/**
			 * Slider Options Enable
			 * 
			 */
			//Conctions for the post display
			$post_list = array();
			$first_post = array();
			$count = 0 ;
			$unique_blog_num_post_slide = get_theme_mod('unique_blog_slider_post_count',8);
			$unique_blog_post_is_exclusive  = get_theme_mod('unique_blog_archive_slider_post_exclusive',false);

			
			//Start While Loop
			while ( have_posts() ) : the_post();
				$post_list[] = $post;
				if( $count < $unique_blog_num_post_slide and has_post_thumbnail( ) ):
					if( $unique_blog_post_is_exclusive ):
						$first_post[] = array_shift($post_list);
					elseif( has_post_thumbnail() ):
						$first_post[] = $post;
						
					endif;
				endif;
				$count++;//increment the file
			endwhile; // End of the loop.

		//unique blog  Slider Section
		if( get_theme_mod( 'unique_blog_slider_enable',true ) == true ):

			?>
			<!-- Slider start -->
			<div class="unique_slider">
				<div id="unique_blog_main_slider" class="owl-carousel owl-theme center-owl-nav uni_slider">
					<?php foreach ( $first_post as $post ) : setup_postdata( $post ); ?>
						<!-- post slider loop stat -->
						<div class="item">
							<div class="unique_row">
								<div class="unique_col">
									<div class="article-img">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="unique-blog-content">
										<div class="unique-blog-category"><?php the_category(); ?></div>
										<h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format' )); ?></li>
											<li><i class="fa fa-comments"></i> <?php printf( esc_html( _n( '%d Comment', '%d ', get_comments_number(), 'unique-blog'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /slider loop stat -->
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php  

	 if ( is_home()){
	 	echo '<div id="content" class="site-content">';
	}
	?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php 

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>

			<div class="enique_blog_grid">
				<?php

					/*01 Start the Loop */
					foreach( $post_list as $post ): setup_postdata($post);

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endforeach; // End of the loop.

					//the_posts_navigation();

				?>
			</div>
		<!-- Post Nevegation Section -->
		<div class="pagination wraper-pagination">
		<?php the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => __( '<i class="fa fa-angle-double-left" aria-hidden="true"></i>', 'unique-blog' ),
				'next_text' => __( '<i class="fa fa-angle-double-right" aria-hidden="true"></i>', 'unique-blog' ),
			) ); ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
		else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

<?php
if( get_theme_mod('unique_blog_sidebar_layout_settings','right-sidebar') != 'full-width' ){
	get_sidebar();
}
get_footer();
