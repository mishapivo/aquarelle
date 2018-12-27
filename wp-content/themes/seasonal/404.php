<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Seasonal
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      
      <header class="entry-header"><h1 class="page-title"><?php _e( 'Page not found', 'seasonal' ); ?></h1>
    
  </header>
      
	<section class="not-found hentry">
        <div class="inner">
          <div class="page-content">
            <h2 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'seasonal' ); ?></h2>
            <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'seasonal' ); ?></p>

            <p><?php get_search_form(); ?></p>
            
            <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link"><?php _e( 'Return to the Homepage here', 'seasonal' ); ?></a></p>
          </div><!-- .page-content -->
        </div>
			</section><!-- .error-404 -->

		<?php get_template_part( 'template-parts/site-footer' ); ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>