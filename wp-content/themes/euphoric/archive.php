<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package euphoric
 */

get_header();
$post_pagination = get_theme_mod('post-pagination','default');
$disable_big_letter = get_theme_mod ('disable-big-letter',0);
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php do_action('euphoric_frontpage_breadcrumbs'); ?>
			<div class="posts-holder">
			<?php
			$i = 1; 
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				if (! is_singular() && $i == 1 ) :
						if(!is_paged()){ ?>
							<div class="first-post  <?php if($disable_big_letter != 0){ echo ''; } else { echo 'big-letter'; } ?>">
						<?php }
					endif;

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

				if (! is_singular() && $i == 1 ) :
						if(!is_paged()){ ?>
							</div><!-- .first-post -->
						<?php }
					endif;
				$i++;

			endwhile;

			if($post_pagination =='default'){
				the_posts_navigation();
			} else {
				the_posts_pagination();
			} ?>
		</div><!-- .posts-holder -->

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	get_sidebar();
 ?>
</div><!-- .wrap -->
<?php
get_footer();
