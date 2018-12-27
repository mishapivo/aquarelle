<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-click
 */

get_header();
?>

<div class="container">
	<div class="row">
		
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php if ( is_archive() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				echo '<div class="evt-masonry">';
				while ( have_posts() ) :
					// echo '<div class="evt-box-item-wrap">';

							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

					// echo '</div>';
				endwhile;
				echo '</div>';

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
