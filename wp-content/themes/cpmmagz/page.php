<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CPMMagz
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php get_template_part('template-parts/content', 'page'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>