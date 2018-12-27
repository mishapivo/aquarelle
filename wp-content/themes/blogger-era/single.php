<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blogger_Era
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
			<?php $enable_drop_cap 		= blogger_era_get_option( 'enable_drop_cap' );
			$drop_cap = '';
			if ( true == $enable_drop_cap ){
				$drop_cap = 'drop-cap';
			}			
			?>	
		<main id="main" class="site-main <?php echo esc_attr( $drop_cap );?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			blogger_era_posted_description();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar()?>
</div>
<?php
get_footer();
