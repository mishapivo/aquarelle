<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alacrity Lite
 */

get_header();
?>

<div id="primary" class="site-content row">
		<div id="content" role="main">
		<div class="container">
			<article id="post-0" class="post error404 no-results not-found row">
				<header class="entry-header">
					<div class="fourofour"><label><?php esc_html_e ( '404', 'alacrity-lite' ); ?></label></div>
					<h1 class="entry-title"><?php esc_html_e ( 'Page Not Found', 'alacrity-lite' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php esc_html_e( 'Server cannot find the file you requested. The Page has either been moved or deleted, or you entered the wrong URL or document name. Look at the URL. If a word looks misspelled, then correct it and try it again. If that doesnt work You can try our search option to find what you are looking for.', 'alacrity-lite' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
  		</div><!-- .container -->
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
