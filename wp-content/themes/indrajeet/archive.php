<?php
/**
 * The template for displaying archive pages
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
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
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
