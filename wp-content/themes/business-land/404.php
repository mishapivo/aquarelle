<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package business-land
 */

get_header();
?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
			
						<section class="error-404 not-found">
							<header class="page-title">
								<h1 class="title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'business-land' ); ?></h1>
							</header><!-- .page-header -->
			
							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'business-land' ); ?></p>
								<div class="search-box-wrap">
									<?php get_search_form(); ?>
								</div>
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
			
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
