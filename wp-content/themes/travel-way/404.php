<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Acme Themes
 * @subpackage Travel Way
 */
get_header();
global $travel_way_customizer_all_values;
?>
<div class="wrapper inner-main-title">
	<?php
	echo travel_way_get_header_normal_image();
	?>
	<div class="container">
		<header class="entry-header init-animate">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'travel-way' ); ?></h1>
			<?php
			if( 1 == $travel_way_customizer_all_values['travel-way-show-breadcrumb'] ){
				travel_way_breadcrumbs();
			}
			?>
		</header>
	</div>
</div>
<section class="error-404 not-found at-gray-bg">
	<div class="container">
		<main id="main" class="site-main" role="main">
				<div class="page-content">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<h1>
								<?php esc_html_e('404','travel-way'); ?>
								<small><?php esc_html_e('Not Found','travel-way'); ?></small>
							</h1>
							<div class="error-content">
								<h2>
									<?php esc_html_e('Sorry! We could not found that page','travel-way'); ?>
									
								</h2>
								<p>
								<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'travel-way' ); ?>

								</p>
								<?php get_search_form(); ?>
								
							</div>
						</div>
					</div>
				</div><!-- .page-content -->
		</main><!-- #main -->
	</div><!-- #content -->
	
</section><!-- .error-404 -->
<?php get_footer();