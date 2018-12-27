<?php
/**
 * The template for displaying archive pages
 *
 * @since TheSimplest 1.0
 */

get_header(); ?>

<?php
/**
 * TheSimplest Layout Options
 */
$thesimplest_site_layout    =   get_theme_mod( 'thesimplest_layout_options_setting' );
$thesimplest_layout_class   =   'col-md-8 col-sm-12';

if( $thesimplest_site_layout == 'left-sidebar' && is_active_sidebar( 'sidebar-1' ) ) :
	$thesimplest_layout_class = 'col-md-8 col-sm-12  site-main-right';
elseif( $thesimplest_site_layout == 'no-sidebar' || !is_active_sidebar( 'sidebar-1' ) ) :
	$thesimplest_layout_class = 'col-md-8 col-sm-12 col-md-offset-2';
endif;

?>

<div id="primary" class="content-area row">
	<main id="main" class="site-main <?php echo esc_attr($thesimplest_layout_class); ?>" role="main">

		<?php
		if( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' )
				?>
			</header><!-- .page-header -->

			<?php
			// Start the loop
			while( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				// End the loop
			endwhile;

			thesimplest_page_navigation();

		else :
		get_template_part( 'template-parts/content', 'none' );
		?>
		<?php endif; ?><!-- have_post() -->

	</main><!-- .site-main -->
	<?php get_sidebar(); ?>
</div><!-- content-area -->

<?php get_footer(); ?>
