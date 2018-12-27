<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogger_Era
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			<?php $blog_layout 		= blogger_era_get_option( 'blog_layout' ); 
			$enable_archive_drop_cap = blogger_era_get_option( 'enable_archive_drop_cap' );
			$drop_cap = '';
			if ( true == $enable_archive_drop_cap ){
				$drop_cap = 'drop-cap';
			}			
			?>
			<div id="blog-post-wrap" class="blog-post-wrap <?php echo esc_attr( $blog_layout );?> <?php echo esc_attr( $drop_cap );?> ">
			<?php 

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */

					get_template_part( 'template-parts/content', get_post_type() );


				endwhile;

				do_action( 'blogger_era_action_posts_navigation' );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar()?>
</div>
<?php
get_footer();
