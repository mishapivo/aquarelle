<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shuban
 */

get_header();

get_sidebar( 'left' ); ?>
<!-- left side -->

	<!-- Layout check -->
	<?php
	if ( is_active_sidebar( 'sidebar' ) && is_active_sidebar( 'sidebar-left' ) ) { ?>
	    <div class="st-primary-wrapper col-md-6">
	<?php  }
	elseif (  is_active_sidebar( 'sidebar' ) && !is_active_sidebar( 'sidebar-left' ) ) {   ?>
		<div class="st-primary-wrapper col-md-8">
	<?php
	} elseif (  !is_active_sidebar( 'sidebar' ) && is_active_sidebar( 'sidebar-left' ) ) {   ?>
		<div class="st-primary-wrapper col-md-8">
	<?php  }  else {  ?>
		<div class="st-primary-wrapper col-md-12">
	<?php  }  ?>
	<!-- Layout check -->
	        <div id="primary" class="content-area">

				<?php if ( is_home() ) : ?>
					<?php if( ! get_theme_mod( 'shuban_hide_featured_posts' ) ) : ?>
						<?php get_template_part( 'inc/featured-posts' ); ?>
					<?php endif; ?>
				<?php endif; ?>

				<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

								get_template_part( 'template-parts/content', get_post_format() );
					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<!-- /.st-primary-wrapper col-md-8 Or col-md-12 -->


<?php
get_sidebar();
get_footer();
