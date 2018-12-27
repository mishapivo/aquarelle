<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

get_header(); ?>
<div class="container page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
		
			<section id="page-heading" class="page-title">
				<header class="entry-header wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
					<?php
						the_archive_title( '<h2 class="entry-title">', '</h2>' );
						the_archive_description( '<div class="sub-title">', '</div>' );
					?>
				</header><!-- .page-header -->
			</section><!-- .page-title -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
		
		/**
		* Hook - edumag_action_pagination.
		*
		* @hooked edumag_default_pagination 
		* @hooked edumag_numeric_pagination 
		*/
		do_action( 'edumag_action_pagination' ); 

		?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	if ( edumag_is_sidebar_enable() ) {
		get_sidebar();
	} ?>
</div><!-- .container -->
<?php
get_footer();
