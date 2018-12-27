<?php
/**
 *
 * The template for displaying all pages
 * Template Name: Full Width
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IWeb_Pathology
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main itopmrg">
					   
			<?php if ( get_theme_mod( 'iwebunq_display_breadcrumb', '1' ) === '1' ) : ?> 
				<div class="breadcrumb"><?php iweb_pathology_breadcrumb(); ?></div>
			<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
