<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package st-blog
 */

get_header();
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'st-blog' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
		echo '<div class="st-blog-masonry">';
			echo '<div class="st-blog-grid-sizer"></div>';

		/* Start the Loop */
		while ( have_posts() ) :
			echo '<div class="st-blog-item">';
			
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );
			
			echo '</div><!-- .st-blog-item -->';

		endwhile;

		echo '</div><!-- .masonry -->';

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #main -->
</section><!-- #primary -->			
<?php get_sidebar(); ?>

<?php
get_footer();
