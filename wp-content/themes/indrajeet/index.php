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
 * @package Indrajeet
 */

get_header();

	$indrajeet_content_size = 12;

	if (  is_active_sidebar( 'Sidebar-1' ) &&   is_active_sidebar( 'Sidebar-2' ) ){
		$indrajeet_content_size = 6;
	} elseif ( ! is_active_sidebar( 'Sidebar-1' ) &&   is_active_sidebar( 'Sidebar-2' ) || is_active_sidebar( 'Sidebar-1' ) &&   ! is_active_sidebar( 'Sidebar-2' ) ) {
		$indrajeet_content_size = 8;
	}

?>

	<div class="container">
		<div class="row">
			<?php get_sidebar('left'); ?>
			<div id="primary" class="content-area col-md-<?php echo esc_attr( $indrajeet_content_size ); ?>">
				<main id="main" class="site-main">

				<?php
				if ( have_posts() ) :

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
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
