<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Devion
 */

get_header(); ?>
<div class="container"><div class="row"> 
	<div class="col-md-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="pages-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'devion' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a new search?', 'devion' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
</div></div>
<?php get_footer(); ?>
