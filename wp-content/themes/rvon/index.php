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
 * @package rvon
 */

get_header();
?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			echo '<div class="front-page-posts">';
			
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
			?>

			<div class="front-page-post">
				
					<div class="front-page-post-image">
					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}else{
							echo '<img src="' . get_template_directory_uri() . '/assets/images/defaultfeaturedimage.jpg" />';
						}						
					?>
					</div><!-- .front-page-post-image -->
					
					<a class="front-page-post-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
					
					<div class="front-page-post-description">
						<?php echo esc_html(the_excerpt()); ?>
					</div><!-- .front-page-post-description -->					
				
			</div><!-- .front-page-post -->			
			
			<?php
			endwhile;

			echo '</div><!-- .front-page-posts -->';
			
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
