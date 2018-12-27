<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blogger_Era
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<div class="container">					
						<figure class="error-icon">
							<img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/img/404.png" alt="<?php the_title_attribute(); ?>">
						</figure>
					<div class="entry-content">						
							<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blogger-era' ); ?></p>
							<h2 class="page-title"><?php echo esc_attr( '404', 'blogger-era');?></h2>						
							<a class="btn" href="<?php echo esc_url( home_url( ) ); ?>"><?php echo esc_html__( 'Go to Home Page', 'blogger-era' );?></a>							
							<a class="btn" href="javascript:history.go(-1)"><?php echo esc_html__( 'Go to Previous Page', 'blogger-era' );?></a>	
														
					</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
