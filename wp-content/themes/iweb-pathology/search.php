<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package IWeb_Pathology
 */

get_header();
?>

	<section id="primary" class="content-area-l">
		<main id="main" class="site-main-l itopmrg">
			
		<?php if ( get_theme_mod( 'iwebunq_display_breadcrumb', '1' ) === '1' ) : ?> 
			<div class="breadcrumb"><?php iweb_pathology_breadcrumb(); ?></div>
		<?php endif; ?>            

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'iweb-pathology' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
