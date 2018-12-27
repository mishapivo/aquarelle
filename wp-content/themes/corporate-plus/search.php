<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Acme Themes
 * @subpackage Corporate Plus
 */
get_header();
global $corporate_plus_customizer_all_values;
?>
<div class="wrapper inner-main-title">
	<header>
		<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'corporate-plus' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header>
</div>
<div id="content" class="site-content">
	<?php
	if( 1 == $corporate_plus_customizer_all_values['corporate-plus-show-breadcrumb'] ){
		corporate_plus_breadcrumbs();
	}
	?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_sidebar( 'left' );
get_sidebar();
?>
</div><!-- #content -->
<?php get_footer();